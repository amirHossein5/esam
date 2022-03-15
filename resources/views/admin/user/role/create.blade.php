@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نقش</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">نقش ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نقش</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نقش
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.role.store') }}" method="post">
                        @csrf

                        <section class="row">

                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">عنوان نقش</label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control form-control-sm">

                                    @error('name')
                                        <span class="my-2 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="description">توضیح نقش</label>
                                    <input type="text" id="description" name="description"
                                        class="form-control form-control-sm" value="{{ old('description') }}">

                                    @error('description')
                                        <span class="my-2 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-2">
                                <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                            </section>

                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">

                                    @foreach ($permissions as $permission)

                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input d-block"
                                                    name="permissions[{{ $permission->id }}]"
                                                    value="{{ $permission->id }}"
                                                    id="{{ $permission->id }}"
                                                    @if (in_array($permission->id, old('permissions', [])))
                                                        checked
                                                    @endif
                                                >


                                                <label for="{{ $permission->id }}" class="form-check-label select-none mr-3 mt-1">
                                                    {{ $permission->description }}
                                                </label>
                                            </div>

                                            @error('permissions.' . $permission->id)
                                                <span class="my-2 text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </section>
                                    @endforeach
                                </section>
                            </section>

                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
