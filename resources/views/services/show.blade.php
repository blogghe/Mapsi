@extends('layouts.app')

@section('title')
    Service details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Service details</h1>
            <p><a href="{{route('services.edit',['service'=>$service])}}">Edit</a></p>
            <form action="{{route('services.destroy',['service' =>$service])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
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
                <a href="{{route('problems.show',['problem'=>$problem])}}">{{$problem->title}}</a>
            </div>
            <div class="col-3">{{$problem->service->name}}</div>
            <div class="col-3">{{$problem->status}}</div>
        </div>
    @endforeach
@endsection
