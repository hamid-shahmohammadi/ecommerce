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

//Route::get('/', function () {
//    return view('front/home');
//});
//
//Route::get('home', function () {
//    return view('front/home');
//});

Route::get('/shop','HomeController@shop');

Route::get('/products', function () {
    return view('front/shop');
});
Route::get('/product_details/{id}', 'HomeController@product_details');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}','CartController@addItem');
Route::get('/cart/remove/{id}','CartController@destroy');
Route::put('/cart/update/{id}','CartController@update');

Route::get('/contact', function () {
    return view('front/contact');
});

Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/checkout','CheckoutController@index');

//Route::post('/formvalidate','CheckoutController@formvalidate');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/WishList', 'HomeController@View_wishList');
Route::get('/removeWishList/{id}', 'HomeController@removeWishList');
Route::post('addToWishList', 'HomeController@wishlist')->name('addToWishList');


//Route::get('home', 'HomeController@contact')->name('contactus');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],
    function (){
        Route::get('/',function (){
            return view('admin.index');
        })->name('admin.index');

//        Route::post('admin/store','AdminController@store');
//        Route::get('/admin','AdminController@index');

        Route::resource('product','ProductsController');
        Route::resource('category','CategoriesController');
    }
);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/formvalidate', 'CheckoutController@formvalidate');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@address');
    Route::get('/address/edit/{address}', 'ProfileController@addressEdit');
    Route::post('/updateAddress', 'ProfileController@UpdateAddress');

    Route::get('/password', 'ProfileController@Password');

    Route::post('/updatePassword', 'ProfileController@updatePassword');

    Route::get('/profile', function() {
        return view('profile.index');
    });

    Route::get('profile/thankyou', function() {
        return view('profile.thankyou');
    });

});

