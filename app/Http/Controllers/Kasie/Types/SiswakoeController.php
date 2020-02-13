<?php

namespace App\Http\Controllers\Kasie\Types;

use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class SiswakoeController extends Controller
{
    public function dataTableSiswaMahasiwaKoe()
    {
        $siswamahaiswaKoe = DB::table('types')->join('premis', function ($join) {
                    $join->on('types.id', '=', 'premis.type_id')->where('types.name', 'Siswa / Mahasiswa KOE');
                })->get();

        return Datatables::of($siswamahaiswaKoe)->addColumn('action', function($row){
            return '
                    <button class="btn btn-xs btn-danger btn-delete" data-remote="http://Bumiputera.test/public/kasie/hapus/type/premi/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                    <a href="http://Bumiputera.test/public/kasie/formulir/edit-data/'.$row->id.'" class="btn btn-xs btn-primary"/>Edit</a>
                ';
            })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }
    public function index()
    {
        /**
         * tampung semua json kedalam view
         */
        return view('kasie.types.content.siswa');
    }
    public function create()
    {
        /**
         * tampilkan form tambah data type dan premi baru
         */
        return view('kasie.premis.siswa.create');
    }
}
