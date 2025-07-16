<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with(['author', 'kategori']);

        $search = request('search');
        if (request('search')) {
            $kegiatans->when($search, function ($query, $search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('kutipan', 'like', '%' . $search . '%')

                    // Relasi ke author
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })

                    // Relasi ke kategori
                    ->orWhereHas('kategori', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            })
                ->latest();
        }

        $kegiatans = $kegiatans->paginate(10)->appends(['search' => $search]);

        return view('kegiatan.index', compact('kegiatans', 'search'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('kegiatan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|max:255',
            'body' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $fileName = Str::slug($validatedData['judul']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('kegiatan-images', $fileName);
            $validatedData['gambar'] = 'kegiatan-images/' . $fileName;
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($validatedData['judul']);

        Kegiatan::create($validatedData);

        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kategoris = Kategori::all();

        return view('kegiatan.edit', compact('kegiatan', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|max:255',
            'body' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        if ($request->file('gambar')) {
            if ($kegiatan->gambar != null) {
                Storage::delete($kegiatan->gambar);
            }
            $file = $request->file('gambar');
            $fileName = Str::slug($validatedData['judul']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('kegiatan-images', $fileName);
            $validatedData['gambar'] = 'kegiatan-images/' . $fileName;
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($validatedData['judul']);

        $kegiatan->update($validatedData);

        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->gambar) {
            Storage::delete($kegiatan->gambar);
        }
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function show($slug)
    {
        $kegiatan = Kegiatan::with('kategori', 'author')->where('slug', $slug)->firstOrFail();

        // Tambahkan +1 setiap kali dibuka
        if (!session()->has('viewed_kegiatan_' . $kegiatan->id)) {
            $kegiatan->increment('views');
            session(['viewed_kegiatan_' . $kegiatan->id => true]);
        }

        return view('kegiatan.show', compact('kegiatan'));
    }
}
