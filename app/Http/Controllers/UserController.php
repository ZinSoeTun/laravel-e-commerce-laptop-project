<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //profile function
    public function profile()
    {
        return view('profile');
    }
    public function edit(Request $request)
    {
        //viliditation
        $this->vali($request);
        //data arrange
        $data = $this->dataArrange($request);
        //image store
        if ($request->hasFile('image')) {
            $dbImage = User::where('id', Auth::user()->id)->value('image');
            if ($dbImage != NULL) {
                //delete image from storage
                Storage::delete('public/profile/' . $dbImage);
            }
            $imgName = uniqid() . $request->file('image')->getClientOriginalName();
            //store in public
            $request->file('image')->storeAs('public/profile', $imgName);
            //store in db
            $data['image'] = $imgName;
        }
        //profile update in db
        User::where('id', Auth::user()->id)->update($data);
        return back()->with(['success'=> 'Your Profile Has Been Updated']);
    }
     //change password
       public function password(Request $request){
           $this->passwordVali($request);
           $dbData = User::where('id', Auth::user()->id)->first();
          $dbPassword= $dbData->password;
          if(Hash::check($request->oldPassword,$dbPassword)){
            $newPassword = Hash::make($request->newPassword);
            User::where('id',Auth::user()->id)->update(['password'=> $newPassword]);
            Auth::guard('web')->logout();
            return redirect()->route('login')->with(['success'=>'Changing passowrd is successed!']);
          }else{
            return back()->with(['error'=>'Old password do not match']);
          };
       }
       //private function for password validation
       private function passwordVali($request){
       $rules =[
        'oldPassword'=> 'required',
        'newPassword'=> 'required | min:6 |different:oldPassword',
        'comfirmPassword'=> 'required |same:newPassword',
       ];
        Validator::make($request->all(),$rules)->validate();
       }

    //private function for data arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address
        ];
    }
    //private function for validation edit
    private function vali($request)
    {
        $rules = [
            'name' => 'required| string',
            'age' => 'required |  numeric',
            'phone' => 'required |  numeric',
            'image' => 'image |  mimes:png,jpg,jpeg'
        ];

        $messages = [
            'name.required' => 'Please enter your name',
            'name.string' => 'Please enter only letters',
            'age.required' => 'Please enter your age',
            'age.numeric' => 'Please enter only numbers',
            'phone.required' => 'Please enter your phone number',
            'phone.numeric' => 'Please enter only numbers',
            'image.image' => 'We will only accept image file types',
            'image.mimes' => 'Jpeg,png,jpg are only accepted'
        ];

        Validator::make($request->all(), $rules, $messages)->validate();
    }
}
