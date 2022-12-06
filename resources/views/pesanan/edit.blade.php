@extends('pesanan.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data pesanan</h5>

		<form method="post" action="{{ route('pesanan.update', $data->id_pesanan) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pesanan" class="form-label">ID pesanan</label>
                <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="{{ $data->id_pesanan }}">
            </div>
            <div class="mb-3">
                <label for="id_bus" class="form-label">ID Bus</label>
                <input type="text" class="form-control" id="id_bus" name="id_bus" value="{{ $data->id_bus }}">
            </div>
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID Penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa" value="{{ $data->id_penyewa }}">
            </div>
			<div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Pesanan</label>
                <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $data->tanggal_mulai }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $data->tanggal_selesai }}">
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $data->total_harga }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop