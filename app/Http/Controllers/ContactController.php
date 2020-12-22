<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input=$request->search;
        $contacts = Contact::where('name', 'LIKE', '%' .$input. '%')
            ->orWhereHas('emails', function($q) use ($input) {
            return $q->where('email', 'LIKE', '%' . $input . '%');
            })
            ->orWhereHas('phones', function($q) use ($input) {
                return $q->where('number', 'LIKE', '%'. $input . '%');
            })
        ->orderBy('id','desc')->paginate(15);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required', 'max:255', 'unique:contacts,name'],
            'emails' => ['required','max:255','unique:emails,email'],
            'phones' => ['required','max:12','unique:phones,number']
        ]);
        $contact_id = (Contact::max('id')+1);
        Contact ::create([
            'id'=>$contact_id,
            'name'=>request()->input('name')
        ]);
        foreach (request()->input('phones') as $key=>$name) {
            Phone::create([
                'number' => $name,
                'contact_id' => $contact_id
            ]);
        }
        foreach (request()->input('emails') as $key=>$name) {
            Email::create([
                'email' => $name,
                'contact_id' => $contact_id
            ]);
        }
        return redirect('/contacts');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update(request()->validate(['name' => ['string', 'required', 'max:255', 'unique:contacts,name']]));
        return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts');
    }
}
