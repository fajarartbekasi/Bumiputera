@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6 py-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="py-3 text-center mb-3">
                    <h5 class="text-muted">Buat Akun Baru</h5>
                </div>
                <form action="{{route('customer.save.akun-baru')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="name" value="{{old('name')}}" id="nama" class="form-control" placeholder="Nama...">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" name="address" value="{{old('address')}}" id="alamat" class="form-control"
                            placeholder="Alamat...">
                    </div>
                    <div class="form-group">
                        <label for="phone">No Hp:</label>
                        <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="form-control" placeholder="+62...">
                    </div>
                    <div class="form-group">
                        <label for="phone">Tanggal Lahir:</label>
                        <input type="date" name="ttl" value="{{old('ttl')}}" id="ttl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">telp_rumah:</label>
                        <input type="number" name="telp_rumah" value="{{old('telp_rumah')}}" id="telp_rumah" class="form-control"
                            placeholder="+62...">
                    </div>
                    <div class="form-group">
                        <label for="phone">Pekerjaan:</label>
                        <input type="text" name="pekerjaan" value="{{old('pekerjaan')}}" id="pekerjaan" class="form-control"
                            placeholder="pekerjaan.">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="" id="password" class="form-control" placeholder="******">
                    </div>
                    <div class="form-group">
                        <label for="roles">Akses:</label>
                        <select name="roles" id="roles" class="form-control">
                            <option value="">Pleace select one</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">
                        Simpan
                    </button>
                    <button type="submit" class="btn btn-outline-secondary">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection