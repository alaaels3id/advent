<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{ $root }}/advent/images/icons/icon-close.png" alt="CLOSE">
            </button>

            <div class="row">

                @php $img_class = 'flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04'; @endphp

                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                
                                @for($i = 0; $i < 4; $i++)
                                <div class="item-slick3">
                                    <div class="wrap-pic-w pos-relative">
                                        <img class="image{{ $i }}" src="" alt="IMG-PRODUCT">
                                        <a class="image0{{ $i+1 }} {{ $img_class }}" href=""><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        <h4 id="name" class="mtext-105 cl2 pull-right js-name-detail p-b-14"></h4>
                        <div class="clearfix"></div>
                        
                        <span id="price" class="mtext-106 pull-right cl2"></span>
                        <div class="clearfix"></div>
                        
                        <p id="discription" dir="{{ condition('rtl', 'ltr') }}" class="stext-102 lead text-justify cl3 p-t-23"></p>
                        <div class="clearfix"></div><hr>

                        
                        <div dir="{{ condition('rtl', 'ltr') }}" class="p-t-33 modelProductForm">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">{{ __('cozastore.theSize') }}</div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select id="sizes" class="js-select2" name="sizes">
                                            <option>{{ __('cozastore.chooseSize') }}</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>                                
                            </div>

                            <div dir="{{ condition('rtl', 'ltr') }}" class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">{{ __('cozastore.theColor') }}</div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" id="colors" name="colors">
                                            <option>{{ __('cozastore.chooseColor') }}</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" max="" min="1" type="number" name="num-product" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <button class="shoppingcart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        <i style="padding:5px;" class="fa fa-shopping-cart fa-1x"></i> {{ __('cozastore.Buy') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            Share : 
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>