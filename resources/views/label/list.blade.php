@extends('layout')

@section('content')
    <h1>list label</h1>
    <form action="listLabels" method="POST" class="pb-5">
        <div class="input-group">
            <label>Name:
                <input type="text" name="name">
            </label>
        </div>
        <div>{{$errors->first()}}</div>

        <button type="submit">Add label</button>
        @csrf
    </form>
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
@endsection