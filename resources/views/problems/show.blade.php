@extends('layout')

@section('title')
    Problem details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Problem details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Title</strong> {{$problem->title}}</p>
            <p><strong>Description</strong> {{$problem->description}}</p>
            <p><strong>Status</strong> {{$problem->status}}</p>
            <p>
                <strong>Service</strong><a href="/services/{{$problem->service->id}}"> {{$problem->service->name}}</a>
            </p>
        </div>
    </div>
@endsection