<div class="card-header border-0">
    <div class="d-flex bd-highlight">
        <h6 class="mr-auto p-2 text-muted">Informasi Umum</h6>
        <h4 class="font-weight-bold text-info mr-3 p-2">{{$pengajuan->user->name}}</h4>
    </div>
    <div class="d-flex align-item-center">
        <h5 class="text-muted mr-2">Ingin mengajukan pengajuan asuransi</h5>
        <h5 class="font-weight-bold text-info">"{{$pengajuan->type->name}}"</h5>
    </div>
</div>
<div class="card-body">
    <h4 class="text-muted font-weight-bold">Detail Informasi Penutupan Asuransi</h4>
    <div class="d-flex">
        <div class="mr-auto">
            <h5 class="text-muted">Merek Kendaraan</h5>
            <h5 class="text-muted">Jenis Kendaraan</h5>
            <h5 class="text-muted">Tahun Kendaraan</h5>
            <h5 class="text-muted">Nomor Polisi</h5>
            <h5 class="text-muted">Nomor Rangka</h5>
            <h5 class="text-muted">Nomor Mesin</h5>
            <h5 class="text-muted">Harga Kendaraan</h5>
            <h5 class="text-muted">Harga Perlengkapan Non Standar</h5>
        </div>
        <div class="text-muted">
            <h5>{{$pengajuan->merek ?? '-'}}</h5>
            <h5>{{$pengajuan->jenis ?? '-'}}</h5>
            <h5>{{$pengajuan->tahun ?? '-'}}</h5>
            <h5>{{$pengajuan->no_polisi ?? '-'}}</h5>
            <h5>{{$pengajuan->no_rangka ?? '-'}}</h5>
            <h5>{{$pengajuan->no_mesin ?? '-'}}</h5>
            <h5>Rp. {{number_format($pengajuan->harga_kendaraan, 2 ?? '-')}}</h5>
            <h5>Rp. {{number_format($pengajuan->harga_kendaraan, 2 ?? '-')}}</h5>
        </div>
    </div>
    <h4 class="text-muted font-weight-bold">Informasi Umum</h4>
    <div class="d-flex">
        <div class="mr-auto text-muted">
            <h5>Rincian</h5>
            <h5>Paket</h5>
            <h5>Tanggal Pengajuan</h5>
            <h5>Tanggal Akhir</h5>
            <h5>Dibuat di</h5>
            <h5>Premi</h5>
            <h5>Nama agen</h5>
            <h5>Total</h5>
        </div>
        <div class="text-muted">
            <h5>{{$pengajuan->rincian ?? '-'}}</h5>
            <h5>{{$pengajuan->paket ?? '-'}}</h5>
            <h5>{{$pengajuan->start_date ?? '-'}}</h5>
            <h5>{{$pengajuan->end_date ?? '-'}}</h5>
            <h5>{{$pengajuan->created_place ?? '-'}}</h5>
            <h5>Rp. {{number_format($pengajuan->premi,2 ?? '-')}}</h5>
            <h5>{{$pengajuan->nama_agen ?? '-'}}</h5>
            <h5>Rp. {{number_format($pengajuan->premi,2 ?? '-')}}</h5>
        </div>
    </div>
    <div class="row justify-content-end py-2">
        <form action="{{route('kasie.perbaharui.status.pengajuan.penutupan.asuransi', $pengajuan->id)}}" method="post">
            @csrf
            @method('PUT')
            <a href="#" class="btn btn-outline-warning">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2">
                    <path fill="#FFED4A"
                        d="M3.828 9l6.071-6.071-1.414-1.414L0 10l.707.707 7.778 7.778 1.414-1.414L3.828 11H20V9H3.828z" />
                    </svg>
                Cancel
            </a>
            <button type="submit" class="btn btn-outline-primary mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20" class="mr-2">
                    <path fill-rule="evenodd" fill="#3490DC"
                        d="M4.16 4.16l1.42 1.42A6.99 6.99 0 0 0 10 18a7 7 0 0 0 4.42-12.42l1.42-1.42a9 9 0 1 1-11.69 0zM9 0h2v8H9V0z" />
                </svg>
                Setujui Permintaan
            </button>
        </form>
    </div>
</div>