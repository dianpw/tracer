<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tb_mahasiswa';

    protected $fillable = [
        'npm','nama','status_baru', 'tahun_lulus','mhs_fakultas_id', 'kode_prodi_id' 
    ];
}
