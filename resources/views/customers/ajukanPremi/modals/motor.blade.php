<div class="modal fade bd-example-modal-xl"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('customer.ajukan.permintaan.penutupan.asuransi', $type->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <label for="">Nomor Rekeneing *</label>
                            <input type="text" name="no_rek" class="form-control" id="" value="{{old('no_rek')}}"
                                placeholder="No rekening..">
                        </div>
                        <div class="col-md-12  mt-3">
                            <div class="alert alert-success" role="alert">
                                Data Kendaraan *
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Merek Kendaraan *</label>
                                <input type="text" name="merek" class="form-control" id="" value="{{old('merek')}}"
                                    placeholder="Merek kendaraan..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kendaraan *</label>
                                <input type="text" name="jenis" class="form-control" id="" value="{{old('jenis')}}"
                                    placeholder="Jenis Kendaraan..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun Kendaraan *</label>
                                <input type="number" name="tahun" class="form-control" id="" value="{{old('tahun')}}"
                                    placeholder="Tahun Kendaraan..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Polisi *</label>
                                <input type="text" name="no_polisi" class="form-control" id="" value="{{old('no_polisi')}}"
                                    placeholder="Nomor Polisi..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Rangka *</label>
                                <input type="text" name="no_rangka" class="form-control" id="" value="{{old('no_rangka')}}"
                                    placeholder="No Rangka..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Mesin *</label>
                                <input type="text" name="no_mesin" class="form-control" id="" value="{{old('no_mesin')}}"
                                    placeholder="Nomor Mesin..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Perlengkapan Non Standard *</label>
                                <input type="text" name="harga_total_perlengkapan_non_standar" class="form-control" id=""
                                    value="{{old('harga_total_perlengkapan_non_standar')}}"
                                    placeholder="Total Harga Perlengkapan Non Standard..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Kendaraan *</label>
                                <input type="text" name="harga_kendaraan" class="form-control" id="" value="{{old('harga_kendaraan')}}"
                                    placeholder="Price..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Wilayah *</label>
                                <input type="text" name="premi" class="form-control" id="" value="{{old('premi')}}"
                                    placeholder="Wilayah..">
                                <small class="text-danger">
                                    masukan harga wilayah sesuai table disamping
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jangka Waktu *</label>
                                <input type="date" name="start_date" class="form-control" id="" value="{{old('start_date')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sampai Dengan *</label>
                                <input type="date" name="end_date" class="form-control" id="" value="{{old('end_date')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paket *</label>
                                <input type="text" name="paket" class="form-control" id="" value="UMUM" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Agen *</label>
                                <input type="text" name="nama_agen" class="form-control" id="" value="{{old('nama_agen')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Berkas *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-info">
                                            <span class="upl" id="upload">Upload multiple file</span>
                                            <input type="file" name="berkas[]" class="upload up" id="up" value="{{old('berkas[]')}}"
                                                onchange="readURL(this);" multiple />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="status" value="waitting list" id="">
                    <div class="mt-3 mb-3">
                        <button type="submit" class="btn btn-outline-info">
                            Kirim permintaan saya
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>