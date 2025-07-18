<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    protected $fillable = ['nama', 'nik', 'alamat', 'jenis_bantuan'];

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'penerima_id');
    }
}
