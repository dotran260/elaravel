<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;

/*|--------------------------------------------------------------------------|*/


// Font-end
Route::get('/', [HomeController::class, 'index']);
Route::get('/send-mail', [HomeController::class, 'send_mail']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/lien-he', [HomeController::class, 'mycv']);
Route::get('/tin-tuc', [HomeController::class, 'tin_tuc']);
Route::post('/tim-kiem', [HomeController::class, 'search']);

// Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);


// Back-end
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

// Category Product (Danh mục sản phẩm)
// [GET]
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);
// [POST]
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);

// Brand Product (Hiệu sản phẩm)
// [GET]
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);
// [POST]
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);

// Product (Sản phẩm)
// [GET]
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
// [POST]
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

//Cart
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);

Route::get('/gio-hang', [CartController::class, 'gio_hang']); //cart ajax
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']); //add ajax
Route::get('/delete-sp/{session_id}', [CartController::class, 'delete_sp']); //delete ajax
Route::get('/delete-all', [CartController::class, 'delete_all']); //delete ajax
Route::post('/update-sp', [CartController::class, 'update_sp']); //update ajax

// COUPON (mã giảm giá)
Route::post('/check-coupon', [CouponController::class, 'check_coupon']);
Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
Route::post('/save-coupon', [CouponController::class, 'save_coupon']);
Route::get('/all-coupon', [CouponController::class, 'all_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);

// CHECKOUT
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);  // dẫn đến form đăng nhập hoặc đăng ký
Route::get('/checkout', [CheckoutController::class, 'checkout']); //Thông tin chuyển hàng
Route::get('/login-customer', [CheckoutController::class, 'login_customer']); // Đăng nhập
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']); //Đăng xuất
Route::get('/payment', [CheckoutController::class, 'payment']); //Thanh Toán
Route::get('/forgot-password', [CheckoutController::class, 'forgot_password']); //Thanh Toán
Route::get('/delete-fee', [CheckoutController::class, 'delete_fee']); //Xoá phí vận chuyển

Route::post('/save-customer', [CheckoutController::class, 'save_customer']); //Đăng ký
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee']); //Phí vận chuyển
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']); //lưu thông tin đơn hàng
Route::post('/order-place', [CheckoutController::class, 'order_place']); //lưu thông tin đơn hàng
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']); //lưu thông tin đơn hàng


// MANAGE ORDER
// Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
// Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);
// Route::get('/delete-order/{orderId}', [CheckoutController::class, 'delete_order']);

//Login facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);

//Login  google
Route::get('/login-google', [AdminController::class, 'login_google']);
Route::get('/google/callback', [AdminController::class, 'callback_google']);

//Delevery ajax
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);

// Order
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{orderCode}', [OrderController::class, 'view_order']);


