<?php

namespace App\Http\Controllers\Kasie\Invitation;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    public function jsonPetugas()
    {
        $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['customer ']);
        })->get();

        return Datatables::of($users)
                    ->addColumn('action', function($row){
                        return '

                                <a href="https://bumida1967.site/kasie/formulir/edit-data/user/'.$row->id.'" class="btn btn-xs btn-primary btn-sm"/>Edit</a>
                            ';
                        })->editColumn('id', 'ID: @{{$id}}')->make(true);
    }

    public function index()
    {
        return view('kasie.invitations.petugas.index');
    }
    public function create()
    {
        $roles = Role::whereNotIn('name', ['customer'])->get();

        return view('kasie.invitations.petugas.create', compact('roles'));
    }
}
