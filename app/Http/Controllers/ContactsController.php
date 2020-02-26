<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $contacts = Contact::where( 'user_id', $this->getUserId() )
            ->paginate( 10 );

        return view( 'contacts.index', [ 'contacts' => $contacts ] );

    }

    public function create()
    {
        $contact = new Contact();

        return view( 'contacts.create', compact( 'contact' ) );
    }

    public function store()
    {
        $contact = Contact::create( array_merge( $this->validateRequest(), [ 'user_id' => $this->getUserId() ] ) );
        $this->storeImage( $contact );
        session()->flash( 'message', 'Contact created.' );

        return redirect( '/contacts' );
    }

    public function show( Contact $contact )
    {
        $contact = $this->authenticateContact( $contact );

        return view( 'contacts.show', compact( 'contact' ) );
    }

    public function edit( Contact $contact )
    {
        $contact = $this->authenticateContact( $contact );

        return view( 'contacts.edit', compact( 'contact' ) );
    }

    public function update( Contact $contact )
    {
        $contact = $this->authenticateContact( $contact );
        $contact->update( $this->validateRequest() );
        $this->storeImage( $contact );
        session()->flash( 'message', 'Contact updated.' );

        return redirect( '/contacts/' . $contact->id );
    }

    public function destroy( Contact $contact )
    {
        $contact = $this->authenticateContact( $contact );
        $contact->delete();
        session()->flash( 'message', 'Contact deleted.' );

        return redirect( '/contacts' );
    }

    private function authenticateContact( Contact $contact )
    {
        return Contact::where( 'id', $contact->id )
            ->where( 'user_id', $this->getUserId() )
            ->firstOrFail();
    }

    private function getUserId()
    {
        return Auth::user()->id;
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

    private function storeImage( $contact )
    {
        if ( \request()->has( 'image' ) ) {
            $contact->update( [
                'image' => \request()->image->store( 'uploads', 'public' ),
            ] );
            $image = Image::make( public_path( 'storage/' . $contact->image ) )->fit( 300, 300 );
            $image->save();
        }

    }

}
