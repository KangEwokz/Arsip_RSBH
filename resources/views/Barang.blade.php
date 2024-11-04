@extends('master')

@section('konten')
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-title h5">Detail Barang</p>
                <div>
                    <a href="/TambahBarang" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
            </div>

            <!-- Form Pencarian -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <form method="GET" action="{{ url()->current() }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nama Barang atau ID Barang" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <form method="GET" action="{{ url()->current() }}">
                        <div class="input-group">
                            <select class="form-select" name="klasifikasi" onchange="this.form.submit()">
                                <option value="" disabled selected>Pilih Klasifikasi</option>
                                @foreach ($klasifikasis as $klasifikasi)
                                    <option value="{{ $klasifikasi->id_klasifikasi }}" {{ request('klasifikasi') == $klasifikasi->id_klasifikasi ? 'selected' : '' }}>
                                        {{ $klasifikasi->nm_klasifikasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary bg-gradient text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Kelompok</th>
                        <th>Klasifikasi</th>
                        <th>Tanggal Pembelian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($JenisBarang as $index => $item)
                        <tr class="text-center">
                            <td>{{ $JenisBarang->firstItem() + $index }}</td>
                            <td>{{ $item->id_barang }}{{ $item->id_klasifikasi }}{{ $item->id_kelompok }}-{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('Y') }}</td>
                            <td>{{ $item->nm_barang }}</td>
                            <td>{{ $item->nm_satuan }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->nm_kelompok }}</td>
                            <td>{{ $item->nm_klasifikasi }}</td>
                            <td>{{ $item->tanggal_pembelian }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#editBarangModal{{ $item->id_barang }}">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="/HapusBarang/{{ $item->id_barang }}" class="btn btn-outline-danger btn-xs"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit Barang -->
                        <div class="modal fade" id="editBarangModal{{ $item->id_barang }}" tabindex="-1"
                            aria-labelledby="editBarangModalLabel{{ $item->id_barang }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered custom-modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editBarangModalLabel{{ $item->id_barang }}">Edit Barang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/UpdateBarang/{{ $item->id_barang }}">
                                            @csrf
                                            <div id="form-container">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="id_barang" class="form-label">ID Barang</label>
                                                        <input type="text" class="form-control" id="id_barang"
                                                            name="id_barang" value="{{ $item->id_barang }}" required
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="nm_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nm_barang"
                                                            name="nm_barang" value="{{ $item->nm_barang }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="id_kelompok" class="form-label">ID Kelompok</label>
                                                        <select class="form-select" id="id_kelompok" name="id_kelompok"
                                                            required>
                                                            <option value="" disabled>Pilih ID Kelompok</option>
                                                            @foreach ($kelompok as $kelompokItem)
                                                                <option value="{{ $kelompokItem->id_kelompok }}"
                                                                    {{ old('id_kelompok', $item->id_kelompok) == $kelompokItem->id_kelompok ? 'selected' : '' }}>
                                                                    {{ $kelompokItem->nm_kelompok }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="id_satuan" class="form-label">ID Satuan</label>
                                                        <select class="form-select" id="id_satuan" name="id_satuan"
                                                            required>
                                                            <option value="" disabled>Pilih ID Satuan</option>
                                                            @foreach ($satuans as $satuan)
                                                                <option value="{{ $satuan->id_satuan }}"
                                                                    {{ old('id_satuan', $item->id_satuan) == $satuan->id_satuan ? 'selected' : '' }}>
                                                                    {{ $satuan->nm_satuan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" value="{{ $item->jumlah }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" id="harga"
                                                            name="harga" value="{{ $item->harga }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="id_klasifikasi" class="form-label">ID Klasifikasi</label>
                                                        <select class="form-select" id="id_klasifikasi"
                                                            name="id_klasifikasi" required>
                                                            <option value="" disabled>Pilih ID Klasifikasi</option>
                                                            @foreach ($klasifikasis as $klasifikasi)
                                                                <option value="{{ $klasifikasi->id_klasifikasi }}"
                                                                    {{ $item->id_klasifikasi == $klasifikasi->id_klasifikasi ? 'selected' : '' }}>
                                                                    {{ $klasifikasi->nm_klasifikasi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                                                        <input type="date" class="form-control" id="tanggal_pembelian"
                                                            name="tanggal_pembelian"
                                                            value="{{ $item->tanggal_pembelian }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary me-3"
                                                    data-bs-dismiss="modal">Close</button>
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
        <style>
            .custom-modal-lg {
                max-width: 1500px;
            }
        </style>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $JenisBarang->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $JenisBarang->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $JenisBarang->lastPage(); $i++)
                    <li class="page-item {{ $i == $JenisBarang->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $JenisBarang->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $JenisBarang->currentPage() == $JenisBarang->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $JenisBarang->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
