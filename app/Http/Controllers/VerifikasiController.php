<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Illuminate\Http\Request;


class VerifikasiController extends Controller
{
    public function verification(){
        $this->authorize('verif');
        $data = [
            'dataInventaris' => Verifikasi::with('inventaris')->get()
        ];
        return view('verifikasi.index', $data);
    }

    public function detail(inventaris $inventaris){
        $this->authorize('verif');
        $data = [
            'dataInventaris' => $inventaris->load('verifikasi'),
            'ruangan' => Ruangan::all()
        ];


        return view('verifikasi.detail', $data);
    }
    public function confirm(inventaris $inventaris){
        $this->authorize('verif');
        $inventaris->verifikasi()->update([
            'status' => 'Terverifikasi'
        ]);

        return redirect()->route('verifikasi.index');

    
    }

    public function decline(inventaris $inventaris , Request $request){
        $this->authorize('verif');
        
        if($inventaris->verifikasi->status === 'Ditolak'){
            return redirect()->back()->with('error', "Tidak bisa merubah data");
        }

        $inventaris->verifikasi()->update([
            'status' => 'Ditolak',
            'alasan' => $request->alasan
        ]);

        

        return redirect()->route('verifikasi.index')->with('success', "Data Berhasil Disetujui");
    }
}