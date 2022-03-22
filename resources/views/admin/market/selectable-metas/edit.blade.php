@extends('admin.layouts.master')

@section('head-tag')
    <title>ویژگی های قابل انتخاب</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">ویژگی های قابل انتخاب</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش ویژگی های قابل انتخاب</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش ویژگی قابل انتخاب
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.selectableMetas.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.selectableMetas.update', $selectableMeta['id']) }}" id="form" method="post"
                        >
                        @method('put')
                        @csrf
                        <section class="row">

                            <section class="my-2 col-12 ">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="name">نام </label>
                                        <input type="text" id="name" class="form-control form-control-sm" name="name"
                                            value="{{ old('name', $selectableMeta['name']) }}">
                                    </div>
                                    @error('name')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="values">مقادیر</label>
                                    <input id="values" type="hidden" value="{{ old('values', $selectableMeta['values']) }}"
                                        name="values">

                                    <select id="select2" class="form-control" multiple></select>
                                    @error('values')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>



                            <section class="mt-3 col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>

    <script>
        select2TagsInForm('#select2', '#values', '#form', 'مقدار')
    </script>
@endsection
