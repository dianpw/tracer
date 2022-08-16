<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProfilKarakterController extends Controller
{
    public function index()
    {
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
        return view('profil_karakter.index', compact('auth_user','show_tahun', 'tahun_terakhir'));
    }
    public function graph($tahun=null){
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' and mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' and kode_prodi_id = "'.Auth::user()->prodi_id.'" and YEAR(tahun_lulus) = "'.$tahun.'"';
        }
        // dd($prodi_id);
        $data['pekerjaandenganpenuhtanggungjawab'] = [];
        $data['Mampubekerjasamadalamtim'] = [];
        $data['Bersungguh_sungguh'] = [];
        $data['Bekerjakerassesuaidengankompetensi'] = [];
        $data['Tolerandanmampumenerima'] = [];
        $data['Meletakkansegalasesuatu'] = [];
        $data['Kreatifdaninovatif'] = [];
        $data['Mampumembuatkeputusanterbaik'] = [];


         // ======================== pekerjaandenganpenuhtanggungjawab Sangat rendah========================
         $query_pekerjaandenganpenuhtanggungjawab = DB::select('SELECT pekerjaandenganpenuhtanggungjawab, kode_prodi_id,
         COUNT(pekerjaandenganpenuhtanggungjawab) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where pekerjaandenganpenuhtanggungjawab = "Sangat rendah"'.$prodi_id.'' );
        //  dd($query_pekerjaandenganpenuhtanggungjawab);


         foreach ($query_pekerjaandenganpenuhtanggungjawab as $key => $value) {
             array_push($data['pekerjaandenganpenuhtanggungjawab'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== pekerjaandenganpenuhtanggungjawab Rendah========================
         $query_pekerjaandenganpenuhtanggungjawab_besar = DB::select('SELECT pekerjaandenganpenuhtanggungjawab,
         COUNT(pekerjaandenganpenuhtanggungjawab) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where pekerjaandenganpenuhtanggungjawab = "Rendah"'.$prodi_id);

         foreach ($query_pekerjaandenganpenuhtanggungjawab_besar as $key => $value) {
             array_push($data['pekerjaandenganpenuhtanggungjawab'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== pekerjaandenganpenuhtanggungjawab cukup_besar========================
         $query_pekerjaandenganpenuhtanggungjawab_cukup_besar = DB::select('SELECT pekerjaandenganpenuhtanggungjawab,
         COUNT(pekerjaandenganpenuhtanggungjawab) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where pekerjaandenganpenuhtanggungjawab = "Cukup"'.$prodi_id);

         foreach ($query_pekerjaandenganpenuhtanggungjawab_cukup_besar as $key => $value) {
             array_push($data['pekerjaandenganpenuhtanggungjawab'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== pekerjaandenganpenuhtanggungjawab Tinggi========================
         $query_pekerjaandenganpenuhtanggungjawab_kurang = DB::select('SELECT pekerjaandenganpenuhtanggungjawab,
         COUNT(pekerjaandenganpenuhtanggungjawab) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where pekerjaandenganpenuhtanggungjawab = "Tinggi"'.$prodi_id);

         foreach ($query_pekerjaandenganpenuhtanggungjawab_kurang as $key => $value) {
             array_push($data['pekerjaandenganpenuhtanggungjawab'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== pekerjaandenganpenuhtanggungjawab Sangat Tinggi========================
         $query_pekerjaandenganpenuhtanggungjawab_tidak_sama_sekali = DB::select('SELECT pekerjaandenganpenuhtanggungjawab,
         COUNT(pekerjaandenganpenuhtanggungjawab) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where pekerjaandenganpenuhtanggungjawab = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_pekerjaandenganpenuhtanggungjawab_tidak_sama_sekali as $key => $value) {
             array_push($data['pekerjaandenganpenuhtanggungjawab'], ['sangat_tinggi' => (int)$value->jumlah]);
         }

 //---------------------------------------------------------------------------------------------------


         // ======================== Mampubekerjasamadalamtim Sangat rendah========================
         $query_Mampubekerjasamadalamtim = DB::select('SELECT Mampubekerjasamadalamtim, kode_prodi_id,
         COUNT(Mampubekerjasamadalamtim) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Mampubekerjasamadalamtim = "Sangat rendah"'.$prodi_id );


         foreach ($query_Mampubekerjasamadalamtim as $key => $value) {
             array_push($data['Mampubekerjasamadalamtim'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Mampubekerjasamadalamtim Rendah========================
         $query_Mampubekerjasamadalamtim_besar = DB::select('SELECT Mampubekerjasamadalamtim,
         COUNT(Mampubekerjasamadalamtim) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampubekerjasamadalamtim = "Rendah"'.$prodi_id);

         foreach ($query_Mampubekerjasamadalamtim_besar as $key => $value) {
             array_push($data['Mampubekerjasamadalamtim'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Mampubekerjasamadalamtim cukup_besar========================
         $query_Mampubekerjasamadalamtim_cukup_besar = DB::select('SELECT Mampubekerjasamadalamtim,
         COUNT(Mampubekerjasamadalamtim) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampubekerjasamadalamtim = "Cukup"'.$prodi_id);

         foreach ($query_Mampubekerjasamadalamtim_cukup_besar as $key => $value) {
             array_push($data['Mampubekerjasamadalamtim'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Mampubekerjasamadalamtim Tinggi========================
         $query_Mampubekerjasamadalamtim_kurang = DB::select('SELECT Mampubekerjasamadalamtim,
         COUNT(Mampubekerjasamadalamtim) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampubekerjasamadalamtim = "Tinggi"'.$prodi_id);

         foreach ($query_Mampubekerjasamadalamtim_kurang as $key => $value) {
             array_push($data['Mampubekerjasamadalamtim'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Mampubekerjasamadalamtim Sangat Tinggi========================
         $query_Mampubekerjasamadalamtim_tidak_sama_sekali = DB::select('SELECT Mampubekerjasamadalamtim,
         COUNT(Mampubekerjasamadalamtim) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampubekerjasamadalamtim = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Mampubekerjasamadalamtim_tidak_sama_sekali as $key => $value) {
             array_push($data['Mampubekerjasamadalamtim'], ['sangat_tinggi' => (int)$value->jumlah]);
         }



 //---------------------------------------------------------------------------------------------------


         // ======================== Bersungguh_sungguh Sangat rendah========================
         $query_Bersungguh_sungguh = DB::select('SELECT Bersungguh_sungguh, kode_prodi_id,
         COUNT(Bersungguh_sungguh) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Bersungguh_sungguh = "Sangat rendah"'.$prodi_id );


         foreach ($query_Bersungguh_sungguh as $key => $value) {
             array_push($data['Bersungguh_sungguh'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Bersungguh_sungguh Rendah========================
         $query_Bersungguh_sungguh_besar = DB::select('SELECT Bersungguh_sungguh,
         COUNT(Bersungguh_sungguh) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bersungguh_sungguh = "Rendah"'.$prodi_id);

         foreach ($query_Bersungguh_sungguh_besar as $key => $value) {
             array_push($data['Bersungguh_sungguh'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Bersungguh_sungguh cukup_besar========================
         $query_Bersungguh_sungguh_cukup_besar = DB::select('SELECT Bersungguh_sungguh,
         COUNT(Bersungguh_sungguh) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bersungguh_sungguh = "Cukup"'.$prodi_id);

         foreach ($query_Bersungguh_sungguh_cukup_besar as $key => $value) {
             array_push($data['Bersungguh_sungguh'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Bersungguh_sungguh Tinggi========================
         $query_Bersungguh_sungguh_kurang = DB::select('SELECT Bersungguh_sungguh,
         COUNT(Bersungguh_sungguh) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bersungguh_sungguh = "Tinggi"'.$prodi_id);

         foreach ($query_Bersungguh_sungguh_kurang as $key => $value) {
             array_push($data['Bersungguh_sungguh'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Bersungguh_sungguh Sangat Tinggi========================
         $query_Bersungguh_sungguh_tidak_sama_sekali = DB::select('SELECT Bersungguh_sungguh,
         COUNT(Bersungguh_sungguh) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bersungguh_sungguh = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Bersungguh_sungguh_tidak_sama_sekali as $key => $value) {
             array_push($data['Bersungguh_sungguh'], ['sangat_tinggi' => (int)$value->jumlah]);
         }



 //---------------------------------------------------------------------------------------------------


         // ======================== Bekerjakerassesuaidengankompetensi Sangat rendah========================
         $query_Bekerjakerassesuaidengankompetensi = DB::select('SELECT Bekerjakerassesuaidengankompetensi, kode_prodi_id,
         COUNT(Bekerjakerassesuaidengankompetensi) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Bekerjakerassesuaidengankompetensi = "Sangat rendah"'.$prodi_id );


         foreach ($query_Bekerjakerassesuaidengankompetensi as $key => $value) {
             array_push($data['Bekerjakerassesuaidengankompetensi'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Bekerjakerassesuaidengankompetensi Rendah========================
         $query_Bekerjakerassesuaidengankompetensi_besar = DB::select('SELECT Bekerjakerassesuaidengankompetensi,
         COUNT(Bekerjakerassesuaidengankompetensi) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bekerjakerassesuaidengankompetensi = "Rendah"'.$prodi_id);

         foreach ($query_Bekerjakerassesuaidengankompetensi_besar as $key => $value) {
             array_push($data['Bekerjakerassesuaidengankompetensi'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Bekerjakerassesuaidengankompetensi cukup_besar========================
         $query_Bekerjakerassesuaidengankompetensi_cukup_besar = DB::select('SELECT Bekerjakerassesuaidengankompetensi,
         COUNT(Bekerjakerassesuaidengankompetensi) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bekerjakerassesuaidengankompetensi = "Cukup"'.$prodi_id);

         foreach ($query_Bekerjakerassesuaidengankompetensi_cukup_besar as $key => $value) {
             array_push($data['Bekerjakerassesuaidengankompetensi'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Bekerjakerassesuaidengankompetensi Tinggi========================
         $query_Bekerjakerassesuaidengankompetensi_kurang = DB::select('SELECT Bekerjakerassesuaidengankompetensi,
         COUNT(Bekerjakerassesuaidengankompetensi) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bekerjakerassesuaidengankompetensi = "Tinggi"'.$prodi_id);

         foreach ($query_Bekerjakerassesuaidengankompetensi_kurang as $key => $value) {
             array_push($data['Bekerjakerassesuaidengankompetensi'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Bekerjakerassesuaidengankompetensi Sangat Tinggi========================
         $query_Bekerjakerassesuaidengankompetensi_tidak_sama_sekali = DB::select('SELECT Bekerjakerassesuaidengankompetensi,
         COUNT(Bekerjakerassesuaidengankompetensi) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Bekerjakerassesuaidengankompetensi = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Bekerjakerassesuaidengankompetensi_tidak_sama_sekali as $key => $value) {
             array_push($data['Bekerjakerassesuaidengankompetensi'], ['sangat_tinggi' => (int)$value->jumlah]);
         }


 //---------------------------------------------------------------------------------------------------


         // ======================== Tolerandanmampumenerima Sangat rendah========================
         $query_Tolerandanmampumenerima = DB::select('SELECT Tolerandanmampumenerima, kode_prodi_id,
         COUNT(Tolerandanmampumenerima) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Tolerandanmampumenerima = "Sangat rendah"'.$prodi_id );


         foreach ($query_Tolerandanmampumenerima as $key => $value) {
             array_push($data['Tolerandanmampumenerima'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Tolerandanmampumenerima Rendah========================
         $query_Tolerandanmampumenerima_besar = DB::select('SELECT Tolerandanmampumenerima,
         COUNT(Tolerandanmampumenerima) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Tolerandanmampumenerima = "Rendah"'.$prodi_id);

         foreach ($query_Tolerandanmampumenerima_besar as $key => $value) {
             array_push($data['Tolerandanmampumenerima'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Tolerandanmampumenerima cukup_besar========================
         $query_Tolerandanmampumenerima_cukup_besar = DB::select('SELECT Tolerandanmampumenerima,
         COUNT(Tolerandanmampumenerima) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Tolerandanmampumenerima = "Cukup"'.$prodi_id);

         foreach ($query_Tolerandanmampumenerima_cukup_besar as $key => $value) {
             array_push($data['Tolerandanmampumenerima'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Tolerandanmampumenerima Tinggi========================
         $query_Tolerandanmampumenerima_kurang = DB::select('SELECT Tolerandanmampumenerima,
         COUNT(Tolerandanmampumenerima) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Tolerandanmampumenerima = "Tinggi"'.$prodi_id);

         foreach ($query_Tolerandanmampumenerima_kurang as $key => $value) {
             array_push($data['Tolerandanmampumenerima'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Tolerandanmampumenerima Sangat Tinggi========================
         $query_Tolerandanmampumenerima_tidak_sama_sekali = DB::select('SELECT Tolerandanmampumenerima,
         COUNT(Tolerandanmampumenerima) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Tolerandanmampumenerima = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Tolerandanmampumenerima_tidak_sama_sekali as $key => $value) {
             array_push($data['Tolerandanmampumenerima'], ['sangat_tinggi' => (int)$value->jumlah]);
         }



 //---------------------------------------------------------------------------------------------------


         // ======================== Meletakkansegalasesuatu Sangat rendah========================
         $query_Meletakkansegalasesuatu = DB::select('SELECT Meletakkansegalasesuatu, kode_prodi_id,
         COUNT(Meletakkansegalasesuatu) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Meletakkansegalasesuatu = "Sangat rendah"'.$prodi_id );


         foreach ($query_Meletakkansegalasesuatu as $key => $value) {
             array_push($data['Meletakkansegalasesuatu'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Meletakkansegalasesuatu Rendah========================
         $query_Meletakkansegalasesuatu_besar = DB::select('SELECT Meletakkansegalasesuatu,
         COUNT(Meletakkansegalasesuatu) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Meletakkansegalasesuatu = "Rendah"'.$prodi_id);

         foreach ($query_Meletakkansegalasesuatu_besar as $key => $value) {
             array_push($data['Meletakkansegalasesuatu'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Meletakkansegalasesuatu cukup_besar========================
         $query_Meletakkansegalasesuatu_cukup_besar = DB::select('SELECT Meletakkansegalasesuatu,
         COUNT(Meletakkansegalasesuatu) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Meletakkansegalasesuatu = "Cukup"'.$prodi_id);

         foreach ($query_Meletakkansegalasesuatu_cukup_besar as $key => $value) {
             array_push($data['Meletakkansegalasesuatu'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Meletakkansegalasesuatu Tinggi========================
         $query_Meletakkansegalasesuatu_kurang = DB::select('SELECT Meletakkansegalasesuatu,
         COUNT(Meletakkansegalasesuatu) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Meletakkansegalasesuatu = "Tinggi"'.$prodi_id);

         foreach ($query_Meletakkansegalasesuatu_kurang as $key => $value) {
             array_push($data['Meletakkansegalasesuatu'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Meletakkansegalasesuatu Sangat Tinggi========================
         $query_Meletakkansegalasesuatu_tidak_sama_sekali = DB::select('SELECT Meletakkansegalasesuatu,
         COUNT(Meletakkansegalasesuatu) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Meletakkansegalasesuatu = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Meletakkansegalasesuatu_tidak_sama_sekali as $key => $value) {
             array_push($data['Meletakkansegalasesuatu'], ['sangat_tinggi' => (int)$value->jumlah]);
         }


 //---------------------------------------------------------------------------------------------------


         // ======================== Kreatifdaninovatif Sangat rendah========================
         $query_Kreatifdaninovatif = DB::select('SELECT Kreatifdaninovatif, kode_prodi_id,
         COUNT(Kreatifdaninovatif) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Kreatifdaninovatif = "Sangat rendah"'.$prodi_id );


         foreach ($query_Kreatifdaninovatif as $key => $value) {
             array_push($data['Kreatifdaninovatif'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Kreatifdaninovatif Rendah========================
         $query_Kreatifdaninovatif_besar = DB::select('SELECT Kreatifdaninovatif,
         COUNT(Kreatifdaninovatif) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Kreatifdaninovatif = "Rendah"'.$prodi_id);

         foreach ($query_Kreatifdaninovatif_besar as $key => $value) {
             array_push($data['Kreatifdaninovatif'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Kreatifdaninovatif cukup_besar========================
         $query_Kreatifdaninovatif_cukup_besar = DB::select('SELECT Kreatifdaninovatif,
         COUNT(Kreatifdaninovatif) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Kreatifdaninovatif = "Cukup"'.$prodi_id);

         foreach ($query_Kreatifdaninovatif_cukup_besar as $key => $value) {
             array_push($data['Kreatifdaninovatif'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Kreatifdaninovatif Tinggi========================
         $query_Kreatifdaninovatif_kurang = DB::select('SELECT Kreatifdaninovatif,
         COUNT(Kreatifdaninovatif) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Kreatifdaninovatif = "Tinggi"'.$prodi_id);

         foreach ($query_Kreatifdaninovatif_kurang as $key => $value) {
             array_push($data['Kreatifdaninovatif'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Kreatifdaninovatif Sangat Tinggi========================
         $query_Kreatifdaninovatif_tidak_sama_sekali = DB::select('SELECT Kreatifdaninovatif,
         COUNT(Kreatifdaninovatif) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Kreatifdaninovatif = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Kreatifdaninovatif_tidak_sama_sekali as $key => $value) {
             array_push($data['Kreatifdaninovatif'], ['sangat_tinggi' => (int)$value->jumlah]);
         }



 //---------------------------------------------------------------------------------------------------


         // ======================== Mampumembuatkeputusanterbaik Sangat rendah========================
         $query_Mampumembuatkeputusanterbaik = DB::select('SELECT Mampumembuatkeputusanterbaik, kode_prodi_id,
         COUNT(Mampumembuatkeputusanterbaik) AS jumlah  FROM `tb_profil_karakter_kepribadian`

         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
         where Mampumembuatkeputusanterbaik = "Sangat rendah"'.$prodi_id );


         foreach ($query_Mampumembuatkeputusanterbaik as $key => $value) {
             array_push($data['Mampumembuatkeputusanterbaik'], ['sangat_rendah' => (int)$value->jumlah]);
         }

         // ======================== Mampumembuatkeputusanterbaik Rendah========================
         $query_Mampumembuatkeputusanterbaik_besar = DB::select('SELECT Mampumembuatkeputusanterbaik,
         COUNT(Mampumembuatkeputusanterbaik) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampumembuatkeputusanterbaik = "Rendah"'.$prodi_id);

         foreach ($query_Mampumembuatkeputusanterbaik_besar as $key => $value) {
             array_push($data['Mampumembuatkeputusanterbaik'], ['rendah' => (int)$value->jumlah]);
         }

         // ======================== Mampumembuatkeputusanterbaik cukup_besar========================
         $query_Mampumembuatkeputusanterbaik_cukup_besar = DB::select('SELECT Mampumembuatkeputusanterbaik,
         COUNT(Mampumembuatkeputusanterbaik) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampumembuatkeputusanterbaik = "Cukup"'.$prodi_id);

         foreach ($query_Mampumembuatkeputusanterbaik_cukup_besar as $key => $value) {
             array_push($data['Mampumembuatkeputusanterbaik'], ['cukup' => (int)$value->jumlah]);
         }

         // ======================== Mampumembuatkeputusanterbaik Tinggi========================
         $query_Mampumembuatkeputusanterbaik_kurang = DB::select('SELECT Mampumembuatkeputusanterbaik,
         COUNT(Mampumembuatkeputusanterbaik) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampumembuatkeputusanterbaik = "Tinggi"'.$prodi_id);

         foreach ($query_Mampumembuatkeputusanterbaik_kurang as $key => $value) {
             array_push($data['Mampumembuatkeputusanterbaik'], ['tinggi' => (int)$value->jumlah]);
         }

         // ======================== Mampumembuatkeputusanterbaik Sangat Tinggi========================
         $query_Mampumembuatkeputusanterbaik_tidak_sama_sekali = DB::select('SELECT Mampumembuatkeputusanterbaik,
         COUNT(Mampumembuatkeputusanterbaik) AS jumlah  FROM `tb_profil_karakter_kepribadian`
         JOIN tb_mahasiswa ON tb_profil_karakter_kepribadian.npm = tb_mahasiswa.npm
           where Mampumembuatkeputusanterbaik = "Sangat Tinggi"'.$prodi_id);

         foreach ($query_Mampumembuatkeputusanterbaik_tidak_sama_sekali as $key => $value) {
             array_push($data['Mampumembuatkeputusanterbaik'], ['sangat_tinggi' => (int)$value->jumlah]);
         }



        // dd($data);

        return $data;
    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_profil_karakter_kepribadian')
                ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_profil_karakter_kepribadian')
                ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_profil_karakter_kepribadian')
                ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereNotNull('tb_mahasiswa.npm')
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
                $data[] = $user->pekerjaandenganpenuhtanggungjawab;
                $data[] = $user->Mampubekerjasamadalamtim;
                $data[] = $user->Bersungguh_sungguh;
                $data[] = $user->Bekerjakerassesuaidengankompetensi;
                $data[] = $user->Tolerandanmampumenerima;
                $data[] = $user->Meletakkansegalasesuatu;
                $data[] = $user->Kreatifdaninovatif;
                $data[] = $user->Mampumembuatkeputusanterbaik;


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
            $query = DB::table('tb_profil_karakter_kepribadian')
            ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_profil_karakter_kepribadian')
            ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_profil_karakter_kepribadian')
            ->Leftjoin('tb_mahasiswa', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - PROFIL KARAKTER');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan');
        $sheet->setCellValue('G3', 'Mampu bekerjasama dalam tim');
        $sheet->setCellValue('H3', 'Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan');
        $sheet->setCellValue('I3', 'Bekerja keras sesuai dengan kompetensi');
        $sheet->setCellValue('J3', 'Toleran dan mampu menerima masukkan dari siapapun');
        $sheet->setCellValue('K3', 'Meletakkan segala sesuatu secara professional');
        $sheet->setCellValue('L3', 'Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan');
        $sheet->setCellValue('M3', 'Mampu membuat keputusan terbaik dengan arif dan bijaksana');



        //filte
        $sheet->setAutoFilter('A1:M1');
        //color cell
            //warna nomer

            //warna depart

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
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(20);




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
            $sheet->setCellValue('F'.$i, $value->pekerjaandenganpenuhtanggungjawab);
            $sheet->setCellValue('G'.$i, $value->Mampubekerjasamadalamtim);
            $sheet->setCellValue('H'.$i, $value->Bersungguh_sungguh);
            $sheet->setCellValue('I'.$i, $value->Bekerjakerassesuaidengankompetensi);
            $sheet->setCellValue('J'.$i, $value->Tolerandanmampumenerima);
            $sheet->setCellValue('K'.$i, $value->Meletakkansegalasesuatu);
            $sheet->setCellValue('L'.$i, $value->Kreatifdaninovatif);
            $sheet->setCellValue('M'.$i, $value->Mampumembuatkeputusanterbaik);

            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Profil Karakter - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
