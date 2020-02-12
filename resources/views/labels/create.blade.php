@extends('layout')

@section('title')
    Add new label
@endsection

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
                <div class="form-group">
                    <label for="name">Name:
                        <input type="text" name="name" class="form-control">
                    </label>
                </div>
                <div>{{$errors->first()}}</div>
                <button type="submit" class="btn btn-primary">Add label</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
