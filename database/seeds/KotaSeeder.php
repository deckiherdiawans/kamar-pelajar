<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kota')->insert([
            'negara_id' => 2,
            'nama' => 'Bandung', 
        ]);
    }
}