@extends('admin.layouts.app')
@section('title') Edit Support @endsection
@section('content')
    <h1>Doubt: {{ $support->id }}</h1>
    <x-alert/>
    <form action="{{ route('supports.update', $support->id ) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', ['$support' => $support])
    </form>
@endsection
