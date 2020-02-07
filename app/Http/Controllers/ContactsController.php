<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
			'email' => 'required|email',
			'sNumber' => 'nullable|integer',
			'zip' => 'nullable|integer',
			'phone' => 'nullable|integer',
			'birthdate' => 'nullable|date',
		] );
		$contact =$this->FillInDefaultContact();
		$name = \request( 'name' );
		$contact->name = $name;
		//$contact->street = \request( 'street' );
		$contact->email =\request('email');
		$contact->save();

		return back();
	}

	private function FillInDefaultContact()
	{
		$contact= new Contact();
		$contact->name='';
		$contact->email='';
		$contact->street='';
		$contact->sNumber=0;
		$contact->bus='';
		$contact->city='';
		$contact->gender=0;
		$contact->zip=0;
		$contact->phone=0;
		$contact->birthdate= date("Y/m/d");

		return $contact;
	}
}
