<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calon;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageCalonController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalCalon' => Calon::count(),
            'totalPemilih' => Pemilih::count()
        ]);
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
}
