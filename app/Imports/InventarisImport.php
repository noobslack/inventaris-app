<?php

namespace App\Imports;

use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class InventarisImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            'id_ruangan' => 'required',
            'kode_barang' => 'required|unique:inventaris,kode_barang',
            'nama_barang' => 'required',
            'merk_type' => 'required',
            'bahan' => 'required',
            'asalusul' => 'required',
            'tahun_perolehan' => 'required',
            'ukuran' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ])->validate();

        foreach ($rows as $row) {



            $ruangan = Ruangan::where('nama_ruangan', $row['ruangan'])->first();

            $inventaris = inventaris::create([
                //
                'kode_barang' => $row['kode_barang'],
                'id_ruangan' => $ruangan->id,
                'nama_barang' => $row['nama_barang'],
                'merk_type' => $row['merk_type'],
                'bahan' => $row['bahan'],
                'asalusul' => $row['asalusul'],
                'tahun_perolehan' => $row['tahun_perolehan'],
                'ukuran' => $row['ukuran'],
                'satuan' => $row['satuan'],
                'kondisi' => $row['kondisi'],
                'jumlah' => $row['jumlah'],
                'harga' => $row['harga'],
                'keterangan' => $row['keterangan']
            ]);
            Verifikasi::create([
                'id_inventaris' => $inventaris->id
            ]);
        }
    }
}
