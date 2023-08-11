@extends('layouts/base')
@section('title') New Support @endsection
@section('content')
    <h1>Register your doubt</h1>
    <x-alert/>
    <form action="{{ route('supports.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
@endsection
