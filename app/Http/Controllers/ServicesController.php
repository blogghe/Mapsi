<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $services = Service::with( 'problems' )
            ->where( 'user_id', $this->getUserId() )
            ->paginate( 10 );

        return view( 'services.index', [ 'services' => $services ] );
    }

    public function create()
    {
        $service = new Service();

        return view( 'services.create', compact( 'service' ) );
    }

    public function store()
    {
        Service::create( array_merge( $this->validateRequest(), [ 'user_id' => $this->getUserId() ] ) );
        session()->flash( 'message', 'Service created.' );

        return redirect( '/services' );
    }

    public function show( Service $service )
    {
        $service = $this->authenticateService( $service );

        return view( 'services.show', compact( 'service' ) );
    }

    public function edit( Service $service )
    {
        $service = $this->authenticateService( $service );

        return view( 'services.edit', compact( 'service' ) );
    }

    public function update( Service $service )
    {
        $service = $this->authenticateService( $service );
        $service->update( $this->validateRequest() );
        session()->flash( 'message', 'Service updated.' );

        return redirect( 'services/' . $service->id );
    }

    public function destroy( Service $service )
    {
        $service = $this->authenticateService( $service );
        $service->delete();
        session()->flash( 'message', 'Service deleted.' );

        return redirect( '/services' );
    }

    private function authenticateService( Service $service )
    {
        return Service::where( 'id', $service->id )
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
            'name'  => 'required|min:3',
            'email' => 'required|email',
        ] );
    }
}
