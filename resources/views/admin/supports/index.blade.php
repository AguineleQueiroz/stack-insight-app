@extends('layouts/base')
@section('title') Support List @endsection
@section('content')
    <h1>lista de supports realizados</h1>

    <a href="{{ route('supports.create') }}">New Doubt</a>
    <table>
        <thead>
            <th>Subject</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($supports->items() as $support)
                <tr>
                    <td>{{ $support->subject}}</td>
                    <td>{{ $support->content_body}}</td>
                    <td>{{ getStatusSupport($support->status) }}</td>
                    <td>
                        <a href="{{ route('supports.show', $support->id)}}">view</a>
                        <a href="{{ route('supports.edit', $support->id)}}">edit</a>
                        <form action="{{ route('supports.destroy', $support->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
