@extends('layout')

@section('content')
    <h1>list problem</h1>
    <form action="listProblems" method="POST" class="pb-5">
        <div class="input-group">
            <label>Name:
                <input type="text" name="name" value="{{old('name')}}">
            </label>
        </div>
        <div class="input-group">
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

        <button type="submit">Add Problem</button>
        @csrf
    </form>

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
@endsection