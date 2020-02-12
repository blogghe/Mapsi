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

    public function store()
    {
        $data = \request()->validate( [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'street'    => '',
            'sNumber'   => 'nullable|integer',
            'bus'       => '',
            'city'      => '',
            'gender'    => '',
            'zip'       => 'nullable|integer',
            'phone'     => 'nullable|integer',
            'birthdate' => 'nullable|date',
        ] );
        $contact = $this->FillInDefaultContact();
        $name = \request( 'name' );
        $contact->name = $name;
        //$contact->street = \request( 'street' );
        $contact->email = \request( 'email' );
        $contact->save();

        return redirect( '/contacts' );
    }

    public function create()
    {
        $contacts = Contact::all();

        return view( 'contacts.create', compact( 'contacts' ) );
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

    public function show( Contact $contact )
    {
        //dd($contact);

        //$contact = Contact::where('id', $contact)->firstOrFail();
        return view( 'contacts.show', compact( 'contact' ) );
    }
}
