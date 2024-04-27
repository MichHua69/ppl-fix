<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wilayah extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    protected $table = 'wilayah';
    
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(desa::class, 'id_desa');
    }

    public function alamat()
    {
        return $this->hasMany(alamat::class, 'id_wilayah', 'id');
    }
}
