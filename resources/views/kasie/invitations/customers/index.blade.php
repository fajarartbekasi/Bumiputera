@extends('layouts.app')

@section('content')
<div class="content py-3">
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-rq box-shadow-table" id="customers">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
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
        $('#customers').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('kasie.invitations.ambil-data.json-customers') !!}',
        aoColumns: [
        {mData : 'name', name:'name'},
        {mData : 'email', name:'email'},
        {mData : 'created_at', name:'created_at'},
        ]
        });
    })
</script>
@endpush