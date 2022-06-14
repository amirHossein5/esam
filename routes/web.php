<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Customer\FAQController as CustomerFAQController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Customer\PageController as CustomerPageController;
use App\Http\Controllers\Admin\Market\ColorController;
use App\Http\Controllers\Admin\Market\CopanController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Customer\Auth\AuthController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Customer\Dashboard\GalleryController as DashboardGalleryController;
use App\Http\Controllers\Admin\Market\LandingPageCopans;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Customer\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Customer\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\Market\AttributeController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Market\AmazingSaleController;
use App\Http\Controllers\Admin\Content\FAQCategoryController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\LandingPageCopanController;
use App\Http\Controllers\Admin\Market\SelectableAttributeController;
use App\Http\Controllers\Admin\Market\SelectableAttributeValueController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\Dashboard\DashboardController;
use App\Http\Controllers\Customer\Dashboard\MyAddressesController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProductQuestionController;
use App\Models\Content\Banner;
use App\Models\Content\FAQ;
use App\Models\Content\FAQCategory;
use App\Models\Content\Page;
use App\Models\Market\AmazingSale;
use App\Models\Market\Copan;
use App\Models\Market\LandingPageCopan;
use App\Models\Market\Order;
use App\Models\Market\Payment;
use App\Models\Market\Product;
use App\Models\Market\ProductAttribute;
use App\Models\Market\ProductCategory;
use App\Models\Market\SelectableAttribute;
use App\Models\Notify\Email;
use App\Models\Notify\SMS;
use App\Models\Report;
use App\Models\Setting;

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

Route::prefix('admin')->name('admin.')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::put('/notificationsMarkAsSeen/', [NotificationController::class, 'notificationsMarkAsSeen'])
        ->name('notificationsMarkAsSeen');

    // market
    Route::prefix('market')->name('market.')->group(function () {

        //category
        Route::prefix('category')->name('category.')->middleware('can:viewAny,'.ProductCategory::class)->controller(ProductCategoryController::class)->group(function () {
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
        Route::prefix('selectable-attributes')->name('selectableAttributes.')->middleware('can:viewAny,' . SelectableAttribute::class)->controller(SelectableAttributeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{selectableAttribute}', 'edit')->name('edit');
            Route::put('/{selectableAttribute}', 'update')->name('update');
            Route::delete('/destroy/{selectableAttribute}', 'destroy')->name('destroy');
        });

        //order
        Route::prefix('order')->name('order.')->middleware('can:viewAny,' . Order::class)->controller(OrderController::class)->group(function () {
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
        Route::prefix('payment')->name('payment.')->middleware('can:viewAny,' . Payment::class)->controller(PaymentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/changeStatus/{payment}/{status_number}', 'changeStatus')->name('changeStatus');
        });

        //product
        Route::prefix('product')->name('product.')->middleware('can:viewAny,' . Product::class)->controller(ProductController::class)->group(function () {
            Route::get('/archive', 'archive')->name('archive')->middleware('can:archiveViewAny,' . Product::class);
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store')
                ->middleware(['json_decode:productVariants,true', 'translate_from:money_translation.php', 'translate:product']);
            Route::get('/edit/{product}', 'edit')->name('edit')->middleware('can:update,'.Product::class);
            Route::put('/{product}', 'update')->name('update')
                ->middleware(['json_decode:productVariants,true', 'translate_from:money_translation.php', 'translate:product', 'can:update,' . Product::class]);
            Route::put('/restore/{id}', 'restore')->name('restore');
            Route::delete('/destroy/{product}', 'destroy')->name('destroy')->middleware('can:delete,'.Product::class);
            Route::delete('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
            Route::get('/changeMarketable/{product}', 'changeMarketable')->name('changeMarketable')->middleware('can:change_marketable,'.Product::class);

            //gallery
            Route::prefix('{product}')->name('gallery.')->controller(GalleryController::class)->group(function () {
                Route::get('/gallery', 'index')->name('index');
                Route::post('/gallery/store', 'store')->name('store');
                Route::delete('/gallery/{gallery}/destroy', 'destroy')->name('destroy');
            });
        });

        //attribute
        Route::prefix('attribute')->name('attribute.')->middleware('can:viewAny,'.ProductAttribute::class)->controller(AttributeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{attribute}/{productCategory}', 'destroy')->name('destroy');
        });

        //discount
        Route::prefix('discount')->name('discount.')->group(function () {

            // amzing sale
            Route::prefix('amazing-sale')->name('amazingSale.')->middleware('can:viewAny,' . AmazingSale::class)->controller(AmazingSaleController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/edit/{amazingSale}', 'edit')->name('edit');
                Route::put('/{amazingSale}', 'update')->name('update');
                Route::delete('/{amazingSale}', 'destroy')->name('destroy');
                Route::get('/changeStatus/{amazingSale}', 'changeStatus')->name('changeStatus');
            });

            //copans
            Route::prefix('copan')->name('copan.')->middleware('can:viewAny,'.Copan::class)->controller(CopanController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store')->middleware('toEnglishDigits:discount_ceiling,amount');
                Route::get('/edit/{copan}', 'edit')->name('edit');
                Route::put('/{copan}', 'update')->name('update')->middleware('toEnglishDigits:discount_ceiling,amount');
                Route::delete('/{copan}', 'destroy')->name('destroy');
                Route::get('/changeStatus/{copan}', 'changeStatus')->name('changeStatus');
            });

            // landing page copans
            Route::prefix('landing-page-copans')->name('landingPageCopans.')->middleware('can:viewAny,' . LandingPageCopan::class)->controller(LandingPageCopanController::class)->group(function () {
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
        Route::prefix('faq-category')->name('faqCategory.')->middleware('can:viewAny,' . FAQCategory::class)->controller(FAQCategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{faqCategory}', 'edit')->name('edit');
            Route::put('/update/{faqCategory}', 'update')->name('update');
            Route::delete('/destroy/{faqCategory}', 'destroy')->name('destroy');
            Route::get('changeStatus/{faqCategory}', 'changeStatus')->name('changeStatus');
        });

        //faq
        Route::prefix('faq')->name('faq.')->middleware('can:viewAny,' . FAQ::class)->controller(FAQController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{faq}', 'edit')->name('edit');
            Route::put('/update/{faq}', 'update')->name('update');
            Route::delete('/destroy/{faq}', 'destroy')->name('destroy');
            Route::get('changeStatus/{faq}', 'changeStatus')->name('changeStatus');
        });

        //page
        Route::prefix('page')->name('page.')->middleware('can:viewAny,' . Page::class)->group(function () {
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
        Route::prefix('banner')->name('banner.')->middleware('can:viewAny,' . Banner::class)->controller(BannerController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{banner}', 'edit')->name('edit');
            Route::put('/update/{banner}', 'update')->name('update');
            Route::delete('/destroy/{banner}', 'destroy')->name('destroy');
        });
    });

    // users
    Route::prefix('user')->name('user.')->middleware('is_superadmin')->group(function () {
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
    // Route::prefix('support')->name('support.')->controller(SupportController::class)->group(function () {
    //     Route::get('index', 'index')->name('index');
    //     Route::get('unseen', 'unseen')->name('unseen');
    //     Route::get('closed', 'closed')->name('closed');
    //     Route::get('open', 'open')->name('open');
    //     Route::get('/show/{question}', 'show')->name('show');
    //     Route::post('/{question}', 'store')->name('store');
    //     Route::get('/edit/{answer}', 'edit')->name('edit');
    //     Route::put('/{answer}', 'update')->name('update');
    //     Route::delete('/{answer}', 'destroy')->name('destroy');
    //     Route::get('changeStatus/{question}', 'changeStatus')->name('changeStatus');
    // });

    // reports
    Route::prefix('reports')->name('reports.')->middleware('can:viewAny,' . Report::class)->controller(ReportController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('disabled-for-report', 'disabledForReport')->name('disabledForReport');
        Route::get('not-disabled-for-report', 'notDisabledForReport')->name('notDisabledForReport');
        Route::get('show/{report}', 'show')->name('show');
        Route::put('toggle-disable-product/{report}', 'toggleDisableProduct')->name('toggleDisableProduct')->middleware('can:toggleProduct,' . Report::class);
    });

    // notify
    Route::prefix('notify')->name('notify.')->group(function () {
        //email
        Route::prefix('email')->name('email.')->middleware('can:viewAny,'.Email::class)->controller(EmailController::class)->group(function () {
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
            Route::get('/changeSent/{email}', 'changeSent')->name('changeSent');
        });

        //email file
        Route::prefix('email-file')->name('emailFile.')->middleware('can:viewAny,' . Email::class)->controller(EmailFileController::class)->group(function () {
            Route::get('/{id}', 'index')->name('index');
            Route::post('/{email}/store', 'store')->name('store');
            Route::post('/download/{file}', 'download')->name('download');
            Route::put('/{email}/update/{file}', 'update')->name('update');
            Route::delete('/destroy/{file}', 'destroy')->name('destroy');
            Route::get('/changeStatus/{file}', 'changeStatus')->name('changeStatus');
            Route::post('/uploadFile', 'uploadFile')->name('uploadFile');
        });

        //sms
        Route::prefix('sms')->name('sms.')->middleware('can:viewAny,' . SMS::class)->controller(SMSController::class)->group(function () {
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
    Route::prefix('setting')->name('setting.')->middleware('can:view,'. Setting::class)->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });
});


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
*/


Route::name('customer.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::name('faq.')->prefix('faq')->controller(CustomerFAQController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{faq:slug}', 'show')->name('show');
    });

    Route::name('product.')->controller(CustomerProductController::class)->group(function () {

        Route::prefix('item')->middleware('productDisabledForReportMiddleware', 'auth')->group(function () {
            Route::get('suggestion-form/{product}', 'suggestionForm')->name('suggestionForm');
            Route::post('submit-suggestion/{product}', 'submitSuggestion')
                ->name('submitSuggestion')
                ->middleware('translate_from:money_translation.php', 'translate:suggested_amount');
            Route::post('follow-auction/{product}', 'followAuction')->name('followAuction');
            Route::put('add-to-favorites/{product}', 'addToFavorites')->name('addToFavorites');
            Route::delete('unfollow-auction/{product}', 'unfollowAuction')->name('unfollowAuction');
            Route::put('/toggle-favorite-seller/{seller}', 'toggleFavoriteSeller')->name('toggleFavoriteSeller');

            // product question
            Route::controller(ProductQuestionController::class)->prefix('question')->name('question.')->group(function () {
                Route::get('create/{product}', 'create')->name('create');
                Route::post('/{product}', 'store')->name('store');
                Route::get('edit/{question}/{product}', 'edit')->name('edit');
                Route::put('/{question}/{product}', 'update')->name('update');
                Route::delete('/{question}', 'destroy')->name('destroy');
            });

        });

        Route::get('search', 'search')->name('search')->middleware('translate_from:money_translation.php', 'translate:price-from,price-until');

        Route::middleware('productDisabledForReportMiddleware')->group(function () {
            Route::post('/report/{product}', 'report')->name('report');
            Route::get('item/{product}/{slug}', 'show')->name('item');
        });
    });

    Route::middleware('auth', 'productDisabledForReportMiddleware')->group(function () {
        Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store/{productId}', 'store')->name('store'); // add to cart
            Route::put('/update', 'update')->name('update');
            Route::delete('destroy/{cartItem}', 'destroy')->name('destroy');
        });

        Route::prefix('payment')->name('payment.')->controller(CustomerPaymentController::class)->group(function () {
            Route::get('/address', 'address')->name('address');
            Route::get('/edit-address/{address}', 'editAddress')->name('editAddress');

            Route::get('code/{address}', 'code')->name('code');
            Route::post('register-code/{address}', 'registerCode')->name('registerCode');

            Route::get('pay/{address}/{copanId?}', 'payPage')->name('payPage');
            Route::post('pay/{address}/{copanId?}', 'pay')->name('pay');

            Route::get('result/{order}', 'result')->name('result');
        });
    });

    Route::middleware('auth')->group(function () {
        // customer dashboard
        Route::prefix('/dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('enhance-cash', 'enhanceCash')->name('enhanceCash')
                ->middleware('translate_from:money_translation.php', 'translate:cash');

            Route::get('/my-orders', 'myOrders')->name('myOrders');

            Route::prefix('/my-addresses')->name('myAddresses.')->controller(MyAddressesController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/cityOfProvince/{province}', 'cityOfProvince')->name('cityOfProvince');
                Route::post('store/', 'store')->name('store')->middleware('translate:postal_code,no,unit,mobile');
                Route::get('/edit/{address}', 'edit')->name('edit');
                Route::put('update/{address}', 'update')->name('update')->middleware('translate:postal_code,no,unit,mobile');
                Route::delete('destroy/{address}', 'destroy')->name('destroy');
            });

            Route::prefix('products')->name('products.')->controller(DashboardProductController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('/store', 'store')->name('store')
                    ->middleware([
                        'json_decode:productVariants,true', 'translate_from:money_translation.php', 'translate:product'
                    ]);
                Route::get('/edit/{product}', 'edit')->name('edit');
                Route::put('/{product}', 'update')->name('update')
                    ->middleware([
                        'json_decode:productVariants,true', 'translate_from:money_translation.php', 'translate:product'
                    ]);
                Route::put('changeMarketable/{product}', 'changeMarketable')->name('changeMarketable');
                Route::delete('{product}', 'destroy')->name('destroy');

                //gallery
                Route::prefix('{product}')->name('gallery.')->controller(DashboardGalleryController::class)->group(function () {
                    Route::get('/gallery', 'index')->name('index');
                    Route::post('/gallery/store', 'store')->name('store');
                    Route::delete('/gallery/{gallery}/destroy', 'destroy')->name('destroy');
                });
            });

            Route::get('/favorite-sellers', 'favoriteSellers')->name('favoriteSellers');
            Route::delete('/favorite-sellers/{seller}', 'destroyFavoriteSeller')->name('destroyFavoriteSeller');
            Route::get('/favorites', 'favorites')->name('favorites');
            Route::delete('/favorite/{userFavoriteProduct}', 'destroyFavoriteProduct')->name('destroyFavoriteProduct');
            Route::get('/account', 'account')->name('account');
            Route::put('/editAccount', 'editAccount')->name('editAccount')->middleware('translate:mobile');
        });
    });


    // auth routes
    Route::name('auth.')->controller(AuthController::class)->group(function () {

        Route::prefix('/login-register')->middleware('guest')->group(function () {
            Route::get('', 'loginRegisterForm')->name('loginRegisterForm');
            Route::post('', 'loginRegister')->name('loginRegister');
            Route::get('/{otp:token}', 'confirmationForm')->name('confirmationForm');
            Route::post('/{otp:token}', 'confirmation')->name('confirmation')->middleware('throttle:12');
            Route::get('/resend-code/{otp:token}', 'resendCode')->name('resendCode');
        });

        Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    });
});

Route::get('{page}', [CustomerPageController::class,'show'])->where('page', '.*');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__ . '/auth.php';
