@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Edit Data Kelompok</p>
            </div>
        </div>

        <!-- Form Edit Data -->
        <form method="POST" action="/UpdateKelompok/{{ $kelompokBarang->id_kelompok }}">
            @csrf
            @method('POST')
            <div id="form-container">
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="id_kelompok" class="form-label">ID Kelompok</label>
                        <input type="text" class="form-control" id="id_kelompok" name="id_kelompok" value="{{ $kelompokBarang->id_kelompok }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nm_kelompok" class="form-label">Nama Kelompok</label>
                        <input type="text" class="form-control" id="nm_kelompok" name="nm_kelompok" value="{{ $kelompokBarang->nm_kelompok }}" required>
                    </div>
                </div>
            </div>

            <!-- Tombol untuk menambah form baru -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

@endsection
