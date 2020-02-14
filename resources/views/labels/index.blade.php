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
    <div class="row">
        <div class="col-12">
            @if( !$labels->isempty())
                List Labels
                <ul>
                    @foreach($labels as $label)
                        <li>
                            <a href="{{route('labels.update', ['label'=>$label])}}"> {{$label->name}}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                No Labels created yet
            @endif
        </div>
    </div>
@endsection
