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

        <h5 class="card-title fw-bolder mb-3">Tambah pesanan</h5>

		<form method="post" action="{{ route('pesanan.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_pesanan" class="form-label">ID pesanan</label>
                <input type="text" class="form-control" id="id_pesanan" name="id_pesanan">
            </div>
            <div class="mb-3">
                <label for="id_bus" class="form-label">ID bus</label>
                <input type="text" class="form-control" id="id_bus" name="id_bus">
            </div>
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa">
            </div>
			<div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
            </div>
            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop