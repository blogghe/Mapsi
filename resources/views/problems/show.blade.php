@extends('layouts.app')

@section('title')
    Problem details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.problem details')}}</h1>
            <p><a href="{{route('problems.edit', ['problem' =>$problem])}}">{{__('text.edit')}}</a></p>
            <form action="{{route('problems.destroy',['problem' =>$problem])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>{{__('text.title')}}</strong> {{$problem->title}}</p>
            <p><strong>{{__('text.description')}}</strong> {{$problem->description}}</p>
            <p><strong>{{__('text.status')}}</strong> {{$problem->status}}</p>
            <p><strong>{{__('text.service')}}</strong>
                <a href="{{route('services.show', ['service' =>$problem->service])}}">
                    {{$problem->service->name}}
                </a>
            </p>
            <p><strong>{{__('text.contact')}}</strong>
                <a href="{{route('contacts.show', ['contact' =>$problem->contact])}}">
                    {{$problem->contact->name}}
                </a>
            </p>
            @if(!$problem['labels']->isEmpty())
                <p><strong>{{__('text.label')}}</strong>
                    <a href="{{route('labels.show', ['label' =>$problem->labels->first()])}}">
                        {{$problem->labels->first()->name}}
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection
