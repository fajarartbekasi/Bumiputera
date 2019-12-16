<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premi extends Model
{
    protected $table = 'premis';

    protected $fillable = [
                            'type_id',
                            'price',
                            'premi_1',
                            'premi_2',
                            'premi_3',
                            'premi_4',
                            'premi_5',
                            'premi_6',
                            'premi_7',
                            'premi_8',
                            'cost_premi',
                        ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function pengajuans()
    {
        return $this->hasMany(Customer::class);
    }
}
