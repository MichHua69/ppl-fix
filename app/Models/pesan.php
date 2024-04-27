<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    protected $fillable = ["id_pengguna", "id_percakapan", "pesan"];

    public function room()
    {
        return $this->belongsTo(percakapan::class, "id_percakapan");
    }

    public function user()
    {
        return $this->belongsTo(pengguna::class, "id_pengguna");
    }
}