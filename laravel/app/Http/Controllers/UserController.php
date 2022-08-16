<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;

class UserController extends Controller

{
    public function index(Request $request)

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
        return view('users.index', compact('auth_user'));
    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;

                $query = DB::table('users')
                    ->select('users.name',
                              'users.email',
                              'users.username',
                              'users.prodi_id',
                              'tm_fakultas.fakultas',
                              'tm_kode_prodi.prodi',
                              'users.role_id',
                              'users.id as id_users',
                              'users.created_at',
                              'users.updated_at'
                    )
                    ->Leftjoin('tm_kode_prodi', 'users.prodi_id', 'tm_kode_prodi.kode')
                    ->Leftjoin('tm_fakultas', 'users.fakultas_user_id', 'tm_fakultas.id')
                    ->orderBy('users.id','DESC')
                    ->get();

            foreach ($query as $user) {
                $action_edit = '<center>
                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                data-toggle="modal"
                data-id= "'. $user->id_users.'"
                data-target="#modal-edit" id="btn_update_surat">
                <span>
                    <i class="la la-edit"></i>
                    <span>Ubah</span>
                </span>
                </a>';
                if($user->prodi_id == 1000){
                    $action_del = '';
                }else{
                    $action_del = '<a href="#" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="btn-delete"
                    data-id="' . $user->id_users . '">
                    <span>
                        <i class="la la-trash"></i>
                        <span>Hapus</span>
                    </span>
                    </a> </center>';
                }

                $roless = array('1' => '<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">Admin Tracer</span>',
                                '2' => '<span class="m-badge m-badge--warning m-badge--wide m-badge--rounded">Fakultas</span>',
                                '3' => '<span class="m-badge m-badge--success m-badge--wide m-badge--rounded">Program Studi</span>'
                );
                $check_prodi = '';
                if($user->role_id == 3){
                    $check_prodi = $user->prodi;
                }else if($user->role_id == 2){
                    $check_prodi = '<b>'.'Full Akses Prodi Fakultas'.'</b>';
                }else{
                    $check_prodi = '<b style="color:red">'.'-'.'</b>';
                }
                $update = $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->format('d-m-Y H:i') : '';
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($user->name);
                $data[] = $user->fakultas;
                $data[] = $check_prodi;
                $data[] = $roless[$user->role_id];
                $data[] = ($user->email == null ? '-' : $user->email);


                $data[] = $user->created_at;
                $data[] = $action_edit.' '.$action_del;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function simpan(Request $request){
        $query = '';
        // dd("oke");
        $kode_prodi = [];
        if($request->role_id == 2){
            $query = DB::table('tm_kode_prodi')
                    ->select('kode')
                    ->where('fakultas_id', $request->fakultas_id)
                    ->get();
        foreach($query as $key => $val){
            array_push($kode_prodi, $val->kode);
        }
        }


        // dd($kode_prodi);
        if($request->role_id == 2){
            DB::table('users')->insert([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'prodi_id'      => implode(',',$kode_prodi),
                'fakultas_user_id' => $request->fakultas_id,
                'password'      => bcrypt($request->password),
                'role_id'       => 2

        ]);
        }else if($request->role_id == 3){
            DB::table('users')->insert([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'prodi_id'      => $request->prodi_id,
                'fakultas_user_id' => $request->fakultas_id,
                'password'      => bcrypt($request->password),
                'role_id'       => 3

        ]);
        }

        // dd($query);
        return response()->json(['success'=>'User berhasil ditambahkan']);
    }

    public function update(Request $request)
    {
    try {
        DB::table('users')->where('id', $request->id)
                                  ->update([
                                        'name'          => $request->name,
                                        'username'      => $request->username,
                                        'email'         => $request->email,
                                        'prodi_id'      => $request->prodi_id,
                                        'password'      => bcrypt($request->password),

                                    ]);
        // dd($request->all());
        return response()->json(['status' => 'success', 'result' => 'User berhasil diubah'], 200);
    } catch (\Exception $exception) {
        return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
    }

    }

    public function destroy(Request $request)
    {

        try {
           DB::table('users')->where('users.id', '=', $request->id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
        return response()->json(['status' => 'success', 'result' => 'User berhasil dihapus'], 200);
    }

    public function AjaxDetail($id_user)
    {
        $users = \DB::table('users')
            ->Leftjoin('tm_kode_prodi', 'users.prodi_id', 'tm_kode_prodi.kode')
            ->select('users.id','users.username', 'users.name', 'users.email', 'users.password', 'users.prodi_id', 'tm_kode_prodi.kode', 'tm_kode_prodi.prodi')
            ->where('users.id', $id_user)
            ->first();
        // dd($users);
        // dd($suratmasuk);
        return response()->json(['status'=> 'success', 'result'=> $users], 200);

    }

}
