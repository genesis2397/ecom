<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminProfileController extends Controller
{

    public function viewProfile()
    {
        $adminData = Admin::findOrFail(1)->first();
        return view('admin.profile', compact('adminData'));
    }

    public function editProfile()
    {
        $adminData = Admin::findOrFail(1)->first();
        return view('admin.profileEdit',compact('adminData'));
    }

    public function updateProfile()
    {
        $adminData = Admin::findOrFail(1);

        $adminData->name = request()->input('name');
        $adminData->email = request()->input('email');

        if(request()->hasFile('file'))
        {
            $image = request()->file('file');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/admin_images/'), $imageName);
            $adminData['profile_photo_path'] = $imageName;
        }

        $adminData->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword()
    {
        return view('admin.admin_password');
    }

    public function updatePassword()
    {
        $validated = request()->validate([
            'current_password' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        $adminData = Admin::findOrFail(1);

        if(Hash::check(request()->input('current_password'), $adminData->password))
        {
           $adminData->password = Hash::make(request()->input('password'));
           $adminData->save();
           return back();
        }


    }
}
