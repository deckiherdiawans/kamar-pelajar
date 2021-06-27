<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FotoKamar;
use App\JenisKamar;
use App\JenisKasur;
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

    public function create()
    {
        if (Auth::check()) {
            $user = $this->user;
            $kamar = Kamar::with(['kotanya'])->where('host_id', $user->id)->get();

            if ($kamar->count() > 0)
                return redirect()->route('kamar.edit', $kamar[0])->with('pesan', 'Saat ini kamu cuma bisa punya 1 kamar saja.');
        }

        $jenis_kasur = JenisKasur::pluck('nama', 'id');
        $jenis_kamar = JenisKamar::pluck('nama', 'id');
        $negara = Negara::pluck('nama', 'id');

        return view('kamar.baru', compact('jenis_kasur', 'jenis_kamar', 'negara'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // if kota exist, get id. otherwise, create then get id.
            $kota = Kota::where('nama', $request->kota)->orWhere('nama_inggris', $request->kota)->get();

            $kota_id = null;

            if ($kota->count() > 0) {
                $kota_id = $kota[0]->id;
            } else {
                $kota = Kota::create ([
                    'negara_id' => $request->negara,
                    'nama' => $request->kota,
                    'nama_inggris' => $request->kota
                ]);

                $kota_id = $kota->id;
            }

            if (Auth::check() != true) {
                $this->user = User::create([
                    'nama_lengkap' => $request->nama,
                    'email' => $request->email,
                    'telepon' => $request->telepon,
                    'password' => Hash::make($request->password),
                    'referal'  => $request->referal
                ]);
            }

            //edit or create new
            if ($request->kamar_id > 0) {
                $kamar = Kamar::where('id', $request->kamar_id)->update([
                    'host_id' => $this->user->id,
                    'jenis_kamar_id' => $request->jenis_kamar,
                    'jenis_kasur_id' => $request->jenis_kasur,
                    'alamat' => $request->alamat,
                    'kota_id' => $kota_id,
                    'negara_id' => $request->negara,
                    'kode_pos' => $request->kode_pos,
                    'harga' => $request->harga,
                    'peraturan' => $request->peraturan,
                    'deskripsi' => $request->deskripsi,
                    'durasi_maksimal' => $request->durasi_maksimal,
                    'kapasitas' => $request->kapasitas,
                    'preferensi_gender' => $request->preferensi_gender,
                    'aktif' => true
                ]);
            } else {
                $kamar = Kamar::create([
                    'host_id' => $this->user->id,
                    'jenis_kamar_id' => $request->jenis_kamar,
                    'jenis_kasur_id' => $request->jenis_kasur,
                    'alamat' => $request->alamat,
                    'kota_id' => $kota_id,
                    'negara_id' => $request->negara,
                    'kode_pos' => $request->kode_pos,
                    'harga' => $request->harga,
                    'peraturan' => $request->peraturan,
                    'deskripsi' => $request->deskripsi,
                    'durasi_maksimal' => $request->durasi_maksimal,
                    'kapasitas' => $request->kapasitas,
                    'preferensi_gender' => $request->preferensi_gender,
                    'aktif' => false
                ]);
            }
            
            /*
            if ($request->hasFile('foto_kamar')) {
                $files = $request->file('foto_kamar');
                foreach ($files as $file) {
                    $filename = $file->store('public/foto_kamar');
                    FotoKamar::create([
                        'kamar_id' => $kamar->id,
                        'url_foto' => $filename
                    ]);
                }
            }
            */

            DB::commit();

            return redirect()->route('kamar')->with('success', 'Kamar berhasil disimpan. Kalau kamu baru buat akun, silakan login dan lakukan verifikasi email.');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Ada yang error nih simpan datanya.');
        }
    }
}