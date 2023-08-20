<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
     protected $table = 'tb_pegawai';

    protected $fillable = [
      'bidang_id',
      'jabatan_id',
      'nip',
      'nama_lengkap',
      'no_tlp',
      'username',
      'password',
      'alamat',
      'image'
    ];

    public function bidang(){
      return $this->belongsTo(Bidang::class);
    }
    
    public function jabatan(){
      return $this->belongsTo(Jabatan::class);
    }
}
