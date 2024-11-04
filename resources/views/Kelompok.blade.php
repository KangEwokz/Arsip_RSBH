@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Detail Kelompok</p>
                <div>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                    <a href="#" class="btn btn-outline-success">
                        <i class="fas fa-print"></i> Cetak Data
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary bg-gradient text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>ID Kelompok</th>
                        <th>Nama Kelompok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($kelompok as $index => $item)
                        <tr>
                            <td>{{ $kelompok->firstItem() + $index }}</td>
                            <td>{{ $item->id_kelompok }}</td>
                            <td>{{ $item->nm_kelompok }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id_kelompok }}">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="/HapusKelompok/{{ $item->id_kelompok }}" class="btn btn-outline-danger btn-xs"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit Kelompok -->
                        <div class="modal fade" id="editModal{{ $item->id_kelompok }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $item->id_kelompok }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $item->id_kelompok }}">Edit
                                            Kelompok</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/UpdateKelompok/{{ $item->id_kelompok }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="id_kelompok" class="form-label">ID Kelompok</label>
                                                    <input type="text" class="form-control" id="id_kelompok"
                                                        name="id_kelompok" value="{{ $item->id_kelompok }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nm_kelompok" class="form-label">Nama Kelompok</label>
                                                    <input type="text" class="form-control" id="nm_kelompok"
                                                        name="nm_kelompok" value="{{ $item->nm_kelompok }}" required>
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

        <!-- Modal Tambah Kelompok-->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Kelompok</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/SimpanKelompok">
                            @csrf
                            <div id="form-container">
                                <div class="row mb-3 form-input" data-index="0">
                                    <div class="col-md-5">
                                        <label for="id_kelompok_0" class="form-label">ID Kelompok</label>
                                        <input type="text" class="form-control" id="id_kelompok_0"
                                            name="kelompok[0][id_kelompok]" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="nm_kelompok_0" class="form-label">Nama Kelompok</label>
                                        <input type="text" class="form-control" id="nm_kelompok_0"
                                            name="kelompok[0][nm_kelompok]" required>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger remove-form-btn">Hapus Form</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-success me-3" id="add-form-btn">Tambah Form</button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                        <script>
                            document.getElementById('add-form-btn').addEventListener('click', function() {
                                let formContainer = document.getElementById('form-container');
                                let formCount = document.querySelectorAll('.form-input').length;

                                let newForm = document.createElement('div');
                                newForm.classList.add('row', 'mb-3', 'form-input');
                                newForm.setAttribute('data-index', formCount);

                                newForm.innerHTML = `
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="id_kelompok_${formCount}" name="kelompok[${formCount}][id_kelompok]" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="nm_kelompok_${formCount}" name="kelompok[${formCount}][nm_kelompok]" required>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger remove-form-btn">Hapus Form</button>
                                    </div>
                                `;
                                formContainer.appendChild(newForm);
                                attachRemoveEvent(newForm);
                            });

                            function attachRemoveEvent(form) {
                                form.querySelector('.remove-form-btn').addEventListener('click', function() {
                                    form.remove();
                                });
                            }

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
                <li class="page-item {{ $kelompok->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $kelompok->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $kelompok->lastPage(); $i++)
                    <li class="page-item {{ $i == $kelompok->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kelompok->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $kelompok->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $kelompok->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
