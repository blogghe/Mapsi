@extends('layouts.app')

@section('title')
    List Problems
@endsection

@section('content')
    @can('create', App\Problem::class)
    @endcan
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.problems list')}}</h1>
            <p><a href="{{route('problems.create')}}">{{__('text.add new problem')}}</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    @foreach($problems as $problem)
        <div class="row">
            <div class="col-5">
                <a href="{{route('problems.update', ['problem' =>$problem])}}">{{$problem->title}}</a>
            </div>
            <div class="col-5  d-none d-md-block">{{$problem->service->name}}</div>
            <div class="col-2  d-none d-sm-block">{{$problem->status}}</div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$problems->links()}}
        </div>
    </div>
@endsection
