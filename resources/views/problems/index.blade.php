@extends('layout')

@section('title')
    List Problems
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>list problem</h1>
            <p><a href="problems/create">Add new problem</a></p>
        </div>
    </div>


    @foreach($problems as $problem)
        <div class="row">
            <div class="col-3">{{$problem->id}}</div>

            <div class="col-3">{{$problem->title}}</div>
            <div class="col-3">{{$problem->service->name}}</div>
            <div class="col-3">{{$problem->status}}</div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-4">
            @if( ! empty($reportedProblems))
                Reported Problems
                <ul>
                    @foreach($reportedProblems as $reportedProblem)
                        <li>{{$reportedProblem->title}}<span
                                class="text-muted"> ({{$reportedProblem->service->name}})</span>
                        </li>
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
                        <li>{{$ongoingProblem->title}}<span
                                class="text-muted"> ({{$ongoingProblem->service->name}})</span>
                        </li>
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
                        <li>{{$pendingProblem->title}}<span
                                class="text-muted"> ({{$pendingProblem->service->name}})</span>
                        </li>
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
                        <li>{{$solvedProblem->title}}<span
                                class="text-muted"> ({{$solvedProblem->service->name}})</span></li>
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
                        <li>{{$UnsolvedProblem->title}}<span
                                class="text-muted"> ({{$UnsolvedProblem->service->name}})</span>
                        </li>
                    <!--<li>{{$UnsolvedProblem}}</li>-->
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($services as $service)
                <h3>{{$service->name}}</h3>
                <ul>
                    @foreach($service->problems as $problem)
                        <li>{{$problem->title}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
@endsection
