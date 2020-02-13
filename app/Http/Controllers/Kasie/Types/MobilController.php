<?php

namespace App\Http\Controllers\Kasie\Types;

use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class MobilController extends Controller
{
    public function dataTableMobilKoe()
    {
        $mobilkoe = DB::table('types')->join('premis', function ($join) {
                    $join->on('types.id', '=', 'premis.type_id')->where('types.name', 'Mobil KOE');
                })->get();

        return Datatables::of($mobilkoe)->addColumn('action', function($row){
            return '
                    <button class="btn btn-xs btn-danger btn-delete" data-remote="https://bumida1967.site/kasie/hapus/type/premi/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                    <a href="http://Bumiputera.test/public/kasie/formulir/edit-data/'.$row->id.'" class="btn btn-xs btn-primary"/>Edit</a>
                ';
            })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }
    public function index()
    {
        /**
         * suplai json kedalam view
         */
        return view('kasie.types.content.mobil');
    }

    public function create()
    {
        /**
         * tampilkan form tambah type dan premi baru
         */

         return view('kasie.premis.mobil.create');
    }
}
