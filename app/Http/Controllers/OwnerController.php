<?php

// app/Http/Controllers/OwnerController.php
namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owner.index', compact('owners'));
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);

        Owner::create($request->all());
        return redirect()->route('owners.index')->with('success','Data pemilik berhasil ditambahkan.');
    }

    public function edit(Owner $owner)
    {
        return view('owner.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
           'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
           
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')->with('success','Data pemilik berhasil diupdate.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success','Data pemilik berhasil dihapus.');
    }
}
