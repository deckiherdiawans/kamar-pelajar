<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $desa = Desa::orderBy('nama')->get();

        return view('kamar.desa', compact('desa'));
    }
}
