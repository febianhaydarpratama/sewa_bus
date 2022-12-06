@extends('bus.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah Bus</h5>

		<form method="post" action="{{ route('bus.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_bus" class="form-label">ID Bus</label>
                <input type="text" class="form-control" id="id_bus" name="id_bus">
            <div class="mb-3">
            <div class="mb-3">
                <label for="tipe_bus" class="form-label">Tipe Bus</label>
                <input type="text" class="form-control" id="tipe_bus" name="tipe_bus">
            </div>
                <label for="total_kursi" class="form-label">Total Kursi</label>
                <input type="text" class="form-control" id="total_kursi" name="total_kursi">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop