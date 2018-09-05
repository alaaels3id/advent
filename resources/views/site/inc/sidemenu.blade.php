<div class="side-menu">
    
    {{-- Search --}}
    <div class="dropdown">
        <div class="bor17 of-hidden">
            <div class="bor8 dis-flex p-l-15">
                
                <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04"><i class="zmdi zmdi-search"></i></button>
                
                <input dir="{{ condition('rtl', 'ltr') }}" class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" name="search15" type="text" id="myInput15" 
                    onkeyup="filterFunction('myInput15', 'myDropdown15');myFunction('myDropdown15')" 
                    placeholder="{{ __('cozastore.blog').' '.__('cozastore.search') }}">
                
                <div id="myDropdown15" class="dropdown-menu w-full">
                    @foreach(getAllBlogs() as $blog)
                        <a class="dropdown-item" href="{{ url('/blog/i/'.$blog->id.'/'.seourl(text($blog->title, 'en'))) }}">
                            {{ text(ucfirst($blog->title), isAuthOrNot()) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Sections --}}
    <div class="p-t-55" dir="{{ condition('rtl', 'ltr') }}">
        <h4 class="mtext-112 cl2 p-b-33 float-{{ condition('r', 'l') }}">{{ __('cozastore.sections') }}</h4><br><br>
        <ul>
            <br>
            @forelse(Category() as $key => $value)
            <li class="bor18">
                <a href="{{ url($root.'/products/category/i/'.$key.'/'.seourl(text($value, 'en'))) }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                    {{ text($value, isAuthOrNot()) }}
                </a>         
            </li>
            @empty
                <li class="text-center"><a href="javascript:void(0)">{{ __('cozastore.NoTags') }}</a></li>
            @endforelse
        </ul>
    </div>

    {{-- Main Products --}}
    <div class="p-t-65" dir="{{ condition('rtl', 'ltr') }}">
        <h4 class="mtext-112 cl2 p-b-33">{{ __('cozastore.MainProducts') }}</h4>

        <ul>
            @foreach(DB::table('products')->where('status', 1)->take(3)->orderBy(DB::raw('RAND()'))->get() as $product)
            <li class="flex-w flex-t p-b-30">
                <a href="{{ url('/products/i/'.intval($product->id).'/'.seourl(text($product->name, 'en'))) }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                    <img src="{{ $root }}/advent/uploads/products/{{ getJsonImages($product->image)->image0 }}" width="90" height="100" alt="PRODUCT">
                </a>
                <div class="size-215 flex-col-t p-t-8 p-r-20">
                    <a href="{{ url('/products/i/'.intval($product->id).'/'.seourl(text($product->name, 'en'))) }}" class="stext-116 cl8 hov-cl1 trans-04">
                        {{ text($product->name, isAuthOrNot()) }}
                    </a>
                    <span class="stext-116 cl6 p-t-20">{{ $product->price.' '.GetSettings('siteCurrence', isAuthOrNot()) }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Archieve --}}
    <div class="p-t-55" dir="{{ condition('rtl', 'ltr') }}">
        <h4 class="mtext-112 cl2 p-b-20 float-{{ condition('r', 'l') }}">{{ __('cozastore.archive') }}</h4><br><br>
        <ul>
            <br>
            @forelse($archives as $archive)
            <li class="p-b-7">
                <a href="{{ '/blog/?month='.ucfirst($archive->month).'&year='.intval($archive->year) }}" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                    <span>{{ $archive->month }} {{ $archive->year }}</span>
                    <span>({{ $archive->published }})</span>
                </a>
            </li>
            @empty
                <li class="text-center"><a href="javascript:void(0)">{{ __('cozastore.NoArchive') }}</a></li>
            @endforelse
        </ul>
    </div>
    
    <br><br>
    
    {{-- Tags --}}
    <div class="p-t-50 float-{{ condition('l', 'r') }}">
        <h4 class="mtext-112 cl2 p-b-27 float-{{ condition('r', 'l') }}">{{ __('cozastore.tags') }}</h4><br>
        <div class="flex-w m-r--5 float-r" dir="{{ condition('rtl', 'ltr') }}">
            @forelse(tags() as $key => $value)
                @php $class_t = 'flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5'; @endphp
                <a href="{{ url($root.'/tags/products/i/'.$key.'/'.$value) }}" class="{{ $class_t }}">{{ $value }}</a>
            @empty
                <li class="text-center"><a href="javascript:void(0)">{{ __('cozastore.NoTags') }}</a></li>
            @endforelse
        </div>
    </div>
</div>