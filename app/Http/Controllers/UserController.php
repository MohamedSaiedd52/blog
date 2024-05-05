<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Showuser()
    {
        $users = User::where('is_admin','=',0)->get();
        return view('layouts.back.users.index',compact('users'));
    }


    public function Adduser()
    {
        // $users = User::all();
        return view('layouts.back.users.create');
    }
    public function Saveuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'is_admin' => 'required',
            // 'img_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Updated validation for image
            'img_file' => 'required|image|mimes:jpeg,png|max:2048', // The max rule is optional, sets max file size to 2MB
            'Phone'=>'nullable',
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('img_file')) {
            $file = $request->file('img_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName); // Save the file to public/uploads folder
        }
        // Create a new user record
        $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
            'is_admin' => trim($request->is_admin),
            'img_file'=>$fileName,
            'Phone' => trim($request->Phone),
        ]);

        // Send verification email to the user (pseudo code)
        // $user->sendEmailVerificationNotification();

        // return dd($request->all());
        // Redirect to the show user page with success message
        return redirect()->route('Showuser')->with('success', 'تم إنشاء المستخدم بنجاح. تم إرسال رسالة التحقق عبر البريد الإلكتروني.');
    }



    public function Edituser($id)
    {
        $users = User::findOrfail($id);
        return view('layouts.back.users.edit',compact('users'));
    }
    public function SaveEdituser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id, // Ignore the unique rule for the current user's email
            'password' => 'required',
            'is_admin' => 'required',
            'Phone' => 'nullable', // Validation for phone, can be more specific if needed
            'img_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for optional image upload
        ]);

        $user = User::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('img_file')) {
            $file = $request->file('img_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName); // Save the file to public/uploads folder

            // Update the user's img_file path if a new file is uploaded
            $user->img_file = $fileName;
        }

        // Update other user details
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->is_admin = trim($request->is_admin);
        $user->Phone = trim($request->Phone);
        $user->save();

        return redirect()->route('Showuser')->with('success', 'تم تحديث المستخدم بنجاح.');
    }


    public  function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('Showuser')->with('success', 'تم حذف المستخدم بنجاح.');

    }




}
