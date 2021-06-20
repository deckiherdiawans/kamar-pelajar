<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Negara;

class Kota extends Model
{
    public $table = "kota";

    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function negara()
    {
        return $this->hasOne(Negara::class, 'id', 'negara_id');
    }
}