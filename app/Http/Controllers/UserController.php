<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'profile');
    }

    public function profile($id){
        $user = User::where('id', '=',$id)->firstOrFail();
        return view('users.profile', compact('user'));
    }

    public function edit(Request $request, $id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }



    public function update($id, Request $request)
{
    $user = User::findOrFail($id);
    if ($user->id != Auth::user()->id) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'abt_me' => 'nullable|min:20',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'date_birth' => 'nullable|date',
    ]);


    $user->date_birth = strip_tags($validated['date_birth']);
    $user->name = strip_tags($validated['name']);
    $user->email = strip_tags($validated['email']);
    $user->abt_me = strip_tags($validated['abt_me']);
    
    if($request->hasFile('picture')){
        $path = $request->file('picture')->store('profile_picture', 'public');
        $user->picture = $path;
    }

    $user->save();

    return redirect()->route('profile', ['name' => $user->name])->with('success', 'Profile updated!');
}

}
