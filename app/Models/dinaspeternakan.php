<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dinaspeternakan extends Model
{
    use HasFactory;

    protected $table = 'dinaspeternakan';
    
    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'id_pengguna', 'id');
    }
}
