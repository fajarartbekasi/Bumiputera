<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(4);

        return view('welcome', compact('types'));
    }
}
