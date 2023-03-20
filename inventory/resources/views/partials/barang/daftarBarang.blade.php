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
            <meta http-equiv="refresh" content="1;url=/barang">
        @endif

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="ri-home-4-line mr-1 float-left"></i>Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/"><i class="line mr-1 float-left"></i>Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/barang"><i class="line mr-1 float-left"></i>Daftar Nama Barang</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
            </ol>
        </nav>
        <div class="row">
            <div class="card shadow p-2 pt-4 col-lg-12">
                <h1 class="card-title ml-4">
                    Daftar Barang @isset($nama)
                        {{ $nama->nama_barang }}
                    @endisset
                </h1>
                <hr>
                <div class="card-body">
                    @if (request('page') <= 1)
                        @isset($nama)
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">
                                    <div class="row no-gutters">
                                        <div class="col-md-6 col-lg-3">
                                            <img src="../assets/images/page-img/08.jpg" class="card-img" alt="#">
                                        </div>
                                        <div class="col-md-6 col-lg-8">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <h1>{{ $nama->nama_barang }}</h1>
                                                </h4>
                                                <p class="h4">Spesifikasi</p>
                                                <p class="card-text">{{ $nama->spesifikasi }}</p>
                                                <p class="card-text"><small class="text-muted">ditambahkan sejak
                                                        {{ $nama->created_at }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    @endif
                    {{ $barang->links('pagination::bootstrap-5') }}
                    @unless(isset($nama))
                        <form action="/daftar">
                            <div class="d-flex align-items-end">
                                <div class="input-group mb-4">
                                    <input type="search" class="form-control input-sm" placeholder="Search..."
                                        aria-label="Recipient's username" name="search" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endunless
                    <div class="table-responsive-lg rounded mb-3">
                        <table id="datatable" class="table table-striped text-center">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>No Barang</th>
                                    @unless(isset($nama))
                                        <th>Nama Barang</th>
                                    @endunless
                                    <th>Tanggal Masuk</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi Barang</th>
                                    <th>Sumber</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="light-body">
                                @foreach ($barang as $barangs)
                                    <tr>
                                        <td>{{ $barangs->no_barang }}</td>
                                        @unless(isset($nama))
                                            <td>{{ $barangs->nama->nama_barang }}</td>
                                        @endunless
                                        <td>{{ $barangs->tanggal_masuk }}</td>
                                        <td>
                                            @if ($barangs->kondisi === 'baik')
                                                <span
                                                    class="mt-2 badge badge-pill text-white bg-success">{{ $barangs->kondisi }}</span>
                                            @elseif ($barangs->kondisi === 'kurang_baik')
                                                <span
                                                    class="mt-2 badge badge-pill badge-warning">{{ $barangs->kondisi }}</span>
                                            @else
                                                <span
                                                    class="mt-2 badge badge-pill text-white bg-danger">{{ $barangs->kondisi }}</span>
                                            @endif
                                        </td>

                                        <td>{{ $barangs->lokasi }}</td>
                                        <td>{{ $barangs->sumber }}</td>
                                        <td>
                                            @if ($barangs->status === 'tersedia')
                                                <span
                                                    class="mt-2 badge badge-pill text-white bg-success">{{ $barangs->status }}</span>
                                            @elseif ($barangs->status === 'dipinjam')
                                                <span
                                                    class="mt-2 badge badge-pill badge-primary">{{ $barangs->status }}</span>
                                            @else
                                                <span
                                                    class="mt-2 badge badge-pill text-white badge-danger">{{ $barangs->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex list-action">
                                                <a class="mr-2 p-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="edit" href="#">
                                                    <button class="btn btn-primary py-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                            height="26" fill="#FFFFFF" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <a class="mr-2 p-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Report" href="#">
                                                    <button class="btn py-2 btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                            height="26" fill="#FFFFFF"
                                                            class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> --}}
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
