<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
	public function listProblems()
	{
		$problems = Problem::all();
		$reportedProblems = Problem::where( 'status', 0 )->get();
		$ongoingProblems = Problem::where( 'status', 1 )->get();
		$pendingProblems = Problem::where( 'status', 2 )->get();
		$solvedProblems = Problem::where( 'status', 3 )->get();
		$UnsolvedProblems = Problem::where( 'status', 4 )->get();

		//dd( $UnsolvedProblems );

		/*return view( 'problem.list', [
			'problems'         => $problems,
			'reportedProblems' => $reportedProblems,
			'ongoingProblems' => $ongoingProblems,
			'pendingProblems' => $pendingProblems,
			'solvedProblems' => $solvedProblems,
			'UnsolvedProblems' => $UnsolvedProblems,
		] );*/

		return view( 'problem.list', compact( 'problems', 'reportedProblems', 'ongoingProblems', 'pendingProblems', 'solvedProblems', 'UnsolvedProblems' ) );

	}

	public function createProblem()
	{

		$data = \request()->validate( [
			'title'  => 'required|min:3',
			'status' => 'required',
		] );
		//dd( \request( 'status' ) );
		$problem = $this->FillInDefaultProblem();
		//$description = \request( 'description' );
		$status = \request( 'status' );
		$title = \request( 'title' );
		//$problem->description = $description;
		$problem->title = $title;

		$problem->status = $status;
		$problem->save();

		return back();

	}

	private function FillInDefaultProblem()
	{
		$problem = new Problem();
		$problem->description = "";
		$problem->title = "";
		$problem->status = 0;

		return $problem;
	}

}
