<?php

namespace App\Http\Controllers\Customers;

use App\Payment;
use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function create($id)
    {
        /**
         * temukan pengajuan dengan parameter id
         */
        $pembayaran = Pengajuan::find($id);

        /**
         * tampilkan kedalam view
         */
       return view('customers.pembayaran.edit', compact('pembayaran'));
    }
    public function update(Request $request, $id)
    {
        /**
         * validasi data
         */
        $this->validate($request,[
            'berkas'            => 'required|max:10000',
        ]);
        /**
         * cari pengajuan dengan parameter id
         */
        $pengajuan = Pengajuan::where('id', $id)->firstOrFail();
        /**
         * validasi file upload
         */
        if ($request->hasFile('berkas')) {
            foreach ($request->file('berkas') as $customer) {
                $name = $customer->getClientOriginalName();
                $customer->move(public_path() . '/berkas/', $name);
                $data[] = $name;
            }
        }

        /**
         * simpan pembayaran baru
         */
        $payment = Payment::create([
            'user_id'       => $pengajuan->user_id,
            'pengajuan_id'  => $pengajuan->id,
            'berkas'        => $name,
        ]);
        /**
         * notifikasi berhasil
         */
        flash()->success('Terimakasih telah melakukan verifikasi pembayaran anda. permintaan anda telah selesai terimakasih.');

        return redirect()->back();

    }
}
