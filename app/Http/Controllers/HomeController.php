<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $user = auth()->user()->id;
        }
        $hitungPengajuan = Pengajuan::where('status', 'verifikasi pembayaran')->count();
        $hitung= Pengajuan::all()->count();

        $getTotalPengajuanUser = Pengajuan::with('user')->where('user_id', $user)->count();

        $data = Pengajuan::with('user')->where('user_id', $user)->paginate(5);

        return view('home', compact(['data', 'hitungPengajuan','hitung', 'getTotalPengajuanUser', 'user']));
    }
}
