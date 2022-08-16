<?php

namespace App\Imports;

use App\MahasiswaModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\penilaianDosenModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\User;

class ImportAccount implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new MahasiswaModel([
            'npm'    => $row['npm'],
            'nama'    => $row['nama'],
            'status_baru'    => $row['status_baru'],
            'tahun_lulus'    => $row['tahun_lulus'],
            'mhs_fakultas_id'    => $row['mhs_fakultas_id'],
            'kode_prodi_id'    => $row['kode_prodi_id']

    ]);


    }
}
