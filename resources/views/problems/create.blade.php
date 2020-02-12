@extends('layout')

@section('title')
    Add new Problem
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new problem</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/problems" method="POST" class="pb-5">
                @include('problems.form')
                <button type="submit" class="btn btn-primary">Add Problem</button>
            </form>
        </div>
    </div>
@endsection
