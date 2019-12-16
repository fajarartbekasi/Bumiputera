<?php

namespace App\Http\Controllers\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        /**
         * redirect to page tentang kami
         */

         return view('about.index');
    }
}
