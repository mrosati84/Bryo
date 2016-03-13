@extends('layout.admin_base')

@section('content')
    <h2>List of all {{ $type['labels']['plural'] }}</h2>

    <p>Data:</p>

    @foreach($documents as $document)
        <div class="document">
            <ul class="fields">
                @foreach($type['fields'] as $field_key => $field)
                    @if (isset($document->{$field_key}))
                        <li class="field">{{ $field_key }}: {{ $document->{$field_key} }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endforeach

    <p>Fields:</p>

    <ul>
        @foreach($type['fields'] as $field_key => $field)
            <li>
                <p>Name: {{ $field_key }}</p>
                <p>Type: {{ $field['type'] }}</p>
            </li>
        @endforeach
    </ul>
@endsection
