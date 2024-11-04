@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Edit Data Klasifikasi</p>
            </div>
        </div>

        <!-- Form Edit Data -->
        <form method="POST" action="/UpdateKlasifikasi/{{ $klasifikasiBarang->id_klasifikasi }}">
            @csrf
            @method('POST')
            <div id="form-container">
                <div class="row mb-3 form-input">
                    <div class="col-md-4">
                        <label for="id_klasifikasi" class="form-label">ID Klasifikasi</label>
                        <input type="text" class="form-control" id="id_klasifikasi" name="id_klasifikasi" value="{{ $klasifikasiBarang->id_klasifikasi }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nm_klasifikasi" class="form-label">Nama Klasifikasi</label>
                        <input type="text" class="form-control" id="nm_klasifikasi" name="nm_klasifikasi" value="{{ $klasifikasiBarang->nm_klasifikasi }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="id_kelompok" class="form-label">ID Kelompok</label>
                        <select class="form-select" id="id_kelompok" name="id_kelompok" required>
                            <option value="" disabled>Pilih Kelompok</option>
                            @foreach ($kelompok as $kelompokItem)
                                <option value="{{ $kelompokItem->id_kelompok }}" {{ $kelompokItem->id_kelompok == $kelompokItem->id_kelompok ? 'selected' : '' }}>
                                    {{ $kelompokItem->id_kelompok }} - {{ $kelompokItem->nm_kelompok }}
                                </option>
                            @endforeach
                        </select>
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
