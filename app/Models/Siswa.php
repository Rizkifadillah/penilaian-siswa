<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_tlp_siswa',
        'nama_ayah',
        'nama_ibu',
        'alamat_ortu',
        'no_tlp_ortu',
        'pekerjaan_ayah',
        'pekerjaan_ibu'
    ];

    public function kelas(){
        return $this->belongsTo('App\Models\Kelas');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
