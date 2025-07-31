<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Dues_category;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $credentials['level'] = 'admin';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/administrator/dashboard'); 
        }

        return back()->with('error', 'Username atau password salah!');
    }
    public function dataWarga()
    {
        $warga = User::where('level', 'warga')->get();
        return view('admin.data-warga', compact('warga'));
    }


    public function createWarga()
    {
        return view('admin.create-warga');
    }

    public function storeWarga(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:3',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'warga',
        ]);

        return redirect()->route('admin.data-warga')->with('success', 'Data warga berhasil ditambahkan.');
    }
// Edit form
    public function editWarga($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.edit-warga', compact('user'));
    }

    // Update data
    public function updateWarga(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);
        return redirect()->route('admin.data-warga')->with('success', 'Data warga berhasil diupdate.');
    }

    // Delete data
    public function deleteWarga($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.data-warga')->with('success', 'Data warga berhasil dihapus.');
    }
    public function kategoriIuran()
    {
        $kategori = Dues_category::all();
        return view('admin.kategori-iuran', compact('kategori'));
    }
}
