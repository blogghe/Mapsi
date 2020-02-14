<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $labels = Label::all();

        //dd($labels);
        return view( 'labels.index', [ 'labels' => $labels ] );

    }

    public function create()
    {
        $label = new Label();
        return view( 'labels.create', compact( 'label' ) );

    }

    public function store()
    {

        /*
         * Old simple way to store data
        $label = new Label();
        $name = \request( 'name' );
        $label->name = $name;
        $label->save();*/

        //mass assigment
        $data = $this->validateRequest();
        Label::create( $data );
        session()->flash( 'message', 'Label created.' );

        return redirect( '/labels' );

    }

    public function show( Label $label )
    {
        //$label = Label::where('id', $label)->firstOrFail();
        return view( 'labels.show', compact( 'label' ) );
    }

    public function edit( Label $label )
    {
        return view( 'labels.edit', compact( 'label' ) );
    }

    public function update( Label $label )
    {
        $data = $this->validateRequest();
        $label->update( $data );
        session()->flash( 'message', 'Label updated.' );

        return redirect( '/labels/' . $label->id );
    }

    public function destroy( Label $label )
    {
        $label->delete();
        session()->flash( 'message', 'Label deleted.' );

        return redirect( '/labels' );
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'name' => 'required|min:3',
        ] );
    }
}
