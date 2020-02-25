@extends('layouts.app')
@section('title')
    Label details
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.label details')}}</h1>
            <p><a href="{{route('labels.edit',['labels' =>$label])}}">{{__('text.edit')}}</a></p>
            <form action="{{route('labels.destroy', ['label' => $label])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>{{__('text.name')}}</strong> {{$label->name}}</p>
        </div>
    </div>
@endsection
