<?php
namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     // return view('welcome');
//     return view('front.index');
// });

Auth::routes();
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cache cleared successfully!";
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Front
Route::name('front.')->group(function() {
    Route::prefix('user')->name('user.')->group(function() {
        Route::middleware('guest:web', 'PreventBackHistory')->group(function() {
            // Route::view('/login', 'front.auth.login')->name('login');
            // Route::view('/register', 'front.auth.register')->name('register');
            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::get('/register', [AuthController::class, 'register'])->name('register');
            Route::post('/create', [AuthController::class, 'create'])->name('create');
            Route::post('/check', [AuthController::class, 'check'])->name('check');
            // Route::post('/check/mobile', [AuthController::class, 'checkMobile'])->name('check.mobile');
        });

        Route::middleware('auth:web', 'PreventBackHistory')->group(function() {
            // profile
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::view('/profile/edit', 'front.profile.edit')->name('profile.edit');
            Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

            // password
            Route::view('/password/edit', 'front.profile.password')->name('password.edit');
            Route::post('/password/update', [ProfileController::class, 'update'])->name('password.update');

            // order
            Route::get('/order', [ProfileController::class, 'order'])->name('order');
            Route::get('/order/{id}', [ProfileController::class, 'orderDetail'])->name('order.detail');

            // address
            Route::get('/address', [ProfileController::class, 'address'])->name('address');
            Route::post('/address/store', [ProfileController::class, 'addressStore'])->name('address.store');
            Route::get('/address/edit/{id}', [ProfileController::class, 'addressedit'])->name('address.edit');
            Route::get('/address/update/{id}', [ProfileController::class, 'addressUpdate'])->name('address.update');
            Route::get('/address/delete/{id}', [ProfileController::class, 'addressdelete'])->name('address.delete');

            Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('wishlist');
        });
    });

    Route::get('/', [IndexController::class, 'index'])->name('home');

    // EPC
    Route::prefix('epc')->name('epc.')->group(function() {
        Route::get('/', [ContentController::class, 'epc'])->name('index');
    });
    // News
    Route::prefix('news')->name('news.')->group(function() {
        Route::get('/{slug}', [ContentController::class, 'NewsDetails'])->name('details');
    });
    // about
    Route::prefix('about')->name('about.')->group(function() {
        Route::get('/', [ContentController::class, 'about'])->name('index');
        Route::get('/email', [ContentController::class, 'send'])->name('email.send');
    });
    // Inner
    Route::prefix('inner')->name('inner.')->group(function() {
        Route::get('/', [ContentController::class, 'InnerContent'])->name('index');
    });
    //Extracurricular
    Route::prefix('extra-curricular')->name('extra-curricular.')->group(function() {
        Route::get('/', [ContentController::class, 'Extracurricular'])->name('index');
    });
    //blogs
    Route::prefix('blogs')->name('blogs.')->group(function() {
        Route::get('/', [ContentController::class, 'blogs'])->name('index');
    });
    //academics
    Route::prefix('academics')->name('academics.')->group(function() {
        Route::get('/', [ContentController::class, 'academics'])->name('index');
    });
    //contactUs
    Route::prefix('contactUs')->name('contactUs.')->group(function() {
        Route::get('/', [ContentController::class, 'contactUs'])->name('index');
    });
    //lead
    //  Route::prefix('lead')->name('lead.')->group(function() {
                // Route::get('/', [ContentController::class, 'LeadIndex'])->name('index');
                // Route::get('/create', [ContentController::class, 'LeadCreate'])->name('create');
                Route::post('/store', [ContentController::class, 'LeadStore'])->name('store');
                // Route::get('/view/{id}', [ContentController::class, 'LeadView'])->name('view');
                // Route::get('/edit/{id}', [ContentController::class,'LeadEdit'])->name('edit');
                // Route::post('/update', [ContentController::class, 'LeadUpdate'])->name('update');
                // Route::get('/delete/{id}', [ContentController::class, 'LeadDelete'])->name('delete');
                // Route::get('/status/{id}', [ContentController::class, 'LeadStatus'])->name('status');
        // });

  

    // Inner
    

    // about
    Route::prefix('career')->name('career.')->group(function() {
        Route::get('/', [ContentController::class, 'career'])->name('index');
        Route::get('/confirmation', [ContentController::class, 'confirmation'])->name('confirmation');
        Route::get('/{slug}', [ContentController::class, 'CareerApplicationForm'])->name('application.form');
        Route::get('/register/email/verification', [ContentController::class, 'RegisterEmailVerification'])->name('register.email.verification');
        Route::post('/register/application/submit', [ContentController::class, 'RegisterFinalSubmit'])->name('application.form.submit');
    });

    Route::get('/products/{slug}', [ContentController::class, 'WireRodIndex'])->name('wireindex');
    Route::get('category/{cat}/{slug}', [ContentController::class, 'ProductDetails'])->name('wire.product.details');

    // contact
    Route::prefix('contact')->name('contact.')->group(function() {
        Route::get('/', [ContentController::class, 'contact'])->name('index');
        Route::post('/enquiry', [ContentController::class, 'contactEnquiry'])->name('enquiry');
    });

    // category
    Route::prefix('category')->name('category.')->group(function() {
        Route::get('{slug}', [CategoryController::class, 'level1detail'])->name('level1.detail');
        Route::get('{level1slug}/{level2slug}', [CategoryController::class, 'level2detail'])->name('level2.detail');
        Route::get('{level1slug}/{level2slug}/{level3slug}', [CategoryController::class, 'level3detail'])->name('level3.detail');
    });

    // product
    Route::prefix('product')->name('product.')->group(function() {
    // Route::name('product.')->group(function() {
        Route::get('{slug}', [ProductController::class, 'detail'])->name('detail');
        Route::post('/enquiry', [ProductController::class, 'enquiry'])->name('enquiry');
    });

    // glossary
    Route::prefix('glossary')->name('glossary.')->group(function() {
        Route::get('/', [GlossaryController::class, 'index'])->name('index');
    });

    // blog
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('{slug}', [BlogController::class, 'detail'])->name('detail');
    });

    // service
    Route::prefix('service')->name('service.')->group(function() {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('{slug}', [ServiceController::class, 'detail'])->name('detail');
    });

    // search
    Route::prefix('search')->name('search')->group(function() {
        Route::post('/', [SearchController::class, 'index']);
    });
    Route::prefix('client')->group(function(){
        Route::get('/', [ContentController::class, 'clientList'])->name('client.list');
    });
    Route::prefix('certificate')->group(function(){
        Route::get('/', [ContentController::class, 'CertificateList'])->name('certificate.list');
    });
});

// Admin
Route::prefix('admin')->group(function() {
    require 'custom/admin.php';
});
