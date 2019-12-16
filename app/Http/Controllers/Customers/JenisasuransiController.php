<?php

namespace App\Http\Controllers\Customers;

use App\Type;
use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisasuransiController extends Controller
{
    public function index()
    {
        /**
        *ambil semua data type
        */
        $types =  Type::all();
        /**
         * tampung data type kedalam view
         */
        return view('customers.jenisPremi.index', compact('types'));
    }
    public function create($id)
    {
        /**
         * temukan type/premi dengan parameter id
         */
        $type = Type::find($id);
         /**
          * lakukan pengecekan formulir apa yang diminta
          */

        if($type->name == 'Motor KOE'){
           /**
            * jika formulir yang diminta dengan kategori motor koe
            */
            $premisMotor = Type::with('premis')->where('name', 'Motor KOE')->get();
            /**
             * tampilkan form motor koe
             */
            return view('customers.ajukanPremi.motor', compact('type','premisMotor'));

        }elseif($type->name == 'Mobil KOE'){
            /**
             * jika yang diminta formulir dengan kategori mobil koe
             */
            $premisMobil = Type::with('premis')->where('name', 'Mobil KOE')->get();
            /**
             * tampilkan formulir mobil koe
             */
            return view('customers.ajukanPremi.mobil', compact('type','premisMobil'));

        }elseif($type->name == 'Siswa / Mahasiswa KOE'){
            /**
             * jika yang diminta formulir dengan kategori siswa / mahasiswa koe
             */
            $premisSiswa = Type::with('premis')->where('name', 'Siswa / Mahasiswa KOE')->get();
            /**
             * tampilkan formulir
             */
            return view('customers.ajukanPremi.siswa', compact('type','premisSiswa'));

        }
    }
    public function store(Request $request, $id)
    {   /**
         *Temukan type dengan parameter id
         */
        $type = Type::find($id);

        /**
         * jika ditemukan lakukan foreach
         */
            if ($request->hasFile('berkas')) {
                foreach ($request->file('berkas') as $customer) {
                    $name = $customer->getClientOriginalName();
                    $customer->move(public_path() . '/berkas/', $name);
                    $data[] = $name;
                }
            }
            $pengajuan = new Pengajuan();
            $pengajuan->berkas = json_encode($data);
            $pengajuan->user_id                               = auth()->user()->id;
            $pengajuan->type_id                               = $type->id;
            $pengajuan->merek                                 = $request->input('merek');
            $pengajuan->jenis                                 = $request->input('jenis');
            $pengajuan->tahun                                 = $request->input('tahun');
            $pengajuan->no_polisi                             = $request->input('no_polisi');
            $pengajuan->no_rangka                             = $request->input('no_rangka');
            $pengajuan->no_mesin                              = $request->input('no_mesin');
            $pengajuan->no_rek                                = $request->input('no_rek');
            $pengajuan->harga_kendaraan                       = $request->input('harga_kendaraan');
            $pengajuan->harga_total_perlengkapan_non_standar  = $request->input('harga_total_perlengkapan_non_standar');
            $pengajuan->rincian                               = $request->input('rincian');
            $pengajuan->paket                                 = $request->input('paket');
            $pengajuan->start_date                            = $request->input('start_date');
            $pengajuan->end_date                              = $request->input('end_date');
            $pengajuan->created_place                         = $request->input('created_place');
            $pengajuan->nama_agen                             = $request->input('nama_agen');
            $pengajuan->institusi                             = $request->input('institusi');
            $pengajuan->total_peserta                         = $request->input('total_peserta');
            $pengajuan->premi                                 = $request->input('premi');
            $pengajuan->biaya_polis                           = $request->input('biaya_polis');
            $pengajuan->biaya_materai                         = $request->input('biaya_materai');
            $pengajuan->status                                = $request->input('status');
            /**
             * simpan data kedalam database
             */
            $pengajuan->save();
            /**
             * notifikasi jika data berhasil disimpan
             */
            flash()->success('Permintaan anda telah diterima terimakasih');
            /**
             * kembali kehalam sebelumnya
             */
            return redirect()->back();
    }
}
