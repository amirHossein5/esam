<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\FAQCategoryController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Market\AttributeController;
use App\Http\Controllers\Admin\Market\ColorController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\SelectableAttributeController;
use App\Http\Controllers\Admin\Market\SelectableAttributeValueController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\SupportController;
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


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // market
    Route::prefix('market')->name('market.')->group(function () {

        //category
        Route::prefix('category')->name('category.')->controller(ProductCategoryController::class)->group(function () {
            Route::get('/archive', 'archive')->name('archive');
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{productCategory}', 'edit')->name('edit');
            Route::put('/update/{productCategory}', 'update')->name('update');
            Route::put('/restore/{id}', 'restore')->name('restore');
            Route::delete('/destroy/{productCategory}', 'destroy')->name('destroy');
            Route::delete('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
            Route::get('/changeShowInMenu/{productCategory}', 'changeShowInMenu')->name('changeShowInMenu');
        });

        // selectable attributes
        Route::prefix('selectable-attributes')->name('selectableAttributes.')->controller(SelectableAttributeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{selectableAttribute}', 'edit')->name('edit');
            Route::put('/{selectableAttribute}', 'update')->name('update');
            Route::delete('/destroy/{selectableAttribute}', 'destroy')->name('destroy');
        });

        //discount
        Route::prefix('discount')->name('discount.')->group(function () {
            Route::get('/copan', [DiscountController::class, 'copan'])->name('copan');
            Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('copan.create');

            Route::prefix('landing-page-copans')->name('landingPageCopans.')->controller(LandingPageCopans::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::delete('destroy/{landingPageCopan}', 'destroy')->name('destroy');
            });
        });

        //order
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', [OrderController::class, 'all'])->name('all');
            Route::get('/new-order', [OrderController::class, 'newOrders'])->name('newOrders');
            Route::get('/sending', [OrderController::class, 'sending'])->name('sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('returned');
            Route::get('/show', [OrderController::class, 'show'])->name('show');
            Route::get('/change-send-status', [OrderController::class, 'changeSellStatus'])->name('changeSellStatus');
            Route::get('/change-order-status', [OrderController::class, 'changeOrderStatus'])->name('changeOrderStatus');
            Route::get('/cancel-order', [OrderController::class, 'cancelOrder'])->name('cancelOrder');
        });

        //payment
        Route::prefix('payment')->name('payment.')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('index');
            Route::get('/online', [PaymentController::class, 'online'])->name('online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('offline');
            Route::get('/cash', [PaymentController::class, 'cash'])->name('cash');
            Route::get('/reject/{payment}', [PaymentController::class, 'reject'])->name('reject');
            Route::get('/return/{payment}', [PaymentController::class, 'return'])->name('return');
            Route::get('/paid/{payment}', [PaymentController::class, 'paid'])->name('paid');
            Route::get('/notPaid/{payment}', [PaymentController::class, 'notPaid'])->name('notPaid');
        });

        //product
        Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
            Route::get('/archive', 'archive')->name('archive');
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store')
                ->middleware(['json_decode:productVariants,true', 'toEnglishDigits:productVariants.*.price,productVariants.*.number,number,price,start_price,urgent_price,reserved_price']);
            Route::get('/edit/{product}', 'edit')->name('edit');
            Route::put('/{product}', 'update')->name('update')
                ->middleware(['json_decode:productVariants,true', 'toEnglishDigits:productVariants.*.price,productVariants.*.number,number,price,start_price,urgent_price,reserved_price']);
            Route::put('/restore/{id}', 'restore')->name('restore');
            Route::delete('/destroy/{product}', 'destroy')->name('destroy');
            Route::delete('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
            Route::get('/changeMarketable/{product}', 'changeMarketable')->name('changeMarketable');

            //gallery
            Route::prefix('{product}')->name('gallery.')->controller(GalleryController::class)->group(function () {
                Route::get('/gallery', 'index')->name('index');
                Route::post('/gallery/store', 'store')->name('store');
                Route::delete('/gallery/{gallery}/destroy', 'destroy')->name('destroy');
            });
        });

        //attribute
        Route::prefix('attribute')->name('attribute.')->controller(AttributeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{attribute}/{productCategory}', 'destroy')->name('destroy');
        });
    });

    // content
    Route::prefix('content')->name('content.')->group(function () {

        //faq categories
        Route::prefix('faq-category')->name('faqCategory.')->controller(FAQCategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{faqCategory}', 'edit')->name('edit');
            Route::put('/update/{faqCategory}', 'update')->name('update');
            Route::delete('/destroy/{faqCategory}', 'destroy')->name('destroy');
            Route::get('changeStatus/{faqCategory}', 'changeStatus')->name('changeStatus');
        });

        //faq
        Route::prefix('faq')->name('faq.')->controller(FAQController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{faq}', 'edit')->name('edit');
            Route::put('/update/{faq}', 'update')->name('update');
            Route::delete('/destroy/{faq}', 'destroy')->name('destroy');
            Route::get('changeStatus/{faq}', 'changeStatus')->name('changeStatus');
        });

        //page
        Route::prefix('page')->name('page.')->group(function () {
            Route::get('/', [PageController::class, 'index'])->name('index');
            Route::get('/datatable', [PageController::class, 'indexDatatable'])->name('datatable.index');
            Route::get('/create', [PageController::class, 'create'])->name('create');
            Route::post('/store', [PageController::class, 'store'])->name('store');
            Route::get('/edit/{page}', [PageController::class, 'edit'])->name('edit');
            Route::put('/update/{page}', [PageController::class, 'update'])->name('update');
            Route::delete('/destroy/{page}', [PageController::class, 'destroy'])->name('destroy');
            Route::get('changeStatus/{page}', [PageController::class, 'changeStatus'])->name('changeStatus');
        });

        //banners
        Route::prefix('banner')->name('banner.')->controller(BannerController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{banner}', 'edit')->name('edit');
            Route::put('/update/{banner}', 'update')->name('update');
            Route::delete('/destroy/{banner}', 'destroy')->name('destroy');
        });
    });

    // users
    Route::prefix('user')->name('user.')->group(function () {
        //admin-user
        Route::prefix('admin-user')->name('admin-user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('{admin}/permissions/', [PermissionController::class, 'edit'])->name('permissions');
            Route::put('{admin}/permissions/', [PermissionController::class, 'update'])->name('permissions.update');
            Route::get('/edit/{admin}', 'edit')->name('edit');
            Route::put('/update/{admin}', 'update')->name('update');
            Route::delete('/destroy/{admin}', 'destroy')->name('destroy');
            Route::get('/status/{admin}', 'status')->name('status');
        });

        //customer
        Route::prefix('customer')->name('customer.')->controller(CustomerController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{customer}', 'edit')->name('edit');
            Route::put('/update/{customer}', 'update')->name('update');
            Route::put('/upgradeToAdmin/{customer}', 'upgradeToAdmin')->name('upgradeToAdmin');
            Route::delete('/destroy/{customer}', 'destroy')->name('destroy');
            Route::get('/status/{customer}', 'status')->name('status');
        });

        //role
        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('edit');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('destroy');
        });
    });

    // support
    Route::prefix('support')->name('support.')->controller(SupportController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('/show/{support}', 'show')->name('show');
        Route::post('/{support}', 'store')->name('store');
        Route::get('unseen', 'unseen')->name('unseen');
        Route::get('closed', 'closed')->name('closed');
        Route::get('open', 'open')->name('open');
    });

    // notify
    Route::prefix('notify')->name('notify.')->group(function () {
        //email
        Route::prefix('email')->name('email.')->controller(EmailController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/archive', 'archive')->name('archive');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{email}', 'edit')->name('edit');
            Route::put('/update/{email}', 'update')->name('update');
            Route::put('/restore/{id}', 'restore')->name('restore');
            Route::delete('/destroy/{email}', 'destroy')->name('destroy');
            Route::delete('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
            Route::get('/changeStatus/{email}', 'changeStatus')->name('changeStatus');
        });

        //email file
        Route::prefix('email-file')->name('emailFile.')->controller(EmailFileController::class)->group(function () {
            Route::get('/{id}', 'index')->name('index');
            Route::post('/{email}/store', 'store')->name('store');
            Route::post('/download/{file}', 'download')->name('download');
            Route::put('/{email}/update/{file}', 'update')->name('update');
            Route::delete('/destroy/{file}', 'destroy')->name('destroy');
            Route::get('/changeStatus/{file}', 'changeStatus')->name('changeStatus');
            Route::post('/uploadFile', 'uploadFile')->name('uploadFile');
        });

        //sms
        Route::prefix('sms')->name('sms.')->controller(SMSController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/archive', 'archive')->name('archive');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{sms}', 'edit')->name('edit');
            Route::put('/update/{sms}', 'update')->name('update');
            Route::put('/restore/{id}', 'restore')->name('restore');
            Route::delete('/destroy/{sms}', 'destroy')->name('destroy');
            Route::delete('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
            Route::get('/changeStatus/{sms}', 'changeStatus')->name('changeStatus');
        });
    });

    // settings
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });
});


/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('app.index');
})->name('app.index');

Route::name('app.service.')->prefix('service')->group(function () {
    Route::get('/', function () {
        return view('app.service.index');
    })->name('index');

    Route::get('/show/10', function () {
        return view('app.service.show');
    })->name('index');
});

Route::name('product.')->group(function () {
    Route::get('item/10/mac', function () {
        return view('app.products.show');
    })->name('item');

    Route::get('search', function () {
        return view('app.products.search');
    })->name('item');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
