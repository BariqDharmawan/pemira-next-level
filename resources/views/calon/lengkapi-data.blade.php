@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <div class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h2">Profile mu</h1>
                        </div>
                        <div class="card-body">
                            <p>Nama lengkap: {{ $profilDirimu->profile->nama }}</p>
                            <p>Email: {{ $profilDirimu->profile->email }}</p>
                            <p>Visi: {!! $profilDirimu->visi ?? '<b>Belum kamu isi</b>' !!}</p>
                            <p>Misi: {!! $profilDirimu->misi ?? '<b>Belum kamu isi</b>' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom-0 bg-secondary">
                            <h1 class="h2">Masukan visi misi mu</h1>
                        </div>
                        <form class="card-body" action="{{ route('calon.submit-visi-misi') }}"
                        method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="visiCalon" class="text-capitalize">visi</label>
                                <textarea class="form-control" name="visi_calon" id="visiCalon" 
                                rows="5" maxlength="100" 
                                placeholder="Masukan visi calon" 
                                required>{{ $profilDirimu->visi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="misiCalon" class="text-capitalize">misi</label>
                                <textarea class="form-control" name="misi_calon" id="misiCalon" 
                                rows="10" maxlength="255"
                                placeholder="Masukan misi calon" 
                                required>{{ $profilDirimu->misi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit visi misi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection