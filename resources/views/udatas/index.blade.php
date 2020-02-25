@extends('layouts.app')

@section('title')
    user data
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.user data')}}</h1>
            <p><a href="{{route('udata.edit')}}">{{__('text.edit')}}</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>{{__('text.name')}}</strong> {{$user->name}}</p>
            <p><strong>{{__('text.type')}}</strong> {{$user->udata->type}}</p>
            <p><strong>{{__('text.phone')}}</strong> {{$user->udata->phone}}</p>
            <p><strong>{{__('text.language')}}</strong> {{$user->udata->language}}</p>
            <p><strong>{{__('text.self mail')}}</strong> {{$user->udata->selfmail}}</p>
        </div>
    </div>
@endsection
