@component('mail::message')
# Introduction

Hello, {{$pengajuan->user->name}},
kami dari pihak asuransi Bumida1967 ingin memberitahukan untuk status pengajuan asuransi saat in
yaitu {{$pengajuan->status}}. kami akan memberitahukan informasi terkait pengajuan anda harap sabar
menunggu.

terimakasih telah mempercayai kami sebagai pilihan asuransi anda.

Thanks,<br>
PT. Asuransi Umum Bumida 1967
@endcomponent
