<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class ProdiController extends Controller
{
    public function index()
    {
        return view('prodi.index');
    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;
            $query = DB::table('tm_kode_prodi')
                    ->Leftjoin('tm_fakultas', 'tm_kode_prodi.fakultas_id', 'tm_fakultas.id')
                    ->select(DB::raw('*, tm_kode_prodi.created_at as tgl_input'))
                    ->get();
            // dd($query);
            foreach ($query as $user) {
                $action_edit = '<center>
                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                data-toggle="modal"
                data-id= "'. $user->id_kode_prodi.'"
                data-target="#modal-edit" id="btn_update_surat">
                <span>
                    <i class="la la-edit"></i>
                    <span>Ubah</span>
                </span>
                </a>';
 
                $action_del = '<a href="#" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="btn-delete"
                data-id="' . $user->id_kode_prodi . '"
                data-kode="' . $user->kode . '"
                >
                <span>
                    <i class="la la-trash"></i>
                    <span>Hapus</span>
                </span>
                </a> </center>';

                $data = [];
                $data[] = $count++;
                $data[] = ($user->kode);
                $data[] = ($user->jenjang . ' - ' .$user->prodi);
                $data[] = ($user->fakultas);
                $data[] = ($user->tgl_input);
                $data[] = $action_edit.' '.$action_del;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function simpan(Request $request){
        DB::table('tm_kode_prodi')->insert([
            'kode'          => $request->kode,
            'jenjang'       => $request->jenjang,
            'prodi'         => $request->prodi,
            'fakultas_id'   => $request->fakultas_id,
            'created_at'    => Carbon::now()

    ]);
    // dd($query);
    return response()->json(['success'=>'Program studi berhasil ditambahkan']);
    }

    public function update(Request $request){
        try {
            DB::table('tm_kode_prodi')
            ->where('id_kode_prodi', $request->id)
            ->update([
                'kode'          => $request->kode,
                'jenjang'       => $request->jenjang,
                'prodi'         => $request->prodi,
                'fakultas_id'   => $request->fakultas_id,
                'updated_at'    => Carbon::now()
            ]);
            // dd($request->all());
            return response()->json(['status' => 'success', 'result' => 'Program studi berhasil diubah'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
        }
    }

    public function destroy(Request $request)
    {
        // dd($request->kode);
        $check_prodi = DB::table('tm_kode_prodi')
                    ->select('*')
                    ->where('id_kode_prodi', $request->id)
                    ->first();

        $check = DB::table('tb_mahasiswa')->where('kode_prodi_id', $check_prodi->kode)->first();
        if($check){
            return response()->json(['status' => 'warning', 'result' => 'Program studi masih digunakan di data mahasiswa'], 200);
        }else{
            DB::table('tm_kode_prodi')->where('tm_kode_prodi.id_kode_prodi', '=', $request->id)->delete();

            return response()->json(['status' => 'success', 'result' => 'Program studi berhasil dihapus'], 200);
        }

    }

    public function AjaxDetail($id) 
    {
        $users = \DB::table('tm_kode_prodi')
            ->Leftjoin('tm_fakultas', 'tm_kode_prodi.fakultas_id', 'tm_fakultas.id')
            ->select('*')
            ->where('id_kode_prodi', $id)
            ->first();
        // dd($users);
        // dd($suratmasuk);
        return response()->json(['status'=> 'success', 'result'=> $users], 200);

    }

}
