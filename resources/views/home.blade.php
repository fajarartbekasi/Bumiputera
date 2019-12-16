@extends('layouts.app')

@section('content')
    @role('kasie teknik|staff teknik|kasir')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="mt-3 mb-3">
                                <div class="d-flex align-item-center">
                                    <h6 class="text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                width="20"
                                                height="20"
                                                class="mr-2">
                                                <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"
                                                    fill="#E0E1E1" />
                                            </svg>
                                        Welcome back
                                    </h6>
                                    <h6 class="ml-2 text-info font-weight-bold">{{auth()->user()->name}}</h6>
                                </div>
                                <h5 class="text-muted">Sekarang total penutupan asuransi berjumlah :</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow">
                                        <div class="card-body ">
                                            <div class="d-flex">
                                                <div class="mr-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="80" height="80">
                                                        <path fill="#6c757d"
                                                            d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2zM9 8V5h2v3h3l-4 4-4-4h3z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h1 class="text-info text-center font-weight-bold">{{$hitung}}</h1>
                                                    <h1 class="text-muted text-center">Total Penutupan</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow">
                                        <div class="card-body ">
                                            <div class="d-flex">
                                                <div class="mr-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="80" height="80">
                                                        <path fill="#6c757d"
                                                            d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2zM5 9l2-2 2 2 4-4 2 2-6 6-4-4z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h1 class="text-info text-center font-weight-bold">{{$hitungPengajuan}}</h1>
                                                    <h1 class="text-muted text-center">Terverifikasi</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('customer')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Hello Welcome back</strong> {{auth()->user()->name}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card border-0 shadow-sm">
                        <div class="d-flex align-item-center px-3 py-3">
                            <div class="mr-auto d-flex align-item-center">

                                <h5 class="text-muted">Total pengajuan yang anda lakukan adalah :
                                </h5>
                                <h5 class="text-info ml-2 font-weight-bold">70</h5>
                            </div>

                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="30"
                                    height="30"
                                    viewBox="0 0 20 20">
                                    <path fill="#D0D0D0"
                                        d="M10.5 20H2a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4a3 3 0 0 1 5.94 0L13 3v1h1a2 2 0 0 1 2 2v1h-2V6h-1v1H3V6H2v12h5v2h3.5zM8 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 4h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2zm0 2v8h8v-8h-8z" />
                                    </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                @forelse ($data as $pengajuan)
                    <div class="col-md-10 mt-4 ">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body ">
                                <div class="py-2 px-2">
                                    <div class="d-flex align-item-center">
                                        <h5 class="text-muted">Pengajuan Asuransi
                                        </h5>
                                        <h5 class="text-info ml-2 font-weight-bold">{{$pengajuan->type->name}}</h5>
                                        <div class="ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                                                <path fill="#D0D0D0"
                                                    d="M10.5 20H2a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4a3 3 0 0 1 5.94 0L13 3v1h1a2 2 0 0 1 2 2v1h-2V6h-1v1H3V6H2v12h5v2h3.5zM8 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 4h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2zm0 2v8h8v-8h-8z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <h6 class="text-muted">{{auth()->user()->name}} ,</h6>
                                        <h6 class="text-info font-weight-bold">{{$pengajuan->status}}</h6>
                                        <div class="ml-auto">
                                            <h6 class="text-muted">{{$pengajuan->created_at->format('Y-m-d')}}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    <div class="col-md-10 mt-4">
                        <div class="text-center">
                            <h3 class="text-muted">
                                Tidak ada pengajuan yang anda buat.
                            </h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    @endrole
@endsection
