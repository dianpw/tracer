<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KeselarasanHorizontalController extends Controller
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
        $show_tahun= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');
        $tahun_terakhir = DB::select('SELECT MAX(YEAR(tahun_lulus)) AS tahun_lulus FROM tb_mahasiswa');
        return view('keselarasan_horizontal.index', compact('auth_user','show_tahun', 'tahun_terakhir'));
    }
    public function graph($tahun=null){
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' and mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' and kode_prodi_id = "'.Auth::user()->prodi_id.'" and YEAR(tahun_lulus) = "'.$tahun.'"';
        }
        $query_sangat_erat = DB::select('SELECT  sangat_erat,
        COUNT(sangat_erat) AS jumlah  FROM `tb_keselarasan_horizontal`
        JOIN tb_mahasiswa ON tb_keselarasan_horizontal.npm = tb_mahasiswa.npm
        where sangat_erat = 1 '. $prodi_id);

        $query_erat = DB::select('SELECT  erat,
        COUNT(erat) AS jumlah  FROM `tb_keselarasan_horizontal`
        JOIN tb_mahasiswa ON tb_keselarasan_horizontal.npm = tb_mahasiswa.npm
        where erat = 1 '. $prodi_id);

        $query_cukup_erat = DB::select('SELECT  cukup_erat,
        COUNT(cukup_erat) AS jumlah  FROM `tb_keselarasan_horizontal`
        JOIN tb_mahasiswa ON tb_keselarasan_horizontal.npm = tb_mahasiswa.npm
        where cukup_erat = 1 '. $prodi_id);

        $query_kurang_erat = DB::select('SELECT  kurang_erat,
        COUNT(kurang_erat) AS jumlah  FROM `tb_keselarasan_horizontal`
        JOIN tb_mahasiswa ON tb_keselarasan_horizontal.npm = tb_mahasiswa.npm
        where kurang_erat = 1 '. $prodi_id);

        $query_tidak_sama_sekali = DB::select('SELECT  tidak_sama_sekali,
        COUNT(tidak_sama_sekali) AS jumlah  FROM `tb_keselarasan_horizontal`
        JOIN tb_mahasiswa ON tb_keselarasan_horizontal.npm = tb_mahasiswa.npm
        where tidak_sama_sekali = 1 '. $prodi_id);


        $data['sangat_erat'] =[];
        $data['erat'] =[];
        $data['cukup_erat'] =[];
        $data['kurang_erat'] =[];
        $data['tidak_sama_sekali'] =[];

        foreach ($query_sangat_erat as $key => $value) {
            array_push($data['sangat_erat'], (int)$value->jumlah);
        }
        foreach ($query_erat as $key => $value) {
            array_push($data['erat'], (int)$value->jumlah);
        }
        foreach ($query_cukup_erat as $key => $value) {
            array_push($data['cukup_erat'], (int)$value->jumlah);
        }
        foreach ($query_kurang_erat as $key => $value) {
            array_push($data['kurang_erat'], (int)$value->jumlah);
        }
        foreach ($query_tidak_sama_sekali as $key => $value) {
            array_push($data['tidak_sama_sekali'], (int)$value->jumlah);
        }

        // dd($data);
        echo json_encode($data);

    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_keselarasan_horizontal')
                ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_keselarasan_horizontal')
                ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_keselarasan_horizontal')
                ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
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

                $update = $user->created_at;
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($user->npm);
                $data[] = ($user->nama);
                $data[] = ($user->jenjang . ' - ' .$user->prodi);
                $data[] = ($user->tahun_lulus);
                $data[] = $user->sangat_erat== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->erat== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->cukup_erat== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->kurang_erat== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->tidak_sama_sekali== 1 ? '<center><i class="la la-check"></i></center>' : '';


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
            $query = DB::table('tb_keselarasan_horizontal')
            ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_keselarasan_horizontal')
            ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_keselarasan_horizontal')
            ->Leftjoin('tb_mahasiswa', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KESELARASAN HORIZONTAL');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'Sangat erat');
        $sheet->setCellValue('G3', 'Erat');
        $sheet->setCellValue('H3', 'Cukup Erat');
        $sheet->setCellValue('I3', 'Kurang Erat');
        $sheet->setCellValue('J3', 'Tidak sama sekali');


        //filte
        $sheet->setAutoFilter('A1:J1');
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
        $sheet->mergeCells("G3:G4");
        $sheet->mergeCells("H3:H4");
        $sheet->mergeCells("I3:I4");
        $sheet->mergeCells("J3:J4");


        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);



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
        $sheet->getStyle('A5:J50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:J4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:J3')->applyFromArray($styleheader);



        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $value->sangat_erat== 1 ? 'YA' : '');
            $sheet->setCellValue('G'.$i, $value->erat== 1 ? 'YA' : '');
            $sheet->setCellValue('H'.$i, $value->cukup_erat== 1 ? 'YA' : '');
            $sheet->setCellValue('I'.$i, $value->kurang_erat== 1 ? 'YA' : '');
            $sheet->setCellValue('J'.$i, $value->tidak_sama_sekali== 1 ? 'YA' : '');

            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Keselarasan Horizontal - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
