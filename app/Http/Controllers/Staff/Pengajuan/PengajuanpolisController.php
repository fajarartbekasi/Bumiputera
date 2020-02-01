<?php

namespace App\Http\Controllers\Staff\Pengajuan;

use App\Poli;
use App\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Mail\PengajuanpolisMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PengajuanpolisController extends Controller
{
    public function jsonPengajuanPolis()
    {
        $pengajuanPolis = Pengajuan::with('type', 'user')->where('status', 'pengajuan polis')->get();

        return Datatables::of($pengajuanPolis)
                    ->addColumn('action', function($row){
                        return '
                                <button class="btn btn-xs btn-danger btn-delete btn-sm" data-remote="https://bumida1967.site/formulir/hapus/premis/' . $row->id . '">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    Delete
                                </button>
                                <a href="https://bumida1967.site/staff/cek/detail/pengajuan/polis/'.$row->id.'" class="btn btn-xs btn-primary btn-sm"/>Show</a>
                            ';
                        })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }
    public function index()
    {
        /**
         * tampung json pngajuan polis kedalam view
         */
        return view('staff.pengajuan.index');
    }
    public function show($id)
    {
        /**
         * cari pengajuan polis berdasarkan id
        */
        $pengajuanPolis = Pengajuan::with('type', 'user')->find($id);
        /**
         * tampilkan kedalam view
         */
        return view('staff.pengajuan.show', compact('pengajuanPolis'));
    }
    public function update(Request $request, $id)
    {
        /**
        * temukan pengajuan berdasarkan id
        */
        $pengajuanPolis = Pengajuan::with('user')->find($id);

        /**
         * jika data ditemukan update status pengajuan menjadi
         * verifikasi pembayaran
         */
        if ($pengajuanPolis->update(['status'=>'verifikasi pembayaran'])) {
            /**
             * jika pengajuan sudah di update
             * buat polis baru berdasarkan id pengajuan sebelumnya
             * buat nomor polis
             */
           $polis = Poli::create(
               [
                   'pengajuan_id'      => $pengajuanPolis->id,
                   'code_polis'        => polisNumber(),
                ]
            );
        }

        /**
         * kirim notifikasi ke email customer
         */

        $to = Mail::to($pengajuanPolis->user->email)->send(new PengajuanpolisMail($pengajuanPolis));
        /**
         * notifikasi jika semua telah di berhasil dilakukan
         */
        flash()->success('pengajuan sudah diterima, anda dapat melakukan cetak  polis');
        /**
         * kembali kehalaman sebelumnya
         */
        return redirect()->back();
    }
}
