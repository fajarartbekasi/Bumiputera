<?php

namespace App\Http\Controllers\Kasie\Invitation;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function jsonCustomer()
    {
         $users = User::with('roles')->whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['kasie teknik', 'staff teknik', 'kasir']);
        })->get();

        return Datatables::of($users)
                    ->make(true);
    }
    public function index()
    {
        return view('kasie.invitations.customers.index');
    }
}
