<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function managePemilih()
    {
        $semuaPemilih = Pemilih::with('user')->get();
        $total = Pemilih::count();

        return view('admin.manage-pemilih', [
            'semuaPemilih' => $semuaPemilih,
            'totalPemilih' => $total
        ]);
    }

    public function tambahPemilih()
    {
        $user = User::create([
            'nama' => request('nama'),
            'email' => request('email'),
            'password' => Hash::make('password'),
        ]);

        Pemilih::create([
            'nim' => request('nim'),
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.manage-pemilih')->with(
            'message',
            'Kamu berhasil menambah pemilih'
        );
    }

    public function hapusPemilih($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        $profile = User::findOrFail($pemilih->user_id);

        $pemilih->delete();
        $profile->delete();

        if (!is_null($pemilih->pilihan_kamu)) {
            Calon::where('id', $pemilih->pilihan_kamu)->decrement('jumlah_pemilih');
        }

        return redirect()->route('admin.manage-pemilih')->with(
            'message',
            'kamu berhasil menghapus pemilih dengan nama ' . $profile->getOriginal('nama')
        );
    }

    public function gantiPassword()
    {
        User::where('id', auth()->id())->update([
            'password' => Hash::make(request('password'))
        ]);

        return redirect()->route('pemilih.dashboard')->with(
            'message',
            'Kamu berhasil mengganti password'
        );
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
