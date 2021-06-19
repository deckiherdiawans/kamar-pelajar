<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kota;
use App\Negara;

class Kamar extends Model
{
    public $table = "kamar";
    
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $guarded = [];

    public function kota() {
        return $this->hasOne(Kota::class, 'id', 'kota_id');
    }
    
    public function negara()
    {
        return $this->hasOne(Negara::class, 'id', 'negara_id');
    }
}