<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;


    // public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    protected $table = 'artikel';

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'id_pengguna', 'id');
    }
}
