@extends('layout')

@section('title')
    List Labels
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list label</h1>
            <p><a href="labels/create">Add new label</a></p>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if( !$labels->isempty())
                List Labels
                <ul>
                    @foreach($labels as $label)
                        <li>{{$label->name}}</li>
                    <!--<li>{{$label}}</li>-->
                    @endforeach
                </ul>
            @else
                No Labels created yet
            @endif
        </div>
    </div>
@endsection
