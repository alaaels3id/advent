<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Redirect;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use App\Http\Interfaces\ProductsRepositoryInterface;
use App\Product;
use App\User;
use Auth;
use App\Review;
use DB;
use DataTables;

class ProductsController extends Controller
{
    
    public function index()
    { 
        return view('admin.products.index'); 
    }

    public function create()
    { 
        return view('admin.products.add'); 
    }
    
    public function store(Request $request)
    {   

        // File Image
        $file = $request->file('image');
        
        // If There is an Image Existing;
        if($file)
        {    
            // Check if the files count is less than 4 images;
            if(count($file) <= 4)
            {
                $filesname = [];
                
                // For Loop in the file images;
                for($i=0; $i < count($file); $i++)
                {
                    // Store the existing image in an array;
                    $filesname['image'.$i] = uploadimage($file[$i], '/public/advent/uploads/products/', '1200', '1485');
                }
                
                // Check if the array is empty or not;
                if(empty($filesname)) return Redirect::back()->withFlashMessage('!!');
                
                // If not store the values in a variable $image as JSON Object;
                $image = json_encode($filesname);

            }else return Redirect::back()->withFlashMessage('عفوا يجب اختيار اربع صور فقط.');
        
        }else $image = '';
        
        // Add a new Product to database Products Table;
        $product = Product::create([
            'name'        => get($request, 'name'),
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'status'      => $request->status,
            'model'       => $request->model,
            'brand'       => $request->brand,
            'qtn'         => intval($request->qtn),
            'discription' => get($request, 'discription'),
            'image'       => $image,
        ]);
        //store the user that added the product
        $product->users()->sync(auth()->users()->id, false);

        // Store the Product's Tags in product_tag table;
        $product->tags()->sync($request->tags, false);

        // Store the Product's Colors in color_product table;
        $product->colors()->sync($request->colors, false);

        // Store the Product's Sizes in product_size table;
        $product->sizes()->sync($request->sizes, false);

        // Redirect Message if everything is O.K;
        return back()->withFlashMessage('تم اضافة المنتج بنجاح');
    }

    public function GetFilter()
    {
        $products = Product::status()->paginate(20);
        return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما يرجي المخاولة لاحقا');
    }

    public function Product($id)
    {
        $product = Product::status()->where('id', intval($id))->get()->first();
        return isNullOrNot($product, 'site.pages.product', compact('product'), 'عفوا هذا المنتج غير موجود لدينا');
    }

    public function Review(Request $request)
    {
        // Validate the Request Inputs;
        $this->validate($request, array('rate' => 'required', 'review' => 'string|min:3|max:255'));
        
        // Check if there are a Previous Rating for current user to this Product or not;
        $preview = Review::where('user_id', $request->user_id)->where('product_id', $request->product_id)->status()->get()->first();

        // If there is;
        if($preview != null){
            return back()->withFlashMessage('عفواً لقد قيمت هذا المنتج من قبل');
        }else{
            // If not create a new Review for the current user to this product;
            Review::create($request->all());
            return back()->withFlashMessage('شكرا لتقيمك هذا المنتج');
        }
    }

    public function ShowMeProduct($id, $name)
    {
        $product = Product::find(intval($id));
        return isNullOrNot($product, 'admin.products.product', compact('product'), 'عفوا هذا المنتج غير موجود لدينا');
    }

    public function edit($id)
    {
        $product = Product::find(intval($id));
        return isNullOrNot($product, 'admin.products.edit', compact('product'), 'عفوا هذا المنتج غير موجود لدينا');
    }

    public function update(Request $request, $id)
    {   
        // Get the current Product row from database;
        $product = Product::find(intval($id));
        
        if(!empty($product))
        {
            $file = [];
        
            // The Request File Image ( Updated Value );
            $file = $request->file('image');
            
            // Convert the Product images from database table to array();
            $_file = json_decode($product->image);

            // the request data without images file;
            $data = array_except($request->all(), ['image']);
            
            // If There is an Image Existing;
            if($file)
            {
                $filesname = [];
                
                // For Loop in the file images;
                for($i=0; $i < count($file); $i++){
                    // Upload the images File and delete the Previous Images File form the Server;
                    $filesname['image'.$i] = uploadimage($file[$i], '/public/advent/uploads/products/', '1200', '1485', $_file->{'image'.$i});
                }
                
                // Check if the array is empty or not;
                if(!$filesname) return back()->withFlashMessage('!!');
                
                // If not store the values in a variable $image as JSON Object;
                $image = json_encode($filesname);
                
                // Update the Request images file in the Database Table;
                $product->update(['image' => $image]);
            
            }
            else
            {
                // If there is no images File To update
                $product->update([
                    'name'        => get($request, 'name'),
                    'price'       => $request->price,
                    'category_id' => $request->category_id,
                    'status'      => $request->status,
                    'model'       => $request->model,
                    'brand'       => $request->brand,
                    'qtn'         => intval($request->qtn),
                    'discription' => get($request, 'discription'),
                ]);
                
                //store the user that added the product
                $product->users()->sync(auth()->users()->id);

                // Update the Product's Tags in product_tag table;
                $product->colors()->sync($data['colors']);

                // Update the Product's Colors in color_product table;
                $product->tags()->sync($data['tags']);

                // Store the Product's Sizes in product_size table;
                $product->sizes()->sync($data['sizes']);
            }
        }else return Redirect::back()->withFlashMessage('هذا المنتج غير موجود او تم حذفه');

        // Redirect Message if everything is O.K;
        return back()->withFlashMessage('تم تعديل بيانات المنتج بنجاح');
    }

    public function anyData()
    {
        $products = Product::all();
        return DataTables::of($products)
        
        ->editColumn('name', function($model){
            return \Html::link('/admin-panal/products/id/'.$model->id.'/'.seourl(text($model->name, 'en')).'/', text(ucfirst($model->name)));
        })

        ->editColumn('image', function($model){
            $img = '/advent/uploads/products/'.getJsonImages($model->image)->image0;
            return \Html::image($img, null, ['class'=>'img-responsive', 'width'=>'100', 'height'=>'100', 'style' => 'border-radius: 15px;']);
        })

        ->editColumn('adder', function ($model){
            return ucfirst($model->users[0]->firstName).' '.ucfirst($model->users[0]->lastName);
        })

        ->editColumn('price', function($model){
            return getCurrence($model->price);
        })

        ->editColumn('created_at', function ($model){
            return $model->created_at->diffForHumans();
        })

        ->editColumn('status', function ($model){
            $yes = \Html::tag('span', 'مفعل', ['class' => 'label label-primary']);
            $no = \Html::tag('span', 'غير مفعل', ['class' => 'label label-danger']);
            return ($model->status == 1) ? $yes : $no;
        })

        ->editColumn('category_id', function ($model){
            $cat = text(Category()[$model->category_id]);
            $yes = \Html::tag('span', $cat, ['class' => 'label label-primary']);
            return $yes;
        })
        
        ->editColumn('delete', function($model){
            $array = ['class' => 'btn btn-danger glyphicon glyphicon-remove btn-sm', 'title' => 'حذف'];
            return \Html::link('/admin-panal/products/'.$model->id.'/destroy' , ' ', $array);
        })
        
        ->editColumn('edit', function ($model){
            $array = ['class' => 'btn btn-info glyphicon glyphicon-edit btn-sm', 'title' => 'تعديل'];
            return \Html::link('/admin-panal/products/'.$model->id.'/edit' , ' ', $array);
        })->make(true);
    }

    public function destroy($id)
    {
        // Soft Delete the Product from database and Mark it as Deleted;
        Product::destroy(intval($id));
        return redirect()->route('products.index')->withFlashMessage('تم حذف المنج بنجاح');
    }

    public function getTrashed()
    {
        // Get all Soft Deletes Products From Database;
        $trash = Product::onlyTrashed()->paginate(4);
        return $trash != null ? view('admin.products.delete', compact('trash')) : redirect('/admin-panal');
    }

    public function restore($id)
    {
        // Restore the Current $id from SoftDeletes and Make it as updeleted;
        $_id = intval($id);
        $product = Product::where('id', $_id);
        
        if($product != null){
            DB::table('products')->where('id', $_id)->update(['deleted_at' => null]);
            return back()->withFlashMessage('تم أستعادة المنتج بنجاح');
        }else{
            return back()->withFlashMessage('عفوا هذا المنتج غير موجود');
        }
    }

