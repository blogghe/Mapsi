<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Service;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index()
    {
        $problems = Problem::all();
        //eloquent, doesn't get recognized in phpstorm
        $reportedProblems = Problem::ongoing()->get();
        $ongoingProblems = Problem::where( 'status', 1 )->get();
        $pendingProblems = Problem::where( 'status', 2 )->get();
        $solvedProblems = Problem::where( 'status', 3 )->get();
        $UnsolvedProblems = Problem::where( 'status', 4 )->get();
        $services = Service::all();

        /*return view( 'problem.list', [
            'problems'         => $problems,
            'reportedProblems' => $reportedProblems,
            'ongoingProblems' => $ongoingProblems,
            'pendingProblems' => $pendingProblems,
            'solvedProblems' => $solvedProblems,
            'UnsolvedProblems' => $UnsolvedProblems,
        ] );*/

        return view( 'problems.index', compact( 'problems', 'reportedProblems', 'ongoingProblems', 'pendingProblems', 'solvedProblems', 'UnsolvedProblems', 'services' ) );
    }

    public function create()
    {
        $services = Service::all();

        return view( 'problems.create', compact( 'services' ) );
    }

    public function store()
    {

        $data = \request()->validate( [
            'title'       => 'required|min:3',
            'status'      => 'required',
            'description' => 'required',
            'service_id'  => 'required',
        ] );
        Problem::create( $data );

        return redirect( '/problems' );

    }

    public function show( Problem $problem )
    {
        //$problem = Problem::find($problem);
        //$problem = Problem::where('id', $problem)->firstOrFail();
        return view( 'problems.show', compact( 'problem' ) );
    }

    public function edit( Problem $problem )
    {
        $services = Service::all();
        return view('problems.edit', compact('problem','services'));
    }

    public function update( Problem $problem )
    {
        $data = \request()->validate( [
            'title'       => 'required|min:3',
            'description' => 'required',
        ] );
        $problem->update($data);
        return redirect( '/problems/'.$problem->id );

    }
}
