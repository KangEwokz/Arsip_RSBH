<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoriModel;
use App\Models\AssetModel;
use App\Models\DistribusiModel;
use App\Models\MutasiModel;

class DashboardController extends Controller
{
    public function dashboard() {

        $Inventori = InventoriModel::count();
        // $Asset = AssetModel::count();
        // $Distribusi = DistribusiModel::count();
        // $Mutasi = MutasiModel::count();

        return view('dashboard', compact('Inventori')); 
    }
}
