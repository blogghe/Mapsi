<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Intervention\Image\Facades\Image;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $contacts = Contact::paginate(10);

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
        $contact = Contact::create( $this->validateRequest() );

        $this->storeImage( $contact );

        session()->flash( 'message', 'Contact created.' );

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

        $contact->update( $this->validateRequest() );
        $this->storeImage( $contact );
        session()->flash( 'message', 'Contact updated.' );

        return redirect( '/contacts/' . $contact->id );
    }

    public function destroy( Contact $contact )
    {
        $contact->delete();
        session()->flash( 'message', 'Contact deleted.' );

        return redirect( '/contacts' );
    }

    private function validateRequest()
    {
        $validatedData = \request()->validate( [
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
        if ( \request()->hasFile( 'image' ) ) {
            \request()->validate( [
                'image' => 'file|image|max:5000',
            ] );
        }

        return $validatedData;
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

    private function storeImage( $contact )
    {
        if ( \request()->has( 'image' ) ) {
            $contact->update( [
                'image' => \request()->image->store( 'uploads', 'public' ),
            ] );
        }

        $image= Image::make(public_path('storage/' . $contact->image))->fit(300,300);
        $image->save();

    }

}
