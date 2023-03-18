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
                        <form action="/barang" method="post" id="formAddNama">
                            @csrf
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama Barang : </span>
                                </div>
                                <input type="text" name="nama_barang"
                                    class="form-control @error('nama_barang') is-invalid @enderror"
                                    placeholder="Masukan Nama Barang" value="{{ old('nama_barang') }}">
                                @error('nama_barang')
                                    <div class="invalid-feedback">Bagian ini harus diisi</div>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Merk / Brand : </span>
                                </div>
                                <input type="text" name="merk"
                                    class="form-control @error('merk') is-invalid @enderror"
                                    placeholder="Masukan Merk/brand Barang" value="{{ old('merk') }}">
                                @error('merk')
                                    <div class="invalid-feedback">Bagian ini harus diisi</div>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tipe Barang :</span>
                                </div>
                                <select name="tipe" id=""
                                    class="custom-select @error('tipe') is-invalid @enderror">
                                    <option value="" {{ old('tipe') !== null ? '' : 'selected' }} disabled hidden>
                                        Silahkan pilih tipe barang...</option>
                                    @foreach ($tipe as $tip)
                                        <option value="{{ $tip->id }}"
                                            {{ old('tipe') === $tip->id ? 'selected' : '' }}>
                                            {{ $tip->tipe_barang }}</option>
                                    @endforeach
                                </select>
                                @error('tipe')
                                    <div class="invalid-feedback">Bagian ini harus dipilih</div>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Spesifikasi : </span>
                                </div>
                                <textarea name="spesifikasi" form="formAddNama" cols="30" rows="10"
                                    class="form-control @error('spesifikasi') is-invalid @enderror" placeholder="Masukan Spesifikasi Barang">{{ old('spesifikasi') }}</textarea>
                                @error('spesifikasi')
                                    <div class="invalid-feedback">Bagian ini harus diisi</div>
                                @enderror
                            </div>
                            {{-- <!-- Button trigger modal --> --}}
                            <button type="button" class="btn btn-primary btn-lg float-right ml-2" data-toggle="modal"
                                data-target="#exampleModal">
                                Simpan
                            </button>
                            {{-- modal --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data akan disimpan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apa anda yakin dengan data yang ada??
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-warning btn-lg float-right">Reset</button>
                        </form>
                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal"
                            data-target="#exampleModal2">
                            Cancel
                        </button>
                        {{-- modal --}}
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Batal mengisi form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apa anda yakin??
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Tidak</button>
                                        <a href="/barang"> <button type="button" class="btn btn-danger">Ya</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
