@extends('layouts.app')

@section('title')
    List Problems
@endsection

@section('content')
    @can('create', App\Problem::class)
        <div class="row">
            <div class="col-12">
                <h1>list problem</h1>
                <p><a href="{{route('problems.create')}}">Add new problem</a></p>
            </div>
        </div>
    @endcan


    @foreach($problems as $problem)
        <div class="row">
            <div class="col-3">
                {{$problem->id}}
            </div>
            <div class="col-3">
                <a href="{{route('problems.update', ['problem' =>$problem])}}">{{$problem->title}}</a>
            </div>
            <div class="col-3">{{$problem->service->name}}</div>
            <div class="col-3">{{$problem->status}}</div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$problems->links()}}
        </div>
    </div>
@endsection
