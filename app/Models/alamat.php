<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    protected $table = 'alamat';

    public function wilayah()
    {
        return $this->belongsTo(wilayah::class, 'id_wilayah', 'id');
    }

    public function puskeswan()
    {
        return $this->hasOne(puskeswan::class, 'id_alamat', 'id');
    }

    public function peternak()
    {
        return $this->hasOne(peternak::class, 'id_alamat', 'id');
    }
}
