<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calon;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CalonController extends Controller
{

    public function dashboard()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.dashboard', [
                    'totalCalon' => Calon::count(),
                    'totalPemilih' => Pemilih::count()
                ]);
                break;

            case 'calon':
                $profilDirimu = Calon::where('user_id', auth()->id())->first();
                return view('calon.dashboard', ['profilDirimu' => $profilDirimu]);
                break;

            case 'pemilih':
                $profilDirimu = Pemilih::where('user_id', auth()->id())->first();
                return view('pemilih.dashboard', ['profilDirimu' => $profilDirimu]);
                break;
        }
    }

    public function lihatCalon()
    {
        return view('admin.lihat-calon', ['semuaCalon' => Calon::all()]);
    }

    public function tambahCalon()
    {
        return view('admin.tambah-calon');
    }

    public function submitCalon(Request $request)
    {
        $profilCalon = new User;
        $profilCalon->nama = $request->nama_calon;
        $profilCalon->email = $request->email_calon;
        $profilCalon->password = Hash::make('password');
        $profilCalon->save();

        Calon::create([
            'visi' => $request->visi_calon,
            'misi' => $request->misi_calon,
            'user_id' => $profilCalon->id
        ]);

        return redirect()->route('admin.lihat-calon')->with('message', 'berhasil menambah calon baru');
    }

    public function lihatProfile()
    {
        $profilDirimu = Calon::where('user_id', Auth::id())->first();
        return view('calon.lengkapi-data', [
            'profilDirimu' => $profilDirimu
        ]);
    }

    public function updateFoto(Request $request)
    {
        $updateFoto = $request->file('foto');
        $pathFoto = $updateFoto->store('public/files');
        $profilCalon = Calon::where('user_id', auth()->id());

        $fotoLama = $profilCalon->first()->foto;
        if (!empty($fotoLama)) { //jika ada foto lama, apus baru update foto
            Storage::delete($fotoLama);
        }

        Calon::where('user_id', auth()->id())->update([
            'foto' => $pathFoto
        ]);

        return redirect()->back()->with('message', 'kamu berhasil mengupdate profile foto mu');
    }

    public function submitVisiMisi(Request $request)
    {
        Calon::where('user_id', auth()->id())->update([
            'visi' => $request->visi_calon,
            'misi' => $request->misi_calon,
        ]);

        return redirect()->back()->with('message', 'kamu berhasil menambahkan visi dan misi');
    }
}
