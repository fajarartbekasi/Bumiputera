<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';

    protected $guarded = [];

    public function pengajuan()
    {
        return $this->belongsTo('App\Pengajuan');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
