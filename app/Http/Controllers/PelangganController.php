<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = pelanggan::all();
        return view('home.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);
        return redirect('/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = pelanggan::find($id);
        return view('home.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = pelanggan::find($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'alamat'=> $request->alamat,
            'no_tlp'=> $request->no_tlp,
        ]);
        return redirect('/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = pelanggan::find($id);
        $pelanggan->delete();
        return redirect('/pelanggan');
    }
}
