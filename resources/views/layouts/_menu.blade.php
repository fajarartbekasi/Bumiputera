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

                    @endauth
                    <li class="nav-item">
                        <a href="{{route('customer.lihat.jenis-asuransi')}}" class="nav-link text-info @yield('jenis-asuransi')">Cek Jenis Asuransi</a>
                    </li>
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