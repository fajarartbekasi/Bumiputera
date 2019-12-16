@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    @if ($pengajuan->type->name == 'Motor KOE')
                        @include('kasie.pengajuan.show.motor')
                        @elseif($pengajuan->type->name == 'Mobil KOE')
                        @include('kasie.pengajuan.show.mobil')
                        @elseif($pengajuan->type->name == 'Siswa / Mahasiswa KOE')
                        @include('kasie.pengajuan.show.siswa')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection