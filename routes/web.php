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

Route::get('/',[\App\Http\Controllers\FrontendController::class,'index'])->name('front');

//about us
Route::get('/about-us',[\App\Http\Controllers\FrontendController::class,'about_us'])->name('about.us');

//blog
Route::get('/blog',[\App\Http\Controllers\FrontendController::class,'blog'])->name('blog');
Route::get('/blog-details/{id}',[\App\Http\Controllers\FrontendController::class,'blog_details'])->name('blog.details');
Route::post('/blog-comment-save',[\App\Http\Controllers\FrontendController::class,'blog_comment_save'])->name('blog.comment.save');

//contact us
Route::get('/contact-us',[\App\Http\Controllers\FrontendController::class,'contact_us'])->name('contact.us');

//all prouct
Route::get('/all-product',[\App\Http\Controllers\FrontendController::class,'all_product'])->name('all.product');
Route::get('/search-product',[\App\Http\Controllers\FrontendController::class,'search_product'])->name('search.product');
Route::get('/product-details/{slug}/{p_id}',[\App\Http\Controllers\FrontendController::class,'product_details'])->name('product.details');
Route::post('/product-review-save',[\App\Http\Controllers\FrontendController::class,'product_review_save'])->name('product.review.save');
Route::get('/category/{cat_sug}/{cat_id}/{cat_type}',[\App\Http\Controllers\FrontendController::class,'category_product'])->name('category.product');

//filter
Route::post('/all-product-filter',[\App\Http\Controllers\FrontendFilterController::class,'all_product_filter'])->name('all.product.filter');
Route::get('/all-product-filter',[\App\Http\Controllers\FrontendFilterController::class,'all_product_filter_get']);

//add to card
Route::post('/add-to-card',[\App\Http\Controllers\FrontendController::class,'addt_to_card'])->name('add.to.card');
Route::get('/view-cart',[\App\Http\Controllers\FrontendController::class,'view_cart'])->name('view.cart');
Route::post('/update-shopping-cart',[\App\Http\Controllers\FrontendController::class,'update_shopping_cart'])->name('update.shopping.cart');
Route::get('/cart-item-remove/{id}',[\App\Http\Controllers\FrontendController::class,'cart_item_remove'])->name('cart.item.remove');





//user section

Route::post('/user-register-save',[\App\Http\Controllers\CustomLoginController::class,'custom_register_save'])->name('user.register.save');
Route::post('/user-login-submit',[\App\Http\Controllers\CustomLoginController::class,'custom_login_submit'])->name('user.custom.login.submit');
Route::get('/verify-otp',[\App\Http\Controllers\CustomLoginController::class,'verify_otp'])->name('verify.otp');
Route::post('/verify-otp-submit',[\App\Http\Controllers\CustomLoginController::class,'verify_otp_submit'])->name('user.verify.otp.submit');




//referral register
Route::get('/referral-register/{id}',[\App\Http\Controllers\CustomLoginController::class,'user_referral_register'])->name('user.referral.register');
Route::post('/referral-register-save',[\App\Http\Controllers\CustomLoginController::class,'user_referral_register_save'])->name('user.referral.register.save');


//reset password
Route::get('/reset-password',[\App\Http\Controllers\CustomLoginController::class,'reset_password'])->name('user.forgot.password');
Route::post('/reset-password-submit',[\App\Http\Controllers\CustomLoginController::class,'reset_password_code_submit'])->name('user.reset.password.code.submit');



Route::get('/reset-password-change/{id}',[\App\Http\Controllers\CustomLoginController::class,'reset_password_change'])->name('user.reset.changePassword');
Route::post('/reset-password-change-submit',[\App\Http\Controllers\CustomLoginController::class,'reset_password_change_submit'])->name('user.reset.changePassword.submit');



