<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vet;

class PublicController extends Controller
{
public function index()
{
    $vets = Vet::all(); // Ambil semua dokter dari database
    return view('public.home', compact('vets'));
}
}
