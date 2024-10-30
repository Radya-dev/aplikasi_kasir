@extends('layouts.master')
@section('title', 'produk')
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
                        <h3>Halaman Produk</h3>
                        <a class="btn btn-primary" href="/produk/tambah">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/products/'.$produk->gambar) }}"
                                            class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>Rp. {{ number_format($produk->harga_jual) }}</td>
                                        <td>{{ $produk->stok }}</td>
                                        <td><a class="btn btn-warning" href="/produk/{{ $produk->id }}/show">Edit</a>
                                            <a class="btn btn-danger"href="/produk/{{ $produk->id }}/delete"
                                                onclick="return confirm('yakin mau di hapus?')">Delete</a></td>
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