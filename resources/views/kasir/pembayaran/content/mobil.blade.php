<div class="content py-2">

    <div class="text-center">
        <h5 class="text-muted">
            hey,saya
        </h5>
        <h3 class="font-weight-bold text-info">
            John Doe
        </h3>
        <h4 class="text-muted">
            ingin mengajukan asuransi <br>
            <small class="text-info">Motor KOE</small>
        </h4>
        <hr>
    </div>
    <h5 class="font-weight-bold text-muted">Detail Kendaraan</h5>
    <div class="text-muted">
        <h6>Merek Kendaraan : {{$payment->merek}}</h6>
        <h6>Jenis Kendaraan : {{$payment->jenis}}</h6>
        <h6>Tahun Kendaraan : {{$payment->tahun}}</h6>
        <h6>Nomor Polisi : {{$payment->no_polisi}}</h6>
        <h6>Nomor Rangka : {{$payment->no_rangka}}</h6>
        <h6>Nomor Mesin : {{$payment->no_mesin}}</h6>
        <h6>Harga Kendaraan : Rp.{{number_format($payment->harga_kendaraan,2)}}</h6>
        <h6>Harga Perlengkapan Non Standar :
            Rp.{{number_format($payment->harga_total_perlengkapan_non_standar,2)}}</h6>
    </div>
    <h5 class="font-weight-bold text-muted">Informasi Umum</h5>
    <div class="text-muted">
        <h6>Rincian : {{$payment->rincian}}</h6>
        <h6>Paket : {{$payment->paket}}</h6>
        <h6>Tanggal payment : {{$payment->start_date}}</h6>
        <h6>Tanggal Akhir : {{$payment->end_date}}</h6>
        <h6>Dibuat di : {{$payment->created_place}}</h6>
        <h6>Premi :Rp. {{number_format($payment->premi,2)}}</h6>
        <h6>Nama agen : {{$payment->nama_agen}}</h6>
        <h6>Total : {{number_format($payment->premi,2)}}</h6>
    </div>

    <div class="row justify-content-center">
        <a href="{{route('kasir.cetak.kwitansi' , $payment->id)}}" class="btn btn-outline-info">
            Cetak Kwitansi
        </a>
    </div>
</div>