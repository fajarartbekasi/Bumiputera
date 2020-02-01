<?php

namespace App\Http\Controllers\Kasir;

use PDF;
use App\Payment;
use App\Pengajuan;
use NumberFormatter;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\Kasir\Export\Pembayaran\PembayaranExport;

class PembayaranController extends Controller
{
    public function jsonPembayaran()
    {
        $pembayaran = Payment::with('pengajuan', 'user')->get();

        return Datatables::of($pembayaran)
                         ->addColumn('action', function($row){
            return '
                    <a href="https://bumida1967.test/kasir/cek/details/informasi/pembayaran/pengajuan/'.$row->id.'" class="btn btn-xs btn-primary btn-sm"/>Show</a>
                ';
            })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }
    public function index()
    {
        /**
         * tampung json pembayaran kedalam dataTable
         */
        return view('kasir.pembayaran.index');
    }
    public function show($id)
    {
        /**
         * temukan pembayaran dengan pengajuan dan user
         * dengan parameter id
         */
        $payment = Payment::with('pengajuan','user')->find($id);
        /**
         * tampilkan kedalam view
         */
        return view('kasir.pembayaran.show', compact('payment'));
    }
    public function cetakKwitansi($id)
    {
        $pengajuan = Pengajuan::find($id);

        $convert = new \NumberFormatter("id", \NumberFormatter::SPELLOUT);

        $pdf = PDF::loadView('kasir.pembayaran.kwitansi', compact('pengajuan','convert'))->setPaper('a4', 'landscape');
        return $pdf->stream('kwitansi_pembayaran.pdf');
    }
    public function export()
    {
        return Excel::download(new PembayaranExport,'data_pengajuan.xlsx');
    }
}
