@extends('layouts.main')

@section('component')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="toast fade show bg-success text-white border-0 rounded p-2 mt-3 mb-2" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <svg class="bd-placeholder-img rounded mr-2" width="20" height="20"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                        role="img">
                        <rect width="100%" height="100%" fill="#fff"></rect>
                    </svg>
                    <strong class="mr-auto text-white">{{ session('success') }}</strong>
                    <small>now</small>
                    <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">
                </div>
            </div>
            <meta http-equiv="refresh" content="1;url=/barang">
        @elseif (session()->has('error'))
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
            {{-- <meta http-equiv="refresh" content="1;url=/barang"> --}}
        @endif
        <nav aria-label="breadcrumb" class="bg-transparent">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="ri-home-4-line mr-1 float-left"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="/"><i class="line mr-1 float-left"></i>Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Daftar Nama Barang</h4>
                        <p class="mb-0">Barang Inventaris Sekolah <br> Untuk melihat datar barang klik detail</p>
                    </div>
                    <a href="barang/create" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Tambah Nama
                        Barang</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive-lg rounded mb-3">
                    <table class="table data-tables table-striped shadow rounded text-center">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th class="align-middle" rowspan="2">Barang</th>
                                <th class="align-middle" rowspan="2">Merk</th>
                                <th class="align-middle" rowspan="2">Tipe Barang</th>
                                <th class="align-middle" rowspan="2">Jumlah Barang</th>
                                <th colspan="3">Kondisi</th>
                                <th class="align-middle" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="table-info ">Baik</th>
                                <th class="table-warning ">Kurang Baik</th>
                                <th class="table-secondary ">Rusak</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($nama as $jeniss)
                                <tr>
                                    <td>
                                        <div>
                                            {{ $jeniss->nama_barang }}
                                            <p class="mb-0"><small>{{ $jeniss->kode_barang }}</small></p>
                                        </div>
                                    </td>
                                    <td>{{ $jeniss->merk }}</td>
                                    <td>{{ $jeniss->tipe->tipe_barang }}</td>
                                    <td>{{ $jeniss->jumlah_barang }}</td>
                                    <td>{{ $jeniss->baik }}</td>
                                    <td>{{ $jeniss->kurang_baik }}</td>
                                    <td>{{ $jeniss->rusak }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a class="mr-2 p-2" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Detail" href="barang/{{ $jeniss->kode_barang }}">
                                                <button class="btn btn-primary py-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a class="mr-2" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit" href="barang/{{ $jeniss->kode_barang }}/edit">
                                                <button class="btn btn-success py-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <form action="barang/{{ $jeniss->kode_barang }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn py-2 ml-2" data-toggle="modal"
                                                    data-target="#exampleModal" style="background-color: #ff4d4d">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="#FFFFFF" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Yakin??
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-secondary">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
