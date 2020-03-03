@extends('layouts.app')

@section('title')
    List Services
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.list services')}}</h1>
            <p><a href="{{route('services.create')}}">{{__('text.add new service')}}</a></p>
        </div>
    </div>
    @foreach($services as $service)
        <div class="row">
            <div class="col-6">
                <a href="{{route('services.update',['service' => $service])}}">{{$service->name}}</a>
            <!--<span class="text-muted d-none d-md-block"> ({{$service->email}})</span> -->
            </div>
            <div class="col-6 d-none d-sm-block">{{$service->email}}</div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$services->links()}}
        </div>
    </div>
@endsection

