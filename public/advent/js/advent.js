$(window).on( "load", function(){
    $.get('/ajax/cart/total/', function(resCartTotal){ $('#carttotal').html(resCartTotal); });
});

$('.cartdatanotify').on('click', function(){
    $.get('/ajax/cart/total/', function(resCartTotal){ $('.getTotal').html(resCartTotal); });
    $.get('/ajax/cart/showcartmodel/', function(cart){
        var json = JSON.parse(cart);
        $('.cartShowModel').html('');
        if (json.id.length == 0)
        {
            const markup = `<li class="text-center header-cart-item flex-w full-w flex-t m-b-12">
                <div class="alert alert-info" style="width: 300px;">No Items</div></li>`;
            $('.cartShowModel').append(markup);
        }
        else
        {
            for (var i = 0; i < json.id.length; i++) {
                $('.cartShowModel').append(`
                    <li class="header-cart-item headercartitem${json.id[i]} flex-w flex-t m-b-12">
                        <div onclick="removeProductFromCart('${json.id[i]}');" class="header-cart-item-img">
                            <img src="/advent/uploads/products/${json.imgs[i]}" alt="IMG">
                        </div> 
                        <div class="header-cart-item-txt p-t-8">
                            <a href="/products/i/${json.product_id[i]}/${json.names_dash[i]}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                ${json.names[i]}
                            </a>
                            <span class="header-cart-item-info">${json.qtys[i]} x ${json.prices[i]}</span>
                        </div>
                    </li>`
                );
            }
        }
    });
});

function up(id){
    var qtyy = $('.wrap-num-product').find('input[name="num-product1"]').val();
    var qtyyPlusOne = parseInt(qtyy)+1;

    $.get('/ajax/cart/update/qty/', {rowId:id, qty:qtyyPlusOne}, function(res){
        $('.up'+id).css({'position': 'relative', 'left': '65px'});
        $('.down'+id).css({'position': 'relative', 'right': '65px'});
        location.reload();
    });
}

function down(id){
    var qtyy = $('.wrap-num-product').find('input[name="num-product1"]').val();
    var qtyyPlusOne = parseInt(qtyy)-1;

    $.get('/ajax/cart/update/qty/', {rowId:id, qty:qtyyPlusOne}, function(res){
        $('.up'+id).css({'position': 'relative', 'left': '65px'});
        $('.down'+id).css({'position': 'relative', 'right': '65px'});
        location.reload();
    });
}

function moveToCart(rowId){
    $.get('/ajax/moveToCart/', {rowId:rowId}, function(resCart){
        $.get('/ajax/cart/count/', function(resCartCount){ $('.cartdatanotify').attr('data-notify', resCartCount); });
        $.get('/ajax/wishlist/count/', function(resWishlistCount){ $('.datanotifycount').attr('data-notify', resWishlistCount);});
        location.reload();
    });
}

function removeProductFromCart(rowId){
    $.get('/ajax/cart/removeProductFromCart/', {rowId:rowId}, function(resCartRemove){
        $.get('/ajax/cart/count/', function(resCartCount){
            $('.row'+rowId).hide();
            $('.headercartitem'+rowId).hide();
            $.get('/ajax/cart/total/', function(resCartTotal){ $('.getTotal').html(resCartTotal); });
            $('.cartdatanotify').attr('data-notify', resCartCount);
            if(resCartCount == 0){
                $('.tab1').append('<tr class="text-center"><td colspan="6"><div class="alert alert-info">No Items</div></td></tr>');
            }
        });
    });
}

function removeProductFromWishlist(rowId){
    $.get('/ajax/Wishlist/removeProductFromWishlist/', {rowId:rowId}, function(){
        $.get('/ajax/wishlist/count/', function(resWishlistCount){ 
            $('.row'+rowId).hide();
            $('.datanotifycount').attr('data-notify', resWishlistCount);
            if(resWishlistCount == 0){
                $('.tab2').append('<tr class="text-center"><td colspan="4"><div class="alert alert-info">No Items</div></td></tr>');
            }
        });
    });
}

$('.showmodel').on('click', function ()
{
    var id = $(this).data('id'), value = $(this).data('value'), 
        qty = $(this).data('qty'), price = $(this).data('price'), name = $(this).data('name');

    $.get('/ajax/products/information', { id: id }, function (res) 
    {
        $('#colors').find('option').remove().end().append('<option value="">Choose Value</option>').val('');
        $("#sizes").find('option').remove().end().append('<option value="">Choose Value</option>').val('');

        var json = JSON.parse(res);

        $('#name').html(json.name);
        $('#price').html(value + ' ' + json.price);
        $('#discription').html(json.discription);
        $('.num-product').attr('max', qty);
        
        var colors = json.colors, sizes = json.sizes;

        var select_color = document.getElementById("colors"), select_size = document.getElementById("sizes");
        for(index in colors) { select_color.options[select_color.options.length] = new Option(colors[index], index); }
        for(index in sizes) { select_size.options[select_size.options.length] = new Option(sizes[index], index); }

        for (var i = 0; i < json.image.length; i++) {
            $('.image'+i).attr('src', '/advent/uploads/products/' + json.image[i]);
            $('.image0'+i+1).attr('href', '/advent/uploads/products/' + json.image[i]);
        }
    });

    $('.shoppingcart').on('click', function()
    {
        var sizes = $('.modelProductForm').find('select[name="sizes"]').val();
        var colors = $('.modelProductForm').find('select[name="colors"]').val();
        var qtyy = $('.modelProductForm').find('input[name="num-product"]').val();
        if(sizes == '' || colors == ''){
            alert('Please fill all the feilds');
        }else{
            $.get('/ajax/cart/create/', {id:id, name:name, price:price, qty:qtyy, sizes:sizes, colors:colors}, function(res){
                if(res == 1){
                    $.get('/ajax/cart/count/', function(resCartCount){
                        $('.cartdatanotify').attr('data-notify', resCartCount);
                        alert('Done Operation');
                        location.reload();
                    });
                }else{
                    alert('This Product is already in the cart');
                    location.reload();
                }
            });
        }
    });
});

function addProductToCart(id, name, price)
{
    var sizes = $('.getformvalue').find('select[name="sizes"]').val();
    var colors = $('.getformvalue').find('select[name="colors"]').val();
    var qtyy = $('.getformvalue').find('input[name="num-product"]').val();

    if(sizes == '' || colors == ''){
        alert('Please fill all the feilds');
    }else{
        $.get('/ajax/cart/create/', {id:id, name:name, price:price, qty:qtyy, sizes:sizes, colors:colors}, function(res){
            
            if(res == 1){
                $.get('/ajax/cart/count/', function(resCartCount){
                    $('.cartdatanotify').attr('data-notify', resCartCount);
                    alert('Done Operation');
                });
            }else{
                alert('This Product is already in the cart');
                location.reload();
            }
        });
    }
}

function checkout()
{
    $.get('/ajax/cart/count/', function(resCartCount){
        if(resCartCount != 0){ 
            window.location.href='/home/shopping-cart/checkout';
        }else{ alert('Sorry no Products in the Cart'); }
    });
}