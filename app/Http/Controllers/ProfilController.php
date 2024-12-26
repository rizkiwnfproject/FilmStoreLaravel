<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }
    public function edit()
    {
        $profile = Auth::user()->profil;
        // dd($profile);
        return view('partial.profile.editProfil', compact('profile'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'age' => 'required|integer',
            'bio' => 'required|string|max:255',
        ]);
        // Ambil user yang sedang login
        $user = Auth::user();
        // Cek apakah profil ada, jika tidak buat profil baru
        $profile = $user->profil ?? $user->profil()->create();

        // Update data profil
        $profile->age = $request->age;  // Ganti dengan kolom yang sesuai
        $profile->bio = $request->bio; // Ganti dengan kolom yang sesuai

        // Simpan perubahan
        $profile->save();
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
