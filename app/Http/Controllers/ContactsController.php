<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        //dd($contacts);
        return view( 'contacts.index', [ 'contacts' => $contacts ] );

    }

    public function create()
    {
        $contact = new Contact();

        return view( 'contacts.create', compact( 'contact' ) );
    }

    public function store()
    {
        $data = $this->validateRequest();

        Contact::create( $data );

        return redirect( '/contacts' );
    }

    public function show( Contact $contact )
    {
        //dd($contact);

        //$contact = Contact::where('id', $contact)->firstOrFail();
        return view( 'contacts.show', compact( 'contact' ) );
    }

    public function edit( Contact $contact )
    {
        return view( 'contacts.edit', compact( 'contact' ) );
    }

    public function update( Contact $contact )
    {
        $data = $this->validateRequest();
        $contact->update( $data );

        return redirect( '/contacts/' . $contact->id );
    }

    public function destroy( Contact $contact )
    {
        $contact->delete();

        return redirect( '/contacts' );
    }

    private function validateRequest()
    {
        return \request()->validate( [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'street'    => 'nullable',
            'sNumber'   => 'nullable|integer',
            'bus'       => 'nullable',
            'city'      => 'nullable',
            'gender'    => 'nullable',
            'zip'       => 'nullable|integer',
            'phone'     => 'nullable|integer',
            'birthdate' => 'nullable|date',
        ] );
    }

    private function FillInDefaultContact()
    {
        $contact = new Contact();
        $contact->name = '';
        $contact->email = '';
        $contact->street = '';
        $contact->sNumber = 0;
        $contact->bus = '';
        $contact->city = '';
        $contact->gender = 0;
        $contact->zip = 0;
        $contact->phone = 0;
        $contact->birthdate = date( "Y/m/d" );

        return $contact;
    }

}
