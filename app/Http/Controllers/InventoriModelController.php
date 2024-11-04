<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisModel;
use App\Models\KlasifikasiModel;
use App\Models\InventoriModel;
use Illuminate\Support\Facades\DB;

class InventoriModelController extends Controller
{
    public function inventori() {

        $Inventori = InventoriModel::count();
        $jenis = JenisModel::all();
        $klasifikasi = DB::table('tbl_klasifikasi')
        ->join('tbl_kelompok', 'tbl_klasifikasi.id_kelompok', '=', 'tbl_kelompok.id_kelompok')
        ->select('tbl_kelompok.*', 'tbl_klasifikasi.*')
        ->get();
        
        $inventori = DB::table('tbl_inventori')
            ->join('tbl_jenis', 'tbl_inventori.id_jenis', '=', 'tbl_jenis.id_jenis')
            ->join('tbl_klasifikasi', 'tbl_inventori.id_klasifikasi', '=', 'tbl_klasifikasi.id_klasifikasi')
            ->select('tbl_inventori.*', 'tbl_jenis.*', 'tbl_klasifikasi.*')
            ->paginate(5);

        return view('InventoriBarang.inventori', compact('inventori','Inventori','jenis','klasifikasi'));
    }

    public function tambahInventori() {
        
        $Inventori = InventoriModel::count();
        $jenis = JenisModel::all();
        $klasifikasi = DB::table('tbl_klasifikasi')
        ->join('tbl_kelompok', 'tbl_klasifikasi.id_kelompok', '=', 'tbl_kelompok.id_kelompok')
        ->select('tbl_kelompok.*', 'tbl_klasifikasi.*')
        ->get();
        
        return view('InventoriBarang.InsInventori', compact('jenis', 'klasifikasi','Inventori'));
    }

    public function simpanInventori(Request $request) {
        foreach ($request->inventori as $data) {
            
            $idKelompok = KlasifikasiModel::where('id_klasifikasi', $data['id_klasifikasi'])->value('id_kelompok');
            $id_inventori = "{$data['id_jenis']}-{$idKelompok}-{$data['id_klasifikasi']}";
    
            InventoriModel::create([
                'id_inventori' => $id_inventori, 
                'nm_barang' => $data['nm_barang'],
                'id_jenis' => $data['id_jenis'],
                'id_klasifikasi' => $data['id_klasifikasi'],
                'spesifikasi' => $data['spesifikasi'],
                'jumlah' => $data['jumlah'],
                'harga' => $data['harga'],
                'status' => $data['status'],
            ]);
        }
    
        return redirect('/Inventori')->with('success', 'Data berhasil disimpan!');
    }
    
    

    public function editInventori($id_inventori) {

        $klasifikasi = KlasifikasiModel::all();
        $jenis = JenisModel::all();
        $Inventori = InventoriModel::count();
        $inventori = DB::table('tbl_inventori')->where('id_inventori', $id_inventori)->first();
        return view('InventoriBarang.EditInventori', compact('inventori','Inventori','jenis','klasifikasi'));
    }

    public function updateInventori(Request $request, $id_inventori) {
        
        $inventori = InventoriModel::find($id_inventori);
        
        if (!$inventori) {
            return redirect('/Inventori')->with('error', 'Data tidak ditemukan.');
        }
    
        $idKelompok = KlasifikasiModel::where('id_klasifikasi', $request->id_klasifikasi)->value('id_kelompok');
        $idInventori = "{$request->id_jenis}-{$idKelompok}-{$request->id_klasifikasi}";
    
        $inventori->update([
            'id_inventori' => $idInventori, // Pastikan id_inventori diperbarui
            'nm_barang' => $request->nm_barang,
            'id_jenis' => $request->id_jenis,
            'id_klasifikasi' => $request->id_klasifikasi,
            'spesifikasi' => $request->spesifikasi,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);
    
        return redirect('/Inventori')->with('success', 'Data berhasil diperbarui.');
    }
    

    public function hapusInventori($id_inventori) {
        
        DB::table('tbl_inventori')->where('id_inventori', $id_inventori)->delete();

        return redirect('/Inventori')->with('success', 'Data berhasil dihapus!');
    }
}
