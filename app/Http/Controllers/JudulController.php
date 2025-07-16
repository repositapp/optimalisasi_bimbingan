<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JudulController extends Controller
{
    public function index()
    {
        $juduls = Judul::with(['mahasiswa', 'pembimbing1', 'pembimbing2']);

        $search = request('search');
        if (request('search')) {
            $juduls->when($search, function ($query, $search) {
                $query->where('judul', 'like', '%' . $search . '%')

                    // Relasi ke mahasiswa
                    ->orWhereHas('mahasiswa', function ($q) use ($search) {
                        $q->where('nama_mahasiswa', 'like', '%' . $search . '%');
                    })

                    // Relasi ke pembimbing1
                    ->orWhereHas('pembimbing1', function ($q) use ($search) {
                        $q->where('nama_dosen', 'like', '%' . $search . '%');
                    })

                    // Relasi ke pembimbing2
                    ->orWhereHas('pembimbing2', function ($q) use ($search) {
                        $q->where('nama_dosen', 'like', '%' . $search . '%');
                    });
            })
                ->latest();
        }

        $juduls = $juduls->paginate(10)->appends(['search' => $search]);

        return view('judul.index', compact('juduls', 'search'));
    }

    public function skPembimbing($id)
    {
        $skPembimbing = Judul::findOrFail($id);

        if (!$skPembimbing->sk_pembimbing || !Storage::exists($skPembimbing->sk_pembimbing)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::download($skPembimbing->sk_pembimbing);
    }

    public function skPenguji($id)
    {
        $skPenguji = Judul::findOrFail($id);

        if (!$skPenguji->sk_penguji || !Storage::exists($skPenguji->sk_penguji)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::download($skPenguji->sk_penguji);
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('judul.create', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'pembimbing1_id' => 'required|exists:dosens,id',
            'pembimbing2_id' => 'required|exists:dosens,id',
            'penguji1_id' => 'nullable|exists:dosens,id',
            'penguji2_id' => 'nullable|exists:dosens,id',
            'penguji3_id' => 'nullable|exists:dosens,id',
            'sk_pembimbing' => 'nullable|file|mimes:pdf|max:2048',
            'sk_penguji' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);

        if ($request->file('sk_pembimbing')) {
            $file = $request->file('sk_pembimbing');
            $fileName =  Str::slug($mahasiswa->nama_mahasiswa) . '-SK-Pembimbing' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('sk-images', $fileName);
            $validatedData['sk_pembimbing'] = 'sk-images/' . $fileName;
        }

        if ($request->file('sk_penguji')) {
            $file = $request->file('sk_penguji');
            $fileName =  Str::slug($mahasiswa->nama_mahasiswa) . '-SK-Penguji' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('sk-images', $fileName);
            $validatedData['sk_penguji'] = 'sk-images/' . $fileName;
        }

        Judul::create($validatedData);

        return redirect()->route('judul.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $judul = Judul::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('judul.edit', compact('judul', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, string $id)
    {
        $judul = Judul::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'pembimbing1_id' => 'required|exists:dosens,id',
            'pembimbing2_id' => 'required|exists:dosens,id',
            'penguji1_id' => 'nullable|exists:dosens,id',
            'penguji2_id' => 'nullable|exists:dosens,id',
            'penguji3_id' => 'nullable|exists:dosens,id',
            'sk_pembimbing' => 'nullable|file|mimes:pdf|max:2048',
            'sk_penguji' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($judul->mahasiswa_id);

        if ($request->file('sk_pembimbing')) {
            if ($judul->sk_pembimbing != null) {
                Storage::delete($judul->sk_pembimbing);
            }
            $file = $request->file('sk_pembimbing');
            $fileName =  Str::slug($mahasiswa->nama_mahasiswa) . '-SK-Pembimbing' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('sk-images', $fileName);
            $validatedData['sk_pembimbing'] = 'sk-images/' . $fileName;
        }

        if ($request->file('sk_penguji')) {
            if ($judul->sk_penguji != null) {
                Storage::delete($judul->sk_penguji);
            }
            $file = $request->file('sk_penguji');
            $fileName =  Str::slug($mahasiswa->nama_mahasiswa) . '-SK-Penguji' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('sk-images', $fileName);
            $validatedData['sk_penguji'] = 'sk-images/' . $fileName;
        }

        $judul->update($validatedData);

        return redirect()->route('judul.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id)
    {
        $judul = Judul::findOrFail($id);
        if ($judul->sk_pembimbing) {
            Storage::delete($judul->sk_pembimbing);
        }
        if ($judul->sk_penguji) {
            Storage::delete($judul->sk_penguji);
        }
        $judul->delete();

        return redirect()->route('judul.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
