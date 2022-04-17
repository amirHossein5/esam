    <header class="header-main">
        <section class="sidebar-header bg-gray">
            <section class="px-2 d-flex justify-content-between flex-md-row-reverse">
                <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
                <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
                <span><img class="logo" src="{{ asset('admin-assets/images/logo.png') }}" /></span>
                <span class="d-md-none" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
            </section>
        </section>
        <section class="body-header" id="body-header">
            <section class="d-flex justify-content-between">
                <section>
                    <span class="mr-5">
                        <span id="search-area" class="search-area d-none">
                            <i id="search-area-hide" class="fas fa-times pointer"></i>
                            <input id="search-input" type="text" class="search-input">
                            <i class="fas fa-search pointer"></i>
                        </span>
                        <i id="search-toggle" class="p-1 fas fa-search d-none d-md-inline pointer"></i>
                    </span>

                    <span id="full-screen" class="p-1 mr-5 pointer d-none d-md-inline">
                        <i id="screen-compress" class="fas fa-compress d-none"></i>
                        <i id="screen-expand" class="fas fa-expand "></i>
                    </span>
                </section>
                <section>
                    <span class="ml-2 ml-md-4 position-relative">
                        <span id="header-notification-toggle" class="pointer">
                            <i class="far fa-bell"></i>
                            @if ($unseenNotifications->isNotEmpty())
                                <sup class="badge badge-danger">{{ $unseenNotifications->count() }}</sup>
                            @endif
                        </span>
                        <section id="header-notification" class="rounded header-notifictation">
                            <section class="d-flex justify-content-between">
                                <span class="px-2">
                                    نوتیفیکیشن ها
                                </span>
                                <span class="px-2">
                                    <span class="badge badge-danger">جدید</span>
                                </span>
                            </section>

                            <ul class="px-0 rounded list-group" id="unseen-notifications">


                                @forelse ($unseenNotifications as $notification)
                                    <li class="list-group-item list-groupt-item-action " data-id="{{ $notification->id }}">
                                        <section class="media">
                                            <section class="pr-1 media-body">
                                                <section class="d-flex justify-content-between">
                                                    <span class="m-1" style="line-height: 1.5; font-size: .8rem">
                                                        {{ $notification->data['message'] }}
                                                    </span>
                                                </section>
                                            </section>
                                        </section>
                                    </li>
                                @empty
                                    <p class="p-1 m-1 border rounded" style="font-size: 0.8rem">اطلاعیه دیده نشده ای وجود ندارد.</p>
                                @endforelse

                            </ul>
                        </section>
                    </span>

                    <span class="ml-3 ml-md-5 position-relative">
                        <span id="header-profile-toggle" class="pointer">
                            <img class="header-avatar" src="{{ asset('admin-assets/images/avatar-2.jpg') }}"
                                alt="">
                            <span class="header-username">کامران محمدی</span>
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <section id="header-profile" class="rounded header-profile">
                            <section class="rounded list-group">
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-cog"></i>تنظیمات
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-user"></i>کاربر
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="far fa-envelope"></i>پیام ها
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-lock"></i>قفل صفحه
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-sign-out-alt"></i>خروج
                                </a>
                            </section>
                        </section>
                    </span>
                </section>
            </section>
        </section>
    </header>

    @push('script')
        <script>
            var notificationAjaxSended = false;

            $('#header-notification-toggle').click(function() {
                if(notificationAjaxSended){
                    return;
                }

                let ids = [];

                $('#unseen-notifications li').each((key, item) => {
                    if ($(item).data('id')) {
                        ids.push($(item).data('id'))
                    }
                });

                if (ids.length == 0) {
                    return;
                }

                $.ajax({
                    type: "put",
                    url: "{{ route('admin.notificationsMarkAsSeen') }}",
                    data: {
                        'notifications': ids
                    },
                    headers: {
                        'X-CSRF-TOKEN':  "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        $('#header-notification-toggle sup.badge').remove();

                        notificationAjaxSended = true;
                    }
                });

            })
        </script>
    @endpush
