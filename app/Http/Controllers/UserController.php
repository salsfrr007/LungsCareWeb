<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Tambahkan ini jika perlu

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
            return redirect()->route('active.users')->with('success', 'User  deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('active.users')->with('error', 'Failed to delete user.');
        }
    }
    
}
