<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'polis';

    protected $guarded = [];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
