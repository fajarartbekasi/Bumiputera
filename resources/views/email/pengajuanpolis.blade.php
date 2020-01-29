@component('mail::message')
# Introduction

Hello {{$pengajuan->user->name}},
Terimakasih atas permintaan yang anda ajukan.
kami telah melakukan verifikasi pengajuan anda saat ini status pengajuan anda adalah
{{$pengajuan->status}}
Silahkan anda melakukan pembayaran sebesar
Rp. {{number_format($pengajuan->premi , 2)}}

silahkan melakukan upload bukti transaksi pembayaran anda melalui link dibawah ini
@component('mail::button', ['url' => "http://localhost/Bumiputera/customer/ambil/formulir/bukti-pembayaran/{$pengajuan->id}"])
Button Text
@endcomponent

Thanks,<br>
PT. Asuransi Umum Bumida 1967
@endcomponent
