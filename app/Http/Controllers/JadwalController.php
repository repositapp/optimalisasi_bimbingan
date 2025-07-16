<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Judul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['judul.mahasiswa', 'pembimbing']);

        $search = request('search');
        if ($search) {
            $jadwals->when($search, function ($query, $search) {
                $query->where('topik_bimbingan', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%')

                    // Relasi ke mahasiswa
                    ->orWhereHas('judul.mahasiswa', function ($q) use ($search) {
                        $q->where('nama_mahasiswa', 'like', '%' . $search . '%');
                    })

                    // Relasi ke pembimbing
                    ->orWhereHas('pembimbing', function ($q) use ($search) {
                        $q->where('nama_dosen', 'like', '%' . $search . '%');
                    });
            })->latest();
        }

        $jadwals = $jadwals->paginate(10)->appends(['search' => $search]);

        return view('jadwal.index', compact('jadwals', 'search'));
    }

    public function create()
    {
        $juduls = Judul::with('mahasiswa')->get();

        return view('jadwal.create', compact('juduls'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_id' => 'required|exists:juduls,id',
            'pembimbing_id' => 'required|exists:dosens,id',
            'tanggal_bimbingan' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'topik_bimbingan' => 'nullable',
            'tempat' => 'nullable',
            'status' => 'required',
        ]);

        $validatedData['tanggal_bimbingan'] = Carbon::parse($request->tanggal_bimbingan)->format('Y-m-d');
        $validatedData['waktu_mulai'] = Carbon::createFromFormat('h:i A', $request->waktu_mulai)->format('H:i');
        $validatedData['waktu_selesai'] = Carbon::createFromFormat('h:i A', $request->waktu_selesai)->format('H:i');

        Jadwal::create($validatedData);

        return redirect()->route('jadwal.index')->with(['success' => 'Jadwal bimbingan berhasil disimpan!']);
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $juduls = Judul::with('mahasiswa')->get();
        $dosens = Dosen::all();

        return view('jadwal.edit', compact('jadwal', 'juduls', 'dosens'));
    }

    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $validatedData = $request->validate([
            'judul_id' => 'required|exists:juduls,id',
            'pembimbing_id' => 'required|exists:dosens,id',
            'tanggal_bimbingan' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'topik_bimbingan' => 'nullable',
            'tempat' => 'nullable',
            'status' => 'required',
        ]);

        $validatedData['tanggal_bimbingan'] = Carbon::parse($request->tanggal_bimbingan)->format('Y-m-d');
        $validatedData['waktu_mulai'] = Carbon::createFromFormat('h:i A', $request->waktu_mulai)->format('H:i');
        $validatedData['waktu_selesai'] = Carbon::createFromFormat('h:i A', $request->waktu_selesai)->format('H:i');

        $jadwal->update($validatedData);

        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function getPembimbing($judul_id)
    {
        $judul = Judul::with(['pembimbing1', 'pembimbing2'])->findOrFail($judul_id);

        $pembimbings = [];

        if ($judul->pembimbing1) {
            $pembimbings[] = [
                'id' => $judul->pembimbing1->id,
                'nama' => $judul->pembimbing1->nama_dosen
            ];
        }

        if ($judul->pembimbing2) {
            $pembimbings[] = [
                'id' => $judul->pembimbing2->id,
                'nama' => $judul->pembimbing2->nama_dosen
            ];
        }

        return response()->json($pembimbings);
    }
}
