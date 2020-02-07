@extends('layout')

@section('content')
    <h1>list service</h1>
    <form action="listServices" method="POST" class="pb-5">
        <div class="input-group">
            <label>Name:
                <input type="text" name="name" value="{{old('name')}}">
            </label>
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="input-group">
            <label>Email:
                <input type="text" name="email" value="{{old('email')}}">
            </label>
            <div>{{$errors->first('email')}}</div>

        </div>
        <button type="submit">Add Service</button>
        @csrf
    </form>

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
@endsection