Route::group(['middleware' => ['auth:sanctum','uverify']], function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

        Route::post('/add-cart', [\App\Http\Controllers\User\UserCheckoutController::class,'add_cart'])->name('user.add.tocart');
        Route::get('/checkout', [\App\Http\Controllers\User\UserCheckoutController::class,'checkout'])->name('checkout');
        Route::post('/user-order-save', [\App\Http\Controllers\User\UserOrderController::class,'user_order_save'])->name('user.order.save');

        //account activation
        Route::post('/account-activation-submit', [\App\Http\Controllers\User\UserController::class,'account_activation_submit'])->name('user.acccount.activation.submit');


        //create user
        Route::get('/create-user', [\App\Http\Controllers\User\UserManageController::class,'create_user'])->name('user.create.user');
        Route::post('/create-user-save', [\App\Http\Controllers\User\UserManageController::class,'create_user_save'])->name('user.create.user.save');
        Route::get('/user-list', [\App\Http\Controllers\User\UserManageController::class,'user_list'])->name('user.created.user.list');
        Route::post('/user-send-money', [\App\Http\Controllers\User\UserManageController::class,'user_send_money'])->name('user.send.money');





        //my orders
        Route::get('/my-orders', [\App\Http\Controllers\User\UserOrderController::class,'my_orders'])->name('my.orders');
        Route::get('/my-orders-get', [\App\Http\Controllers\User\UserOrderController::class,'my_orders_get'])->name('user.get.myorders');
        Route::get('/order-details/{id}', [\App\Http\Controllers\User\UserOrderController::class,'order_details'])->name('user.order.details');

        //show products
        Route::get('/show-products', [\App\Http\Controllers\User\UserProductsController::class,'show_products'])->name('user.products');
        Route::get('/product-info/{id}', [\App\Http\Controllers\User\UserProductsController::class,'product_info'])->name('user.product.info');
        Route::post('/product-review-save', [\App\Http\Controllers\User\UserProductsController::class,'product_review_save'])->name('user.product.info.review.save');
        Route::get('/product-cart', [\App\Http\Controllers\User\UserProductsController::class,'product_cart'])->name('user.cart');
        Route::post('/product-cart-single-save', [\App\Http\Controllers\User\UserProductsController::class,'product_cart_single_save'])->name('user.cart.single.save');
        Route::get('/product-checkout', [\App\Http\Controllers\User\UserProductsController::class,'product_checkout'])->name('user.checkout.page');

        //shipping address
        Route::get('/shipping-address', [\App\Http\Controllers\User\UserController::class,'shipping_address'])->name('user.shipping.address');
        Route::post('/shipping-address-save', [\App\Http\Controllers\User\UserController::class,'shipping_address_save'])->name('user.shipping.address.save');
        Route::post('/shipping-address-update', [\App\Http\Controllers\User\UserController::class,'shipping_address_update'])->name('user.shipping.address.update');
        Route::post('/shipping-address-delete', [\App\Http\Controllers\User\UserController::class,'shipping_address_delete'])->name('user.shipping.address.delete');

        //change password
        Route::get('/change-password', [\App\Http\Controllers\User\UserController::class,'change_password'])->name('user.change.password');
        Route::post('/change-password-update', [\App\Http\Controllers\User\UserController::class,'change_password_update'])->name('user.change.password.update');
    });
});


