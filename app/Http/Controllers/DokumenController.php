<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokumenController extends Controller
{
    public function index()
    {
        $search = request('search');
        $dokumens = Dokumen::latest();
        if (request('search')) {
            $dokumens->where('nama_dokumen', 'like', '%' . $search . '%')
                ->orWhere('ekstensi', 'like', '%' . $search . '%')
                ->orWhere('ukuran', 'like', '%' . $search . '%')
                ->orWhere('download', 'like', '%' . $search . '%');
        }

        $dokumens = $dokumens->paginate(10)->appends(['search' => $search]);

        return view('master.dokumen.index', compact('dokumens', 'search'));
    }

    public function download($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if (!$dokumen->dokumen || !Storage::exists($dokumen->dokumen)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Tambahkan jumlah unduhan (+1) setiap kali file diunduh
        $dokumen->increment('download');

        return Storage::download($dokumen->dokumen, $dokumen->name);
    }

    public function create()
    {
        return view('master.dokumen.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required',
            'dokumen' => 'nullable|file|max:10240',
        ]);

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = Str::slug($validatedData['nama_dokumen']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('dokumen-file', $fileName);
            $validatedData['dokumen'] = 'dokumen-file/' . $fileName;
            $validatedData['ekstensi'] = $file->getClientOriginalExtension();
            $validatedData['ukuran'] = round($file->getSize() / 1024, 2);
        }

        Dokumen::create($validatedData);

        return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        return view('master.dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, string $id)
    {;
        $dokumen = Dokumen::findOrFail($id);

        $validatedData = $request->validate([
            'nama_dokumen' => 'required',
            'dokumen' => 'nullable|file|max:10240',
        ]);

        if ($request->file('dokumen')) {
            if ($dokumen->dokumen != null) {
                Storage::delete($dokumen->dokumen);
            }
            $file = $request->file('dokumen');
            $fileName = Str::slug($validatedData['nama_dokumen']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('dokumen-file', $fileName);
            $validatedData['dokumen'] = 'dokumen-file/' . $fileName;
            $validatedData['ekstensi'] = $file->getClientOriginalExtension();
            $validatedData['ukuran'] = round($file->getSize() / 1024, 2);
        }

        $dokumen->update($validatedData);

        return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        if ($dokumen->dokumen) {
            Storage::delete($dokumen->dokumen);
        }
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function show()
    {
        $search = request('search');
        $dokumens = Dokumen::latest();
        if (request('search')) {
            $dokumens->where('nama_dokumen', 'like', '%' . $search . '%')
                ->orWhere('ekstensi', 'like', '%' . $search . '%')
                ->orWhere('ukuran', 'like', '%' . $search . '%')
                ->orWhere('download', 'like', '%' . $search . '%');
        }

        $dokumens = $dokumens->paginate(10)->appends(['search' => $search]);

        return view('master.dokumen.show', compact('dokumens', 'search'));
    }
}
