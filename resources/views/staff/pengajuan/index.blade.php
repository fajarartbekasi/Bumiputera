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
                        <h4 class="text-muted"> Cari Report </h4>
                        <form action="{{route('staff.cari-data.pertanggal')}}" method="GET">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dari Tanggal *</label>
                                        <input type="date" name="tgl_awal" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sampai Tanggal *</label>
                                        <input type="date" name="tgl_akhir" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3 mb-3 ml-3">
                                    <button type="submit" class="btn btn-outline-danger">Cari report</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <table class="table table-striped" id="pengajuan-polis">
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
        $('#pengajuan-polis').on('click', '.btn-delete[data-remote]', function (e) {
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
            $('#pengajuan-polis').DataTable().draw(false);
            });
            }else
            alert("You have cancelled!");
        });
        $('#pengajuan-polis').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('staff.ambil-data.pengajuan-polis') !!}',
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