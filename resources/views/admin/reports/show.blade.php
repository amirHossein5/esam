@extends('admin.layouts.master')

@section('head-tag')
    <title>مشاهده گزارش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.index') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.reports.index') }}">گزارش ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">
                مشاهده گزارش
            </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <div>
                        <a href="{{ route('admin.reports.index') }}" class="btn btn-success btn-sm">بازگشت</a>

                        @if ($report['product']['disabled_for_report'] == App\Models\Market\Product::NOT_DISABLE_FOR_REPORT)
                            <form action="{{ route('admin.reports.toggleDisableProduct', $report['id']) }}" method="post" class="d-inline">
                                @csrf @method('put')
                                <button class="btn btn-danger btn-sm">
                                    بستن
                                محصول
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.reports.toggleDisableProduct', $report['id']) }}" method="post" class="d-inline">
                                @csrf @method('put')
                                <button class="btn btn-warning btn-sm">
                                    بازکردن محصول
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('customer.product.item', [$report['product']['id'], $report['product']['slug']]) }}" class="btn btn-secondary btn-sm">
                            مشاهده محصول
                        </a>

                    </div>
                </section>

                <section class="my-4">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <span class="font-weight-bold">عنوان: {{ $report['title'] }}</span>
                            </div>
                            <div>
                                نام محصول: {{ $report['product']['name'] }}
                            </div>
                            <div class="">
                                {{ jdate($report['created_at'])->format('%d %B، %Y - H:i') }}
                            </div>
                        </div>
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                نام گزارش کننده: {{ $report['name'] }}
                            </div>
                            <div class="">
                                ایمیل گزارش کننده: {{ $report['email'] }}
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $report['description'] }}
                        </div>
                    </div>

                </section>

            </section>
        </section>
    </section>
@endsection
