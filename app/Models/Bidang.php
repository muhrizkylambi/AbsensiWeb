<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'tb_bidang';

    protected $fillable = [
      'nama_bidang',
      'ket_bidang'
    ];
}
