<?php

use App\Pengajuan;
use App\Poli;
use App\Type;
use Illuminate\Support\Carbon;

function polisNumber(){
    $latestCodePolis = Poli::latest()->first();
    $getDateNow = Carbon::now();

    $getTahun = $getDateNow->format('y');
    $getBulan = $getDateNow->format('m');

    if(! $latestCodePolis){
        return "1022".$getTahun.$getBulan."0001";
    }

    $string = preg_replace("/[^0-9\.]/", '', $latestCodePolis->code_polis);

    return sprintf('%04d', $string + 1);


}