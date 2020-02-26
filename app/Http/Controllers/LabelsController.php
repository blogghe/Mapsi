<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $labels = Label::where( 'user_id', $this->getUserId() )
            ->paginate( 10 );

        return view( 'labels.index', [ 'labels' => $labels ] );
    }

    public function create()
    {
        $label = new Label();

        return view( 'labels.create', compact( 'label' ) );
    }

    public function store()
    {

        /* Old simple way to store data
        $label = new Label();
        $name = \request( 'name' );
        $label->name = $name;
        $label->save();*/

        //mass assigment
        Label::create( array_merge( $this->validateRequest(), [ 'user_id' => $this->getUserId() ] ) );
        session()->flash( 'message', 'Label created.' );

        return redirect( '/labels' );
    }

    public function show( Label $label )
    {
        $label = $this->authenticateLabel( $label );

        return view( 'labels.show', compact( 'label' ) );
    }

    public function edit( Label $label )
    {
        $label = $this->authenticateLabel( $label );

        return view( 'labels.edit', compact( 'label' ) );
    }

    public function update( Label $label )
    {
        $label = $this->authenticateLabel( $label );
        $label->update( $this->validateRequest() );
        session()->flash( 'message', 'Label updated.' );

        return redirect( '/labels/' . $label->id );
    }

    public function destroy( Label $label )
    {
        $label = $this->authenticateLabel( $label );
        $label->delete();
        session()->flash( 'message', 'Label deleted.' );

        return redirect( '/labels' );
    }

    private function authenticateLabel( Label $label )
    {
        return Label::where( 'id', $label->id )
            ->where( 'user_id', $this->getUserId() )
            ->firstOrFail();
    }

    private function getUserId()
    {
        return Auth::user()->id;
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'name' => 'required|min:3',
        ] );
    }
}
