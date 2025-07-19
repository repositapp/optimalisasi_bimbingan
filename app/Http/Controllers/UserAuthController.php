<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserAuthController extends Controller
{
    public function index(): View
    {
        return view('auth.userlogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $user = Auth::guard('user')->user();

            if (!$user) {
                return back()->with('error', 'Gagal login, akun tidak ditemukan.');
            }

            // Jika role admin, logout
            if ($user->role === 'admin') {
                Auth::guard('user')->logout();
                return back()->with('error', 'Akun ini bukan user.');
            }

            $request->session()->regenerate();

            // Jika mahasiswa
            if ($user->role === 'mahasiswa') {
                $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

                if (!$mahasiswa) {
                    Auth::guard('user')->logout();
                    return back()->with('error', 'Data mahasiswa tidak ditemukan.');
                }

                session([
                    'mahasiswa_id' => $mahasiswa->id,
                    'npm' => $mahasiswa->npm,
                    'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
                    'jenis_kelamin' => $mahasiswa->jenis_kelamin,
                    'alamat_mahasiswa' => $mahasiswa->alamat_mahasiswa,
                    'email' => $mahasiswa->email,
                    'telepon' => $mahasiswa->telepon,
                    'kelas' => $mahasiswa->kelas,
                    'angkatan' => $mahasiswa->angkatan,
                ]);

                return redirect('mahasiswa/dashboard');
            }

            // Jika dosen
            if ($user->role === 'dosen') {
                $dosen = Dosen::where('user_id', $user->id)->first();

                if (!$dosen) {
                    Auth::guard('user')->logout();
                    return back()->with('error', 'Data dosen tidak ditemukan.');
                }

                session([
                    'dosen_id' => $dosen->id,
                    'nidn' => $dosen->nidn,
                    'nama_dosen' => $dosen->nama_dosen,
                    'jenis_kelamin' => $dosen->jenis_kelamin,
                    'alamat_dosen' => $dosen->alamat_dosen,
                    'email' => $dosen->email,
                    'telepon' => $dosen->telepon,
                    'pendidikan_terakhir' => $dosen->pendidikan_terakhir,
                    'bidang_ilmu' => $dosen->bidang_ilmu,
                ]);
                dd($dosen);
                return redirect('dosen/dashboard');
            }

            // Jika role tidak dikenali
            Auth::guard('user')->logout();
            return back()->with('error', 'Akses ditolak: role tidak dikenali.');
        }

        return back()->with('loginError', 'Gagal! Kombinasi username dan kata sandi tidak sesuai.');
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
}
