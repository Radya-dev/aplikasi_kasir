<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Detail_Penjualan;
use App\Models\Penjualan;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barcode = $request->input('id_produk');
        $scan = Produk::where('barcode', $barcode)->first();

        // if($scan) {

            $qty = $request->input('qty');

            for ($i = 0; $i < $qty; $i++){

                Detail_Penjualan::create([
                    'nobon' => $request->nobon,
                    'id_produk' => $scan->id,
                    'harga' => $scan->harga,
                    'jumlahproduk' => $qty,
                    'total'=> $qty,
                    

                ]);
            }
            return redirect()->back();
        // } else {
            // return redirect()->back()->with('error', 'produk tidak ditenukan');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = Penjualan::find($id);
        return view('update', compact('penjualan'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
