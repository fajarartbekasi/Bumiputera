@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="30" height="30" class="mr-3">
                            <path fill="#6c757d"
                                  d="M0 4c0-1.1.9-2 2-2h15a1 1 0 0 1 1 1v1H2v1h17a1 1 0 0 1 1 1v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm16.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                        </svg>
                        <li class="breadcrumb-item active" aria-current="page">Data pembayaran</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="card-header border-0">
                        <h4 class="text-muted"> Cari Report</h4>
                        <form action="{{route('kasir.cari-data.pertanggal')}}" method="GET" class="form-inline">
                            <div class="form-group mb-2">
                                <label for="tgl_awal" class="mr-2 text-muted">Dari tanggal</label>
                                <div class="col-md-4">

                                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                                </div>
                            </div>
                            <div class="form-group mx-sm-4 mb-2">
                                <label for="tgl_akhir" class="mr-2 text-muted">Sampai tanggal</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info mb-2 text-white">Cari Report</button>

                            <a href="{{route('kasir.export.data.pembayaran')}}" class="btn btn-info mb-2 ml-2">Export data</a>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                        </div>
                        <table class="table table-striped" id="pembayaran">
                            <thead>
                                <tr>
                                    <th class="text-muted">Nama</th>
                                    <th class="text-muted">Tanggal Pengajuan</th>
                                    <th class="text-muted">Status Pengajuan</th>
                                    <th class="text-muted">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(function(){
        $('#pembayaran').on('click', '.btn-delete[data-remote]', function (e) {
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
            $('#pembayaran').DataTable().draw(false);
            });
            }else
            alert("You have cancelled!");
        });
        $('#pembayaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('kasir.ambil-data.json.pembayaran') !!}',
            aoColumns: [
                {mData : "user.name", name:"user.name"},
                {mData : "pengajuan.start_date", name:"pengajuan.start_date"},
                {mData : "pengajuan.end_date", name:"pengajuan.end_date"},
                {mData : "action", name:"action", orderable: false, seacrhabl: false},
            ]
        });
    });
</script>
@endpush