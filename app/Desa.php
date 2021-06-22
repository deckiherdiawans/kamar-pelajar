<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kota;

class Desa extends Model
{
    public $table = "desa";

    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function kota()
    {
        return $this->hasOne(Kota::class, 'id', 'kota_id');
    }
}
