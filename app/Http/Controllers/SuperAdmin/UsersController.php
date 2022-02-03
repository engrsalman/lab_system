<?php

namespace App\Http\Controllers\SuperAdmin;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Hash;
use Session;
use Auth;

class UsersController extends Controller
{   


    public function EditSuperAdmin(){
        $sup_admin = Auth::id();
        $super_admin = User::findorFail($sup_admin);
        return view('admin.super_admin.editsuper_admin',compact('super_admin'));
    }

    public function UpdateSuperAdmin(Request $request){
        
        $sup_admin = Auth::id();
        $super_admin = User::findorFail($sup_admin);

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$sup_admin,
            'firstname'     =>   'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'lastname'     =>    'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'phone_number'     =>   'required',
            
        ]);

         $super_admin->first_name     = $request->firstname;
         $super_admin->last_name      = $request->lastname;
         $super_admin->email          = $request->email;
         $super_admin->phone          = $request->phone_number;

         $super_admin = $super_admin->save();

         if($super_admin){

             Session::flash('success','Super Admin Updated Successfully');
            return redirect()->route('all.users');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }

    }

    public function CreateUser(){     
        return view('admin.super_admin.users.create');
    }


    public function SaveUser(Request $request){
            $User = new User();
            $request->validate([
                'firstname'     =>   'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
                'lastname'     =>    'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
                'useremail'     =>   'required | email |unique:users,email',
                'usergroup'     =>   'required',
                'userpassword'  =>   'required | min:6 | max:12 |'
            ]);

        $password = Hash::make($request->userpassword);

        // now Insert data to database table...........


         $User->first_name     = $request->firstname;
         $User->last_name      = $request->lastname;
         $User->email          = $request->useremail;
         $User->phone          = $request->phone_number;
         $User->password       = $password;
         $User->password_hint  = $request->userpassword;
         $User->user_type      = $request->usergroup;
         $User->user_image     = 'logo.png';
         
        $User = $User->save();

        if($User){

             Session::flash('success','User Inserted Successfully');
            return redirect()->route('all.users');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        } 
    }


    public function allUsers()
    {
        $users = User::where('user_type','!=','super_admin')->get();
        return view('admin.super_admin.users.index',compact('users'));
    }


    public function EditUser($id){

        $user = User::findorFail($id);
        return view('admin.super_admin.users.edit',compact('user'));
    }


    public function UpdateUser(Request $request, $id){
         $User = User::findorfail($id);
         $request->validate([
            'email' => 'required|email|unique:users,email,'.$User->id,
            'firstname'     =>   'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'lastname'     =>    'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'usergroup'     =>   'required',
            'userpassword'  =>   'required | min:6 | max:12 |'
        ]);
        
        $password = Hash::make($request->userpassword);

         $User->first_name     = $request->firstname;
         $User->last_name      = $request->lastname;
         $User->email          = $request->email;
         $User->phone          = $request->phone_number;
         $User->password       = $password;
         $User->password_hint  = $request->userpassword;
         $User->user_type      = $request->usergroup;
         $User->user_image     = 'logo.png';
         $User = $User->save();
         if($User){
            Session::flash('success','User Updated Successfully');
            return redirect()->route('all.users');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        } 
    }

    public function statusChange(Request $request){
     
     if($request->status == 1){
        $status = 0;
        }
     if($request->status == 0){
        $status = 1;
        }
         User::where('id',$request->user_id)->update([
                'active_status' => $status
          ]);
        Session::flash('success','Status changed successfully.');
        return true;
    }
}
