@extends('admin.layouts.master')

@section('head-tag')
    <title> تیکت </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش تیکت </a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> تیکت</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش تیکت </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش تیکت
                    </h5>
                </section>

                <section class="d-flex align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>

                    <section id="status" class="mx-2">
                        @if (!$ticket->status)
                            <button class="btn btn-sm btn-success" onclick="changeStatus()"
                                data-url="{{ route('admin.ticket.changeStatus', $ticket->id) }}">
                                <i class="fa fa-check"></i>
                                باز
                            </button>
                        @else
                            <button class="btn btn-sm btn-danger" onclick="changeStatus()"
                                data-url="{{ route('admin.ticket.changeStatus', $ticket->id) }}">
                                <i class="fa fa-times"></i>
                                بسته شده
                            </button>
                        @endif
                    </section>

                </section>

                <section class="card mb-3">
                    <section class="card-header text-white bg-custom-pink">
                        @if ($ticket->reference_full_name)
                            {{ $ticket->answered_admin->fullName ?? $ticket->reference_full_name }} -
                            {{ optional($ticket->answered_admin)->id }}
                            در پاسخ به
                            <br>
                            <br />
                        @endif
                        {{ $ticket->user->fullName ?? $ticket->user_full_name }} - {{ optional($ticket->user)->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">موضوع : {{ $ticket->subject }}
                        </h5>
                        <p class="card-text">
                            {!! $ticket->description !!}
                        </p>
                    </section>
                </section>

                <section>
                    <form action="{{ route('admin.ticket.answer', $ticket->id) }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <br>
                                <div class="form-group">
                                    <label for="description">پاسخ </label>
                                    ‍<textarea id="description" name="description" class="form-control form-control-sm"
                                        rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger my-2">
                                            {{ $message }}
                                        </div>
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(function() {
            CKEDITOR.replace('description')
        })
    </script>

    <script>
        function changeStatus() {
            $(event.currentTarget).prop('disabled', true);
            var url = event.currentTarget.dataset.url;

            $.ajax({
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                "url": event.currentTarget.dataset.url,
                "method": "PUT",
                "success": function(response) {
                    var tag = '';

                    if (response.status) {
                        tag += `
                            <button class="btn btn-sm btn-danger" onclick="changeStatus()" data-url="${url}">
                                <i class="fa fa-times"></i>
                                بسته شده
                            </button>
                        `
                    } else {
                        tag += `
                            <button class="btn btn-sm btn-success" onclick="changeStatus()" data-url="${url}">
                                <i class="fa fa-check"></i>
                                باز
                            </button>
                        `
                    }

                    $('#status button').replaceWith(tag);
                },
                "error": function() {
                    $(event.currentTarget).prop('disabled', false);
                }
            });
        }
    </script>

@endsection
