@extends('layouts/base')
@section('title') Edit Support @endsection
@section('content')
    <h1>Doubt: {{ $support->id }}</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <form action="{{ route('supports.update', $support->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="subject" placeholder="Doubt's title" value="{{$support->subject}}">
        <textarea name="content" cols="30" rows="5" placeholder="Doubt's description">{{$support->content}}</textarea>
        <button type="submit">Submit</button>
    </form>
@endsection
