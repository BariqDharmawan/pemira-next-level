<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilihController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalCalon = Calon::count();
        $statusMemilih = Pemilih::select('sudah_memilih')->where('user_id', auth()->id())->first();
        return view('pemilih.dashboard', [
            'totalCalon' => $totalCalon,
            'statusMemilih' => $statusMemilih
        ]);
    }

    public function pilihCalon()
    {
        $semuaCalon = Calon::all();
        $pemilih = Pemilih::where('id', Auth::id())->first();
        return view('pemilih.pilih-calon', [
            'semuaCalon' => $semuaCalon,
            'pemilih' => $pemilih
        ]);
    }

    public function submitCalon($id)
    {

        $calon = Calon::where('id', $id);
        $calon->increment('jumlah_pemilih', 1);

        Pemilih::where('user_id', Auth::id())->update([
            'sudah_memilih' => true,
            'pilihan_kamu' => $calon->first()->id
        ]);

        return redirect()->back()->with(
            'message',
            'kamu berhasil memilih calon bernama ' .
                $calon->first()->user->nama
        );
    }
}
