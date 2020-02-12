@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Contact details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Id</strong> {{$contact->title}}</p>
            <p><strong>Name</strong> {{$contact->name}}</p>
            <p><strong>Email</strong> {{$contact->email}}</p>
            <p><strong>Street + Nr + bus</strong> {{$contact->street}} {{$contact->sNumber}} {{$contact->bus}}</p>
            <p><strong>City + Zip</strong> {{$contact->city}} {{$contact->zip}}</p>
            <p><strong>Phone</strong> {{$contact->phone}}</p>
            <p><strong>Gender</strong> {{$contact->gender}}</p>

        </div>
    </div>
@endsection
