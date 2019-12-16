<div class="content py-2">

    <div class="text-left text-muted">
        <h6>Nama Pemohon : {{$pengajuan->user->name}}</h6>
        <h6>Jenis Kendaraan : {{$pengajuan->user->pekerjaan}}</h6>
        <h6>Tahun Kendaraan : {{$pengajuan->institusi}}</h6>
        <h6>Alamat : {{$pengajuan->user->address}}</h6>
        <h6>Telphone : {{$pengajuan->user->phone}}</h6>
        <h6>Total Peserta : {{$pengajuan->total_peserta}}</h6>
        <hr>
    </div>
    <h5 class="font-weight-bold text-muted">Detail Informasi Penutupan Asuransi</h5>
    <div class="text-muted">
        <h6>Paket : {{$pengajuan->paket}}</h6>
        <h6>Periode Asuransi : {{$pengajuan->start_date}} - {{$pengajuan->end_date}}</h6>
        <h6>Premi : {{number_format($pengajuan->premi, 2)}}</h6>
        <h6>Biaya Polis : {{number_format($pengajuan->biaya_polis, 2)}}</h6>
        <h6>Biaya Materai : {{number_format($pengajuan->biaya_materai, 2)}}</h6>

    </div>
    <h5 class="font-weight-bold text-muted">Informasi Umum</h5>
    <div class="text-muted">
        <h6>Tanggal Pengajuan : {{$pengajuan->start_date}}</h6>
        <h6>Tanggal Akhir : {{$pengajuan->end_date}}</h6>
        <h6>Dibuat di : {{$pengajuan->created_place}}</h6>
        <h6>Premi :Rp. {{number_format($pengajuan->premi,2)}}</h6>
        <h6>Nama agen : {{$pengajuan->nama_agen}}</h6>
        <h6>Total :
            {{number_format($pengajuan->total_peserta * $pengajuan->premi + $pengajuan->biaya_polis +
            $pengajuan->biaya_materai)}}
        </h6>
        <h6>Dibuat Di : {{$pengajuan->created_place}}</h6>
    </div>

    <div class="row justify-content-center">
        <a href="{{route('kasir.cetak.kwitansi' , $payment->id)}}" class="btn btn-outline-info">
            Cetak Kwitansi
        </a>
    </div>
</div>