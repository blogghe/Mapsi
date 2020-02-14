@extends('layouts.app')

@section('title')
    Add new Service
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new service</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('contacts.store')}}" method="POST" class="pb-5">
                @include('services.form')
                <button type="submit" class="btn btn-primary">Add Service</button>
            </form>
        </div>
    </div>
@endsection
