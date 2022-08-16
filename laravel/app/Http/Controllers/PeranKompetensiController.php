<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PeranKompetensiController extends Controller{
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
    return view('peran_kompetensi.index', compact('auth_user', 'show_tahun','tahun_terakhir'));
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

      $data['multidisiplin'] = [];
      $data['isu_terkini'] = [];
      $data['keterampilan_internet'] = [];
      $data['keterampilan_komputer'] = [];
      $data['berfikir_kritis'] = [];
      $data['keterampilan_riset'] = [];
      $data['kemampuan_belajar'] = [];
      $data['kemampuan_komunikasi'] = [];      
      $data['di_bawah_tekanan'] = [];
      $data['manajemen_waktu'] = [];
      $data['bekerja_mandiri'] = [];
      $data['bekerja_tim'] = [];
      $data['pemecahan_masalah'] = [];
      $data['negosiasi'] = [];
      $data['analisis'] = [];
      $data['toleransi'] = [];
      $data['adaptasi'] = [];
      $data['loyalitas'] = [];
      $data['integritas'] = [];
      $data['beda_budaya'] = [];
      $data['kepemimpinan'] = [];
      $data['tanggungjawab'] = [];
      $data['inisiatif'] = [];
      $data['manajemen_proyek'] = [];
      $data['presentasi'] = [];
      $data['menulis_laporan'] = [];
      $data['belajar_sepanjang_hayat'] = [];
      $data['berbahasa_inggris'] = [];

      // ======================== multidisiplin Sangat Besar========================
      $query_multidisiplin = DB::select('SELECT multidisiplin, 
      COUNT(multidisiplin) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
      where multidisiplin = "Sangat Besar"'.$prodi_id.'' );
      foreach ($query_multidisiplin as $key => $value) {
          array_push($data['multidisiplin'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== multidisiplin Besar========================
      $query_multidisiplin_besar = DB::select('SELECT multidisiplin,
      COUNT(multidisiplin) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where multidisiplin = "Besar"'.$prodi_id.'');
      foreach ($query_multidisiplin_besar as $key => $value) {
          array_push($data['multidisiplin'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== multidisiplin cukup_besar========================
      $query_multidisiplin_cukup_besar = DB::select('SELECT multidisiplin,
      COUNT(multidisiplin) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where multidisiplin = "Cukup"'.$prodi_id.'');
      foreach ($query_multidisiplin_cukup_besar as $key => $value) {
          array_push($data['multidisiplin'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== multidisiplin Tidak========================
      $query_multidisiplin_kurang = DB::select('SELECT multidisiplin,
      COUNT(multidisiplin) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where multidisiplin = "Tidak"'.$prodi_id.'');
      foreach ($query_multidisiplin_kurang as $key => $value) {
          array_push($data['multidisiplin'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== multidisiplin Tidak sama sekali========================
      $query_multidisiplin_tidak_sama_sekali = DB::select('SELECT multidisiplin,
      COUNT(multidisiplin) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where multidisiplin = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_multidisiplin_tidak_sama_sekali as $key => $value) {
          array_push($data['multidisiplin'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      // ======================== isu_terkini Sangat Besar========================
      $query_isu_terkini_sangat_besar = DB::select('SELECT isu_terkini,
      COUNT(isu_terkini) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where isu_terkini = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_isu_terkini_sangat_besar as $key => $value) {
          array_push($data['isu_terkini'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== isu_terkini Besar========================
      $query_isu_terkini_besar = DB::select('SELECT isu_terkini,
      COUNT(isu_terkini) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where isu_terkini = "Besar"'.$prodi_id.'');
      foreach ($query_isu_terkini_besar as $key => $value) {
          array_push($data['isu_terkini'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== isu_terkini Cukup========================
      $query_isu_terkini_cukup_besar = DB::select('SELECT isu_terkini,
      COUNT(isu_terkini) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where isu_terkini = "Cukup"'.$prodi_id.'');
      foreach ($query_isu_terkini_cukup_besar as $key => $value) {
          array_push($data['isu_terkini'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== isu_terkini Tidak========================
      $query_isu_terkini_kurang = DB::select('SELECT isu_terkini,
      COUNT(isu_terkini) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where isu_terkini = "Tidak"'.$prodi_id.'');
      foreach ($query_isu_terkini_kurang as $key => $value) {
          array_push($data['isu_terkini'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== isu_terkini Tidak sama sekali========================
      $query_isu_terkini_tidak_sama_sekali = DB::select('SELECT isu_terkini,
      COUNT(isu_terkini) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where isu_terkini = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_isu_terkini_tidak_sama_sekali as $key => $value) {
          array_push($data['isu_terkini'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== keterampilan_internet dalam proyek Sangat Besar========================
      $query_keterampilan_internet_sangat_besar = DB::select('SELECT keterampilan_internet,
      COUNT(keterampilan_internet) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_internet = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_keterampilan_internet_sangat_besar as $key => $value) {
          array_push($data['keterampilan_internet'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_internet dalam proyek Besar========================
      $query_keterampilan_internet_besar = DB::select('SELECT keterampilan_internet,
      COUNT(keterampilan_internet) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_internet = "Besar"'.$prodi_id.'');
      foreach ($query_keterampilan_internet_besar as $key => $value) {
          array_push($data['keterampilan_internet'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_internet dalam proyek Cukup========================
      $query_keterampilan_internet_cukup_besar = DB::select('SELECT keterampilan_internet,
      COUNT(keterampilan_internet) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_internet = "Cukup"'.$prodi_id.'');
      foreach ($query_keterampilan_internet_cukup_besar as $key => $value) {
          array_push($data['keterampilan_internet'], ['Cukup' => (int)$value->jumlah]);
      }

        // ======================== keterampilan_internet dalam proyek Tidak========================
      $query_keterampilan_internet_kurang = DB::select('SELECT keterampilan_internet,
      COUNT(keterampilan_internet) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_internet = "Tidak"'.$prodi_id.'');
      foreach ($query_keterampilan_internet_kurang as $key => $value) {
        array_push($data['keterampilan_internet'], ['Tidak' => (int)$value->jumlah]);
      }

        // ======================== keterampilan_internet dalam proyek Tidak sama sekali========================
      $query_keterampilan_internet_tidak_sama_sekali = DB::select('SELECT keterampilan_internet,
      COUNT(keterampilan_internet) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_internet = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_keterampilan_internet_tidak_sama_sekali as $key => $value) {
          array_push($data['keterampilan_internet'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

  

      // ======================== berfikir_kritis Sangat Besar========================
      $query_berfikir_kritis_sangat_besar = DB::select('SELECT berfikir_kritis,
      COUNT(berfikir_kritis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berfikir_kritis = "Sangat Besar"'.$prodi_id.'');
      foreach ($query_berfikir_kritis_sangat_besar as $key => $value) {
          array_push($data['berfikir_kritis'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== berfikir_kritis Besar========================
      $query_berfikir_kritis_besar = DB::select('SELECT berfikir_kritis,
      COUNT(berfikir_kritis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berfikir_kritis = "Besar"'.$prodi_id.'');
      foreach ($query_berfikir_kritis_besar as $key => $value) {
          array_push($data['berfikir_kritis'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== berfikir_kritis Cukup========================
      $query_berfikir_kritis_cukup_besar = DB::select('SELECT berfikir_kritis,
      COUNT(berfikir_kritis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berfikir_kritis = "Cukup"'.$prodi_id.'');
      foreach ($query_berfikir_kritis_cukup_besar as $key => $value) {
          array_push($data['berfikir_kritis'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== berfikir_kritis Tidak========================
      $query_berfikir_kritis_kurang = DB::select('SELECT berfikir_kritis,
      COUNT(berfikir_kritis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berfikir_kritis = "Tidak"'.$prodi_id.'');
      foreach ($query_berfikir_kritis_kurang as $key => $value) {
          array_push($data['berfikir_kritis'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== berfikir_kritis Tidak sama sekali========================
      $query_berfikir_kritis_tidak_sama_sekali = DB::select('SELECT berfikir_kritis,
      COUNT(berfikir_kritis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berfikir_kritis = "Tidak sama sekali"'.$prodi_id.'');
      foreach ($query_berfikir_kritis_tidak_sama_sekali as $key => $value) {
          array_push($data['berfikir_kritis'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

          //--------------------------------------------------------------------------

      // ======================== keterampilan_komputer Sangat Besar========================
      $query_keterampilan_komputer_sangat_besar = DB::select('SELECT keterampilan_komputer,
      COUNT(keterampilan_komputer) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_komputer = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_keterampilan_komputer_sangat_besar as $key => $value) {
          array_push($data['keterampilan_komputer'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_komputer Besar========================
      $query_keterampilan_komputer_besar = DB::select('SELECT keterampilan_komputer,
      COUNT(keterampilan_komputer) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_komputer = "Besar"'.$prodi_id.'');

      foreach ($query_keterampilan_komputer_besar as $key => $value) {
          array_push($data['keterampilan_komputer'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_komputer Cukup========================
      $query_keterampilan_komputer_cukup_besar = DB::select('SELECT keterampilan_komputer,
      COUNT(keterampilan_komputer) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_komputer = "Cukup"'.$prodi_id.'');

      foreach ($query_keterampilan_komputer_cukup_besar as $key => $value) {
          array_push($data['keterampilan_komputer'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_komputer Tidak========================
      $query_keterampilan_komputer_kurang = DB::select('SELECT keterampilan_komputer,
      COUNT(keterampilan_komputer) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_komputer = "Tidak"'.$prodi_id.'');

      foreach ($query_keterampilan_komputer_kurang as $key => $value) {
          array_push($data['keterampilan_komputer'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== keterampilan_komputer Tidak sama sekali========================
      $query_keterampilan_komputer_tidak_sama_sekali = DB::select('SELECT keterampilan_komputer,
      COUNT(keterampilan_komputer) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_komputer = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_keterampilan_komputer_tidak_sama_sekali as $key => $value) {
          array_push($data['keterampilan_komputer'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

                //--------------------------------------------------------------------------

      // ======================== keterampilan_riset Sangat Besar========================
      $query_keterampilan_riset_sangat_besar = DB::select('SELECT keterampilan_riset,
      COUNT(keterampilan_riset) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_riset = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_keterampilan_riset_sangat_besar as $key => $value) {
          array_push($data['keterampilan_riset'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Besar========================
      $query_keterampilan_riset_besar = DB::select('SELECT keterampilan_riset,
      COUNT(keterampilan_riset) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_riset = "Besar"'.$prodi_id.'');

      foreach ($query_keterampilan_riset_besar as $key => $value) {
          array_push($data['keterampilan_riset'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Cukup========================
      $query_keterampilan_riset_cukup_besar = DB::select('SELECT keterampilan_riset,
      COUNT(keterampilan_riset) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_riset = "Cukup"'.$prodi_id.'');

      foreach ($query_keterampilan_riset_cukup_besar as $key => $value) {
          array_push($data['keterampilan_riset'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak========================
      $query_keterampilan_riset_kurang = DB::select('SELECT keterampilan_riset,
      COUNT(keterampilan_riset) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_riset = "Tidak"'.$prodi_id.'');

      foreach ($query_keterampilan_riset_kurang as $key => $value) {
          array_push($data['keterampilan_riset'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== Kerja lapangan Tidak sama sekali========================
      $query_keterampilan_riset_tidak_sama_sekali = DB::select('SELECT keterampilan_riset,
      COUNT(keterampilan_riset) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where keterampilan_riset = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_keterampilan_riset_tidak_sama_sekali as $key => $value) {
          array_push($data['keterampilan_riset'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

      //--------------------------------------------------------------------------

      // ======================== kemampuan_belajar Sangat Besar========================
      $query_kemampuan_belajar_sangat_besar = DB::select('SELECT kemampuan_belajar,
      COUNT(kemampuan_belajar) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_belajar = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kemampuan_belajar_sangat_besar as $key => $value) {
          array_push($data['kemampuan_belajar'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_belajar Besar========================
      $query_kemampuan_belajar_besar = DB::select('SELECT kemampuan_belajar,
      COUNT(kemampuan_belajar) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_belajar = "Besar"'.$prodi_id.'');

      foreach ($query_kemampuan_belajar_besar as $key => $value) {
          array_push($data['kemampuan_belajar'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_belajar Cukup========================
      $query_kemampuan_belajar_cukup_besar = DB::select('SELECT kemampuan_belajar,
      COUNT(kemampuan_belajar) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_belajar = "Cukup"'.$prodi_id.'');

      foreach ($query_kemampuan_belajar_cukup_besar as $key => $value) {
          array_push($data['kemampuan_belajar'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_belajar Tidak========================
      $query_kemampuan_belajar_kurang = DB::select('SELECT kemampuan_belajar,
      COUNT(kemampuan_belajar) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_belajar = "Tidak"'.$prodi_id.'');

      foreach ($query_kemampuan_belajar_kurang as $key => $value) {
          array_push($data['kemampuan_belajar'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_belajar Tidak sama sekali========================
      $query_kemampuan_belajar_tidak_sama_sekali = DB::select('SELECT kemampuan_belajar,
      COUNT(kemampuan_belajar) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_belajar = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kemampuan_belajar_tidak_sama_sekali as $key => $value) {
          array_push($data['kemampuan_belajar'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== kemampuan_komunikasi Sangat Besar========================
      $query_kemampuan_komunikasi_sangat_besar = DB::select('SELECT kemampuan_komunikasi,
      COUNT(kemampuan_komunikasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_komunikasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kemampuan_komunikasi_sangat_besar as $key => $value) {
          array_push($data['kemampuan_komunikasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_komunikasi Besar========================
      $query_kemampuan_komunikasi_besar = DB::select('SELECT kemampuan_komunikasi,
      COUNT(kemampuan_komunikasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_komunikasi = "Besar"'.$prodi_id.'');

      foreach ($query_kemampuan_komunikasi_besar as $key => $value) {
          array_push($data['kemampuan_komunikasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_komunikasi Cukup========================
      $query_kemampuan_komunikasi_cukup_besar = DB::select('SELECT kemampuan_komunikasi,
      COUNT(kemampuan_komunikasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_komunikasi = "Cukup"'.$prodi_id.'');

      foreach ($query_kemampuan_komunikasi_cukup_besar as $key => $value) {
          array_push($data['kemampuan_komunikasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_komunikasi Tidak========================
      $query_kemampuan_komunikasi_kurang = DB::select('SELECT kemampuan_komunikasi,
      COUNT(kemampuan_komunikasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_komunikasi = "Tidak"'.$prodi_id.'');

      foreach ($query_kemampuan_komunikasi_kurang as $key => $value) {
          array_push($data['kemampuan_komunikasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kemampuan_komunikasi Tidak sama sekali========================
      $query_kemampuan_komunikasi_tidak_sama_sekali = DB::select('SELECT kemampuan_komunikasi,
      COUNT(kemampuan_komunikasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kemampuan_komunikasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kemampuan_komunikasi_tidak_sama_sekali as $key => $value) {
          array_push($data['kemampuan_komunikasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
            //--------------------------------------------------------------------------

      // ======================== di_bawah_tekanan Sangat Besar========================
      $query_di_bawah_tekanan_sangat_besar = DB::select('SELECT di_bawah_tekanan,
      COUNT(di_bawah_tekanan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where di_bawah_tekanan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_di_bawah_tekanan_sangat_besar as $key => $value) {
          array_push($data['di_bawah_tekanan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== di_bawah_tekanan Besar========================
      $query_di_bawah_tekanan_besar = DB::select('SELECT di_bawah_tekanan,
      COUNT(di_bawah_tekanan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where di_bawah_tekanan = "Besar"'.$prodi_id.'');

      foreach ($query_di_bawah_tekanan_besar as $key => $value) {
          array_push($data['di_bawah_tekanan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== di_bawah_tekanan Cukup========================
      $query_di_bawah_tekanan_cukup_besar = DB::select('SELECT di_bawah_tekanan,
      COUNT(di_bawah_tekanan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where di_bawah_tekanan = "Cukup"'.$prodi_id.'');

      foreach ($query_di_bawah_tekanan_cukup_besar as $key => $value) {
          array_push($data['di_bawah_tekanan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== di_bawah_tekanan Tidak========================
      $query_di_bawah_tekanan_kurang = DB::select('SELECT di_bawah_tekanan,
      COUNT(di_bawah_tekanan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where di_bawah_tekanan = "Tidak"'.$prodi_id.'');

      foreach ($query_di_bawah_tekanan_kurang as $key => $value) {
          array_push($data['di_bawah_tekanan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== di_bawah_tekanan Tidak sama sekali========================
      $query_di_bawah_tekanan_tidak_sama_sekali = DB::select('SELECT di_bawah_tekanan,
      COUNT(di_bawah_tekanan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where di_bawah_tekanan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_di_bawah_tekanan_tidak_sama_sekali as $key => $value) {
          array_push($data['di_bawah_tekanan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== manajemen_waktu Sangat Besar========================
      $query_manajemen_waktu_sangat_besar = DB::select('SELECT manajemen_waktu,
      COUNT(manajemen_waktu) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_waktu = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_manajemen_waktu_sangat_besar as $key => $value) {
          array_push($data['manajemen_waktu'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== manajemen_waktu Besar========================
      $query_manajemen_waktu_besar = DB::select('SELECT manajemen_waktu,
      COUNT(manajemen_waktu) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_waktu = "Besar"'.$prodi_id.'');

      foreach ($query_manajemen_waktu_besar as $key => $value) {
          array_push($data['manajemen_waktu'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== manajemen_waktu Cukup========================
      $query_manajemen_waktu_cukup_besar = DB::select('SELECT manajemen_waktu,
      COUNT(manajemen_waktu) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_waktu = "Cukup"'.$prodi_id.'');

      foreach ($query_manajemen_waktu_cukup_besar as $key => $value) {
          array_push($data['manajemen_waktu'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== manajemen_waktu Tidak========================
      $query_manajemen_waktu_kurang = DB::select('SELECT manajemen_waktu,
      COUNT(manajemen_waktu) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_waktu = "Tidak"'.$prodi_id.'');

      foreach ($query_manajemen_waktu_kurang as $key => $value) {
          array_push($data['manajemen_waktu'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== manajemen_waktu Tidak sama sekali========================
      $query_manajemen_waktu_tidak_sama_sekali = DB::select('SELECT manajemen_waktu,
      COUNT(manajemen_waktu) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_waktu = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_manajemen_waktu_tidak_sama_sekali as $key => $value) {
          array_push($data['manajemen_waktu'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== bekerja_mandiri Sangat Besar========================
      $query_bekerja_mandiri_sangat_besar = DB::select('SELECT bekerja_mandiri,
      COUNT(bekerja_mandiri) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_mandiri = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_bekerja_mandiri_sangat_besar as $key => $value) {
          array_push($data['bekerja_mandiri'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== bekerja_mandiri Besar========================
      $query_bekerja_mandiri_besar = DB::select('SELECT bekerja_mandiri,
      COUNT(bekerja_mandiri) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_mandiri = "Besar"'.$prodi_id.'');

      foreach ($query_bekerja_mandiri_besar as $key => $value) {
          array_push($data['bekerja_mandiri'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== bekerja_mandiri Cukup========================
      $query_bekerja_mandiri_cukup_besar = DB::select('SELECT bekerja_mandiri,
      COUNT(bekerja_mandiri) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_mandiri = "Cukup"'.$prodi_id.'');

      foreach ($query_bekerja_mandiri_cukup_besar as $key => $value) {
          array_push($data['bekerja_mandiri'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== bekerja_mandiri Tidak========================
      $query_bekerja_mandiri_kurang = DB::select('SELECT bekerja_mandiri,
      COUNT(bekerja_mandiri) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_mandiri = "Tidak"'.$prodi_id.'');

      foreach ($query_bekerja_mandiri_kurang as $key => $value) {
          array_push($data['bekerja_mandiri'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== bekerja_mandiri Tidak sama sekali========================
      $query_bekerja_mandiri_tidak_sama_sekali = DB::select('SELECT bekerja_mandiri,
      COUNT(bekerja_mandiri) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_mandiri = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_bekerja_mandiri_tidak_sama_sekali as $key => $value) {
          array_push($data['bekerja_mandiri'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== bekerja_tim Sangat Besar========================
      $query_bekerja_tim_sangat_besar = DB::select('SELECT bekerja_tim,
      COUNT(bekerja_tim) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_tim = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_bekerja_tim_sangat_besar as $key => $value) {
          array_push($data['bekerja_tim'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== bekerja_tim Besar========================
      $query_bekerja_tim_besar = DB::select('SELECT bekerja_tim,
      COUNT(bekerja_tim) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_tim = "Besar"'.$prodi_id.'');

      foreach ($query_bekerja_tim_besar as $key => $value) {
          array_push($data['bekerja_tim'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== bekerja_tim Cukup========================
      $query_bekerja_tim_cukup_besar = DB::select('SELECT bekerja_tim,
      COUNT(bekerja_tim) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_tim = "Cukup"'.$prodi_id.'');

      foreach ($query_bekerja_tim_cukup_besar as $key => $value) {
          array_push($data['bekerja_tim'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== bekerja_tim Tidak========================
      $query_bekerja_tim_kurang = DB::select('SELECT bekerja_tim,
      COUNT(bekerja_tim) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_tim = "Tidak"'.$prodi_id.'');

      foreach ($query_bekerja_tim_kurang as $key => $value) {
          array_push($data['bekerja_tim'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== bekerja_tim Tidak sama sekali========================
      $query_bekerja_tim_tidak_sama_sekali = DB::select('SELECT bekerja_tim,
      COUNT(bekerja_tim) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where bekerja_tim = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_bekerja_tim_tidak_sama_sekali as $key => $value) {
          array_push($data['bekerja_tim'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== pemecahan_masalah Sangat Besar========================
      $query_pemecahan_masalah_sangat_besar = DB::select('SELECT pemecahan_masalah,
      COUNT(pemecahan_masalah) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where pemecahan_masalah = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_pemecahan_masalah_sangat_besar as $key => $value) {
          array_push($data['pemecahan_masalah'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== pemecahan_masalah Besar========================
      $query_pemecahan_masalah_besar = DB::select('SELECT pemecahan_masalah,
      COUNT(pemecahan_masalah) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where pemecahan_masalah = "Besar"'.$prodi_id.'');

      foreach ($query_pemecahan_masalah_besar as $key => $value) {
          array_push($data['pemecahan_masalah'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== pemecahan_masalah Cukup========================
      $query_pemecahan_masalah_cukup_besar = DB::select('SELECT pemecahan_masalah,
      COUNT(pemecahan_masalah) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where pemecahan_masalah = "Cukup"'.$prodi_id.'');

      foreach ($query_pemecahan_masalah_cukup_besar as $key => $value) {
          array_push($data['pemecahan_masalah'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== pemecahan_masalah Tidak========================
      $query_pemecahan_masalah_kurang = DB::select('SELECT pemecahan_masalah,
      COUNT(pemecahan_masalah) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where pemecahan_masalah = "Tidak"'.$prodi_id.'');

      foreach ($query_pemecahan_masalah_kurang as $key => $value) {
          array_push($data['pemecahan_masalah'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== pemecahan_masalah Tidak sama sekali========================
      $query_pemecahan_masalah_tidak_sama_sekali = DB::select('SELECT pemecahan_masalah,
      COUNT(pemecahan_masalah) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where pemecahan_masalah = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_pemecahan_masalah_tidak_sama_sekali as $key => $value) {
          array_push($data['pemecahan_masalah'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== negosiasi Sangat Besar========================
      $query_negosiasi_sangat_besar = DB::select('SELECT negosiasi,
      COUNT(negosiasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where negosiasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_negosiasi_sangat_besar as $key => $value) {
          array_push($data['negosiasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== negosiasi Besar========================
      $query_negosiasi_besar = DB::select('SELECT negosiasi,
      COUNT(negosiasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where negosiasi = "Besar"'.$prodi_id.'');

      foreach ($query_negosiasi_besar as $key => $value) {
          array_push($data['negosiasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== negosiasi Cukup========================
      $query_negosiasi_cukup_besar = DB::select('SELECT negosiasi,
      COUNT(negosiasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where negosiasi = "Cukup"'.$prodi_id.'');

      foreach ($query_negosiasi_cukup_besar as $key => $value) {
          array_push($data['negosiasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== negosiasi Tidak========================
      $query_negosiasi_kurang = DB::select('SELECT negosiasi,
      COUNT(negosiasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where negosiasi = "Tidak"'.$prodi_id.'');

      foreach ($query_negosiasi_kurang as $key => $value) {
          array_push($data['negosiasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== negosiasi Tidak sama sekali========================
      $query_negosiasi_tidak_sama_sekali = DB::select('SELECT negosiasi,
      COUNT(negosiasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where negosiasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_negosiasi_tidak_sama_sekali as $key => $value) {
          array_push($data['negosiasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== analisis Sangat Besar========================
      $query_analisis_sangat_besar = DB::select('SELECT analisis,
      COUNT(analisis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where analisis = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_analisis_sangat_besar as $key => $value) {
          array_push($data['analisis'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== analisis Besar========================
      $query_analisis_besar = DB::select('SELECT analisis,
      COUNT(analisis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where analisis = "Besar"'.$prodi_id.'');

      foreach ($query_analisis_besar as $key => $value) {
          array_push($data['analisis'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== analisis Cukup========================
      $query_analisis_cukup_besar = DB::select('SELECT analisis,
      COUNT(analisis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where analisis = "Cukup"'.$prodi_id.'');

      foreach ($query_analisis_cukup_besar as $key => $value) {
          array_push($data['analisis'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== analisis Tidak========================
      $query_analisis_kurang = DB::select('SELECT analisis,
      COUNT(analisis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where analisis = "Tidak"'.$prodi_id.'');

      foreach ($query_analisis_kurang as $key => $value) {
          array_push($data['analisis'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== analisis Tidak sama sekali========================
      $query_analisis_tidak_sama_sekali = DB::select('SELECT analisis,
      COUNT(analisis) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where analisis = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_analisis_tidak_sama_sekali as $key => $value) {
          array_push($data['analisis'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== toleransi Sangat Besar========================
      $query_toleransi_sangat_besar = DB::select('SELECT toleransi,
      COUNT(toleransi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where toleransi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_toleransi_sangat_besar as $key => $value) {
          array_push($data['toleransi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== toleransi Besar========================
      $query_toleransi_besar = DB::select('SELECT toleransi,
      COUNT(toleransi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where toleransi = "Besar"'.$prodi_id.'');

      foreach ($query_toleransi_besar as $key => $value) {
          array_push($data['toleransi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== toleransi Cukup========================
      $query_toleransi_cukup_besar = DB::select('SELECT toleransi,
      COUNT(toleransi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where toleransi = "Cukup"'.$prodi_id.'');

      foreach ($query_toleransi_cukup_besar as $key => $value) {
          array_push($data['toleransi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== toleransi Tidak========================
      $query_toleransi_kurang = DB::select('SELECT toleransi,
      COUNT(toleransi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where toleransi = "Tidak"'.$prodi_id.'');

      foreach ($query_toleransi_kurang as $key => $value) {
          array_push($data['toleransi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== toleransi Tidak sama sekali========================
      $query_toleransi_tidak_sama_sekali = DB::select('SELECT toleransi,
      COUNT(toleransi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where toleransi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_toleransi_tidak_sama_sekali as $key => $value) {
          array_push($data['toleransi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
            
      //--------------------------------------------------------------------------

      // ======================== adaptasi Sangat Besar========================
      $query_adaptasi_sangat_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where adaptasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_adaptasi_sangat_besar as $key => $value) {
          array_push($data['adaptasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== adaptasi Besar========================
      $query_adaptasi_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where adaptasi = "Besar"'.$prodi_id.'');

      foreach ($query_adaptasi_besar as $key => $value) {
          array_push($data['adaptasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== adaptasi Cukup========================
      $query_adaptasi_cukup_besar = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where adaptasi = "Cukup"'.$prodi_id.'');

      foreach ($query_adaptasi_cukup_besar as $key => $value) {
          array_push($data['adaptasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== adaptasi Tidak========================
      $query_adaptasi_kurang = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where adaptasi = "Tidak"'.$prodi_id.'');

      foreach ($query_adaptasi_kurang as $key => $value) {
          array_push($data['adaptasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== adaptasi Tidak sama sekali========================
      $query_adaptasi_tidak_sama_sekali = DB::select('SELECT adaptasi,
      COUNT(adaptasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where adaptasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_adaptasi_tidak_sama_sekali as $key => $value) {
          array_push($data['adaptasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== loyalitas Sangat Besar========================
      $query_loyalitas_sangat_besar = DB::select('SELECT loyalitas,
      COUNT(loyalitas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where loyalitas = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_loyalitas_sangat_besar as $key => $value) {
          array_push($data['loyalitas'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== loyalitas Besar========================
      $query_loyalitas_besar = DB::select('SELECT loyalitas,
      COUNT(loyalitas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where loyalitas = "Besar"'.$prodi_id.'');

      foreach ($query_loyalitas_besar as $key => $value) {
          array_push($data['loyalitas'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== loyalitas Cukup========================
      $query_loyalitas_cukup_besar = DB::select('SELECT loyalitas,
      COUNT(loyalitas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where loyalitas = "Cukup"'.$prodi_id.'');

      foreach ($query_loyalitas_cukup_besar as $key => $value) {
          array_push($data['loyalitas'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== loyalitas Tidak========================
      $query_loyalitas_kurang = DB::select('SELECT loyalitas,
      COUNT(loyalitas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where loyalitas = "Tidak"'.$prodi_id.'');

      foreach ($query_loyalitas_kurang as $key => $value) {
          array_push($data['loyalitas'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== loyalitas Tidak sama sekali========================
      $query_loyalitas_tidak_sama_sekali = DB::select('SELECT loyalitas,
      COUNT(loyalitas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where loyalitas = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_loyalitas_tidak_sama_sekali as $key => $value) {
          array_push($data['loyalitas'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== integritas Sangat Besar========================
      $query_integritas_sangat_besar = DB::select('SELECT integritas,
      COUNT(integritas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where integritas = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_integritas_sangat_besar as $key => $value) {
          array_push($data['integritas'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== integritas Besar========================
      $query_integritas_besar = DB::select('SELECT integritas,
      COUNT(integritas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where integritas = "Besar"'.$prodi_id.'');

      foreach ($query_integritas_besar as $key => $value) {
          array_push($data['integritas'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== integritas Cukup========================
      $query_integritas_cukup_besar = DB::select('SELECT integritas,
      COUNT(integritas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where integritas = "Cukup"'.$prodi_id.'');

      foreach ($query_integritas_cukup_besar as $key => $value) {
          array_push($data['integritas'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== integritas Tidak========================
      $query_integritas_kurang = DB::select('SELECT integritas,
      COUNT(integritas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where integritas = "Tidak"'.$prodi_id.'');

      foreach ($query_integritas_kurang as $key => $value) {
          array_push($data['integritas'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== integritas Tidak sama sekali========================
      $query_integritas_tidak_sama_sekali = DB::select('SELECT integritas,
      COUNT(integritas) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where integritas = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_integritas_tidak_sama_sekali as $key => $value) {
          array_push($data['integritas'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== beda_budaya Sangat Besar========================
      $query_beda_budaya_sangat_besar = DB::select('SELECT beda_budaya,
      COUNT(beda_budaya) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where beda_budaya = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_beda_budaya_sangat_besar as $key => $value) {
          array_push($data['beda_budaya'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== beda_budaya Besar========================
      $query_beda_budaya_besar = DB::select('SELECT beda_budaya,
      COUNT(beda_budaya) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where beda_budaya = "Besar"'.$prodi_id.'');

      foreach ($query_beda_budaya_besar as $key => $value) {
          array_push($data['beda_budaya'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== beda_budaya Cukup========================
      $query_beda_budaya_cukup_besar = DB::select('SELECT beda_budaya,
      COUNT(beda_budaya) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where beda_budaya = "Cukup"'.$prodi_id.'');

      foreach ($query_beda_budaya_cukup_besar as $key => $value) {
          array_push($data['beda_budaya'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== beda_budaya Tidak========================
      $query_beda_budaya_kurang = DB::select('SELECT beda_budaya,
      COUNT(beda_budaya) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where beda_budaya = "Tidak"'.$prodi_id.'');

      foreach ($query_beda_budaya_kurang as $key => $value) {
          array_push($data['beda_budaya'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== beda_budaya Tidak sama sekali========================
      $query_beda_budaya_tidak_sama_sekali = DB::select('SELECT beda_budaya,
      COUNT(beda_budaya) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where beda_budaya = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_beda_budaya_tidak_sama_sekali as $key => $value) {
          array_push($data['beda_budaya'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== kepemimpinan Sangat Besar========================
      $query_kepemimpinan_sangat_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kepemimpinan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_kepemimpinan_sangat_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan Besar========================
      $query_kepemimpinan_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kepemimpinan = "Besar"'.$prodi_id.'');

      foreach ($query_kepemimpinan_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan Cukup========================
      $query_kepemimpinan_cukup_besar = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kepemimpinan = "Cukup"'.$prodi_id.'');

      foreach ($query_kepemimpinan_cukup_besar as $key => $value) {
          array_push($data['kepemimpinan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan Tidak========================
      $query_kepemimpinan_kurang = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kepemimpinan = "Tidak"'.$prodi_id.'');

      foreach ($query_kepemimpinan_kurang as $key => $value) {
          array_push($data['kepemimpinan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== kepemimpinan Tidak sama sekali========================
      $query_kepemimpinan_tidak_sama_sekali = DB::select('SELECT kepemimpinan,
      COUNT(kepemimpinan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where kepemimpinan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_kepemimpinan_tidak_sama_sekali as $key => $value) {
          array_push($data['kepemimpinan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== tanggungjawab Sangat Besar========================
      $query_tanggungjawab_sangat_besar = DB::select('SELECT tanggungjawab,
      COUNT(tanggungjawab) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where tanggungjawab = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_tanggungjawab_sangat_besar as $key => $value) {
          array_push($data['tanggungjawab'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== tanggungjawab Besar========================
      $query_tanggungjawab_besar = DB::select('SELECT tanggungjawab,
      COUNT(tanggungjawab) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where tanggungjawab = "Besar"'.$prodi_id.'');

      foreach ($query_tanggungjawab_besar as $key => $value) {
          array_push($data['tanggungjawab'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== tanggungjawab Cukup========================
      $query_tanggungjawab_cukup_besar = DB::select('SELECT tanggungjawab,
      COUNT(tanggungjawab) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where tanggungjawab = "Cukup"'.$prodi_id.'');

      foreach ($query_tanggungjawab_cukup_besar as $key => $value) {
          array_push($data['tanggungjawab'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== tanggungjawab Tidak========================
      $query_tanggungjawab_kurang = DB::select('SELECT tanggungjawab,
      COUNT(tanggungjawab) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where tanggungjawab = "Tidak"'.$prodi_id.'');

      foreach ($query_tanggungjawab_kurang as $key => $value) {
          array_push($data['tanggungjawab'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== tanggungjawab Tidak sama sekali========================
      $query_tanggungjawab_tidak_sama_sekali = DB::select('SELECT tanggungjawab,
      COUNT(tanggungjawab) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where tanggungjawab = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_tanggungjawab_tidak_sama_sekali as $key => $value) {
          array_push($data['tanggungjawab'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      //--------------------------------------------------------------------------

      // ======================== inisiatif Sangat Besar========================
      $query_inisiatif_sangat_besar = DB::select('SELECT inisiatif,
      COUNT(inisiatif) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where inisiatif = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_inisiatif_sangat_besar as $key => $value) {
          array_push($data['inisiatif'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== inisiatif Besar========================
      $query_inisiatif_besar = DB::select('SELECT inisiatif,
      COUNT(inisiatif) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where inisiatif = "Besar"'.$prodi_id.'');

      foreach ($query_inisiatif_besar as $key => $value) {
          array_push($data['inisiatif'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== inisiatif Cukup========================
      $query_inisiatif_cukup_besar = DB::select('SELECT inisiatif,
      COUNT(inisiatif) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where inisiatif = "Cukup"'.$prodi_id.'');

      foreach ($query_inisiatif_cukup_besar as $key => $value) {
          array_push($data['inisiatif'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== inisiatif Tidak========================
      $query_inisiatif_kurang = DB::select('SELECT inisiatif,
      COUNT(inisiatif) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where inisiatif = "Tidak"'.$prodi_id.'');

      foreach ($query_inisiatif_kurang as $key => $value) {
          array_push($data['inisiatif'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== inisiatif Tidak sama sekali========================
      $query_inisiatif_tidak_sama_sekali = DB::select('SELECT inisiatif,
      COUNT(inisiatif) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where inisiatif = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_inisiatif_tidak_sama_sekali as $key => $value) {
          array_push($data['inisiatif'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== manajemen_proyek Sangat Besar========================
      $query_manajemen_proyek_sangat_besar = DB::select('SELECT manajemen_proyek,
      COUNT(manajemen_proyek) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_proyek = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_manajemen_proyek_sangat_besar as $key => $value) {
          array_push($data['manajemen_proyek'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== manajemen_proyek Besar========================
      $query_manajemen_proyek_besar = DB::select('SELECT manajemen_proyek,
      COUNT(manajemen_proyek) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_proyek = "Besar"'.$prodi_id.'');

      foreach ($query_manajemen_proyek_besar as $key => $value) {
          array_push($data['manajemen_proyek'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== manajemen_proyek Cukup========================
      $query_manajemen_proyek_cukup_besar = DB::select('SELECT manajemen_proyek,
      COUNT(manajemen_proyek) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_proyek = "Cukup"'.$prodi_id.'');

      foreach ($query_manajemen_proyek_cukup_besar as $key => $value) {
          array_push($data['manajemen_proyek'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== manajemen_proyek Tidak========================
      $query_manajemen_proyek_kurang = DB::select('SELECT manajemen_proyek,
      COUNT(manajemen_proyek) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_proyek = "Tidak"'.$prodi_id.'');

      foreach ($query_manajemen_proyek_kurang as $key => $value) {
          array_push($data['manajemen_proyek'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== manajemen_proyek Tidak sama sekali========================
      $query_manajemen_proyek_tidak_sama_sekali = DB::select('SELECT manajemen_proyek,
      COUNT(manajemen_proyek) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where manajemen_proyek = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_manajemen_proyek_tidak_sama_sekali as $key => $value) {
          array_push($data['manajemen_proyek'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== presentasi Sangat Besar========================
      $query_presentasi_sangat_besar = DB::select('SELECT presentasi,
      COUNT(presentasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where presentasi = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_presentasi_sangat_besar as $key => $value) {
          array_push($data['presentasi'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== presentasi Besar========================
      $query_presentasi_besar = DB::select('SELECT presentasi,
      COUNT(presentasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where presentasi = "Besar"'.$prodi_id.'');

      foreach ($query_presentasi_besar as $key => $value) {
          array_push($data['presentasi'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== presentasi Cukup========================
      $query_presentasi_cukup_besar = DB::select('SELECT presentasi,
      COUNT(presentasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where presentasi = "Cukup"'.$prodi_id.'');

      foreach ($query_presentasi_cukup_besar as $key => $value) {
          array_push($data['presentasi'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== presentasi Tidak========================
      $query_presentasi_kurang = DB::select('SELECT presentasi,
      COUNT(presentasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where presentasi = "Tidak"'.$prodi_id.'');

      foreach ($query_presentasi_kurang as $key => $value) {
          array_push($data['presentasi'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== presentasi Tidak sama sekali========================
      $query_presentasi_tidak_sama_sekali = DB::select('SELECT presentasi,
      COUNT(presentasi) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where presentasi = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_presentasi_tidak_sama_sekali as $key => $value) {
          array_push($data['presentasi'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== menulis_laporan Sangat Besar========================
      $query_menulis_laporan_sangat_besar = DB::select('SELECT menulis_laporan,
      COUNT(menulis_laporan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where menulis_laporan = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_menulis_laporan_sangat_besar as $key => $value) {
          array_push($data['menulis_laporan'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== menulis_laporan Besar========================
      $query_menulis_laporan_besar = DB::select('SELECT menulis_laporan,
      COUNT(menulis_laporan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where menulis_laporan = "Besar"'.$prodi_id.'');

      foreach ($query_menulis_laporan_besar as $key => $value) {
          array_push($data['menulis_laporan'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== menulis_laporan Cukup========================
      $query_menulis_laporan_cukup_besar = DB::select('SELECT menulis_laporan,
      COUNT(menulis_laporan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where menulis_laporan = "Cukup"'.$prodi_id.'');

      foreach ($query_menulis_laporan_cukup_besar as $key => $value) {
          array_push($data['menulis_laporan'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== menulis_laporan Tidak========================
      $query_menulis_laporan_kurang = DB::select('SELECT menulis_laporan,
      COUNT(menulis_laporan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where menulis_laporan = "Tidak"'.$prodi_id.'');

      foreach ($query_menulis_laporan_kurang as $key => $value) {
          array_push($data['menulis_laporan'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== menulis_laporan Tidak sama sekali========================
      $query_menulis_laporan_tidak_sama_sekali = DB::select('SELECT menulis_laporan,
      COUNT(menulis_laporan) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where menulis_laporan = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_menulis_laporan_tidak_sama_sekali as $key => $value) {
          array_push($data['menulis_laporan'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== belajar_sepanjang_hayat Sangat Besar========================
      $query_belajar_sepanjang_hayat_sangat_besar = DB::select('SELECT belajar_sepanjang_hayat,
      COUNT(belajar_sepanjang_hayat) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where belajar_sepanjang_hayat = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_belajar_sepanjang_hayat_sangat_besar as $key => $value) {
          array_push($data['belajar_sepanjang_hayat'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== belajar_sepanjang_hayat Besar========================
      $query_belajar_sepanjang_hayat_besar = DB::select('SELECT belajar_sepanjang_hayat,
      COUNT(belajar_sepanjang_hayat) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where belajar_sepanjang_hayat = "Besar"'.$prodi_id.'');

      foreach ($query_belajar_sepanjang_hayat_besar as $key => $value) {
          array_push($data['belajar_sepanjang_hayat'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== belajar_sepanjang_hayat Cukup========================
      $query_belajar_sepanjang_hayat_cukup_besar = DB::select('SELECT belajar_sepanjang_hayat,
      COUNT(belajar_sepanjang_hayat) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where belajar_sepanjang_hayat = "Cukup"'.$prodi_id.'');

      foreach ($query_belajar_sepanjang_hayat_cukup_besar as $key => $value) {
          array_push($data['belajar_sepanjang_hayat'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== belajar_sepanjang_hayat Tidak========================
      $query_belajar_sepanjang_hayat_kurang = DB::select('SELECT belajar_sepanjang_hayat,
      COUNT(belajar_sepanjang_hayat) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where belajar_sepanjang_hayat = "Tidak"'.$prodi_id.'');

      foreach ($query_belajar_sepanjang_hayat_kurang as $key => $value) {
          array_push($data['belajar_sepanjang_hayat'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== belajar_sepanjang_hayat Tidak sama sekali========================
      $query_belajar_sepanjang_hayat_tidak_sama_sekali = DB::select('SELECT belajar_sepanjang_hayat,
      COUNT(belajar_sepanjang_hayat) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where belajar_sepanjang_hayat = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_belajar_sepanjang_hayat_tidak_sama_sekali as $key => $value) {
          array_push($data['belajar_sepanjang_hayat'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }
      
      //--------------------------------------------------------------------------

      // ======================== berbahasa_inggris Sangat Besar========================
      $query_berbahasa_inggris_sangat_besar = DB::select('SELECT berbahasa_inggris,
      COUNT(berbahasa_inggris) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berbahasa_inggris = "Sangat Besar"'.$prodi_id.'');

      foreach ($query_berbahasa_inggris_sangat_besar as $key => $value) {
          array_push($data['berbahasa_inggris'], ['Sangatbesar' => (int)$value->jumlah]);
      }

      // ======================== berbahasa_inggris Besar========================
      $query_berbahasa_inggris_besar = DB::select('SELECT berbahasa_inggris,
      COUNT(berbahasa_inggris) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berbahasa_inggris = "Besar"'.$prodi_id.'');

      foreach ($query_berbahasa_inggris_besar as $key => $value) {
          array_push($data['berbahasa_inggris'], ['Besar' => (int)$value->jumlah]);
      }

      // ======================== berbahasa_inggris Cukup========================
      $query_berbahasa_inggris_cukup_besar = DB::select('SELECT berbahasa_inggris,
      COUNT(berbahasa_inggris) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berbahasa_inggris = "Cukup"'.$prodi_id.'');

      foreach ($query_berbahasa_inggris_cukup_besar as $key => $value) {
          array_push($data['berbahasa_inggris'], ['Cukup' => (int)$value->jumlah]);
      }

      // ======================== berbahasa_inggris Tidak========================
      $query_berbahasa_inggris_kurang = DB::select('SELECT berbahasa_inggris,
      COUNT(berbahasa_inggris) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berbahasa_inggris = "Tidak"'.$prodi_id.'');

      foreach ($query_berbahasa_inggris_kurang as $key => $value) {
          array_push($data['berbahasa_inggris'], ['Tidak' => (int)$value->jumlah]);
      }

      // ======================== berbahasa_inggris Tidak sama sekali========================
      $query_berbahasa_inggris_tidak_sama_sekali = DB::select('SELECT berbahasa_inggris,
      COUNT(berbahasa_inggris) AS jumlah  FROM peran_kompetensi
      JOIN tb_mahasiswa ON peran_kompetensi.npm = tb_mahasiswa.npm
        where berbahasa_inggris = "Tidak sama sekali"'.$prodi_id.'');

      foreach ($query_berbahasa_inggris_tidak_sama_sekali as $key => $value) {
          array_push($data['berbahasa_inggris'], ['Tidak_sama_sekali' => (int)$value->jumlah]);
      }

    // dd($data);
    return $data;
  }
  public function show_data(){
    try {
        $result = [];
        $count = 1;
        if(Auth::user()->role_id == 1){
            $query = DB::table('peran_kompetensi')
            ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')                
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('peran_kompetensi')
            ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('peran_kompetensi')
            ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
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
            $data[] = $user->multidisiplin;
            $data[] = $user->isu_terkini;
            $data[] = $user->keterampilan_internet;
            $data[] = $user->berfikir_kritis;
            $data[] = $user->keterampilan_komputer;
            $data[] = $user->keterampilan_riset;
            $data[] = $user->kemampuan_belajar;
            $data[] = $user->kemampuan_komunikasi;
            $data[] = $user->di_bawah_tekanan;
            $data[] = $user->manajemen_waktu;
            $data[] = $user->bekerja_mandiri;
            $data[] = $user->bekerja_tim;
            $data[] = $user->pemecahan_masalah;
            $data[] = $user->negosiasi;
            $data[] = $user->analisis;
            $data[] = $user->toleransi;
            $data[] = $user->adaptasi;
            $data[] = $user->loyalitas;
            $data[] = $user->integritas;
            $data[] = $user->beda_budaya;
            $data[] = $user->kepemimpinan;
            $data[] = $user->tanggungjawab;
            $data[] = $user->inisiatif;
            $data[] = $user->manajemen_proyek;
            $data[] = $user->presentasi;
            $data[] = $user->menulis_laporan;
            $data[] = $user->belajar_sepanjang_hayat;
            $data[] = $user->berbahasa_inggris;
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
          $query = DB::table('peran_kompetensi')
          ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->get();
      }else if(Auth::user()->role_id == 2){
          $query = DB::table('peran_kompetensi')
          ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
          ->get();
      }
      else{
          $query = DB::table('peran_kompetensi')
          ->Leftjoin('tb_mahasiswa', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')
          ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
          ->where('kode_prodi_id', Auth::user()->prodi_id)
          ->get();
      }

      // dd($query);

      $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Peran Kompetensi dalam Melaksanakan Pekerjaan');

      $sheet->setCellValue('A3', 'NO');
      $sheet->setCellValue('B3', 'NPM');
      $sheet->setCellValue('C3', 'NAMA');
      $sheet->setCellValue('D3', 'PRODI');
      $sheet->setCellValue('E3', 'TAHUN LULUS');
      $sheet->setCellValue('F3', 'Kompetensi multidisiplin di bidang program studi Anda');
      $sheet->setCellValue('G3', 'Pengetahuan isu terkini');
      $sheet->setCellValue('H3', 'Ketrampilan internet');
      $sheet->setCellValue('I3', 'Ketrampilan komputer');
      $sheet->setCellValue('J3', 'Berpikir kritis');
      $sheet->setCellValue('K3', 'Ketrampilan riset');
      $sheet->setCellValue('L3', 'Kemampuan belajar');
      $sheet->setCellValue('M3', 'Kemampuan berkomunikasi');
      $sheet->setCellValue('N3', 'Bekerja di bawah tekanan');
      $sheet->setCellValue('O3', 'Manajemen waktu');
      $sheet->setCellValue('P3', 'Bekerja secara mandiri');
      $sheet->setCellValue('Q3', 'Bekerja dalam tim/bekerjasama dengan orang lain');
      $sheet->setCellValue('R3', 'Kemampuan dalam memecahkan masalah');
      $sheet->setCellValue('S3', 'Negosiasi');
      $sheet->setCellValue('T3', 'Kemampuan analisis');
      $sheet->setCellValue('U3', 'Toleransi');
      $sheet->setCellValue('V3', 'Kemampuan adaptasi');
      $sheet->setCellValue('W3', 'Loyalitas');
      $sheet->setCellValue('X3', 'Integritas');
      $sheet->setCellValue('Y3', 'Bekerja dengan orang yang berbeda budaya maupun latar belakang');
      $sheet->setCellValue('Z3', 'Kepemimpinan');
      $sheet->setCellValue('AA3', 'Kemampuan dalam memegang tanggungjawab');
      $sheet->setCellValue('AB3', 'Inisiatif');
      $sheet->setCellValue('AC3', 'Manajemen proyek/program');
      $sheet->setCellValue('AD3', 'Kemampuan untuk memresentasikan ide/produk/laporan');
      $sheet->setCellValue('AE3', 'Kemampuan dalam menulis laporan, memo dan dokumen');
      $sheet->setCellValue('AF3', 'Kemampuan untuk terus belajar sepanjang hayat');
      $sheet->setCellValue('AG3', 'Kemampuan berbahasa Inggris');

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
      $sheet->mergeCells("V3:V4");
      $sheet->mergeCells("W3:W4");
      $sheet->mergeCells("X3:X4");
      $sheet->mergeCells("Y3:Y4");
      $sheet->mergeCells("Z3:Z4");
      $sheet->mergeCells("AA3:AA4");
      $sheet->mergeCells("AB3:AB4");
      $sheet->mergeCells("AC3:AC4");
      $sheet->mergeCells("AD3:AD4");
      $sheet->mergeCells("AE3:AE4");
      $sheet->mergeCells("AF3:AF4");
      $sheet->mergeCells("AG3:AG4");

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
      $sheet->getColumnDimension('V')->setWidth(15);
      $sheet->getColumnDimension('W')->setWidth(15);
      $sheet->getColumnDimension('X')->setWidth(15);
      $sheet->getColumnDimension('Y')->setWidth(15);
      $sheet->getColumnDimension('Z')->setWidth(15);
      $sheet->getColumnDimension('AA')->setWidth(15);
      $sheet->getColumnDimension('AB')->setWidth(15);
      $sheet->getColumnDimension('AC')->setWidth(15);
      $sheet->getColumnDimension('AD')->setWidth(15);
      $sheet->getColumnDimension('AE')->setWidth(15);
      $sheet->getColumnDimension('AF')->setWidth(15);
      $sheet->getColumnDimension('AG')->setWidth(15);

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
          $sheet->setCellValue('F'.$i, $value->multidisiplin);
          $sheet->setCellValue('G'.$i, $value->isu_terkini);
          $sheet->setCellValue('H'.$i, $value->keterampilan_internet);
          $sheet->setCellValue('I'.$i, $value->berfikir_kritis);
          $sheet->setCellValue('J'.$i, $value->keterampilan_komputer);
          $sheet->setCellValue('K'.$i, $value->keterampilan_riset);
          $sheet->setCellValue('L'.$i, $value->kemampuan_belajar);
          $sheet->setCellValue('M'.$i, $value->kemampuan_komunikasi);
          $sheet->setCellValue('N'.$i, $value->di_bawah_tekanan);
          $sheet->setCellValue('O'.$i, $value->manajemen_waktu);
          $sheet->setCellValue('P'.$i, $value->bekerja_mandiri);
          $sheet->setCellValue('Q'.$i, $value->bekerja_tim);
          $sheet->setCellValue('R'.$i, $value->pemecahan_masalah);
          $sheet->setCellValue('S'.$i, $value->negosiasi);
          $sheet->setCellValue('T'.$i, $value->analisis);
          $sheet->setCellValue('U'.$i, $value->toleransi);
          $sheet->setCellValue('V'.$i, $value->adaptasi);
          $sheet->setCellValue('W'.$i, $value->loyalitas);
          $sheet->setCellValue('X'.$i, $value->integritas);
          $sheet->setCellValue('Y'.$i, $value->beda_budaya);
          $sheet->setCellValue('Z'.$i, $value->kepemimpinan);
          $sheet->setCellValue('AA'.$i, $value->tanggungjawab);
          $sheet->setCellValue('AB'.$i, $value->inisiatif);
          $sheet->setCellValue('AC'.$i, $value->manajemen_proyek);
          $sheet->setCellValue('AD'.$i, $value->presentasi);
          $sheet->setCellValue('AE'.$i, $value->menulis_laporan);
          $sheet->setCellValue('AF'.$i, $value->belajar_sepanjang_hayat);
          $sheet->setCellValue('AG'.$i, $value->berbahasa_inggris);

          $i++;
          
      }

      $writer = new Xlsx($spreadsheet);
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
      $date = date('d-F-Y');
      $file_name = 'Laporan Peran Kompetensi dalam Melaksanakan Pekerjaan - '. $date.'.xlsx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'.$file_name.'"');
      $writer->save("php://output");
  }
}
