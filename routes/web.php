<?php
use App\Events\OrderStatusChanged;
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

Route::get('/', function () {
    return view('Front/index');
});
Route::get('/fire', function () {
event(new OrderStatusChanged);
    return 'Fired';
});
Route::get('/listen', function () {

    return view('listenbroadcast');
});
Route::get('/index', function () {
    return view('Front/index');
});
Route::get('/about', function () {
    return view('Front/about');
});
Route::get('/contact', function () {
    return view('Front/contact');
});
Route::get('/chat', 'ChatController@chat');
Route::post('/send', 'ChatController@send');
Route::post('/saveToSession', 'ChatController@saveToSession');
Route::post('/getOldMessage', 'ChatController@getOldMessage');
Route::post('/deleteSession', 'ChatController@deleteSession');

Route::get('veg_show','FrontController@Veg' );
Route::get('/non_veg_show', 'FrontController@Non_Veg' );
Route::get('/special_show', function () {
    return view('Front/special');
});


//Route for Cart
        Route::resource('cart','CartController');
        Route::get('add_cart/{id}/{price}/{qty}/{tprice}','CartController@edit');
        Route::delete('delete_cart/{id}','CartController@destroy');
        Route::delete('delete-cartOrder','CartController@destroy_cartOrder');
//Route for Veg
	Route::resource('veg','VegitemController');
	Route::get('add_veg','VegitemController@Veg_add');
	Route::post('save_vegitem','VegitemController@Veg_save');
	Route::get('edit_veg/{id}','VegitemController@Veg_edit');
	Route::put('update_veg/{id}','VegitemController@Veg_update');
	Route::delete('delete_veg/{id}','VegitemController@Veg_delete');
        
//Route for  Non Veg
        Route::resource('nonveg','NonvegitemController');
        Route::get('add_nonveg','NonvegitemController@Nonveg_add');
        Route:: post('save_nonvegitem','NonvegitemController@Nonveg_save');
        Route::get('edit_nonveg/{id}','NonvegitemController@Nonveg_edit');
	Route::put('update_nonveg/{id}','NonvegitemController@Nonveg_update');
	Route::delete('delete_nonveg/{id}','NonvegitemController@Nonveg_delete');

//Route for Special
        Route::resource('special', 'SpecialitemController');
        Route::get('add_special','SpecialitemController@Special_add');
        Route::post('save_special','SpecialitemController@Special_save');
        Route::get('edit_special/{id}','SpecialitemController@Special_edit');
        Route::put('update_special/{id}','SpecialitemController@Special_update');
	Route::delete('delete_special/{id}','SpecialitemController@Special_delete');


//Route for Beverages
        Route::resource('beverages', 'BeveragesitemController');
        Route::get('add_beverages','BeveragesitemController@Beverages_add');
        Route::post('save_beverages','BeveragesitemController@Beverages_save');
        Route::get('edit_beverages/{id}','BeveragesitemController@Beverages_edit');
        Route::put('update_beverages','BeveragesitemController@Beverages_update');
	Route::delete('delete_beverages/{id}','BeveragesitemController@Beverages_destroy');

//Route for cmspostBeveragesitemController@show
        Route::resource('cms_posts', 'cmspostController');
        Route::get('add_cms_page','cmspostController@create');
        Route::post('save_cms_page','cmspostController@store');
        Route::get('edit_cms_page/{id}','cmspostController@edit');
        Route::put('update_cms_page/{id}','cmspostController@update');
	Route::delete('delete_cms_page/{id}','cmspostController@destroy');
 //Route for Checkout
        
Auth::routes();

//Route::get('admin/home', 'HomeController@index');
//Admin Panel route
//Route::get('admin/home', function () {
  //  return view('Admin/index');
//});
  Route::post('address-store', 'AddressController@store')->name('address.store');

  Route::resource('checkout', 'CheckoutController');
  Route::post('payment-store', 'CheckoutController@storePayment')->name('payment.storePayment');
  Route::get('payment-store', 'CheckoutController@storePayment')->name('payment.storesPayment');
  Route::get('/user-orders/{order}', 'CheckoutController@show')->name('user.orders.show');
  
  //Coments
  Route::post('comments/{order_id}','CommentController@store')->name('comments.store');
  Route::get('admin-comments','CommentController@adminCommentShow')->name('comments.admin');
  Route::get('edit_comments/{id}','CommentController@edit')->name('comments.edit');
  Route::put('update_comments/{id}','CommentController@update')->name('comments.update');
  Route::delete('delete_comment/{id}','CommentController@destroy');

  Route::group(['namespace' => 'Admin'], function (){
  Route::get('admin/home','HomeController@index')->name('admin.home');
   
  Route::resource('admin-user','UserController');
  Route::resource('admin/role','RoleController');
  Route::resource('admin/permission','PermissionController');
  Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('admin-login', 'Auth\LoginController@login');
  Route::resource('orders','OrderController');
  Route::get('admin-order/{type?}','OrderController@order');
  Route::put('orderstatus/{order}','OrderController@orderStatus')->name('order.Status');
    //Notification
  Route::get('markAsRead','NotificationController@markAsRead');
 
     
});

