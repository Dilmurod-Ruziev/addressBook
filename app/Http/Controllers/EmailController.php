<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use Illuminate\Http\Request;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input=$request->search;
        $emails = Email::where('email', 'LIKE', '%' .$input. '%')
            ->orderBy('id','desc')->paginate(15);
        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact ::all();
        return view('emails.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['emails' => ['required','max:255','unique:emails,email']]);
        foreach ($request->emails as $key=>$name) {
            Email::create([
                'email' => $name,
                'contact_id' => $request->id
            ]);
        }
        return redirect('/emails');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return view('emails.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return view('emails.edit',compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $email->update(request()->validate(['email' => ['required','email','string','max:255','unique:emails,email']]));
        return redirect('/emails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return redirect('/emails');
    }
}
