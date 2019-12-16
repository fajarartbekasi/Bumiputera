@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-muted" aria-current="page">Data Permintaan Pengajuan Polis</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="mt-3">
                        <table class="table table-striped" id="cetak-polis">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Premi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Batas Waktu</th>
                                    <th>Action</th>
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
        $('#cetak-polis').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('staff.ambil-data.json.cetak-polis') !!}',
            aoColumns: [
                {mData : 'user.name', name: 'user.name'},
                {mData : 'jenis', name:'jenis'},
                {mData : 'created_at', name:'created_at'},
                {mData : 'end_date', name:'end_date'},
                {mData : 'action', name:'action', orderable: false, seacrhabl: false},
            ]
        });
    });
</script>
@endpush