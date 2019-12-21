@extends('layouts.app')

@section('content')


@section('content')


<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="mt-3 mb-3 d-flex justify-content-end">
                        <a href="{{route('kasie.invitations.new.petugas')}}" class="btn btn-outline-info">
                            Invite petugas
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-rq box-shadow-table" id="customers">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Phone</th>
                                    <th>Telp Rumah</th>
                                    <th>Pekerjaan</th>
                                    <th>Join Date</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $(function(){
        $('#customers').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('kasie.invitations.ambil-data.json-petugas') !!}',
        aoColumns: [
        {mData : 'name', name:'name'},
        {mData : 'email', name:'email'},
        {mData : 'address', name:'address'},
        {mData : 'phone', name:'phone'},
        {mData : 'telp_rumah', name:'telp_rumah'},
        {mData : 'pekerjaan', name:'pekerjaan'},
        {mData : 'created_at', name:'created_at'},
        {mData : 'action', name:'action', orderable: false, seacrhabl: false},
        ]
        });
    })
</script>
@endpush