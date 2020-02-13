<?php

namespace App\Http\Controllers\Staff\Polis;

use PDF;
use App\Poli;
use App\Pengajuan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PolisController extends Controller
{
    public function jsonCetakPolis()
    {
        $cetakPolis = Pengajuan::with('type', 'user')->where('status', 'verifikasi pembayaran')->get();

        return Datatables::of($cetakPolis)
                    ->addColumn('action', function($row){
                    return '
                            <a href="http://Bumiputera.test/public/staff/cetak/polis/'.$row->id.'" class="btn btn-xs btn-primary btn-sm"/>Cetak Polis</a>
                        ';
        })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }

    public function index()
    {
        /**
         * tampung json cetakPolis kedalam dataTables
         */
        return view('staff.pengajuan.verifikasiPembayaran.index');
    }
    public function cetakPolis($id)
    {
        $polis = Poli::with('pengajuan')->find($id);

        $pdf = PDF::loadView('staff.cetak.polis.polis', compact('polis'))->setPaper('a4', 'portrait');
        return $pdf->stream('polis.pdf');
    }
}
