<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TingkatKepuasanController extends Controller{
  public function index(){
    if(Auth::user()->role_id == 2){ 
        $auth_user = DB::table('users')
        ->leftJoin('tm_fakultas', 'users.fakultas_user_id', 'tm_fakultas.id')
        ->where('users.id', Auth::user()->id)
        ->first();
    }else if(Auth::user()->role_id == 3){
        $auth_user = DB::table('users')
        ->leftJoin('tm_kode_prodi', 'users.prodi_id', 'tm_kode_prodi.kode')
        ->where('id', Auth::user()->id)
        ->first();
    }else{
        $auth_user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    }
    return view('tingkat-kepuasan.index', compact('auth_user'));
  }
  
  public function graph(){

      $data['etika'] = [];
      $data['keahlian'] = [];
      $data['bahasa_inggris'] = [];
      $data['penggunaan_ti'] = [];
      $data['komunikasi'] = [];
      $data['kerjasama'] = [];
      $data['pengembangan_diri'] = [];
      
      //SELECT tb_kepuasan_pengguna.id_perusahaan, tb_perusahaan.nama_perusahaan, etika, keahlian, bahasa_inggris, penggunaan_ti, komunikasi, kerjasama, pengembangan_diri, tb_kepuasan_pengguna.created_at FROM tb_kepuasan_pengguna INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_kepuasan_pengguna.id_perusahaan

      // ======================== etika Sangat baik========================
      $query_etika_sangat_besar = DB::select('SELECT etika,
      COUNT(etika) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
      where etika = "Sangat baik"' );
      foreach ($query_etika_sangat_besar as $key => $value) {
          array_push($data['etika'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== etika Baik========================
      $query_etika_besar = DB::select('SELECT etika,
      COUNT(etika) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where etika = "Baik"');
      foreach ($query_etika_besar as $key => $value) {
          array_push($data['etika'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== etika cukup_besar========================
      $query_etika_cukup_besar = DB::select('SELECT etika,
      COUNT(etika) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where etika = "Cukup"');
      foreach ($query_etika_cukup_besar as $key => $value) {
          array_push($data['etika'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== etika Kurang========================
      $query_etika_kurang = DB::select('SELECT etika,
      COUNT(etika) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where etika = "Kurang"');
      foreach ($query_etika_kurang as $key => $value) {
          array_push($data['etika'], ['Kurang' => (int)$value->jumlah]);
      }

      // ======================== keahlian Sangat baik========================
      $query_keahlian_sangat_besar = DB::select('SELECT keahlian,
      COUNT(keahlian) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where keahlian = "Sangat baik"');
      foreach ($query_keahlian_sangat_besar as $key => $value) {
          array_push($data['keahlian'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== keahlian Baik========================
      $query_keahlian_besar = DB::select('SELECT keahlian,
      COUNT(keahlian) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where keahlian = "Baik"');
      foreach ($query_keahlian_besar as $key => $value) {
          array_push($data['keahlian'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== keahlian Cukup========================
      $query_keahlian_cukup_besar = DB::select('SELECT keahlian,
      COUNT(keahlian) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where keahlian = "Cukup"');
      foreach ($query_keahlian_cukup_besar as $key => $value) {
          array_push($data['keahlian'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== keahlian Kurang========================
      $query_keahlian_kurang = DB::select('SELECT keahlian,
      COUNT(keahlian) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where keahlian = "Kurang"');
      foreach ($query_keahlian_kurang as $key => $value) {
          array_push($data['keahlian'], ['Kurang' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== bahasa_inggris dalam proyek Sangat baik========================
      $query_bahasa_inggris_sangat_besar = DB::select('SELECT bahasa_inggris,
      COUNT(bahasa_inggris) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_inggris = "Sangat baik"');
      foreach ($query_bahasa_inggris_sangat_besar as $key => $value) {
          array_push($data['bahasa_inggris'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== bahasa_inggris dalam proyek Baik========================
      $query_bahasa_inggris_besar = DB::select('SELECT bahasa_inggris,
      COUNT(bahasa_inggris) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_inggris = "Baik"');
      foreach ($query_bahasa_inggris_besar as $key => $value) {
          array_push($data['bahasa_inggris'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== bahasa_inggris dalam proyek Cukup========================
      $query_bahasa_inggris_cukup_besar = DB::select('SELECT bahasa_inggris,
      COUNT(bahasa_inggris) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_inggris = "Cukup"');
      foreach ($query_bahasa_inggris_cukup_besar as $key => $value) {
          array_push($data['bahasa_inggris'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== bahasa_inggris dalam proyek Kurang========================
      $query_bahasa_inggris_kurang = DB::select('SELECT bahasa_inggris,
      COUNT(bahasa_inggris) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_inggris = "Kurang"');
      foreach ($query_bahasa_inggris_kurang as $key => $value) {
        array_push($data['bahasa_inggris'], ['Kurang' => (int)$value->jumlah]);
      }  

      // ======================== penggunaan_ti Sangat baik========================
      $query_penggunaan_ti_sangat_besar = DB::select('SELECT penggunaan_ti,
      COUNT(penggunaan_ti) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where penggunaan_ti = "Sangat baik"');
      foreach ($query_penggunaan_ti_sangat_besar as $key => $value) {
          array_push($data['penggunaan_ti'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== penggunaan_ti Baik========================
      $query_penggunaan_ti_besar = DB::select('SELECT penggunaan_ti,
      COUNT(penggunaan_ti) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where penggunaan_ti = "Baik"');
      foreach ($query_penggunaan_ti_besar as $key => $value) {
          array_push($data['penggunaan_ti'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== penggunaan_ti Cukup========================
      $query_penggunaan_ti_cukup_besar = DB::select('SELECT penggunaan_ti,
      COUNT(penggunaan_ti) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where penggunaan_ti = "Cukup"');
      foreach ($query_penggunaan_ti_cukup_besar as $key => $value) {
          array_push($data['penggunaan_ti'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== penggunaan_ti Kurang========================
      $query_penggunaan_ti_kurang = DB::select('SELECT penggunaan_ti,
      COUNT(penggunaan_ti) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where penggunaan_ti = "Kurang"');
      foreach ($query_penggunaan_ti_kurang as $key => $value) {
          array_push($data['penggunaan_ti'], ['Kurang' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== komunikasi Sangat baik========================
      $query_komunikasi_sangat_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "Sangat baik"');

      foreach ($query_komunikasi_sangat_besar as $key => $value) {
          array_push($data['komunikasi'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== komunikasi Baik========================
      $query_komunikasi_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "Baik"');

      foreach ($query_komunikasi_besar as $key => $value) {
          array_push($data['komunikasi'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== komunikasi Cukup========================
      $query_komunikasi_cukup_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "Cukup"');

      foreach ($query_komunikasi_cukup_besar as $key => $value) {
          array_push($data['komunikasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== komunikasi Kurang========================
      $query_komunikasi_kurang = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "Kurang"');

      foreach ($query_komunikasi_kurang as $key => $value) {
          array_push($data['komunikasi'], ['Kurang' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== kerjasama Sangat baik========================
      $query_kerjasama_sangat_besar = DB::select('SELECT kerjasama,
      COUNT(kerjasama) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where kerjasama = "Sangat baik"');

      foreach ($query_kerjasama_sangat_besar as $key => $value) {
          array_push($data['kerjasama'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim Baik========================
      $query_kerjasama_besar = DB::select('SELECT kerjasama,
      COUNT(kerjasama) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where kerjasama = "Baik"');

      foreach ($query_kerjasama_besar as $key => $value) {
          array_push($data['kerjasama'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim Cukup========================
      $query_kerjasama_cukup_besar = DB::select('SELECT kerjasama,
      COUNT(kerjasama) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where kerjasama = "Cukup"');

      foreach ($query_kerjasama_cukup_besar as $key => $value) {
          array_push($data['kerjasama'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim Kurang========================
      $query_kerjasama_kurang = DB::select('SELECT kerjasama,
      COUNT(kerjasama) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where kerjasama = "Kurang"');

      foreach ($query_kerjasama_kurang as $key => $value) {
          array_push($data['kerjasama'], ['Kurang' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== pengembangan_diri Sangat baik========================
      $query_pengembangan_diri_sangat_besar = DB::select('SELECT pengembangan_diri,
      COUNT(pengembangan_diri) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengembangan_diri = "Sangat baik"');

      foreach ($query_pengembangan_diri_sangat_besar as $key => $value) {
          array_push($data['pengembangan_diri'], ['Sangatbaik' => (int)$value->jumlah]);
      }

      // ======================== pengembangan_diri Baik========================
      $query_pengembangan_diri_besar = DB::select('SELECT pengembangan_diri,
      COUNT(pengembangan_diri) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengembangan_diri = "Baik"');

      foreach ($query_pengembangan_diri_besar as $key => $value) {
          array_push($data['pengembangan_diri'], ['Baik' => (int)$value->jumlah]);
      }

      // ======================== pengembangan_diri Cukup========================
      $query_pengembangan_diri_cukup_besar = DB::select('SELECT pengembangan_diri,
      COUNT(pengembangan_diri) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengembangan_diri = "Cukup"');

      foreach ($query_pengembangan_diri_cukup_besar as $key => $value) {
          array_push($data['pengembangan_diri'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== pengembangan_diri Kurang========================
      $query_pengembangan_diri_kurang = DB::select('SELECT pengembangan_diri,
      COUNT(pengembangan_diri) AS jumlah  FROM tb_kepuasan_pengguna
      JOIN tb_perusahaan ON tb_kepuasan_pengguna.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengembangan_diri = "Kurang"');

      foreach ($query_pengembangan_diri_kurang as $key => $value) {
          array_push($data['pengembangan_diri'], ['Kurang' => (int)$value->jumlah]);
      }

    return $data;
  }

  public function show_data(){
    
    //SELECT tb_kepuasan_pengguna.id_perusahaan, tb_perusahaan.nama_perusahaan, etika, keahlian, bahasa_inggris, penggunaan_ti, komunikasi, kerjasama, pengembangan_diri, tb_kepuasan_pengguna.created_at FROM tb_kepuasan_pengguna INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_kepuasan_pengguna.id_perusahaan
    try {
      $result = [];
      $count = 1;
      $query = DB::select('SELECT tb_kepuasan_pengguna.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, etika, keahlian, bahasa_inggris, penggunaan_ti, komunikasi, kerjasama, pengembangan_diri, tb_kepuasan_pengguna.created_at FROM tb_kepuasan_pengguna INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_kepuasan_pengguna.id_perusahaan');

      foreach ($query as $user) {
          $data = [];
          $data[] = $count++;
          $data[] = strtoupper($user->nama_perusahaan . '</br>[ ' . $user->nama . ' ]' );
          $data[] = ($user->etika);
          $data[] = ($user->keahlian);
          $data[] = ($user->bahasa_inggris);
          $data[] = $user->penggunaan_ti;
          $data[] = $user->komunikasi;
          $data[] = $user->kerjasama;
          $data[] = $user->pengembangan_diri;
          $data[] = $user->created_at;
          $result[] = $data;
      }
      return response()->json(['result' => $result]);
    } catch (\Exception $exception) {
      return response()->json(['error' => $exception->getMessage()], 406);
    }
  }

  public function exportExcel(){

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $i = 5;
    $no=1;
    
    $query = DB::select('SELECT tb_kepuasan_pengguna.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, etika, keahlian, bahasa_inggris, penggunaan_ti, komunikasi, kerjasama, pengembangan_diri, tb_kepuasan_pengguna.created_at FROM tb_kepuasan_pengguna INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_kepuasan_pengguna.id_perusahaan');

    // dd($query);

    $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KEPUASAN PENGGUNA LULUSAN');

    $sheet->setCellValue('A3', 'NO');
    $sheet->setCellValue('B3', 'Perusahaan');
    $sheet->setCellValue('C3', 'Etika');
    $sheet->setCellValue('D3', 'Keahlian pada bidang ilmu');
    $sheet->setCellValue('E3', 'Kemampuan berbahasa asing');
    $sheet->setCellValue('F3', 'Penggunaan teknologi informasi');
    $sheet->setCellValue('G3', 'Kemampuan berkomunikasi');
    $sheet->setCellValue('H3', 'Kerjasama tim');
    $sheet->setCellValue('I3', 'Pengembangan diri');

    //filte
    $sheet->setAutoFilter('A1:E1');
    //color cell

    //freeze pane

    $sheet->freezePaneByColumnAndRow(1,'D1');
    $sheet->freezePane('D5');

    //merge cells
    $sheet->mergeCells("B2:I2");
    $sheet->mergeCells("A3:A4");
    $sheet->mergeCells("B3:B4");
    $sheet->mergeCells("C3:C4");
    $sheet->mergeCells("D3:D4");
    $sheet->mergeCells("E3:E4");
    $sheet->mergeCells("F3:F4");
    $sheet->mergeCells("G3:G4");
    $sheet->mergeCells("H3:H4");
    $sheet->mergeCells("I3:I4");

    //size cells
    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(23);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(15);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);
    $sheet->getColumnDimension('I')->setWidth(15);

    $styleArray = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'wrapText' => true,
          ],
          'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],

    ];
    $styleHeader = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'wrapText' => true,
          ],
          'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],

    ];
    $styletitle = [

        'font' => [
            'name' => 'Century Gothic',
            'size' => 14,
            'bold' => true,
            'color' => ['argb' => '000000'],
        ],

    ];
    $styleheader = [

        'font' => [
            'size' => 11,
            'bold' => true,
            'color' => ['argb' => '000000'],
        ],

    ];
    $count = count($query);
    $sheet->getStyle('A5:I50')->applyFromArray($styleArray);
    $sheet->getStyle('A3:I4')->applyFromArray($styleHeader);
    $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
    $sheet->getStyle('A3:I3')->applyFromArray($styleheader);

    //SELECT tb_kepuasan_pengguna.id_perusahaan, tb_perusahaan.nama_perusahaan, etika, keahlian, bahasa_inggris, penggunaan_ti, komunikasi, kerjasama, pengembangan_diri, tb_kepuasan_pengguna.created_at FROM tb_kepuasan_pengguna INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=tb_kepuasan_pengguna.id_perusahaan
    foreach ($query as $key => $value) {
      $sheet->setCellValue('A'.$i, $no++);
      $sheet->setCellValue('B'.$i, $value->nama_perusahaan . ' [ ' .$value->nama . ' ]');
      $sheet->setCellValue('C'.$i, $value->etika);
      $sheet->setCellValue('D'.$i, $value->keahlian);
      $sheet->setCellValue('E'.$i, $value->bahasa_inggris);
      $sheet->setCellValue('F'.$i, $value->penggunaan_ti);
      $sheet->setCellValue('G'.$i, $value->komunikasi);
      $sheet->setCellValue('H'.$i, $value->kerjasama);
      $sheet->setCellValue('I'.$i, $value->pengembangan_diri);
      $i++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $date = date('d-F-Y');
    $file_name = 'Laporan Kepuasan Pengguna Lulusan - '. $date.'.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$file_name.'"');
    $writer->save("php://output");
  }
}
