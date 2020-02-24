<?php

namespace App\Http\Controllers;

use App\Udata;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UdataController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );

    }

    public function index()
    {
        //
    }

    public function index2()
    {
        $id = Auth::user()->id;
        $user = User::with( 'udata' )->where( 'id', $id )->firstOrFail();

        return view( 'udatas.index', compact( 'user' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Udata $udata
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Udata $udata )
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Udata $udata
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Udata $udata )
    {
        //
    }

    public function edit2()
    {
        $id = Auth::user()->id;
        $user = User::with( 'udata' )->where( 'id', $id )->firstOrFail();

        return view( 'udatas.edit', compact( 'user' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Udata               $udata
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Udata $udata )
    {
        //
    }

    public function update2(Udata $udata)
    {
        $data =$this->validateRequest();
        session()->flash( 'message', 'User data updated.' );
        $udata->update($data);


        return redirect( '/udata' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Udata $udata
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Udata $udata )
    {
        //
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'phone' => 'required',
            'language' => 'required',
            'selfmail' => 'required',
        ] );
    }
}
