@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Service details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{$service->name}}</p>
            <p><strong>Email</strong> {{$service->email}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Problems</h3>
        </div>
    </div>
    @foreach($service->problems as $problem)
        <div class="row">
            <div class="col-3">
                {{$problem->id}}
            </div>
            <div class="col-3">
                <a href="/problems/{{$problem->id}}">{{$problem->title}}</a>
            </div>
            <div class="col-3">{{$problem->service->name}}</div>
            <div class="col-3">{{$problem->status}}</div>
        </div>
    @endforeach
@endsection
