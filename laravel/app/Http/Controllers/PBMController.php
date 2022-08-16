<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PBMController extends Controller{
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
    return view('pbm.index', compact('auth_user', 'show_tahun','tahun_terakhir'));
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

      $data['interaksi_dosen'] = [];
      $data['bimbingan_akademik'] = [];
      $data['proyek_riset'] = [];
      $data['jejaring_ilmiah'] = [];
      $data['kondisi_belajar'] = [];
      $data['interaksi_teman'] = [];
      $data['partisipasi_pelayanan'] = [];
      $data['lainnya'] = [];

      // ======================== interaksi_dosen Sangat Besar========================
      $query_interaksi_dosen = DB::select('SELECT interaksi_dosen, 
      COUNT(interaksi_dosen) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
      where interaksi_dosen = "Sangat Besar"'.$prodi_id.'' );
      foreach ($query_interaksi_dosen as $key => $value) {
          array_push($data['interaksi_dosen'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== interaksi_dosen Besar========================
      $query_interaksi_dosen_besar = DB::select('SELECT interaksi_dosen,
      COUNT(interaksi_dosen) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_dosen = "Besar"'.$prodi_id.'');
      foreach ($query_interaksi_dosen_besar as $key => $value) {
          array_push($data['interaksi_dosen'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== interaksi_dosen cukup_besar========================
      $query_interaksi_dosen_cukup_besar = DB::select('SELECT interaksi_dosen,
      COUNT(interaksi_dosen) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_dosen = "Cukup"'.$prodi_id.'');
      foreach ($query_interaksi_dosen_cukup_besar as $key => $value) {
          array_push($data['interaksi_dosen'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== interaksi_dosen Tidak========================
      $query_interaksi_dosen_kurang = DB::select('SELECT interaksi_dosen,
      COUNT(interaksi_dosen) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_dosen = "Tidak"'.$prodi_id.'');
      foreach ($query_interaksi_dosen_kurang as $key => $value) {
          array_push($data['interaksi_dosen'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== interaksi_dosen Tidak sama sekali========================
      $query_interaksi_dosen_tidak_sama_sekali = DB::select('SELECT interaksi_dosen,
      COUNT(interaksi_dosen) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_dosen = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_interaksi_dosen_tidak_sama_sekali as $key => $value) {
          array_push($data['interaksi_dosen'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      // ======================== bimbingan_akademik Sangat Besar========================
      $query_bimbingan_akademik_sangat_besar = DB::select('SELECT bimbingan_akademik,
      COUNT(bimbingan_akademik) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where bimbingan_akademik = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_bimbingan_akademik_sangat_besar as $key => $value) {
          array_push($data['bimbingan_akademik'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== bimbingan_akademik Besar========================
      $query_bimbingan_akademik_besar = DB::select('SELECT bimbingan_akademik,
      COUNT(bimbingan_akademik) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where bimbingan_akademik = "Besar"'.$prodi_id.'');
      foreach ($query_bimbingan_akademik_besar as $key => $value) {
          array_push($data['bimbingan_akademik'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== bimbingan_akademik Cukup========================
      $query_bimbingan_akademik_cukup_besar = DB::select('SELECT bimbingan_akademik,
      COUNT(bimbingan_akademik) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where bimbingan_akademik = "Cukup"'.$prodi_id.'');
      foreach ($query_bimbingan_akademik_cukup_besar as $key => $value) {
          array_push($data['bimbingan_akademik'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== bimbingan_akademik Tidak========================
      $query_bimbingan_akademik_kurang = DB::select('SELECT bimbingan_akademik,
      COUNT(bimbingan_akademik) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where bimbingan_akademik = "Tidak"'.$prodi_id.'');
      foreach ($query_bimbingan_akademik_kurang as $key => $value) {
          array_push($data['bimbingan_akademik'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== bimbingan_akademik Tidak sama sekali========================
      $query_bimbingan_akademik_tidak_sama_sekali = DB::select('SELECT bimbingan_akademik,
      COUNT(bimbingan_akademik) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where bimbingan_akademik = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_bimbingan_akademik_tidak_sama_sekali as $key => $value) {
          array_push($data['bimbingan_akademik'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== proyek_riset dalam proyek Sangat Besar========================
      $query_proyek_riset_sangat_besar = DB::select('SELECT proyek_riset,
      COUNT(proyek_riset) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where proyek_riset = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_proyek_riset_sangat_besar as $key => $value) {
          array_push($data['proyek_riset'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== proyek_riset dalam proyek Besar========================
      $query_proyek_riset_besar = DB::select('SELECT proyek_riset,
      COUNT(proyek_riset) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where proyek_riset = "Besar"'.$prodi_id.'');
      foreach ($query_proyek_riset_besar as $key => $value) {
          array_push($data['proyek_riset'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== proyek_riset dalam proyek Cukup========================
      $query_proyek_riset_cukup_besar = DB::select('SELECT proyek_riset,
      COUNT(proyek_riset) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where proyek_riset = "Cukup"'.$prodi_id.'');
      foreach ($query_proyek_riset_cukup_besar as $key => $value) {
          array_push($data['proyek_riset'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== proyek_riset dalam proyek Tidak========================
      $query_proyek_riset_kurang = DB::select('SELECT proyek_riset,
      COUNT(proyek_riset) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where proyek_riset = "Tidak"'.$prodi_id.'');
      foreach ($query_proyek_riset_kurang as $key => $value) {
        array_push($data['proyek_riset'], ['Tidak' => (int)$value->jumlah]);
      }

        // ======================== proyek_riset dalam proyek Tidak sama sekali========================
      $query_proyek_riset_tidak_sama_sekali = DB::select('SELECT proyek_riset,
      COUNT(proyek_riset) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where proyek_riset = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_proyek_riset_tidak_sama_sekali as $key => $value) {
          array_push($data['proyek_riset'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

  

      // ======================== jejaring_ilmiah Sangat Besar========================
      $query_jejaring_ilmiah_sangat_besar = DB::select('SELECT jejaring_ilmiah,
      COUNT(jejaring_ilmiah) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where jejaring_ilmiah = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_jejaring_ilmiah_sangat_besar as $key => $value) {
          array_push($data['jejaring_ilmiah'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== jejaring_ilmiah Besar========================
      $query_jejaring_ilmiah_besar = DB::select('SELECT jejaring_ilmiah,
      COUNT(jejaring_ilmiah) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where jejaring_ilmiah = "Besar"'.$prodi_id.'');
      foreach ($query_jejaring_ilmiah_besar as $key => $value) {
          array_push($data['jejaring_ilmiah'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== jejaring_ilmiah Cukup========================
      $query_jejaring_ilmiah_cukup_besar = DB::select('SELECT jejaring_ilmiah,
      COUNT(jejaring_ilmiah) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where jejaring_ilmiah = "Cukup"'.$prodi_id.'');
      foreach ($query_jejaring_ilmiah_cukup_besar as $key => $value) {
          array_push($data['jejaring_ilmiah'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== jejaring_ilmiah Tidak========================
      $query_jejaring_ilmiah_kurang = DB::select('SELECT jejaring_ilmiah,
      COUNT(jejaring_ilmiah) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where jejaring_ilmiah = "Tidak"'.$prodi_id.'');
      foreach ($query_jejaring_ilmiah_kurang as $key => $value) {
          array_push($data['jejaring_ilmiah'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== jejaring_ilmiah Tidak sama sekali========================
      $query_jejaring_ilmiah_tidak_sama_sekali = DB::select('SELECT jejaring_ilmiah,
      COUNT(jejaring_ilmiah) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where jejaring_ilmiah = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_jejaring_ilmiah_tidak_sama_sekali as $key => $value) {
          array_push($data['jejaring_ilmiah'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

          //--------------------------------------------------------------------------

      // ======================== kondisi_belajar Sangat Besar========================
      $query_kondisi_belajar_sangat_besar = DB::select('SELECT kondisi_belajar,
      COUNT(kondisi_belajar) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where kondisi_belajar = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kondisi_belajar_sangat_besar as $key => $value) {
          array_push($data['kondisi_belajar'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kondisi_belajar Besar========================
      $query_kondisi_belajar_besar = DB::select('SELECT kondisi_belajar,
      COUNT(kondisi_belajar) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where kondisi_belajar = "Besar"'.$prodi_id.'');

      foreach ($query_kondisi_belajar_besar as $key => $value) {
          array_push($data['kondisi_belajar'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kondisi_belajar Cukup========================
      $query_kondisi_belajar_cukup_besar = DB::select('SELECT kondisi_belajar,
      COUNT(kondisi_belajar) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where kondisi_belajar = "Cukup"'.$prodi_id.'');

      foreach ($query_kondisi_belajar_cukup_besar as $key => $value) {
          array_push($data['kondisi_belajar'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kondisi_belajar Tidak========================
      $query_kondisi_belajar_kurang = DB::select('SELECT kondisi_belajar,
      COUNT(kondisi_belajar) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where kondisi_belajar = "Tidak"'.$prodi_id.'');

      foreach ($query_kondisi_belajar_kurang as $key => $value) {
          array_push($data['kondisi_belajar'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kondisi_belajar Tidak sama sekali========================
      $query_kondisi_belajar_tidak_sama_sekali = DB::select('SELECT kondisi_belajar,
      COUNT(kondisi_belajar) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where kondisi_belajar = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kondisi_belajar_tidak_sama_sekali as $key => $value) {
          array_push($data['kondisi_belajar'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                //--------------------------------------------------------------------------

      // ======================== interaksi_teman Sangat Besar========================
      $query_interaksi_teman_sangat_besar = DB::select('SELECT interaksi_teman,
      COUNT(interaksi_teman) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_teman = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_interaksi_teman_sangat_besar as $key => $value) {
          array_push($data['interaksi_teman'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Besar========================
      $query_interaksi_teman_besar = DB::select('SELECT interaksi_teman,
      COUNT(interaksi_teman) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_teman = "Besar"'.$prodi_id.'');

      foreach ($query_interaksi_teman_besar as $key => $value) {
          array_push($data['interaksi_teman'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Cukup========================
      $query_interaksi_teman_cukup_besar = DB::select('SELECT interaksi_teman,
      COUNT(interaksi_teman) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_teman = "Cukup"'.$prodi_id.'');

      foreach ($query_interaksi_teman_cukup_besar as $key => $value) {
          array_push($data['interaksi_teman'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak========================
      $query_interaksi_teman_kurang = DB::select('SELECT interaksi_teman,
      COUNT(interaksi_teman) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_teman = "Tidak"'.$prodi_id.'');

      foreach ($query_interaksi_teman_kurang as $key => $value) {
          array_push($data['interaksi_teman'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak sama sekali========================
      $query_interaksi_teman_tidak_sama_sekali = DB::select('SELECT interaksi_teman,
      COUNT(interaksi_teman) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where interaksi_teman = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_interaksi_teman_tidak_sama_sekali as $key => $value) {
          array_push($data['interaksi_teman'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== partisipasi_pelayanan Sangat Besar========================
      $query_partisipasi_pelayanan_sangat_besar = DB::select('SELECT partisipasi_pelayanan,
      COUNT(partisipasi_pelayanan) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where partisipasi_pelayanan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_partisipasi_pelayanan_sangat_besar as $key => $value) {
          array_push($data['partisipasi_pelayanan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_pelayanan Besar========================
      $query_partisipasi_pelayanan_besar = DB::select('SELECT partisipasi_pelayanan,
      COUNT(partisipasi_pelayanan) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where partisipasi_pelayanan = "Besar"'.$prodi_id.'');

      foreach ($query_partisipasi_pelayanan_besar as $key => $value) {
          array_push($data['partisipasi_pelayanan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_pelayanan Cukup========================
      $query_partisipasi_pelayanan_cukup_besar = DB::select('SELECT partisipasi_pelayanan,
      COUNT(partisipasi_pelayanan) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where partisipasi_pelayanan = "Cukup"'.$prodi_id.'');

      foreach ($query_partisipasi_pelayanan_cukup_besar as $key => $value) {
          array_push($data['partisipasi_pelayanan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_pelayanan Tidak========================
      $query_partisipasi_pelayanan_kurang = DB::select('SELECT partisipasi_pelayanan,
      COUNT(partisipasi_pelayanan) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where partisipasi_pelayanan = "Tidak"'.$prodi_id.'');

      foreach ($query_partisipasi_pelayanan_kurang as $key => $value) {
          array_push($data['partisipasi_pelayanan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== partisipasi_pelayanan Tidak sama sekali========================
      $query_partisipasi_pelayanan_tidak_sama_sekali = DB::select('SELECT partisipasi_pelayanan,
      COUNT(partisipasi_pelayanan) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where partisipasi_pelayanan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_partisipasi_pelayanan_tidak_sama_sekali as $key => $value) {
          array_push($data['partisipasi_pelayanan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== lainnya Sangat Besar========================
      $query_lainnya_sangat_besar = DB::select('SELECT lainnya,
      COUNT(lainnya) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where lainnya = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_lainnya_sangat_besar as $key => $value) {
          array_push($data['lainnya'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== lainnya Besar========================
      $query_lainnya_besar = DB::select('SELECT lainnya,
      COUNT(lainnya) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where lainnya = "Besar"'.$prodi_id.'');

      foreach ($query_lainnya_besar as $key => $value) {
          array_push($data['lainnya'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== lainnya Cukup========================
      $query_lainnya_cukup_besar = DB::select('SELECT lainnya,
      COUNT(lainnya) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where lainnya = "Cukup"'.$prodi_id.'');

      foreach ($query_lainnya_cukup_besar as $key => $value) {
          array_push($data['lainnya'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== lainnya Tidak========================
      $query_lainnya_kurang = DB::select('SELECT lainnya,
      COUNT(lainnya) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where lainnya = "Tidak"'.$prodi_id.'');

      foreach ($query_lainnya_kurang as $key => $value) {
          array_push($data['lainnya'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== lainnya Tidak sama sekali========================
      $query_lainnya_tidak_sama_sekali = DB::select('SELECT lainnya,
      COUNT(lainnya) AS jumlah  FROM tb_penilaian_belajar_mengajar
      JOIN tb_mahasiswa ON tb_penilaian_belajar_mengajar.npm = tb_mahasiswa.npm
        where lainnya = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_lainnya_tidak_sama_sekali as $key => $value) {
          array_push($data['lainnya'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
    // dd($data);
    return $data;
  }
  public function show_data(){
    try {
        $result = [];
        $count = 1;
        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_penilaian_belajar_mengajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')                
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_penilaian_belajar_mengajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_penilaian_belajar_mengajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
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
            $data[] = $user->interaksi_dosen;
            $data[] = $user->bimbingan_akademik;
            $data[] = $user->proyek_riset;
            $data[] = $user->jejaring_ilmiah;
            $data[] = $user->kondisi_belajar;
            $data[] = $user->interaksi_teman;
            $data[] = $user->partisipasi_pelayanan;
            $data[] = $user->lainnya;
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
          $query = DB::table('tb_penilaian_belajar_mengajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->get();
      }else if(Auth::user()->role_id == 2){
          $query = DB::table('tb_penilaian_belajar_mengajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
          ->get();
      }
      else{
          $query = DB::table('tb_penilaian_belajar_mengajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('kode_prodi_id', Auth::user()->prodi_id)
          ->get();
      }

      // dd($query);

      $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Penilaian Terhadap Aspek Belajar Mengajar');

      $sheet->setCellValue('A3', 'NO');
      $sheet->setCellValue('B3', 'NPM');
      $sheet->setCellValue('C3', 'NAMA');
      $sheet->setCellValue('D3', 'PRODI');
      $sheet->setCellValue('E3', 'TAHUN LULUS');
      $sheet->setCellValue('F3', 'Interaksi dengan Dosen di Luar Jadwal Kuliah');
      $sheet->setCellValue('G3', 'Pembimbingan akademik');
      $sheet->setCellValue('H3', 'Berpartisipasi dalam proyek riset');
      $sheet->setCellValue('I3', 'Kondisi umum belajar mengajar');
      $sheet->setCellValue('J3', 'Kesempatan menjadi bagian dari jejaring ilmiah profesional');
      $sheet->setCellValue('K3', 'Kesempatan berinteraksi dengan teman');
      $sheet->setCellValue('L3', 'Kesempatan berpartisipasi dalam pelayanan pasien');
      $sheet->setCellValue('M3', 'Lainnya');

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
      $sheet->mergeCells("M3:M4");

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
      $sheet->getColumnDimension('M')->setWidth(15);

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
      $sheet->getStyle('A5:M50')->applyFromArray($styleArray);
      $sheet->getStyle('A3:M4')->applyFromArray($styleHeader);
      $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
      $sheet->getStyle('A3:M3')->applyFromArray($styleheader);

      foreach ($query as $key => $value) {
          $sheet->setCellValue('A'.$i, $no++);
          $sheet->setCellValue('B'.$i, $value->npm);
          $sheet->setCellValue('C'.$i, $value->nama);
          $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
          $sheet->setCellValue('E'.$i, $value->tahun_lulus);
          $sheet->setCellValue('F'.$i, $value->interaksi_dosen);
          $sheet->setCellValue('G'.$i, $value->bimbingan_akademik);
          $sheet->setCellValue('H'.$i, $value->proyek_riset);
          $sheet->setCellValue('I'.$i, $value->jejaring_ilmiah);
          $sheet->setCellValue('J'.$i, $value->kondisi_belajar);
          $sheet->setCellValue('K'.$i, $value->interaksi_teman);
          $sheet->setCellValue('L'.$i, $value->partisipasi_pelayanan);
          $sheet->setCellValue('M'.$i, $value->lainnya);

          $i++;
          
      }

      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
      $date = date('d-F-Y');
      $file_name = 'Laporan Penilaian Terhadap Aspek Belajar Mengajar - '. $date.'.xlsx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'.$file_name.'"');
      $writer->save("php://output");
  }
}
