<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SituasiSaatIni1Controller extends Controller
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
    $show_tahun = DB::table('tb_mahasiswa')
                    ->select('tahun_lulus')
                    ->groupBy('tahun_lulus')
                    ->get();
    $tahun_terakhir = DB::select('SELECT MAX(tahun_lulus) AS tahun_lulus FROM tb_mahasiswa');
    
        return view('situasi_saat_ini_1.index', compact('auth_user', 'show_tahun', 'tahun_terakhir'));
    }
    public function graph($tahun=null){
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' and tb_mahasiswa.npm is not null and tahun_lulus = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' and mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and tb_mahasiswa.npm is not null and tahun_lulus = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' and kode_prodi_id = "'.Auth::user()->prodi_id.'" and tb_mahasiswa.npm is not null and tahun_lulus = "'.$tahun.'"';
        }

        $query_sudah_bekerja = DB::select('SELECT  bekerja_saat_ini,
        COUNT(bekerja_saat_ini) AS jumlah  FROM `tb_situasi_saat_ini_1`
        JOIN tb_mahasiswa ON tb_situasi_saat_ini_1.npm = tb_mahasiswa.npm
        where bekerja_saat_ini = 2 '.$prodi_id);


        $data['sudah_bekerja'] =[];

        foreach ($query_sudah_bekerja as $key => $value) {
            array_push($data['sudah_bekerja'], (int)$value->jumlah);
        }

        $query_tidak_bekerja = DB::select('SELECT  bekerja_saat_ini,
        COUNT(bekerja_saat_ini) AS jumlah  FROM `tb_situasi_saat_ini_1`
        JOIN tb_mahasiswa ON tb_situasi_saat_ini_1.npm = tb_mahasiswa.npm
        where bekerja_saat_ini = 1 '.$prodi_id);


        $data['tidak_bekerja'] =[];

        foreach ($query_tidak_bekerja as $key => $value) {
            array_push($data['tidak_bekerja'], (int)$value->jumlah);
        }

        // dd($data);
        echo json_encode($data);

    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_situasi_saat_ini_1')
                ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_situasi_saat_ini_1')
                ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_situasi_saat_ini_1')
                ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('kode_prodi_id', Auth::user()->prodi_id)
                ->whereNotNull('tb_mahasiswa.npm')
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
                $check = '';
                if($user->bekerja_saat_ini == 2){
                    $check = 'Sudah bekerja';
                }else if($user->bekerja_saat_ini == 1){
                    $check = 'Belum bekerja';
                }else{
                    $check = '-';
                }
                $update = $user->created_at;
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($user->npm);
                $data[] = ($user->nama);
                $data[] = ($user->prodi);
                $data[] = ($user->tahun_lulus);
                $data[] = $check;
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
            $query = DB::table('tb_situasi_saat_ini_1')
            ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_situasi_saat_ini_1')
            ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_situasi_saat_ini_1')
            ->Leftjoin('tb_mahasiswa', 'tb_situasi_saat_ini_1.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }
        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Situasi saat ini I');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'STATUS');


        //filte
        $sheet->setAutoFilter('A1:F1');
        //color cell
            //warna nomer

            //warna depart

        //freeze pane

        $sheet->freezePaneByColumnAndRow(1,'D1');
        $sheet->freezePane('D5');

        //merge cells
        $sheet->mergeCells("B2:I2");
        $sheet->mergeCells("A3:A4");
        $sheet->mergeCells("B3:B4");
        $sheet->mergeCells("C3:C4");
        $sheet->mergeCells("D3:D4");
        $sheet->mergeCells("E3:E4");
        $sheet->mergeCells("F3:F4");


        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(25);


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
        $sheet->getStyle('A5:F50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:F4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:F3')->applyFromArray($styleheader);

        foreach ($query as $key => $value) {
            $check = '';
            if($value->bekerja_saat_ini == 2){
                $check = 'Sudah bekerja';
            }else if($value->bekerja_saat_ini == 1){
                $check = 'Belum bekerja';
            }else{
                $check = '-';
            }
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $check);

            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Situasi saat ini I - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
