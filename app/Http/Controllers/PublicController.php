<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokterHewan;

class PublicController extends Controller
{
    public function index()
    {
        $dokters = DokterHewan::all(); // ambil semua dokter
        return view('public.home', compact('dokters'));
    }
}
