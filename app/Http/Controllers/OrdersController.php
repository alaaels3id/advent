<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use DataTables;
use App\Order;
use DB;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'tel' => 'required|min:11|max:11',
            'state' => 'required',
            'street' => 'required',
        ]);
        Order::create([
            'custumer_id'   => auth()->user()->id,
            'products'      => json_encode(GetOrderItemsIds()),
            'gov_id'        => $request->gov,
            'custumer_name' => $request->fullname,
            'tel'           => $request->tel,
            'state'         => $request->state,
            'street'        => $request->street,
            'total'         => $request->total
        ]);
        Cart::destroy();
        Cart::instance('default')->destroy();
        Cart::instance('wishlist')->destroy();
        $message = condition('تم عمل الطلب بنجاح يتم الاستلام خلال 24 ساعة', 'Your Order has made successfully, you\'ll recive it within 24 hour');
        return redirect('/home')->withFlashMessage($message);
    }

    public function show($id)
    {
        $order = Order::find(intval($id));
        return isNullOrNot($order, 'admin.orders.order', compact('order'), 'عفوا لقد حدث خطا ما في عملية البحث');
    }

    public function anyData()
    {
        $orders = Order::all();
        return DataTables::of($orders)
        
        ->editColumn('custumer_name', function($model){
            return \Html::link('/admin-panal/orders/'.$model->id.'/' , $model->custumer_name);
        })

        ->editColumn('tel', function($model){
            return '20'.$model->tel.'+';
        })

        ->editColumn('street', function($model){
            return str_limit($model->street, $limit = 100, $end = '...');
        })
        
        ->editColumn('delete', function($model){
            $array = ['class' => 'btn btn-success glyphicon glyphicon-ok btn-sm', 'title' => 'حذف'];
            return \Html::link('/admin-panal/orders/'.$model->id.'/destroy' , ' ', $array);
        })->make(true);
    }

    public function getTrashed()
    {
        $trash = Order::onlyTrashed()->paginate(4);
        return view('admin.orders.delete', compact('trash'));
    }

    public function restore($id)
    {
        DB::table('orders')->where('id', $id)->update(['deleted_at' => null]);
        return back()->withFlashMessage('تم استعادة المدونة بنجاح');
    }

    public function forceDelete($id)
    {
        Order::where('id', $id)->forceDelete();
        return back()->withFlashMessage('تم حذف المدونة نهائياً');
    }

    public function destroy($id)
    {
        Order::destroy(intval($id));
        return back()->withFlashMessage('تم حذف الطلب بنجاح');
    }
}
