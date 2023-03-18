@extends('layouts.main')

@section('component')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-border-primary text-primary p-4" style="height: 13.68rem">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mt-4">
                            <h2>Inventory Management SMKN 13 Bandung</h2>
                            <p>Selamat Datang <b>{{ auth()->user()->username }}</b> di Web Inventory Management SMKN 13
                                Bandung</p>
                        </div>
                        <img src="{{ asset('assets/images/page-img/main-logo.png') }}" alt="" width="130px"
                            height="130px">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <a href="" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="Fitur untuk memasukan barang">
                            <div class="card card-block card-stretch card-height bg-primary justify-content-center">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="white"
                                            class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                            <path
                                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-white text-center">Barang Masuk</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="Fitur untuk memasukan barang">
                            <div class="card card-block card-stretch card-height justify-content-center bg-secondary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="white"
                                            class="bi bi-bag-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-white text-center">Request Barang</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="Fitur untuk memasukan barang">
                            <div class="card card-block card-stretch card-height justify-content-center bg-danger">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="white"
                                            class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-white text-center">Lapor</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
