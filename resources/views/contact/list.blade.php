@extends('layout')

@section('content')
    <h1>list contact</h1>

    <form action="listContact" method="POST" class="pb-5">
        <div class="input-group">
            <input type="text" name="name">
        </div>
        <div>{{$errors->first()}}</div>

        <button type="submit">Add contact</button>
        @csrf
    </form>

    <ul>
        @foreach($contacts as $contact)
            <li>{{$contact->name}}</li>
            <li>{{$contact}}</li>

        @endforeach
    </ul>
@endsection