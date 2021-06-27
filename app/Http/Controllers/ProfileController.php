<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use App\Negara;
use App\User;

class ProfileController extends Controller
{
    private $negaraRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');  ga perlu lagi karena udah ditulis di web.php
        //$this->middleware('verified'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();     
        $negara = Negara::all();
        return view('profile', compact('user', 'negara'));
    }

    public function update(Request $request)
    {
        try {
            $user = User::find(Auth::user()->id);
            $user->nama_lengkap = ucwords(strtolower($request->input('nama_lengkap')));
            $user->nama_panggilan = ucfirst(strtolower($request->input('nama_panggilan')));
            $user->tanggal_lahir = $request->input('tanggal_lahir');
            $user->telepon = $request->input('telepon');
            $user->gender = $request->input('gender');
            $user->domisili = $request->input('domisili');
            $user->negara_id = $request->input('negara');
            $user->update();
     
            $negara = Negara::all();

            return view('profile', compact('user', 'negara'));
        } catch (\Exception $e) {
            //dd($e);
            return redirect()->back()->with('error','Ada yang salah nih, simpan data ngga berhasil.');
        }
    }
}
