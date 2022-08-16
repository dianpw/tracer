<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PengalamanPelajarController extends Controller{
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
    return view('pengalaman_belajar.index', compact('auth_user', 'show_tahun','tahun_terakhir'));
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

      $data['kelas'] = [];
      $data['magang_kerja'] = [];
      $data['pengabdian'] = [];
      $data['organisasi_internal'] = [];
      $data['thesis'] = [];
      $data['organisasi_lintas'] = [];
      $data['organisasi_lintas_nasional'] = [];
      $data['organisasi_lintas_negara'] = [];      
      $data['ekstrakurikuler'] = [];
      $data['olahraga'] = [];

      // ======================== kelas Sangat Besar========================
      $query_kelas = DB::select('SELECT kelas, 
      COUNT(kelas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
      where kelas = "Sangat Besar"'.$prodi_id.'' );
      foreach ($query_kelas as $key => $value) {
          array_push($data['kelas'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kelas Besar========================
      $query_kelas_besar = DB::select('SELECT kelas,
      COUNT(kelas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where kelas = "Besar"'.$prodi_id.'');
      foreach ($query_kelas_besar as $key => $value) {
          array_push($data['kelas'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kelas cukup_besar========================
      $query_kelas_cukup_besar = DB::select('SELECT kelas,
      COUNT(kelas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where kelas = "Cukup"'.$prodi_id.'');
      foreach ($query_kelas_cukup_besar as $key => $value) {
          array_push($data['kelas'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kelas Tidak========================
      $query_kelas_kurang = DB::select('SELECT kelas,
      COUNT(kelas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where kelas = "Tidak"'.$prodi_id.'');
      foreach ($query_kelas_kurang as $key => $value) {
          array_push($data['kelas'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kelas Tidak sama sekali========================
      $query_kelas_tidak_sama_sekali = DB::select('SELECT kelas,
      COUNT(kelas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where kelas = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_kelas_tidak_sama_sekali as $key => $value) {
          array_push($data['kelas'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      // ======================== magang_kerja Sangat Besar========================
      $query_magang_kerja_sangat_besar = DB::select('SELECT magang_kerja,
      COUNT(magang_kerja) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where magang_kerja = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_magang_kerja_sangat_besar as $key => $value) {
          array_push($data['magang_kerja'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== magang_kerja Besar========================
      $query_magang_kerja_besar = DB::select('SELECT magang_kerja,
      COUNT(magang_kerja) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where magang_kerja = "Besar"'.$prodi_id.'');
      foreach ($query_magang_kerja_besar as $key => $value) {
          array_push($data['magang_kerja'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== magang_kerja Cukup========================
      $query_magang_kerja_cukup_besar = DB::select('SELECT magang_kerja,
      COUNT(magang_kerja) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where magang_kerja = "Cukup"'.$prodi_id.'');
      foreach ($query_magang_kerja_cukup_besar as $key => $value) {
          array_push($data['magang_kerja'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== magang_kerja Tidak========================
      $query_magang_kerja_kurang = DB::select('SELECT magang_kerja,
      COUNT(magang_kerja) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where magang_kerja = "Tidak"'.$prodi_id.'');
      foreach ($query_magang_kerja_kurang as $key => $value) {
          array_push($data['magang_kerja'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== magang_kerja Tidak sama sekali========================
      $query_magang_kerja_tidak_sama_sekali = DB::select('SELECT magang_kerja,
      COUNT(magang_kerja) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where magang_kerja = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_magang_kerja_tidak_sama_sekali as $key => $value) {
          array_push($data['magang_kerja'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== pengabdian dalam proyek Sangat Besar========================
      $query_pengabdian_sangat_besar = DB::select('SELECT pengabdian,
      COUNT(pengabdian) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where pengabdian = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_pengabdian_sangat_besar as $key => $value) {
          array_push($data['pengabdian'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== pengabdian dalam proyek Besar========================
      $query_pengabdian_besar = DB::select('SELECT pengabdian,
      COUNT(pengabdian) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where pengabdian = "Besar"'.$prodi_id.'');
      foreach ($query_pengabdian_besar as $key => $value) {
          array_push($data['pengabdian'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== pengabdian dalam proyek Cukup========================
      $query_pengabdian_cukup_besar = DB::select('SELECT pengabdian,
      COUNT(pengabdian) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where pengabdian = "Cukup"'.$prodi_id.'');
      foreach ($query_pengabdian_cukup_besar as $key => $value) {
          array_push($data['pengabdian'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== pengabdian dalam proyek Tidak========================
      $query_pengabdian_kurang = DB::select('SELECT pengabdian,
      COUNT(pengabdian) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where pengabdian = "Tidak"'.$prodi_id.'');
      foreach ($query_pengabdian_kurang as $key => $value) {
        array_push($data['pengabdian'], ['Tidak' => (int)$value->jumlah]);
      }

        // ======================== pengabdian dalam proyek Tidak sama sekali========================
      $query_pengabdian_tidak_sama_sekali = DB::select('SELECT pengabdian,
      COUNT(pengabdian) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where pengabdian = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_pengabdian_tidak_sama_sekali as $key => $value) {
          array_push($data['pengabdian'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

  

      // ======================== thesis Sangat Besar========================
      $query_thesis_sangat_besar = DB::select('SELECT thesis,
      COUNT(thesis) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where thesis = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_thesis_sangat_besar as $key => $value) {
          array_push($data['thesis'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== thesis Besar========================
      $query_thesis_besar = DB::select('SELECT thesis,
      COUNT(thesis) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where thesis = "Besar"'.$prodi_id.'');
      foreach ($query_thesis_besar as $key => $value) {
          array_push($data['thesis'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== thesis Cukup========================
      $query_thesis_cukup_besar = DB::select('SELECT thesis,
      COUNT(thesis) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where thesis = "Cukup"'.$prodi_id.'');
      foreach ($query_thesis_cukup_besar as $key => $value) {
          array_push($data['thesis'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== thesis Tidak========================
      $query_thesis_kurang = DB::select('SELECT thesis,
      COUNT(thesis) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where thesis = "Tidak"'.$prodi_id.'');
      foreach ($query_thesis_kurang as $key => $value) {
          array_push($data['thesis'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== thesis Tidak sama sekali========================
      $query_thesis_tidak_sama_sekali = DB::select('SELECT thesis,
      COUNT(thesis) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where thesis = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_thesis_tidak_sama_sekali as $key => $value) {
          array_push($data['thesis'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

          //--------------------------------------------------------------------------

      // ======================== organisasi_internal Sangat Besar========================
      $query_organisasi_internal_sangat_besar = DB::select('SELECT organisasi_internal,
      COUNT(organisasi_internal) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_internal = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_organisasi_internal_sangat_besar as $key => $value) {
          array_push($data['organisasi_internal'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_internal Besar========================
      $query_organisasi_internal_besar = DB::select('SELECT organisasi_internal,
      COUNT(organisasi_internal) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_internal = "Besar"'.$prodi_id.'');

      foreach ($query_organisasi_internal_besar as $key => $value) {
          array_push($data['organisasi_internal'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_internal Cukup========================
      $query_organisasi_internal_cukup_besar = DB::select('SELECT organisasi_internal,
      COUNT(organisasi_internal) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_internal = "Cukup"'.$prodi_id.'');

      foreach ($query_organisasi_internal_cukup_besar as $key => $value) {
          array_push($data['organisasi_internal'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== organisasi_internal Tidak========================
      $query_organisasi_internal_kurang = DB::select('SELECT organisasi_internal,
      COUNT(organisasi_internal) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_internal = "Tidak"'.$prodi_id.'');

      foreach ($query_organisasi_internal_kurang as $key => $value) {
          array_push($data['organisasi_internal'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== organisasi_internal Tidak sama sekali========================
      $query_organisasi_internal_tidak_sama_sekali = DB::select('SELECT organisasi_internal,
      COUNT(organisasi_internal) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_internal = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_organisasi_internal_tidak_sama_sekali as $key => $value) {
          array_push($data['organisasi_internal'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                //--------------------------------------------------------------------------

      // ======================== organisasi_lintas Sangat Besar========================
      $query_organisasi_lintas_sangat_besar = DB::select('SELECT organisasi_lintas,
      COUNT(organisasi_lintas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_sangat_besar as $key => $value) {
          array_push($data['organisasi_lintas'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Besar========================
      $query_organisasi_lintas_besar = DB::select('SELECT organisasi_lintas,
      COUNT(organisasi_lintas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas = "Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_besar as $key => $value) {
          array_push($data['organisasi_lintas'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Cukup========================
      $query_organisasi_lintas_cukup_besar = DB::select('SELECT organisasi_lintas,
      COUNT(organisasi_lintas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas = "Cukup"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_cukup_besar as $key => $value) {
          array_push($data['organisasi_lintas'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak========================
      $query_organisasi_lintas_kurang = DB::select('SELECT organisasi_lintas,
      COUNT(organisasi_lintas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas = "Tidak"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_kurang as $key => $value) {
          array_push($data['organisasi_lintas'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak sama sekali========================
      $query_organisasi_lintas_tidak_sama_sekali = DB::select('SELECT organisasi_lintas,
      COUNT(organisasi_lintas) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_tidak_sama_sekali as $key => $value) {
          array_push($data['organisasi_lintas'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== organisasi_lintas_nasional Sangat Besar========================
      $query_organisasi_lintas_nasional_sangat_besar = DB::select('SELECT organisasi_lintas_nasional,
      COUNT(organisasi_lintas_nasional) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_nasional = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_nasional_sangat_besar as $key => $value) {
          array_push($data['organisasi_lintas_nasional'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_nasional Besar========================
      $query_organisasi_lintas_nasional_besar = DB::select('SELECT organisasi_lintas_nasional,
      COUNT(organisasi_lintas_nasional) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_nasional = "Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_nasional_besar as $key => $value) {
          array_push($data['organisasi_lintas_nasional'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_nasional Cukup========================
      $query_organisasi_lintas_nasional_cukup_besar = DB::select('SELECT organisasi_lintas_nasional,
      COUNT(organisasi_lintas_nasional) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_nasional = "Cukup"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_nasional_cukup_besar as $key => $value) {
          array_push($data['organisasi_lintas_nasional'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_nasional Tidak========================
      $query_organisasi_lintas_nasional_kurang = DB::select('SELECT organisasi_lintas_nasional,
      COUNT(organisasi_lintas_nasional) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_nasional = "Tidak"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_nasional_kurang as $key => $value) {
          array_push($data['organisasi_lintas_nasional'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_nasional Tidak sama sekali========================
      $query_organisasi_lintas_nasional_tidak_sama_sekali = DB::select('SELECT organisasi_lintas_nasional,
      COUNT(organisasi_lintas_nasional) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_nasional = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_nasional_tidak_sama_sekali as $key => $value) {
          array_push($data['organisasi_lintas_nasional'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== organisasi_lintas_negara Sangat Besar========================
      $query_organisasi_lintas_negara_sangat_besar = DB::select('SELECT organisasi_lintas_negara,
      COUNT(organisasi_lintas_negara) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_negara = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_negara_sangat_besar as $key => $value) {
          array_push($data['organisasi_lintas_negara'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_negara Besar========================
      $query_organisasi_lintas_negara_besar = DB::select('SELECT organisasi_lintas_negara,
      COUNT(organisasi_lintas_negara) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_negara = "Besar"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_negara_besar as $key => $value) {
          array_push($data['organisasi_lintas_negara'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_negara Cukup========================
      $query_organisasi_lintas_negara_cukup_besar = DB::select('SELECT organisasi_lintas_negara,
      COUNT(organisasi_lintas_negara) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_negara = "Cukup"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_negara_cukup_besar as $key => $value) {
          array_push($data['organisasi_lintas_negara'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_negara Tidak========================
      $query_organisasi_lintas_negara_kurang = DB::select('SELECT organisasi_lintas_negara,
      COUNT(organisasi_lintas_negara) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_negara = "Tidak"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_negara_kurang as $key => $value) {
          array_push($data['organisasi_lintas_negara'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== organisasi_lintas_negara Tidak sama sekali========================
      $query_organisasi_lintas_negara_tidak_sama_sekali = DB::select('SELECT organisasi_lintas_negara,
      COUNT(organisasi_lintas_negara) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where organisasi_lintas_negara = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_organisasi_lintas_negara_tidak_sama_sekali as $key => $value) {
          array_push($data['organisasi_lintas_negara'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
            //--------------------------------------------------------------------------

      // ======================== ekstrakurikuler Sangat Besar========================
      $query_ekstrakurikuler_sangat_besar = DB::select('SELECT ekstrakurikuler,
      COUNT(ekstrakurikuler) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where ekstrakurikuler = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_ekstrakurikuler_sangat_besar as $key => $value) {
          array_push($data['ekstrakurikuler'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== ekstrakurikuler Besar========================
      $query_ekstrakurikuler_besar = DB::select('SELECT ekstrakurikuler,
      COUNT(ekstrakurikuler) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where ekstrakurikuler = "Besar"'.$prodi_id.'');

      foreach ($query_ekstrakurikuler_besar as $key => $value) {
          array_push($data['ekstrakurikuler'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== ekstrakurikuler Cukup========================
      $query_ekstrakurikuler_cukup_besar = DB::select('SELECT ekstrakurikuler,
      COUNT(ekstrakurikuler) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where ekstrakurikuler = "Cukup"'.$prodi_id.'');

      foreach ($query_ekstrakurikuler_cukup_besar as $key => $value) {
          array_push($data['ekstrakurikuler'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== ekstrakurikuler Tidak========================
      $query_ekstrakurikuler_kurang = DB::select('SELECT ekstrakurikuler,
      COUNT(ekstrakurikuler) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where ekstrakurikuler = "Tidak"'.$prodi_id.'');

      foreach ($query_ekstrakurikuler_kurang as $key => $value) {
          array_push($data['ekstrakurikuler'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== ekstrakurikuler Tidak sama sekali========================
      $query_ekstrakurikuler_tidak_sama_sekali = DB::select('SELECT ekstrakurikuler,
      COUNT(ekstrakurikuler) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where ekstrakurikuler = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_ekstrakurikuler_tidak_sama_sekali as $key => $value) {
          array_push($data['ekstrakurikuler'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== olahraga Sangat Besar========================
      $query_olahraga_sangat_besar = DB::select('SELECT olahraga,
      COUNT(olahraga) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where olahraga = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_olahraga_sangat_besar as $key => $value) {
          array_push($data['olahraga'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== olahraga Besar========================
      $query_olahraga_besar = DB::select('SELECT olahraga,
      COUNT(olahraga) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where olahraga = "Besar"'.$prodi_id.'');

      foreach ($query_olahraga_besar as $key => $value) {
          array_push($data['olahraga'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== olahraga Cukup========================
      $query_olahraga_cukup_besar = DB::select('SELECT olahraga,
      COUNT(olahraga) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where olahraga = "Cukup"'.$prodi_id.'');

      foreach ($query_olahraga_cukup_besar as $key => $value) {
          array_push($data['olahraga'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== olahraga Tidak========================
      $query_olahraga_kurang = DB::select('SELECT olahraga,
      COUNT(olahraga) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where olahraga = "Tidak"'.$prodi_id.'');

      foreach ($query_olahraga_kurang as $key => $value) {
          array_push($data['olahraga'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== olahraga Tidak sama sekali========================
      $query_olahraga_tidak_sama_sekali = DB::select('SELECT olahraga,
      COUNT(olahraga) AS jumlah  FROM tb_penilaian_pengalaman_belajar
      JOIN tb_mahasiswa ON tb_penilaian_pengalaman_belajar.npm = tb_mahasiswa.npm
        where olahraga = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_olahraga_tidak_sama_sekali as $key => $value) {
          array_push($data['olahraga'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
    // dd($data);
    return $data;
  }
  public function show_data(){
    try {
        $result = [];
        $count = 1;
        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_penilaian_pengalaman_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')                
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_penilaian_pengalaman_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_penilaian_pengalaman_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
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
            $data[] = $user->kelas;
            $data[] = $user->magang_kerja;
            $data[] = $user->pengabdian;
            $data[] = $user->thesis;
            $data[] = $user->organisasi_internal;
            $data[] = $user->organisasi_lintas;
            $data[] = $user->organisasi_lintas_nasional;
            $data[] = $user->organisasi_lintas_negara;
            $data[] = $user->ekstrakurikuler;
            $data[] = $user->olahraga;
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
          $query = DB::table('tb_penilaian_pengalaman_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->get();
      }else if(Auth::user()->role_id == 2){
          $query = DB::table('tb_penilaian_pengalaman_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
          ->get();
      }
      else{
          $query = DB::table('tb_penilaian_pengalaman_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('kode_prodi_id', Auth::user()->prodi_id)
          ->get();
      }

      // dd($query);

      $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Penilaian Terhadap Pengalaman Belajar');

      $sheet->setCellValue('A3', 'NO');
      $sheet->setCellValue('B3', 'NPM');
      $sheet->setCellValue('C3', 'NAMA');
      $sheet->setCellValue('D3', 'PRODI');
      $sheet->setCellValue('E3', 'TAHUN LULUS');
      $sheet->setCellValue('F3', 'Pembelajaran di kelas');
      $sheet->setCellValue('G3', 'Magang/kerja lapangan/praktikum');
      $sheet->setCellValue('H3', 'Pengabdian masyarakat');
      $sheet->setCellValue('I3', 'Pelaksanaan riset/penulisan thesis');
      $sheet->setCellValue('J3', 'Organisasi kemahasiswaan internal fakultas');
      $sheet->setCellValue('K3', 'Organisasi kemahasiswaan lintas fakultas di UNISMA');
      $sheet->setCellValue('L3', 'Organisasi kemahasiswaaan lintas universitas nasional');
      $sheet->setCellValue('M3', 'Organisasi kemahasiswaan lintas universitas lintas negara (internasional)');
      $sheet->setCellValue('N3', 'Kegiatan ekstrakurikuler');
      $sheet->setCellValue('O3', 'Rekreasi dan olahraga');

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
      $sheet->mergeCells("N3:N4");
      $sheet->mergeCells("O3:O4");

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
      $sheet->getColumnDimension('N')->setWidth(15);
      $sheet->getColumnDimension('O')->setWidth(15);

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
      $sheet->getStyle('A5:O50')->applyFromArray($styleArray);
      $sheet->getStyle('A3:O4')->applyFromArray($styleHeader);
      $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
      $sheet->getStyle('A3:O3')->applyFromArray($styleheader);

      foreach ($query as $key => $value) {
          $sheet->setCellValue('A'.$i, $no++);
          $sheet->setCellValue('B'.$i, $value->npm);
          $sheet->setCellValue('C'.$i, $value->nama);
          $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
          $sheet->setCellValue('E'.$i, $value->tahun_lulus);
          $sheet->setCellValue('F'.$i, $value->kelas);
          $sheet->setCellValue('G'.$i, $value->magang_kerja);
          $sheet->setCellValue('H'.$i, $value->pengabdian);
          $sheet->setCellValue('I'.$i, $value->thesis);
          $sheet->setCellValue('J'.$i, $value->organisasi_internal);
          $sheet->setCellValue('K'.$i, $value->organisasi_lintas);
          $sheet->setCellValue('L'.$i, $value->organisasi_lintas_nasional);
          $sheet->setCellValue('M'.$i, $value->organisasi_lintas_negara);
          $sheet->setCellValue('N'.$i, $value->ekstrakurikuler);
          $sheet->setCellValue('O'.$i, $value->olahraga);

          $i++;
          
      }

      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
      $date = date('d-F-Y');
      $file_name = 'Laporan Penilaian Terhadap Pengalaman Belajar - '. $date.'.xlsx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'.$file_name.'"');
      $writer->save("php://output");
  }
}
