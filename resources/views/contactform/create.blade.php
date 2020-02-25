@extends('layouts.app')

@section('title')
    Contact us
@endsection

@section('content')
    <h1>Contact us</h1>

    @if(!session()->has('message'))
        <form action="{{route('contact.store')}}" method="post">
            <div class="form-group">
                <label for="name">{{__('text.name')}}</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>
            <div class="form-group">
                <label for="email">{{__('text.email')}}</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control">
                <div>{{$errors->first('email')}}</div>
            </div>
            <div class="form-group">
                <label for="message">{{__('text.message')}}</label>
                <textarea name="message" value="{{old('message')}}" class="form-control"></textarea>
                <div>{{$errors->first('message')}}</div>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">{{__('text.send')}}</button>
        </form>
    @endif

@endsection
