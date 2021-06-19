<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\Kamar;
use App\Negara;
use App\User;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        $kamar = Kamar::all();
        return view('kamar.cari', compact('kamar'));
    }

    public function showOneRoom($id)
    {
        $query = [['id', '=', $id]];
        $kamar = Kamar::with(['negara'])->where($query)->where('aktif', 1)->get();

        if ($kamar->count() == 0)
            return redirect()->route('kamar')->with('failed', 'Kamar yang kamu cari tidak ditemukan.');

        $negara = $this->getNegaraDistinct($query);
        $kota = $this->getKotaDistinct($query);
        //dd($kamar[0]);
        return view('kamar.detail', compact('kamar', 'negara', 'kota', 'query'));
    }

    public function getNegaraDistinct()
    {
        return Kamar::distinct()->select(['negara_id'])->where('aktif', 1)->orderBy('negara_id')->get();
    }

    public function getKotaDistinct($query)
    {
        return Kamar::distinct()->select(['kota_id'])->where($query)->where('aktif', 1)->orderBy('kota_id')->get();
    }
}