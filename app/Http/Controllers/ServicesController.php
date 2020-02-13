<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    public function index()
    {
        $services = Service::all();

        return view( 'services.index', [ 'services' => $services ] );

    }

    public function create()
    {
        $services = Service::all();
        $service = new Service();
        //dd($service);

        return view( 'services.create', compact( 'services', 'service' ) );

    }

    public function store()
    {
        //$service = new Service();
        //$name = \request( 'name' );
        //$email = \request( 'email' );
        //$service->name = $name;
        //$service->email = $email;

        $data = $this->validateRequest();
        Service::create( $data );

        return redirect( '/services' );
    }

    public function show( Service $service )
    {
        //$service = Service::where('id', $service)->firstOrFail();
        return view( 'services.show', compact( 'service' ) );
    }

    public function edit( Service $service )
    {
        return view( 'services.edit', compact( 'service' ) );
    }

    public function update( Service $service )
    {
        $data = $this->validateRequest();
        $service->update( $data );

        return redirect( 'services/' . $service->id );

    }

    public function destroy( Service $service )
    {
        $service->delete();

        return redirect( '/services' );
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'name'  => 'required|min:3',
            'email' => 'required|email',
        ] );
    }
}
