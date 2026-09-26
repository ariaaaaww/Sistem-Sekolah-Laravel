<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        // Validasi Request
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial pengguna menggunakan metode Auth::attempt(). Jika kredensial valid, maka pengguna akan diarahkan ke halaman dashboard. Jika tidak, maka akan dikembalikan ke halaman login dengan pesan error.
        if (Auth::attempt($credentials)) {
            // Fungsi $request->session() digunakan untuk mengakses data sesi pengguna yang tersimpan di server, sedangkan regenerate() berfungsi memperbarui ID sesi tersebut demi mencegah serangan peretasan session fixation.
            $request->session()->regenerate();
            return redirect()->route('student.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // Validasi Request
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Mengirimkan data ke database menggunakan model User. Data yang dikirimkan adalah nama, email, password (yang di-hash menggunakan bcrypt), dan role (yang di-set sebagai 'student').
        User::create([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'password' => bcrypt($validatedRequest['password']),
            'role' => 'student', // Set default role as 'student'
        ]);

        // Handle success response
        return redirect()->route('login-view')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus invalidate dan meregenerasi token sesi untuk mencegah serangan CSRF (Cross-Site Request Forgery) setelah pengguna logout.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-view');
    }
}
