@extends('layouts.app')

@section('title')
    Add new Problem
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new problem</h1>
        </div>
    </div>
    <div class="row">
        @if(!$services->isEmpty())
            <div class="col-12">
                <form action="{{route('problems.store')}}" method="POST" class="pb-5">
                    @include('problems.form')
                    <button type="submit" class="btn btn-primary">Add Problem</button>
                </form>
            </div>
        @else
            <div class="col-12">
                <p>No services found, <a href="/services/create">create</a> a service first.</p>
            </div>
        @endif
    </div>
@endsection
