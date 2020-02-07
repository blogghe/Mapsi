@extends('layout')

@section('title')
    List Services
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list service</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="listServices" method="POST" class="pb-5">
                <div class="form-group">
                    <label>Name:
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('name')}}</div>
                </div>
                <div class="form-group">
                    <label>Email:
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('email')}}</div>
                </div>
                <button type="submit" class="btn btn-primary">Add Service</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if( ! empty($services))
                List Services
                <ul>
                    @foreach($services as $service)
                        <li>{{$service->name}}<span class="text-muted"> ({{$service->email}})</span></li>
                    <!--<li>{{$service}}</li>-->
                    @endforeach
                </ul>
            @else
                No Services created yet
            @endif
        </div>
    </div>
@endsection