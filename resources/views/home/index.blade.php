@extends('home.layout')
@section('content')
<a href="{{ route('home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('penyewa.index') }}" type="button" class="btn btn rounded-3">Data Penyewa</a>
<a href="{{ route('pesanan.index') }}" type="button" class="btn btn rounded-3">Data Pesanan</a>
<a href="{{ route('bus.index') }}" type="button" class="btn btn rounded-3">Data Bus</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<h4 class="mt-5">Data Sewa Bus</h4>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Penyewa</th>
            <th>Nama Penyewa</th>
            <th>Kontak</th>
            <th>Tipe Bus</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penyewa }}</td>
            <td>{{ $data->nama_penyewa }}</td>
            <td>{{ $data->kontak }}</td>
            <td>{{ $data->tipe_bus }}</td>
            <td>{{ $data->tanggal_mulai }}</td>
            <td>{{ $data->tanggal_selesai }}</td>
            <td>{{ $data->total_harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop