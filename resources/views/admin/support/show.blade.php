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
                <section class="main-body-container-header">
                    <div>
                        <a href="{{ route('admin.support.index') }}" class="btn btn-success btn-sm">بازگشت</a>

                        @if ($question->status == App\Models\Support::OPEN)
                            <a href="{{ route('admin.support.changeStatus', $question->id) }}" class="btn btn-danger btn-sm">بستن
                            سوال</a>
                        @else
                            <a href="{{ route('admin.support.changeStatus', $question->id) }}" class="btn btn-warning btn-sm">بازکردن سوال</a>
                        @endif

                    </div>
                </section>

                <section class="my-4">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <span class="font-weight-bold">{{ $question->title }}</span>
                                @if(filled($question->user->fullName))- {{ $question->user->fullName }}  @endif
                            </div>
                            <div>
                                {{ jdate($question->created_at)->format('%d %B، %Y - H:i') }}
                            </div>
                        </div>
                        <div class="card-body">
                            {!! $question->description !!}
                        </div>
                    </div>

                    {{-- answers --}}
                    <h5 class="mt-5 mb-4 border-bottom p-1">پاسخ ها</h5>

                    <section class="row">

                        @forelse ($question->answers as $answer)
                            <section class="col-12 col-md-8 my-2">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $answer->user->fullName }}
                                        </div>
                                        <div class="d-flex align-items-baseline">
                                            <div class="mx-2">
                                                <a href="{{ route('admin.support.edit', $answer->id) }}" class="btn-info rounded" style="margin: 0.2rem; padding:.2rem .5rem">
                                                    <i class="fa fa-edit" ></i>
                                                </a>

                                                <form
                                                    action="{{ route('admin.support.destroy', $answer->id) }}"
                                                    method="post"
                                                    class="d-inline-block"
                                                >
                                                @csrf @method('delete')

                                                    <button
                                                        class="btn-danger rounded"
                                                        style="margin: 0.2rem; padding:.2rem .5rem"
                                                        onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                                    >
                                                        <i class="fa fa-trash" ></i>
                                                    </button>
                                                </form>
                                            </div>
                                            {{ jdate($answer->created_at)->format('%d %B، %Y - H:i') }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {!! $answer->description !!}
                                    </div>
                                </div>
                            </section>

                        @empty
                            <p class="text-center col-12 text-secondary">هیچ پاسخی ثبت نشده</p>
                        @endforelse

                    </section>

                    {{-- insert anwer --}}
                    <section>
                        <h5 class="mt-5 mb-4 border-bottom p-1"> ثبت پاسخ </h5>

                        <section>
                            <form action="{{ route('admin.support.store', $question->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>

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
