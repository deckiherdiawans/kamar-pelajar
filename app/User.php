<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Negara;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'users';

    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['tanggal_lahir'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_panggilan',
        'nama_lengkap',
        'telepon',
        'email',
        'password',
        'domisili',
        'negara_id',
        'tanggal_lahir',
        'gender',
        'agama',
        'pendidikan',
        'universitas',
        'facebook',
        'foto_id_card',
        'referal',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function negara()
    {
        return $this->hasOne(Negara::class, 'id', 'negara_id');
    }
}