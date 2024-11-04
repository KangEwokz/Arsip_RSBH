@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Detail Inventori</p>
                <div>
                    <a href="/TambahInventori" class="btn btn-outline-success">
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
                        <th>ID Inventori</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Jenis</th>
                        <th>Klasifikasi</th>
                        <th>Kelompok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventori as $index => $item)
                        <tr class="text-center">
                            <td>{{ $inventori->firstItem() + $index }}</td>
                            <td>{{ $item->id_inventori }}</td>
                            <td>{{ $item->nm_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->nm_barang }}</td>
                            <td>{{ $item->nm_klasifikasi }}</td>
                            <td>{{ $item->id_kelompok }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id_inventori }}">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="/HapusInventori/{{ $item->id_inventori }}" class="btn btn-outline-danger btn-xs">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal untuk Edit Inventori -->
                        <div class="modal fade" id="editModal{{ $item->id_inventori }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $item->id_inventori }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-center" >
                                <div class="modal-content" >
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $item->id_inventori }}">Edit
                                            Inventori</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/UpdateInventori/{{ $item->id_inventori }}">
                                            @csrf
                                            <div id="form-container" class="border border-rounded p-3">
                                                <!-- Form Input Utama -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="id_inventori" class="form-label">ID Inventori</label>
                                                        <input type="text" class="form-control" id="id_inventori"
                                                            name="id_inventori" value="{{ $item->id_inventori }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="nm_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nm_barang"
                                                            name="nm_barang" value="{{ $item->nm_barang }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="id_jenis" class="form-label">ID Jenis</label>
                                                        <select class="form-select" id="id_jenis" name="id_jenis" required>
                                                            <option value="">Pilih Jenis</option>
                                                            @foreach ($jenis as $jenis_item)
                                                                <option value="{{ $jenis_item->id_jenis }}"
                                                                    {{ $jenis_item->id_jenis == $item->id_jenis ? 'selected' : '' }}>
                                                                    {{ $jenis_item->id_jenis }} - {{ $jenis_item->jns_barang }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="id_klasifikasi" class="form-label">ID Klasifikasi</label>
                                                        <select class="form-select" id="id_klasifikasi"
                                                            name="id_klasifikasi" required>
                                                            <option value="">Pilih Klasifikasi</option>
                                                            @foreach ($klasifikasi as $klasifikasi_item)
                                                                <option value="{{ $klasifikasi_item->id_klasifikasi }}"
                                                                    {{ $klasifikasi_item->id_klasifikasi == $item->id_klasifikasi ? 'selected' : '' }}>
                                                                    {{ $klasifikasi_item->id_klasifikasi }} - {{ $klasifikasi_item->nm_klasifikasi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                                        <input type="text" class="form-control" id="spesifikasi"
                                                            name="spesifikasi" value="{{ $item->spesifikasi }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" value="{{ $item->jumlah }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" id="harga"
                                                            name="harga" value="{{ $item->harga }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="status" class="form-label">Status</label>
                                                        <input type="text" class="form-control" id="status"
                                                            name="status" value="{{ $item->status }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center pt-4">
                                                <button type="submit" class="btn btn-primary">Simpan Data</button>
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

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $inventori->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $inventori->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $inventori->lastPage(); $i++)
                    <li class="page-item {{ $i == $inventori->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $inventori->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $inventori->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $inventori->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
