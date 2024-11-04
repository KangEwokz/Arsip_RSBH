@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Tambah Data Klasifikasi</p>
            </div>
        </div>

        <!-- Form Input Data -->
        <form method="POST" action="/SimpanKlasifikasi">
            @csrf
            <div id="form-container">
                <!-- Form Input Utama -->
                <div class="row mb-3 form-input" data-index="0">
                    <div class="col-md-4">
                        <label for="id_klasifikasi_0" class="form-label">ID Klasifikasi</label>
                        <input type="text" class="form-control" id="id_klasifikasi_0" name="klasifikasi[0][id_klasifikasi]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nm_klasifikasi_0" class="form-label">Nama Klasifikasi</label>
                        <input type="text" class="form-control" id="nm_klasifikasi_0" name="klasifikasi[0][nm_klasifikasi]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="id_kelompok_0" class="form-label">ID Kelompok</label>
                        <select class="form-select" id="id_kelompok_0" name="klasifikasi[0][id_kelompok]" required>
                            <option value="" disabled selected>Pilih Kelompok</option>
                            @foreach ($kelompok as $kelompokItem)
                                <option value="{{ $kelompokItem->id_kelompok }}">
                                    {{ $kelompokItem->id_kelompok }} - {{ $kelompokItem->nm_kelompok }}
                                </option>
                            @endforeach
                        </select>
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
            let formCount = document.querySelectorAll('.form-input').length; // Hitung form yang ada

            // Buat elemen form baru
            let newForm = document.createElement('div');
            newForm.classList.add('row', 'mb-3', 'form-input');
            newForm.setAttribute('data-index', formCount); // Beri indeks untuk form baru

            newForm.innerHTML = `
                <div class="col-md-4">
                    <label for="id_klasifikasi_${formCount}" class="form-label">ID Klasifikasi</label>
                    <input type="text" class="form-control" id="id_klasifikasi_${formCount}" name="klasifikasi[${formCount}][id_klasifikasi]" required>
                </div>
                <div class="col-md-4">
                    <label for="nm_klasifikasi_${formCount}" class="form-label">Nama Klasifikasi</label>
                    <input type="text" class="form-control" id="nm_klasifikasi_${formCount}" name="klasifikasi[${formCount}][nm_klasifikasi]" required>
                </div>
                <div class="col-md-4">
                    <label for="id_kelompok_${formCount}" class="form-label">ID Kelompok</label>
                    <select class="form-select" id="id_kelompok_${formCount}" name="klasifikasi[${formCount}][id_kelompok]" required>
                        <option value="" disabled selected>Pilih Kelompok</option>
                        @foreach ($kelompok as $kelompokItem)
                            <option value="{{ $kelompokItem->id_kelompok }}">
                                {{ $kelompokItem->id_kelompok }} - {{ $kelompokItem->nm_kelompok }}
                            </option>
                        @endforeach
                    </select>
                </div>
            `;

            // Tambahkan form baru ke dalam container
            formContainer.appendChild(newForm);
        });
    </script>
@endsection
