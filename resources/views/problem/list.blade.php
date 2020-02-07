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
                    <label for="title">Title:
                        <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('title')}}</div>
                </div>
                <div class="form-group">
                    <label for="description">Description:
                        <textarea class="form-control"  name="description">{{old('description')}}</textarea>
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
                <button type="submit" class="btn btn-primary">Add Problem</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            @if( ! empty($reportedProblems))
                Reported Problems
                <ul>
                    @foreach($reportedProblems as $reportedProblem)
                        <li>{{$reportedProblem->title}}<span class="text-muted"> ({{$reportedProblem->status}})</span></li>
                    <!--<li>{{$reportedProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-4">
            @if( ! empty($ongoingProblems))
                Ongoing Problems
                <ul>
                    @foreach($ongoingProblems as $ongoingProblem)
                        <li>{{$ongoingProblem->title}}<span class="text-muted"> ({{$ongoingProblem->status}})</span></li>
                    <!--<li>{{$ongoingProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-4">
            @if( ! empty($pendingProblems))
                Pending Problems
                <ul>
                    @foreach($pendingProblems as $pendingProblem)
                        <li>{{$pendingProblem->title}}<span class="text-muted"> ({{$pendingProblem->status}})</span></li>
                    <!--<li>{{$pendingProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            @if( ! empty($solvedProblems))
                Solved Problems
                <ul>
                    @foreach($solvedProblems as $solvedProblem)
                        <li>{{$solvedProblem->title}}<span class="text-muted"> ({{$solvedProblem->status}})</span></li>
                    <!--<li>{{$solvedProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-6">
            @if( ! empty($UnsolvedProblems))
                Unsolved Problems
                <ul>
                    @foreach($UnsolvedProblems as $UnsolvedProblem)
                        <li>{{$UnsolvedProblem->title}}<span class="text-muted"> ({{$UnsolvedProblem->status}})</span></li>
                    <!--<li>{{$UnsolvedProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection