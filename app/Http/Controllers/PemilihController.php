<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pemilih;
use App\Models\User;
use App\Rules\CheckPasswordValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PemilihController extends Controller
{

    private $you;

    public function __construct()
    {
        $this->you = Pemilih::where('user_id', Auth::id());
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalCalon = Calon::count();
        $statusMemilih = Auth::user()->pemilih->pilihan_kamu != null ? 'sudah' : 'belum';
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
            'password' => Hash::make('password')
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
        return view('pemilih.ganti-pw', [
            'pemilih' => $this->you->first()
        ]);
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'max:100', new CheckPasswordValidation]
        ]);

        User::where('id', auth()->id())->update([
            'password' => Hash::make($request->password)
        ]);

        $this->you->update(['is_password_changed' => true]);

        return redirect()->route('pemilih.dashboard')->with(
            'message',
            'Kamu berhasil mengganti password'
        );
    }

    public function pilihCalon()
    {
        $semuaCalon = Calon::all();
        return view('pemilih.pilih-calon', [
            'semuaCalon' => $semuaCalon,
            'pemilih' => Auth::user()->pemilih
        ]);
    }

    public function submitCalon($id)
    {
        $calon = Calon::where('id', (int) $id);
        $calon->increment('jumlah_pemilih', 1);


        Auth::user()->pemilih->update([
            'pilihan_kamu' => $calon->first()->id
        ]);

        return redirect()->back()->with(
            'message',
            'kamu berhasil memilih calon bernama ' .
                $calon->first()->user->nama
        );
    }
}
