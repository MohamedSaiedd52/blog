<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */



    // public function index(Request $request)
    // {
    //     $users = User::all();
    //     return view('profile.index',compact('users'));
    // }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */



//    public function update(Request $request,$id)
//    {
//      $request->validate([
//          'name' => 'required',
//      ]);

//      $tags = Tag::where('id',$id)->update([
//          'name' => $request->name,
//      ]);
//      return redirect()->route('tags.index')->with('success', 'تم التعديل التنصيف بنجاح.     ');


//    }

//    public function destroy($id)
//    {
//      $tags = Tag::where('id',$id)->delete();
//      return redirect()->route('tags.index')->with('success', 'تم   حذف التصنيف بنجاح.     ');

//    }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
