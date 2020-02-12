@extends('layout')

@section('title')
    Add new Service
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new service</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/services" method="POST" class="pb-5">
                <div class="form-group">
                    <label for="name">Name:
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('name')}}</div>
                </div>
                <div class="form-group">
                    <label for="email">Email:
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('email')}}</div>
                </div>
                <button type="submit" class="btn btn-primary">Add Service</button>
                @csrf
            </form>
        </div>
    </div>
@endsection

