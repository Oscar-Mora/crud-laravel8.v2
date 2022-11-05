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
        return Contact::create($request->form);
    }



    public function edit (Request $request, $contact_id){   
        
    }


    public function update (Request $request){   
        
      
        

    }

    public function destroy(Request $request, $contact_id){

       
        
    }
    
}
