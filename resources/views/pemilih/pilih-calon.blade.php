@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <main class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <div class="container-fluid mt-5">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pilih calon</h3>
                        </div>
                        <div class="card-body">
                            @if ($pemilih->sudah_memilih == 1)
                                <div class="alert alert-success text-center mb-5" role="alert">
                                    Kamu telah memilih calon ketua, 
                                    tidak bisa memilih lagi
                                </div>
                            @endif
                            <div class="row">
                            @foreach ($semuaCalon as $calon)
                                <div class="col-6">
                                    <div class="card">
                                        <img height="100" width="100" class="d-block mx-auto my-4"
                                        src="{{ Storage::url($calon->foto) }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $calon->user->email }}</h5>
                                            <p class="card-text">
                                                {{ $calon->visi }}
                                            </p>
                                        </div>
                                        <div class="card-action p-4 d-flex align-items-center
                                        justify-content-between">
                                            @if ($pemilih->sudah_memilih == false)
                                                <form method="POST"
                                                action="{{ route('pemilih.submit-pilihan', $calon->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="calon_id" 
                                                    value="{{ $calon->id }}" required readonly>
                                                    <button type="submit" class="btn btn-primary">
                                                        Pilih calon ini
                                                    </button>
                                                </form>
                                            @endif
                                            @if ($pemilih->pilihan_kamu === $calon->id)
                                                <p class="text-primary font-weight-bold mb-0">
                                                    Kamu memilih calon ini
                                                </p>
                                            @endif
                                            <a href="" class="btn btn-secondary">
                                                Lihat misi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection