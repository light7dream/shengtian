<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/product-list', [HomeController::class, 'viewProductListPage']);
Route::get('/help', [HomeController::class, 'viewHelpPage']);
// Route::get('/identify-by-qrcode', [HomeController::class, 'viewIdentifyByQRCodePage']);
// Route::post('/api/identify-by-qrcode', [HomeController::class, 'identifyByQRCode']);

Route::middleware(['member'])->group(function () {
    Route::get('/login', [HomeController::class, 'viewLoginPage']);
    Route::get('/register', [HomeController::class, 'viewRegisterPage']);
    Route::get('/cart', [HomeController::class, 'viewCartPage']);
    Route::get('/mine', [HomeController::class, 'viewMinePage']);
    Route::get('/new-order', [HomeController::class, 'viewNewOrderPage']);
    Route::get('/order-back/{id}', [HomeController::class, 'viewOrderBackPage']);
    Route::get('/product-details/{id}', [HomeController::class, 'viewProductDetailsPage']);
    Route::get('/invoices/{id}', [HomeController::class, 'viewInvoicePage']);
    Route::post('/api/invoice/sign', [HomeController::class, 'signInvoice']);

    Route::post('/api/add-cart',[HomeController::class, 'addCart']);
    Route::post('/api/delete-cart',[HomeController::class, 'deleteCart']);

    Route::post('/api/ready-order',[HomeController::class, 'readyOrder']);
    Route::post('/api/add-order', [HomeController::class, 'addOrder']);
    Route::post('/api/confirm-order', [HomeController::class, 'confirmOrder']);
    Route::post('/api/open-carts', [HomeController::class, 'getOpenCarts']);
});
/**
 * ADMIN
 */
Route::middleware(['admin'])->group(function () {
    
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/catalog/products', [AdminController::class, 'viewProductsPage']);
Route::get('/admin/catalog/add-product', [AdminController::class, 'viewAddProductPage']);
Route::get('/admin/catalog/edit-product/{id}', [AdminController::class, 'viewEditProductPage']);
Route::get('/admin/catalog/categories', [AdminController::class, 'viewCategoriesPage']);
Route::get('/admin/catalog/add-category', [AdminController::class, 'viewAddCategoryPage']);
Route::get('/admin/catalog/edit-category/{id}', [AdminController::class, 'viewEditCategoryPage']);


// Route::get('/admin/members/senders', [AdminController::class, 'viewSendersPage']);
// Route::get('/admin/members/sender-details/{id}', [AdminController::class, 'viewSenderDetailsPage']);
// Route::get('/admin/members/add-sender', [AdminController::class, 'viewAddSenderPage']);
// Route::get('/admin/members/edit-sender/{id}', [AdminController::class, 'viewEditSenderPage']);

/**
 * 
 * 2023/4/2
 */
Route::get('/admin/members', [AdminController::class, 'viewMembersPage']);
Route::get('/admin/members/edit-member/{id}', [AdminController::class, 'viewEditMemberPage']);
Route::post('/api/members/add-member', [AdminController::class, 'addMember']);
Route::post('/api/members/edit-member', [AdminController::class, 'editMember']);
Route::post('/api/members/delete-member', [AdminController::class, 'deleteMember']);
Route::post('/api/members/recharge', [AdminController::class, 'recharge']);


Route::get('/admin/sales/orders', [AdminController::class, 'viewSalesPage']);
Route::get('/admin/sales/add-order', [AdminController::class, 'viewAddOrderPage']);
Route::get('/admin/sales/details/{id}', [AdminController::class, 'viewOrderDetailsPage']);
Route::get('/admin/sales/edit-order/{id}', [AdminController::class, 'viewEditOrderPage']);

Route::get('/admin/invoices/{id}', [AdminController::class, 'viewInvoicePage']);
Route::get('/admin/invoices/create', [AdminController::class, 'viewCreateInvoicePage']);

Route::get('/admin/supports/about-points', [AdminController::class, 'viewAboutPointsPage']);
Route::get('/admin/supports/rule-clause', [AdminController::class, 'viewRuleClausePage']);
Route::get('/admin/supports/faq', [AdminController::class, 'viewFAQPage']);
Route::get('/admin/supports/online-service', [AdminController::class, 'viewOnlineServicePage']);


Route::get('/admin/account/settings', [AdminController::class, 'viewAccountSettingsPage']);
Route::get('/admin/account/overview', [AdminController::class, 'viewOverviewPage']);
Route::get('/admin/account/security', [AdminController::class, 'viewSecurityPage']);
Route::get('/admin/password/change', [AdminController::class, 'viewAdminPasswordChange']);
Route::get('/admin/game-official-site', [AdminController::class, 'viewOfficialSite']);
Route::get('/admin/setting/banner', [AdminController::class, 'viewBannerImage']);


/**
 * API
 */

Route::post('/api/catalog/add-category',[AdminController::class, 'addCategory']);
Route::post('/api/catalog/edit-category',[AdminController::class, 'editCategory']);
Route::post('/api/catalog/delete-category',[AdminController::class, 'deleteCategory']);
Route::post('/api/catalog/add-product',[AdminController::class, 'addProduct']);
Route::post('/api/catalog/edit-product',[AdminController::class, 'editProduct']);
Route::post('/api/catalog/delete-product',[AdminController::class, 'deleteProduct']);
Route::post('/api/edit-order', [AdminController::class, 'editOrder']);
Route::post('/api/delete-order', [AdminController::class, 'deleteOrder']);
Route::post('/api/deliver', [AdminController::class, 'deliver']);

Route::post('/api/support/about-point',[AdminController::class, 'aboutPoint']);
Route::get('/api/support/about-point',[AdminController::class, 'getAboutContent']);  
Route::post('/api/support/rules-clauses',[AdminController::class, 'rulesAndClauses']);
Route::get('/api/support/rules-clauses',[AdminController::class, 'getRulesAndClauses']);  
Route::post('/api/support/add-faq',[AdminController::class, 'addFaq']);
Route::post('/api/support/edit-faq',[AdminController::class, 'editFaq']);
Route::post('/api/support/delete-faq',[AdminController::class, 'deleteFaq']);
Route::get('/api/support/get-all-faq',[AdminController::class, 'getAllFaq']);

Route::post('/api/online-service/add-service',[AdminController::class, 'addOnlineService']);
Route::post('/api/online-service/edit-service',[AdminController::class, 'editOnlineService']);
Route::post('/api/online-service/delete-service',[AdminController::class, 'deleteOnlineService']);
Route::post('/api/admin/edit-password', [AdminController::class, 'editPassword']);

Route::post('/api/admin/edit-game-official-site', [AdminController::class, 'editOfficialSite']);
Route::post('/api/setting/add-banner', [AdminController::class, 'addBanner']);
Route::post('/api/setting/edit-banner', [AdminController::class, 'editBanner']);
Route::post('/api/setting/delete-banner', [AdminController::class, 'deleteBanner']);

});


/**
 * 
 * 
 */
Route::post('/api/member/login', [AuthController::class, 'login']);
Route::post('/api/member/logout', [AuthController::class, 'logout']);
// Route::post('/api/member/register', [AuthController::class, 'register']);



/** */

