<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SelectController extends Controller
{
    public function load_kota(Request $request, $id_prov)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('kota_perusahaan')->select('id_kota', 'nm_kota')
                    ->where('id_prov', $id_prov)
                    ->get();
            return response()->json($data);
        }else{
            $data =DB::table('kota_perusahaan')->select('id_kota', 'nm_kota')
            ->where('id_prov', $id_prov)
            ->get();
            return response()->json($data);
        }
    }
    public function load_prov(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('prov_perusahaan')
                            ->select('id_prov', 'nm_prov')
                            ->where('nm_prov', 'LIKE', '%'.$cari.'%')
                            ->get();
            return response()->json($data);
        }else{
            $data = DB::table('prov_perusahaan')
                            ->select('id_prov', 'nm_prov')
                            ->get();
            return response()->json($data);
        }
    }

    public function load_kota_no_prov(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('kota_perusahaan')->select('id_kota', 'nm_kota')->where('nm_kota', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }else{
            $data = DB::table('kota_perusahaan')->select('id_kota', 'nm_kota')->get();
            return response()->json($data);
        }
    }
    public function load_prodi(Request $request, $id_fakultas)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('tm_kode_prodi')->select('kode', 'prodi')
                    ->where('fakultas_id', $id_fakultas)
                    ->get();
            return response()->json($data);
        }else{
            $data =DB::table('tm_kode_prodi')->select('kode', 'prodi')
            ->where('fakultas_id', $id_fakultas)
            ->get();
            return response()->json($data);
        }
    }
    public function load_fakultas(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('tm_fakultas')->select('id', 'fakultas')->where('fakultas', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }else{
            $data = DB::table('tm_fakultas')->select('id', 'fakultas')->get();
            return response()->json($data);
        }
    }

    public function load_prodi_no_fakultas(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('tm_kode_prodi')->select('kode', 'prodi')->where('prodi', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }else{
            $data = DB::table('tm_kode_prodi')->select('kode', 'prodi')->get();
            return response()->json($data);
        }
    }

    public function filter_tahun(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('tb_mahasiswa')->select('tahun_lulus')
                    ->where('tahun_lulus', 'LIKE', '%'.$cari.'%')
                    ->groupBy('tahun_lulus')
                    ->get();
            return response()->json($data);
        }else{
            $data = DB::table('tb_mahasiswa')
                    ->select('tahun_lulus')
                    ->groupBy('tahun_lulus')
                    ->get();
            return response()->json($data);
        }
    }
}
