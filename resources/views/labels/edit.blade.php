@extends('layouts.app')

@section('title')
    Edit label
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit label</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/labels/{{$label->id}}" method="POST">
                @method('PATCH')
                @include('labels.form')
                <button type="submit" class="btn btn-primary">Edit label</button>
            </form>
        </div>
    </div>
@endsection
