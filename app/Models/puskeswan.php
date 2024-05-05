<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puskeswan extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    protected $table = 'puskeswan';

    public function alamat()
    {
        return $this->belongsTo(alamat::class, 'id_alamat', 'id');
    }

    public function dokterhewan()
    {
        return $this->hasMany(dokterhewan::class, 'id_puskeswan', 'id');
    }

    public function jadwalprogram()
    {
        return $this->hasMany(jadwalprogram::class, 'id_program', 'id');
    }
}
