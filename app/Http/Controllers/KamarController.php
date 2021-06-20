<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Kota;
use App\Negara;
use App\User;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        $inegara = $request->input('negara');
        $ijenis_kamar = $request->input('kamar');
        $ikota = $request->input('kota');
        $min = $request->input('hargaMin');
        $max = $request->input('hargaMax');

        $query = [];

        // cari jenis kamar
        if ($ijenis_kamar) 
        {
            $jenis_kamars = JenisKamar::where('nama', $ijenis_kamar)->first();
            if($jenis_kamars) 
            {
                $query[0] = ['jenis_kamar_id', '=', $jenis_kamars->id];
            }        
        }

        // kota
        if ($ikota) 
        {
            $kotas = Kota::where('nama', $ikota)->first();
            if($kotas) 
            {
                $query[1] = ['kota_id', '=', $kotas->id];
            }        
        }

        // negara
        if ($inegara) 
        {
            $negaras = Negara::where('nama', $inegara)->first();
            if($negaras) 
            {
                $query[2] = ['negara_id', '=', $negaras->id];
            }        
        }

        // min
        if ($min) {
            $query[4] = ['harga', '>=', $min];
        }

        // max
        if ($max) {
            $query[3] = ['harga', '<=', $max];
        }

        return $this->runSearch($query);
    }

    public function showAllByNation($kode)
    {
        $query = [['negara_id', '=', $kode]];
        return $this->runSearch($query);
    }

    public function showOneRoom($id)
    {
        $query = [['id', '=', $id]];
        $kamar = Kamar::with(['negara'])->where($query)->where('aktif', 1)->get();

        if ($kamar->count() == 0)
            return redirect()->route('kamar')->with('failed', 'Kamar yang kamu cari tidak ditemukan.');

        $kota = $this->getCityDistinct($query);
        $negara = $this->getNationDistinct($query);
        //dd($kamar[0]);
        
        return view('kamar.detail', compact('kamar', 'negara', 'kota', 'query'));
    }

    public function runSearch($query)
    {
        // dd($query);         
        $kamar = Kamar::where($query)->where('aktif', 1)->get();
        $kota = $this->getCityDistinct($query);
        $negara = $this->getNationDistinct($query);
        //dd($kamar);
        return view('kamar.cari', compact('kamar', 'kota', 'negara', 'query'));
    }

    public function getCityDistinct($query)
    {
        return Kamar::distinct()->select(['kota_id'])->where($query)->where('aktif', 1)->orderBy('kota_id')->get();
    }

    public function getNationDistinct()
    {
        return Kamar::distinct()->select(['negara_id'])->where('aktif', 1)->orderBy('negara_id')->get();
    }
}