<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
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
        Route::prefix('category')->name('category.')->controller(ProductCategory::class)->group(function () {
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

        // questions-answers
        Route::prefix('questions')->name('questions.')->controller(QuestionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{question}', 'show')->name('show');
            Route::post('/store/{question}', 'store')->name('store');
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
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/archive', [ProductController::class, 'archive'])->name('archive');
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store')
            ->middleware('toEnglishDigits:price,productColorsPriceIncrease');
            Route::put('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
            Route::delete('/forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('forceDelete');
            //gallery
            Route::prefix('{product}')->name('gallery.')->group(function () {
                Route::get('/gallery', [GalleryController::class, 'index'])->name('index');
                Route::post('/gallery/store', [GalleryController::class, 'store'])->name('store');
                Route::delete('/gallery/{gallery}/destroy', [GalleryController::class, 'destroy'])->name('destroy');
            });
        });

        //attribute
        Route::prefix('attribute')->name('attribute.')->group(function () {
            Route::get('/', [AttributeController::class, 'index'])->name('index');
            Route::get('/show', [AttributeController::class, 'show'])->name('show');
            Route::get('/create', [AttributeController::class, 'create'])->name('create');
            Route::post('/store', [AttributeController::class, 'store'])->name('store');
            Route::delete('/destroy/{attribute}', [AttributeController::class, 'destroy'])->name('destroy');

            // attribute value
            Route::prefix("value")->name('value.')->group(function () {
                Route::get('{attribute}/index/', [AttributeValueController::class, 'index'])->name('index');
                Route::get('/create/{productCategory}', [AttributeValueController::class, 'create'])->name('create');
                Route::post('/store', [AttributeValueController::class, 'store'])->name('store');
                Route::delete('/destroy/{attributeValue}', [AttributeValueController::class, 'destroy'])->name('destroy');
            });

            Route::post('/getInputParser/', [AttributeController::class, 'getInputParser'])->name('getInputParser');
        });
    });

    // content
    Route::prefix('content')->name('content.')->group(function () {

        //faq categories
        Route::prefix('faq-categories')->name('faqCategories.')->group(function () {
            Route::get('/', [FAQController::class, 'index'])->name('index');
            Route::get('/archive', [FAQController::class, 'archive'])->name('archive');
            Route::get('datatable', [FAQController::class, 'indexDatatable'])->name('datatable.index');
            Route::get('datatable/archive', [FAQController::class, 'archiveDatatable'])->name('datatable.archive');
            Route::get('/create', [FAQController::class, 'create'])->name('create');
            Route::post('/store', [FAQController::class, 'store'])->name('store');
            Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('edit');
            Route::put('/update/{faq}', [FAQController::class, 'update'])->name('update');
            Route::put('restore/{id}', [FAQController::class, 'restore'])->name('restore');
            Route::delete('/destroy/{faq}', [FAQController::class, 'destroy'])->name('destroy');
            Route::delete('forceDelete/{id}', [FAQController::class, 'forceDelete'])->name('forceDelete');
            Route::get('changeStatus/{faq}', [FAQController::class, 'changeStatus'])->name('changeStatus');
        });

        //faq
        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::get('/', [FAQController::class, 'index'])->name('index');
            Route::get('/archive', [FAQController::class, 'archive'])->name('archive');
            Route::get('datatable', [FAQController::class, 'indexDatatable'])->name('datatable.index');
            Route::get('datatable/archive', [FAQController::class, 'archiveDatatable'])->name('datatable.archive');
            Route::get('/create', [FAQController::class, 'create'])->name('create');
            Route::post('/store', [FAQController::class, 'store'])->name('store');
            Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('edit');
            Route::put('/update/{faq}', [FAQController::class, 'update'])->name('update');
            Route::put('restore/{id}', [FAQController::class, 'restore'])->name('restore');
            Route::delete('/destroy/{faq}', [FAQController::class, 'destroy'])->name('destroy');
            Route::delete('forceDelete/{id}', [FAQController::class, 'forceDelete'])->name('forceDelete');
            Route::get('changeStatus/{faq}', [FAQController::class, 'changeStatus'])->name('changeStatus');
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
    });

    // users
    Route::prefix('user')->name('user.')->group(function () {
        //admin-user
        Route::prefix('admin-user')->name('admin-user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('{admin}/permissions/', [PermissionController::class,'edit'])->name('permissions');
            Route::put('{admin}/permissions/', [PermissionController::class,'update'])->name('permissions.update');
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
        Route::get('index')->name('index');
        Route::get('unseen')->name('unseen');
        Route::get('closed')->name('closed');
        Route::get('open')->name('open');
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
