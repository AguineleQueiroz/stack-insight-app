@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New Suport') }}
    </h2>
</x-slot>
@section('content')
    <x-alert/>
    <form action="{{ route('supports.store') }}" method="POST">
        @include('admin.supports.partials.form-create')
    </form>
@endsection
