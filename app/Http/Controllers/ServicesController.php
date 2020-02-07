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
				'name' => 'required|min:3',
			] );
			$service = new Service();
			$name = \request( 'name' );
			$service->name = $name;
			$service->save();

			return back();

		}
	}
}
