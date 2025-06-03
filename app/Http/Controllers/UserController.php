<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Tambahkan ini jika perlu
use Illuminate\Support\Facades\Auth; // Add this
use Illuminate\Validation\Rule; // Add this for unique rule

class UserController extends Controller // Mewarisi dari Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua pengguna
        return view('user', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Tambahkan penanganan kesalahan jika perlu
        try {
            $user->delete();
            return redirect()->route('active.users')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('active.users')->with('error', 'Failed to delete user.');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
