<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchMahasiswaController extends Controller
{
     public function index(){
         
        $video = DB::select('SELECT link FROM video_opening WHERE id="1" AND status="Aktif"');
        return view('mahasiswa.index', compact('video'));
    } 

    public function searchMahasiswa(Request $request){
        $cari = $request->cari;
        $check = DB::table('tb_filter_tahun')
        ->select('tahun')
        ->first();
        $ex = explode(',', $check->tahun);
        //var_dump($ex);
        if($check->tahun == 1){
            $query = DB::table('tb_mahasiswa')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
            ->where('nama','like',"%".$cari."%")
            ->orWhere('npm', 'like', "%".$cari."%")
            ->get();
        }else{
            $query = DB::table('tb_mahasiswa')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->where('nama','like',"%".$cari."%")
                ->whereIn(DB::raw('YEAR(tahun_lulus)'), $ex)
                ->orWhere('npm', 'like', "%".$cari."%")
                ->get();
        }
        //var_dump($query);
        echo json_encode($query);
    }

    public function perusahaan(){
        return view('perusahaan.index');
    }

}
