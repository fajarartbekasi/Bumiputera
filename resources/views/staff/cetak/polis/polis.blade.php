@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-left">
            <img src="{{asset('logo/logo.png')}}" alt="" height="50" srcset="">
            <hr>
            <h5>Dikeluarkan oleh : Bekasi</h5>
            <h5>Alamat : Komplek Perkantoran Bekasi Mas C. 10, Jl. Jendral Ahmad Yani, Bekasi 17135.</h5>
            <h5>Telp:021-8858957,8858634; Fax: 021-88960151.</h5>
            <hr>
            <div class="text-center">
                <h5 class="font-wieght-bold">
                    IKHTISAR PERTANGGUNGAN
                </h5>
                <h4 class="font-wieght-bold">
                    POLIS ASURANSI {{$polis->pengajuan->type->name}}
                </h4>
                <hr>
            </div>
        </div>
        <div class="text-left">
            <h5>Nomor Polis : {{$polis->code_polis}}</h5>
            <h5>Nama Tertanggung : {{$polis->pengajuan->user->name}}</h5>
            <h5>Alamat Tertanggung : {{$polis->pengajuan->user->address}}</h5>

            keterangan tehnis kendaraan bermotor yang dipertanggunkan.
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">

                    <th>Merek / Type</th>
                    <th>Nomor Polisi</th>
                    <th>Traler/Kendaraan Gandengan</th>
                    <th>Penggunaan Kendaraan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>{{$polis->pengajuan->merek}}</td>
                    <td>{{$polis->pengajuan->no_polisi}}</td>
                    <td>-</td>
                    <td>Pribadi</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tahun Pembuatan</th>
                    <th>Nomor Rangka</th>
                    <th>Nomor Mesin</th>
                    <th>Tempat Duduk</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>{{$polis->pengajuan->tahun}}</td>
                    <td>{{$polis->pengajuan->no_rangka}}</td>
                    <td>{{$polis->pengajuan->no_mesin}}</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>

        <h5>SUB LIMIT</h5>
        <div class="justify-content-end">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            Santunan Biaya Pengobatan Akibat Kecelakaan Bagi Penumpang.
                        </td>
                        <td>
                            250.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Santunan Pengurusan Dokumen
                        </td>
                        <td>
                            500.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggung Jawab Hukum Pihak Ke-3
                        </td>
                        <td>
                            2.500.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Santunan Meninggal dunia akibar kecelakaan bagi pengemudi
                        </td>
                        <td>
                            5.000.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Santunan Meninggal dunia akibar kecelakaan bagi penumpang
                        </td>
                        <td>
                            2.500.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Santunan Biaya Pengobatan Akibat Kecelakaan Bagi pengemudi
                        </td>
                        <td>
                            500.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Santunan Cacat Tetap Bagi pengemudi
                        </td>
                        <td>
                            2.500.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Act of God (Flood & TSF)
                        </td>
                        <td>
                            17.000.000.00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            SRCC TOTAL LOSS ONLY
                        </td>
                        <td>
                            17.000.000.00
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            Jangka Waktu pertanggungan :
                        </td>
                        <td colspan="2">
                            366 (TIGA RATUS ENAM PULUH ENAM) Hari
                            Mulai dari Tanggal {{$polis->pengajuan->start_date}} - {{$polis->pengajuan->end_date}}
                            pada pukul {{$polis->pengajuan->created_at->toTimeString()}} Siang Waktu setempat dimana
                            harta benda yang dipertanggunkan
                            berada.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Risiko/Retensi sendiri setiap peristiwa :
                        </td>
                        <td>
                            - Risiko sendiri akibat kecelakaan : IDR 500.000.00
                        </td>
                        <td>
                            - Risiko sendiri akibat kecurian sebesar : IDR 500.000.00
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Bentuk pertanggungan</td>
                        <td>Motor KOE UMUM</td>
                        <td>(Periode : {{$polis->pengajuan->start_date}} - {{$polis->pengajuan->end_date}})</td>
                    </tr>
                    <tr>
                        <td>Kerugian sesuai polis standar kendaraan bermotor indonesia (Total Lost Only/TLO)</td>
                        <td>IDR/
                        <td>
                        <td>17.000.000.00</td>
                    </tr>
                </tbody>
            </table>
            <h6>Klausala / Syarat Tambahan : Tidak ada</h6>
            <hr>
            <h6>Perhitungan premi :</h6>
            <div class="text-right">
                <h5>ok</h5>
            </div>
        </div>
    </div>
</div>
@endsection