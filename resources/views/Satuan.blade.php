@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Satuan Details</p>
                <div>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSatuanModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary bg-gradient text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>ID Satuan</th>
                        <th>Nama Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuan as $index => $item)
                        <tr class="text-center">
                            <td>{{ $satuan->firstItem() + $index }}</td>
                            <td>{{ $item->id_satuan }}</td>
                            <td>{{ $item->nm_satuan }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#editSatuanModal{{ $item->id_satuan }}">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="/HapusSatuan/{{ $item->id_satuan }}" class="btn btn-outline-danger btn-xs"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit Satuan -->
                        <div class="modal fade" id="editSatuanModal{{ $item->id_satuan }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $item->id_satuan }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $item->id_satuan }}">Edit Satuan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/UpdateSatuan/{{ $item->id_satuan }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="id_satuan" class="form-label">ID Satuan</label>
                                                    <input type="text" class="form-control" id="id_satuan"
                                                        name="id_satuan" value="{{ $item->id_satuan }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nm_satuan" class="form-label">Nama Satuan</label>
                                                    <input type="text" class="form-control" id="nm_satuan"
                                                        name="nm_satuan" value="{{ $item->nm_satuan }}" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Satuan -->
        <div class="modal fade" id="addSatuanModal" tabindex="-1" aria-labelledby="addSatuanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addSatuanModalLabel">Tambah Satuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/SimpanSatuan">
                            @csrf
                            <div id="form-container">
                                <div class="row mb-3 form-input" data-index="0">
                                    <div class="col-md-5">
                                        <label for="id_satuan_0" class="form-label">ID Satuan</label>
                                        <input type="text" class="form-control" id="id_satuan_0"
                                            name="satuan[0][id_satuan]" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="nm_satuan_0" class="form-label">Nama Satuan</label>
                                        <input type="text" class="form-control" id="nm_satuan_0"
                                            name="satuan[0][nm_satuan]" required>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger remove-form-btn">Hapus
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-success me-3" id="add-form-btn">Tambah
                                    Form</button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                        <script>
                            // Tambahkan form baru secara dinamis
                            document.getElementById('add-form-btn').addEventListener('click', function() {
                                let formContainer = document.getElementById('form-container');
                                let formCount = document.querySelectorAll('.form-input').length;

                                let newForm = document.createElement('div');
                                newForm.classList.add('row', 'mb-3', 'form-input');
                                newForm.setAttribute('data-index', formCount);

                                newForm.innerHTML = `
                            <div class="col-md-5">
                                <label for="id_satuan_${formCount}" class="form-label">ID Satuan</label>
                                <input type="text" class="form-control" id="id_satuan_${formCount}" name="satuan[${formCount}][id_satuan]" required>
                            </div>
                            <div class="col-md-5">
                                <label for="nm_satuan_${formCount}" class="form-label">Nama Satuan</label>
                                <input type="text" class="form-control" id="nm_satuan_${formCount}" name="satuan[${formCount}][nm_satuan]" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-outline-danger remove-form-btn">Hapus Form</button>
                            </div>
                        `;
                                formContainer.appendChild(newForm);
                                attachRemoveEvent(newForm);
                            });

                            // Fungsi untuk menghapus form yang dipilih
                            function attachRemoveEvent(form) {
                                form.querySelector('.remove-form-btn').addEventListener('click', function() {
                                    form.remove();
                                });
                            }

                            // Pasang event untuk form yang sudah ada
                            document.querySelectorAll('.form-input').forEach(form => {
                                attachRemoveEvent(form);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .custom-modal-lg {
                max-width: 1500px;
            }
        </style>


        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $satuan->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $satuan->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $satuan->lastPage(); $i++)
                    <li class="page-item {{ $i == $satuan->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $satuan->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $satuan->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $satuan->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
@endsection
