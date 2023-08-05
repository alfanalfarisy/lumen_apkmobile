<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuaca;
use Illuminate\Http\Request;

class CuacaController extends Controller
{
    public function apiCuaca(Request $request)
    {
        // Mengambil data kab kota yang di request
        $kabKota = $request->kabkota;

        // Memparshing data ke model Cuaca untuk mendapatkan data cuaca
        $dataCuaca = Cuaca::kecamatanByKota($kabKota);

        // Menampilkan data dalam bentuk json
        return response()->json($dataCuaca);
    }
}