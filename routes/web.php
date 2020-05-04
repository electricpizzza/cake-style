<?php

use App\Favourit;
use App\Order;
use App\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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

//---Admin routes---//
Route::group(['middleware' => ['auth', 'admin']], function() {

Route::get('/dashboard/profile', 'AdminController@index')->name('admin.show');

Route::patch('/admin','AdminController@update')->name('admin.update');

Route::get('/products', 'AdminProductController@index');
Route::get('/orders/pended', 'AdminProductController@pended');
Route::get('/orders', 'AdminProductController@orders');
Route::get('/order/{order}', 'AdminProductController@orderdetail');
Route::patch('/orderstatus/{order}','AdminProductController@orderedit' );
Route::get('/products/add','AdminProductController@add' );
Route::get('/products/{product}','AdminProductController@edit' );



Route::post('/products', 'AdminProductController@create');
Route::patch('/products/{product}', 'AdminProductController@update');
Route::patch('/remove/{product}', function (Product $product) {

    $product->update([
        'showen_as'=>'hiden',
    ]);
    return redirect('/products');

});
});

//---Shop routes---//

Route::get('/product/{product}', 'StoreController@detail');


Route::post('/cart/{product}', 'ShopController@addtocart');
Route::post('/cartremove/{item}', 'ShopController@removefromcart');

Route::get('/checkout', 'ShopController@checkout');
Route::post('/order', 'ShopController@order');
Route::get('/myorders', 'ShopController@myorders');
Route::get('/favourite', function () {
    $favourites =auth()->user()->favourites()->get();
    return view('shop.favourite',compact('favourites'));
});
Route::post('/favourite/add/{id}', function ($id) {

        $favourite =auth()->user()->favourites()->create();
        $favourite->items->create([
            'product_detail_id'=>$id,
            "sexe"=>'f',
            "color"=>'f',
            "size"=>'f',
        ]);
        return response('Liked',202,$favourite);
});


Route::get('/{sexe}/{category}', 'StoreController@index')->name('shop.show');
// Route::get('/sales', function () {
//     $products = Product::where('showen_as','sale')->get();
//     $category = 'Sales'; $sexe = 'w';
//     return view('shop.shop',compact('products','category','sexe'));
// });
Route::get('/about', 'StoreController@about');
Route::get('/contact', 'StoreController@contact');
Route::post('/message', 'StoreController@message');

