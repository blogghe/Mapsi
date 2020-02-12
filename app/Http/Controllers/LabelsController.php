<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function index()
    {
        $labels = Label::all();

        //dd($labels);
        return view( 'labels.index', [ 'labels' => $labels ] );

    }

    public function create()
    {
        $labels = Label::all();

        return view( 'labels.create', compact( 'services' ) );

    }

    public function store()
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
        Label::create( $data );

        return redirect( '/labels' );

    }

    public function show( Label $label )
    {
        //$label = Label::where('id', $label)->firstOrFail();
        return view('labels.show', compact('label'));
    }
}
