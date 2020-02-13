@extends('layouts.app')

@section('title')
    Add new label
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new label</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/labels" method="POST">
                @include('labels.form')
                <button type="submit" class="btn btn-primary">Add label</button>
            </form>
        </div>
    </div>
@endsection
