<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bumiptera</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/_welcome.css') }}" rel="stylesheet">

    </head>
    <body class="bg-white">
        <nav class="navbar navbar-pills navbar-expand-md navbar-light bg-white navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('logo/logo.png')}}"  height="50" alt="">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link text-muted ">home</a>
                            </li>
                            @role('kasie teknik')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted @yield('kategori')" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        Kategori Premi
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('kasie.cek-data.kategori.motor-koe')}}">
                                        Motor KOE
                                        </a>
                                        <a class="dropdown-item" href="{{route('kasie.cek-data.kategori.mobil-koe')}}">
                                            Mobil KOE
                                        </a>
                                        <a class="dropdown-item" href="{{route('kasie.cek-data.kategori.siswa-mahasiswa-koe')}}">
                                            Siswa / Mahasiswa KOE
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('kasie.cek.penutupan.asuransi.status.waitting-list')}}" class="nav-link @yield('permintaan-asuransi') ">Data permintaan penutupan asuransi</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted @yield('invitations')" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Invitations
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('kasie.invitations.petugas')}}">
                                            Pegawai
                                        </a>
                                        <a class="dropdown-item" href="{{route('kasie.invitations.customers')}}">
                                            Customer
                                        </a>
                                    </div>
                                </li>
                            @endrole

                            @role('staff teknik')
                                <li class="nav-item">
                                    <a href="{{route('staff.cek.data.pengajuan.polis')}}" class="nav-link text-muted @yield('pengajuan-polis')">Data Pengajuan Polis</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('staff.cek.data.polis.status.verifikasi-pembayaran')}}" class="nav-link text-muted @yield('verifikasi-pembayaran')">Verifikasi pembayaran</a>
                                </li>
                            @endrole

                            @role('kasir')
                                <li class="nav-item">
                                    <a href="{{route('kasir.cek.data.pembayaran')}}" class="nav-link  text-muted @yield('pembayaran')">Data pembayaran</a>
                                </li>
                            @endrole
                            <li class="nav-item">
                                <a href="{{route('customer.lihat.jenis-asuransi')}}" class="nav-link @yield('jenis-asuransi')">Asuransi</a>
                            </li>
                        @endauth
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-blue-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-blue-dark" href="{{ route('customer.ambil-formulir.registrasi') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            @role('customer')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a href="{{route('customer.edit-data', Auth()->user()->id)}}" class="dropdown-item" >
                                        update akun
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endrole

                            @role('kasie teknik|staff teknik|kasir')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endrole

                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main">
            <section class="jumbotron text-right">
                <div class="container">
                    <h1 class="jumbotron-heading font-weight-bold mb-4">Bumiputera1997</h1>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Bergabung Bersama Kami</a>
                        <a href="#" class="btn btn-secondary my-2">Lihat Jenis Asuransi</a>
                    </p>
                </div>
            </section>
            <div class="pt-5 ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center mb-3">
                                <h3>Dapatkan Asuransi Terbaik di Indonesia
                                    Perlindungan Lengkap Biaya Terjangkau
                                </h3>
                                <h5 class="text-muted">
                                    Layaknya berinvestasi – asuransi akan melindungi biaya atas risiko
                                    yang mungkin terjadi pada diri sendiri,
                                    orang-orang terdekat, dan berbagai aset yang Anda miliki.
                                    Tentukan pilihan dengan membandingkan puluhan asuransi yang
                                    ditawarkan dan memiliki premi termurah serta perlindungan lengkap.
                                    Dapatkan asuransi sesuai kebutuhan – mulai dari asuransi kendaraan,
                                    asuransi perjalanan, atau asuransi kesehatan.
                                 </h5>
                                 <p class="text-muted">
                                    Bumiputera1997.com menyederhanakan proses pengajuan secara online agar Anda dapat menemukan produk asuransi terbaik di Indonesia. Bekerjasama dengan berbagai perusahaan asuransi unggulan di Indonesia, kami menyediakan perbandingan produk terbaik yang Anda butuhkan.
                                 </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        @forelse($types as $type)
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-white border-0">
                                        <h3 class="text-info text-center">{{$type->name}}</h3>
                                    </div>
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-center">
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                width="150" height="150" viewBox="0 0 1136.000000 1280.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                                                fill="#000000" stroke="none">
                                                    <path d="M5450 11879 c-459 -52 -892 -262 -1217 -591 -180 -181 -290 -337
                                                    -397 -559 -378 -785 -218 -1720 401 -2336 316 -315 733 -521 1170 -578 132
                                                    -17 391 -20 513 -5 382 48 749 202 1043 439 367 297 629 727 722 1186 120 594
                                                    -29 1213 -405 1684 -341 427 -840 701 -1382 760 -112 13 -338 12 -448 0z"/>
                                                    <path d="M4285 7773 c-22 -9 -87 -34 -143 -56 l-104 -39 -132 -132 c-336 -333
                                                    -540 -730 -641 -1245 -25 -132 -55 -384 -55 -470 l0 -49 78 -17 c164 -36 307
                                                    -120 440 -259 258 -269 404 -652 437 -1152 l6 -90 -93 -79 c-51 -43 -97 -82
                                                    -101 -86 -5 -4 -3 -17 3 -29 20 -38 15 -114 -10 -155 -44 -72 -154 -98 -221
                                                    -52 -51 34 -79 82 -79 134 0 60 25 110 69 138 50 32 90 39 139 22 l42 -15 85
                                                    60 c97 68 92 50 75 233 -50 541 -295 987 -637 1159 -127 63 -315 85 -448 51
                                                    -400 -103 -709 -568 -774 -1167 -6 -54 -11 -126 -11 -160 l1 -63 76 -51 c70
                                                    -47 79 -51 109 -42 72 19 158 -28 189 -104 42 -106 -39 -218 -158 -218 -116 0
                                                    -197 139 -138 236 l19 32 -89 76 -89 77 0 53 c0 333 122 753 295 1015 135 205
                                                    333 366 509 417 l64 18 6 101 c44 665 257 1221 622 1625 l59 64 -98 -52 c-517
                                                    -276 -981 -682 -1340 -1174 -415 -569 -692 -1277 -785 -2009 l-19 -144 65 -95
                                                    c629 -919 1723 -1497 3167 -1674 404 -50 1062 -71 1475 -47 1268 74 2243 391
                                                    3000 977 224 173 539 507 710 754 l52 75 -6 79 c-17 211 -93 555 -183 829
                                                    -126 387 -279 699 -508 1042 -334 499 -751 905 -1265 1233 -124 79 -350 205
                                                    -350 195 0 -3 32 -39 71 -81 205 -220 395 -529 514 -835 37 -97 107 -331 117
                                                    -391 2 -15 18 -22 73 -33 84 -16 212 -77 278 -132 101 -84 179 -208 212 -336
                                                    19 -76 19 -224 0 -300 -55 -218 -239 -404 -455 -460 -84 -22 -226 -23 -309 -1
                                                    -209 54 -381 215 -447 419 -38 118 -38 267 0 384 59 182 201 330 380 398 72
                                                    27 70 14 20 190 -119 414 -338 786 -644 1096 -159 161 -394 348 -414 329 -2
                                                    -3 -300 -529 -661 -1170 -361 -641 -666 -1180 -677 -1198 l-20 -33 -580 1083
                                                    c-319 596 -608 1136 -641 1200 -39 73 -68 117 -77 117 -8 -1 -33 -8 -55 -16z
                                                    m2705 -3123 l0 -210 210 0 210 0 0 -180 0 -180 -210 0 -210 0 0 -210 0 -210
                                                    -180 0 -180 0 0 210 0 210 -215 0 -215 0 0 180 0 180 215 0 215 0 0 210 0 210
                                                    180 0 180 0 0 -210z"/>
                                                    <path d="M8140 5981 c-142 -46 -234 -134 -279 -269 -84 -247 95 -517 357 -539
                                                    125 -10 237 31 328 121 221 222 127 593 -173 686 -79 24 -160 25 -233 1z"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-white d-flex justify-content-center">
                                        <a href="{{route('customer.details.informasi.jenis-asuransi', $type->id)}}" class="btn btn-info">
                                            Detail information
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>

        </main>

        <footer class="text-muted">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <p class="text-muted">Kontak Kami</p>
                        <p>
                            Ruko Bekasi Mas, Jl. Jend. Ahmad Yani No.10, RT.004/RW.003, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17141
                        </p>
                        <p>Telphone : (021) 8858957</p>
                        <p>Jam Kerja : (Senin-Jumat 9:00-17:00)</p>
                        <p>E-mail : </p>

                        <div class="pt-4 mb-3">
                            <p>Ikuti Kami</p>
                            <div class="flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 64 64"
                                     width="44px"
                                     height="44px">
                                     <linearGradient id="rhA40cqBlsJ1wx2ZjgJTqa" x1="32.526" x2="32.526" y1="16.627" y2="56.834" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient><path fill="url(#rhA40cqBlsJ1wx2ZjgJTqa)" d="M35.52,38.891h6.729l1.057-6.835H35.52v-3.736c0-2.839,0.928-5.358,3.584-5.358h4.268v-5.966c-0.75-0.101-2.335-0.323-5.332-0.323c-6.258,0-9.926,3.305-9.926,10.834v4.548h-6.433v6.835h6.433v17.788C29.385,56.869,30.676,57,32,57c1.197,0,2.366-0.109,3.52-0.266V38.891z"/>
                                     <linearGradient id="rhA40cqBlsJ1wx2ZjgJTqb" x1="32" x2="32" y1="58" y2="6" gradientTransform="matrix(1 0 0 -1 0 64)" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#1a6dff"/>
                                        <stop offset="1" stop-color="#c822ff"/>
                                     </linearGradient><path fill="none" stroke="url(#rhA40cqBlsJ1wx2ZjgJTqb)" stroke-miterlimit="10" stroke-width="2" d="M32 7A25 25 0 1 0 32 57A25 25 0 1 0 32 7Z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 64 64"
                                     width="44px"
                                     height="44px">
                                     <linearGradient id="SUJNhpmDQDF27Y3OfwgfYa" x1="19" x2="19" y1="24.858" y2="49.041" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient>
                                        <path fill="url(#SUJNhpmDQDF27Y3OfwgfYa)" fill-rule="evenodd" d="M22 48L22 26 16 26 16 48 22 48z" clip-rule="evenodd"/>
                                     <linearGradient id="SUJNhpmDQDF27Y3OfwgfYb" x1="19.382" x2="19.382" y1="15.423" y2="23.341" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient>
                                     <path fill="url(#SUJNhpmDQDF27Y3OfwgfYb)" fill-rule="evenodd" d="M19.358,23c2.512,0,4.076-1.474,4.076-3.554 c-0.047-2.126-1.564-3.649-4.028-3.649c-2.465,0-4.076,1.475-4.076,3.601c0,2.08,1.563,3.602,3.981,3.602H19.358L19.358,23z" clip-rule="evenodd"/>
                                        <linearGradient id="SUJNhpmDQDF27Y3OfwgfYc" x1="37.386" x2="37.386" y1="14.125" y2="49.525" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                            <stop offset="0" stop-color="#6dc7ff"/>
                                            <stop offset="1" stop-color="#e6abff"/>
                                        </linearGradient><path fill="url(#SUJNhpmDQDF27Y3OfwgfYc)" fill-rule="evenodd" d="M26.946,48H34V35.911c0-0.648,0.122-1.295,0.313-1.758 c0.52-1.295,1.877-2.635,3.867-2.635c2.607,0,3.821,1.988,3.821,4.901V48h6V35.588c0-6.657-3.085-9.498-7.826-9.498 c-3.886,0-5.124,1.91-6.072,3.91H34v-4h-7.054c0.095,2-0.175,22-0.175,22H26.946z" clip-rule="evenodd"/>
                                        <linearGradient id="SUJNhpmDQDF27Y3OfwgfYd" x1="32" x2="32" y1="6.5" y2="57.5" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                            <stop offset="0" stop-color="#1a6dff"/>
                                            <stop offset="1" stop-color="#c822ff"/>
                                        </linearGradient>
                                        <path fill="url(#SUJNhpmDQDF27Y3OfwgfYd)" d="M50,57H14c-3.859,0-7-3.141-7-7V14c0-3.859,3.141-7,7-7h36c3.859,0,7,3.141,7,7v36 C57,53.859,53.859,57,50,57z M14,9c-2.757,0-5,2.243-5,5v36c0,2.757,2.243,5,5,5h36c2.757,0,5-2.243,5-5V14c0-2.757-2.243-5-5-5H14z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 64 64"
                                     width="44px"
                                     height="44px">
                                     <linearGradient id="7sJyQCZzdsESd~lp6E9tqa" x1="32" x2="32" y1="16.25" y2="48.312" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient>
                                     <path fill="url(#7sJyQCZzdsESd~lp6E9tqa)" d="M26.064,45.003c12.076,0,18.68-10.005,18.68-18.68c0-0.284-0.006-0.567-0.019-0.849 c1.282-0.927,2.396-2.083,3.275-3.399c-1.176,0.523-2.442,0.875-3.77,1.034c1.355-0.813,2.396-2.099,2.887-3.632 c-1.269,0.752-2.673,1.299-4.169,1.594c-1.198-1.276-2.904-2.074-4.792-2.074c-3.626,0-6.566,2.94-6.566,6.565 c0,0.515,0.058,1.016,0.17,1.497c-5.456-0.274-10.295-2.887-13.532-6.859c-0.564,0.97-0.889,2.097-0.889,3.3 c0,2.278,1.159,4.289,2.922,5.465c-1.077-0.033-2.089-0.329-2.974-0.821c-0.001,0.027-0.001,0.055-0.001,0.084 c0,3.18,2.263,5.834,5.267,6.436c-0.551,0.15-1.132,0.231-1.731,0.231c-0.423,0-0.834-0.042-1.234-0.118 c0.836,2.608,3.259,4.506,6.133,4.56c-2.247,1.761-5.078,2.81-8.154,2.81c-0.53,0-1.052-0.03-1.566-0.091 C18.906,43.916,22.356,45.003,26.064,45.003"/><linearGradient id="7sJyQCZzdsESd~lp6E9tqb" x1="32" x2="32" y1="5.25" y2="59.38" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#1a6dff"/><stop offset="1" stop-color="#c822ff"/></linearGradient><path fill="url(#7sJyQCZzdsESd~lp6E9tqb)" d="M32,58C17.663,58,6,46.337,6,32S17.663,6,32,6s26,11.663,26,26S46.337,58,32,58z M32,8 C18.767,8,8,18.767,8,32s10.767,24,24,24s24-10.767,24-24S45.233,8,32,8z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 64 64"
                                     width="44px"
                                     height="44px">
                                     <linearGradient id="jm_nAfYbxsVmTlYr5N4x9a" x1="32" x2="32" y1="6.667" y2="57.872" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#1a6dff"/>
                                        <stop offset="1" stop-color="#c822ff"/>
                                      </linearGradient>
                                        <path fill="url(#jm_nAfYbxsVmTlYr5N4x9a)" d="M44,57H20c-7.168,0-13-5.832-13-13V20c0-7.168,5.832-13,13-13h24c7.168,0,13,5.832,13,13v24 C57,51.168,51.168,57,44,57z M20,9C13.935,9,9,13.935,9,20v24c0,6.065,4.935,11,11,11h24c6.065,0,11-4.935,11-11V20 c0-6.065-4.935-11-11-11H20z"/>
                                     <linearGradient id="jm_nAfYbxsVmTlYr5N4x9b" x1="32" x2="32" y1="18.167" y2="45.679" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient><path fill="url(#jm_nAfYbxsVmTlYr5N4x9b)" d="M32,45c-7.168,0-13-5.832-13-13c0-7.168,5.832-13,13-13c7.168,0,13,5.832,13,13 C45,39.168,39.168,45,32,45z M32,23c-4.962,0-9,4.038-9,9c0,4.963,4.038,9,9,9c4.963,0,9-4.037,9-9C41,27.038,36.963,23,32,23z"/>
                                     <linearGradient id="jm_nAfYbxsVmTlYr5N4x9c" x1="46" x2="46" y1="12.75" y2="23.049" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                        <stop offset="0" stop-color="#6dc7ff"/>
                                        <stop offset="1" stop-color="#e6abff"/>
                                     </linearGradient><path fill="url(#jm_nAfYbxsVmTlYr5N4x9c)" d="M46 15A3 3 0 1 0 46 21A3 3 0 1 0 46 15Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="text-muted">Tentang Bumiputera1997</p>
                        <p>Apa itu Bumiputera1997 ?</p>
                        <p>Hubungi Kami</p>
                        <p>Karir</p>
                        <p>Artikel</p>
                    </div>
                    <div class="col-md-3">
                        <p class="text-muted">Lainnya</p>
                        <p>Syarat dan ketentuan berlaku</p>
                        <p>Kebijakan Privasi</p>
                        <p>Direktori situs</p>
                    </div>
                </div>
                <p class="float-right mb-4">
                    <a href="#"class="btn btn-info text-white" >Back to top</a>
                </p>
            </div>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(function () {
                'use strict'
                $('[data-toggle="offcanvas"]').on('click', function () {
                    $('.offcanvas-collapse').toggleClass('open')
                })
            })
        </script>
    </body>
</html>
