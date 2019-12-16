<?php

namespace App\Http\Controllers\Staff\Report;

use PDF;
use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function periode(Request $request)
    {
        /**
         * cek kondisi pencarian
         * jika tgl_awal dan tgl_akhir cocok
         * cari berdasarkan status pengajuan polis
         * jika data tersebut ada ambil data tersebut
         */
        if ($request->has('tgl_awal')) {
            $pengajuan = Pengajuan::whereBetween('start_date', [request('tgl_awal'), request('tgl_akhir')])
                ->where('status', 'pengajuan polis')
                ->get();
        }
        /**
         * masukan kedalam pdf
         */
        $pdf = PDF::loadView('staff.report.pengajuan', compact('pengajuan'))->setPaper('a4', 'landscape');
        /**
         * tampilkan ke view
         */
        return $pdf->stream('laporan_pengajuan.pdf');
    }
}
