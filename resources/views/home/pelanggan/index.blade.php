@extends('layouts.master');
@section('title','penjualan');
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Data penjualan</h3>
                            <a class="btn btn-primary" href="/penjualan/tambah">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama penjualan</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor telpon</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualan as $penjualan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penjualan->nama }}</td>
                                                <td>{{ $penjualan->alamat }}</td>
                                                <td>{{ $penjualan->no_tlp }}</td>
                                                <td><a class="btn btn-warning" href="/penjualan/{{ $penjualan->id }}/show">Edit</a>
                                                    <a class="btn btn-danger" href="/penjualan/{{ $penjualan->id }}/delete"
                                                        onclick="return confirm('Yakin Mau Di Hapus?')">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
