<?php

namespace App\Http\Controllers;

use App\Events\NewProblemHasBeenReportedEvent;
use App\Mail\NewProblemReportedMail;
use App\Problem;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //dd($problems->toArray());
        //eloquent, doesn't get recognized in phpstorm
        /*$reportedProblems = Problem::with( 'service' )->ongoing()->get();
        $ongoingProblems = Problem::with( 'service' )
            ->where( 'status', 1 )->get();
        $pendingProblems = Problem::with( 'service' )
            ->where( 'status', 2 )->get();
        $solvedProblems = Problem::with( 'service' )
            ->where( 'status', 3 )->get();
        $UnsolvedProblems = Problem::with( 'service' )
            ->where( 'status', 4 )->get();
        //$services = Service::all();
        $services = Service::with( 'problems' )->get();*/

        /*return view( 'problem.list', [
            'problems'         => $problems,
            'reportedProblems' => $reportedProblems,
            'ongoingProblems' => $ongoingProblems,
            'pendingProblems' => $pendingProblems,
            'solvedProblems' => $solvedProblems,
            'UnsolvedProblems' => $UnsolvedProblems,
        ] );*/
        $problems = Problem::with( 'service' )
            ->where( 'user_id', $this->getUserId() )
            ->paginate( 10 );

        return view( 'problems.index', compact( 'problems', 'reportedProblems', 'ongoingProblems', 'pendingProblems', 'solvedProblems', 'UnsolvedProblems', 'services' ) );
    }

    public function create()
    {
        $services = Service::all()
            ->where( 'user_id', $this->getUserId() );
        $problem = new Problem();

        return view( 'problems.create', compact( 'services', 'problem' ) );
    }

    public function store()
    {
        //authorize here makes backendcalls safe on command line
        //$this->authorize( 'create', Problem::class );
        //dd(array_merge( $this->validateRequest(), [ 'user_id' => $this->getUserId() ]));

        $problem = Problem::create( array_merge( $this->validateRequest(), [ 'user_id' => $this->getUserId() ] ) );
        event( new NewProblemHasBeenReportedEvent( $problem ) );
        session()->flash( 'message', 'Problem created.' );

        return redirect( '/problems' );
    }

    public function show( Problem $problem )
    {
        $problem = $this->authenticateProblem( $problem );

        return view( 'problems.show', compact( 'problem' ) );
    }

    public function edit( Problem $problem )
    {
        $services = Service::all()
            ->where( 'user_id', $this->getUserId() );
        $problem = $this->authenticateProblem( $problem );

        return view( 'problems.edit', compact( 'problem', 'services' ) );
    }

    public function update( Problem $problem )
    {
        $problem = $this->authenticateProblem( $problem );
        $problem->update( $this->validateRequest() );
        session()->flash( 'message', 'Problem updated.' );

        return redirect( '/problems/' . $problem->id );
    }

    public function destroy( Problem $problem )
    {
        $problem = $this->authenticateProblem( $problem );
        $this->authorize( 'delete', $problem );
        $problem->delete();
        session()->flash( 'message', 'Problem deleted.' );

        return redirect( '/problems' );
    }

    private function authenticateProblem( Problem $problem )
    {
        return Problem::where( 'id', $problem->id )
            ->where( 'user_id', $this->getUserId() )
            ->firstOrFail();
    }

    private function getUserId()
    {
        return Auth::user()->id;
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
