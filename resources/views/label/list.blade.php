@extends('layout')

@section('title')
    List Labels
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list label</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="listLabels" method="POST">
                <div class="form-group">
                    <label>Name:
                        <input type="text" name="name" class="form-control">
                    </label>
                </div>
                <div>{{$errors->first()}}</div>
                <button type="submit" class="btn btn-primary">Add label</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if( ! empty($labels))
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