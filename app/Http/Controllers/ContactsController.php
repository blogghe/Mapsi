<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function listContacts()
	{
		$contacts = Contact::all();

		return view( 'contact.list', [ 'contacts' => $contacts ] );

	}

	public function createContact()
	{
		$data = \request()->validate( [
			'name' => 'required|min:3',
		] );
		$contact = new Contact();
		$name = \request( 'name' );
		$contact->name = $name;
		$contact->save();

		return back();

	}
}
