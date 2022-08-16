<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Komponen_kompetensi_model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportKomponenKompetensi implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new komponen_kompetensi_model([
                        'sub_kategori_dosen_id'    => 1,
                        'komponen_kompetensi'    => $row['komponen'],
                        'deskripsi_skor1'    => $row['deskripsi_skor1'],
                        'deskripsi_skor2'    => $row['deskripsi_skor2'],
                        'deskripsi_skor3'    => $row['deskripsi_skor3'],
                        'deskripsi_skor4'    => $row['deskripsi_skor4'],
                        'deskripsi_skor5'    => $row['deskripsi_skor5'],
                        'bukti_pendukung'    => $row['bukti_pendukung'],

        ]);


    }
}
