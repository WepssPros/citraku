<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();

        // Mengubah format data
        $formattedData = [
            'pasar' => [],
        ];

        foreach ($kecamatans as $kecamatan) {
            $koordinat = json_decode($kecamatan->koordinat); // Mengambil dan mendecode koordinat
            $formattedData['pasar'] = array_merge($formattedData['pasar'], $koordinat); // Menambahkan koordinat ke dalam array pasar
        }

        // Mengirim data ke view
        return view('pages.admin.dashboard', compact('formattedData','kecamatans'));
        
    }
}
