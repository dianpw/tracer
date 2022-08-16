<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\MahasiswaModel;
use Redirect;
use Illuminate\Http\Request;
use App\Imports\ImportAccount;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Facades\Excel;

class MasterMahasiswaController extends Controller
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

        return view('master_mahasiswa.index',compact('auth_user'));
    }
    public function show_datatable(){
        try {
            $result = [];
            $count = 1;
            $query = DB::table('tb_mahasiswa')
                        ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                        ->Leftjoin('tm_fakultas', 'tb_mahasiswa.mhs_fakultas_id', 'tm_fakultas.id')
                        ->select('tb_mahasiswa.id as id_mhs', 'npm', 'nama', 'tahun_lulus', 'tahun_masuk', 'email', 'jk', 'nik', 'npwp', 'no_hp', 'alamat', 'mhs_fakultas_id','kode_prodi_id', 'kode', 'prodi', 'jenjang', 'tm_fakultas.id as kode_fakultas','fakultas', 'status_baru', 'kode_pt')
                        ->orderBy('tahun_lulus', 'desc')
                        ->get();

            // dd($query);
            foreach ($query as $user) {
                $action_edit = '<center>
                                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                                data-toggle="modal"
                                data-id= "'. $user->id_mhs.'"
                                data-target="#modal-edit" id="btn_update_surat">
                                <span>
                                    <i class="la la-edit"></i>
                                    <span>Ubah</span>
                                </span>
                                </a>';

                $action_detail = '<a href="#" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="btn-delete"
                                data-id="' . $user->id_mhs . '">
                                <span>
                                    <i class="la la-trash"></i>
                                    <span>Hapus</span>
                                </span>
                                </a> </center>';

                $data = [];
                $data[] = '<div class="form-check">
                <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="'.$user->id_mhs.'">
                    <input type="checkbox" class="sub_chk" data-id="'.$user->id_mhs.'" id="'.$user->id_mhs.'" >

                    <span style="margin-top: -13px;"></span>
                </label>
                </div>';
                $data[] = $count++;
                $data[] = ($user->npm);
                $data[] = ($user->nama);
                $data[] = ($user->nik);
                $data[] = ($user->jk);
                $data[] = ($user->no_hp);
                $data[] = ($user->email);
                $data[] = ($user->npwp);
                $data[] = ($user->alamat);
                $data[] = ($user->fakultas);
                $data[] = ($user->jenjang . ' - ' . $user->prodi);
                $data[] = ($user->tahun_masuk);
                $data[] = ($user->status_baru);
                $data[] = ($user->tahun_lulus);

                $data[] = $action_edit.' '.$action_detail ;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function destroy_checkbox($id)
    {
    	DB::table("tb_mahasiswa")->delete($id);
    	return response()->json(['success'=>"Mahasiswa Alumni Deleted successfully.", 'tr'=>'tr_'.$id]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("tb_mahasiswa")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Mahasiswa Deleted successfully."]);

    }

    public function importAccount(){
        $data = Excel::toArray(new ImportAccount, request()->file('file'));

        $data_excel =  collect(head($data))
            ->each(function ($row, $key) {
                MahasiswaModel::insert([
                        'npm'    => $row['npm'],
                        'nama'    => $row['nama'],
                        'status_baru'    => $row['status_baru'],
                        'tahun_lulus'    => Date::excelToDateTimeObject($row['tahun_lulus']),
                        'mhs_fakultas_id'    => $row['mhs_fakultas_id'],
                        'kode_prodi_id'    => $row['kode_prodi_id'],

                    ]);
                    
            });
        if($data_excel){
            $notification = array(
                'message' => 'Sukses Import data!',
                'alert-type' => 'success'
            );
            
            return 
            Redirect::to('data-mahasiswa')->with($notification);
        }


    }

    public function show_fakultas(){
        try {
            $result = [];
            $count = 1;
            $query = DB::table('tm_fakultas')
                    ->get();
            // dd($query);
            foreach ($query as $user) {

                $data = [];

                $data[] = ($user->id);
                $data[] = ($user->fakultas);


                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function show_prodi(){
        try {
            $result = [];
            $count = 1;
            $query = DB::table('tm_kode_prodi')
                    ->get();
            // dd($query);
            foreach ($query as $user) {

                $data = [];
                $data[] = ($user->kode);
                $data[] = ($user->prodi);

                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

 
    public function simpan(Request $request){
        try {
            DB::table('tb_mahasiswa')->insert([
                                            'npm'           => $request->npm,
                                            'nama'          => $request->nama,
                                            'status_baru'   => $request->status_baru,
                                            'tahun_lulus'   => $request->tahun_lulus,
                                            'tahun_masuk'   => $request->tahun_masuk,
                                            'email'         => $request->email,
                                            'jk'            => $request->jk,
                                            'nik'           => $request->nik,
                                            'npwp'          => $request->npwp,
                                            'no_hp'         => $request->no_hp,
                                            'alamat'        => $request->alamat,
                                            'mhs_fakultas_id' => $request->mhs_fakultas_id,
                                            'kode_prodi_id' => $request->kode_prodi_id,
                                            'kode_pt'       => '071027',

                                        ]);
            // dd($request->all());
            return response()->json(['status' => 'success', 'result' => 'Data Mahasiswa berhasil disimpan'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
        }
    }

    public function update(Request $request){
        try {
            DB::table('tb_mahasiswa')->where('id', $request->id)
                                      ->update([
                                            'npm'           => $request->npm,
                                            'nama'          => $request->nama,
                                            'status_baru'   => $request->status_baru,
                                            'tahun_lulus'   => $request->tahun_lulus,
                                            'tahun_masuk'   => $request->tahun_masuk,
                                            'email'         => $request->email,
                                            'jk'            => $request->jk,
                                            'nik'           => $request->nik,
                                            'npwp'          => $request->npwp,
                                            'no_hp'         => $request->no_hp,
                                            'alamat'        => $request->alamat,
                                            'mhs_fakultas_id' =>  $request->mhs_fakultas_id,
                                            'kode_prodi_id' => $request->kode_prodi_id,
                                            'kode_pt'       => '071027',
                                            'updated_at'    => \Carbon\Carbon::now()
                                        ]);
            // dd($request->all());
            return response()->json(['status' => 'success', 'result' => 'Data berhasil diubah'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
        }
    }


    public function AjaxDetail($id_user) 
    {
        $users = \DB::table('tb_mahasiswa')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
            ->Leftjoin('tm_fakultas', 'tb_mahasiswa.mhs_fakultas_id', 'tm_fakultas.id')
            ->select('tb_mahasiswa.id as id_mhs', 'npm', 'nama', 'tahun_lulus', 'tahun_masuk', 'email', 'jk', 'nik', 'npwp', 'no_hp', 'alamat', 'mhs_fakultas_id','kode_prodi_id', 'kode', 'prodi', 'tm_fakultas.id as kode_fakultas','fakultas', 'status_baru', 'kode_pt')
            ->where('tb_mahasiswa.id', $id_user)
            ->first();
        // dd($users);
        return response()->json(['status'=> 'success', 'result'=> $users], 200);

    }

    public function destroy(Request $request)
    {
        try {
           DB::table('tb_mahasiswa')->where('id', '=', $request->id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
        return response()->json(['status' => 'success', 'result' => 'Data berhasil dihapus'], 200);
    }
}
