<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
	public function listLabels()
	{
		$labels = Label::all();

		return view( 'label.list', [ 'labels' => $labels ] );

	}

	public function createLabel()
	{
		$data = \request()->validate( [
			'name' => 'required|min:3',
		] );

		/*
		 * Old simple way to store data
		$label = new Label();
		$name = \request( 'name' );
		$label->name = $name;
		$label->save();*/

		//mass assigment
		Label::create($data);

		return back();

	}
}
