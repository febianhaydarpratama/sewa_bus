@extends('penyewa.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah Penyewa</h5>

		<form method="post" action="{{ route('penyewa.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa">
            </div>
			<div class="mb-3">
                <label for="nama_penyewa" class="form-label">Nama penyewa</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa">
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop