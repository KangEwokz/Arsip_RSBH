@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Klasifikasi Details</p>
                <div>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        <th>ID Klasifikasi</th>
                        <th>Nama Klasifikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klasifikasi as $index => $item)
                        <tr class="text-center">
                            <td>{{ $klasifikasi->firstItem() + $index }}</td>
                            <td>{{ $item->id_klasifikasi }}</td>
                            <td>{{ $item->nm_klasifikasi }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id_klasifikasi }}">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="/HapusKlasifikasi/{{ $item->id_klasifikasi }}"
                                    class="btn btn-outline-danger btn-xs"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit Klasifikasi -->
                        <div class="modal fade" id="editModal{{ $item->id_klasifikasi }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $item->id_klasifikasi }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $item->id_klasifikasi }}">Edit
                                            Klasifikasi
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/UpdateKlasifikasi/{{ $item->id_klasifikasi }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="id_klasifikasi" class="form-label">ID Klasifikasi</label>
                                                    <input type="text" class="form-control" id="id_klasifikasi"
                                                        name="id_klasifikasi" value="{{ $item->id_klasifikasi }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nm_klasifikasi" class="form-label">Nama Klasifikasi</label>
                                                    <input type="text" class="form-control" id="nm_klasifikasi"
                                                        name="nm_klasifikasi" value="{{ $item->nm_klasifikasi }}" required>
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

        <!-- Modal Insert Klasifikasi-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Klasifikasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/SimpanKlasifikasi">
                            @csrf
                            <div id="form-container">
                                <div class="row mb-3 form-input" data-index="0">
                                    <div class="col-md-5">
                                        <label for="id_klasifikasi_0" class="form-label">ID Klasifikasi</label>
                                        <input type="text" class="form-control" id="id_klasifikasi_0"
                                            name="klasifikasi[0][id_klasifikasi]" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="nm_klasifikasi_0" class="form-label">Nama Klasifikasi</label>
                                        <input type="text" class="form-control" id="nm_klasifikasi_0"
                                            name="klasifikasi[0][nm_klasifikasi]" required>
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
                            document.getElementById('add-form-btn').addEventListener('click', function() {
                                let formContainer = document.getElementById('form-container');
                                let formCount = document.querySelectorAll('.form-input').length;

                                let newForm = document.createElement('div');
                                newForm.classList.add('row', 'mb-3', 'form-input');
                                newForm.setAttribute('data-index', formCount);

                                newForm.innerHTML = `
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="id_klasifikasi_${formCount}" name="klasifikasi[${formCount}][id_klasifikasi]" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="nm_klasifikasi_${formCount}" name="klasifikasi[${formCount}][nm_klasifikasi]" required>
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
                <li class="page-item {{ $klasifikasi->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $klasifikasi->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $klasifikasi->lastPage(); $i++)
                    <li class="page-item {{ $i == $klasifikasi->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $klasifikasi->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $klasifikasi->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $klasifikasi->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection
