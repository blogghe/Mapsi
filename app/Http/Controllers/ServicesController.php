<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
	public function listServices()
	{
		$services = Service::all();

		return view( 'service.list', [ 'services' => $services ] );

	}

	public function createService()
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

			return back();

		}
	}
}
