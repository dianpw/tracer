<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FilterPencarianController extends Controller
{
    public function index(){
        $db_tahun_mahasiswa= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');
        $arr = [];
        foreach ($db_tahun_mahasiswa as $key => $val){
            array_push($arr, $val->tahun_lulus);
        }

        $check = DB::table('tb_filter_tahun')
        ->select('tahun')
        ->first();
        $auth_user = DB::table('users')
        ->leftJoin('tm_kode_prodi', 'users.prodi_id', 'tm_kode_prodi.kode')
        ->where('id', Auth::user()->id)
        ->first();
        return view('filter_pencarian_mahasiswa', compact('db_tahun_mahasiswa', 'check', 'arr', 'auth_user'));
    }

    public function update(Request $request){
    try {
        DB::table('tb_filter_tahun')
            ->where('id', 1)
            ->update(['tahun' =>$request->tahun == null ? $request->tahun == null: implode(',',$request->tahun), ]);
        // dd($request->all());
        return redirect()->back()->with('message', 'Filter Pencarian Berhasil Diubah!');
    } catch (\Exception $exception) {
        return redirect()->back()->with('message', 'GAGAL mengubah filter');
    }

    }
}
