@extends('layout')
@section('title')
    Label details
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Label details</h1>
            <p><a href="/labels/{{$label->id}}/edit">Edit</a></p>
            <form action="/labels/{{$label->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>Id</strong> {{$label->id}}</p>
            <p><strong>name</strong> {{$label->name}}</p>
        </div>
    </div>
@endsection
