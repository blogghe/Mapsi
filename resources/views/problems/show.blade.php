@extends('layouts.app')

@section('title')
    Problem details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Problem details</h1>
            <p><a href="{{route('problems.edit', ['problem' =>$problem])}}">Edit</a></p>
            <form action="{{route('problems.destroy',['problem' =>$problem])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Title</strong> {{$problem->title}}</p>
            <p><strong>Description</strong> {{$problem->description}}</p>
            <p><strong>Status</strong> {{$problem->status}}</p>
            <p>
                <strong>Service</strong><a href="{{route('services.show', ['service' =>$problem->service])}}"> {{$problem->service->name}}</a>
            </p>
        </div>
    </div>
@endsection
