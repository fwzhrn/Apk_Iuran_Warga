<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Dues_member;
use App\Models\Dues_category;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Username atau password salah!');
    }
    
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'warga',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    
    public function profile()
    {
        $user = User::with(['duesMembers.duesCategory', 'payments'])->find(Auth::id());
        return view('profile', ['user' => $user]);
    }
    
    public function editProfile()
    {
        $categories = Dues_category::active()->get(); // Ambil kategori aktif
        return view('profile-edit', ['user' => Auth::user(), 'categories' => $categories]);
    }
    
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'dues_category_id' => 'required|exists:dues_categories,id', // Validasi kategori
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();

        // Simpan pilihan kategori
        $duesMember = Dues_member::updateOrCreate(
            ['user_id' => $user->id],
            ['dues_category_id' => $request->dues_category_id, 'periode_pembayaran' => 'bulan']
        );

        // Buat 30 tagihan otomatis ketika kategori dipilih
        $category = $duesMember->duesCategory;
        $currentDate = now();
        
        for ($i = 0; $i < 30; $i++) {
            $periodDate = $currentDate->copy()->subMonths($i);
            \App\Models\Payment::create([
                'user_id' => $user->id,
                'period' => $periodDate->format('Y-m'), // Periode bulan dan tahun
                'nominal' => $category->nominal,
                'petugas' => 'System', // Default petugas
                'created_at' => $periodDate,
                'updated_at' => $periodDate,
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
