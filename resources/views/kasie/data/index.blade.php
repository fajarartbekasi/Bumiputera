@extends('layouts.app')

@section('permintaan-asuransi', 'active')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-warning" role="alert">
                Perhatikan syarat dan ketentuan sebelum anda melakukan pengajuan asuransi.
            </div>
        </div>
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         width="30"
                         height="30"
                         class="mr-3">
                        <path fill="#6c757d"
                              d="M17 10.27V4.99a1 1 0 0 0-2 0V15a5 5 0 0 1-10 0v-1.08A6 6 0 0 1 0 8V2C0 .9.9 0 2 0h1a1 1 0 0 1 1 1 1 1 0 0 1-1 1H2v6a4 4 0 1 0 8 0V2H9a1 1 0 0 1-1-1 1 1 0 0 1 1-1h1a2 2 0 0 1 2 2v6a6 6 0 0 1-5 5.92V15a3 3 0 0 0 6 0V5a3 3 0 0 1 6 0v5.27a2 2 0 1 1-2 0z" />
                    </svg>
                    <li class="breadcrumb-item active" aria-current="page">Data penutupan asuransi</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="card border-0 shadow">
                <div class="card-header border-0">
                    <h4 class="text-muted"> Cari Report</h4>
                    <form action="{{route('kasie.cari-data.pertanggal')}}" method="GET" class="form-inline">
                        <div class="form-group mb-2">
                            <label for="tgl_awal" class="mr-3 text-muted">Dari tanggal</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                            </div>
                        </div>
                        <div class="form-group mx-sm-4 mb-2">
                            <label for="tgl_akhir" class="mr-3 text-muted">Sampai tanggal</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info mb-2 text-white">Cari Report</button>

                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="pengajuan-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Code Premi</th>
                                <th>Kategori</th>
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
@endsection

@push('scripts')
<script>
    $(function(){
        $('#pengajuan-table').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
            }).always(function (data) {
            $('#pengajuan-table').DataTable().draw(false);
            });
            }else
            alert("You have cancelled!");
        });
        $('#pengajuan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('kasie.ambil-data.json.pengajuan.penutupan.asuransi') !!}',
            aoColumns: [
                {mData : "user.name", name:"user.name"},
                {mData : "type.code_premi", name:"type.code_premi"},
                {mData : "jenis", name:"jenis"},
                {data : 'start_date', name:'start_date'},
                {data : 'end_date', name:'end_date'},
                {data : 'action', name:'action', orderable: false, seacrhabl: false},
            ]
        });
    });
</script>
@endpush