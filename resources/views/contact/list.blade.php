@extends('layout')

@section('content')
    <h1>list contact</h1>
    <ul>
        @foreach($contacts as $contact)
            <li>{{$contact->name}}</li>
            <li>{{$contact}}</li>

        @endforeach
    </ul>
@endsection