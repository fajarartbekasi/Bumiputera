<?php

namespace App\Http\Controllers\Kasie\Types;

use DB;
use App\Type;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class MotorkoeController extends Controller
{

    public function dataTableMotorKoe()
    {
        /**
         * ambil data dari types dan premis table
         * lalu suplie data tersebut kedalam dataTable
         */
        $hubungkanTypeDenganPremisTable = DB::table('types')->join('premis', function ($join) {
                    $join->on('types.id', '=', 'premis.type_id')->where('types.name', 'Motor KOE');
                })->get();

        /**
         * tampung semua data yang sudah difilter kedalam dataTable
         */
        return Datatables::of($hubungkanTypeDenganPremisTable)
                           ->addColumn('action', function($typePremis){
                    return '
                       <button class="btn btn-xs btn-outline-danger btn-delete" data-remote="https://bumida1967.site/kasie/hapus/type/premi/' . $typePremis->id . '">
                          <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z" fill="#dc3545"/>
                            </svg>
                          </i>
                          Delete
                       </button>
                       <a href="https://bumida1967.site/kasie/formulir/edit-data/'.$typePremis->id.'" class="btn btn-xs btn-primary"/>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                <path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/>
                            </svg>
                            Edit
                       </a>
                    ';
               })->editColumn('id', 'ID: @{{$id}}')
                 ->make(true);

    }
    public function index()
    {
        /**
         * tampung json kedalam view
         */
         return view('kasie.types.content.motor');
    }

    public function create()
    {
        /**
         * tampilkan form untuk menambahkan type dan premi baru
         */
        return view('kasie.premis.motor.create');
    }

}
