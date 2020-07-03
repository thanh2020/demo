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

// Route::get('/', 'ShopController@index');
// Route::get('category{id}', 'ShopController@getProductsByCategory')->name('shop.getProductsByCategory');

// Route::get('/{slug}','ShopController@getProductsByCategory')->name('shop.category');

// Route::get('/{category}/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');
// lien he
Route::resource('/contact', 'ContactController');

Route::get('getlogout','LoginController@getlogout')->name('getlogout');
Route::group(['prefix'=>'login','middleware'=>'In'],function(){
    Route::get('/','LoginController@getLogin');
    Route::post('/','LoginController@postLogin');
});

Route::get('search/','AdminController@search');

Route::get('loginAdmin/','AdminController@getloginAdmin');
Route::post('loginAdmin/','AdminController@postloginAdmin');

Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=>'Out'], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    
    Route::resource('product', 'ProductController');
    // QL Banner
    Route::resource('banner', 'BannerController');
    // QL Thương Hiệu
    Route::resource('brand', 'BrandController');
    // QL Nhà Cung Cấp
    Route::resource('vendor', 'VendorController');

    Route::resource('new', 'NewController');

    Route::resource('user', 'UserController');

    Route::resource('layout', 'LayoutController');
});
Route::get('delete/{id}','NewController@delete')->name('delete');

Route::group(['prefix' => 'cart', 'as' => 'cart'],function(){
    Route::get('checkout','CartController@checkout');
	Route::get('/add/{id}','CartController@getAddCart');
    Route::get('/show','CartController@getShowCart');
    Route::get('{rowId}','CartController@delete_cart');
    Route::post('postCheckout','CartController@postCheckout');

    Route::post('update','CartController@update_cart');
});
Route::get('/', 'ShopController@index');
Route::get('category/{id}', 'ShopController@getProductsByCategory')->name('shop.getProductsByCategory');
Route::get('/{category}/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');
Route::get('/{category}/{slug}', 'ShopController@getslug')->name('shop.slug');
Route::get('searchShop/','ShopController@getSearch');
Route::get('/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');


// Route::get('test',function(){
//     $user = App\User::all();
//     foreach ($user as $value) {
//         $a=App\User::find($value->id);
//         $a->password=bcrypt('123456');
//         $a->save();
//     }
// });

// Route::get('logout','TestController@getlogout');
// Route::group(['prefix' => 'dang-nhap'],function(){
//     Route::get('/','TestController@index');
//     Route::post('/','TestController@store');
// });

Route::get('binhluan','TestController@bluan');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('anh','AnhController@getanh');
Route::post('anh','AnhController@upAnh');


Route::any('{all?}','ShopController@index');
// Route::get('/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');

// View::composer('*', function($view){
//     view()->share('users', Auth::user());
// });