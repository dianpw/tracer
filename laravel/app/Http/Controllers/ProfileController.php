<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Helpers\notif;

class ProfileController extends Controller
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

        $data = $this->data_profile();
        // dd($data);
        return view('profile.index', compact('data', 'auth_user'));
    }

    public function data_profile(){
        $db = DB::table('users')
        ->leftJoin('tm_kode_prodi', 'users.prodi_id', 'tm_kode_prodi.kode')
        ->where('id', Auth::user()->id)
                ->first();
        $nama   = Auth::user()->name;
        $email  = Auth::user()->email;
        $prodi = $db->prodi;
        $array = [];
        array_push($array, [
                            'nama'      => $nama,
                            'email'     => $email,
                            'prodi'   => $prodi
                        ]);
        return $array;
    }
    public function editPassword(Request $request)
    {

        $rules = [
            'current_pass' => 'required|min:4',
            'new_pass' => 'required|min:4',
            'confirm_pass' => 'required|same:new_pass',
        ];

        $messages = [
            'required' => 'The :attribute is required.',
            'min' => 'The :attribute is lest than 3 character.',
        ];
        //validation roles
        $validator = \Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()], 406);
        }

        //get user data with id match
        $user_query = \DB::table('users')->where('id', $request->id)->first();
        if (!$user_query) {
            return \response()->json(['status' => 'error', 'message' => 'user not found'], 406);
        }

        try {
            if (\Hash::check($request->current_pass, $user_query->password)) {
                \DB::table('users')
                    ->where('id', $request->id)
                    ->update([
                        'password' => \Hash::make($request->new_pass)
                    ]);
            }else{
                return \response()->json(['status' => 'error', 'message' => 'current password doesn\'t match '], 406);
            }

        } catch (\Exception $exception) {
            return \response()->json(['status' => 'error', 'message' => $exception->getMessage()], 406);
        }
        return \response()->json(['status' => 'success', 'result' => 'Reset password was successfully'], 200);

    }
}
