<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('home');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
    // Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
    Route::get('/customer-service', 'CustomerService')->name('customerservice');
    Route::post('/contact', 'Contact')->name('contact');
    Route::get('/product-reviews/{id}', 'ProductReview')->name('review');
    Route::get('/top-products', 'TopProducts')->name('topproducts');
    Route::get('/search', 'SearchProducts')->name('search.products');


});



Route::middleware(['auth', 'role:user'])->group(function () {

    Route::controller(ClientController::class)->group(function () {
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('user.pendingorders');
        Route::get('/user-profile/history', 'History')->name('history');
        Route::get('/user-logout', 'UserLogout')->name('userlogout');
        Route::get('/remove-item/{id}', 'RemoveItem')->name('removeitem');
        Route::get('/shipping-address', 'GetAddress')->name('getaddress');
        Route::post('/save-address', 'SaveAddress')->name('saveaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/user-profile/editprofile', 'EditProfile')->name('editprofile');
        Route::post('/user-profile/updateprofile', 'UpdateProfile')->name('updateprofile');
        Route::post('/post-review/{id}', 'PostReview')->name('postreview');
        Route::get('/user-change-password', 'ChangePassword')->name('changepassword');
        Route::post('/user-update-password', 'UpdatePassword')->name('updatepassword');
        Route::get('/user-reviews', 'Reviews')->name('reviews');
        Route::get('/delete-review/{id}', 'DeleteReview')->name('deletereview');
        Route::get('/edit-review/{id}', 'EditReview')->name('editreview');
        Route::post('/update-review', 'UpdateReview')->name('updatereview');



    });
});




Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        Route::get('/admin-logout', 'AdminLogout')->name('adminlogout');
        Route::get('/admin/user-messages', 'UserMessages')->name('messages');
        Route::get('/admin/delete-message/{id}', 'DeleteMessage')->name('deletemessage');
        Route::get('/admin/users', 'UsersList')->name('userslist');
        Route::get('admin/user-delete/{id}', 'DeleteUser')->name('deleteuser');
        Route::get('/reply-message/{id}', 'ReplyMessage')->name('replymessage');
        Route::post('/send-reply/{id}', 'SendReply')->name('sendreply');

    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcatergory/{id}', 'EditSubCategory')->name('editsubcategory');
        Route::get('/admin/delete-subcatergory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');

    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-image/{id}', 'EditProductImage')->name('editproductimage');
        Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');

    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorders');
        Route::get('admin/confirm-order/{id}', 'ConfirmOrder')->name('confirmorder');
        Route::get('admin/reject-order/{id}', 'RejectOrder')->name('rejectorder');
        Route::get('/admin/completeted-orders', 'CompletedOrders')->name('completedorders');
        Route::get('/admin/rejected-order', 'RejectedOrders')->name('rejectedorders');

    });

});

require __DIR__ . '/auth.php';
