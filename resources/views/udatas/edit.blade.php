@extends('layouts.app')

@section('title')
    Edit user data
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.edit user data')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('udata.update',['udata' => $user->udata])}}" method="POST" class="pb-5">
                @method('PATCH')
                @include('udatas.form')
                <button type="submit" class="btn btn-primary">{{__('text.edit user data')}}</button>
            </form>
        </div>
    </div>
@endsection
