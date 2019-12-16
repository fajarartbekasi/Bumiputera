@extends('layouts.app')

@section('content')

<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                <path fill="#6c757d"
                    d="M2 14v-3H1a1 1 0 0 1-1-1 1 1 0 0 1 1-1h1l4-7h8l4 7h1a1 1 0 0 1 1 1 1 1 0 0 1-1 1h-1v6a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1H5v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-3zm13.86-5L13 4H7L4.14 9h11.72zM5.5 14a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm9 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                </svg>
                Mobil KOE
            </li>
        </ol>
    </nav>

    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="mt-3 mb-3 d-flex justify-content-end">
                <a href="{{route('kasie.ambil.formulir.baru.mobil-koe')}}" class="btn btn-outline-info">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2">
                        <path fill="#6cb2eb"
                            d="M1 1h18v2H1V1zm0 8h18v2H1V9zm0 8h18v2H1v-2zM1 5h18v2H1V5zm0 8h18v2H1v-2z" />
                    </svg>
                    Tambah Jenis Kategori
                </a>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="premi-table">
                <thead>
                    <tr>
                        <th>UP</th>
                        <th>Wilayah I</th>
                        <th>Wilayah II</th>
                        <th>Wilayah III</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function(){
        $('#premi-table').on('click', '.btn-delete[data-remote]', function (e) {
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
            $('#premi-table').DataTable().draw(false);
            });
            }else
            alert("You have cancelled!");
        });
        $('#premi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('kasie.ambil-data.json.types.mobil-koe') !!}',
            aoColumns: [
                {mData : 'price', name: 'price'},
                {mData : 'premi_1', name:'premi_1'},
                {mData : 'premi_2', name:'premi_2'},
                {mData : 'premi_3', name:'premi_3'},
                {mData : 'action', name:'action', orderable: false, seacrhabl: false},
            ]
        });
    });
</script>
@endpush