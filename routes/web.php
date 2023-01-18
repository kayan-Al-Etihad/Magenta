<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\RoomsTypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'web'], function () {
    /********************---------------FRONT ROUTES------------------************************/
    Route::get('/', 'Front\homeController@home')->name('home');
    Route::get('/home', 'Front\homeController@home');
    Route::get('/show/{slug}', 'Front\homeController@show')
        ->name('front.show')
        ->where(['slug' => '[-A-Za-z0-9]+']);
    Route::get('/showCategory/{slug}', 'Front\homeController@showCategory')
        ->name('front.showCategory')
        ->where(['slug' => '[-A-Za-z0-9]+']);
    Route::get('/showBrand/{slug}', 'Front\homeController@showBrand')
        ->name('front.showBrand')
        ->where(['slug' => '[-A-Za-z0-9]+']);
    /*---------------Contact us------------------*/
    Route::get('/contact', function () {
        return view('Front.contact-us.contact-us');
    });
    /*---------------About us------------------*/
    Route::get('/about', function () {
        return view('Front.about.about');
    });
    /*---------------Categories------------------*/
    Route::get('/categories', function () {
        return view('Front.categories.categories');
    });
    /*---------------Rooms------------------*/
    // Route::get('/room', function () {
    //     return view('Front.rooms.categories');
    // });
    Route::get('/rooms', 'Front\RoomsController@index')->name('rooms');
    Route::get('/rooms/{roomsType}', 'Front\RoomsController@show');
    Route::get('/room/{roomId}', 'Front\RoomsController@showSingleProduct');
    /*---------------brands------------------*/
    Route::get('/brands', function () {
        return view('Front.brands.brands');
    });
    /*---------------favourite------------------*/
    Route::get('/favourite', function () {
        return view('Front.favourite.favourite');
    });

    /*---------------feedback------------------*/
    // Route::get('/feedback', function() {
    //     return view('Front.feedback.feedback');
    // });

    /*---------------feedback------------------*/
    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::post('/feedback', 'FeedbackController@store')->name('feedback');

    /*---------------single category------------------*/
    Route::get('/category', function () {
        return view('Front.categories.singleCategory');
    });
    /*---------------CHECKOUT------------------*/
    Route::get('/inter-checkout', 'Front\checkOutController@interCheckOut')->name('front.inter.checkout');
    Route::get('/checkout', 'Front\checkOutController@index')->name('front.checkout');
    Route::post('/checkout', 'Front\checkOutController@store')->name('front.checkout.store');
    Route::post('/checkout/address', 'Front\checkOutController@saveAddress')->name('front.address.store');
    Route::post('/checkout/orderStatus', 'Front\checkOutController@saveOrderStatus')->name('front.order.saveStatus');

    /*---------------PAY-PAL------------------*/
    Route::get('/payment', 'Front\PayPalController@payment')->name('payment');
    Route::get('/cancel', 'Front\PayPalController@cancel')->name('payment.cancel');
    Route::get('/payment/success', 'Front\PayPalController@success')->name('payment.success');
    Route::post('/paypal/notify', 'Front\PaypalController@notify')->name('paypal.notify');

    /*---------------LISTS------------------*/
    Route::match(['get', 'post'], '/products', 'Front\homeController@productsList')->name('front.productsList');
    Route::match(['get', 'post'], '/products/{list}/{slug}', 'Front\homeController@list')
        ->where([
            'list' => '[A-za-z]+',
            'slug' => '[-A-Za-z0-9]+',
        ])
        ->name('front.lists');

    /*---------------CART------------------*/
    Route::resource('/cart', 'Front\cartController')->except(['create', 'edit', 'update']);
    Route::post('/cart/edit', 'Front\cartController@update')->name('cart.update');
    Route::get('/carts/clear', 'Front\cartController@clear')->name('cart.clear');
    Route::view('/empty-shopping-cart', 'Front.check-out.empty-cart')->name('cart.empty');

    /*---------------SEARCh------------------*/
    Route::get('/search', 'Front\homeController@search')->name('front.search');
    Route::get('/auto-complete', 'Front\homeController@autoComplete')->name('front.search.autoComplete');

    /*---------------TRACK ORDER------------------*/
    Route::post('/track-order', 'Front\homeController@trackOrder')->name('front.trackCode');

    /*---------------COMPARE------------------*/
    Route::get('/compare', 'Front\homeController@compare')->name('front.compare');
    Route::post('/compare-product', 'Front\homeController@compareProduct')->name('front.productsCompare');
    Route::delete('/compare/{name}', 'Front\homeController@removeCompare')->name('front.removeCompare');

    /*---------------AUTH------------------*/
    Auth::routes();

    /*---------------GOOGLE------------------*/
    Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
});

