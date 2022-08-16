<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MasterQuisionerController extends Controller
{
    public function index()
    {
        return view('master_quisioner.index');
    }
    public function datatable_master_quisioner(){
        try { 
            $result = [];
            $count = 1;
            $query = \DB::table('tb_quisioner')
                    ->select('*')
                    ->get();
                // dd($query);
            foreach ($query as $data_quisioner) {

                $edit = '<a href="list-evaluasi-karyawan/'.$data_quisioner->konten.'" class="btn btn-success m-btn btn-sm m-btn m-btn--icon" id="m_blockui_nilai_dosen"
                                data-id="' . $data_quisioner->konten . '">
                                <span>
                                    <i class="la la-pencil"></i>
                                    <span>Update</span>
                                </span>
                                </a></center>';
                $delete = '<a href="list-evaluasi-karyawan/'.$data_quisioner->konten.'" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="m_blockui_nilai_dosen"
                data-id="' . $data_quisioner->konten . '">
                <span>
                    <i class="la la-pencil"></i>
                    <span>Delete</span>
                </span>
                </a></center>';
                $update = $data_quisioner->updated_at ? \Carbon\Carbon::parse($data_quisioner->updated_at)->format('d-m-Y H:i') : '';
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($data_quisioner->konten);

                $data[] = $edit.' '.$delete;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }
}