    public function forceDelete($id)
    {
        // Force Delete the SoftDeletes $id From Database;
        // - Select the Product that we want to delete;
        $_id = intval($id);
        $product = Product::where('id', $_id);
        
        if($product == null){
            Redirect::back()->withFlashMessage('عفوا هذا المنتج غير موجود ');
        }else{
            // - Delete all the Product Referances in the product_tag Table;
            DB::table('product_tag')->where('product_id', $_id)->delete();

            // - Delete all the Product Referances in the product_tag Table;
            DB::table('product_size')->where('product_id', $_id)->delete();

            // - Delete all the Product Referances in the product_user Table;
            DB::table('admin_product')->where('product_id', $_id)->delete();

            // - Delete all the Product Referances in the color_product Table;
            DB::table('color_product')->where('product_id', $_id)->delete();

            // - Delete The Product From Database;
            $product->forceDelete();

            Product::onlyTrashed()->where('id', $_id)->forceDelete();
            return back()->withFlashMessage('تم حذف المنتج نهائياً');
        }
    }

    public function FilterSorting(Request $request, ProductsRepositoryInterface $pro)
    {
        if($request->product_sortby == 'default')
        {
            // default - All - All - All;
            if($request->product_price == '0')
            {
                // default - All - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - All - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - All - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - All - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 'product_color');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // default - +200 - All - All;
            elseif($request->product_price == '200')
            {
                // default - +200 - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->where('price', '>=', $request->product_price)->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - +200 - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', 'price');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - +200 - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', 'price');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // default - +200 - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product', 'tag_id', 'color_id', $request, 
                        'product_tag', 'product_color', 'price');
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // default - (x-y) - All - All;
            else
            {
                $price = explode('-', $request->product_price);
                // default - (x-y) - c - All;
                if($request->product_color != '0' && $request->product_tag == '0')
                {            
                    $products = $pro->GetFilterOneAndTowPrices('color_product', 'color_id', $request, 'product_color', $price);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // default - (x-y) - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('product_tag', 'tag_id', $request, 'product_tag', $price);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // default - (x-y) - c - t;
                elseif($request->product_color != '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterTwoAndTowPrices('product_tag', 'color_product', 'tag_id', 
                        'color_id', $request, 'product_tag', 'product_color', $price);                    
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // default - (x-y) - All - All;
                else
                {  
                    $products = Product::status()->whereBetween('price', [$price[0], $price[1]])->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
        }
        
        elseif($request->product_sortby == 'newest')
        {
            // newest - All - All - All;
            if($request->product_price == '0')
            {
                // newest - All - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->latest()->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - All - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', null, ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - All - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', null, ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - All - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', null, ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // newest - +200 - All - All;
            elseif($request->product_price == '200')
            {
                // newest - +200 - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->latest()->where('price', '>=', $request->product_price)->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - +200 - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', 'price', ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - +200 - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', 'price', ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // newest - +200 - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', 'price', ['created_at', 'DESC']);                    
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // newest - (x-y) - All - All;
            else
            {
                $price = explode('-', $request->product_price);
                // newest - (x-y) - c - All;
                if($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('color_product', 'color_id', $request, 'product_color', $price, ['created_at', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // newest - (x-y) - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('product_tag', 'tag_id', $request, 'product_tag', $price, ['created_at', 'DESC']);   
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // newest - (x-y) - c - t;
                elseif($request->product_color != '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterTwoAndTowPrices('product_tag', 'color_product', 'tag_id', 
                        'color_id', $request, 'product_tag', 'product_color', $price, ['created_at', 'DESC']); 
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // newest - (x-y) - All - All;
                else
                {
                    $products = Product::status()->latest()->whereBetween('price', [$price[0], $price[1]])->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
        }
        
        elseif($request->product_sortby == 'sortByPriceLowToHigh')
        {
            // sortByPriceLowToHigh - All - All - All;
            if($request->product_price == '0')
            {
                // sortByPriceLowToHigh - All - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->orderBy('price', 'ASC')->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - All - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', null, ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - All - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', null, ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - All - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', null, ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // sortByPriceLowToHigh - +200 - All - All;
            elseif($request->product_price == '200')
            {
                // sortByPriceLowToHigh - +200 - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->orderBy('price', 'ASC')->where('price', '>=', $request->product_price)->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - +200 - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', 'price', ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - +200 - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', 'price', ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceLowToHigh - +200 - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', 'price', ['price', 'ASC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // sortByPriceLowToHigh - (x-y) - All - All;
            else
            {
                $price = explode('-', $request->product_price);
                // sortByPriceLowToHigh - (x-y) - c - All;
                if($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('color_product', 'color_id', $request, 'product_color', $price, ['price', 'ASC']); 
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceLowToHigh - (x-y) - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('product_tag', 'tag_id', $request, 'product_tag', $price, ['price', 'ASC']); 
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceLowToHigh - (x-y) - c - t;
                elseif($request->product_color != '0' && $request->product_tag != '0')
                {

                    $products = $pro->GetFilterTwoAndTowPrices('product_tag', 'color_product', 'tag_id', 
                        'color_id', $request, 'product_tag', 'product_color', $price, ['price', 'ASC']);                     
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceLowToHigh - (x-y) - All - All;
                else
                {
                    $products = Product::status()->orderBy('price', 'ASC')->whereBetween('price', [$price[0], $price[1]])->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
        }
        
        elseif($request->product_sortby == 'sortByPriceHighToLow')
        {
            // sortByPriceHighToLow - All - All - All;
            if($request->product_price == '0')
            {
                // sortByPriceHighToLow - All - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->orderBy('price', 'DESC')->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - All - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', null, ['price', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - All - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', null, ['price', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - All - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', null, ['price', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // sortByPriceHighToLow - +200 - All - All;
            elseif($request->product_price == '200')
            {
                // sortByPriceHighToLow - +200 - All - All;
                if($request->product_color == '0' && $request->product_tag == '0')
                {
                    $products = Product::status()->orderBy('price', 'DESC')->where('price', '>=', $request->product_price)->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - +200 - c - All;
                elseif($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneRes('color_product', 'color_id', $request, 'product_color', 'price', ['price', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - +200 - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneRes('product_tag', 'tag_id', $request, 'product_tag', 'price', ['price', 'DESC']);                    
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
                
                // sortByPriceHighToLow - +200 - c - t;
                else
                {
                    $products = $pro->GetFilterTwoRes('product_tag', 'color_product','tag_id', 'color_id', $request,'product_tag', 
                        'product_color', 'price', ['price', 'DESC']);                    
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
            
            // sortByPriceHighToLow - (x-y) - All - All;
            else
            {
                $price = explode('-', $request->product_price);
                // sortByPriceHighToLow - (x-y) - c - All;
                if($request->product_color != '0' && $request->product_tag == '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('color_product', 'color_id', $request, 'product_color', $price, ['price', 'DESC']); 
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceHighToLow - (x-y) - All - t;
                elseif($request->product_color == '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterOneAndTowPrices('product_tag', 'tag_id', $request, 'product_tag', $price, ['price', 'DESC']); 
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceHighToLow - (x-y) - c - t;
                elseif($request->product_color != '0' && $request->product_tag != '0')
                {
                    $products = $pro->GetFilterTwoAndTowPrices('product_tag', 'color_product', 'tag_id', 
                        'color_id', $request, 'product_tag', 'product_color', $price, ['price', 'DESC']);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }

                // sortByPriceHighToLow - (x-y) - All - All;
                else
                {
                    $products = Product::status()->orderBy('price', 'DESC')->whereBetween('price', [$price[0], $price[1]])->paginate(20);
                    return isNullOrNot($products, 'home', compact('products'), 'عفوا حدث خطا ما اثناء عملية البحث');
                }
            }
        }
    }

    // This Ajax Requests
    // For Javascript and jQuery;

    public function getAjaxProducts(Request $request)
    {
        $id = intval($request->id);
        if($id){
            $product = Product::where('id', $id)->first();
            $lg = isAuthOrNot();
            $im = json_decode($product->image);
            $colors_array = [];
            $sizes_array = [];
            $theimg = [];

            foreach($product->colors as $color) { $colors_array[$color->id] = text($color->name, $lg); }
            foreach($product->sizes as $size) { $sizes_array[$size->id] = $size->size; }
            foreach($im as $key => $value) { $theimg[] = $value;}

            $arr = json_encode([
                'name'          => text($product->name, $lg),
                'price'         => $product->price,
                'discription'   => text($product->discription, $lg),
                'image'         => $theimg,
                'colors'        => $colors_array,
                'sizes'         => $sizes_array,
            ]);
            return ($product != null) ? $arr : 'No Products';
        }
        else return "No id entered !!";
    }
}
