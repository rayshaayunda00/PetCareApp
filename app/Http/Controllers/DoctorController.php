<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
    public function index()
    {
        $vets = Vet::all(); // Ambil semua data dari tabel raysha_vets
        return view('admin.dokter.index', compact('vets'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'specialization' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('vets', 'public');
        $validated['image'] = 'storage/' . $path; // disimpan untuk ditampilkan di view
    }

    Vet::create($validated);

    return redirect()->route('doctors.index')->with('success', 'Dokter berhasil ditambahkan.');
}



    public function edit($id)
    {
        $vet = Vet::findOrFail($id);
        return view('admin.dokter.edit', compact('vet'));
    }

   public function update(Request $request, $id)
{
    $vet = Vet::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'specialization' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Hapus file lama jika ada
        if ($vet->image && file_exists(public_path($vet->image))) {
            unlink(public_path($vet->image));
        }

        $path = $request->file('image')->store('vets', 'public');
        $validated['image'] = 'storage/' . $path;
    }

    $vet->update($validated);

    return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil diperbarui.');
}



    public function destroy($id)
    {
        $vet = Vet::findOrFail($id);

        // Hapus gambar jika ada
        if ($vet->image && file_exists(public_path($vet->image))) {
            unlink(public_path($vet->image));
        }

        $vet->delete();

        return redirect()->route('doctors.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
