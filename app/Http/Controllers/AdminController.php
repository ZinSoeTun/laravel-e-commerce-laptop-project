<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }
    ///user
    //user account list
    public function userList(){
      $data =   User::where('role', 'user')->paginate(10);
        return view('admin.userList', compact('data'));
    }
    //user account detail
    public function userDetail($id){
      $data =  User::where('id',$id)->first();
      return view('admin.userDetail', compact('data'));
    }
    //user account promote to admin
    public function promote($id){
          User::where('id',$id)->update(['role'=> 'admin']);
          return redirect()->route('user.list')->with(['success'=>'User account has been changed to Admin account']);
    }
    //user account delete
    public function userDelete($id){
    $dbImage =    User::where('id', $id)->value('image');
        if($dbImage != NULL)
        Storage::delete('public/profile/'.  $dbImage );
          User::where('id', $id)->delete();
          return back()->with(['success'=>'User account has been deleted']);
    }

    ///admin
    //admin account list
    public function adminList(){
        $data =   User::where('role', 'admin')->paginate(10);
          return view('admin.adminList', compact('data'));
      }
       //admin account detail
    public function adminDetail($id){
        $data =  User::where('id',$id)->first();
        return view('admin.adminDetail', compact('data'));
      }
        //change admin account to user account
    public function change($id){
        User::where('id',$id)->update(['role'=> 'user']);
        return redirect()->route('admin.list')->with(['success'=>'Admin account has been changed to User account']);
  }
    //admin account delete
    public function adminDelete($id){
        User::where('id', $id)->delete();
        return back()->with(['success'=>'Admin account has been deleted']);
  }
}
