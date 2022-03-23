<?php

namespace App\Http\Controllers;

use App\Exports\InventarisExport;
use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
// use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;





class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'dataInventaris' => inventaris::with(['ruangan','verifikasi'])->get()
        ];
        // dd($data['dataInventaris']);
        // $dataInventaris = inventaris::all();
        
        return view('inventaris.tables', $data); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = [

            'ruangan' => Ruangan::all()


        ];



        return view('inventaris.forminventaris', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedata = $request->validate([
            'id_ruangan' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'merk_type' => 'required',
            'bahan' => 'required',
            'asalusul' => 'required',
            'tahun_perolehan' => 'required',
            'ukuran' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            
        ]);



        $inventaris = inventaris::create($validatedata);

        Verifikasi::create([
            'id_inventaris' => $inventaris->id
        ]);


        return redirect()->route('inventaris.index')->with('success', 'Data Berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(inventaris $inventaris)
    {
        //
        $data = [

            'inventaris' => $inventaris,
            'ruangan' => Ruangan::all()

        ];

        return view('inventaris.detailinventaris', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(inventaris $inventaris)
    {
        //
        $data = [

            'inventaris' => $inventaris,
            'ruangan' => Ruangan::all()

        ];

        return view('inventaris.editinventaris', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventaris $inventaris)
    {
        //
        $validatedata = $request->validate([
            'id_ruangan' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'merk_type' => 'required',
            'bahan' => 'required',
            'asalusul' => 'required',
            'tahun_perolehan' => 'required',
            'ukuran' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            
        ]);


        $validatedata['keterangan']= $request->keterangan;
        $inventaris->update($validatedata);




        return redirect()->route('inventaris.index')->with('success', 'Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventaris $inventaris)
    {
        //

        $inventaris->delete();



        return redirect()->route('inventaris.index')->with('delete', 'Data Berhasil dihapus');
    }

    public function export()
	{
		return FacadesExcel::download(new InventarisExport, 'inventaris.xlsx');
        
	}

}
