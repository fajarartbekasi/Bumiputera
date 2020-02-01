<?php

namespace App\Http\Controllers\Kasie\Data\Permintaan;

use App\Pengajuan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PermintaanController extends Controller
{
    public function jsonStatusWaittingList()
    {
        $dataPengajuan = Pengajuan::with('type', 'user')
                                   ->where('status', 'waitting list')
                                   ->get();
        return Datatables::of($dataPengajuan)
                    ->addColumn('action', function($row){
                        return '
                                <button class="btn btn-xs btn-danger btn-delete btn-sm" data-remote="https://bumida1967.site/formulir/hapus/premis/' . $row->id . '">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    Delete
                                </button>
                                <a href="https://bumida1967.test/kasie/cek/detail/informasi/penutupan/status/waitting-list/'.$row->id.'" class="btn btn-xs btn-primary btn-sm"/>Show</a>
                            ';
                        })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }
    public function index()
    {
        /**
         * tampung semua data json pengajuan dengan status waitting list
         */
        return view('kasie.data.index');
    }
    public function show($id)
    {
        /**
         * temukan data pengajuan baru berdasarkan paramater id
         */
        $pengajuan = Pengajuan::find($id);
        /**
         * tampung kedalam view
         */
        return view('kasie.pengajuan.show', compact('pengajuan'));
    }
    public function update(Request $request, $id)
    {
        /**
         * temukan pengajuan dengan type dan user berdasarkan parameter id
         */
        $pengajuan = Pengajuan::with('type','user')->find($id);
        /**
         * jika ada upate status pengajuan customer
         * menjadi pengajuan polis
         */

        $pengajuan->update(['status' => 'pengajuan polis']);
        /**
         * notifikasi jika berhasil
         */

        flash()->success('status pengajuan asuransi telah diperbarui terimakasih');
        /**
         * kembali ke halaman sebelumnya
         */
        return redirect()->back();
    }
}
