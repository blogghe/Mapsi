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

		$data = \request()->validate( [
			'title' => 'required|min:3'
		] );
		//dd( \request( 'status' ) );
		$problem = $this->FillInDefaultProblem();
		//$description = \request( 'description' );
		$status = \request('status');
		$title= \request('title');
		//$problem->description = $description;
		$problem->title = $title;

		$problem->status = $status;
		$problem->save();

		return back();

	}
	private function FillInDefaultProblem()
	{
		$problem = new Problem();
		$problem->description="";
		$problem->title="";
		$problem->status=0;
		return $problem;
	}

}
