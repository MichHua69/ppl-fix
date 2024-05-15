<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $guarded  = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'laporan';



    public function peternak()
    {
        return $this->belongsTo(Pengguna::class, 'id_peternak', 'id');
    }

    // Relationship to the dokterhewan (veterinarian)
    public function dokterhewan()
    {
        return $this->belongsTo(Pengguna::class, 'id_dokter', 'id');
    }

    // Accessor to get both peternak and dokterhewan
    public function getPenggunaAttribute()
    {
        return [
            'peternak' => $this->peternak,
            'dokterhewan' => $this->dokterhewan,
        ];
    }
}
