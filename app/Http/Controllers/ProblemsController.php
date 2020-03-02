<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Events\NewProblemHasBeenReportedEvent;
use App\Label;
use App\Mail\NewProblemReportedMail;
use App\Problem;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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
        $contacts = Contact::all()
            ->where( 'user_id', $this->getUserId() );
        $labels = Label::all()
            ->where( 'user_id', $this->getUserId() );

        //dd($contacts->first()->id, $labels->first()->id, $services->first()->id);
        $problem = new Problem();

        return view( 'problems.create', compact( 'services', 'problem', 'contacts', 'labels' ) );
    }

    public function store()
    {
        //TODO authorize here makes backendcalls safe on command line
        //$this->authorize( 'create', Problem::class );
        $request = $this->validateRequest();
        $label_id = $request[ 'label_id' ];
        //$label_id=1;
        $labels= Label::where('user_id', $this->getUserId())
        ->where('id', $label_id);
        $problem = Problem::create( array_merge( $request, [ 'user_id' => $this->getUserId() ] ) );
        if ( $labels->first() <> NULL ) {
            //dd('hier');
            $problem->labels()
                ->sync( $label_id );
        }
        //dd('hier2');
        //todo disable event because of double post
        //event( new NewProblemHasBeenReportedEvent( $problem ) );
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
        $contacts = Contact::all()
            ->where( 'user_id', $this->getUserId() );
        $labels = Label::all()
            ->where( 'user_id', $this->getUserId() );
        $problem = $this->authenticateProblem( $problem );
        //dd($problem->service->id);
        //dd($problem->contact->id);
        //dd($problem->labels->first()->id);

        return view( 'problems.edit', compact( 'problem', 'services', 'contacts', 'labels' ) );
    }

    public function update( Problem $problem )
    {
        $request = $this->validateRequest();
        $label_id = $request[ 'label_id' ];
        if ( $label_id > 0 ) {
            $problem->labels()
                ->sync( $label_id );
        } else {
            $problem->labels()->detach();
        }
        $problem = $this->authenticateProblem( $problem );
        $problem->update( $this->validateRequest() );
        session()->flash( 'message', 'Problem updated.' );

        return redirect( '/problems/' . $problem->id );
    }

    public function destroy( Problem $problem )
    {
        $problem = $this->authenticateProblem( $problem );
        //dd($problem->labels());
        //todo activiate authorize
        //$this->authorize( 'delete', $problem );
        $problem->delete();
        $problem->labels()->detach();
        //todo also delete pivot

        session()->flash( 'message', 'Problem deleted.' );

        return redirect( '/problems' );
    }

    private function authenticateProblem( Problem $problem )
    {
        return Problem::where( 'id', $problem->id )
            ->with( 'service' )
            ->with( 'contact' )
            ->with( 'labels' )
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
            'contact_id'  => 'required',
            'label_id'    => 'required',
        ] );
    }

    public function performanceTests2()
    {
        //todo new function whit return function empty view but that does eqloquent
        //todo fetch user with all underlying stuff.
        //todo fetch each small segment
        $user = Auth::user();
        $problem = Problem::with( 'service' )
            ->with( 'contact' )
            ->where( 'user_id', $this->getUserId() )->firstOrFail();
        //dd($user);
        //dd( $problem );
    }

    public function performanceTests()
    {

        $serviceRequest = [
            'name'    => 'dummyService',
            'email'   => 'dummy@service.be',
            'user_id' => $this->getUserId(),
        ];
        $contactRequest = [
            'name'      => 'dummyContact',
            'email'     => 'dummy@contact.be',
            'user_id'   => $this->getUserId(),
            'birthdate' => NULL,
            'gender'    => '0',
            'street'    => NULL,
            'sNumber'   => NULL,
            'bus'       => NULL,
            'city'      => NULL,
            'zip'       => NULL,
            'phone'     => NULL,
        ];
        $labelRequest = [
            'name'    => 'dummyLabel',
            'user_id' => $this->getUserId(),
        ];
        $problemRequest = [
            'name'    => 'dummyLabel',
            'user_id' => $this->getUserId(),
        ];
        //dd($contactRequest);
        $contact = Contact::create( $contactRequest );
        $service = Service::create( $serviceRequest );
        $label = Label::create( $labelRequest );
        $problem = Problem::create();
        dd( $service, $label, $contact );

    }

}
