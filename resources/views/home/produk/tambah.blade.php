@extends('layouts.master');
@section('title', 'produk');
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Halaman Tambah Data produk</h3>
                                <a href="/produk" class="btn btn-warning">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="/produk/simpan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Gambar</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="gambar"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama produk</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama_produk"
                                        id=""
                                        value="{{ old('nama_produk') }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Harga Jual</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="harga_jual"
                                        id=""
                                        value="{{ old('harga_jual') }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('harga_jual')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Stok</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="stok"
                                            id=""
                                            value="{{ old('stok') }}"
                                            aria-describedby="helpId"
                                            placeholder=""
                                        />
                                        @error('stok')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Barcode</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="barcode"
                                            id=""
                                            value="{{ old('barcode') }}"
                                            aria-describedby="helpId"
                                            placeholder=""
                                        />
                                        @error('barcode')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

