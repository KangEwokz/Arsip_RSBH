<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanModel;
use App\Models\KlasifikasiModel;
use App\Models\InventoriModel;
use App\Models\KelompokModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class BarangModelController extends Controller
{
    public function barang(Request $request)
{
    $Inventori = InventoriModel::count();
    $satuans = SatuanModel::all();
    $klasifikasis = KlasifikasiModel::all();
    $kelompoks = KelompokModel::all();
    $kelompok = KelompokModel::all();

    // Ambil parameter pencarian dan klasifikasi dari request
    $search = $request->input('search');
    $klasifikasiId = $request->input('klasifikasi');

    // Ambil parameter untuk pengurutan
    $sortColumn = $request->input('sort_column', 'tbl_barang.nm_barang'); // Kolom default untuk pengurutan
    $sortDirection = $request->input('sort_direction', 'asc'); // Arah pengurutan default

    // Query untuk mendapatkan data barang
    $query = DB::table('tbl_barang')
        ->join('tbl_satuan', 'tbl_barang.id_satuan', '=', 'tbl_satuan.id_satuan')
        ->join('tbl_klasifikasi', 'tbl_barang.id_klasifikasi', '=', 'tbl_klasifikasi.id_klasifikasi')
        ->join('tbl_kelompok', 'tbl_barang.id_kelompok', '=', 'tbl_kelompok.id_kelompok')
        ->select('tbl_barang.*', 'tbl_satuan.*', 'tbl_klasifikasi.*', 'tbl_kelompok.*');

    // Pencarian berdasarkan nama barang atau ID barang
    if ($search) {
        $query->where('tbl_barang.nm_barang', 'like', "%{$search}%")
              ->orWhere('tbl_barang.id_barang', 'like', "%{$search}%");
    }

    // Filter berdasarkan klasifikasi
    if ($klasifikasiId) {
        $query->where('tbl_barang.id_klasifikasi', $klasifikasiId);
    }

    // Mengatur urutan data
    $query->orderBy($sortColumn, $sortDirection);

    // Mendapatkan data dengan paginasi
    $JenisBarang = $query->paginate(5);

    return view('Barang', compact('Inventori', 'JenisBarang', 'klasifikasis', 'satuans', 'kelompoks', 'kelompok'));
}



    public function tambahBarang() {
        $Inventori = InventoriModel::count();
        $satuans = SatuanModel::all();
        $klasifikasis = KlasifikasiModel::all();
        $kelompoks = KelompokModel::all();
        $kelompok = KelompokModel::all();
    
        return view('JenisBarang.InsBarang', compact('Inventori', 'klasifikasis', 'satuans', 'kelompoks', 'kelompok'));
    }
    
    public function simpanBarang(Request $request) {
        foreach ($request->barang as $data) {
            // Mendapatkan ID Barang terakhir
            $lastItem = DB::table('tbl_barang')
                ->orderBy('id_barang', 'desc')
                ->first();
    
            // Menghasilkan ID Barang baru
            $newId = '001'; // Default value
            if ($lastItem) {
                $lastId = substr($lastItem->id_barang, 0, 3); // Ambil 3 digit pertama
                $newId = str_pad((intval($lastId) + 1), 3, '0', STR_PAD_LEFT);
            }
    
            // Menyimpan data barang ke dalam database
            DB::table('tbl_barang')->insert([
                'id_barang' => $newId,
                'nm_barang' => $data['nm_barang'],
                'id_satuan' => $data['id_satuan'],
                'id_kelompok' => $data['id_kelompok'],
                'jumlah' => $data['jumlah'],
                'harga' => $data['harga'],
                'id_klasifikasi' => $data['id_klasifikasi'],
                'tanggal_pembelian' => $data['tanggal_pembelian'],
            ]);
        }
    
        return redirect('/Barang')->with('success', 'Data berhasil disimpan!');
    }
    
    public function updateBarang(Request $request, $id_barang) {
        // Ambil barang yang akan diupdate
        $barang = DB::table('tbl_barang')->where('id_barang', $id_barang)->first();
    
        // Pastikan barang ditemukan
        if (!$barang) {
            return redirect('/Barang')->with('error', 'Data tidak ditemukan.');
        }
    
        // Update barang
        DB::table('tbl_barang')->where('id_barang', $id_barang)->update([
            'nm_barang' => $request->nm_barang,
            'id_satuan' => $request->id_satuan,
            'id_kelompok' => $request->id_kelompok,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'id_klasifikasi' => $request->id_klasifikasi,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);
    
        return redirect('/Barang')->with('success', 'Data berhasil diperbarui.');
    }
    
    

    public function hapusBarang($id_barang) {
        DB::table('tbl_barang')->where('id_barang', $id_barang)->delete();

        return redirect('/Barang')->with('success', 'Data berhasil dihapus!');
    }
}
