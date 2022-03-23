<?php

namespace App\Exports;

use App\Models\inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class InventarisExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      
        $inventaris = inventaris::whereHas('verifikasi',function($query){
            $query->where('status','Terverifikasi');
        })->get();
        if(count ($inventaris)=== 0){
            abort(500);
        }
        return collect([
            $this->dataInventars($inventaris)
        ]);

        
    }
    public function headings(): array {
        return [
            'no',
            'Kode Barang' ,
            'Nama Barang',
            'Merk/Type',
            'Bahan',
            'Asal-Usul',
            'Tahun Perolehan',
            'Ukuran',
            'Satuan',
            'Kondisi',
            'Jumlah',
            'Harga',
            'Keterangan'
        ];
    }
    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->setAllBorders('thin')->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            }
        ];
    }
    public function dataInventars($model)
    {
        foreach ($model as $key =>$inventaris) {
            $data[$key]['no'] = $key + 1;
            $data[$key]['kode_barang'] =$inventaris->kode_barang;
            $data[$key]['nama_barang'] =$inventaris->nama_barang;
            $data[$key]['merk_type'] =$inventaris->merk_type;
            $data[$key]['bahan'] =$inventaris->bahan;
            $data[$key]['asalusul'] =$inventaris->asalusul;
            $data[$key]['tahun_perolehan'] =$inventaris->tahun_perolehan;
            $data[$key]['ukuran'] =$inventaris->ukuran;
            $data[$key]['satuan'] = $inventaris->satuan;
            $data[$key]['kondisi'] =$inventaris->kondisi;
            $data[$key]['jumlah'] =$inventaris->jumlah;
            $data[$key]['harga'] =$inventaris->harga;
            $data[$key]['keterangan'] =$inventaris->keterangan;
        }

        return $data;
    }
}
