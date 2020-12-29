@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <main class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pilih calon</h3>
                        </div>
                        <div class="card-body">
                            @if ($pemilih->sudah_memilih == true)
                                <div class="alert alert-success text-center mb-5" role="alert">
                                    Kamu telah memilih calon ketua, 
                                    tidak bisa memilih lagi
                                </div>
                            @endif
                            <div class="row">
                            @foreach ($semuaCalon as $calon)
                                <div class="col-6">
                                    <div class="card">
                                        <img class="rounded-circle" 
                                        src="{{ Storage::url($calon->user->foto) }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $calon->user->email }}</h5>
                                            <p class="card-text">
                                                {{ $calon->visi }}
                                            </p>
                                        </div>
                                        <div class="card-action p-4 d-flex justify-content-between">
                                            @if ($pemilih->sudah_memilih == false)
                                                <form method="POST"
                                                action="{{ route('submit-pilihan', $calon->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="calon_id" 
                                                    value="{{ $calon->id }}" required readonly>
                                                    <button type="submit" class="btn btn-primary">
                                                        Pilih calon ini
                                                    </button>
                                                </form>
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