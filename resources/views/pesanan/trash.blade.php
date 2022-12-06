@extends('pesanan.layout')
@section('content')
<a href="{{ route('home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('penyewa.index') }}" type="button" class="btn btn rounded-3">Data Penyewa</a>
<a href="{{ route('pesanan.index') }}" type="button" class="btn btn rounded-3">Data Pesanan</a>
<a href="{{ route('bus.index') }}" type="button" class="btn btn rounded-3">Data Bus</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>



<div style="margin-top: 15px">
    <div style="margin-bottom: -70px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('pesanan.index') }}" type="button">Data pesanan</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('pesanan.trash') }}" type="button">Sampah</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Sampah Pesanan</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('pesanan.search_trash') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Kode pesanan">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
        <th>No. Pesanan</th>
        <th>No. Bus</th>
        <th>No. Penyewa</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Total Harga </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
        <td>{{ $data->id_pesanan }}</td>
        <td>{{ $data->id_bus }}</td>
                <td>{{ $data->id_penyewa }}</td>
                <td>{{ $data->tanggal_mulai }}</td>
                <td>{{ $data->tanggal_selesai }}</td>
                <td>{{ $data->total_harga }}</td>
            <td>
                <a href="{{ route('pesanan.restore', $data->id_pesanan) }}" type="button"
                    class="btn btn-success rounded-3">Pulihkan</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_pesanan }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_pesanan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('pesanan.delete', $data->id_pesanan) }}">
                                @csrf
                                <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop