@extends('layouts.app')

@section('content')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($types as $type)
                            <div class="col-md-4 text-center">
                                <div class="card border-0 shadow">
                                    <div class="card-body">
                                        @if($type->name == 'Motor KOE')
                                            @include('svg.motor')
                                        @elseif($type->name == "Mobil KOE")
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 20 20">
                                                <path fill="#6c757d"
                                                      d="M2 14v-3H1a1 1 0 0 1-1-1 1 1 0 0 1 1-1h1l4-7h8l4 7h1a1 1 0 0 1 1 1 1 1 0 0 1-1 1h-1v6a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1H5v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-3zm13.86-5L13 4H7L4.14 9h11.72zM5.5 14a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm9 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                            </svg>
                                        @elseif($type->name == 'Siswa / Mahasiswa KOE')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 20 20">
                                                <path fill="#6c757d"
                                                    d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
                                            </svg>
                                        @endif
                                        @guest
                                            <div class="text-center py-3">
                                                <a href="{{route('login')}}" class="btn btn-outline-info ">Please SignIn</a>
                                            </div>
                                        @else
                                            <div class="text-center py-3">
                                                <h4 class="text-muted">{{$type->name}}</h4>
                                                <a href="{{route('customer.details.informasi.jenis-asuransi', $type->id)}}" class="btn btn-outline-info ">Ambil Formulir</a>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
@endsection