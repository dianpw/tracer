<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class FakultasController extends Controller
{
    public function index()
    {
        return view('fakultas.index');
    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;
            $query = DB::table('tm_fakultas')
                    ->get();
            // dd($query);
            foreach ($query as $user) {
                $action_edit = '<center>
                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                data-toggle="modal"
                data-id= "'. $user->id.'"
                data-fakultas= "'. $user->fakultas.'"
                data-fakultas
                data-target="#modal-edit" id="btn_update_surat">
                <span>
                    <i class="la la-edit"></i>
                    <span>Ubah</span>
                </span>
                </a>';

                $action_del = '<a href="#" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="btn-delete"
                data-id="' . $user->id . '">
                <span>
                    <i class="la la-trash"></i>
                    <span>Hapus</span>
                </span>
                </a> </center>';

                $data = [];
                $data[] = $count++;
                $data[] = ($user->fakultas);
                $data[] = ($user->created_at);
                $data[] = $action_edit.' '.$action_del;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function simpan(Request $request){
        DB::table('tm_fakultas')->insert([
            'fakultas'      => $request->fakultas,
            'created_at'    => Carbon::now()

    ]);
    // dd($query);
    return response()->json(['success'=>'Fakultas berhasil ditambahkan']);
    }

    public function update(Request $request)
    {
    try {
        DB::table('tm_fakultas')->where('id', $request->id)
                                  ->update([
                                        'fakultas'          => $request->fakultas,
                                        'updated_at'    => Carbon::now()

                                    ]);
        // dd($request->all());
        return response()->json(['status' => 'success', 'result' => 'Fakultas berhasil diubah'], 200);
    } catch (\Exception $exception) {
        return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
    }

    }

    public function destroy(Request $request)
    {

        $check = DB::table('tm_kode_prodi')->where('fakultas_id', $request->id)->first();
        if($check){
            return response()->json(['status' => 'warning', 'result' => 'Fakultas di Program studi masih digunakan'], 200);
        }else{
            DB::table('tm_fakultas')->where('tm_fakultas.id', '=', $request->id)->delete();
            return response()->json(['status' => 'success', 'result' => 'Fakultas berhasil dihapus'], 200);
        }

    }

    public function AjaxDetail($id)
    {
        $users = \DB::table('tm_fakultas')
            ->select('*')
            ->where('tm_fakultas.id', $id)
            ->first();
        // dd($users);
        // dd($suratmasuk);
        return response()->json(['status'=> 'success', 'result'=> $users], 200);

    }

}
