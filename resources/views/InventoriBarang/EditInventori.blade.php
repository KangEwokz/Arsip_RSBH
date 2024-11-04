@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Edit Data Inventori</p>
            </div>
        </div>

        <!-- Form Edit Data -->
        <form method="POST" action="/UpdateInventori/{{ $inventori->id_inventori }}">
            @csrf
            @method('POST')
            <div class="border border-rounded p-5 mb-5">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_inventori" class="form-label">ID Inventori</label>
                        <input type="text" class="form-control" id="id_inventori" name="id_inventori" value="{{ $inventori->id_inventori }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nm_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nm_barang" name="nm_barang" value="{{ $inventori->nm_barang }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_jenis" class="form-label">ID Jenis</label>
                        <select class="form-select" id="id_jenis" name="id_jenis" required>
                            <option value="">Pilih Jenis</option>
                            @foreach($jenis as $item)
                                <option value="{{ $item->id_jenis }}" {{ $inventori->id_jenis == $item->id_jenis ? 'selected' : '' }}>
                                    {{ $item->id_jenis }}-{{ $item->jns_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="id_klasifikasi" class="form-label">ID Klasifikasi</label>
                        <select class="form-select" id="id_klasifikasi" name="id_klasifikasi" required>
                            <option value="">Pilih Klasifikasi</option>
                            @foreach($klasifikasi as $item)
                                <option value="{{ $item->id_klasifikasi }}" {{ $inventori->id_klasifikasi == $item->id_klasifikasi ? 'selected' : '' }}>
                                    {{ $item->id_klasifikasi }}-{{ $item->nm_klasifikasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="{{ $inventori->spesifikasi }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $inventori->jumlah }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $inventori->harga }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $inventori->status }}" required>
                    </div>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
