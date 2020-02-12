@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Label details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Id</strong> {{$label->id}}</p>
            <p><strong>name</strong> {{$label->name}}</p>
        </div>
    </div>
@endsection
