<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\produk;
use App\Models\detail_penjualan;
use App\Models\penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::orderBy('id', 'desc')->get();
        return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penjualan = Penjualan::latest()->first();
    
        if (!$penjualan) {
            // Jika tidak ada penjualan, bisa redirect atau memberi pesan
            return redirect()->back()->with('error', 'Tidak ada penjualan ditemukan.');
        }
    
        $detail_penjualan = Detail_Penjualan::where('nobon', $penjualan->id)->get();

    return view('nama_view', compact('penjualan', 'detail_penjualan', 'produkCounts'));
    }

    public function transaksi($id)
    {
        $penjualan = Penjualan::find($id);
    
    if (!$penjualan) {
        return redirect()->back()->with('error', 'Penjualan tidak ditemukan.');
    }

    $detail_penjualan = Detail_Penjualan::where('nobon', $id)
        ->select('id_produk', 'nobon', 'harga', DB::raw('count(*) as total'))
        ->groupBy('id_produk', 'nobon', 'harga')
        ->get();

    $produkCounts = $detail_penjualan->pluck('total', 'id_produk');

    return view('home.penjualan.tambah', compact('detail_penjualan', 'produkCounts', 'penjualan'));
    }
    public function store(Request $request)
    {
        penjualan::create([
            'id_user' => Auth::user()->id,
            'id_pelanggan' => 1,
            'tanggal' => now(),
            'status' => 'belum selesai',
            'total' => 0,
        ]);
        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = penjualan::find($id);
        return view('home.penjualan.edit', compact('penjualan'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penjualan = Penjualan::with(['produk'])
        ->where($id);
        $produk = Produk::all();
        $penjualan = Penjualan::find($id);
        return view('home.penjualan.struk', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penjualan = penjualan::find($id);

        $penjualan->update([
            'total' => $request->ttl,
            'status' => 'selesai',
        ]);
        return redirect('/penjualan')->with('succes', 'Berhasil');
    }

    public function cetak($id)
    {
        $penjualan = Penjualan::with(['produk'])
        ->where($id);
        $produk = produk::all($id);
        $penjualan = penjualan::find($id);
        return view('home.penjualan.struk', compact('penjualan'));
    }


    public function destroy(string $id)
    {
        
    }
}
