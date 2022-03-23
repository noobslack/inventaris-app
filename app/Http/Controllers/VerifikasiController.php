<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Illuminate\Http\Request;


class VerifikasiController extends Controller
{
    public function verification(){
        $data = [
            'dataInventaris' => Verifikasi::with('inventaris')->get()
        ];
        return view('verifikasi.index', $data);
    }

    public function detail(inventaris $inventaris){
        $data = [
            'dataInventaris' => $inventaris->load('verifikasi'),
            'ruangan' => Ruangan::all()
        ];


        return view('verifikasi.detail', $data);
    }
    public function confirm(inventaris $inventaris){
        
        $inventaris->verifikasi()->update([
            'status' => 'Terverifikasi'
        ]);

        return redirect()->route('verifikasi.index');

    
    }

    public function decline(inventaris $inventaris){
            
        $inventaris->verifikasi()->update([
            'status' => ''
        ]);

        return redirect()->route('verifikasi.index');
    }
}