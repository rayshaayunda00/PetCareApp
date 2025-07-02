<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vet;
use App\Models\Article; // Tambahkan ini

class PublicController extends Controller
{
    public function index()
    {
        $vets = Vet::all();
        $articles = Article::latest()->take(3)->get(); // Ambil 3 artikel terbaru
        return view('public.home', compact('vets', 'articles'));
    }
}
