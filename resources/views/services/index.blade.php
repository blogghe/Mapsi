@extends('layout')

@section('title')
    List Services
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list service</h1>
            <p><a href="services/create">Add new service</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if( !$services->isempty())
                List Services
                <ul>
                    @foreach($services as $service)
                        <li>
                            <a href="/services/{{$service->id}}">{{$service->name}}</a><span class="text-muted"> ({{$service->email}})</span>
                        </li>
                    @endforeach
                </ul>
            @else
                No Services created yet
            @endif
        </div>
    </div>
@endsection
