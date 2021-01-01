<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $calons = Calon::all();
        $jadwals = Jadwal::all();
        return view('landing', ['calons' => $calons, 'jadwals' => $jadwals]);
    }
}