/*------------------------------FRONT AUTH ROUTES------------------*/
Route::group(['prefix' => 'account', 'middleware' => 'auth'], function () {
    /*---------------ACCOUNT------------------*/
    Route::get('/profile', 'Front\accountController@profile')->name('front.profile');
    Route::get('/my-orders', 'Front\accountController@myOrders')->name('front.myOrders');
    Route::get('/my-order/{id}', 'Front\accountController@showOrder')->name('front.myOrders.show');
    Route::put('/my-orders', 'Front\accountController@cancelOrder')->name('front.cancel.order');
    Route::get('/edit-address', 'Front\accountController@editAddress')->name('front.address.edit');
    Route::put('/edit-address', 'Front\accountController@updateAddress')->name('front.address.update');
    Route::get('/edit-order-address/{id}', 'Front\accountController@editOrderAddress')->name('front.order.address.edit');

    /*---------------COMMENTS------------------*/
    Route::post('comments', 'Admin\myCommentController@store')->name('comment.store');
    Route::match(['put', 'post'], 'comments/{comment}', '\Laravelista\Comments\CommentController@update');
    //    Route::post('comments/{comment}', '\Laravelista\Comments\CommentController@reply');

    /*---------------FAVORITES------------------*/
    Route::post('/favorite', 'Front\accountController@favoritePost')->name('favorite');
    Route::post('/un-favorite', 'Front\accountController@unFavoritePost')->name('unfavorite');
    Route::get('/my-wish-list', 'Front\accountController@myFavorites')->name('my_favorites');

    /*---------------GIFT CARD------------------*/
    Route::post('/checkout/check-discount', 'Front\checkOutController@checkDiscount')->name('front.checkout.checkDiscount');
});

