<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class VideoController extends Controller
{
    public function index(){
        return view('prodi.video');
    }

    public function show_video(){
        try {
            $result = [];
            $count = 1;
            $query = DB::select('SELECT id, link, status, update_data FROM video_opening');
            foreach ($query as $user) {
                $action_edit = '<center>
                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                data-toggle="modal"
                data-id= "'. $user->id.'"
                data-target="#modal-edit" id="btn_update_video">
                <span>
                    <i class="la la-edit"></i>
                    <span>Ubah</span>
                </span>
                </a>';
            
                $data = [];
                $data[] = $count++;
                $data[] = ($user->link);
                $data[] = ($user->status);
                $data[] = $action_edit;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }
    
    public function load_status(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data =DB::table('video_opening')->select('id', 'status')->where('link', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }else{
            $data = DB::table('video_opening')->select('id', 'status')->get();
            return response()->json($data);
        }
    }
    
    public function AjaxDetail($id){
        $users = \DB::table('video_opening')
            ->select('*')
            ->where('id', $id)
            ->first();
        // dd($users);
        // dd($suratmasuk);
        return response()->json(['status'=> 'success', 'result'=> $users], 200);

    }
    public function update_video(Request $request){
        try {
            DB::table('video_opening')
            ->where('id', $request->id)
            ->update([
                'link'          => $request->link,
                'status'       => $request->status
            ]);
             //dd($request->all());
            return response()->json(['status' => 'success', 'result' => 'Video Opening berhasil diubah'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
        }
    }


}
