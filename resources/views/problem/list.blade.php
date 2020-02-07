@extends('layout')

@section('title')
    List Problems
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list problem</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="listProblems" method="POST" class="pb-5">
                <div class="form-group">
                    <label>Name:
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label>Status:
                        <select class="form-control m-bot15" name="role_id">
                            <option value="0">Reported</option>
                            <option value="1">Ongoing</option>
                            <option value="2">Pending</option>
                            <option value="3">Solved</option>
                            <option value="4">Unsolved</option>
                        </select>
                    </label>
                </div>
                <div>{{$errors->first('name')}}</div>
                <button type="submit" class="btn btn-primary">Add Problem</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if( ! empty($problems))
                List Problems
                <ul>
                    @foreach($problems as $problem)
                        <li>{{$problem->name}}</li>
                    <!--<li>{{$problem}}</li>-->
                    @endforeach
                </ul>
            @else
                No problems created yet
            @endif
        </div>
    </div>
@endsection