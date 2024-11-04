@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Tambah Data Barang</p>
            </div>
        </div>

        <form method="POST" action="/SimpanBarang">
            @csrf
            <div id="form-container">
                <!-- Form Awal -->
                <div class="form-group border rounded p-3 mb-3 form-input" data-index="0">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="id_barang_0" class="form-label">ID Barang</label>
                            <input type="text" class="form-control" id="id_barang_0" name="barang[0][id_barang]" readonly>
                        </div>
                        <div class="col">
                            <label for="nm_barang_0" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nm_barang_0" name="barang[0][nm_barang]" required>
                        </div>
                        <div class="col">
                            <label for="id_satuan_0" class="form-label">ID Satuan</label>
                            <select class="form-select" id="id_satuan_0" name="barang[0][id_satuan]" required>
                                <option value="" disabled selected>Pilih ID Satuan</option>
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->id_satuan }}">{{ $satuan->nm_satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="id_kelompok_0" class="form-label">ID Kelompok</label>
                            <select class="form-select" id="id_kelompok_0" name="barang[0][id_kelompok]" required>
                                <option value="" disabled selected>Pilih ID Kelompok</option>
                                @foreach ($kelompoks as $kelompok)
                                    <option value="{{ $kelompok->id_kelompok }}">{{ $kelompok->nm_kelompok }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="jumlah_0" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_0" name="barang[0][jumlah]" required>
                        </div>
                        <div class="col">
                            <label for="harga_0" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga_0" name="barang[0][harga]" required>
                        </div>
                        <div class="col">
                            <label for="id_klasifikasi_0" class="form-label">ID Klasifikasi</label>
                            <select class="form-select" id="id_klasifikasi_0" name="barang[0][id_klasifikasi]" required>
                                <option value="" disabled selected>Pilih ID Klasifikasi</option>
                                @foreach ($klasifikasis as $klasifikasi)
                                    <option value="{{ $klasifikasi->id_klasifikasi }}">{{ $klasifikasi->nm_klasifikasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="tanggal_pembelian_0" class="form-label">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_pembelian_0" name="barang[0][tanggal_pembelian]" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/Barang" class="btn btn-secondary me-3">Kembali</a>
                <button type="button" class="btn btn-outline-success me-3" id="add-form-btn">Tambah Form</button>
                <button type="button" class="btn btn-danger" id="remove-form-btn">Hapus Form</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-form-btn').addEventListener('click', function() {
            let formContainer = document.getElementById('form-container');
            let formCount = document.querySelectorAll('.form-input').length;

            let newForm = document.createElement('div');
            newForm.classList.add('form-group', 'border', 'rounded', 'p-3', 'mb-3', 'form-input');
            newForm.setAttribute('data-index', formCount);

            newForm.innerHTML = `
                <div class="row mb-3">
                    <div class="col"><label for="id_barang_${formCount}" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" id="id_barang_${formCount}" name="barang[${formCount}][id_barang]" readonly></div>
                    <div class="col"><label for="nm_barang_${formCount}" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nm_barang_${formCount}" name="barang[${formCount}][nm_barang]" required></div>
                    <div class="col"><label for="id_satuan_${formCount}" class="form-label">ID Satuan</label>
                        <select class="form-select" id="id_satuan_${formCount}" name="barang[${formCount}][id_satuan]" required>
                            <option value="" disabled selected>Pilih ID Satuan</option>
                            @foreach ($satuans as $satuan)
                                <option value="{{ $satuan->id_satuan }}">{{ $satuan->nm_satuan }}</option>
                            @endforeach
                        </select></div>
                    <div class="col"><label for="id_kelompok_${formCount}" class="form-label">ID Kelompok</label>
                        <select class="form-select" id="id_kelompok_${formCount}" name="barang[${formCount}][id_kelompok]" required>
                            <option value="" disabled selected>Pilih ID Kelompok</option>
                            @foreach ($kelompoks as $kelompok)
                                <option value="{{ $kelompok->id_kelompok }}">{{ $kelompok->nm_kelompok }}</option>
                            @endforeach
                        </select></div>
                    <div class="col"><label for="jumlah_${formCount}" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah_${formCount}" name="barang[${formCount}][jumlah]" required></div>
                    <div class="col"><label for="harga_${formCount}" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga_${formCount}" name="barang[${formCount}][harga]" required></div>
                    <div class="col"><label for="id_klasifikasi_${formCount}" class="form-label">ID Klasifikasi</label>
                        <select class="form-select" id="id_klasifikasi_${formCount}" name="barang[${formCount}][id_klasifikasi]" required>
                            <option value="" disabled selected>Pilih ID Klasifikasi</option>
                            @foreach ($klasifikasis as $klasifikasi)
                                <option value="{{ $klasifikasi->id_klasifikasi }}">{{ $klasifikasi->nm_klasifikasi }}</option>
                            @endforeach
                        </select></div>
                    <div class="col"><label for="tanggal_pembelian_${formCount}" class="form-label">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tanggal_pembelian_${formCount}" name="barang[${formCount}][tanggal_pembelian]" required></div>
                </div>
            `;
            formContainer.appendChild(newForm);
        });

        document.getElementById('remove-form-btn').addEventListener('click', function() {
            let formContainer = document.getElementById('form-container');
            let formInputs = document.querySelectorAll('.form-input');

            if (formInputs.length > 1) {
                formContainer.removeChild(formInputs[formInputs.length - 1]);
            } else {
                alert('Tidak bisa menghapus form terakhir!');
            }
        });
    </script>
@endsection 
