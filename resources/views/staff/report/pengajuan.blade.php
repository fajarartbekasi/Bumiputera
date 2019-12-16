@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>Bumida Bumi Putra Muda
                        <br>
                        Ruko Bekasi Mas, Jl. Jend. Ahmad Yani No.10, RT.004/RW.003, Marga Jaya, Kec. Bekasi Sel., Kota
                        Bks, Jawa Barat 17141</h3>
                    <hr>
                </b></P>
        </div>

        @if (request('tgl_awal'))
        <small>dari tanggal {{ request('tgl_awal') }} sampai tanggal {{ request('tgl_akhir') }}</small>
        @endif

        <u>
            <h4>Laporan Pengajuan Ansuransi</h4>
        </u>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Asuransi</th>
                    <th>Premi</th>
                    <th>Nama</th>
                    <th>Paket</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Sampai Tanggal</th>
                </tr>
            </thead>
            <tbody>
                fol
                @forelse ($pengajuan as $cetak_data)
                <tr>
                    <td>{{$cetak_data->type()->first()->name}}</td>
                    <td>{{$cetak_data->premi}}</td>
                    <td>{{$cetak_data->user()->first()->name}}</td>
                    <td>{{$cetak_data->paket}}</td>
                    <td>{{$cetak_data->start_date}}</td>
                    <td>{{$cetak_data->end_date}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Data tidak ditemukan</td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection