<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Service;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function listProblems()
    {
        $problems = Problem::all();
        //eloquent, doesn't get recognized in phpstorm
        $reportedProblems = Problem::ongoing()->get();
        $ongoingProblems = Problem::where( 'status', 1 )->get();
        $pendingProblems = Problem::where( 'status', 2 )->get();
        $solvedProblems = Problem::where( 'status', 3 )->get();
        $UnsolvedProblems = Problem::where( 'status', 4 )->get();
        $services = Service::all();

        //dd( $UnsolvedProblems );

        /*return view( 'problem.list', [
            'problems'         => $problems,
            'reportedProblems' => $reportedProblems,
            'ongoingProblems' => $ongoingProblems,
            'pendingProblems' => $pendingProblems,
            'solvedProblems' => $solvedProblems,
            'UnsolvedProblems' => $UnsolvedProblems,
        ] );*/

        return view( 'problem.list', compact( 'problems', 'reportedProblems', 'ongoingProblems', 'pendingProblems', 'solvedProblems', 'UnsolvedProblems', 'services' ) );

    }

    public function createProblem()
    {

        $data = \request()->validate( [
            'title'       => 'required|min:3',
            'status'      => 'required',
            'description' => 'required',
            'service_id'  => 'required',
        ] );
        Problem::create( $data );

        return back();

    }
}
