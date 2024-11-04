@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Tambah Data Inventori</p>
            </div>
        </div>

        <form method="POST" action="/SimpanInventori">
            @csrf
            <div id="form-container" class="border border-rounded border-danger p-5 mb-5">
                <!-- Form Input Utama -->
                <div class="row mb-3 form-input" id="form-0">
                    <div class="col-md-6">
                        <label for="id_inventori_0" class="form-label">ID Inventori</label>
                        <input type="text" class="form-control" id="display_id_inventori_0" name="display_id_inventori" value="" required readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nm_barang_0" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nm_barang_0" name="inventori[0][nm_barang]" required>
                    </div>
                </div>
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="id_jenis_0" class="form-label">ID Jenis</label>
                        <select class="form-select" id="id_jenis_0" name="inventori[0][id_jenis]" required>
                            <option value="">Pilih Jenis</option>
                            @foreach($jenis as $item)
                                <option value="{{ $item->id_jenis }}">{{ $item->id_jenis }} - {{ $item->jns_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="id_klasifikasi_0" class="form-label">ID Klasifikasi</label>
                        <select class="form-select" id="id_klasifikasi_0" name="inventori[0][id_klasifikasi]" required>
                            <option value="">Pilih Klasifikasi</option>
                            @foreach($klasifikasi as $item)
                                <option value="{{ $item->id_klasifikasi }}">{{ $item->nm_klasifikasi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="spesifikasi_0" class="form-label">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi_0" name="inventori[0][spesifikasi]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_0" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah_0" name="inventori[0][jumlah]" required>
                    </div>
                </div>
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="harga_0" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga_0" name="inventori[0][harga]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="status_0" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status_0" name="inventori[0][status]" required>
                    </div>
                </div>
            </div>
        
            <!-- Tombol untuk menambah form baru -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-success me-3" id="add-form-btn">
                    Tambah Form
                </button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
        
        
    </div>

    <script>
        document.getElementById('add-form-btn').addEventListener('click', function() {
            let formContainer = document.getElementById('form-container');
            let formCount = document.querySelectorAll('.form-input').length;

            // Buat elemen form baru
            let newForm = document.createElement('div');
            newForm.classList.add('row', 'mb-3', 'form-input');
            newForm.id = `form-${formCount}`;

            newForm.innerHTML = `
                <div class="col-md-6">
                    <label for="id_inventori_${formCount}" class="form-label">ID Inventori</label>
                    <input type="text" class="form-control" id="id_inventori_${formCount}" name="inventori[${formCount}][id_inventori]" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="nm_barang_${formCount}" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nm_barang_${formCount}" name="inventori[${formCount}][nm_barang]" required>
                </div>
                <div class="col-md-6">
                    <label for="id_jenis_${formCount}" class="form-label">ID Jenis</label>
                    <select class="form-select" id="id_jenis_${formCount}" name="inventori[${formCount}][id_jenis]" required>
                        <option value="">Pilih Jenis</option>
                        @foreach($jenis as $item)
                            <option value="{{ $item->id_jenis }}">{{ $item->id_jenis }} - {{ $item->jns_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="id_klasifikasi_${formCount}" class="form-label">ID Klasifikasi</label>
                    <select class="form-select" id="id_klasifikasi_${formCount}" name="inventori[${formCount}][id_klasifikasi]" required>
                        <option value="">Pilih Klasifikasi</option>
                        @foreach($klasifikasi as $item)
                            <option value="{{ $item->id_klasifikasi }}" data-idKelompok="{{ $item->id_kelompok }}">{{ $item->nm_klasifikasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="spesifikasi_${formCount}" class="form-label">Spesifikasi</label>
                    <input type="text" class="form-control" id="spesifikasi_${formCount}" name="inventori[${formCount}][spesifikasi]" required>
                </div>
                <div class="col-md-6">
                    <label for="jumlah_${formCount}" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah_${formCount}" name="inventori[${formCount}][jumlah]" required>
                </div>
                <div class="col-md-6">
                    <label for="harga_${formCount}" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga_${formCount}" name="inventori[${formCount}][harga]" required>
                </div>
                <div class="col-md-6">
                    <label for="status_${formCount}" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status_${formCount}" name="inventori[${formCount}][status]" required>
                </div>
            `;

            // Tambahkan event listener untuk update ID inventori di form baru
            newForm.querySelector(`#id_jenis_${formCount}`).addEventListener('change', () => updateIdInventori(formCount));
            newForm.querySelector(`#id_klasifikasi_${formCount}`).addEventListener('change', () => updateIdInventori(formCount));

            // Tambahkan form baru ke dalam container
            formContainer.appendChild(newForm);
        });

        function updateIdInventori(index) {
            const idInventoriInput = document.getElementById(`id_inventori_${index}`);
            const idJenisSelect = document.getElementById(`id_jenis_${index}`);
            const idKlasifikasiSelect = document.getElementById(`id_klasifikasi_${index}`);
            const idKelompok = idKlasifikasiSelect.options[idKlasifikasiSelect.selectedIndex]?.dataset.idKelompok;

            const idJenis = idJenisSelect.value;
            const idKlasifikasi = idKlasifikasiSelect.value;

            if (idJenis && idKlasifikasi && idKelompok) {
                idInventoriInput.value = `${idJenis}-${idKelompok}-${idKlasifikasi}`;
            } else {
                idInventoriInput.value = ''; // Kosongkan jika salah satu tidak dipilih
            }
        }

        // Tambahkan event listener untuk form input yang sudah ada
        document.querySelector(`#id_jenis_0`).addEventListener('change', () => updateIdInventori(0));
        document.querySelector(`#id_klasifikasi_0`).addEventListener('change', () => updateIdInventori(0));
    </script>

@endsection
