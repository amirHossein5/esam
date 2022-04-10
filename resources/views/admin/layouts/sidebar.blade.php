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

            <section
                class="sidebar-part-title
                @if(request()->is('admin/market/*')) text-green @endif"
            >
                بخش فروش
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a
                        href="{{ route('admin.market.category.index') }}"
                        class="@if(request()->is('admin/market/category*')) text-green @endif "
                    >
                        دسته بندی
                    </a>
                    <a
                        href="{{ route('admin.market.attribute.index') }}"
                        class="@if(request()->is('admin/market/attribute*')) text-green @endif "
                    >
                        فرم کالا
                    </a>
                    <a
                        href="{{ route('admin.market.product.index') }}"
                        class="@if(request()->is('admin/market/product*')) text-green @endif "
                    >
                        کالاها
                    </a>
                    <a
                        href="{{ route('admin.market.selectableAttributes.index') }}"
                        class="@if(request()->is('admin/market/selectable-attributes*')) text-green @endif "
                    >
                        ویژگی های قابل انتخاب
                    </a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سفارشات</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a
                        href="{{ route('admin.market.order.newOrders') }}"
                        class="@if(request()->is('admin/market/order/newOrders*')) text-green @endif "
                    >
                         جدید
                    </a>
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
                        href="{{ route('admin.market.order.canceled') }}"
                        class="@if(request()->is('admin/market/order/canceled*')) text-green @endif "
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
                        href="{{ route('admin.market.order.all') }}"
                        class="@if(request()->routeIs('admin.market.order.all')) text-green @endif "
                    >
                        تمام سفارشات
                    </a>
                </section>
            </section>

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

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a
                        href=""
                        class="@if(request()->is('admin/market/discount/amazing-sale*')) text-green @endif "
                    >
                        تخفیف شگفت انگیز
                    </a>
                    <a
                        href="{{ route('admin.market.discount.copan') }}"
                        class="@if(request()->is('admin/market/discount/copan*')) text-green @endif "
                    >
                        کپن تخفیف
                    </a>
                    <a
                        href="{{ route('admin.market.discount.landingPageCopans.index') }}"
                        class="@if(request()->is('admin/market/discount/landing-page-copans*')) text-green @endif "
                    >
                        کپن های صفحه اصلی
                    </a>
                </section>
            </section>


            <section
                class="sidebar-part-title
                @if(request()->is('admin/content/*')) text-green @endif"
            >
                بخش محتوی
            </section>
            <a
                href="{{ route('admin.content.faqCategory.index') }}"
                class="sidebar-link
                @if(request()->is('admin/content/faq-category*')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>دسته بندی سوالات متداول</span>
            </a>
            <a
                href="{{ route('admin.content.faq.index') }}"
                class="sidebar-link
                @if(request()->routeIs('admin.content.faq.index')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
            <a
                href="{{ route('admin.content.page.index') }}"
                class="sidebar-link
                @if(request()->is('admin/content/page*')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>پیج ساز</span>
            </a>
            <a
                href="{{ route('admin.content.banner.index') }}"
                class="sidebar-link
                @if(request()->is('admin/content/banner*')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>بنر ها</span>
            </a>



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


            <section
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
            </a>




            <section
                class="sidebar-part-title
                @if(request()->is('admin/notify/*')) text-green @endif"
            >
                اطلاع رسانی
            </section>
            <a
                href="{{ route('admin.notify.email.index') }}"
                class="sidebar-link
                @if(request()->is('admin/notify/email*')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            <a
                href="{{ route('admin.notify.sms.index') }}"
                class="sidebar-link
                @if(request()->is('admin/notify/sms*')) text-green @endif"
            >
                <i class="fas fa-bars"></i>
                <span>اعلامیه پیامکی</span>
            </a>


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

        </section>
    </section>
</aside>
