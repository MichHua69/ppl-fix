<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokterhewan extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    protected $table = 'dokterhewan';

    public function puskeswan()
    {
        return $this->belongsTo(puskeswan::class, 'id_puskeswan', 'id');
    }

    public function alamat()
    {
        return $this->belongsTo(alamat::class, 'id_alamat', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'id_pengguna', 'id');
    }
}