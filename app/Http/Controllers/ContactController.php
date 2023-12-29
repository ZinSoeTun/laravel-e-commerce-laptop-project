<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //contact from customer
    public  function contact(Request $request){
        $this->vali($request);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' =>$request->message
        ]);
        return back()->with(['success'=> 'Thanks for sending contact message and we will reply soon with email or phone.']);
    }
    //private function for validation
    private function vali($request){
        $rules = [
            'name' => 'required | string',
            'email' => 'required | email',
            'message' => 'required | string',

        ];
        Validator::make($request->all(),$rules)->validate();
    }
    //contact list(Admin Dashboard)
    public function contactList(){
      $data =  Contact::paginate(4);
      return view('admin.contactList', compact('data'));
    }
    //contact detail
    public function contactDetail($id){
        $data =  Contact::where('id',$id)->first();
        return view('admin.contactDetail', compact('data'));
      }
        //contact delete
    public function contactDelete($id){
         Contact::where('id',$id)->delete();
        return back()->with(['success'=> 'Contact has been deleted!']);
      }
}

