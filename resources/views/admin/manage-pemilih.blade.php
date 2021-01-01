@extends('layouts.app')
@section('content')
    @include('partial.sidebar')
    <div class="main-content" style="min-height: 100vh">
        @include('partial.nav')
        <div class="container-fluid mt-5">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row flex-column">
                <div class="col mb-5 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddPemilih">
                        Tambah pemilih baru
                    </button>
                </div>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    @php
                                        $columns = ['nama', 'email', 'nim'];
                                    @endphp
                                    @for ($i = 0; $i < 3; $i++)
                                        <th class="sort text-center" scope="col">
                                            {{ $columns[$i] }} pemilih
                                        </th>
                                    @endfor
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($semuaPemilih as $pemilih)
                                <tr>
                                    <td class="text-center">
                                        {{ $pemilih->user->nama }}
                                    </td>
                                    <td class="text-center">
                                        {{ $pemilih->user->email }}
                                    </td>
                                    <td class="text-center">
                                        {{ $pemilih->nim }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" role="button"
                                            class="btn btn-sm btn-icon-only text-light"  
                                            data-toggle="dropdown" 
                                            aria-haspopup="true" 
                                            aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                data-toggle="modal"
                                                data-target="#modalLihatDetail{{ Str::of($pemilih->user->nama)->camel()->ucfirst() }}">
                                                    Lihat detail
                                                </a>
                                                <form action="{{ route('admin.hapus-pemilih', $pemilih->id) }}"
                                                method="post">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        Hapus pemilih
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada pemilih</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('component')
    <div class="modal fade" 
    id="modalAddPemilih"
    tabindex="-1" role="dialog" 
    aria-labelledby="modalAddPemilihLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" 
                    id="modalAddPemilihLabel">
                        Tambah pemilih baru
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tambah-pemilih') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="namaPemilih">Nama pemilih</label>
                            <input type="text" class="form-control" name="nama"
                            id="namaPemilih" placeholder="Nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="namaPemilih" class="text-capitalize">email pemilih</label>
                            <input type="email" class="form-control" name="email"
                            id="emailPemilih" placeholder="email lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="nimPemilih">NIM pemilih</label>
                            <input type="number" class="form-control" name="nim"
                            id="nimPemilih" placeholder="NIM pemilih" max="9999999999" required>
                        </div>
                        <button type="submit" class="btn-primary btn">Tambah pemilih baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($semuaPemilih as $pemilih)
        <div class="modal fade" 
        id="modalLihatDetail{{ Str::of($pemilih->user->nama)->camel()->ucfirst() }}"
        tabindex="-1" role="dialog" 
        aria-labelledby="modalLihatDetail{{ Str::of($pemilih->user->nama)->camel()->ucfirst() }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                        id="modalLihatDetail{{ Str::of($pemilih->user->nama)->camel()->ucfirst() }}Label">
                            Detail pemilih bernama <b>{{ $pemilih->user->name }}</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Nama lengkap: {{ ucwords($pemilih->user->nama) }}
                            </li>
                            <li class="list-group-item">
                                Email: {{ $pemilih->user->email }}
                            </li>
                            <li class="list-group-item">
                                Sudah memilih: {{ $pemilih->sudah_memilih == false ? 'belum' : 'sudah' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection