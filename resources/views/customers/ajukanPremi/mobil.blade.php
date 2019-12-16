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
            @include('customers.ajukanPremi.modals.mobil')
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="alert alert-success d-flex align-item-center" role="alert">
                        Ketentuan Paket
                        <h5 class="font-weight-bold ml-2">
                            Mobil KOE
                        </h5>
                    </div>
                    <div>
                        <ol>
                            <li>Apabila Kendaraan diperbaiki di bengkel rekanan ( rekanan terpilih dan Authorized ) PT
                            Asuransi Umum Bumiputera Muda 1967.</li>
                            <li>Untuk permintaan khusus pelayanan klaim menggunakan bengkel Authorized dikenakan
                            tambahan premi sebesar 0.25% dari harga pertanggungan.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </li>
                            <li>Wilayah 1 : Sumatera dan Kepulauan</li>
                            <li>Wilayah 2 : DKI Jakarta, Banten, Jawa Barat</li>
                            <li>Wilayah 3 : Selain Wilayah 1 dan Wilayah 2.</li>
                            <li>Pengendara mempunyai SIM yang masih berlaku.</li>
                        </ol>
                    </div>
                    <div class="alert alert-success d-flex align-item-center" role="alert">
                        PROSEDUR PENGAJUAN KLAIM ASURANSI

                        <h5 class="font-weight-bold ml-2">
                            MOBIL KOE
                        </h5>
                    </div>
                    <div>
                        <ol>
                            <li>Segera melaporkan kepada Kantor Cabang PT Asuransi Umum Bumiputera Muda 1967
                            terdekat selambat lambatnya 3 X 24 Jam kerja semenjak mengalami kejadian / musibah.</li>
                            <li>Mengisi formulir klaim yang disediakan oleh PT Asuransi Umum Bumiputera Muda 1967.</li>
                            <li>Menyertakan foto copy : Polis asuransi, STNK dan SIM Pengemudi yang mengalami
                            kecelakaan.</li>
                            <li>Melengkapi surat atau dokumen klaim yang dianggap perlu.</li>
                            <li>Klaim dianggap kadaluarsa jika selama 6 ( enam ) bulan pemegang polis atau keluarganya
                            tidak melengkapi dokumen persyaratan klaim.</li>
                        </ol>
                    </div>
                    <div class="alert alert-success d-flex align-item-center" role="alert">
                        KONDISI YANG TIDAK DIJAMIN DALAM ASURANSI
                        <h5 class="font-weight-bold ml-2">
                            MOBI LKOE :
                        </h5>
                    </div>
                    <div>
                        <ol>
                            <li>Premi asuransi belum terbayar.</li>
                            <li>Pemakaian kendaraan di sewakan atau di komersilkan.</li>
                            <li>Pencurian yang dilakukan oleh orang yang berada dalam pengawasan pemegang polis
                            asuransi ( keluarga, sopir, orang yang bekerja pada pemegang polis asuransi )</li>
                            <li>Pengecualian-pengecualian yang tercantum dalam kondisi polis, kecuali yang ditegaskan
                            kembali untuk dijamin dan tertera dalam klasula.</li>
                            <li>Kendaraan yang dipergunakan di daerah / Provinsi Maluku.</li>
                            <li>Pengemudi yang tidak memliki SIM atau masa berlau SIM telah kadaluarsa.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="alert alert-success d-flex align-item-center" role="alert">
                        Table
                        <h5 class="font-weight-bold ml-2">
                            Mobil KOE
                        </h5>
                        <div class="ml-auto">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                data-target=".bd-example-modal-xl">Ajukan Permintaan</button>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Wilayah 1</th>
                                <th>Wilayah 2</th>
                                <th>Wilayah 3</th>
                                <th>cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($premisMobil as $getType)
                            <tr>
                                <td>{{$getType->premis()->first()->premi_1}}</td>
                                <td>{{$getType->premis()->first()->premi_2}}</td>
                                <td>{{$getType->premis()->first()->premi_3}}</td>
                                <td>{{$getType->premis()->first()->cost_premi}}</td>
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