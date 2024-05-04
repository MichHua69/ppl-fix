<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = [
        'id'
    ];

    protected $table = 'pengguna';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canJoinRoom($roomId){
        $granted = false;
        $room = percakapan::findOrFail($roomId);
        $users = explode(':',$room->users);
        foreach ($users as $id) {
            if ($this->id == $id) {
                $granted = true;
            }
        }
        return $granted;
    }

    public function role()
    {
        return $this->belongsTo(role::class, 'id_role', 'id');
    }

    public function dokterhewan()
    {
        return $this->hasOne(dokterhewan::class, 'id_pengguna', 'id');
    }

    public function peternak()
    {
        return $this->hasOne(peternak::class, 'id_pengguna', 'id');
    }

    public function dinaspeternakan()
    {
        return $this->hasOne(dinaspeternakan::class, 'id_pengguna', 'id');
    }
    public function artikel()
    {
        return $this->hasOne(dinaspeternakan::class, 'id_pengguna', 'id');
    }
}