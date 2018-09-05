<?php

Route::get('/', 'HomeController@welcome')->middleware('lang');
Auth::routes();

Route::get('/admin-panal/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-panal.login');
Route::post('/admin-panal/login', 'Auth\AdminLoginController@login')->name('admin-panal.login.submit');

Route::group(['middleware' => 'auth:admin'], function ()
{   
    Route::get('/admin-panal/contacts/data', 'ContactsContoller@anyData');
    Route::get('/admin-panal/users/data', 'UsersController@anyData');
    Route::get('/admin-panal/products/data', 'ProductsController@anyData');
    Route::get('/admin-panal/orders/data', 'OrdersController@anyData');
    
    Route::get('/admin-panal', 'AdminController@index')->name('admin-panal');

    Route::get('/admin-panal/contacts/{id}/destroy', 'ContactsContoller@destroy');
    Route::get('/admin-panal/orders/{id}/destroy', 'OrdersController@destroy');
    Route::get('/admin-panal/faqs/{id}/destroy', 'FaqsController@destroy');
    Route::get('/admin-panal/users/{id}/destroy', 'UsersController@destroy');
    Route::get('/admin-panal/colors/{id}/destroy', 'ColorsController@destroy');
    Route::get('/admin-panal/products/{id}/destroy', 'ProductsController@destroy');
    Route::get('/admin-panal/blogs/{id}/destroy', 'PostsController@destroy');
    Route::get('/admin-panal/sizes/{id}/destroy', 'SizesController@destroy');
    
    Route::get('/admin-panal/contacts/remove-all', 'ContactsContoller@RemoveAll')->name('contacts.remove-all');
    Route::get('/admin-panal/products/id/{id}/{name}/', 'ProductsController@ShowMeProduct');
    Route::get('/admin-panal/contacts/{id}/edit', 'ContactsContoller@edit');
    Route::get('/admin-panal/settings', 'SettingsController@index')->name('settings');
    Route::view('/admin-panal/settings/create', 'admin.settings.add')->name('settings.create');
    Route::post('/admin-panal/settings/create', 'SettingsController@addnewset')->name('settings.addnewset');
    Route::post('/admin-panal/settings', 'SettingsController@store');

    Route::get('/admin-panal/blogs/i/{id}/{name}', 'PostsController@ShowBlog');
    Route::get('/admin-panal/blogs/i/{id}/{name}/edit', 'PostsController@BlogEdit');
    
    Route::post('/admin-panal/users/PasswordChange', 'UsersController@updatePassword');
    Route::post('/admin-panal/users/PasswordChange', 'AdminController@updatePassword')->name('admin-panal.password');

    Route::resource('/admin-panal/users', 'UsersController');
    Route::resource('/admin-panal/admins', 'AdminController');
    Route::resource('/admin-panal/tags', 'TagsController');
    Route::resource('/admin-panal/colors', 'ColorsController');
    Route::resource('/admin-panal/sizes', 'SizesController');
    Route::resource('/admin-panal/contacts', 'ContactsContoller');
    Route::resource('/admin-panal/sliders', 'SliderController');
    Route::resource('/admin-panal/banners', 'BannersController');
    Route::resource('/admin-panal/faqs', 'FaqController');
    Route::resource('/admin-panal/blogs', 'PostsController');
    Route::resource('/admin-panal/products', 'ProductsController');
    Route::resource('/admin-panal/categories', 'CategoriesController');
    Route::resource('/admin-panal/orders', 'OrdersController');
    

    //==================================================================================
    
    Route::get('/admin-panal/products/{id}/restore', 'ProductsController@restore')->name('products.restore');
    Route::get('/admin-panal/products/get/trashed', 'ProductsController@getTrashed')->name('products.trash');
    Route::get('/admin-panal/products/{id}/ForceDelete', 'ProductsController@ForceDelete')->name('products.forcedelete');

    //==================================================================================

    Route::get('/admin-panal/banners/{id}/restore', 'BannersController@restore')->name('banners.restore');
    Route::get('/admin-panal/banners/get/trashed', 'BannersController@getTrashed')->name('banners.trash');
    Route::get('/admin-panal/banners/{id}/ForceDelete', 'BannersController@ForceDelete')->name('banners.forcedelete');

    //==================================================================================

    Route::get('/admin-panal/users/{id}/restore', 'UsersController@restore')->name('users.restore');
    Route::get('/admin-panal/users/get/trashed', 'UsersController@getTrashed')->name('users.trash');
    Route::get('/admin-panal/users/{id}/ForceDelete', 'UsersController@forceDelete')->name('users.forcedelete');

    //==================================================================================
    
    Route::get('/admin-panal/blogs/{id}/restore', 'PostsController@restore')->name('blogs.restore');
    Route::get('/admin-panal/blogs/get/trashed', 'PostsController@getTrashed')->name('blogs.trash');
    Route::get('/admin-panal/blogs/{id}/ForceDelete', 'PostsController@forceDelete')->name('blogs.forcedelete');

    //==================================================================================

    Route::get('/admin-panal/orders/{id}/restore', 'OrdersController@restore')->name('orders.restore');
    Route::get('/admin-panal/orders/get/trashed', 'OrdersController@getTrashed')->name('orders.trash');
    Route::get('/admin-panal/orders/{id}/ForceDelete', 'OrdersController@forceDelete')->name('orders.forcedelete');

    //===================================================================================

    Route::get('/admin-panal/sliders/{id}/restore', 'SliderController@restore')->name('sliders.restore');
    Route::get('/admin-panal/sliders/get/trashed', 'SliderController@getTrashed')->name('sliders.trash');
    Route::get('/admin-panal/sliders/{id}/ForceDelete', 'SliderController@ForceDelete')->name('sliders.forcedelete');

    Route::get('/MarkAllSeen', 'ContactsContoller@AllSeen');
    Route::get('/getcontactid/{image}/{subject}', 'ContactsContoller@GetContactId');

});

