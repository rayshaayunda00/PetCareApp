<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RayshaService;

use App\Models\Layanan;

class PublicLayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('public.layanan', compact('layanans'));
    }

    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('public.layanan_detail', compact('layanan'));
    }
}
