<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

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
        return view('home');
    }
    public function cetak(){
        $semuaTransaksi = Transaksi::where('status', 'selesai')->get();
        return view('cetak')->with([
            'semuaTransaksi' => $semuaTransaksi
        ]);
    }
}
