@extends('layouts.app')

@section('title')
    Edit label
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.edit label')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('labels.update',['label' =>$label])}}" method="POST">
                @method('PATCH')
                @include('labels.form')
                <button type="submit" class="btn btn-primary">{{__('text.edit label')}}</button>
            </form>
        </div>
    </div>
@endsection
