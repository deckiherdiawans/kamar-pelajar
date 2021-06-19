<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    public $table = 'negara';

    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}