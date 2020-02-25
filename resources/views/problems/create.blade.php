@extends('layouts.app')

@section('title')
    Add new Problem
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.add new problem')}}</h1>
        </div>
    </div>
    <div class="row">
        @if(!$services->isEmpty())
            <div class="col-12">
                <form action="{{route('problems.store')}}" method="POST" class="pb-5">
                    @include('problems.form')
                    <button type="submit" class="btn btn-primary">{{__('text.add new problem')}}</button>
                </form>
            </div>
        @else
            <div class="col-12">
                <p>{{__('text.no services found')}}, <a href="/services/create">{{__('text.create')}}</a>{{__('text.a service first')}}</p>
            </div>
        @endif
    </div>
@endsection
