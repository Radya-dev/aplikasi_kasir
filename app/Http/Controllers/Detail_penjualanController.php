<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Detail_penjualan;
use App\Models\Penjualan;

class Detail_penjualanController extends Controller
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

                Detail_penjualan::create([
                    'nobon' => $request->nobon,
                    'id_produk' => $scan->id,
                    'harga' => $scan->harga,
                    'total'
                ]);
            // }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
