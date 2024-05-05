<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalprogram extends Model
{
    use HasFactory;

    protected $table = 'jadwalprogram';

    // public $timestamps  = false;

    protected $guarded  = [
        'id'
    ];

    public function program()
    {
        return $this->belongsTo(program::class, 'id_program', 'id');
    }
    public function puskeswan()
    {
        return $this->belongsTo(puskeswan::class, 'id_puskeswan', 'id');
    }


}
