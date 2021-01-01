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
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="sort" scope="col">Nama calon</th>
                                    <th class="sort" scope="col">Email calon</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($semuaCalon as $calon)
                                <tr>
                                    <td>
                                        {{ $calon->user->nama }}
                                    </td>
                                    <td>
                                        {{ $calon->user->email }}
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
                                                data-target="#modalLihatDetail{{ Str::of($calon->user->nama)->camel()->ucfirst() }}">
                                                    Lihat detail
                                                </a>
                                                <form action="{{ route('admin.hapus-calon', $calon->id) }}"
                                                method="post">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        Hapus calon
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('component')
    @foreach ($semuaCalon as $calon)
        <div class="modal fade" 
        id="modalLihatDetail{{ Str::of($calon->user->nama)->camel()->ucfirst() }}"
        tabindex="-1" role="dialog" 
        aria-labelledby="modalLihatDetail{{ Str::of($calon->user->nama)->camel()->ucfirst() }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                        id="modalLihatDetail{{ Str::of($calon->user->nama)->camel()->ucfirst() }}Label">
                            Detail calon {{ Str::words($calon->user->name, 1) }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Nama lengkap: {{ ucwords($calon->user->nama) }}
                            </li>
                            <li class="list-group-item">
                                Email: {{ $calon->user->email }}
                            </li>
                            <li class="list-group-item">
                                Visi: 
                                <p>{{ $calon->visi }}</p>
                            </li>
                            <li class="list-group-item">
                                Misi:
                                <div>
                                    {!! $calon->visi !!}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection