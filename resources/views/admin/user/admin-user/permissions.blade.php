@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش دسترسی ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسترسی ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسترسی های ادمین</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         ویرایش دسترسی های ادمین ({{ $admin->fullName }})
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.admin-user.permissions.update', $admin->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section>
                                <div class="row">

                                    @foreach ($permissions as $permission)
                                        <section class="col-md-3">
                                            <div class=" d-block form-check">
                                                <input
                                                    type="checkbox"
                                                    name="permissions[]"
                                                    value="{{ $permission->id }}"
                                                    id="{{ $permission->id }}"
                                                    @if(optional($admin->allPermissions())
                                                        ->contains('id', $permission->id)
                                                    )
                                                        checked
                                                    @endif
                                                >
                                                <label for="{{ $permission->id }}" class="mx-1 select-none">
                                                    {{ $permission->description }}
                                                </label>
                                            </div>

                                            @error('permissions.'. $loop->index)
                                                <span class="my-1 text-danger">{{ $message }}</span>
                                            @enderror
                                        </section>
                                    @endforeach

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
