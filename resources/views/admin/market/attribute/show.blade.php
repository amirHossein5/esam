@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم کالا</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  فرم کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فرم کالای ({{ $productCategory->name }})
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.attribute.index') }}" class="btn btn-info btn-sm">بازگشت</a>

                </section>



                    <x-product.show-attributes-with-delete :model="$productCategory"/>

                    <hr>
                    <section>
                        <button type="submit" class='btn btn-sm btn-info'>ثبت</button>
                    </section>

            </section>
        </section>
    </section>

@endsection

@section('script')
    @include('alerts.sweetalert.confirm')
@endsection
