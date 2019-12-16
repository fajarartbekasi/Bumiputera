<?php

namespace App\Http\Controllers\Kasie\Types;

use App\Type;
use App\Premi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidasiController extends Controller
{
    public function store(Request $request)
    {
        /**
         * simpan type kedalam database
         */
        $type = Type::create([
            'code_premi' => $request->code_premi,
            'name'       => $request->name,
            'manfaat'    => $request->manfaat,
            'description'=> $request->description,
        ]);
        /**
         * jika type tersimpan
         * lakukan proses simpan data premi kedalam database
         */
        Premi::create([
            'type_id'      => $type->id,
            'price'        => $request->price,
            'premi_1'      => $request->premi_1,
            'premi_2'      => $request->premi_2,
            'premi_3'      => $request->premi_3,
            'premi_4'      => $request->premi_4,
            'premi_5'      => $request->premi_5,
            'premi_6'      => $request->premi_6,
            'premi_7'      => $request->premi_7,
            'premi_8'      => $request->premi_8,
            'cost_premi'   => $request->cost_premi
        ]);

        flash()->success('Data premi telah berhasil ditambahkan.');

        return redirect()->back();
    }
    public function edit($id)
    {
        /**
         * ambil data types berdasarkan id types
         */
        $type =  Type::find($id);

        // dd($type);
        /**
         * tampung semua data types kedalam view
         */
        return view('kasie.premis.edit', compact('type'));

    }
    public function update(Request $request, $id)
    {
        /**
         * temukan type dengan parameter id
         */
        $type = Type::where('id', $id)->first();
        /**
         * kirim permintaan dari form input
         */
        $type->name = $request->input('name');
        $type->manfaat = $request->input('manfaat');
        $type->description = $request->input('description');
        /**
         * jika type di simpan kedalam database
         */
        if($type->save())
        {
            /**
             * cari premi berdasarakan type id
             */
            $premi = Premi::where('type_id', $id)->first();
            /**
             * kirim permintaan dari form input
             */
            $premi->type_id     = $type->id;
            $premi->price       = $request->input('price');
            $premi->premi_1     = $request->input('premi_1');
            $premi->premi_2     = $request->input('premi_2');
            $premi->premi_3     = $request->input('premi_3');
            $premi->premi_4     = $request->input('premi_4');
            $premi->premi_5     = $request->input('premi_5');
            $premi->premi_6     = $request->input('region_6');
            $premi->premi_7     = $request->input('region_7');
            $premi->premi_8     = $request->input('region_8');
            $premi->cost_premi  = $request->input('cost_premi');
            /**
             * simpan kedalam database
             */
            $premi->save();
        }
        /**
         * notifikasi jika berhasil
         */
        flash()->success('premi telah berhasil di perbaharui');
        /**
         * direct kembali ke form edit data type
         */
        return redirect()->back();
    }
    public function destroy($id)
    {
        /**
         * temukan type dengan parameter id
         */
        $type = Type::find($id);
        /**
         * jika data ditemukan hapus data dari table
         */
        if($type->delete())
        {
            /**
             * temukan data premi dengan parameter id
             */
            $premi = Premi::where('type_id', $id)->first();
            /**
             * hapus data premi
             */
            $premi->delete();
        }
        /**
         * notifikasi berhasil menghapus dua table
         */
        flash()->success('premi berhasil dihapus');
        /**
         * kembali ke halaman type
         */
        return redirect()->back();
    }
}
