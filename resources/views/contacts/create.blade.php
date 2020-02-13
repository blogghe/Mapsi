@extends('layouts.app')

@section('title')
    Add new contact
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new contact</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/contacts" method="POST" class="pb-5">
                @include('contacts.form')
                <button type="submit" class="btn btn-primary">Add contact</button>
            </form>
        </div>
    </div>
@endsection
