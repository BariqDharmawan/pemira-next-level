@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <div class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <div class="container-fluid mt-5">
            <div class="card">
                <div class="card-header border-bottom-0 bg-secondary">
                    <h1 class="h2">Tambah calon ketua BEM baru</h1>
                </div>
                <form class="card-body" action="{{ route('admin.tambah-calon.post') }}" 
                method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="emailCalon" class="text-capitalize font-weight-bold">
                            email
                        </label>
                        <input type="email" class="form-control" id="emailCalon" 
                        placeholder="Masukan email calon" name="email_calon" required>
                    </div>
                    <div class="form-group">
                        <label for="emailCalon" class="text-capitalize font-weight-bold">
                            nama lengkap
                        </label>
                        <input type="nama" class="form-control" id="namaCalon" 
                        placeholder="Masukan nama lengkap calon" name="nama_calon" required>
                    </div>
                    <div class="form-group">
                        <p class="font-weight-bold">
                            Foto calon
                        </p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input invisible" 
                            name="foto_calon" id="fotoCalon">
                            <label class="custom-file-label" for="fotoCalon">
                                Upload foto calon
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah calon baru</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection