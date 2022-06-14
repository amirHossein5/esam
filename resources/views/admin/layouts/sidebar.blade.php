<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a
                href="{{ route('admin.index') }}"
                class="sidebar-link
                @if(request()->routeIs('admin.index')) text-green @endif"
            >
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            @if (
                \Facades\App\Services\Gate::checkAny([
                    \App\Models\Market\AmazingSale::class => 'viewAny',
                    \App\Models\Market\Copan::class => 'viewAny',
                    \App\Models\Market\LandingPageCopan::class => 'viewAny',
                    \App\Models\Market\ProductCategory::class => 'viewAny',
                    \App\Models\Market\ProductAttribute::class => 'viewAny',
                    \App\Models\Market\Product::class => 'viewAny',
                    \App\Models\Market\SelectableAttribute::class => 'viewAny',
                    \App\Models\Market\Payment::class => 'viewAny',
                    \App\Models\Market\Order::class => 'viewAny',
                ])
            )
                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/market/*')) text-green @endif"
                >
                    بخش فروش
                </section>
            @endif

            @if (
                \Facades\App\Services\Gate::checkAny([
                    \App\Models\Market\ProductCategory::class => 'viewAny',
                    \App\Models\Market\ProductAttribute::class => 'viewAny',
                    \App\Models\Market\Product::class => 'viewAny',
                    \App\Models\Market\SelectableAttribute::class => 'viewAny',
                ])
            )
                <section class="sidebar-group-link">
                    <section class="sidebar-dropdown-toggle">
                        <i class="fas fa-chart-bar icon"></i>
                        <span>ویترین</span>
                        <i class="fas fa-angle-left angle"></i>
                    </section>
                    <section class="sidebar-dropdown">
                        @can('viewAny', \App\Models\Market\ProductCategory::class)
                            <a
                                href="{{ route('admin.market.category.index') }}"
                                class="@if(request()->is('admin/market/category*')) text-green @endif "
                            >
                                دسته بندی
                            </a>
                        @endcan

                        @can('viewAny', \App\Models\Market\ProductAttribute::class)
                            <a
                                href="{{ route('admin.market.attribute.index') }}"
                                class="@if(request()->is('admin/market/attribute*')) text-green @endif "
                            >
                                فرم کالا
                            </a>
                        @endcan

                        @can('viewAny', \App\Models\Market\Product::class)
                            <a
                                href="{{ route('admin.market.product.index') }}"
                                class="@if(request()->is('admin/market/product*')) text-green @endif "
                            >
                                کالاها
                            </a>
                        @endcan

                        @can('viewAny', \App\Models\Market\SelectableAttribute::class)
                            <a
                                href="{{ route('admin.market.selectableAttributes.index') }}"
                                class="@if(request()->is('admin/market/selectable-attributes*')) text-green @endif "
                            >
                                ویژگی های قابل انتخاب
                            </a>
                        @endcan
                    </section>
                </section>
            @endif

            @can('viewAny', \App\Models\Market\Order::class)
                <section class="sidebar-group-link">
                    <section class="sidebar-dropdown-toggle">
                        <i class="fas fa-chart-bar icon"></i>
                        <span>سفارشات</span>
                        <i class="fas fa-angle-left angle"></i>
                    </section>
                    <section class="sidebar-dropdown">
                        <a
                            href="{{ route('admin.market.order.sending') }}"
                            class="@if(request()->is('admin/market/order/sending*')) text-green @endif "
                        >
                            در حال ارسال
                        </a>
                        <a
                            href="{{ route('admin.market.order.unpaid') }}"
                            class="@if(request()->is('admin/market/order/unpaid*')) text-green @endif "
                        >
                            پرداخت نشده
                        </a>
                        <a
                            href="{{ route('admin.market.order.rejected') }}"
                            class="@if(request()->is('admin/market/order/rejected*')) text-green @endif "
                        >
                            باطل شده
                        </a>
                        <a
                            href="{{ route('admin.market.order.returned') }}"
                            class="@if(request()->is('admin/market/order/returned*')) text-green @endif "
                        >
                            مرجوعی
                        </a>
                        <a
                            href="{{ route('admin.market.order.index') }}"
                            class="@if(request()->routeIs('admin.market.order.index')) text-green @endif "
                        >
                            تمام سفارشات
                        </a>
                    </section>
                </section>
            @endcan

            @can('viewAny', \App\Models\Market\Payment::class)
                <section class="sidebar-group-link">
                    <section class="sidebar-dropdown-toggle">
                        <i class="fas fa-chart-bar icon"></i>
                        <span>پرداخت ها</span>
                        <i class="fas fa-angle-left angle"></i>
                    </section>
                    <section class="sidebar-dropdown">
                        <a
                            href="{{ route('admin.market.payment.index') }}"
                            class="@if(request()->routeIs('admin.market.payment.index')) text-green @endif "
                        >
                            تمام پرداخت ها
                        </a>
                    </section>
                </section>
            @endcan

            @if (
                \Facades\App\Services\Gate::checkAny([
                    \App\Models\Market\AmazingSale::class => 'viewAny',
                    \App\Models\Market\Copan::class => 'viewAny',
                    \App\Models\Market\LandingPageCopan::class => 'viewAny',
                ])
            )
                <section class="sidebar-group-link">
                    <section class="sidebar-dropdown-toggle">
                        <i class="fas fa-chart-bar icon"></i>
                        <span>تخفیف ها</span>
                        <i class="fas fa-angle-left angle"></i>
                    </section>
                    <section class="sidebar-dropdown">
                        @can('viewAny', \App\Models\Market\AmazingSale::class)
                            <a
                                href="{{ route('admin.market.discount.amazingSale.index') }}"
                                class="@if(request()->is('admin/market/discount/amazing-sale*')) text-green @endif "
                            >
                                تخفیف شگفت انگیز
                            </a>
                        @endcan

                        @can('viewAny', \App\Models\Market\Copan::class)
                            <a
                                href="{{ route('admin.market.discount.copan.index') }}"
                                class="@if(request()->is('admin/market/discount/copan*')) text-green @endif "
                            >
                                کپن تخفیف
                            </a>
                        @endcan

                        @can('viewAny', \App\Models\Market\LandingPageCopan::class)
                            <a
                                href="{{ route('admin.market.discount.landingPageCopans.index') }}"
                                class="@if(request()->is('admin/market/discount/landing-page-copans*')) text-green @endif "
                            >
                                کپن های صفحه اصلی
                            </a>
                        @endcan

                    </section>
                </section>
            @endif

            @if (
                \Facades\App\Services\Gate::checkAny([
                    \App\Models\Content\FAQCategory::class => 'viewAny',
                    \App\Models\Content\FAQ::class => 'viewAny',
                    \App\Models\Content\Page::class => 'viewAny',
                    \App\Models\Content\Banner::class => 'viewAny',
                ])
            )
                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/content/*')) text-green @endif"
                >
                    بخش محتوی
                </section>

                @can('viewAny', \App\Models\Content\FAQCategory::class)
                    <a
                        href="{{ route('admin.content.faqCategory.index') }}"
                        class="sidebar-link
                        @if(request()->is('admin/content/faq-category*')) text-green @endif"
                    >
                        <i class="fas fa-bars"></i>
                        <span>دسته بندی سوالات متداول</span>
                    </a>
                @endcan

                @can('viewAny', \App\Models\Content\FAQ::class)
                    <a
                        href="{{ route('admin.content.faq.index') }}"
                        class="sidebar-link
                        @if(request()->routeIs('admin.content.faq.index')) text-green @endif"
                    >
                        <i class="fas fa-bars"></i>
                        <span>سوالات متداول</span>
                    </a>
                @endcan

                @can('viewAny', \App\Models\Content\Page::class)
                <a
                    href="{{ route('admin.content.page.index') }}"
                    class="sidebar-link
                    @if(request()->is('admin/content/page*')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>پیج ساز</span>
                </a>
                @endcan

                @can('viewAny', \App\Models\Content\Banner::class)
                    <a
                        href="{{ route('admin.content.banner.index') }}"
                        class="sidebar-link
                        @if(request()->is('admin/content/banner*')) text-green @endif"
                    >
                        <i class="fas fa-bars"></i>
                        <span>بنر ها</span>
                    </a>
                @endcan
            @endif


            @if (auth()->user()->is_superadmin)
                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/user/*')) text-green @endif"
                >
                    بخش کاربران
                </section>
                <a
                    href="{{ route('admin.user.admin-user.index') }}"
                    class="sidebar-link
                    @if(request()->is('admin/user/admin-user*')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>کاربران ادمین</span>
                </a>
                <a
                    href="{{ route('admin.user.customer.index') }}"
                    class="sidebar-link
                    @if(request()->is('admin/user/customer*')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>مشتریان</span>
                </a>
                <a
                    href="{{ route('admin.user.role.index') }}"
                    class="sidebar-link
                    @if(request()->is('admin/user/role*')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>سطوح دسترسی</span>
                </a>
            @endif



            @can('viewAny', \App\Models\Report::class)
                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/reports*')) text-green @endif"
                >
                    گزارش ها
                </section>
                <a
                    href="{{ route('admin.reports.index') }}"
                    class="sidebar-link @if(request()->routeIs('admin.reports.index')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>همه گزارش ها</span>
                </a>

                <a
                    href="{{ route('admin.reports.disabledForReport') }}"
                    class="sidebar-link @if(request()->routeIs('admin.reports.disabledForReport')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>محصولات غیرفعال شده</span>
                </a>

                <a
                    href="{{ route('admin.reports.notDisabledForReport') }}"
                    class="sidebar-link @if(request()->routeIs('admin.reports.notDisabledForReport')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>محصولات غیر فعال نشده</span>
                </a>
            @endcan

            {{-- <section
                class="sidebar-part-title
                @if(request()->is('admin/support*')) text-green @endif"
            >
                درخواست های پشتیبانی
            </section>
            <a
                href="{{ route('admin.support.index') }}"
                class="sidebar-link @if(request()->routeIs('admin.support.index')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>همه پشتیبانی ها</span>
            </a>

            <a
                href="{{ route('admin.support.closed') }}"
                class="sidebar-link @if(request()->routeIs('admin.support.closed')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>پشتیبانی های بسته شده</span>
            </a>

            <a
                href="{{ route('admin.support.open') }}"
                class="sidebar-link @if(request()->routeIs('admin.support.open')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>پشتیبانی های باز</span>
            </a> --}}



            @if (
                \Facades\App\Services\Gate::checkAny([
                    \App\Models\Notify\SMS::class => 'viewAny',
                    \App\Models\Notify\Email::class => 'viewAny'
                ])
            )

                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/notify/*')) text-green @endif"
                >
                    اطلاع رسانی
                </section>

                @can('viewAny', \App\Models\Notify\Email::class)
                    <a
                        href="{{ route('admin.notify.email.index') }}"
                        class="sidebar-link
                        @if(request()->is('admin/notify/email*')) text-green @endif"
                    >
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه ایمیلی</span>
                    </a>
                @endcan

                @can('viewAny', \App\Models\Notify\SMS::class)
                    <a
                        href="{{ route('admin.notify.sms.index') }}"
                        class="sidebar-link
                        @if(request()->is('admin/notify/sms*')) text-green @endif"
                    >
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه پیامکی</span>
                    </a>
                @endcan
            @endif


            @can('view', \App\Models\Setting::class)
                <section
                    class="sidebar-part-title
                    @if(request()->is('admin/setting*')) text-green @endif"
                >
                تنظیمات</section>
                <a
                    href="{{ route('admin.setting.index') }}"
                    class="sidebar-link
                    @if(request()->is('admin/setting*')) text-green @endif"
                >
                    <i class="fas fa-bars"></i>
                    <span>تنظیمات</span>
                </a>
            @endcan

        </section>
    </section>
</aside>