//admin section
Route::prefix('admin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'showLoginform'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', [\App\Http\Controllers\Admin\AdminController::class,'general_settings'])->name('admin.general.settings');
        Route::post('/general-settings-update', [\App\Http\Controllers\Admin\AdminController::class,'general_settings_update'])->name('admin.general.settings.update');

        //category
        Route::get('/category', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category'])->name('admin.category');
        Route::get('/category-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category_get'])->name('admin.get.category');
        Route::post('/category-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category_save'])->name('admin.category.save');
        Route::post('/category-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category_single'])->name('admin.get.single.category');
        Route::post('/category-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category_update'])->name('admin.category.update');
        Route::post('/category-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'category_delete'])->name('admin.category.delete');



        //sub category
        Route::get('/sub-category', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category'])->name('admin.subcategory');
        Route::get('/sub-category-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category_get'])->name('admin.get.subcategory');
        Route::post('/sub-category-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category_save'])->name('admin.subcategory.save');
        Route::post('/sub-category-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category_single'])->name('admin.get.single.subcategory');
        Route::post('/sub-category-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category_update'])->name('admin.subcategory.update');
        Route::post('/sub-category-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_category_delete'])->name('admin.subcategory.delete');


        //sub sub category
        Route::get('/sub-sub-category', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category'])->name('admin.sub.subcategory');
        Route::get('/sub-sub-category-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category_get'])->name('admin.get.sub.subcategory');
        Route::post('/sub-sub-category-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category_save'])->name('admin.sub.subcategory.save');
        Route::post('/sub-sub-category-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category_single'])->name('admin.get.single.sub.subcategory');
        Route::post('/sub-sub-category-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category_update'])->name('admin.sub.subcategory.update');
        Route::post('/sub-sub-category-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'sub_sub_category_delete'])->name('admin.sub.subcategory.delete');


        //brand
        Route::get('/brand', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand'])->name('admin.brand');
        Route::get('/brand-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand_get'])->name('admin.get.brand');
        Route::post('/brand-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand_save'])->name('admin.brand.save');
        Route::post('/brand-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand_single'])->name('admin.get.single.brand');
        Route::post('/brand-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand_update'])->name('admin.brand.update');
        Route::post('/brand-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'brand_delete'])->name('admin.brand.delete');

        //size
        Route::get('/size', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size'])->name('admin.size');
        Route::get('/size-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size_get'])->name('admin.get.size');
        Route::post('/size-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size_save'])->name('admin.size.save');
        Route::post('/size-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size_single'])->name('admin.get.single.size');
        Route::post('/size-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size_update'])->name('admin.size.update');
        Route::post('/size-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'size_delete'])->name('admin.size.delete');



        //size
        Route::get('/color', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color'])->name('admin.color');
        Route::get('/color-get', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color_get'])->name('admin.get.color');
        Route::post('/color-save', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color_save'])->name('admin.color.save');
        Route::post('/color-single', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color_single'])->name('admin.get.single.color');
        Route::post('/color-update', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color_update'])->name('admin.color.update');
        Route::post('/color-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class,'color_delete'])->name('admin.color.delete');


        //product
        Route::get('/product', [\App\Http\Controllers\Admin\AdminProductController::class,'product'])->name('admin.product');
        Route::get('/product-get', [\App\Http\Controllers\Admin\AdminProductController::class,'product_get'])->name('admin.get.products');
        Route::get('/product-create', [\App\Http\Controllers\Admin\AdminProductController::class,'product_create'])->name('admin.product.create');
        Route::post('/product-save', [\App\Http\Controllers\Admin\AdminProductController::class,'product_save'])->name('admin.product.save');
        Route::get('/product-edit/{id}', [\App\Http\Controllers\Admin\AdminProductController::class,'product_edit'])->name('admin.product.edit');
        Route::post('/product-update', [\App\Http\Controllers\Admin\AdminProductController::class,'product_update'])->name('admin.product.update');

        //order mamagement
        Route::get('/new-orders', [\App\Http\Controllers\Admin\AdminOrderController::class,'new_order'])->name('admin.new.order');
        Route::get('/new-orders-get', [\App\Http\Controllers\Admin\AdminOrderController::class,'new_order_get'])->name('admin.get.neworders');

        Route::get('/approved-orders', [\App\Http\Controllers\Admin\AdminOrderController::class,'approved_details'])->name('admin.approved.order');
        Route::get('/approved-orders-get', [\App\Http\Controllers\Admin\AdminOrderController::class,'approved_details_get'])->name('admin.get.approvedorders');

        Route::get('/rejected-orders', [\App\Http\Controllers\Admin\AdminOrderController::class,'rejected_details'])->name('admin.rejected.order');
        Route::get('/rejected-orders-get', [\App\Http\Controllers\Admin\AdminOrderController::class,'rejected_details_get'])->name('admin.get.rejectedorders');

        Route::get('/delivered-orders', [\App\Http\Controllers\Admin\AdminOrderController::class,'delivered_details'])->name('admin.delivered.order');
        Route::get('/delivered-orders-get', [\App\Http\Controllers\Admin\AdminOrderController::class,'delivered_details_get'])->name('admin.get.deliveredorders');

        Route::get('/order-details/{id}', [\App\Http\Controllers\Admin\AdminOrderController::class,'order_details'])->name('admin.order.details');
        Route::post('/order-update', [\App\Http\Controllers\Admin\AdminOrderController::class,'order_update'])->name('admin.order.update');

        //customer management
        Route::get('/user-management', [\App\Http\Controllers\Admin\AdminUserController::class,'active_customer'])->name('admin.users');
        Route::get('/user-get', [\App\Http\Controllers\Admin\AdminUserController::class,'user_get'])->name('admin.get.users');
        Route::get('/create-user', [\App\Http\Controllers\Admin\AdminUserController::class,'create_user'])->name('admin.create.user');
        Route::post('/create-user-save', [\App\Http\Controllers\Admin\AdminUserController::class,'create_user_save'])->name('admin.user.account.save');
        Route::get('/user-details/{id}', [\App\Http\Controllers\Admin\AdminUserController::class,'user_details'])->name('admin.user.details');
        Route::post('/user-details-update', [\App\Http\Controllers\Admin\AdminUserController::class,'user_details_update'])->name('admin.user.details.update');
        Route::post('/user-delete', [\App\Http\Controllers\Admin\AdminUserController::class,'user_delete'])->name('admin.delete.user');
        Route::post('/user-add-balance', [\App\Http\Controllers\Admin\AdminUserController::class,'user_add_balance'])->name('admin.add.balance.user');


        //user account activation
        Route::get('/user-account-activation-list', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation_list'])->name('admin.users.account.activation');
        Route::get('/user-account-activation-list-get', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation_list_get'])->name('admin.get.users.account.activation');
        Route::get('/user-account-activation-details/{id}', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation_details'])->name('admin.user.activation.details');
        Route::post('/user-account-activation-details-save', [\App\Http\Controllers\Admin\AdminUserController::class,'user_account_activation_details_save'])->name('admin.user.activation.details.save');


        //verify account
        Route::get('/verify-account', [\App\Http\Controllers\Admin\AdminUserController::class,'verify_account'])->name('admin.users.account.verify');
        Route::get('/verify-account-get', [\App\Http\Controllers\Admin\AdminUserController::class,'verify_account_get'])->name('admin.verify.user.get');
        Route::post('/verify-account-submit', [\App\Http\Controllers\Admin\AdminUserController::class,'verify_account_submit'])->name('admin.users.account.verify.submit');



        //frontend slider
        Route::get('/home-slider', [\App\Http\Controllers\Admin\AdminFrontendController::class,'home_slider'])->name('admin.home.slider');
        Route::post('/home-slider-save', [\App\Http\Controllers\Admin\AdminFrontendController::class,'home_slider_save'])->name('admin.home.slider.save');
        Route::post('/home-slider-update', [\App\Http\Controllers\Admin\AdminFrontendController::class,'home_slider_update'])->name('admin.home.slider.update');
        Route::post('/home-slider-delete', [\App\Http\Controllers\Admin\AdminFrontendController::class,'home_slider_delete'])->name('admin.home.slider.delete');

        //static data
        Route::get('/static-data', [\App\Http\Controllers\Admin\AdminFrontendController::class,'static_data'])->name('admin.static.data');
        Route::post('/static-data-update', [\App\Http\Controllers\Admin\AdminFrontendController::class,'static_data_update'])->name('admin.static.data.update');

        //blog
        Route::get('/blog-managment', [\App\Http\Controllers\Admin\AdminBlogController::class,'blog'])->name('admin.blog');
        Route::post('/blog-save', [\App\Http\Controllers\Admin\AdminBlogController::class,'blog_save'])->name('admin.blog.save');
        Route::post('/blog-update', [\App\Http\Controllers\Admin\AdminBlogController::class,'blog_Update'])->name('admin.blog.update');
        Route::post('/blog-delete', [\App\Http\Controllers\Admin\AdminBlogController::class,'blog_delete'])->name('admin.blog.delete');

    });
});

