<?php

namespace App\Http\Controllers\Customer\Invitation;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidasiController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [

            'name'          => 'bail|required|min:2',
            'email'         => 'required',
            'address'       => 'required',
            'ttl'           => 'required',
            'telp_rumah'    => 'required',
            'phone'         => 'required',
            'pekerjaan'     => 'required',
            'password'      => 'required|min:6',
            'roles'         => 'required|min:1',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);
        if($user = User::create($request->except('roles'))){
            $user->syncRoles($request->get('roles'));
            flash()->success('Pengguna berhasil ditambahkan');
        }else{
            flash()->error('Tidak dapat menambahkan pengguna');
        }


        return redirect()->back();
    }
    public function edit($id)
    {
        $data = [
            'user'      => User::findOrFail($id),
            'roles'     => Role::pluck('name', 'id'),
        ];
        return view('customers.invitation.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->except('roles','password'));
        if($request->get('password')){
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        $user->syncRoles($request->get('roles'));

        return redirect()->back()->with('flash', 'Data penguna berhasil di perbaharui');
    }
}
