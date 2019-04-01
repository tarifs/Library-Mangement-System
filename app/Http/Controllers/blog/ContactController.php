<?php

namespace App\Http\Controllers\blog;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
	public function index()
	{
		$contacts = Contact::all();
		return view('admin.blog.contact.index', compact('contacts'));
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('admin.blog.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'address'=> 'required',
            'Phone'=> 'required',
            'Fax'=> 'required',
            'email'=> 'required|email',
            'web'=> 'required',
        ]);

        $contact = Contact::find($id);
        $contact->address = $request->address;
        $contact->Phone = $request->Phone;
        $contact->Fax = $request->Fax;
        $contact->email = $request->email;
        $contact->web = $request->web;
        $contact->save();

        Session::flash('success','Update successfully');

        return redirect()->route('contact.index');
    }
}