/*---------------***************ADMIN ROUTES******************------------------*/
Route::group(['prefix' => 'admin', 'middleware' => 'checkRole'], function () {
    /*---------------USERS------------------*/
    Route::resource('/user', 'Admin\userController');
    Route::get('/user-address/{id}', 'Admin\userController@editAddress')->name('admin.address.edit');
    Route::put('/user-address/{id}', 'Admin\userController@updateAddress')->name('admin.address.update');

    /*---------------ROLES------------------*/
    Route::resource('roles', 'Admin\roleController');

    /*---------------SEARCH------------------*/
    Route::post('/search', 'Admin\dashboardController@search')->name('admin.search');

    /*---------------DASHBOARD------------------*/
    Route::get('/dashboard', 'Admin\dashboardController@index')->name('admin.dashboard');

    /*---------------Products Routes------------------*/
    Route::resource('product', 'Admin\productController');
     /*---------------Products Routes------------------*/
     Route::resource('rooms', Admin\RoomsController::class);

    // create 3dModel
    Route::resource('/product3d', 'Admin\create3DModel');

    Route::get('/product/create/second-step', 'Admin\productController@createSecondStep')->name('product.create2');
    Route::post('/product/create/second-step', 'Admin\productController@storeSecondStep')->name('product.store2');

    Route::post('product/sort', 'Admin\productController@sort')->name('product.index.sort');
    Route::get('product/index/trash', 'Admin\productController@withTrash')->name('product.index.trash');
    Route::get('product/index/restore/{id}', 'Admin\productController@restore')->name('product.restore');
    Route::get('product/tags/{tag}', 'Admin\productController@productTags')->name('products.tags');

    // Route::put('/product/{id}', [productController::class, 'productUpdate'])->name('products.update');
    // Route::put('product/{id}', 'Admin\productController@productUpdate')->name('products.update');

    Route::delete('/product/index/{id}', 'Admin\productController@destroy')->name('product.destroy');

    /*---------------ATTRIBUTES ROUTES------------------*/
    Route::resource('/attribute', 'Admin\attributeController')->except(['index', 'show']);
    Route::delete('attribute/value/{id}', 'Admin\attributeController@deleteValue')->name('attribute.deleteValue');
    //when create new attribute calling from show product
    Route::get('/attribute/createNew/{id}', 'Admin\attributeController@createNew')->name('attribute.createNew');

    /*---------------PHOTOS Routes------------------*/
    Route::resource('photo', 'Admin\PhotoController');

    /*---------------CATEGORIES ROUTE------------------*/
    Route::resource('category', 'Admin\categoryController')->except(['show', 'edit', 'update']);

    /*---------------BRAND ROUT------------------*/
    Route::resource('brand', 'Admin\brandController')->except(['show']);

    /*---------------GIFT CARD------------------*/
    Route::resource('giftCard', 'Admin\giftCardController')->except(['show']);

    /*---------------****ORDERS****------------------*/
    Route::get('orders', 'Admin\orderController@index')->name('order.index');
    Route::get('not-sent-orders', 'Admin\orderController@notSent')->name('order.not_sent');
    Route::get('orders/{id}', 'Admin\orderController@show')->name('order.show');
    Route::delete('orders/{id}', 'Admin\orderController@destroy')->name('order.destroy');
    Route::delete('orders/orders-status/{id}', 'Admin\orderController@detailDestroy')->name('order.detail.destroy');
    Route::get('orders/status/{id}/{status}', 'Admin\orderController@status')->name('order.status');
    //    Route::post('orders','Admin\orderController@sent')->name('order.sent');
    Route::get('/Admin/createNewProduct', 'Admin\orderController@create')->name('order.create');
    Route::post('/Admin/createNewProduct', 'Admin\orderController@storeorder')->name('order.store');

    /*---------------****COMMENTS****------------------*/
    Route::get('/comments', 'Admin\myCommentController@index')->name('comments.index');
    Route::get('/comments/new', 'Admin\myCommentController@newComments')->name('comments.new');
    Route::post('/comments/{id}', 'Admin\myCommentController@approve')->name('comment.approve');
    Route::delete('/comments/{id}', 'Admin\myCommentController@destroy');
    //    Route::delete('/comments/{comment}', '\Laravelista\Comments\CommentController@destroy');

    /*---------------****Feedback****------------------*/
    Route::get('/feedback', 'FeedbackController@showinAdminSide')->name('feedback.show');
    Route::get('/aprovedFeedback', 'FeedbackController@aproved')->name('feedback.aproved');
    Route::delete('/feedback/{id}', 'FeedbackController@destroy')->name('feedback.destroy');
    Route::get('/feedback/{id}', 'FeedbackController@updateStatus')->name('feedback.updateStatus');

    /*---------------PAYMENTS------------------*/
    Route::resource('/payment', 'Admin\PaymentController')->except(['edit', 'update', 'create', 'store']);
    Route::get('/failed-payments', 'Admin\PaymentController@failed')->name('payment.failed');

    /*---------------SITE SETTINGS------------------*/
    Route::resource('/settings', 'Admin\settingController')->except(['create', 'show', 'edit', 'destroy']);

    /*---------------Room type------------------*/
    Route::resource('room-type', Admin\RoomsTypeController::class);

});

Route::get('/rakad', function () {
    return view('rakad');
});
