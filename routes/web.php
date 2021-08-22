<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
//frontend routes
Route::get('/','FrontendController@index');
Auth::routes();

//shop page

Route::get('shop/store','FrontendController@shoppage')->name('shop.page');
Route::get('category/product/show/{category_id}','FrontendController@showCategory');

Route::get('/home', 'HomeController@index')->name('home');
//admin routes
Route::get('admin/home', 'AdminController@index');
Route::get('adminer', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('adminer','Admin\LoginController@login');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');

//=====Category Controller=====
Route::get('admin/categories','Admin\CategoryController@index')->name('admin.category');
Route::post('add/category','Admin\CategoryController@addcategory');
Route::get('category/edit/{cat_id}','Admin\CategoryController@Edit');
Route::post('update/category','Admin\CategoryController@UpdateCat')->name('update.category');
Route::get('category/delete/{cat_id}','Admin\CategoryController@delete');

Route::get('category/inactive/{cat_id}','Admin\CategoryController@Inactive');
Route::get('category/active/{cat_id}','Admin\CategoryController@Active');
//Brand Controller
Route::get('add/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('add/brand','Admin\BrandController@addbrand');
Route::get('brand/edit/{brand_id}','Admin\BrandController@Edit');
Route::post('update/brand','Admin\BrandController@UpdateBrand')->name('update.brand');
Route::get('brand/delete/{brand_id}','Admin\BrandController@DeleteBrand');
Route::get('brand/inactive/{brand_id}','Admin\BrandController@Inactive');
Route::get('brand/active/{brand_id}','Admin\BrandController@Active');

//Product Controller

Route::get('add/product','Admin\ProductController@addProduct')->name('add.product');
Route::post('store/product','Admin\ProductController@storeProduct')->name('store.product');
Route::get('manage/product','Admin\ProductController@manageProduct')->name('manage.product');

Route::get('product/edit/{product_id}','Admin\ProductController@Edit');
Route::post('product/update','Admin\ProductController@Update')->name('update.product');
Route::post('product/image/update','Admin\ProductController@imageUpdate')->name('update.image');
Route::get('product/delete/{product_id}','Admin\ProductController@Delete');
Route::get('product/inactive/{product_id}','Admin\ProductController@Inactive');
Route::get('product/active/{product_id}','Admin\ProductController@Active');

//Order Controller
Route::get('orders','Admin\OrderController@orders')->name('add.orders');
Route::get('admin/order/view/{order_id}','Admin\OrderController@OrderView');
Route::get('user/order','Admin\OrderController@myOrders')->name('user.order');
Route::get('user/order/view/{order_id}','Admin\OrderController@userOrder');


//Coupon Controller

Route::get('add/coupon','Admin\CouponController@index')->name('add.coupon');

Route::post('add/coupons','Admin\CouponController@addCoupon');
Route::get('coupon/edit/{coupon_id}','Admin\CouponController@Edit');
Route::post('update/coupon','Admin\CouponController@UpdateCoupon')->name('update.coupon');
Route::get('coupon/delete/{coupon_id}','Admin\CouponController@DeleteCoupon');
Route::get('coupon/inactive/{coupon_id}','Admin\CouponController@Inactive');
Route::get('coupon/active/{coupon_id}','Admin\CouponController@Active');
Route::get('coupon/destroy','FrontendController@CouponDestroy');

//Cart ROute

Route::post('add/tocart/{product_id}','CartController@AddCart');
Route::get('cart','CartController@CartPage');
Route::get('cart/destroy/{cart_id}','CartController@CartDestroy');
Route::post('cart/quantity/update/{cart_id}','CartController@QuantityUpdate');
Route::post('apply/coupon','CartController@ApplyCoupon');


//Wishlist Controller

Route::get('add/wishlist/{product_id}','WishlistController@AddWishlist');
Route::get('wishlist','WishlistController@WishlistPage');
Route::get('wishlist/destroy/{wishlist_id}','WishlistController@WishlistDestroy');

//Product_Details

Route::get('product/details/{product_id}','FrontendController@ProductDetails');


//Checkout Controller

Route::get('checkout','CheckoutController@CheckOut');

//Order Controller

Route::post('place/order','OrderController@placeOrder')->name('place.order');

Route::get('order/success','OrderController@orderSuccess');