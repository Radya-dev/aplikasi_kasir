@extends('layouts.master')
@section('title','pelanggan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data pelanggan</h3>
                            <a class="btn btn-warning" href="/pelanggan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/pelanggan/{{ $pelanggan->id }}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama pelanggan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama"
                                        id=""
                                        value="{{ $pelanggan->nama }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="alamat"
                                        id=""
                                        value="{{ $pelanggan->alamat }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nomor Telepon</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="no_tlp"
                                        id=""
                                        value="{{ $pelanggan->no_tlp }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
