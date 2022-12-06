<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $datas = DB::table('pesanan')
                ->join('penyewa', 'penyewa.id_penyewa', '=', 'pesanan.id_penyewa')
                ->join('bus', 'bus.id_bus', '=', 'pesanan.id_bus')
                ->get();

        return view('home.index')
            ->with('datas', $datas);
    }
}