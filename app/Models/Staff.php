<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'user_id',
        'nip',
        // 'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'pendidikan_terakhir',
        'no_tlp_staff'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
