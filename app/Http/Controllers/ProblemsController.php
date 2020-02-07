<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
	public function listProblems()
	{
		$problems = Problem::all();

		return view( 'problem.list', [ 'problems' => $problems ] );

	}

	public function createProblem()
	{
		{
			$data = \request()->validate( [
				'name' => 'required|min:3',
			] );
			$problem = new Problem();
			$name = \request( 'name' );
			$problem->name = $name;
			$problem->save();

			return back();

		}
	}
}
