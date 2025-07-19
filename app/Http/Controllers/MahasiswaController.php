<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $search = request('search');
        $query = Mahasiswa::latest();
        if ($search) {
            $query->where('nama_mahasiswa', 'like', '%' . $search . '%')
                ->orWhere('npm', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%');
        }
        $mahasiswa = $query->paginate(10)->appends(['search' => $search]);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'alamat_mahasiswa' => 'required',
            'telepon' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
        ]);

        $user = User::create([
            'name' => $request->nama_mahasiswa,
            'username' => strtolower(str_replace(' ', '_', $request->nama_mahasiswa)) . random_int(10, 99),
            'email' => $request->email,
            'password' => Hash::make('12345678'), // default password
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'mahasiswa',
            'status' => true,
        ]);

        $validatedData['user_id'] = $user->id;

        Mahasiswa::create($validatedData);
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validatedData = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user_id,
            'jenis_kelamin' => 'required',
            'alamat_mahasiswa' => 'required',
            'telepon' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
        ]);

        $user = User::findOrFail($mahasiswa->user_id);
        $user->update([
            'name' => $request->nama_mahasiswa,
            'username' => strtolower(str_replace(' ', '_', $request->nama_mahasiswa)) . random_int(10, 99),
            'email' => $request->email,
        ]);

        $mahasiswa->update($validatedData);
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus judul terkait
        $mahasiswa->juduls()->delete();

        // Hapus mahasiswa (karena masih terhubung dengan user)
        $mahasiswa->delete();

        // Setelah mahasiswa terhapus, baru hapus akun user
        $akun = User::findOrFail($mahasiswa->user_id);
        $akun->delete();

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function dashboard()
    {
        // $search = request('search');
        // $query = Mahasiswa::latest();
        // if ($search) {
        //     $query->where('nama_mahasiswa', 'like', '%' . $search . '%')
        //         ->orWhere('npm', 'like', '%' . $search . '%')
        //         ->orWhere('kelas', 'like', '%' . $search . '%')
        //         ->orWhere('angkatan', 'like', '%' . $search . '%');
        // }
        // $mahasiswa = $query->paginate(10)->appends(['search' => $search]);

        // return view('mahasiswa.index', compact('mahasiswa'));
        return view('user.mahasiswa.dashboard');
    }
}
