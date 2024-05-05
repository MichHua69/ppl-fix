<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;

    protected $table = 'program';

    // public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    public function jadwalprogram()
    {
        return $this->hasMany(jadwalprogram::class, 'id_program', 'id');
    }
}
