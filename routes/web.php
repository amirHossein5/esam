<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\FAQCategoryController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Market\AmazingSaleController;
use App\Http\Controllers\Admin\Market\AttributeController;
use App\Http\Controllers\Admin\Market\ColorController;
use App\Http\Controllers\Admin\Market\CopanController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\LandingPageCopanController;
use App\Http\Controllers\Admin\Market\LandingPageCopans;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\PaymentController;
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

        //order
        Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{order}/items', 'orderItems')->name('orderItems');
            Route::get('/sending', 'sending')->name('sending');
            Route::get('/unpaid', 'unpaid')->name('unpaid');
            Route::get('/rejected', 'rejected')->name('rejected');
            Route::get('/returned', 'returned')->name('returned');

            // change statuses
            // delivery status
            Route::get('/order-sent/{order}', 'orderSent')->name('orderSent');
            Route::get('/order-not-sent/{order}', 'orderNotSent')->name('orderNotSent');
            Route::get('/order-received/{order}', 'orderReceived')->name('orderReceived');
            Route::get('/order-is-sending/{order}', 'orderIsSending')->name('orderIsSending');

            // order status
            Route::get('/not-accepted/{order}', 'notAccepted')->name('notAccepted');
            Route::get('/accepted/{order}', 'accepted')->name('accepted');
            Route::get('/waiting-for-accept/{order}', 'waitingForAccept')->name('waitingForAccept');

            // payment status
            Route::get('/changeStatus/{order}/{status_number}', 'changeStatus')->name('payment.changeStatus');

            Route::get('/{order}', 'show')->name('show');
        });

        //payment
        Route::prefix('payment')->name('payment.')->controller(PaymentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/changeStatus/{payment}/{status_number}', 'changeStatus')->name('changeStatus');
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

        //discount
        Route::prefix('discount')->name('discount.')->group(function () {

            // amzing sale
            Route::prefix('amazing-sale')->name('amazingSale.')->controller(AmazingSaleController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/edit/{amazingSale}', 'edit')->name('edit');
                Route::put('/{amazingSale}', 'update')->name('update');
                Route::delete('/{amazingSale}', 'destroy')->name('destroy');
                Route::get('/changeStatus/{amazingSale}', 'changeStatus')->name('changeStatus');
            });

            //copans
            Route::prefix('copan')->name('copan.')->controller(CopanController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store')->middleware('toEnglishDigits:discount_ceiling,amount');
                Route::get('/edit/{copan}', 'edit')->name('edit');
                Route::put('/{copan}', 'update')->name('update')->middleware('toEnglishDigits:discount_ceiling,amount');
                Route::delete('/{copan}', 'destroy')->name('destroy');
                Route::get('/changeStatus/{copan}', 'changeStatus')->name('changeStatus');
            });

            // landing page copans
            Route::prefix('landing-page-copans')->name('landingPageCopans.')->controller(LandingPageCopanController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/edit/{landingPageCopan}', 'edit')->name('edit');
                Route::put('/{landingPageCopan}', 'update')->name('update');
                Route::delete('/{landingPageCopan}', 'destroy')->name('destroy');
                Route::get('/changeStatus/{landingPageCopan}', 'changeStatus')->name('changeStatus');
            });
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
        Route::get('unseen', 'unseen')->name('unseen');
        Route::get('closed', 'closed')->name('closed');
        Route::get('open', 'open')->name('open');
        Route::get('/show/{question}', 'show')->name('show');
        Route::post('/{question}', 'store')->name('store');
        Route::get('/edit/{answer}', 'edit')->name('edit');
        Route::put('/{answer}', 'update')->name('update');
        Route::delete('/{answer}', 'destroy')->name('destroy');
        Route::get('changeStatus/{question}', 'changeStatus')->name('changeStatus');
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
