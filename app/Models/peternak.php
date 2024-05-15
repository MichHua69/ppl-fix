<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peternak extends Model
{
    use HasFactory;

    protected $table = 'peternak';

    public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    public function alamat()
    {
        return $this->belongsTo(alamat::class, 'id_alamat', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'id_pengguna', 'id');
    }

}
