<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        return view('home.produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.produk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:4098',
            'nama_produk' => 'required|min:5',  
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'barcode' => 'required',
        ]);

      

        $image =$request->file('gambar');
        $image->storeAs('products', $image->hashName(), 'public');

        

        Produk::create([
            'gambar' => $image->hashName(),
            'nama_produk'=> $request->nama_produk,
            'harga_jual' => $request->harga_jual,
            'stok'=> $request->stok,
            'barcode' => $request->barcode
        ]);
        return redirect('/produk')->with('success','Produk Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk  = Produk::find($id);
        return view('home.produk.edit', compact('produk'));
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
        $request->validate([
            'gambar'=> 'image|mimes:jpeg,jpg,png|max:4098',
            'nama_produk'=> 'required|min:5',
            'harga_jual'=> 'required|numeric',
            'stok'=> 'required|numeric',
            'barcode' => 'required',
         ]);

         $produk = Produk::find($id);

         if ($request->hasFile('gambar')) {

            $image = $request->file('gambar');
            $image->storeAs('products', $image->hashName(), 'public');

            Storage::delete('public/products/' .$produk->gambar);

            $produk->update([
                'gambar' => $image->hashName(),
                'nama_produk'=> $request->nama_produk,
                'harga_jual' => $request->harga_jual,
                'stok'=> $request->stok,
            ]);
    } else {

        $produk->update([
            'nama_produk'=> $request->nama_produk,
            'harga_jual'=> $request->harga_jual,
            'stok'=> $request->stok,
            'barcode' => $request->barcode
        ]);

    }

        return redirect('/produk')->with(['success' => 'Data Berhasil Di Ubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);

        Storage::delete('public/products/'.$produk->gambar);

        $produk->delete();

        return redirect('/produk')->with(['success'=> 'Data Berhasil Dihapus!']);
    }
}
