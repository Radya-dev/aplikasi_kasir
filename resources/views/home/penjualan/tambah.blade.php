@extends('layouts.master');
@section('title', 'penjualan');
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Halaman Tambah Data penjualan</h3>
                                <a href="/penjualan" class="btn btn-warning">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="/penjualan/scan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input 
                                    type="hidden"
                                    name="nobon"
                                    value="{{ $penjualan->id }}"
                                    id=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        onblur="this.focus()"
                                        class="form-control"
                                        name="id_produk"
                                        placeholder="kode barang"
                                        autofocus
                                        id="id_produk"
                                    />
                                    @if (session("error"))
                                    <p style="color: red;">Barang Tidak Di Temukan</p>
                                    
                                    @endif
                                    <div class="col-1">
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="harga_jual"
                                        min="1"
                                        id="qty"
                                        value="1"
                                        required
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                                <div class="col-1">
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Check</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">Nomor Bon</td>
                                <td scope="col">Nama Barang</td>
                                <td scope="col">Harga</td>
                                <td scope="col">Qty</td>
                                <td scope="col">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($detail_penjualan as $detail_penjualan )
                            @php
                            
                            $total += $detail_penjualan->produk->harga * ($produkCounts[$detail_penjualan->id_produk] ?? 0);

                            @endphp

                            <tr class="">
                                <!-- <td>{{ $detail_penjualan->nobon }}</td> -->
                                <td>{{ $detail_penjualan->produk->nama }}</td>
                                <td>{{ $detail_penjualan->produk->harga }}</td>
                                <td>{{ $produkCounts [$detail_penjualan->id_produk] ?? 0 }}</td>
                                <td>{{ $detail_penjualan->produk->harga * ($produkCounts[$detail_penjualan->id_produk] ?? 0) }}</td>
                                <td>
                                    <a href="/detai_penjualan/delete/{{ $detail_penjualan->id_produk }}/{{ $detail_penjualan->nobon }}">
                                        <div class="btn btn-danger"><i class="fas fa-trash"></i></div>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <form action="/penjualan/update/{{ $penjualan->id }}" method="post">
            <input type="hidden" value="{{ $total }}" name="ttl">
            @csrf

            Total
            <h1 style="color: black">
                Rp. {{ number_format($total) }}
                <button type="submit" class="btn btn-primary">Check out</button>
            </h1>
        </form>
    </footer>
@endsection

