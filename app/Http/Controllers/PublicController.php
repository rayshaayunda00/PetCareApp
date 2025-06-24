<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokterHewan;

class PublicController extends Controller
{
    public function index()
    {
        $dokters = DokterHewan::all(); // Ambil semua dokter dari DB
        return view('public.home', compact('dokters')); // dikirim ke public/home.blade.php
    }
}
