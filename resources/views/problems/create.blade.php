@extends('layout')

@section('title')
    Add new Problems
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new problem</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/problems" method="POST" class="pb-5">
                <div class="form-group">
                    <label for="title">Title:
                        <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('title')}}</div>
                </div>
                <div class="form-group">
                    <label for="description">Description:
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    </label>
                    <div>{{$errors->first('description')}}</div>
                </div>
                <div class="form-group">
                    <label for="status">Status:
                        <select class="form-control m-bot15" name="status">
                            <option value="" disabled>Select a status</option>
                            <option value="0">Reported</option>
                            <option value="1">Ongoing</option>
                            <option value="2">Pending</option>
                            <option value="3">Solved</option>
                            <option value="4">Unsolved</option>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label for="service_id">Service:
                        <select class="form-control m-bot15" name="service_id" id="service_id">
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                            <option value="" disabled>Select a service</option>
                        </select>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Add Problem</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
