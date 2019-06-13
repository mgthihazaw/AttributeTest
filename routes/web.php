<?php
use App\Product;
use App\ProductType;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/product',function(){
//     $product=ProductType::find(1);
//    return $product->products;
// });

Route::resource('/products','ProductController');
Route::get('attributes/{attribute}/values','ProductController@getValue');
Route::get('/product/{product}/getproduct','ProductController@getProduct');


Route::resource('/producttypes','ProductTypeController');
Route::get('/producttypes/{productType}/product','ProductTypeController@getProduct');


Route::resource('/attributes','ProductTypeAttributeController');
Route::resource('/attributevalues','ProductTypeAttributeValueController');