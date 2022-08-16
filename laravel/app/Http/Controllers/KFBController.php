<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KFBController extends Controller{
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
    return view('kondisi_fasilitas_belajar.index', compact('auth_user', 'show_tahun','tahun_terakhir'));
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

      $data['perpustakaan'] = [];
      $data['tik'] = [];
      $data['modul'] = [];
      $data['ruang_kuliah'] = [];
      $data['ruang_belajar'] = [];
      $data['lab'] = [];
      $data['variasi'] = [];
      $data['akomodasi'] = [];      
      $data['kantin'] = [];
      $data['kegiatan_mahasiswa'] = [];
      $data['layanan_kesehatan'] = [];
      $data['biaya_hidup'] = [];
      $data['parkir'] = [];
      $data['transport'] = [];
      $data['toilet'] = [];
      $data['ibadah'] = [];

      // ======================== perpustakaan Sangat Besar========================
      $query_perpustakaan = DB::select('SELECT perpustakaan, 
      COUNT(perpustakaan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
      where perpustakaan = "Sangat Besar"'.$prodi_id.'' );
      foreach ($query_perpustakaan as $key => $value) {
          array_push($data['perpustakaan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== perpustakaan Besar========================
      $query_perpustakaan_besar = DB::select('SELECT perpustakaan,
      COUNT(perpustakaan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where perpustakaan = "Besar"'.$prodi_id.'');
      foreach ($query_perpustakaan_besar as $key => $value) {
          array_push($data['perpustakaan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== perpustakaan cukup_besar========================
      $query_perpustakaan_cukup_besar = DB::select('SELECT perpustakaan,
      COUNT(perpustakaan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where perpustakaan = "Cukup"'.$prodi_id.'');
      foreach ($query_perpustakaan_cukup_besar as $key => $value) {
          array_push($data['perpustakaan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== perpustakaan Tidak========================
      $query_perpustakaan_kurang = DB::select('SELECT perpustakaan,
      COUNT(perpustakaan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where perpustakaan = "Tidak"'.$prodi_id.'');
      foreach ($query_perpustakaan_kurang as $key => $value) {
          array_push($data['perpustakaan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== perpustakaan Tidak sama sekali========================
      $query_perpustakaan_tidak_sama_sekali = DB::select('SELECT perpustakaan,
      COUNT(perpustakaan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where perpustakaan = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_perpustakaan_tidak_sama_sekali as $key => $value) {
          array_push($data['perpustakaan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      // ======================== tik Sangat Besar========================
      $query_tik_sangat_besar = DB::select('SELECT tik,
      COUNT(tik) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where tik = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_tik_sangat_besar as $key => $value) {
          array_push($data['tik'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== tik Besar========================
      $query_tik_besar = DB::select('SELECT tik,
      COUNT(tik) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where tik = "Besar"'.$prodi_id.'');
      foreach ($query_tik_besar as $key => $value) {
          array_push($data['tik'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== tik Cukup========================
      $query_tik_cukup_besar = DB::select('SELECT tik,
      COUNT(tik) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where tik = "Cukup"'.$prodi_id.'');
      foreach ($query_tik_cukup_besar as $key => $value) {
          array_push($data['tik'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== tik Tidak========================
      $query_tik_kurang = DB::select('SELECT tik,
      COUNT(tik) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where tik = "Tidak"'.$prodi_id.'');
      foreach ($query_tik_kurang as $key => $value) {
          array_push($data['tik'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== tik Tidak sama sekali========================
      $query_tik_tidak_sama_sekali = DB::select('SELECT tik,
      COUNT(tik) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where tik = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_tik_tidak_sama_sekali as $key => $value) {
          array_push($data['tik'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== modul dalam proyek Sangat Besar========================
      $query_modul_sangat_besar = DB::select('SELECT modul,
      COUNT(modul) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where modul = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_modul_sangat_besar as $key => $value) {
          array_push($data['modul'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== modul dalam proyek Besar========================
      $query_modul_besar = DB::select('SELECT modul,
      COUNT(modul) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where modul = "Besar"'.$prodi_id.'');
      foreach ($query_modul_besar as $key => $value) {
          array_push($data['modul'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== modul dalam proyek Cukup========================
      $query_modul_cukup_besar = DB::select('SELECT modul,
      COUNT(modul) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where modul = "Cukup"'.$prodi_id.'');
      foreach ($query_modul_cukup_besar as $key => $value) {
          array_push($data['modul'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== modul dalam proyek Tidak========================
      $query_modul_kurang = DB::select('SELECT modul,
      COUNT(modul) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where modul = "Tidak"'.$prodi_id.'');
      foreach ($query_modul_kurang as $key => $value) {
        array_push($data['modul'], ['Tidak' => (int)$value->jumlah]);
      }

        // ======================== modul dalam proyek Tidak sama sekali========================
      $query_modul_tidak_sama_sekali = DB::select('SELECT modul,
      COUNT(modul) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where modul = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_modul_tidak_sama_sekali as $key => $value) {
          array_push($data['modul'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

  

      // ======================== ruang_belajar Sangat Besar========================
      $query_ruang_belajar_sangat_besar = DB::select('SELECT ruang_belajar,
      COUNT(ruang_belajar) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_belajar = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_ruang_belajar_sangat_besar as $key => $value) {
          array_push($data['ruang_belajar'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== ruang_belajar Besar========================
      $query_ruang_belajar_besar = DB::select('SELECT ruang_belajar,
      COUNT(ruang_belajar) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_belajar = "Besar"'.$prodi_id.'');
      foreach ($query_ruang_belajar_besar as $key => $value) {
          array_push($data['ruang_belajar'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== ruang_belajar Cukup========================
      $query_ruang_belajar_cukup_besar = DB::select('SELECT ruang_belajar,
      COUNT(ruang_belajar) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_belajar = "Cukup"'.$prodi_id.'');
      foreach ($query_ruang_belajar_cukup_besar as $key => $value) {
          array_push($data['ruang_belajar'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== ruang_belajar Tidak========================
      $query_ruang_belajar_kurang = DB::select('SELECT ruang_belajar,
      COUNT(ruang_belajar) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_belajar = "Tidak"'.$prodi_id.'');
      foreach ($query_ruang_belajar_kurang as $key => $value) {
          array_push($data['ruang_belajar'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== ruang_belajar Tidak sama sekali========================
      $query_ruang_belajar_tidak_sama_sekali = DB::select('SELECT ruang_belajar,
      COUNT(ruang_belajar) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_belajar = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_ruang_belajar_tidak_sama_sekali as $key => $value) {
          array_push($data['ruang_belajar'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

          //--------------------------------------------------------------------------

      // ======================== ruang_kuliah Sangat Besar========================
      $query_ruang_kuliah_sangat_besar = DB::select('SELECT ruang_kuliah,
      COUNT(ruang_kuliah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_kuliah = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_ruang_kuliah_sangat_besar as $key => $value) {
          array_push($data['ruang_kuliah'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== ruang_kuliah Besar========================
      $query_ruang_kuliah_besar = DB::select('SELECT ruang_kuliah,
      COUNT(ruang_kuliah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_kuliah = "Besar"'.$prodi_id.'');

      foreach ($query_ruang_kuliah_besar as $key => $value) {
          array_push($data['ruang_kuliah'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== ruang_kuliah Cukup========================
      $query_ruang_kuliah_cukup_besar = DB::select('SELECT ruang_kuliah,
      COUNT(ruang_kuliah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_kuliah = "Cukup"'.$prodi_id.'');

      foreach ($query_ruang_kuliah_cukup_besar as $key => $value) {
          array_push($data['ruang_kuliah'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== ruang_kuliah Tidak========================
      $query_ruang_kuliah_kurang = DB::select('SELECT ruang_kuliah,
      COUNT(ruang_kuliah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_kuliah = "Tidak"'.$prodi_id.'');

      foreach ($query_ruang_kuliah_kurang as $key => $value) {
          array_push($data['ruang_kuliah'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== ruang_kuliah Tidak sama sekali========================
      $query_ruang_kuliah_tidak_sama_sekali = DB::select('SELECT ruang_kuliah,
      COUNT(ruang_kuliah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ruang_kuliah = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_ruang_kuliah_tidak_sama_sekali as $key => $value) {
          array_push($data['ruang_kuliah'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                //--------------------------------------------------------------------------

      // ======================== lab Sangat Besar========================
      $query_lab_sangat_besar = DB::select('SELECT lab,
      COUNT(lab) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where lab = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_lab_sangat_besar as $key => $value) {
          array_push($data['lab'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Besar========================
      $query_lab_besar = DB::select('SELECT lab,
      COUNT(lab) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where lab = "Besar"'.$prodi_id.'');

      foreach ($query_lab_besar as $key => $value) {
          array_push($data['lab'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Cukup========================
      $query_lab_cukup_besar = DB::select('SELECT lab,
      COUNT(lab) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where lab = "Cukup"'.$prodi_id.'');

      foreach ($query_lab_cukup_besar as $key => $value) {
          array_push($data['lab'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak========================
      $query_lab_kurang = DB::select('SELECT lab,
      COUNT(lab) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where lab = "Tidak"'.$prodi_id.'');

      foreach ($query_lab_kurang as $key => $value) {
          array_push($data['lab'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak sama sekali========================
      $query_lab_tidak_sama_sekali = DB::select('SELECT lab,
      COUNT(lab) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where lab = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_lab_tidak_sama_sekali as $key => $value) {
          array_push($data['lab'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== variasi Sangat Besar========================
      $query_variasi_sangat_besar = DB::select('SELECT variasi,
      COUNT(variasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where variasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_variasi_sangat_besar as $key => $value) {
          array_push($data['variasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== variasi Besar========================
      $query_variasi_besar = DB::select('SELECT variasi,
      COUNT(variasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where variasi = "Besar"'.$prodi_id.'');

      foreach ($query_variasi_besar as $key => $value) {
          array_push($data['variasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== variasi Cukup========================
      $query_variasi_cukup_besar = DB::select('SELECT variasi,
      COUNT(variasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where variasi = "Cukup"'.$prodi_id.'');

      foreach ($query_variasi_cukup_besar as $key => $value) {
          array_push($data['variasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== variasi Tidak========================
      $query_variasi_kurang = DB::select('SELECT variasi,
      COUNT(variasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where variasi = "Tidak"'.$prodi_id.'');

      foreach ($query_variasi_kurang as $key => $value) {
          array_push($data['variasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== variasi Tidak sama sekali========================
      $query_variasi_tidak_sama_sekali = DB::select('SELECT variasi,
      COUNT(variasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where variasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_variasi_tidak_sama_sekali as $key => $value) {
          array_push($data['variasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== akomodasi Sangat Besar========================
      $query_akomodasi_sangat_besar = DB::select('SELECT akomodasi,
      COUNT(akomodasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where akomodasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_akomodasi_sangat_besar as $key => $value) {
          array_push($data['akomodasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== akomodasi Besar========================
      $query_akomodasi_besar = DB::select('SELECT akomodasi,
      COUNT(akomodasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where akomodasi = "Besar"'.$prodi_id.'');

      foreach ($query_akomodasi_besar as $key => $value) {
          array_push($data['akomodasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== akomodasi Cukup========================
      $query_akomodasi_cukup_besar = DB::select('SELECT akomodasi,
      COUNT(akomodasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where akomodasi = "Cukup"'.$prodi_id.'');

      foreach ($query_akomodasi_cukup_besar as $key => $value) {
          array_push($data['akomodasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== akomodasi Tidak========================
      $query_akomodasi_kurang = DB::select('SELECT akomodasi,
      COUNT(akomodasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where akomodasi = "Tidak"'.$prodi_id.'');

      foreach ($query_akomodasi_kurang as $key => $value) {
          array_push($data['akomodasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== akomodasi Tidak sama sekali========================
      $query_akomodasi_tidak_sama_sekali = DB::select('SELECT akomodasi,
      COUNT(akomodasi) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where akomodasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_akomodasi_tidak_sama_sekali as $key => $value) {
          array_push($data['akomodasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
            //--------------------------------------------------------------------------

      // ======================== kantin Sangat Besar========================
      $query_kantin_sangat_besar = DB::select('SELECT kantin,
      COUNT(kantin) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kantin = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kantin_sangat_besar as $key => $value) {
          array_push($data['kantin'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kantin Besar========================
      $query_kantin_besar = DB::select('SELECT kantin,
      COUNT(kantin) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kantin = "Besar"'.$prodi_id.'');

      foreach ($query_kantin_besar as $key => $value) {
          array_push($data['kantin'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kantin Cukup========================
      $query_kantin_cukup_besar = DB::select('SELECT kantin,
      COUNT(kantin) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kantin = "Cukup"'.$prodi_id.'');

      foreach ($query_kantin_cukup_besar as $key => $value) {
          array_push($data['kantin'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kantin Tidak========================
      $query_kantin_kurang = DB::select('SELECT kantin,
      COUNT(kantin) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kantin = "Tidak"'.$prodi_id.'');

      foreach ($query_kantin_kurang as $key => $value) {
          array_push($data['kantin'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kantin Tidak sama sekali========================
      $query_kantin_tidak_sama_sekali = DB::select('SELECT kantin,
      COUNT(kantin) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kantin = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kantin_tidak_sama_sekali as $key => $value) {
          array_push($data['kantin'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== kegiatan_mahasiswa Sangat Besar========================
      $query_kegiatan_mahasiswa_sangat_besar = DB::select('SELECT kegiatan_mahasiswa,
      COUNT(kegiatan_mahasiswa) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kegiatan_mahasiswa = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kegiatan_mahasiswa_sangat_besar as $key => $value) {
          array_push($data['kegiatan_mahasiswa'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kegiatan_mahasiswa Besar========================
      $query_kegiatan_mahasiswa_besar = DB::select('SELECT kegiatan_mahasiswa,
      COUNT(kegiatan_mahasiswa) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kegiatan_mahasiswa = "Besar"'.$prodi_id.'');

      foreach ($query_kegiatan_mahasiswa_besar as $key => $value) {
          array_push($data['kegiatan_mahasiswa'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kegiatan_mahasiswa Cukup========================
      $query_kegiatan_mahasiswa_cukup_besar = DB::select('SELECT kegiatan_mahasiswa,
      COUNT(kegiatan_mahasiswa) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kegiatan_mahasiswa = "Cukup"'.$prodi_id.'');

      foreach ($query_kegiatan_mahasiswa_cukup_besar as $key => $value) {
          array_push($data['kegiatan_mahasiswa'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kegiatan_mahasiswa Tidak========================
      $query_kegiatan_mahasiswa_kurang = DB::select('SELECT kegiatan_mahasiswa,
      COUNT(kegiatan_mahasiswa) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kegiatan_mahasiswa = "Tidak"'.$prodi_id.'');

      foreach ($query_kegiatan_mahasiswa_kurang as $key => $value) {
          array_push($data['kegiatan_mahasiswa'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kegiatan_mahasiswa Tidak sama sekali========================
      $query_kegiatan_mahasiswa_tidak_sama_sekali = DB::select('SELECT kegiatan_mahasiswa,
      COUNT(kegiatan_mahasiswa) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where kegiatan_mahasiswa = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kegiatan_mahasiswa_tidak_sama_sekali as $key => $value) {
          array_push($data['kegiatan_mahasiswa'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== layanan_kesehatan Sangat Besar========================
      $query_layanan_kesehatan_sangat_besar = DB::select('SELECT layanan_kesehatan,
      COUNT(layanan_kesehatan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where layanan_kesehatan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_layanan_kesehatan_sangat_besar as $key => $value) {
          array_push($data['layanan_kesehatan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== layanan_kesehatan Besar========================
      $query_layanan_kesehatan_besar = DB::select('SELECT layanan_kesehatan,
      COUNT(layanan_kesehatan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where layanan_kesehatan = "Besar"'.$prodi_id.'');

      foreach ($query_layanan_kesehatan_besar as $key => $value) {
          array_push($data['layanan_kesehatan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== layanan_kesehatan Cukup========================
      $query_layanan_kesehatan_cukup_besar = DB::select('SELECT layanan_kesehatan,
      COUNT(layanan_kesehatan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where layanan_kesehatan = "Cukup"'.$prodi_id.'');

      foreach ($query_layanan_kesehatan_cukup_besar as $key => $value) {
          array_push($data['layanan_kesehatan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== layanan_kesehatan Tidak========================
      $query_layanan_kesehatan_kurang = DB::select('SELECT layanan_kesehatan,
      COUNT(layanan_kesehatan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where layanan_kesehatan = "Tidak"'.$prodi_id.'');

      foreach ($query_layanan_kesehatan_kurang as $key => $value) {
          array_push($data['layanan_kesehatan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== layanan_kesehatan Tidak sama sekali========================
      $query_layanan_kesehatan_tidak_sama_sekali = DB::select('SELECT layanan_kesehatan,
      COUNT(layanan_kesehatan) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where layanan_kesehatan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_layanan_kesehatan_tidak_sama_sekali as $key => $value) {
          array_push($data['layanan_kesehatan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== biaya_hidup Sangat Besar========================
      $query_biaya_hidup_sangat_besar = DB::select('SELECT biaya_hidup,
      COUNT(biaya_hidup) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where biaya_hidup = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_biaya_hidup_sangat_besar as $key => $value) {
          array_push($data['biaya_hidup'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== biaya_hidup Besar========================
      $query_biaya_hidup_besar = DB::select('SELECT biaya_hidup,
      COUNT(biaya_hidup) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where biaya_hidup = "Besar"'.$prodi_id.'');

      foreach ($query_biaya_hidup_besar as $key => $value) {
          array_push($data['biaya_hidup'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== biaya_hidup Cukup========================
      $query_biaya_hidup_cukup_besar = DB::select('SELECT biaya_hidup,
      COUNT(biaya_hidup) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where biaya_hidup = "Cukup"'.$prodi_id.'');

      foreach ($query_biaya_hidup_cukup_besar as $key => $value) {
          array_push($data['biaya_hidup'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== biaya_hidup Tidak========================
      $query_biaya_hidup_kurang = DB::select('SELECT biaya_hidup,
      COUNT(biaya_hidup) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where biaya_hidup = "Tidak"'.$prodi_id.'');

      foreach ($query_biaya_hidup_kurang as $key => $value) {
          array_push($data['biaya_hidup'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== biaya_hidup Tidak sama sekali========================
      $query_biaya_hidup_tidak_sama_sekali = DB::select('SELECT biaya_hidup,
      COUNT(biaya_hidup) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where biaya_hidup = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_biaya_hidup_tidak_sama_sekali as $key => $value) {
          array_push($data['biaya_hidup'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== parkir Sangat Besar========================
      $query_parkir_sangat_besar = DB::select('SELECT parkir,
      COUNT(parkir) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where parkir = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_parkir_sangat_besar as $key => $value) {
          array_push($data['parkir'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== parkir Besar========================
      $query_parkir_besar = DB::select('SELECT parkir,
      COUNT(parkir) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where parkir = "Besar"'.$prodi_id.'');

      foreach ($query_parkir_besar as $key => $value) {
          array_push($data['parkir'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== parkir Cukup========================
      $query_parkir_cukup_besar = DB::select('SELECT parkir,
      COUNT(parkir) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where parkir = "Cukup"'.$prodi_id.'');

      foreach ($query_parkir_cukup_besar as $key => $value) {
          array_push($data['parkir'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== parkir Tidak========================
      $query_parkir_kurang = DB::select('SELECT parkir,
      COUNT(parkir) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where parkir = "Tidak"'.$prodi_id.'');

      foreach ($query_parkir_kurang as $key => $value) {
          array_push($data['parkir'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== parkir Tidak sama sekali========================
      $query_parkir_tidak_sama_sekali = DB::select('SELECT parkir,
      COUNT(parkir) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where parkir = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_parkir_tidak_sama_sekali as $key => $value) {
          array_push($data['parkir'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== transport Sangat Besar========================
      $query_transport_sangat_besar = DB::select('SELECT transport,
      COUNT(transport) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where transport = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_transport_sangat_besar as $key => $value) {
          array_push($data['transport'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== transport Besar========================
      $query_transport_besar = DB::select('SELECT transport,
      COUNT(transport) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where transport = "Besar"'.$prodi_id.'');

      foreach ($query_transport_besar as $key => $value) {
          array_push($data['transport'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== transport Cukup========================
      $query_transport_cukup_besar = DB::select('SELECT transport,
      COUNT(transport) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where transport = "Cukup"'.$prodi_id.'');

      foreach ($query_transport_cukup_besar as $key => $value) {
          array_push($data['transport'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== transport Tidak========================
      $query_transport_kurang = DB::select('SELECT transport,
      COUNT(transport) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where transport = "Tidak"'.$prodi_id.'');

      foreach ($query_transport_kurang as $key => $value) {
          array_push($data['transport'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== transport Tidak sama sekali========================
      $query_transport_tidak_sama_sekali = DB::select('SELECT transport,
      COUNT(transport) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where transport = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_transport_tidak_sama_sekali as $key => $value) {
          array_push($data['transport'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== toilet Sangat Besar========================
      $query_toilet_sangat_besar = DB::select('SELECT toilet,
      COUNT(toilet) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where toilet = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_toilet_sangat_besar as $key => $value) {
          array_push($data['toilet'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== toilet Besar========================
      $query_toilet_besar = DB::select('SELECT toilet,
      COUNT(toilet) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where toilet = "Besar"'.$prodi_id.'');

      foreach ($query_toilet_besar as $key => $value) {
          array_push($data['toilet'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== toilet Cukup========================
      $query_toilet_cukup_besar = DB::select('SELECT toilet,
      COUNT(toilet) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where toilet = "Cukup"'.$prodi_id.'');

      foreach ($query_toilet_cukup_besar as $key => $value) {
          array_push($data['toilet'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== toilet Tidak========================
      $query_toilet_kurang = DB::select('SELECT toilet,
      COUNT(toilet) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where toilet = "Tidak"'.$prodi_id.'');

      foreach ($query_toilet_kurang as $key => $value) {
          array_push($data['toilet'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== toilet Tidak sama sekali========================
      $query_toilet_tidak_sama_sekali = DB::select('SELECT toilet,
      COUNT(toilet) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where toilet = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_toilet_tidak_sama_sekali as $key => $value) {
          array_push($data['toilet'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== ibadah Sangat Besar========================
      $query_ibadah_sangat_besar = DB::select('SELECT ibadah,
      COUNT(ibadah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ibadah = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_ibadah_sangat_besar as $key => $value) {
          array_push($data['ibadah'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== ibadah Besar========================
      $query_ibadah_besar = DB::select('SELECT ibadah,
      COUNT(ibadah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ibadah = "Besar"'.$prodi_id.'');

      foreach ($query_ibadah_besar as $key => $value) {
          array_push($data['ibadah'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== ibadah Cukup========================
      $query_ibadah_cukup_besar = DB::select('SELECT ibadah,
      COUNT(ibadah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ibadah = "Cukup"'.$prodi_id.'');

      foreach ($query_ibadah_cukup_besar as $key => $value) {
          array_push($data['ibadah'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== ibadah Tidak========================
      $query_ibadah_kurang = DB::select('SELECT ibadah,
      COUNT(ibadah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ibadah = "Tidak"'.$prodi_id.'');

      foreach ($query_ibadah_kurang as $key => $value) {
          array_push($data['ibadah'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== ibadah Tidak sama sekali========================
      $query_ibadah_tidak_sama_sekali = DB::select('SELECT ibadah,
      COUNT(ibadah) AS jumlah  FROM tb_penilaian_fasilitas_belajar
      JOIN tb_mahasiswa ON tb_penilaian_fasilitas_belajar.npm = tb_mahasiswa.npm
        where ibadah = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_ibadah_tidak_sama_sekali as $key => $value) {
          array_push($data['ibadah'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }


    // dd($data);
    return $data;
  }
  public function show_data(){
    try {
        $result = [];
        $count = 1;
        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_penilaian_fasilitas_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')                
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_penilaian_fasilitas_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_penilaian_fasilitas_belajar')
            ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
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
            $data[] = $user->perpustakaan;
            $data[] = $user->tik;
            $data[] = $user->modul;
            $data[] = $user->ruang_belajar;
            $data[] = $user->ruang_kuliah;
            $data[] = $user->lab;
            $data[] = $user->variasi;
            $data[] = $user->akomodasi;
            $data[] = $user->kantin;
            $data[] = $user->kegiatan_mahasiswa;
            $data[] = $user->layanan_kesehatan;
            $data[] = $user->biaya_hidup;
            $data[] = $user->parkir;
            $data[] = $user->transport;
            $data[] = $user->toilet;
            $data[] = $user->ibadah;
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
          $query = DB::table('tb_penilaian_fasilitas_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->get();
      }else if(Auth::user()->role_id == 2){
          $query = DB::table('tb_penilaian_fasilitas_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
          ->get();
      }
      else{
          $query = DB::table('tb_penilaian_fasilitas_belajar')
          ->Leftjoin('tb_mahasiswa', 'tb_penilaian_fasilitas_belajar.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('kode_prodi_id', Auth::user()->prodi_id)
          ->get();
      }

      // dd($query);

      $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Penilaian Terhadap Kondisi Fasilitas Belajar');

      $sheet->setCellValue('A3', 'NO');
      $sheet->setCellValue('B3', 'NPM');
      $sheet->setCellValue('C3', 'NAMA');
      $sheet->setCellValue('D3', 'PRODI');
      $sheet->setCellValue('E3', 'TAHUN LULUS');
      $sheet->setCellValue('F3', 'Perpustakaan');
      $sheet->setCellValue('G3', 'TIK');
      $sheet->setCellValue('H3', 'Modul belajar');
      $sheet->setCellValue('I3', 'Ruang kuliah');
      $sheet->setCellValue('J3', 'Ruang belajar mandiri');
      $sheet->setCellValue('K3', 'Laboratorium');
      $sheet->setCellValue('L3', 'Variasi matakuliah');
      $sheet->setCellValue('M3', 'Akomodasi');
      $sheet->setCellValue('N3', 'Kantin');
      $sheet->setCellValue('O3', 'Pusat kegiatan mahasiswa');
      $sheet->setCellValue('P3', 'Fasililtas layanan kesehatan');
      $sheet->setCellValue('Q3', 'Beasiswa');
      $sheet->setCellValue('R3', 'Parkir');
      $sheet->setCellValue('S3', 'Transportasi');
      $sheet->setCellValue('T3', 'Toilet');
      $sheet->setCellValue('U3', 'Fasilitas ibadah');

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
      $sheet->mergeCells("P3:P4");
      $sheet->mergeCells("Q3:Q4");
      $sheet->mergeCells("R3:R4");
      $sheet->mergeCells("S3:S4");
      $sheet->mergeCells("T3:T4");
      $sheet->mergeCells("U3:U4");

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
      $sheet->getColumnDimension('P')->setWidth(15);
      $sheet->getColumnDimension('Q')->setWidth(15);
      $sheet->getColumnDimension('R')->setWidth(15);
      $sheet->getColumnDimension('S')->setWidth(15);
      $sheet->getColumnDimension('T')->setWidth(15);
      $sheet->getColumnDimension('U')->setWidth(15);

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
      $sheet->getStyle('A5:U50')->applyFromArray($styleArray);
      $sheet->getStyle('A3:U4')->applyFromArray($styleHeader);
      $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
      $sheet->getStyle('A3:U3')->applyFromArray($styleheader);

      foreach ($query as $key => $value) {
          $sheet->setCellValue('A'.$i, $no++);
          $sheet->setCellValue('B'.$i, $value->npm);
          $sheet->setCellValue('C'.$i, $value->nama);
          $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
          $sheet->setCellValue('E'.$i, $value->tahun_lulus);
          $sheet->setCellValue('F'.$i, $value->perpustakaan);
          $sheet->setCellValue('G'.$i, $value->tik);
          $sheet->setCellValue('H'.$i, $value->modul);
          $sheet->setCellValue('I'.$i, $value->ruang_belajar);
          $sheet->setCellValue('J'.$i, $value->ruang_kuliah);
          $sheet->setCellValue('K'.$i, $value->lab);
          $sheet->setCellValue('L'.$i, $value->variasi);
          $sheet->setCellValue('M'.$i, $value->akomodasi);
          $sheet->setCellValue('N'.$i, $value->kantin);
          $sheet->setCellValue('O'.$i, $value->kegiatan_mahasiswa);
          $sheet->setCellValue('P'.$i, $value->layanan_kesehatan);
          $sheet->setCellValue('Q'.$i, $value->biaya_hidup);
          $sheet->setCellValue('R'.$i, $value->parkir);
          $sheet->setCellValue('S'.$i, $value->transport);
          $sheet->setCellValue('T'.$i, $value->toilet);
          $sheet->setCellValue('U'.$i, $value->ibadah);

          $i++;
          
      }

      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
      $date = date('d-F-Y');
      $file_name = 'Laporan Penilaian Terhadap Kondisi Fasilitas Belajar - '. $date.'.xlsx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'.$file_name.'"');
      $writer->save("php://output");
  }
}
