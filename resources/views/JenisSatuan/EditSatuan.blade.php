@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Edit Data Jenis Barang</p>
            </div>
        </div>

        <!-- Form Edit Data -->
        <form method="POST" action="/UpdateSatuan/{{ $JenisSatuan->id_satuan }}">
            @csrf
            @method('POST') <!-- Laravel method spoofing to handle PUT request -->
            <div id="form-container">
                <!-- Form Input Utama -->
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="id_satuan" class="form-label">ID Jenis</label>
                        <input type="text" class="form-control" id="id_satuan" name="id_satuan" value="{{ $JenisSatuan->id_satuan }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nm_satuan" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control" id="nm_satuan" name="nm_satuan" value="{{ $JenisSatuan->nm_satuan }}" required>
                    </div>
                </div>
            </div>

            <!-- Tombol untuk simpan perubahan -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
