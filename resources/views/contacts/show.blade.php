@extends('layouts.app')

@section('title')
    Contact details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.contact details')}}</h1>
            <p><a href="{{route('contacts.edit',['contact' =>$contact])}}">Edit</a></p>
            <form action="{{route('contacts.destroy', ['contact' =>$contact])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>{{__('text.name')}}</strong> {{$contact->name}}</p>
            <p><strong>{{__('text.email')}}</strong> {{$contact->email}}</p>
            <p><strong>{{__('text.street')}} + {{__('text.nr')}}
                    + {{__('text.bus')}}</strong> {{$contact->street}} {{$contact->sNumber}} {{$contact->bus}}</p>
            <p><strong>{{__('text.city')}} + {{__('text.zip')}}</strong> {{$contact->city}} {{$contact->zip}}</p>
            <p><strong>{{__('text.phone 1')}}</strong> {{$contact->phone}}</p>
            <p><strong>{{__('text.gender')}}</strong> {{$contact->gender}}</p>
        </div>
    </div>
    @if($contact->image)
        <div class="row">
            <div class="col-12"><img src="{{asset('storage/' . $contact->image)}}" alt="" class="img-thumbnail"></div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h3>{{__('text.linked problems')}}</h3>
        </div>
    </div>
    @foreach($contact->problems as $problem)
        <div class="row">
            <div class="col-3">
                <a href="{{route('problems.show',['problem'=>$problem])}}">{{$problem->title}}</a>
            </div>
            <div class="col-3 d-none d-md-block">
                <a href="{{route('services.show', ['service'=>$problem->service])}}">{{$problem->service->name}}</a>
            </div>
            <div class="col-3 d-none d-sm-block">{{$problem->status}}</div>
        </div>
    @endforeach
@endsection
