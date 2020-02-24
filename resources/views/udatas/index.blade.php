@extends('layouts.app')

@section('title')
    user data
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>User data</h1>
            <p><a href="{{route('udata.edit')}}">Edit</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>name</strong> {{$user->name}}</p>
            <p><strong>type</strong> {{$user->udata->type}}</p>
            <p><strong>phone</strong> {{$user->udata->phone}}</p>
            <p><strong>language</strong> {{$user->udata->language}}</p>
            <p><strong>self mail</strong> {{$user->udata->selfmail}}</p>
        </div>
    </div>
@endsection
