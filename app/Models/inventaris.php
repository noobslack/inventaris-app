<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }

    public function verifikasi(){
        return $this->hasOne(Verifikasi::class, 'id_inventaris');
    }
}
