@extends('layouts.app')

@section('title')
    List Labels
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list label</h1>
            <p><a href="{{route('labels.create')}}">Add new label</a></p>
        </div>
    </div>
    @foreach($labels as $label)
        <div class="row">
            <div class="col-12">
                <a href="{{route('labels.update', ['label'=>$label])}}"> {{$label->name}}</a>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$labels->links()}}
        </div>
    </div>
@endsection
