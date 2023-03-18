@extends('layouts.main')

@section('component')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="height: auto">
                <div class="card-body text-dark">
                    <div class="d-flex justify-content-around align-items-center bg-transparent">
                        <div>
                            <h1>Inventory Management 13</h1>
                            <p>Selamat Datang <b>{{ auth()->user()->username }}</b> di Web Inventaris Kantor SMKN 13 Bandung
                            </p>
                        </div>
                        <img src="{{ asset('assets/images/page-img/main-logo.png') }}" style="width: 8cm; height:auto"
                            alt="" class="img-thumbnail border-0 shadow-none">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <a href="" class="text-primary">
                <div class="card border-primary">
                    <div class="card-header text-center border-primary">
                        aksjdh
                    </div>
                    <div class="card-body">
                        kajshd
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="" class="text-primary">
                <div class="card border">
                    <div class="card-header border d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0C6CFF"
                            class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                        <h4>Request</h4>
                    </div>
                    <div class="card-body">
                        kajshd
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="" class="text-primary">
                <div class="card border-primary">
                    <div class="card-header text-center border-primary">
                        aksjdh
                    </div>
                    <div class="card-body">
                        kajshd
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Tipe Barang</h3>
                </div>
                <div class="card-body">
                    <div class="row m-2">
                        <div class="card bg-primary border-white text-white col-4">
                            <div class="card-header text-center border-white">
                                <h4>Asset Tetap</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus obcaecati facere
                                    officiis
                                    eveniet iure nam, officia non itaque maiores nesciunt amet veritatis illum
                                    accusantium
                                    sint quibusdam a doloribus? Enim, asperiores!</p>
                                <a href="" class="text-white float-right">- detail</a>
                            </div>
                        </div>
                        <div class="card bg-secondary border-white text-white col-4">
                            <div class="card-header text-center border-white">
                                <h4>Asset Habis Pakai</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus obcaecati facere
                                    officiis
                                    eveniet iure nam, officia non itaque maiores nesciunt amet veritatis illum
                                    accusantium
                                    sint quibusdam a doloribus? Enim, asperiores!</p>
                                <a href="" class="text-white float-right">- detail</a>
                            </div>
                        </div>
                        <div class="card bg-danger border-white text-white col-4">
                            <div class="card-header text-center border-white">
                                <h4>Asset Tetap</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus obcaecati facere
                                    officiis
                                    eveniet iure nam, officia non itaque maiores nesciunt amet veritatis illum
                                    accusantium
                                    sint quibusdam a doloribus? Enim, asperiores!</p>
                                <a href="" class="text-white float-right">- detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