// ===================================================================================================================
// ===================================================================================================================

Route::group(['middleware' => ['web', 'lang']], function () {

    Route::get('/change/lang/{lang}', 'HomeController@langs')->middleware('auth');

    Route::get('/products/category/i/{category_id}/{category_name}', 'HomeController@getCategory')->name('products.category')->middleware('web');
    
    Route::get('/products/i/{id}/{name}', 'ProductsController@Product')->name('home.product')->middleware('web');

    // Ajax Requests
    Route::get('/ajax/products/information/', 'ProductsController@getAjaxProducts')->middleware('web');
    Route::get('/ajax/cart/create/', 'CartController@setAjaxCart');
    Route::get('/ajax/cart/removeProductFromCart/', 'CartController@removeProductFromCart');
    Route::get('/ajax/Wishlist/removeProductFromWishlist/', 'CartController@removeProductFromWishlist');

    Route::get('/ajax/cart/count/', 'CartController@setCartCount');
    Route::get('/ajax/cart/total/', 'CartController@getCartTotal');
    Route::get('/ajax/wishlist/content/', 'CartController@addToWishlist');
    Route::get('/ajax/wishlist/count/', 'CartController@getWishlistCount');
    Route::get('/ajax/cart/update/qty/', 'CartController@changeQty');
    Route::get('/ajax/moveToCart/', 'CartController@moveToCart');
    Route::get('/ajax/cart/showcartmodel/', 'CartController@getShowCartModel');
    
    // End Ajax Requests
    

    Route::post('/products/i/{id}/{name}', 'ProductsController@Review')->name('products')->middleware('auth');
    Route::post('/home/shopping-cart/checkout', 'OrdersController@store')->name('orders')->middleware('auth');

    
    Route::get('/products/filter/', 'ProductsController@GetFilter');
    Route::post('/products/filter/', 'ProductsController@FilterSorting')->middleware(['web', 'lang']);
    
    Route::view('/contact-us', 'site.pages.contact-us')->name('contact-us')->middleware('web');
    Route::post('/contact-us', 'ContactsContoller@store')->middleware('auth');
    
    Route::view('/about-us', 'site.pages.about-us')->name('about-us')->middleware('web');
    Route::view('/F&Qs', 'site.pages.faq')->name('faqs');
    Route::get('/shop', 'HomeController@Shop')->name('shop')->middleware('web');
    
    Route::get('/blog', 'PostsController@blog')->name('blog')->middleware('web');
    Route::get('/blog/i/{id}/{name}', 'PostsController@blogdetiles')->name('blog-details')->middleware('web');
    Route::post('/blog/i/{id}/{name}', 'PostsController@AddNewComment')->middleware('auth');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/shopping-cart', 'CartController@index')->name('cart.index')->middleware('auth');
    Route::post('/home/shopping-cart', 'CartController@store')->name('cart.store')->middleware('auth');
    Route::get('/home/profile/{username}', 'HomeController@profile')->name('home.profile')->middleware('auth');

    // Tags
    Route::get('/tags/colors/i/{id}/{color}', 'HomeController@ColorsTags');
    Route::get('/tags/products/i/{id}/{tag}', 'HomeController@ProductTags');
    Route::get('/tags/sizes/i/{id}/{size}', 'HomeController@SizesTags');
    Route::get('/tags/blog/i/{id}/{name}', 'HomeController@BlogsTags');

    Route::post('/cart/addToWishlist/', 'CartController@addToWishlist')->middleware('auth');
    
    Route::post('/home/users/PasswordChange', 'UsersController@UserChangePasssword');
    Route::get('/home/shopping-cart/checkout', 'CheckoutController@index')->name('checkout.index');
});
