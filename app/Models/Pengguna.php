<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Pengguna;
use App\Models\role;
use App\Models\dokterhewan;
use App\Models\peternak;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];

    protected $table = 'pengguna';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Checking if user can join a room
    public function canJoinRoom($roomId)
    {
        $room = percakapan::findOrFail($roomId);
        $users = explode(':', $room->users);
        return in_array($this->id, $users);
    }

    // Relationship to the role
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    // Relationship to dokterhewan (veterinarian)
    public function dokterhewan()
    {
        return $this->hasOne(Dokterhewan::class, 'id_pengguna', 'id');
    }

    // Relationship to peternak (farmer)
    public function peternak()
    {
        return $this->hasOne(Peternak::class, 'id_pengguna', 'id');
    }

    // Relationship to dinaspeternakan (livestock department)
    public function dinaspeternakan()
    {
        return $this->hasOne(Dinaspeternakan::class, 'id_pengguna', 'id');
    }

    // Relationship to artikel (article)
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_pengguna', 'id');
    }

    // Relationship to laporan (report)
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_peternak', 'id');
    }
}