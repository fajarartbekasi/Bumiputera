@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Perhatikan syarat dan ketentuan sebelum anda melakukan pengajuan asuransi.
                </div>
            </div>
            <div class="col-md-12">
                @include('customers.ajukanPremi.modals.motor')
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="alert alert-success d-flex align-item-center" role="alert">
                            Ketentuan Paket
                            <h5 class="font-weight-bold ml-2">
                                Motor KOE
                            </h5>
                        </div>
                        <div>
                            <ol>
                                <li>Kendaraan maksimal berusia 8 tahun dan untuk polis
                                perpanjangan dapat dilakukan 1 kali jika lebih dari 8
                                tahun (maksimal usia kendaraan 9 tahun).</li>
                                <li>Harga sesuai harga pasar kendaraan roda dua.</li>
                                <li>Kendaraan belum diasuransikan.</li>
                                <li>Kendaraan yang akan diasuransikan harus menyertakan
                                bukti gesekan Nomor Rangka atau Nomor Mesin
                                Kendaraan.</li>
                                <li>Jaminan/santunan hanya berlaku jika kendaraan
                                tersebut memiliki STNK yang syah dan masih berlaku.</li>
                                <li>Pengendara mempunyai SIM yang masih berlaku.</li>
                            </ol>
                        </div>
                        <div class="alert alert-success d-flex align-item-center" role="alert">
                            Yang tidak dijamin dalam

                            <h5 class="font-weight-bold ml-2">
                                Motor KOE
                            </h5>
                        </div>
                        <div>
                            <ol>
                                <li>Pemakaian untuk disewakan/komersil.</li>
                                <li>Motor gede.</li>
                                <li>Kendaraan dipergunakan di wilayah Maluku.</li>
                            </ol>
                        </div>
                        <div class="alert alert-success d-flex align-item-center" role="alert">
                            Pengajuan Klaim Polis
                            <h5 class="font-weight-bold ml-2">
                                Motor KOE
                            </h5>
                        </div>
                        <div>
                            <h6 class="text-muted">Hal-hal yang harus dilakukan jika terjadi suatu kecelakaan/
                            kerugian:</h6>
                            <ol>
                                <li>Segera melaporkan kepada PT. Asuransi Umum
                                Bumiputera Muda 1967 terdekat selambat-lambatnya
                                3 x 24 jam kerja.</li>
                                <li>Mengisi Formulir Klaim.</li>
                                <li>Melengkapi Surat maupun Dokumen pendukung klaim.</li>
                            </ol>
                        </div>

                        <div class="py-4">
                            <h5 class="text-danger font-weight-bold">
                                Klaim dianggap Kadaluarsa jika selama 6 (enam) bulan
                                pemegang polis atau keluarganya tidak melengkapi
                                dokumen persyaratan klaim.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow" >
                    <div class="card-body">
                        <div class="alert alert-success d-flex align-item-center" role="alert">
                            Table
                            <h5 class="font-weight-bold ml-2">
                                Motor KOE
                            </h5>
                            <div class="ml-auto">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".bd-example-modal-xl">Ajukan Permintaan</button>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Wilayah 1</th>
                                    <th>Wilayah 2</th>
                                    <th>Wilayah 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($premisMotor as $getType)
                                    <tr>
                                        <td>{{$getType->premis()->first()->price}}</td>
                                        <td>{{$getType->premis()->first()->premi_1}}</td>
                                        <td>{{$getType->premis()->first()->premi_2}}</td>
                                        <td>{{$getType->premis()->first()->premi_3}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection