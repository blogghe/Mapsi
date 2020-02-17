@extends('layouts.app')

@section('title')
    Edit contact
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit contact</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('contacts.update',['contact' =>$contact])}}" method="POST" enctype="multipart/form-data" class="pb-5">
                @method('PATCH')
                @include('contacts.form')
                <button type="submit" class="btn btn-primary">Edit contact</button>
            </form>
        </div>
    </div>
@endsection
