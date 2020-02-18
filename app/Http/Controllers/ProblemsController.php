<?php

namespace App\Http\Controllers;

use App\Events\NewProblemHasBeenReportedEvent;
use App\Mail\NewProblemReportedMail;
use App\Problem;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProblemsController extends Controller
{
    /**
     * ProblemsController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['index']);
        $this->middleware( 'auth' );
    }

    public function index()
    {

        //$problems = Problem::all();
        $problems = Problem::with( 'service' )->get();

        //dd($problems->toArray());
        //eloquent, doesn't get recognized in phpstorm
        $reportedProblems = Problem::with( 'service' )->ongoing()->get();
        $ongoingProblems = Problem::with( 'service' )
            ->where( 'status', 1 )->get();
        $pendingProblems = Problem::with( 'service' )
            ->where( 'status', 2 )->get();
        $solvedProblems = Problem::with( 'service' )
            ->where( 'status', 3 )->get();
        $UnsolvedProblems = Problem::with( 'service' )
            ->where( 'status', 4 )->get();
        //$services = Service::all();
        $services = Service::with( 'problems' )->get();

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
        $problem = new Problem();

        return view( 'problems.create', compact( 'services', 'problem' ) );
    }

    public function store()
    {
        $data = $this->validateRequest();
        $problem = Problem::create( $data );

        event( new NewProblemHasBeenReportedEvent( $problem ) );
        session()->flash( 'message', 'Problem created.' );

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

        return view( 'problems.edit', compact( 'problem', 'services' ) );
    }

    public function update( Problem $problem )
    {
        $data = $this->validateRequest();
        session()->flash( 'message', 'Problem updated.' );

        $problem->update( $data );

        return redirect( '/problems/' . $problem->id );
    }

    public function destroy( Problem $problem )
    {
        $problem->delete();
        session()->flash( 'message', 'Problem deleted.' );

        return redirect( '/problems' );
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'title'       => 'required|min:3',
            'status'      => 'required',
            'description' => 'required',
            'service_id'  => 'required',
        ] );
    }
}
