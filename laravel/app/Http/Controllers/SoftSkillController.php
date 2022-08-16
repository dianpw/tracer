<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SoftSkillController extends Controller{
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
    return view('soft-skill.index', compact('auth_user'));
  }
  
  public function graph(){

      $data['percara_diri'] = [];
      $data['kepemimpinan'] = [];
      $data['kejujuran'] = [];
      $data['kedisiplinan'] = [];
      $data['komunikasi'] = [];
      $data['motivasi'] = [];
      $data['adaptasi'] = [];
      $data['tekanan'] = [];
      
      // ======================== percara_diri 1========================
      $query_percara_diri_sangat_besar = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
      where percara_diri = "1"' );
      foreach ($query_percara_diri_sangat_besar as $key => $value) {
          array_push($data['percara_diri'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== percara_diri 2========================
      $query_percara_diri_besar = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "2"');
      foreach ($query_percara_diri_besar as $key => $value) {
          array_push($data['percara_diri'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== percara_diri cukup_besar========================
      $query_percara_diri_cukup_besar = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "3"');
      foreach ($query_percara_diri_cukup_besar as $key => $value) {
          array_push($data['percara_diri'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== percara_diri 4========================
      $query_percara_diri_kurang = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "4"');
      foreach ($query_percara_diri_kurang as $key => $value) {
          array_push($data['percara_diri'], ['ke4' => (int)$value->jumlah]);
      }
      // ======================== percara_diri 5========================
      $query_percara_diri_kurang = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "5"');
      foreach ($query_percara_diri_kurang as $key => $value) {
          array_push($data['percara_diri'], ['ke5' => (int)$value->jumlah]);
      }
      // ======================== percara_diri 6========================
      $query_percara_diri_kurang = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "6"');
      foreach ($query_percara_diri_kurang as $key => $value) {
          array_push($data['percara_diri'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== percara_diri 7========================
      $query_percara_diri_kurang = DB::select('SELECT percara_diri,
      COUNT(percara_diri) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where percara_diri = "7"');
      foreach ($query_percara_diri_kurang as $key => $value) {
          array_push($data['percara_diri'], ['ke7' => (int)$value->jumlah]);
      }
      // ======================== kepemimpinan 1========================
      $query_kepemimpinan_sangat_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "1"');
      foreach ($query_kepemimpinan_sangat_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 2========================
      $query_kepemimpinan_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "2"');
      foreach ($query_kepemimpinan_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 3========================
      $query_kepemimpinan_cukup_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "3"');
      foreach ($query_kepemimpinan_cukup_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 4========================
      $query_kepemimpinan_kurang = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "4"');
      foreach ($query_kepemimpinan_kurang as $key => $value) {
          array_push($data['kepemimpinan'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 5========================
      $query_kepemimpinan_kurang = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "5"');
      foreach ($query_kepemimpinan_kurang as $key => $value) {
          array_push($data['kepemimpinan'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 6========================
      $query_kepemimpinan_kurang = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "6"');
      foreach ($query_kepemimpinan_kurang as $key => $value) {
          array_push($data['kepemimpinan'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan 7========================
      $query_kepemimpinan_kurang = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kepemimpinan = "7"');
      foreach ($query_kepemimpinan_kurang as $key => $value) {
          array_push($data['kepemimpinan'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== kejujuran dalam proyek 1========================
      $query_kejujuran_sangat_besar = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "1"');
      foreach ($query_kejujuran_sangat_besar as $key => $value) {
          array_push($data['kejujuran'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== kejujuran dalam proyek 2========================
      $query_kejujuran_besar = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "2"');
      foreach ($query_kejujuran_besar as $key => $value) {
          array_push($data['kejujuran'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== kejujuran dalam proyek 3========================
      $query_kejujuran_cukup_besar = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "3"');
      foreach ($query_kejujuran_cukup_besar as $key => $value) {
          array_push($data['kejujuran'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== kejujuran dalam proyek 4========================
      $query_kejujuran_kurang = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "4"');
      foreach ($query_kejujuran_kurang as $key => $value) {
        array_push($data['kejujuran'], ['ke4' => (int)$value->jumlah]);
      } 

      // ======================== kejujuran dalam proyek 5========================
      $query_kejujuran_kurang = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "5"');
      foreach ($query_kejujuran_kurang as $key => $value) {
        array_push($data['kejujuran'], ['ke5' => (int)$value->jumlah]);
      }   

      // ======================== kejujuran dalam proyek 6========================
      $query_kejujuran_kurang = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "6"');
      foreach ($query_kejujuran_kurang as $key => $value) {
        array_push($data['kejujuran'], ['ke6' => (int)$value->jumlah]);
      }   

      // ======================== kejujuran dalam proyek 7========================
      $query_kejujuran_kurang = DB::select('SELECT kejujuran,
      COUNT(kejujuran) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kejujuran = "75"');
      foreach ($query_kejujuran_kurang as $key => $value) {
        array_push($data['kejujuran'], ['ke7' => (int)$value->jumlah]);
      }  

      // ======================== kedisiplinan 1========================
      $query_kedisiplinan_sangat_besar = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "1"');
      foreach ($query_kedisiplinan_sangat_besar as $key => $value) {
          array_push($data['kedisiplinan'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 2========================
      $query_kedisiplinan_besar = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "2"');
      foreach ($query_kedisiplinan_besar as $key => $value) {
          array_push($data['kedisiplinan'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 3========================
      $query_kedisiplinan_cukup_besar = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "3"');
      foreach ($query_kedisiplinan_cukup_besar as $key => $value) {
          array_push($data['kedisiplinan'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 4========================
      $query_kedisiplinan_kurang = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "4"');
      foreach ($query_kedisiplinan_kurang as $key => $value) {
          array_push($data['kedisiplinan'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 5========================
      $query_kedisiplinan_kurang = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "5"');
      foreach ($query_kedisiplinan_kurang as $key => $value) {
          array_push($data['kedisiplinan'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 6========================
      $query_kedisiplinan_kurang = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "6"');
      foreach ($query_kedisiplinan_kurang as $key => $value) {
          array_push($data['kedisiplinan'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== kedisiplinan 7========================
      $query_kedisiplinan_kurang = DB::select('SELECT kedisiplinan,
      COUNT(kedisiplinan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where kedisiplinan = "7"');
      foreach ($query_kedisiplinan_kurang as $key => $value) {
          array_push($data['kedisiplinan'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== komunikasi 1========================
      $query_komunikasi_sangat_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "1"');

      foreach ($query_komunikasi_sangat_besar as $key => $value) {
          array_push($data['komunikasi'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 2========================
      $query_komunikasi_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "2"');

      foreach ($query_komunikasi_besar as $key => $value) {
          array_push($data['komunikasi'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 3========================
      $query_komunikasi_cukup_besar = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "3"');

      foreach ($query_komunikasi_cukup_besar as $key => $value) {
          array_push($data['komunikasi'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 4========================
      $query_komunikasi_kurang = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "4"');

      foreach ($query_komunikasi_kurang as $key => $value) {
          array_push($data['komunikasi'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 5========================
      $query_komunikasi_kurang = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "5"');

      foreach ($query_komunikasi_kurang as $key => $value) {
          array_push($data['komunikasi'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 6========================
      $query_komunikasi_kurang = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "6"');

      foreach ($query_komunikasi_kurang as $key => $value) {
          array_push($data['komunikasi'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== komunikasi 7========================
      $query_komunikasi_kurang = DB::select('SELECT komunikasi,
      COUNT(komunikasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where komunikasi = "7"');

      foreach ($query_komunikasi_kurang as $key => $value) {
          array_push($data['komunikasi'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== motivasi 1========================
      $query_motivasi_sangat_besar = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "1"');

      foreach ($query_motivasi_sangat_besar as $key => $value) {
          array_push($data['motivasi'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 2========================
      $query_motivasi_besar = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "2"');

      foreach ($query_motivasi_besar as $key => $value) {
          array_push($data['motivasi'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 3========================
      $query_motivasi_cukup_besar = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "3"');

      foreach ($query_motivasi_cukup_besar as $key => $value) {
          array_push($data['motivasi'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 4========================
      $query_motivasi_kurang = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "4"');

      foreach ($query_motivasi_kurang as $key => $value) {
          array_push($data['motivasi'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 5========================
      $query_motivasi_kurang = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "5"');

      foreach ($query_motivasi_kurang as $key => $value) {
          array_push($data['motivasi'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 6========================
      $query_motivasi_kurang = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "6"');

      foreach ($query_motivasi_kurang as $key => $value) {
          array_push($data['motivasi'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 7========================
      $query_motivasi_kurang = DB::select('SELECT motivasi,
      COUNT(motivasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where motivasi = "7"');

      foreach ($query_motivasi_kurang as $key => $value) {
          array_push($data['motivasi'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== adaptasi 1========================
      $query_adaptasi_sangat_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "1"');

      foreach ($query_adaptasi_sangat_besar as $key => $value) {
          array_push($data['adaptasi'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 2========================
      $query_adaptasi_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "2"');

      foreach ($query_adaptasi_besar as $key => $value) {
          array_push($data['adaptasi'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 3========================
      $query_adaptasi_cukup_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "3"');

      foreach ($query_adaptasi_cukup_besar as $key => $value) {
          array_push($data['adaptasi'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 4========================
      $query_adaptasi_kurang = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "4"');

      foreach ($query_adaptasi_kurang as $key => $value) {
          array_push($data['adaptasi'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 5========================
      $query_adaptasi_kurang = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "5"');

      foreach ($query_adaptasi_kurang as $key => $value) {
          array_push($data['adaptasi'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 6========================
      $query_adaptasi_kurang = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "6"');

      foreach ($query_adaptasi_kurang as $key => $value) {
          array_push($data['adaptasi'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== adaptasi 7========================
      $query_adaptasi_kurang = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where adaptasi = "7"');

      foreach ($query_adaptasi_kurang as $key => $value) {
          array_push($data['adaptasi'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== tekanan 1========================
      $query_tekanan_sangat_besar = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "1"');

      foreach ($query_tekanan_sangat_besar as $key => $value) {
          array_push($data['tekanan'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== tekanan 2========================
      $query_tekanan_besar = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "2"');

      foreach ($query_tekanan_besar as $key => $value) {
          array_push($data['tekanan'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== tekanan 3========================
      $query_tekanan_cukup_besar = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "3"');

      foreach ($query_tekanan_cukup_besar as $key => $value) {
          array_push($data['tekanan'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== tekanan 4========================
      $query_tekanan_kurang = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "4"');

      foreach ($query_tekanan_kurang as $key => $value) {
          array_push($data['tekanan'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== tekanan 5========================
      $query_tekanan_kurang = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "5"');

      foreach ($query_tekanan_kurang as $key => $value) {
          array_push($data['tekanan'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== tekanan 6========================
      $query_tekanan_kurang = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "6"');

      foreach ($query_tekanan_kurang as $key => $value) {
          array_push($data['tekanan'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== tekanan 7========================
      $query_tekanan_kurang = DB::select('SELECT tekanan,
      COUNT(tekanan) AS jumlah  FROM soft_skill
      JOIN tb_perusahaan ON soft_skill.id_perusahaan = tb_perusahaan.id_perusahaan
        where tekanan = "7"');

      foreach ($query_tekanan_kurang as $key => $value) {
          array_push($data['tekanan'], ['ke7' => (int)$value->jumlah]);
      }

    return $data;
  }

  public function show_data(){
    
    //SELECT soft_skill.id_perusahaan, tb_perusahaan.nama_perusahaan, percara_diri, kepemimpinan, kejujuran, kedisiplinan, komunikasi, motivasi, adaptasi, tekanan, soft_skill.created_at FROM soft_skill INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=soft_skill.id_perusahaan
    
    try {
      $result = [];
      $count = 1;
      $query = DB::select('SELECT soft_skill.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, percara_diri, kepemimpinan, kejujuran, kedisiplinan, komunikasi, motivasi, adaptasi, tekanan, soft_skill.created_at FROM soft_skill INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=soft_skill.id_perusahaan');

      foreach ($query as $user) {
          $data = [];
          $data[] = $count++;
          $data[] = strtoupper($user->nama_perusahaan . '</br>[ ' . $user->nama . ' ]' );
          $data[] = ($user->percara_diri);
          $data[] = ($user->kepemimpinan);
          $data[] = ($user->kejujuran);
          $data[] = $user->kedisiplinan;
          $data[] = $user->komunikasi;
          $data[] = $user->motivasi;
          $data[] = $user->adaptasi;
          $data[] = $user->tekanan;
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
    
    $query = DB::select('SELECT soft_skill.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, percara_diri, kepemimpinan, kejujuran, kedisiplinan, komunikasi, motivasi, adaptasi, tekanan, soft_skill.created_at FROM soft_skill INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=soft_skill.id_perusahaan');

    // dd($query);

    $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KEPUASAN PENGGUNA LULUSAN');

    $sheet->setCellValue('A3', 'NO');
    $sheet->setCellValue('B3', 'Perusahaan');
    $sheet->setCellValue('C3', 'Kepercayaan diri');
    $sheet->setCellValue('D3', 'Kepemimpinan');
    $sheet->setCellValue('E3', 'Kejujuran');
    $sheet->setCellValue('F3', 'Kedisiplinan');
    $sheet->setCellValue('G3', 'Komunikasi');
    $sheet->setCellValue('H3', 'Motivasi tinggi');
    $sheet->setCellValue('I3', 'Mudah adaptasi & bekerjasama');
    $sheet->setCellValue('J3', 'Mampu bekerja dalam tekanan');

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
    $sheet->getStyle('A5:J50')->applyFromArray($styleArray);
    $sheet->getStyle('A3:J4')->applyFromArray($styleHeader);
    $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
    $sheet->getStyle('A3:J3')->applyFromArray($styleheader);

    foreach ($query as $key => $value) {
      $sheet->setCellValue('A'.$i, $no++);
      $sheet->setCellValue('B'.$i, $value->nama_perusahaan . ' [ ' .$value->nama . ' ]');
      $sheet->setCellValue('C'.$i, $value->percara_diri);
      $sheet->setCellValue('D'.$i, $value->kepemimpinan);
      $sheet->setCellValue('E'.$i, $value->kejujuran);
      $sheet->setCellValue('F'.$i, $value->kedisiplinan);
      $sheet->setCellValue('G'.$i, $value->komunikasi);
      $sheet->setCellValue('H'.$i, $value->motivasi);
      $sheet->setCellValue('I'.$i, $value->adaptasi);
      $sheet->setCellValue('J'.$i, $value->tekanan);
      $i++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $date = date('d-F-Y');
    $file_name = 'Laporan Nilai Soft Skill - '. $date.'.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$file_name.'"');
    $writer->save("php://output");
  }
}
