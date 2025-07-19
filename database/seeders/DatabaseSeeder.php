<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aplikasi;
use App\Models\Artikel;
use App\Models\Dokumen;
use App\Models\Dosen;
use App\Models\Halaman;
use App\Models\Judul;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\Menu;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@themesbrand.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'admin',
            'status' => '1',
            'created_at' => now(),
        ]);
        User::updateOrCreate([
            'name' => 'Dosen Pembimbinng',
            'username' => 'pembimbing',
            'email' => 'pembimbing@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'pembimbing',
            'status' => '1',
            'created_at' => now(),
        ]);
        User::updateOrCreate([
            'name' => 'Saskian',
            'username' => 'mahasiswa',
            'email' => 'saskian@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/avatar2.png',
            'role' => 'mahasiswa',
            'status' => '1',
            'created_at' => now(),
        ]);
        User::factory(42)->create();

        Dosen::updateOrCreate([
            'user_id' => 2,
            'nidn' => '12345678',
            'nama_dosen' => 'Dosen Pembimbinng',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_dosen' => 'Jl. Sultan Hasanuddin',
            'email' => 'pembimbing@gmail.com',
            'telepon' => '082211242252',
            'pendidikan_terakhir' => 'Strata-2',
            'bidang_ilmu' => 'Teknik Informatika',
        ]);

        Mahasiswa::updateOrCreate([
            'user_id' => 3,
            'npm' => '12345678',
            'nama_mahasiswa' => 'Saskian',
            'jenis_kelamin' => 'Perempuan',
            'alamat_mahasiswa' => 'Bungi',
            'email' => 'saskian@gmail.com',
            'telepon' => '082211242252',
            'kelas' => 'C',
            'angkatan' => 2021,
        ]);

        Dosen::factory(25)->create();
        Mahasiswa::factory(15)->create();
        Judul::factory(15)->create();

        Aplikasi::updateOrCreate([
            'nama_lembaga' => 'Teknik Informatika',
            'telepon' => '04022821327',
            'fax' => '04022821327',
            'email' => 'teknikinformatika@gmail.com',
            'alamat' => 'Jl. Sultan Datanu Ikhsanuddin, Lipu, Kec. Betoambari, Kota Bau-Bau, Sulawesi Tenggara 93724',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.523810873507!2d122.5722464!3d-5.488928100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da47694c3c936c3%3A0x7b50a493452ef15!2sUniversitas%20Dayanu%20Ikhsanuddin%20-%20Kampus%201!5e0!3m2!1sid!2sid!4v1752581696665!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'nama_ketua' => 'Ir. Ery Muchyar Hasiri, S. Kom., M.T.',
            'sidebar_lg' => 'INFORMATIKA',
            'sidebar_mini' => 'TI',
            'title_header' => 'Aplikasi Optimalisasi Bimbingan Skripsi',
            'logo' => 'aplikasi-images/baznas.png',
        ]);
    }
}
