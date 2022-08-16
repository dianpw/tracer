<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KriteriaController extends Controller{
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
    return view('kriteria.index', compact('auth_user'));
  }
  
  public function graph(){

      $data['krit_ipk'] = [];
      $data['bahasa_asing'] = [];
      $data['komputer'] = [];
      $data['penghargaan'] = [];
      $data['pengalaman'] = [];
      $data['pelatihan'] = [];
      $data['berkendara'] = [];
      
      // ======================== krit_ipk 1========================
      $query_krit_ipk_sangat_besar = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
      where krit_ipk = "1"' );
      foreach ($query_krit_ipk_sangat_besar as $key => $value) {
          array_push($data['krit_ipk'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== krit_ipk 2========================
      $query_krit_ipk_besar = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "2"');
      foreach ($query_krit_ipk_besar as $key => $value) {
          array_push($data['krit_ipk'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== krit_ipk cukup_besar========================
      $query_krit_ipk_cukup_besar = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "3"');
      foreach ($query_krit_ipk_cukup_besar as $key => $value) {
          array_push($data['krit_ipk'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== krit_ipk 4========================
      $query_krit_ipk_kurang = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "4"');
      foreach ($query_krit_ipk_kurang as $key => $value) {
          array_push($data['krit_ipk'], ['ke4' => (int)$value->jumlah]);
      }
      // ======================== krit_ipk 5========================
      $query_krit_ipk_kurang = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "5"');
      foreach ($query_krit_ipk_kurang as $key => $value) {
          array_push($data['krit_ipk'], ['ke5' => (int)$value->jumlah]);
      }
      // ======================== krit_ipk 6========================
      $query_krit_ipk_kurang = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "6"');
      foreach ($query_krit_ipk_kurang as $key => $value) {
          array_push($data['krit_ipk'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== krit_ipk 7========================
      $query_krit_ipk_kurang = DB::select('SELECT krit_ipk,
      COUNT(krit_ipk) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where krit_ipk = "7"');
      foreach ($query_krit_ipk_kurang as $key => $value) {
          array_push($data['krit_ipk'], ['ke7' => (int)$value->jumlah]);
      }
      // ======================== bahasa_asing 1========================
      $query_bahasa_asing_sangat_besar = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "1"');
      foreach ($query_bahasa_asing_sangat_besar as $key => $value) {
          array_push($data['bahasa_asing'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 2========================
      $query_bahasa_asing_besar = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "2"');
      foreach ($query_bahasa_asing_besar as $key => $value) {
          array_push($data['bahasa_asing'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 3========================
      $query_bahasa_asing_cukup_besar = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "3"');
      foreach ($query_bahasa_asing_cukup_besar as $key => $value) {
          array_push($data['bahasa_asing'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 4========================
      $query_bahasa_asing_kurang = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "4"');
      foreach ($query_bahasa_asing_kurang as $key => $value) {
          array_push($data['bahasa_asing'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 5========================
      $query_bahasa_asing_kurang = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "5"');
      foreach ($query_bahasa_asing_kurang as $key => $value) {
          array_push($data['bahasa_asing'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 6========================
      $query_bahasa_asing_kurang = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "6"');
      foreach ($query_bahasa_asing_kurang as $key => $value) {
          array_push($data['bahasa_asing'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== bahasa_asing 7========================
      $query_bahasa_asing_kurang = DB::select('SELECT bahasa_asing,
      COUNT(bahasa_asing) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where bahasa_asing = "7"');
      foreach ($query_bahasa_asing_kurang as $key => $value) {
          array_push($data['bahasa_asing'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== komputer dalam proyek 1========================
      $query_komputer_sangat_besar = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "1"');
      foreach ($query_komputer_sangat_besar as $key => $value) {
          array_push($data['komputer'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== komputer dalam proyek 2========================
      $query_komputer_besar = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "2"');
      foreach ($query_komputer_besar as $key => $value) {
          array_push($data['komputer'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== komputer dalam proyek 3========================
      $query_komputer_cukup_besar = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "3"');
      foreach ($query_komputer_cukup_besar as $key => $value) {
          array_push($data['komputer'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== komputer dalam proyek 4========================
      $query_komputer_kurang = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "4"');
      foreach ($query_komputer_kurang as $key => $value) {
        array_push($data['komputer'], ['ke4' => (int)$value->jumlah]);
      } 

      // ======================== komputer dalam proyek 5========================
      $query_komputer_kurang = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "5"');
      foreach ($query_komputer_kurang as $key => $value) {
        array_push($data['komputer'], ['ke5' => (int)$value->jumlah]);
      }   

      // ======================== komputer dalam proyek 6========================
      $query_komputer_kurang = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "6"');
      foreach ($query_komputer_kurang as $key => $value) {
        array_push($data['komputer'], ['ke6' => (int)$value->jumlah]);
      }   

      // ======================== komputer dalam proyek 7========================
      $query_komputer_kurang = DB::select('SELECT komputer,
      COUNT(komputer) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where komputer = "75"');
      foreach ($query_komputer_kurang as $key => $value) {
        array_push($data['komputer'], ['ke7' => (int)$value->jumlah]);
      }  

      // ======================== penghargaan 1========================
      $query_penghargaan_sangat_besar = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "1"');
      foreach ($query_penghargaan_sangat_besar as $key => $value) {
          array_push($data['penghargaan'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 2========================
      $query_penghargaan_besar = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "2"');
      foreach ($query_penghargaan_besar as $key => $value) {
          array_push($data['penghargaan'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 3========================
      $query_penghargaan_cukup_besar = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "3"');
      foreach ($query_penghargaan_cukup_besar as $key => $value) {
          array_push($data['penghargaan'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 4========================
      $query_penghargaan_kurang = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "4"');
      foreach ($query_penghargaan_kurang as $key => $value) {
          array_push($data['penghargaan'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 5========================
      $query_penghargaan_kurang = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "5"');
      foreach ($query_penghargaan_kurang as $key => $value) {
          array_push($data['penghargaan'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 6========================
      $query_penghargaan_kurang = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "6"');
      foreach ($query_penghargaan_kurang as $key => $value) {
          array_push($data['penghargaan'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== penghargaan 7========================
      $query_penghargaan_kurang = DB::select('SELECT penghargaan,
      COUNT(penghargaan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where penghargaan = "7"');
      foreach ($query_penghargaan_kurang as $key => $value) {
          array_push($data['penghargaan'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== pengalaman 1========================
      $query_pengalaman_sangat_besar = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "1"');

      foreach ($query_pengalaman_sangat_besar as $key => $value) {
          array_push($data['pengalaman'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 2========================
      $query_pengalaman_besar = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "2"');

      foreach ($query_pengalaman_besar as $key => $value) {
          array_push($data['pengalaman'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 3========================
      $query_pengalaman_cukup_besar = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "3"');

      foreach ($query_pengalaman_cukup_besar as $key => $value) {
          array_push($data['pengalaman'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 4========================
      $query_pengalaman_kurang = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "4"');

      foreach ($query_pengalaman_kurang as $key => $value) {
          array_push($data['pengalaman'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 5========================
      $query_pengalaman_kurang = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "5"');

      foreach ($query_pengalaman_kurang as $key => $value) {
          array_push($data['pengalaman'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 6========================
      $query_pengalaman_kurang = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "6"');

      foreach ($query_pengalaman_kurang as $key => $value) {
          array_push($data['pengalaman'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== pengalaman 7========================
      $query_pengalaman_kurang = DB::select('SELECT pengalaman,
      COUNT(pengalaman) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pengalaman = "7"');

      foreach ($query_pengalaman_kurang as $key => $value) {
          array_push($data['pengalaman'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== pelatihan 1========================
      $query_pelatihan_sangat_besar = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "1"');

      foreach ($query_pelatihan_sangat_besar as $key => $value) {
          array_push($data['pelatihan'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 2========================
      $query_pelatihan_besar = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "2"');

      foreach ($query_pelatihan_besar as $key => $value) {
          array_push($data['pelatihan'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 3========================
      $query_pelatihan_cukup_besar = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "3"');

      foreach ($query_pelatihan_cukup_besar as $key => $value) {
          array_push($data['pelatihan'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 4========================
      $query_pelatihan_kurang = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "4"');

      foreach ($query_pelatihan_kurang as $key => $value) {
          array_push($data['pelatihan'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 5========================
      $query_pelatihan_kurang = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "5"');

      foreach ($query_pelatihan_kurang as $key => $value) {
          array_push($data['pelatihan'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 6========================
      $query_pelatihan_kurang = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "6"');

      foreach ($query_pelatihan_kurang as $key => $value) {
          array_push($data['pelatihan'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== Kerjasama Tim 7========================
      $query_pelatihan_kurang = DB::select('SELECT pelatihan,
      COUNT(pelatihan) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where pelatihan = "7"');

      foreach ($query_pelatihan_kurang as $key => $value) {
          array_push($data['pelatihan'], ['ke7' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== berkendara 1========================
      $query_berkendara_sangat_besar = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "1"');

      foreach ($query_berkendara_sangat_besar as $key => $value) {
          array_push($data['berkendara'], ['ke1' => (int)$value->jumlah]);
      }

      // ======================== berkendara 2========================
      $query_berkendara_besar = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "2"');

      foreach ($query_berkendara_besar as $key => $value) {
          array_push($data['berkendara'], ['ke2' => (int)$value->jumlah]);
      }

      // ======================== berkendara 3========================
      $query_berkendara_cukup_besar = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "3"');

      foreach ($query_berkendara_cukup_besar as $key => $value) {
          array_push($data['berkendara'], ['ke3' => (int)$value->jumlah]);
      }

      // ======================== berkendara 4========================
      $query_berkendara_kurang = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "4"');

      foreach ($query_berkendara_kurang as $key => $value) {
          array_push($data['berkendara'], ['ke4' => (int)$value->jumlah]);
      }

      // ======================== berkendara 5========================
      $query_berkendara_kurang = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "5"');

      foreach ($query_berkendara_kurang as $key => $value) {
          array_push($data['berkendara'], ['ke5' => (int)$value->jumlah]);
      }

      // ======================== berkendara 6========================
      $query_berkendara_kurang = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "6"');

      foreach ($query_berkendara_kurang as $key => $value) {
          array_push($data['berkendara'], ['ke6' => (int)$value->jumlah]);
      }

      // ======================== berkendara 7========================
      $query_berkendara_kurang = DB::select('SELECT berkendara,
      COUNT(berkendara) AS jumlah  FROM kriteria
      JOIN tb_perusahaan ON kriteria.id_perusahaan = tb_perusahaan.id_perusahaan
        where berkendara = "7"');

      foreach ($query_berkendara_kurang as $key => $value) {
          array_push($data['berkendara'], ['ke7' => (int)$value->jumlah]);
      }

    return $data;
  }

  public function show_data(){
    
    //SELECT kriteria.id_perusahaan, tb_perusahaan.nama_perusahaan, krit_ipk, bahasa_asing, komputer, penghargaan, pengalaman, pelatihan, berkendara, kriteria.created_at FROM kriteria INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=kriteria.id_perusahaan
    
    try {
      $result = [];
      $count = 1;
      $query = DB::select('SELECT kriteria.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, krit_ipk, bahasa_asing, komputer, penghargaan, pengalaman, pelatihan, berkendara, kriteria.created_at FROM kriteria INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=kriteria.id_perusahaan');

      foreach ($query as $user) {
          $data = [];
          $data[] = $count++;
          $data[] = strtoupper($user->nama_perusahaan . '</br>[ ' . $user->nama . ' ]' );
          $data[] = ($user->krit_ipk);
          $data[] = ($user->bahasa_asing);
          $data[] = ($user->komputer);
          $data[] = $user->penghargaan;
          $data[] = $user->pengalaman;
          $data[] = $user->pelatihan;
          $data[] = $user->berkendara;
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
    
    $query = DB::select('SELECT kriteria.id_perusahaan, tb_perusahaan.nama_perusahaan, tb_perusahaan.nama, krit_ipk, bahasa_asing, komputer, penghargaan, pengalaman, pelatihan, berkendara, kriteria.created_at FROM kriteria INNER JOIN tb_perusahaan ON tb_perusahaan.id_perusahaan=kriteria.id_perusahaan');

    // dd($query);

    $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KRITERIA LULUSAN UNISMA');

    $sheet->setCellValue('A3', 'NO');
    $sheet->setCellValue('B3', 'Perusahaan');
    $sheet->setCellValue('C3', 'IPK');
    $sheet->setCellValue('D3', 'Kemampuan Bahasa asing');
    $sheet->setCellValue('E3', 'Kemampuan menggoperasikan computer');
    $sheet->setCellValue('F3', 'Jumlah penghargaan yang diterima');
    $sheet->setCellValue('G3', 'Lama pengalaman kerja');
    $sheet->setCellValue('H3', 'Jumlah pelatihan yang pernah diikuti');
    $sheet->setCellValue('I3', 'Kemampuan mengendarai');

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

    foreach ($query as $key => $value) {
      $sheet->setCellValue('A'.$i, $no++);
      $sheet->setCellValue('B'.$i, $value->nama_perusahaan . ' [ ' .$value->nama . ' ]');
      $sheet->setCellValue('C'.$i, $value->krit_ipk);
      $sheet->setCellValue('D'.$i, $value->bahasa_asing);
      $sheet->setCellValue('E'.$i, $value->komputer);
      $sheet->setCellValue('F'.$i, $value->penghargaan);
      $sheet->setCellValue('G'.$i, $value->pengalaman);
      $sheet->setCellValue('H'.$i, $value->pelatihan);
      $sheet->setCellValue('I'.$i, $value->berkendara);
      $i++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $date = date('d-F-Y');
    $file_name = 'Laporan Kriteria Lulusan UNISMA - '. $date.'.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$file_name.'"');
    $writer->save("php://output");
  }
}
