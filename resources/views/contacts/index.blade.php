@extends('layout')

@section('title')
    List Contacts
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list contact</h1>
            <p><a href="contacts/create">Add new contact</a></p>
        </div>
    </div>
    @foreach($contacts as $contact)
        <div class="row">
            <div class="col-3">{{$contact->id}}</div>
            <div class="col-3">{{$contact->name}}</div>
            <div class="col-3">{{$contact->email}}</div>
            <div class="col-3">{{$contact->gender}}</div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12">
            @if( !$contacts->isempty())
                List contacts
                <ul>
                    @foreach($contacts as $contact)
                        <li>{{$contact->name}}<span class="text-muted"> ({{$contact->email}})</span></li>
                    <!--<li>{{$contact}}</li>-->
                    @endforeach
                </ul>
            @else
                No contacts created yet
            @endif
        </div>
    </div>
@endsection
