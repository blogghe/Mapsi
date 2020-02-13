<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view( 'contactform.create' );
    }

    public function store()
    {
        $data = \request()->validate( [
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ] );
        //todo won't work on vmuxintrdev03
        //Mail::to('test@test.com')->send(new ContactFormMail($data));
        //return redirect('contact')->with('message', 'Thanks for your message.');

        session()->flash( 'message', 'Thanks for your message.' );

        return redirect( 'contact' );

    }
}
