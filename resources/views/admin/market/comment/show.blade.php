@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش نظر </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> نظرات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش نظر
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="mb-3 card">

                    <section class="card-body">
                        <h5 class="card-title">
                            <p> نام کالا : <p>{{ $comment->commentable->name }}</p></p><hr>
                            <p>کد کالا : <p>{{ $comment->commentable_id }}</p></p><hr>
                            <p> مشخصات کالا: <p>{{ $comment->commentable->body }}</p></p><hr>
                            <p> <a href="">مشاهده کالا</a> </p>
                        </h5>
                        <hr>
                        <section class="text-white card-header bg-custom-yellow">
                            {{ $comment->author_id }} - {{ $comment->author->full_name }}
                        </section>
                        <p class="card-text">
                            {!! $comment->body !!}
                        </p>
                    </section>
                </section>

                @if (!$comment->parent_id)
                    <section>
                        <form action="{{ route('admin.market.comment.store', $comment->id) }}" method="post">
                            @csrf
                            <section class="row">
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="">پاسخ ادمین</label>
                                        ‍<textarea class="form-control form-control-sm" rows="4" name="body"
                                            id="body">{{ old('body') }}</textarea>
                                        @error('body')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </section>
                                <section class="col-12">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>
                        </form>
                    </section>
                @endif

            </section>
        </section>
    </section>

@endsection

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
