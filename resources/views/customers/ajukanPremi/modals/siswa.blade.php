<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('customer.ajukan.permintaan.penutupan.asuransi', $type->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Calon Pemegang Polis / Peserta
                            </li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lembaga / Institusi *</label>
                                <input type="text" name="institusi" value="{{old('institusi')}}" id="" class="form-control"
                                    placeholder="Institusi..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat *</label>
                                <input type="text" name="alamat" value="{{old('alamat')}}" id="" class="form-control"
                                    placeholder="Alamat..">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jumlah Peserta *</label>
                                <input type="text" name="total_peserta" value="{{old('total_peserta')}}" id="" class="form-control"
                                    placeholder="Total peserta..">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Pilih Paket dan Periode
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pilih Paket *</label>
                                <input type="text" name="paket" value="UMUM" id="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Periode Asuransi *</label>
                                <input type="date" name="start_date" value="{{old('start_date')}}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sampai dengan *</label>
                                <input type="date" name="end_date" value="{{old('end_date')}}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Premi *</label>
                                <input type="text" name="premi" value="{{old('premi')}}" id="" class="form-control" placeholder="Rp..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Biaya Polis *</label>
                                <select name="biaya_polis" id="" class="form-control">
                                    <option value="">Select biaya polis</option>
                                    <option value="20000">0-10.000.000</option>
                                    <option value="50000">10.000.000 - 50.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Biaya Materai *</label>
                                <input type="text" name="biaya_materai" value="12.000" id="" class="form-control"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Informasi Tambahan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dibuat di *</label>
                                <input type="text" name="created_place" class="form-control" value="{{old('created_place')}}"
                                    placeholder="Di buat di" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sampai dengan *</label>
                                <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Agen *</label>
                                <input type="text" name="nama_agen" class="form-control" value="{{old('nama_agen')}}"
                                    placeholder="Nama Agen.." id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Berkas *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-info">
                                            <span class="upl" id="upload">Berkas *</span>
                                            <input type="file" name="berkas[]" class="upload up" id="up" value="{{old('berkas[]')}}"
                                                onchange="readURL(this);" multiple />
                                        </span>
                                    </div>
                                </div>
                                <small class="text-danger">format file yang didukung : jpeg.png.jpg</small>
                            </div>
                        </div>
                    </div>
                    </div>

                    <input type="hidden" name="status" value="waitting list" id="">
                    <div class="mt-3 mb-3 ml-3">
                        <button type="submit" class="btn btn-outline-info">
                            Kirim pengajuan saya
                        </button>
                        <a href="{{route('home')}}" class="btn btn-outline-primary"> Cancel</a>
                    </div>
            </div>
        </div>
    </div>
</div>