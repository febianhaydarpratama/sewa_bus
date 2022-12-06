@extends('penyewa.layout')

@section('content')
<a href="{{ route('home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('penyewa.index') }}" type="button" class="btn btn rounded-3">Data Penyewa</a>
<a href="{{ route('pesanan.index') }}" type="button" class="btn btn rounded-3">Data Pesanan</a>
<a href="{{ route('bus.index') }}" type="button" class="btn btn rounded-3">Data Bus</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>

<div style="margin-top: 15px">
    <div style="margin-bottom: -70px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('penyewa.index') }}" type="button">Data Penyewa</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('penyewa.trash') }}" type="button">Sampah</a>
        </div>
    </div>
</div>

<h4 class="mt-5">Data Penyewa</h4>

<div class="form-search" style="float:right">
    <form action="{{ route('penyewa.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Cari Nama Penyewa">
            <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div></div>

<a href="{{ route('penyewa.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No. Penyewa</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Email</th>
        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_penyewa }}</td>
                <td>{{ $data->nama_penyewa }}</td>
                <td>{{ $data->kontak }}</td>
                <td>{{ $data->email }}</td>
                
                <td>
                    <a href="{{ route('penyewa.edit', $data->id_penyewa) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_penyewa }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_penyewa }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('penyewa.hide', $data->id_penyewa) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop