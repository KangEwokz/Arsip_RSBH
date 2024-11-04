@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Tambah Data Jenis Barang</p>
            </div>
        </div>

        <!-- Form Input Data -->
        <form method="POST" action="/SimpanSatuan">
            @csrf
            <div id="form-container">
                <!-- Form Input Utama -->
                <div class="row mb-3 form-input">
                    <div class="col-md-6">
                        <label for="id_satuan_0" class="form-label">ID Satuan</label>
                        <input type="text" class="form-control" name="Satuan[0][id_satuan]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nm_satuan_0" class="form-label">Nama Satuan</label>
                        <input type="text" class="form-control" name="Satuan[0][nm_satuan]" required>
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

            newForm.innerHTML = `
                <div class="col-md-6">
                    <label for="id_satuan_${formCount}" class="form-label">ID Satuan</label>
                    <input type="text" class="form-control" name="Satuan[${formCount}][id_satuan]" required>
                </div>
                <div class="col-md-6">
                    <label for="nm_satuan_${formCount}" class="form-label">Nama Satuan</label>
                    <input type="text" class="form-control" name="Satuan[${formCount}][nm_satuan]" required>
                </div>
            `;

            // Tambahkan form baru ke dalam container
            formContainer.appendChild(newForm);
        });
    </script>
@endsection
