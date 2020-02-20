@extends('layouts.app')

@section('title')
    List Services
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list service</h1>
            <p><a href="{{route('services.create')}}">Add new service</a></p>
        </div>
    </div>
    @foreach($services as $service)
        <div class="row">
            <div class="col-12">
                <a href="{{route('services.update',['service' => $service])}}">{{$service->name}}</a><span class="text-muted"> ({{$service->email}})</span>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$services->links()}}
        </div>
    </div>
@endsection
