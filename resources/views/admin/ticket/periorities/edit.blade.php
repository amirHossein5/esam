@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اولویت</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> اولویت تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش اولویت </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اولویت
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.ticket.periorities.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.ticket.periorities.update', $ticketPeriority->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">اولویت</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value="{{ old('name', $ticketPeriority->name) }}">

                                    @error('name')
                                        <span class="mt-2 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
