<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $search = request('search');
        $query = Dosen::latest();
        if ($search) {
            $query->where('nama_dosen', 'like', '%' . $search . '%')
                ->orWhere('nidn', 'like', '%' . $search . '%')
                ->orWhere('pendidikan_terakhir', 'like', '%' . $search . '%')
                ->orWhere('bidang_ilmu', 'like', '%' . $search . '%');
        }
        $dosens = $query->paginate(10)->appends(['search' => $search]);

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama_dosen' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'alamat_dosen' => 'required',
            'telepon' => 'required',
            'pendidikan_terakhir' => 'required',
            'bidang_ilmu' => 'required',
        ]);

        $user = User::create([
            'name' => $request->nama_dosen,
            'username' => strtolower(str_replace(' ', '_', $request->nama_dosen)) . random_int(10, 99),
            'email' => $request->email,
            'password' => Hash::make('12345678'), // default password
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'pembimbing',
            'status' => true,
        ]);

        $validatedData['user_id'] = $user->id;

        Dosen::create($validatedData);
        return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validatedData = $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama_dosen' => 'required',
            'email' => 'required|email|unique:users,email,' . $dosen->user_id,
            'jenis_kelamin' => 'required',
            'alamat_dosen' => 'required',
            'telepon' => 'required',
            'pendidikan_terakhir' => 'required',
            'bidang_ilmu' => 'required',
        ]);

        $user = User::findOrFail($dosen->user_id);
        $user->update([
            'name' => $request->nama_dosen,
            'username' => strtolower(str_replace(' ', '_', $request->nama_dosen)) . random_int(10, 99),
            'email' => $request->email,
        ]);

        $dosen->update($validatedData);
        return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $akun = User::findOrFail($dosen->user_id);
        $dosen->delete();
        $akun->delete();
        return redirect()->route('dosen.index')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function dashboard()
    {
        return view('user.dosen.dashboard');
    }
}
