<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->take(3)
            ->where('status', 1)
            ->get();
        $artikels = Artikel::latest()->take(4)
            ->where('status', 1)
            ->get();
        $pengumumans = Pengumuman::latest()->take(3)
            ->where('status', 1)
            ->get();

        return view('beranda.index', compact('kegiatans', 'artikels', 'pengumumans'));
    }
}
