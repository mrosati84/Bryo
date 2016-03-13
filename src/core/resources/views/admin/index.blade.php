@extends('layout.admin_base')

@section('content')
    <h1>Manage content</h1>

    <ul>
        @foreach($structure as $type => $properties)
            <li>
                <a href="{{ route('admin.list', ['type' => $type]) }}">{{ $properties['labels']['plural'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection
