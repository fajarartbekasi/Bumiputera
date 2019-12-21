<?php

namespace App\Http\Controllers\Customer\Invitation;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function create()
    {
        $roles = Role::whereIn('name', ['customer'])->get();

        return view('customers.invitation.create', compact('roles'));
    }
}
