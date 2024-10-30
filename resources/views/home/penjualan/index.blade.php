@extends('layouts.master')
@section('title', 'penjualan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(session('success'))
                        <div class="alert alert-info">
                            {{ session ('success')}}
                        </div>
                        @endif
                        <h3>Halaman penjualan</h3>
                        <form action="/penjualan/simpan" method="post">
                        @csrf
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Buat Data Baru?')">Tambah</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kasir</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $penjualan)
                                    <tr>
                                        <td>{{ $loop-> iteration }}</td>
                                        <td>{{ $penjualan-> user ->name }}</td>
                                        <td>Rp. {{ number_format($penjualan->total) }}</td>
                                        <td>{{ $penjualan-> tanggal }}</td>
                                        <td>{{ $penjualan-> status }}</td>
                                        <td>@if ($penjualan->status == "belum selesai")
                                            <a class="btn btn-primary"
                                            href="/penjualan/transaksi/{{ $penjualan-> id }}">lengkapi Transaksi
                                        </a>
                                        @else ($penjualan->status == "selesai")
                                        <a class="btn btn-primary" href="/penjualan/struk/{{ $penjualan-> id }}">Cetak Struk</a>
                                        
                                        @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection