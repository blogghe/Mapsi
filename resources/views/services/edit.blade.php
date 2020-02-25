@extends('layouts.app')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.edit service')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('services.update',['service' => $service])}}" method="POST" class="pb-5">
                @method('PATCH')
                @include('services.form')
                <button type="submit" class="btn btn-primary">{{__('text.add new service')}}</button>
            </form>
        </div>
    </div>
@endsection
