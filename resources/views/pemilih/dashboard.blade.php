@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <main class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <header class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Total calon pasangan ketua BEM
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <var style="font-style: normal">
                                                    {{-- {{ $totalCalon }} --}}
                                                </var>
                                                <span>pasangan</span>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Status memilih
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                {{-- Kamu {{ $statusMemilih == true ? 'sudah' : 'belum' }}
                                                ikut voting --}}
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div
                                                class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-fluid mt--3" style="min-height: 100vh">
            <div class="row mx-0" style="min-height: 10vh">
                <div class="card col-12 d-flex">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-0">
                            Silahkan gunakan sidebar disebelah kiri untuk mengakses menu
                        </h5>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection