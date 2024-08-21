<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nik' => 'required|string|max:255|unique:users',
            'wa' => 'required|string|max:255',
            'kota_asal' => 'required|string|max:255',
            'profesi' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'institusi' => $request->institusi,
            'email' => $request->email,
            'nik' => $request->nik,
            'wa' => $request->wa,
            'kota_asal' => $request->kota_asal,
            'profesi' => $request->profesi,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    /**
     * Display the specified user.
     */
    public function show(Request $request)
    {
        $nik = $request->nik;
        $user = User::where('nik',$nik)->get();
        return response()->json($user, 200);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nik' => 'required|string|max:255|unique:users,nik,' . $user->id,
            'wa' => 'required|string|max:255',
            'kota_asal' => 'required|string|max:255',
            'profesi' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'nama' => $request->nama,
            'institusi' => $request->institusi,
            'email' => $request->email,
            'nik' => $request->nik,
            'wa' => $request->wa,
            'kota_asal' => $request->kota_asal,
            'profesi' => $request->profesi,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}