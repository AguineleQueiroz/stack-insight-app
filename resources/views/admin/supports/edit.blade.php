@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Suport') }}
    </h2>
</x-slot>
@section('content')
    <x-alert/>
    <form action="{{ route('supports.update', $support->id ) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form-edit', ['support' => $support])
    </form>
@endsection
