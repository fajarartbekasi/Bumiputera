@extends('layouts.cetak')

@section('content')

<div class="mt-2 mb-2">
    <img src="{{asset('logo/logo.png')}}" alt="" width="20%" height="20%">

    <div class="row">
        <div class="col-xs-6 text-left">
            <h4 class="">Dikeluarkan Oleh: Bekasi</h4>
            <h4 class="border-bottom">Alamat: Kompleks Perkantoran Bekasi Mas Blok C 10, Jl. Jend Ahmad Yani.</h4>
        </div>
    </div>
    <div class="text-center">
        <h4 class="font-weight-bold">KWITANSI PREMI ASURANSI</h4>
    </div>

</div>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sudah terima dari :</th>
                <th>Alamat :</th>
                <th>No Polis/Sertifikat :</th>
                <th>Periode Asuransi :</th>
                <th>Cara Pembayaran :</th>
                <th>Pembayaran Ke :</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$pengajuan->user()->first()->name}}</td>
                <td>{{$pengajuan->user()->first()->address}}</td>
                <td>10220210190900037</td>
                <td>{{$pengajuan->start_date}} - {{$pengajuan->end_date}}</td>
                <td>TRANSFER</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="mt-3 mb-3">
    <h4 class=" border-bottom">
        @if($pengajuan->categori != ['Motor KOE','Mobil KOE'])
        Terbilang : {{ $convert->format($pengajuan->premi) }}
        @else
        Terbilang :
        {{$pengajuan->total_peserta * $pengajuan->premi + $pengajuan->biaya_polis + $pengajuan->biaya_materai}}
        @endif
    </h4>

</div>
<div class="row">
    <div class="col-xs-6 text-left">
        Dibuat di : {{$pengajuan->created_place ?? '-'}}
    </div>
    <div class="col-xs-6 text-left ml-4">
        Pada Tanggal : {{$pengajuan->created_at}}
    </div>
</div>
<div class="row">
    <div class="col-xs-6 text-left">
        {{$pengajuan->nama_agen}}
        <br>
        {{$pengajuan->created_at}}
    </div>
    <div class="col-xs-6 text-center ml-4">
        <h4 class="">Penanggung</h4>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h4>
            Engga Tau Namanya
            <br>
            <span class="border-top">
                Kantor Cabang
            </span>
        </h4>
    </div>
</div>
@endsection