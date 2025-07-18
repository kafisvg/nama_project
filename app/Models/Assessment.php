<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['penerima_id', 'penghasilan', 'kondisi_rumah', 'hasil_akhir'];

    public function penerima()
    {
        return $this->belongsTo(PenerimaBantuan::class, 'penerima_id');
    }
}
