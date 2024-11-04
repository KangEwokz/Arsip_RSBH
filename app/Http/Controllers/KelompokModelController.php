<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokModel;
use App\Models\InventoriModel;
use Illuminate\Support\Facades\DB;

class KelompokModelController extends Controller
{
    // Menampilkan daftar kelompok dengan pagination
    public function kelompok() {
        $Inventori = InventoriModel::count();
        $kelompok = DB::table('tbl_kelompok')
            ->select('tbl_kelompok.*')
            ->paginate(5);

        return view('Kelompok', compact('kelompok', 'Inventori'));
    }

    // Menyimpan data kelompok baru
    public function simpanKelompok(Request $request) {
        foreach ($request->kelompok as $data) {
            KelompokModel::create([
                'id_kelompok' => $data['id_kelompok'],
                'nm_kelompok' => $data['nm_kelompok'],
            ]);
        }

        return redirect('/Kelompok')->with('success', 'Data berhasil disimpan!');
    }

    // Mengupdate data kelompok berdasarkan id
    public function updateKelompok(Request $request, $id_kelompok) {
        $kelompokBarang = KelompokModel::where('id_kelompok', $id_kelompok)->first();
        $kelompokBarang->update([
            'id_kelompok' => $request->id_kelompok,
            'nm_kelompok' => $request->nm_kelompok,
        ]);

        return redirect('/Kelompok')->with('success', 'Data berhasil diperbarui.');
    }

    // Mengupdate data kelompok berdasarkan id
    public function updateKelompok2(Request $request, $id_kelompok) {
        $kelompokBarang = KelompokModel::find($id_kelompok);
        $kelompokBarang->update([
            'nm_kelompok' => $request->nm_kelompok,
        ]);

        return redirect('/Klasifikasi')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data kelompok berdasarkan id
    public function hapusKelompok($id_kelompok) {
        $kelompok = KelompokModel::where('id_kelompok', $id_kelompok)->firstOrFail();
        $kelompok->delete();

        return redirect('/Kelompok')->with('success', 'Data berhasil dihapus!');
    }
}
