@extends('admin.layouts.master')

@section('head-tag')
    <title>رنگ ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> رنگ ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        رنگ ها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <a href="{{ route('admin.market.colors.create') }}" class="btn btn-info btn-sm">
                            ایجاد رنگ
                        </a>

                    </div>
                </section>

                <section class="row" style="gap: 1rem 0">
                    @forelse ($colors as $color)
                        <section class="col-12 col-md-3 ">
                            <div style="background-color: {{ $color->background }}; height: 2rem; border-radius: 5px"></div>
                            <div class="d-flex justify-content-between">
                                {{ $color->name }}
                                <form action="{{ route('admin.market.colors.destroy', $color->id) }}" method="post">
                                    @csrf @method('delete')
                                    <button onclick="confirm(event, 'به طور کامل پاک خواهد شد.')" class="btn btn-danger py-0 px-3 my-1">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </section>
                    @empty
                        <section class="d-flex justify-content-center col-12">
                            رنگی وجود ندارد.
                        </section>
                    @endforelse
                </section>

            </section>
        </section>
    </section>
@endsection


@section('script')
    @include('alerts.sweetalert.confirm')
@endsection
