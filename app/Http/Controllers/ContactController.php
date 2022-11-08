<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{   
    public function index()
    {
        return Contact::orderBy('id', 'desc')->get();
    }
     

    public function store(Request $request){
        return Contact::updateOrCreate(['id' => $request->form['id']], $request->form);
    }



    public function edit (Request $request, $contact_id){   
        return Contact::find($contact_id);
    }


    public function show (Request $request, $contact_id){   
      
        $contact = Contact::find($contact_id);
        return $contact;
        // dd($contact);

    }

    public function destroy(Request $request, $contact_id){
        
        $contact = Contact::find($contact_id);
        
        $deletion = $contact->delete();
        return Contact::orderBy('id', 'desc')->get();

       
        
    }
    
}
