<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
                            'name',
                            'code_premi',
                            'manfaat',
                            'description'
                          ];

    public function premis()
    {
        return $this->hasMany('App\Premi');
    }
    public function pengajuans()
    {
        return $this->hasMany('App\Pengajuan');
    }
}
