@extends('layout')

@section('title')
    Edit Problem
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit problem</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/problems/{{$problem->id}}" method="POST" class="pb-5">
                @method('PATCH')
                @include('problems.form')
                <button type="submit" class="btn btn-primary">Edit problem</button>
            </form>
        </div>
    </div>
@endsection
