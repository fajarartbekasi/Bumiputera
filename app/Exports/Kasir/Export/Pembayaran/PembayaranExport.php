<?php

namespace App\Exports\Kasir\Export\Pembayaran;

use App\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengajuan::all();
    }
}
