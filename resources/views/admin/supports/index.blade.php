@extends('layouts/base')
@section('title') Support List @endsection
@section('content')
    <h1>lista de supports realizados</h1>

    <a href="{{ route('supports.create') }}">New Doubt</a>

    <table>
    <thead>
    <th>Subject</th>
    <th>Status</th>
    <th>Description</th>
    <th></th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    @foreach ($supports as $support)
        <tr>
            <td>{{ $support->subject}}</td>
            <td>{{ $support->status}}</td>
            <td>{{ $support->content}}</td>
            <td>
                <a href="{{ route('supports.show', [$support->id])}}">view</a>
            </td>
            <td>
                <a href="{{ route('supports.edit', [$support->id])}}">edit</a>
            </td>
            <td>
                <form action="{{ route('supports.destroy', [$support->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
