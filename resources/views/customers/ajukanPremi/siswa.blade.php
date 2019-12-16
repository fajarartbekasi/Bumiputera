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
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-outline-info mr-3" data-toggle="collapse" data-target="#tablekoe">
                            Cek Table Siswa / Mahasiswa KOE
                        </button>
                        <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target=".bd-example-modal-xl">
                            Ajukan Asuransi
                        </button>
                    </div>
                    <div class="row">
                        @include("customers.ajukanPremi.modals.siswa")
                        <div class="col-md-12">
                            <table class="table table-striped collapse" id="tablekoe">
                                <thead>
                                    <tr>
                                        <th>Manfaat</th>
                                        <th>Juara</th>
                                        <th>Unggul</th>
                                        <th>Pandai</th>
                                        <th>Cerdas</th>
                                        <th>Tangkas</th>
                                        <th>Kualitas</th>
                                        <th>Cendekia</th>
                                        <th>Prima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($premisSiswa as $premi)
                                        <tr>
                                            <td>{{$premi->manfaat}}</td>
                                            <td>{{$premi->premis()->first()->premi_1}}</td>
                                            <td>{{$premi->premis()->first()->premi_2}}</td>
                                            <td>{{$premi->premis()->first()->premi_3}}</td>
                                            <td>{{$premi->premis()->first()->premi_4}}</td>
                                            <td>{{$premi->premis()->first()->premi_5}}</td>
                                            <td>{{$premi->premis()->first()->premi_6}}</td>
                                            <td>{{$premi->premis()->first()->premi_7}}</td>
                                            <td>{{$premi->premis()->first()->premi_8}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success d-flex align-item-center" role="alert">
                                PROSEDUR PENUTUPAN
                                <h5 class="font-weight-bold ml-2">
                                   Siswa / Mahasiswa KOE
                                </h5>
                            </div>
                            <div>
                                <ol>
                                    <li>Setiap permintaan penutupan Asuransi
                                    harus mengisi Surat Permintaan
                                    Penutupan Asuransi (SPPA) yang mengatasnamakan institusi/
                                    sekolah peserta</li>
                                    <li>SPPA dilampiri dengan data peserta yang meliputi :</li>
                                    <ul>
                                        <li>
                                            Nama Peserta
                                        </li>
                                        <li>Tanggal Lahir</li>
                                        <li>Kelas/Jurusan/Angkatan/Nomor Induk Siswa/Mahasiswa</li>
                                    </ul>
                                    <li>Peserta adalah anggota pendidikan dengan usia 3 s/d 18
                                    tahun dengan melampirkan kelas/jurusan/angkatan dan No.
                                    Induk siswa.</li>
                                    <li>Pemberian manfaat Rawat Inap sesuai dengan Paket dan
                                    tidak melihat besar kecilnya perawatan per hari.</li>
                                    <li>Manfaat Rawat Inap diberlakukan masa tunggu 7 ( tujuh )
                                    hari untuk seluruh jenis penyakit sejak berlakunya periode
                                    jaminan asuransi, kecuali akibat dari suatu kecelakaan berlaku
                                    mulai hari pertama.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success d-flex align-item-center" role="alert">
                                POLIS PESERTA UNTUK SETIAP SEKOLAH
                                <h5 class="font-weight-bold ml-2">
                                    Siswa / Mahasiswa KOE
                                </h5>
                            </div>
                            <div>
                                <p class="text-muted">
                                    Untuk setiap satu lembaga pendidikan dibuat 1 (satu) polis.
                                    Apabila terdapat perbedaan periode pertanggungan antara kelas/
                                    tingkat pada lembaga tersebut, maka polis dapat dibuat lebih dari
                                    1 (satu). Penerbitan polis lebih dari 1 (satu) untuk nama lembaga
                                    yang sama hanya diperkenankan untuk mengakomodir adanya
                                    perbedaan periode pertanggungan.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success d-flex align-item-center" role="alert">
                                PENGECUALIAN
                                <h5 class="font-weight-bold ml-2">
                                    Siswa / Mahasiswa KOE
                                </h5>
                            </div>
                            <div>
                                <h6 class="text-muted">Risiko yang dikecualikan secara langsung maupun tidak langsung
                                akibat dari :</h6>
                                <ol>
                                    <li>AIDS, ARC & segala akibatnya, termasuk penyakit yg ditularkan
                                    melalui hubungan seksual.</li>
                                    <li>Kelainan bawaan</li>
                                    <li>Bunuh diri atau usaha bunuh diri atau mencederai diri.</li>
                                    <li>Ikut dalam kegiatan perang, kudeta, demonstrasi, huru-hara,
                                    pemogokan, tawuran.</li>
                                    <li>Perawatan Kehamilan atau persalinan, aborsi, keguguran,
                                    gangguan akibat dari tindakan KB, perawatan kemandulan atau
                                    perawatan yang berhubungan dengan gangguan menstruasi.</li>
                                    <li>Perawatan untuk mempercantik diri / operasi kecantikan.</li>
                                    <li>Mengadakan check-up yang bukan dari tindakan perawatan.</li>
                                    <li>Perawatan atau akibat yang ditimbulkan dari pengaruh
                                    alkohol, narkotik, obat bius atau obat–obatan psikotropik</li>
                                    <li>Berpartisipasi dalam lomba atau kegiatan olah raga professional.</li>
                                    <li>Terkenanya radiasi, kontaminasi oleh radioaktif.</li>
                                    <li>Berpartisipasi dalam lomba atau kegiatan olah raga professional.</li>
                                    <li>Terkenanya radiasi, kontaminasi oleh radioaktif.</li>
                                    <li>Psikotis, kelainan mental / stress & syaraf.</li>
                                    <li>Melanggar Peraturan dan Perundang-undangan yang berlaku.</li>
                                    <li>Pengecualian-pengecualian lain yang tercantum dalam
                                    polis Asuransi Kecelakaan Diri dan lampiran polis Asuransi</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success d-flex align-item-center" role="alert">
                                PROSEDUR PENGAJUAN KLAIM
                                <h5 class="font-weight-bold ml-2">
                                    Siswa / Mahasiswa KOE
                                </h5>
                            </div>
                            <div>
                                <h6 class="text-muted">Hal–hal yang harus diperhatikan jika Peserta mengalami suatu
                                risiko, yaitu :</h6>
                                <ol>
                                    <li>Segera melaporkan kepada Pengelola selambat-lambatnya
                                    dalam waktu 3x24 jam kerja setelah keluar dari RS/KLINIK
                                    atau kejadian meninggal dunia</li>
                                    <li>Mengisi formulir klaim Asuransi Kecelakaan Diri (Personal
                                    Accident) atau Asuransi Kesehatan (ASKES) biasa, tergantung
                                    jenis klaim yang terjadi, yang ditandatangani oleh Kepala
                                    Sekolah (untuk klaim dibawah Rp. 100.000,-) dan oleh Dokter
                                    yang merawat (untuk klaim diatas Rp. 100.000,-).</li>
                                    <li>Melampirkan dokumen pendukung yaitu :</li>
                                    <ul>
                                        <li>Untuk risiko perawatan di Rumah Sakit/Puskesmas/
                                        Balai Pengobatan berupa: Kuitansi/rincian pengobatan
                                        (asli atau copy yang dilegalisir RS/Balai Pengobatan/
                                        Puskesmas ).</li>
                                        <li>Untuk risiko perawatan dibawah Rp. 100.000,- copy dapat
                                        dilegalisir oleh Kepala Sekolah yang bersangkutan.</li>
                                        <li>Untuk risiko meninggal dunia berupa: Surat keterangan
                                        kelurahan atau kepolisian atau dokter/Rumah Sakit.</li>
                                    </ul>
                                    <li>Batas pengajuan berkas klaim maksimum adalah 30 (tiga
                                    puluh) hari dari tanggal kejadian/kerugian.</li>
                                    <li>
                                        Klaim dianggap kadaluarsa, jika selama 6 (enam) bulan
                                        pemegang polis atau keluarganya tidak melengkapi
                                        Dokumen persyaratan klaim.
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-success d-flex align-item-center" role="alert">
                                BESARNYA PENGGANTIAN DAN SANTUNAN
                                <h5 class="font-weight-bold ml-2">
                                    Siswa / Mahasiswa KOE
                                </h5>
                            </div>
                            <div>
                                <h6 class="text-muted">Ketentuan besarnya penggantian maupun santunan untuk :</h6>
                                <ol>
                                    <li>Besarnya penggantian risiko meninggal dunia akibat
                                    kecelakaan dan cacat tetap (sesuai prosentase kecacatan)
                                    diberikan sesuai paket yang diambil.</li>
                                    <li>Penggantian risiko biaya pengobatan/perawatan di Rumah
                                    Sakit bersifat total sesuai dengan paket yang diambil dan
                                    menunjukkan bukti-bukti pengobatan/perawatan yang
                                    sah/asli atau dilegalisir bila yang asli dipergunakan untuk
                                    pengajuan klaim lainnya.</li>
                                    <li>Santunan risiko meninggal dunia akibat kecelakaan dan
                                    santunan biaya pemakaman diberikan secara total sesuai
                                    Paket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection