@extends('layouts.app')

@section('title')
    Add new label
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.add new label')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('labels.store')}}" method="POST">
                @include('labels.form')
                <button type="submit" class="btn btn-primary">{{__('text.add new label')}}</button>
            </form>
        </div>
    </div>
@endsection
