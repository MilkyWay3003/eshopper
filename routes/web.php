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

Route::get('/', ['uses' => 'ProductsController@index',"as" => "allProducts"]);


//Dispay all the products on user's products page
Route::get('products', ['uses' => 'ProductsController@index',"as" => "allProducts"]);

//display search products
Route::post('products/search', ['uses' => 'ProductsController@searchProduct',"as" => "admin.searchProduct"]);


//Add Product To A Card
Route::get('contact',["uses" => "Admin\adminController@contact","as"=>"contact"]);

//Add Product To A Card
Route::post('contact/send',["uses" => "Admin\adminController@contactSend","as"=>"contactSend"])->middleware('auth');


//Add Product To A Card
Route::get('products/addToCart/{id}',["uses" => "ProductsController@addToCart","as"=>"addToCart"]);

//Display men's products
Route::get('products/men',["uses" => "ProductsController@menProducts","as"=>"menProducts"]);

//Display women's products
Route::get('products/women',["uses" => "ProductsController@womenProducts","as"=>"womenProducts"]);

//Display kids products
Route::get('products/kids',["uses" => "ProductsController@kidsProducts","as"=>"kidsProducts"]);

//Dispay added products to the cart
Route::get('cart',["uses" => "ProductsController@showCart","as"=>"showCart"]);

//Delete Product from A Cart
Route::get('products/deleteProduct/{id}',["uses" => "ProductsController@deleteProduct","as"=>"deleteProduct"]);

//auth default routes
Auth::routes();

//home for loggedin user
Route::get('/home', 'HomeController@index')->name('home');




//Increase single product
Route::get('cart/increaseSingleProduct/{id}', ['uses' => 'ProductsController@increaseSingleProduct',"as" => "increaseSingleProduct"]);

//Increase single product
Route::get('cart/decreaseSingleProduct/{id}', ['uses' => 'ProductsController@decreaseSingleProduct',"as" => "decreaseSingleProduct"]);


//create order
Route::get('cart/createOrder', ['uses' => 'ProductsController@createOrder',"as" => "createOrder"]);

//create order
Route::get('cart/checkOut', ['uses' => 'ProductsController@checkOut',"as" => "checkOut"])->middleware('auth');

//post checkout form
Route::post('cart/createNewOrder', ['uses' => 'ProductsController@createNewOrder',"as" => "createNewOrder"]);

//show payment status and option to pay
Route::get('cart/paymentShow', ['uses' => 'ProductsController@paymentShow',"as" => "paymentShow"]);

Route::group(['middleware' => ['restrictAdminPanel']],function(){
    //post edit product changes form
    Route::post('admin/addProductStore', ['uses' => 'Admin\adminController@addProductStore',"as" => "addProductStore"]);

//delete Product
    Route::get('admin/deleteProduct/{id}', ['uses' => 'Admin\adminController@deleteProduct',"as" => "admin.deleteProduct"]);

    //display editImageform
    Route::get('admin/editProductImageForm/{id}', ['uses' => 'Admin\adminController@editProductImageForm',"as" => "admin.editProductImageForm"]);


//post edit product image changes form
    Route::post('admin/editProductImage/{id}', ['uses' => 'Admin\adminController@editProductImage',"as" => "admin.editProductImage"]);

//post edit product changes form
    Route::post('admin/updateProduct/{id}', ['uses' => 'Admin\adminController@updateProduct',"as" => "admin.updateProduct"]);

//display add Product form
    Route::get('admin/addProduct', ['uses' => 'Admin\adminController@addProduct',"as" => "addProduct"]);

    //get admin panel and show all the products
    Route::get('admin', ['uses' => 'Admin\adminController@index',"as" => "admin"]);


//display edit form
    Route::get('admin/editProduct/{id}', ['uses' => 'Admin\adminController@editProduct',"as" => "admin.editProduct"]);

    Route::get('admin/showOrders', ['uses' => 'Admin\adminController@showOrders',"as" => "showOrders"]);

    //post edit order changes form
    Route::get('admin/editOrder/{id}', ['uses' => 'Admin\adminController@editOrder',"as" => "editOrder"]);


    //post edit product changes form
    Route::post('admin/updateOrder/{id}', ['uses' => 'Admin\adminController@updateOrder',"as" => "updateOrder"]);


    //delete Order
    Route::get('admin/deleteOrder/{id}', ['uses' => 'Admin\adminController@deleteOrder',"as" => "deleteOrder"]);

    //Order Info
    Route::get('admin/orderInfo/{id}', ['uses' => 'Admin\adminController@orderInfo',"as" => "orderInfo"]);

});





