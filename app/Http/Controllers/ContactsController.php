<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function listContacts()
	{
		$contacts = [ 'Barteld', 'Bengt', 'Louis', ' guitje' ];

		return view( 'contact.list', [ 'contacts' => $contacts ] );
	}
}
