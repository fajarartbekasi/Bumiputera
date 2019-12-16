<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuans';

    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function premi()
    {
        return $this->belongsTo('App\Premi');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    public function polis()
    {
        return $this->hasMany(Polis::class);
    }
}
