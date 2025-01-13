<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $request->has('is_admin') ? 1 : 0,
        ]);

        return redirect()->route('admin.index')->with('status', 'User added successfully!');
    }

    public function promote($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);
        $user->is_admin = 1;
        $user->save();

        return redirect()->route('admin.index')->with('status', 'User promoted to admin successfully!');
    }

}
