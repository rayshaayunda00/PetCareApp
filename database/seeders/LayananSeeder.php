<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run()
    {
        Layanan::create([
            'judul' => 'Periksa Kesehatan',
            'deskripsi' => 'Pemeriksaan menyeluruh untuk kucing, anjing, dan hewan peliharaan lainnya.',
            'gambar' => 'layanan/periksa.jpg'
        ]);

        Layanan::create([
            'judul' => 'Vaksinasi',
            'deskripsi' => 'Layanan vaksinasi lengkap untuk mencegah berbagai penyakit hewan.',
            'gambar' => 'layanan/vaksinasi.jpg'
        ]);

        Layanan::create([
            'judul' => 'Penitipan Hewan',
            'deskripsi' => 'Layanan penitipan hewan peliharaan selama Anda bepergian.',
            'gambar' => 'layanan/penitipan.jpg'
        ]);
    }
}
