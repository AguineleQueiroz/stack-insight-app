@extends('admin.layouts.app')
@section('title')
    New Support
@endsection
@section('content')
    <x-alert/>
    <form action="{{ route('supports.store') }}" method="POST">
        @include('admin.supports.partials.form-create')
    </form>
@endsection
