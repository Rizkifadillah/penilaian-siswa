<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';


    protected $fillable = [
        'kelas',
        'semester',
        'tahun_ajaran',
        'guru_id',
        'jumlah_siswa',
    ];

    public function guru(){
        return $this->belongsTo('App\Models\Guru');
    }

    public function siswa(){
        return $this->hasOne('App\Models\Siswa');
    }
}
