<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PenekananMetodePembelajaranController extends Controller{
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
    $show_tahun= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');
    $tahun_terakhir = DB::select('SELECT MAX(YEAR(tahun_lulus)) AS tahun_lulus FROM tb_mahasiswa');
    return view('penekanan_metode_pembelajaran.index', compact('auth_user', 'show_tahun','tahun_terakhir'));
  }
  public function graph($tahun=null){
      $prodi_id = '';
      if(Auth::user()->role_id == 1){
        $prodi_id = ' and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'" ';
      }else if(Auth::user()->role_id == 2){
        $prodi_id = ' and mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
      }else if(Auth::user()->role_id == 3){
        $prodi_id = ' and kode_prodi_id = "'.Auth::user()->prodi_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
      }

      $data['perkuliahan'] = [];
      $data['demontrasi'] = [];
      $data['partisipasi_riset'] = [];
      $data['praktikum'] = [];
      $data['kerja_lapangan'] = [];
      $data['magang'] = [];
      $data['diskusi'] = [];

      // ======================== perkuliahan Sangat Besar========================
      $query_perkuliahan_sangat_besar = DB::select('SELECT perkuliahan, kode_prodi_id,
      COUNT(perkuliahan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
      where perkuliahan = "Sangat Besar"'.$prodi_id.'' );
      foreach ($query_perkuliahan_sangat_besar as $key => $value) {
          array_push($data['perkuliahan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== perkuliahan Besar========================
      $query_perkuliahan_besar = DB::select('SELECT perkuliahan,
      COUNT(perkuliahan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where perkuliahan = "Besar"'.$prodi_id.'');
      foreach ($query_perkuliahan_besar as $key => $value) {
          array_push($data['perkuliahan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== perkuliahan cukup_besar========================
      $query_perkuliahan_cukup_besar = DB::select('SELECT perkuliahan,
      COUNT(perkuliahan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where perkuliahan = "Cukup"'.$prodi_id.'');
      foreach ($query_perkuliahan_cukup_besar as $key => $value) {
          array_push($data['perkuliahan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== perkuliahan Tidak========================
      $query_perkuliahan_kurang = DB::select('SELECT perkuliahan,
      COUNT(perkuliahan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where perkuliahan = "Tidak"'.$prodi_id.'');
      foreach ($query_perkuliahan_kurang as $key => $value) {
          array_push($data['perkuliahan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== perkuliahan Tidak sama sekali========================
      $query_perkuliahan_tidak_sama_sekali = DB::select('SELECT perkuliahan,
      COUNT(perkuliahan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where perkuliahan = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_perkuliahan_tidak_sama_sekali as $key => $value) {
          array_push($data['perkuliahan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }




      // ======================== demontrasi Sangat Besar========================
      $query_demontrasi_sangat_besar = DB::select('SELECT demontrasi,
      COUNT(demontrasi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where demontrasi = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_demontrasi_sangat_besar as $key => $value) {
          array_push($data['demontrasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== demontrasi Besar========================
      $query_demontrasi_besar = DB::select('SELECT demontrasi,
      COUNT(demontrasi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where demontrasi = "Besar"'.$prodi_id.'');
      foreach ($query_demontrasi_besar as $key => $value) {
          array_push($data['demontrasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== demontrasi Cukup========================
      $query_demontrasi_cukup_besar = DB::select('SELECT demontrasi,
      COUNT(demontrasi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where demontrasi = "Cukup"'.$prodi_id.'');
      foreach ($query_demontrasi_cukup_besar as $key => $value) {
          array_push($data['demontrasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== demontrasi Tidak========================
      $query_demontrasi_kurang = DB::select('SELECT demontrasi,
      COUNT(demontrasi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where demontrasi = "Tidak"'.$prodi_id.'');
      foreach ($query_demontrasi_kurang as $key => $value) {
          array_push($data['demontrasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== demontrasi Tidak sama sekali========================
      $query_demontrasi_tidak_sama_sekali = DB::select('SELECT demontrasi,
      COUNT(demontrasi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where demontrasi = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_demontrasi_tidak_sama_sekali as $key => $value) {
          array_push($data['demontrasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== partisipasi_riset dalam proyek Sangat Besar========================
      $query_partisipasi_riset_sangat_besar = DB::select('SELECT partisipasi_riset,
      COUNT(partisipasi_riset) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where partisipasi_riset = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_partisipasi_riset_sangat_besar as $key => $value) {
          array_push($data['partisipasi_riset'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_riset dalam proyek Besar========================
      $query_partisipasi_riset_besar = DB::select('SELECT partisipasi_riset,
      COUNT(partisipasi_riset) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where partisipasi_riset = "Besar"'.$prodi_id.'');
      foreach ($query_partisipasi_riset_besar as $key => $value) {
          array_push($data['partisipasi_riset'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_riset dalam proyek Cukup========================
      $query_partisipasi_riset_cukup_besar = DB::select('SELECT partisipasi_riset,
      COUNT(partisipasi_riset) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where partisipasi_riset = "Cukup"'.$prodi_id.'');
      foreach ($query_partisipasi_riset_cukup_besar as $key => $value) {
          array_push($data['partisipasi_riset'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== partisipasi_riset dalam proyek Tidak========================
      $query_partisipasi_riset_kurang = DB::select('SELECT partisipasi_riset,
      COUNT(partisipasi_riset) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where partisipasi_riset = "Tidak"'.$prodi_id.'');
      foreach ($query_partisipasi_riset_kurang as $key => $value) {
        array_push($data['partisipasi_riset'], ['Tidak' => (int)$value->jumlah]);
      }

        // ======================== partisipasi_riset dalam proyek Tidak sama sekali========================
      $query_partisipasi_riset_tidak_sama_sekali = DB::select('SELECT partisipasi_riset,
      COUNT(partisipasi_riset) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where partisipasi_riset = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_partisipasi_riset_tidak_sama_sekali as $key => $value) {
          array_push($data['partisipasi_riset'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

  

      // ======================== praktikum Sangat Besar========================
      $query_praktikum_sangat_besar = DB::select('SELECT praktikum,
      COUNT(praktikum) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where praktikum = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_praktikum_sangat_besar as $key => $value) {
          array_push($data['praktikum'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== praktikum Besar========================
      $query_praktikum_besar = DB::select('SELECT praktikum,
      COUNT(praktikum) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where praktikum = "Besar"'.$prodi_id.'');
      foreach ($query_praktikum_besar as $key => $value) {
          array_push($data['praktikum'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== praktikum Cukup========================
      $query_praktikum_cukup_besar = DB::select('SELECT praktikum,
      COUNT(praktikum) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where praktikum = "Cukup"'.$prodi_id.'');
      foreach ($query_praktikum_cukup_besar as $key => $value) {
          array_push($data['praktikum'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== praktikum Tidak========================
      $query_praktikum_kurang = DB::select('SELECT praktikum,
      COUNT(praktikum) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where praktikum = "Tidak"'.$prodi_id.'');
      foreach ($query_praktikum_kurang as $key => $value) {
          array_push($data['praktikum'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== praktikum Tidak sama sekali========================
      $query_praktikum_tidak_sama_sekali = DB::select('SELECT praktikum,
      COUNT(praktikum) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where praktikum = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_praktikum_tidak_sama_sekali as $key => $value) {
          array_push($data['praktikum'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

          //--------------------------------------------------------------------------

      // ======================== kerja_lapangan Sangat Besar========================
      $query_kerja_lapangan_sangat_besar = DB::select('SELECT kerja_lapangan,
      COUNT(kerja_lapangan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where kerja_lapangan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kerja_lapangan_sangat_besar as $key => $value) {
          array_push($data['kerja_lapangan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kerja_lapangan Besar========================
      $query_kerja_lapangan_besar = DB::select('SELECT kerja_lapangan,
      COUNT(kerja_lapangan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where kerja_lapangan = "Besar"'.$prodi_id.'');

      foreach ($query_kerja_lapangan_besar as $key => $value) {
          array_push($data['kerja_lapangan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kerja_lapangan Cukup========================
      $query_kerja_lapangan_cukup_besar = DB::select('SELECT kerja_lapangan,
      COUNT(kerja_lapangan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where kerja_lapangan = "Cukup"'.$prodi_id.'');

      foreach ($query_kerja_lapangan_cukup_besar as $key => $value) {
          array_push($data['kerja_lapangan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kerja_lapangan Tidak========================
      $query_kerja_lapangan_kurang = DB::select('SELECT kerja_lapangan,
      COUNT(kerja_lapangan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where kerja_lapangan = "Tidak"'.$prodi_id.'');

      foreach ($query_kerja_lapangan_kurang as $key => $value) {
          array_push($data['kerja_lapangan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kerja_lapangan Tidak sama sekali========================
      $query_kerja_lapangan_tidak_sama_sekali = DB::select('SELECT kerja_lapangan,
      COUNT(kerja_lapangan) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where kerja_lapangan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kerja_lapangan_tidak_sama_sekali as $key => $value) {
          array_push($data['kerja_lapangan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                //--------------------------------------------------------------------------

      // ======================== magang Sangat Besar========================
      $query_magang_sangat_besar = DB::select('SELECT magang,
      COUNT(magang) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where magang = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_magang_sangat_besar as $key => $value) {
          array_push($data['magang'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Besar========================
      $query_magang_besar = DB::select('SELECT magang,
      COUNT(magang) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where magang = "Besar"'.$prodi_id.'');

      foreach ($query_magang_besar as $key => $value) {
          array_push($data['magang'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Cukup========================
      $query_magang_cukup_besar = DB::select('SELECT magang,
      COUNT(magang) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where magang = "Cukup"'.$prodi_id.'');

      foreach ($query_magang_cukup_besar as $key => $value) {
          array_push($data['magang'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak========================
      $query_magang_kurang = DB::select('SELECT magang,
      COUNT(magang) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where magang = "Tidak"'.$prodi_id.'');

      foreach ($query_magang_kurang as $key => $value) {
          array_push($data['magang'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak sama sekali========================
      $query_magang_tidak_sama_sekali = DB::select('SELECT magang,
      COUNT(magang) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where magang = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_magang_tidak_sama_sekali as $key => $value) {
          array_push($data['magang'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                    //--------------------------------------------------------------------------

      // ======================== diskusi Sangat Besar========================
      $query_diskusi_sangat_besar = DB::select('SELECT diskusi,
      COUNT(diskusi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where diskusi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_diskusi_sangat_besar as $key => $value) {
          array_push($data['diskusi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== diskusi Besar========================
      $query_diskusi_besar = DB::select('SELECT diskusi,
      COUNT(diskusi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where diskusi = "Besar"'.$prodi_id.'');

      foreach ($query_diskusi_besar as $key => $value) {
          array_push($data['diskusi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== diskusi Cukup========================
      $query_diskusi_cukup_besar = DB::select('SELECT diskusi,
      COUNT(diskusi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where diskusi = "Cukup"'.$prodi_id.'');

      foreach ($query_diskusi_cukup_besar as $key => $value) {
          array_push($data['diskusi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== diskusi Tidak========================
      $query_diskusi_kurang = DB::select('SELECT diskusi,
      COUNT(diskusi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where diskusi = "Tidak"'.$prodi_id.'');

      foreach ($query_diskusi_kurang as $key => $value) {
          array_push($data['diskusi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== diskusi Tidak sama sekali========================
      $query_diskusi_tidak_sama_sekali = DB::select('SELECT diskusi,
      COUNT(diskusi) AS jumlah  FROM `tb_penekanan_metode_pembelajaran`
      JOIN tb_mahasiswa ON tb_penekanan_metode_pembelajaran.npm = tb_mahasiswa.npm
        where diskusi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_diskusi_tidak_sama_sekali as $key => $value) {
          array_push($data['diskusi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
    // dd($data);
    return $data;
  }
  public function show_data(){
    try {
        $result = [];
        $count = 1;
        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')                
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }
        // dd($query);

        foreach ($query as $user) {
            $action_edit = '<center>
            <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
            data-toggle="modal"
            data-id= "'. $user->id.'"
            data-target="#modal-edit" id="btn_update_surat">
            <span>
                <i class="la la-edit"></i>
                <span>Ubah</span>
            </span>
            </a>';

            $roless = "";

            $update = $user->created_at;
            $data = [];
            $data[] = $count++;
            $data[] = strtoupper($user->npm);
            $data[] = ($user->nama);
            $data[] = ($user->jenjang . ' - ' .$user->prodi);
            $data[] = ($user->tahun_lulus);
            $data[] = $user->perkuliahan;
            $data[] = $user->demontrasi;
            $data[] = $user->partisipasi_riset;
            $data[] = $user->praktikum;
            $data[] = $user->kerja_lapangan;
            $data[] = $user->magang;
            $data[] = $user->diskusi;
            $data[] = $update;
            // $data[] = $action_edit;
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
      $query = '';

      if(Auth::user()->role_id == 1){
          $query = DB::table('tb_penekanan_metode_pembelajaran')
          ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->get();
      }else if(Auth::user()->role_id == 2){
          $query = DB::table('tb_penekanan_metode_pembelajaran')
          ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
          ->get();
      }
      else{
          $query = DB::table('tb_penekanan_metode_pembelajaran')
          ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('kode_prodi_id', Auth::user()->prodi_id)
          ->get();
      }

      // dd($query);

      $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - PENEKANAN METODE PEMBELAJARAN');

      $sheet->setCellValue('A3', 'NO');
      $sheet->setCellValue('B3', 'NPM');
      $sheet->setCellValue('C3', 'NAMA');
      $sheet->setCellValue('D3', 'PRODI');
      $sheet->setCellValue('E3', 'TAHUN LULUS');
      $sheet->setCellValue('F3', 'PERKULIAHAN');
      $sheet->setCellValue('G3', 'DEMONSTRASI');
      $sheet->setCellValue('H3', 'PARTISIPASI RISET');
      $sheet->setCellValue('I3', 'PRAKTIKUM');
      $sheet->setCellValue('J3', 'KERJA LAPANGAN');
      $sheet->setCellValue('K3', 'MAGANG');
      $sheet->setCellValue('L3', 'DISKUSI');

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
      $sheet->mergeCells("J3:J4");
      $sheet->mergeCells("K3:K4");
      $sheet->mergeCells("L3:L4");

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
      $sheet->getColumnDimension('J')->setWidth(15);
      $sheet->getColumnDimension('K')->setWidth(15);
      $sheet->getColumnDimension('L')->setWidth(15);

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
      $sheet->getStyle('A5:L50')->applyFromArray($styleArray);
      $sheet->getStyle('A3:L4')->applyFromArray($styleHeader);
      $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
      $sheet->getStyle('A3:L3')->applyFromArray($styleheader);

      foreach ($query as $key => $value) {
          $sheet->setCellValue('A'.$i, $no++);
          $sheet->setCellValue('B'.$i, $value->npm);
          $sheet->setCellValue('C'.$i, $value->nama);
          $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
          $sheet->setCellValue('E'.$i, $value->tahun_lulus);
          $sheet->setCellValue('F'.$i, $value->perkuliahan);
          $sheet->setCellValue('G'.$i, $value->demontrasi);
          $sheet->setCellValue('H'.$i, $value->partisipasi_riset);
          $sheet->setCellValue('I'.$i, $value->praktikum);
          $sheet->setCellValue('J'.$i, $value->kerja_lapangan);
          $sheet->setCellValue('K'.$i, $value->magang);
          $sheet->setCellValue('L'.$i, $value->diskusi);

          $i++;
          
      }

      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
      $date = date('d-F-Y');
      $file_name = 'Laporan Penekanan Metode Pembelajaran - '. $date.'.xlsx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'.$file_name.'"');
      $writer->save("php://output");
  }
}
