<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanModel;
use App\Models\InventoriModel;

class SatuanModelController extends Controller
{
    public function Satuan() {
      
        $Inventori = InventoriModel::count();
        $satuan = SatuanModel::paginate(5);
        
        return view('Satuan', compact('satuan', 'Inventori'));
    }
    
    // Menyimpan data klasifikasi baru
    public function simpanSatuan(Request $request) {
        foreach ($request->satuan as $data) {
            SatuanModel::create([
                'id_satuan' => $data['id_satuan'],
                'nm_satuan' => $data['nm_satuan'],
            ]);
        }

        return redirect('/Satuan')->with('success', 'Data berhasil disimpan!');
    }

    public function updateSatuan(Request $request, $id_satuan) {
        $JenisSatuan = SatuanModel::find($id_satuan);
        $JenisSatuan->update([
            'id_satuan' => $request->id_satuan,
            'nm_satuan' => $request->nm_satuan,
        ]);

        return redirect('/Satuan')->with('success', 'Data berhasil diperbarui.');
    }

    public function hapusSatuan($id_satuan) {
        $Satuan = SatuanModel::where('id_satuan', $id_satuan)->firstOrFail();
        $Satuan->delete();

        return redirect('/Satuan')->with('success', 'Data berhasil dihapus!');
    }
}
