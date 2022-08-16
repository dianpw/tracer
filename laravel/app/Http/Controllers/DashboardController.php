<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
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

        $role = Auth::user()->role_id;
        $total_mhs = '';
        $total_sdh_mengisi = '';
        $belum_mengisi = '';
     	$month = date('m');
        $year = date('Y'); 
    
        if($role == 1){
            $total_mhs = DB::table('tb_mahasiswa')
                ->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
				// ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				 ->whereNotNull('tb_mahasiswa.nik')
                ->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
        	$input_hari_ini = DB::table('tb_mahasiswa')
            	//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->count();
            $input_mingguan = DB::table('tb_mahasiswa')
            	//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->count();
            $input_bulanan = DB::table('tb_mahasiswa')
            		//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				 	->whereNotNull('tb_mahasiswa.nik')
                    ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                    ->whereYear('tb_mahasiswa.updated_at','=', $year)
                    ->count();

        }else if($role == 2){
            $ex_prodi = explode(',', Auth::user()->prodi_id);

            $total_mhs = DB::table('tb_mahasiswa')

                ->whereIn('kode_prodi_id', $ex_prodi)
                ->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
        	$input_hari_ini = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->count();
            $input_mingguan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->count();
            $input_bulanan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                ->whereYear('tb_mahasiswa.updated_at','=', $year)
                ->count();

        }else if($role == 3){
            $total_mhs = DB::table('tb_mahasiswa')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
         	$input_hari_ini = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->count();
            $input_mingguan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->count();
            $input_bulanan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                ->whereYear('tb_mahasiswa.updated_at','=', $year)
                ->count();
        }
		$tahun_terakhir = DB::select('SELECT MAX(YEAR(tahun_lulus)) AS tahun_lulus FROM tb_mahasiswa');
		//$show_tahun = DB::table('tb_mahasiswa')
        //            ->select('tahun_lulus')
        //            ->groupBy('tahun_lulus')
        //			->where('tahun_lulus', '!=', '0000-00-00')
        //            ->get();
        
		$show_tahun= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');
        
    // dd($show_tahun);
        // dd($belum_mengisi);
        return view('dashboard.index', compact('auth_user', 'total_mhs', 'total_sdh_mengisi', 'belum_mengisi','input_hari_ini', 'input_mingguan', 'input_bulanan', 'tahun_terakhir', 'show_tahun'));
    }

	public function filter_dashboard($tahun_lulus=null){
    	// dd('oke');
    	$role = Auth::user()->role_id;
        $total_mhs = '';
        $total_sdh_mengisi = '';
        $belum_mengisi = '';
    	$input_hari_ini = '';
    	$input_mingguan = '';
    	$input_bulanan = '';
    	$month = date('m');
        $year = date('Y');
        //$tahun_lulus = substr($lulus, 0, 4);
    
        if($role == 1){
            $total_mhs = DB::table('tb_mahasiswa')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
        // dd($total_mhs);
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
				// ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
        	$input_hari_ini = DB::table('tb_mahasiswa')
            	//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_mingguan = DB::table('tb_mahasiswa')
            	//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_bulanan = DB::table('tb_mahasiswa')
            	//->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				->whereNotNull('tb_mahasiswa.nik')
                ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                ->whereYear('tb_mahasiswa.updated_at','=', $year)
                ->whereYear('tahun_lulus', $tahun_lulus)    
            	->count();

        }else if($role == 2){
            $ex_prodi = explode(',', Auth::user()->prodi_id);

            $total_mhs = DB::table('tb_mahasiswa')

                ->whereIn('kode_prodi_id', $ex_prodi)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
        	$input_hari_ini = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_mingguan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_bulanan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                ->whereYear('tb_mahasiswa.updated_at','=', $year)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();

        }else if($role == 3){
            $total_mhs = DB::table('tb_mahasiswa')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
               // ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
         	$input_hari_ini = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_mingguan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $input_bulanan = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                ->whereYear('tb_mahasiswa.updated_at','=', $year)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
        }
       // dd($input_bulanan);
    	$arr_push = [];
    	array_push($arr_push, ['total_mhs' 			=> $total_mhs,
                              'total_sudah_mengisi' => $total_sdh_mengisi,
                               'belum_mengisi'		=> $belum_mengisi,
                               'input_harian'		=> $input_hari_ini,
                               'input_mingguan'		=> $input_mingguan,
                               'input_bulanan'		=> $input_bulanan
                              ]);
    echo json_encode($arr_push);
 
    }

     public function graph($tahun_lulus=null){
        $role = Auth::user()->role_id;
        if($role == 1){
            $total_mhs = DB::table('tb_mahasiswa')
                ->whereYear('tahun_lulus', $tahun_lulus)    
            	->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
				// ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm',  'tb_mahasiswa.npm')
				 ->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus) 
            	->count();

        }else if($role == 2){
            $ex_prodi = explode(',', Auth::user()->prodi_id);
            $total_mhs = DB::table('tb_mahasiswa')
                ->whereIn('kode_prodi_id', $ex_prodi)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
        }else if($role == 3){
            $total_mhs = DB::table('tb_mahasiswa')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();
            $total_sdh_mengisi = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
            	->whereNotNull('tb_mahasiswa.nik')
                ->whereYear('tahun_lulus', $tahun_lulus)
            	->count();

        }

        $belum_mengisi = $total_mhs -  $total_sdh_mengisi;
        $data['sudah_mengisi'] = [];
        $data['belum_mengisi'] = [];
        $hsl = $total_mhs -  $total_sdh_mengisi;

        array_push($data['sudah_mengisi'], $total_sdh_mengisi);
        array_push($data['belum_mengisi'], $hsl);

        return $data;
    }
    public function graph_record($tahun_lulus=null){

            $role = Auth::user()->role_id;
            $month = date('m');
            $year = date('Y');
            //var_dump($tahun_lulus);
            $ex_prodi = explode(',', Auth::user()->prodi_id);
            if($role == 1){
                $input_hari_ini = DB::table('tb_mahasiswa')
                    ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_mingguan = DB::table('tb_mahasiswa')
                    ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_bulanan = DB::table('tb_mahasiswa')
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                    ->whereYear('tb_mahasiswa.updated_at','=', $year)
                    ->whereYear('tahun_lulus', $tahun_lulus)    
                    ->count();
            }else if($role==2){
                $input_hari_ini = DB::table('tb_mahasiswa')
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                    ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_mingguan = DB::table('tb_mahasiswa')
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                    ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_bulanan = DB::table('tb_mahasiswa')
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                    ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                    ->whereYear('tb_mahasiswa.updated_at','=', $year)
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();

            }else if($role==3){
                $input_hari_ini = DB::table('tb_mahasiswa')
                    //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->where('kode_prodi_id', Auth::user()->prodi_id)
                    ->whereDate('tb_mahasiswa.updated_at', Carbon::today())
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_mingguan = DB::table('tb_mahasiswa')
                // ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->where('kode_prodi_id', Auth::user()->prodi_id)
                    ->where('tb_mahasiswa.updated_at','>=',Carbon::now()->subdays(7))
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
                $input_bulanan = DB::table('tb_mahasiswa')
                // ->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                    ->where('kode_prodi_id', Auth::user()->prodi_id)
                    ->whereMonth('tb_mahasiswa.updated_at','=', $month)
                    ->whereYear('tb_mahasiswa.updated_at','=', $year)
                    ->whereYear('tahun_lulus', $tahun_lulus)
                    ->count();
            }
            // dd($query);
            //  var_dump($query);
            $data['input_hari_ini'] = [];
            $data['input_mingguan'] =[];
            $data['input_bulanan'] =[];

            array_push($data['input_hari_ini'], $input_hari_ini);
            array_push($data['input_mingguan'], $input_mingguan);
            array_push($data['input_bulanan'], $input_bulanan);

                // return json_encode($data);
            echo json_encode($data);


        }
    }
