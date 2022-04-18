@extends('emails.layouts.master')

@section('content')

<div class="d-flex">
    <h4>{{ $title }}: </h4>
    <h2>{{ $code }}</h2>
</div>

@endsection
