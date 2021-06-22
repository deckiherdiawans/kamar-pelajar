<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('negara')->insert([
            'kode' => 'ID',
            'kode_iso3' => 'IDN',
            'nama' => 'Indonesia',
            'nama_inggris' => 'Indonesia',
            'lat' => 0.7893,
            'lon' => 113.9213,
            'kode_telepon' => '62',
            'mata_uang' => 'IDR',
        ]);
    }
}
