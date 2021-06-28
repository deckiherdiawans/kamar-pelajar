<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    public $table = 'negara';

    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'nama',
        'nama_inggris',
        'kode_iso_2',
        'kode_iso_3',
        'latitude',
        'longitude',
        'kode_telepon',
        'mata_uang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'nama_inggris' => 'string',
        'kode_iso_2' => 'string',
        'kode_iso_3' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'kode_telepon' => 'string',
        'mata_uang' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|string|max:191',
        'nama_inggris' => 'nullable|string|max:191',
        'kode_iso_2' => 'required|integer',
        'kode_iso_3' => 'nullable|string|max:191',
        'latitude' => 'nullable|double',
        'longitude' => 'nullable|double',
        'kode_telepon' => 'required|string|max:191',
        'mata_uang' => 'required|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];   
}