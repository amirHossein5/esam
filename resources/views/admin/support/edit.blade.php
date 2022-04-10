@extends('admin.layouts.master')

@section('head-tag')
    <title>پرسش و پاسخ پشتیبانی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.index') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.support.index') }}">پشتیبانی ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">
                پرسش و پاسخ پشتیبانی
            </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">

                <section class="">
                    <section>
                        <h5 class="mb-4  p-1"> ویرایش پاسخ </h5>

                        <section>
                            <form action="{{ route('admin.support.update', $answer->id) }}" method="post">
                                @csrf @method('put')
                                <div class="form-group">
                                    <textarea name="description" id="description" cols="30" rows="10">{{ old('description', $answer->description) }}</textarea>

                                    @error('description')
                                        <div class="my-1 text-danger font-weight-bold">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button class="btn btn-info btn-sm">ثبت</button>
                            </form>
                        </section>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    @include('alerts.sweetalert.confirm')

    <script>
        CKEDITOR.replace('description')
    </script>

@endsection
