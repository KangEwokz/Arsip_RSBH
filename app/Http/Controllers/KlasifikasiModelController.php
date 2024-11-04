<?php
// Controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KlasifikasiModel;
use App\Models\InventoriModel;
use App\Models\KelompokModel;
use Illuminate\Support\Facades\DB;

class KlasifikasiModelController extends Controller
{
    // Menampilkan daftar klasifikasi dengan pagination
    public function klasifikasi() {
        $Inventori = InventoriModel::count();
        $kelompok = KelompokModel::all();
        $klasifikasiBarang = KlasifikasiModel::all();
        $klasifikasi = KlasifikasiModel::paginate(5);

        return view('Klasifikasi', compact('klasifikasi', 'Inventori', 'kelompok', 'klasifikasiBarang'));
    }

    // Menyimpan data klasifikasi baru
    public function simpanKlasifikasi(Request $request) {
        foreach ($request->klasifikasi as $data) {
            KlasifikasiModel::create([
                'id_klasifikasi' => $data['id_klasifikasi'],
                'nm_klasifikasi' => $data['nm_klasifikasi'],
            ]);
        }

        return redirect('/Klasifikasi')->with('success', 'Data berhasil disimpan!');
    }

    // Mengupdate data klasifikasi berdasarkan id
    public function updateKlasifikasi(Request $request, $id_klasifikasi) {
        $klasifikasiBarang = KlasifikasiModel::findOrFail($id_klasifikasi);
        $klasifikasiBarang->update([
            'id_klasifikasi' => $request->id_klasifikasi,
            'nm_klasifikasi' => $request->nm_klasifikasi,
        ]);

        return redirect('/Klasifikasi')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data klasifikasi berdasarkan id
    public function hapusKlasifikasi($id_klasifikasi) {
        $klasifikasi = KlasifikasiModel::where('id_klasifikasi', $id_klasifikasi)->firstOrFail();
        $klasifikasi->delete();

        return redirect('/Klasifikasi')->with('success', 'Data berhasil dihapus!');
    }
}
