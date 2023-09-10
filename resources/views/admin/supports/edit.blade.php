@extends('admin.layouts.app')
@section('title')
    Edit Support
@endsection
@section('content')
    <x-alert/>
    <form action="{{ route('supports.update', $support->id ) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form-edit', ['$support' => $support])
    </form>
@endsection
