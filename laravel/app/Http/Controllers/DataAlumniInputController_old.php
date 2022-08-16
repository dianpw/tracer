<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataAlumniInputController extends Controller
{
    public function index(){                    
		$show_tahun= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');

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
        return view('alumni_sudah_input.index',compact('auth_user', 'show_tahun'));
    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;
            $role = Auth::user()->role_id;
            if($role == 1){
                $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
                ->get();
            }else if($role == 2){
                $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->get();
            }else if($role == 3){
                $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->get();
            }
            // dd($query);

            foreach ($query as $user) {
                $action_edit = '<center>
                <a href="#" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon"
                data-toggle="modal"
                data-id= "'. $user->id.'"
                data-target="#modal-edit" id="btn_update_surat">
                <span>
                    <i class="la la-edit"></i>
                    <span>Ubah</span>
                </span>
                </a>';
                
            
                $roless = "";
                $update = date('d-m-Y, H:i', strtotime($user->created_at));
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($user->npm);
                $data[] = ($user->nama . ' (' .$user->jk.')</br>NIK: ' . $user->nik . '</br>NPWP: ' . $user->npwp);
                $data[] = $user->prodi == null ? '-' : '<b>'.$user->jenjang . ' - ' . $user->prodi.'</b>';
                $data[] = ($user->tahun_lulus);
            	$data[] = ('Telp: ' . $user->no_hp. '</br>email: ' . $user->email);
            	$data[] = ($user->alamat);
                $data[] = $update;
               // $data[] = $action_edit;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

public function exportExcel(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 5;
        $no=1;
        $query = '';
        if(Auth::user()->role_id == 1){
            //select 'id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at' from 'tb_mahasiswa' left join 'tm_kode_prodi' on 'tb_mahasiswa'.'kode_prodi_id' = 'tm_kode_prodi'.'kode' where 'tb_mahasiswa'.'nik' is not null
           $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
                ->get();
        }else if(Auth::user()->role_id == 2){
        $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
        		->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->get();
        }
        else{
        $query = DB::table('tb_mahasiswa')
                //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.nik')
                ->select('id', 'npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.created_at')
        		->where('kode_prodi_id', Auth::user()->prodi_id)
                ->get();
        }

        // dd($query);
        
        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Alumni Sudah Input Tracer');
        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'GENDER');
        $sheet->setCellValue('E3', 'PRODI');
        $sheet->setCellValue('F3', 'TAHUN MASUK');
        $sheet->setCellValue('G3', 'TAHUN LULUS');
        $sheet->setCellValue('H3', 'NIK');
        $sheet->setCellValue('I3', 'NPWP');
        $sheet->setCellValue('J3', 'NO HP');
        $sheet->setCellValue('K3', 'EMAIL');
        $sheet->setCellValue('L3', 'ALAMAT');


        //filte
        $sheet->setAutoFilter('A1:G1');
        //color cell
            //warna nomer

            //warna depart

        //freeze pane

        $sheet->freezePaneByColumnAndRow(1,'D1');
        $sheet->freezePane('D5');

        //merge cells
        $sheet->mergeCells("B2:L2");
        $sheet->mergeCells("A3:A4");
        $sheet->mergeCells("B3:B4");
        $sheet->mergeCells("C3:C4");
        $sheet->mergeCells("D3:D4");
        $sheet->mergeCells("E3:E4");
        $sheet->mergeCells("F3:F4");
		$sheet->mergeCells("G3:G4");
		$sheet->mergeCells("H3:H4");
		$sheet->mergeCells("I3:I4");
		$sheet->mergeCells("J3:J4");
		$sheet->mergeCells("K3:K4");
		$sheet->mergeCells("L3:L4");


        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(39);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(34);
        $sheet->getColumnDimension('G')->setWidth(35);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(35);
        $sheet->getColumnDimension('K')->setWidth(35);
        $sheet->getColumnDimension('L')->setWidth(50);


        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
             ],
             'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $styleHeader = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
             ],
             'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],

        ];
        $styletitle = [
            'font' => [
                'name' => 'Century Gothic',
                'size' => 14,
                'bold' => true,
                'color' => ['argb' => '000000'],
            ],
        ];
        $styleheader = [
            'font' => [
                'size' => 11,
                'bold' => true,
                'color' => ['argb' => '000000'],
            ],
        ];
        $count = count($query);
		// dd($count);
        $sheet->getStyle('A5:L'.$count)->applyFromArray($styleArray);
        $sheet->getStyle('A3:L4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:L2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:L3')->applyFromArray($styleheader);
        
        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jk);
            $sheet->setCellValue('E'.$i, $value->jenjang . ' - ' . $value->prodi);
            $sheet->setCellValue('F'.$i, $value->tahun_masuk);
        	$sheet->setCellValue('G'.$i, $value->tahun_lulus);
        	$sheet->setCellValue('H'.$i, $value->nik);
        	$sheet->setCellValue('I'.$i, $value->npwp);
        	$sheet->setCellValue('J'.$i, $value->no_hp);
        	$sheet->setCellValue('K'.$i, $value->email);
        	$sheet->setCellValue('L'.$i, $value->alamat);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Alumni Input Tracer Study - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }

    public function simpan(Request $request){

        DB::table('users')->insert([
                            'name'          => $request->name,
                            'username'      => $request->username,
                            'email'         => $request->email,
                            'prodi_id'      => $request->prodi_id,
                            'password'      => bcrypt($request->password),
                            'role_id'       => 2

                ]);
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
           DB::table('users')->where('id', '=', $request->id)->delete();

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
