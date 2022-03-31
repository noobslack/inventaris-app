<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\inventaris;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role != 'admin') {
            $b = [
                'dataInventaris' => inventaris::whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->count(),

                'dataInventarisBaik' => inventaris::where('kondisi', 'Baik')->whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->count(),

                'dataInventarisRusakRingan' => inventaris::where('kondisi', 'Rusak Ringan')->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->swhereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->count(),

                'dataInventarisRusakBerat' => inventaris::where('kondisi', 'Rusak Berat')->whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->count(),

                'dataInventarisVerifikasi' => inventaris::whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->count(),

                'dataInventarisVerifikasiMenunggu' => inventaris::whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Menunggu');
                })->count(),

                'dataInventarisVerifikasiDitolak' => inventaris::whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Ditolak');
                })->count()

            ];
        } else {
            $b = [
                'dataInventaris' => inventaris::count(),
                'dataInventarisBaik' => inventaris::where('kondisi', 'Baik')->count(),
                'dataInventarisRusakRingan' => inventaris::where('kondisi', 'Rusak Ringan')->count(),
                'dataInventarisRusakBerat' => inventaris::where('kondisi', 'Rusak Berat')->count(),
                'dataInventarisVerifikasiMenunggu' => inventaris::whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Menunggu');
                })->count(),
                'dataInventarisVerifikasi' => inventaris::whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Terverifikasi');
                })->count(),
                'dataInventarisVerifikasiDitolak' => inventaris::whereHas('verifikasi', function ($query) {
                    $query->where('status', 'Ditolak');
                })->count()



            ];
        }



        return view('dashboard.dashboard', $b);
    }
    public function data()
    {
        if (auth()->user()->role != 'admin') {

            $data = [
                'dataInventaris' => inventaris::with(['ruangan'])->whereHas('verifikasi', function ($query) {
                    $query->where('verifikasis.status', 'Terverifikasi');
                })->whereHas('ruangan.bidang', function ($query) {
                    $query->where('id_bidang', auth()->user()->bidang->id);
                })->get()

            ];
        } else {
            $data = [
                'dataInventaris' => inventaris::with(['ruangan'])->whereHas('verifikasi', function ($query) {
                    $query->where('verifikasis.status', 'Terverifikasi');
                })->get()

            ];
        }

        // dd($data['dataInventaris']);
        // $dataInventaris = inventaris::all();

        return view('dashboard.tables', $data);
    }
}
