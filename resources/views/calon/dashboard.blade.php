@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <main class="main-content">
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
                                                Tanggal registrasi
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                {{ $profilDirimu->created_at->format('D M Y H:i') }}
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
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
                                                Kelengkapan profile
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                @php
                                                    if ($profilDirimu->visi == '' and 
                                                    $profilDirimu->misi == '') {
                                                        $status = 'belum';
                                                    }
                                                    else {
                                                        $status = 'sudah';
                                                    }
                                                @endphp
                                                Profil mu <span>{{ $status }}</span> lengkap
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
                    </div>
                </div>
            </div>
        </header>
    </main>
@endsection