<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

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
        'no_tlp_guru'
    ];

    
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class)->withTimestamps();
    // }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class)->withTimestamps();
    // } 

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // public function guruguru(){
    //     return $this->belongsTo('App\Models\User');
    // }
}
