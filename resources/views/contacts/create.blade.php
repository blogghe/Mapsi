@extends('layouts.app')

@section('title')
    Add new contact
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.add new contact')}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data" class="pb-5">
                @include('contacts.form')
                <button type="submit" class="btn btn-primary">{{__('text.add new contact')}}</button>
            </form>
        </div>
    </div>
@endsection
