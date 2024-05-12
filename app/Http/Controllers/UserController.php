<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:user-index')->only('Showuser');
    //     $this->middleware('permission:user-create')->only('Adduser');
    //     $this->middleware('permission:user-edit')->only('Edituser');
    //     $this->middleware('permission:user-delete')->only('Deleteuser');
    // }



    public function Showuser()
    {
        $users = User::where('is_admin','=',0)->get();
        return view('layouts.back.users.index',compact('users'));
    }


    public function Adduser()
    {
        $roles = Role::pluck('name','name')->all();

        return view('layouts.back.users.create',compact('roles'));
    }



    public function Saveuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'is_admin' => 'required',
            'img_file' => 'nullable|image|mimes:jpeg,png|max:2048', // Updated validation for image
            'Phone' => 'nullable',
            'roles' => 'required',

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
            'img_file' => $fileName,
            'Phone' => trim($request->Phone),
        ]);

        // Assign roles to the user
        $user->assignRole($request->input('roles'));
        return redirect()->route('Showuser')->with('success', 'إنشاء المستخدم بنجاح');
    }



    public function Edituser($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all(); // Fetch roles with their IDs
        $userRoles = $users->roles->pluck('name')->all();

        return view('layouts.back.users.edit', compact('users', 'roles', 'userRoles'));
    }



    public function SaveEdituser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'required',
            'is_admin' => 'required',
            'Phone' => 'nullable',
            'img_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required',
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

        // Sync roles with the user
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('Showuser')->with('success', 'تم تحديث المستخدم بنجاح.');
    }


    public  function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('Showuser')->with('success', 'تم حذف المستخدم بنجاح.');

    }




}
