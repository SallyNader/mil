<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::all();

        return view('control.contacts.all',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('control.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
if(!empty($request->get('mobile'))){

    Contact::create(['mobile'=>$request->get('mobile')]);
}
if(!empty($request->get('website'))){

    Contact::create(['website'=>$request->get('website')]);
}
    if(!empty($request->get('address'))){

        Contact::create(['address'=>$request->get('address')]);
    }
        if(!empty($request->get('email'))){


            Contact::create(['email'=>$request->get('email')]);
        }


return redirect('controlcontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($row,$contact)
    {
        
        $contact=Contact::where($row,$contact)->pluck($row)->first();

        return view('control.contacts.detail',compact('contact','row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($column,$contact)
    {
      $contact=Contact::where($column,$contact)->pluck($column)->first();
      return view('control.contacts.edit',compact('column','contact'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $column,$contact)
    {
        if($column=='mobile'){


$this->validate($request,[

'contact'=>'required|numeric'

    ]);

        }

        if($column=='email'){


$this->validate($request,[

'contact'=>'required|email'

    ]);

        }
        if($column=='address'){


$this->validate($request,[

'contact'=>'required'

    ]);

        }

        if($column=='website'){


$this->validate($request,[

'contact'=>'required'

    ]);

        }

        $contact=Contact::where($column,$contact)->first();


        $contact->$column=$request->get('contact');
        $contact->save();

        return redirect('controlcontact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($column,$contact)
    {
        $contact=Contact::where($column,$contact)->first();
      
$contact->$column=Null;
$contact->save();

return redirect()->back();

    }
}
