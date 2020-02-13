@extends('layouts.app')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit service</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/services/{{$service->id}}" method="POST" class="pb-5">
                @method('PATCH')
                @include('services.form')
                <button type="submit" class="btn btn-primary">Edit Service</button>
            </form>
        </div>
    </div>
@endsection
