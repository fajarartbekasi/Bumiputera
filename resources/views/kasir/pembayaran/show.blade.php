@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center py-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        @if ($payment->status = 'Motor KOE')
                        @include('kasir.pembayaran.content.motor')
                        @elseif($payment->status = 'Mobil KOE')
                        @include('kasir.pembayaran.content.mobil')
                        @elseif($payment->status = 'Siswa / Mahasisw KOE')
                        @include('kasir.pembayaran.content.siswa')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection