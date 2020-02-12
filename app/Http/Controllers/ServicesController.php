<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view( 'services.index', [ 'services' => $services ] );

    }

    public function create()
    {
        $services = Service::all();

        return view( 'services.create', compact( 'services' ) );

    }

    public function store()
    {
        {
            $data = \request()->validate( [
                'name'  => 'required|min:3',
                'email' => 'required|email',
            ] );
            $service = new Service();
            $name = \request( 'name' );
            $email = \request( 'email' );
            //dd(\request('email'));
            $service->name = $name;
            $service->email = $email;
            $service->save();

            return redirect( '/services' );

        }
    }

    public function show( Service $service )
    {
        //$service = Service::where('id', $service)->firstOrFail();
        return view( 'services.show', compact( 'service' ) );
    }
}
