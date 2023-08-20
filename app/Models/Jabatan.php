<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';

    protected $fillable = [
      'nama_jabatan',
      'ket_jabatan'
    ];

}
