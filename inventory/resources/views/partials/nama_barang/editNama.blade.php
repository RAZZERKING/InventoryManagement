@extends('layouts.main')

@section('component')
    <div class="container-fluid">
        @if (session()->has('error'))
            <div class="toast fade show bg-warning text-white border-0 rounded p-2 mt-3 mb-2" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-warning text-white">
                    <svg class="bd-placeholder-img rounded mr-2" width="20" height="20"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                        role="img">
                        <rect width="100%" height="100%" fill="#fff"></rect>
                    </svg>
                    <strong class="mr-auto text-white">{{ session('error') }}</strong>
                    <small>now</small>
                    <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header f-flex justify-content-between">
                        <div class="header-title">
                            <h3 class="card-title">Form Input Nama Barang</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/barang/{{ $nama->kode_barang }}" method="post" id="formAddNama">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama Barang : </span>
                                </div>
                                <input type="text" name="nama_barang" class="form-control"
                                    placeholder="Masukan Nama Barang" value="{{ old('nama_barang', $nama->nama_barang) }}">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Merk / Brand : </span>
                                </div>
                                <input type="text" name="merk" class="form-control" placeholder="Masukan Nama Barang"
                                    value="{{ old('merk', $nama->merk) }}">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tipe Barang :</span>
                                </div>
                                <select name="tipe_id" id="" class="custom-select">
                                    <option value="" {{ old('tipe_id', $nama->tipe_id) !== null ? '' : 'selected' }}
                                        disabled hidden>
                                        Silahkan pilih tipe barang...</option>
                                    @foreach ($tipe as $tip)
                                        <option value="{{ $tip->id }}"
                                            {{ $nama->tipe_id === $tip->id ? 'selected' : '' }}>
                                            {{ $tip->tipe_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Spesifikasi : </span>
                                </div>
                                <textarea name="spesifikasi" form="formAddNama" cols="30" rows="10" class="form-control"
                                    placeholder="Masukan Spesifikasi Barang">{{ old('spesifikasi', $nama->spesifikasi) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-right ml-2">Update</button>
                            <button type="reset" class="btn btn-warning btn-lg float-right">Reset</button>
                        </form>
                        <a href="/barang"><button class="btn btn-danger btn-lg"
                                onclick="confirm('yakin??')">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
