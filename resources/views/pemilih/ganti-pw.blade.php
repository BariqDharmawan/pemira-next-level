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
            @elseif($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ganti password</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pemilih.save-password') }}" method="post">
                                @csrf @method('PUT')
                                <div class="form-group">
                                    <label for="gantiPassword">Masukan Password Baru</label>
                                    <input type="password" class="form-control" minlength="8" 
                                    maxlength="100" id="gantiPassword" name="password"
                                    placeholder="Jangan menggunakan password yang sama" required>
                                </div>
                                <button type="submit" class="btn btn-success">Ganti password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection