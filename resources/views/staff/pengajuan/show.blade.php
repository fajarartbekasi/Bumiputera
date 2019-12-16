@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                @if ($pengajuanPolis->type->name == 'Motor KOE')
                @include('staff.pengajuan.details.motor')
                @elseif($pengajuanPolis->type->name == 'Mobil KOE')
                @include('staff.pengajuan.details.mobil')
                @elseif($pengajuanPolis->type->name == 'Siswa / Mahasiswa KOE')
                {{-- @include('kasie.pengajuan.show.siswa') --}}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection