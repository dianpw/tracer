<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class JenisTempatBekerjaSaatIniController extends Controller
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
        return view('jenis_tempat_kerja_saat_ini.index', compact('auth_user','show_tahun', 'tahun_terakhir'));
    }
    public function graph($tahun=null){
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' where YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' where mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' where kode_prodi_id = "'.Auth::user()->prodi_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }
        //wirausaha ijin/tidak berijin
        $query_wirausaha_ijin = DB::select('SELECT wirausaha_ijin
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_wirausaha_ijin);
        $data['wirausaha_ijin'] =[];

        foreach ($query_wirausaha_ijin as $key => $value) {
            array_push($data['wirausaha_ijin'], $value->wirausaha_ijin);

        }
        $data['count_wirausaha_ijin'] = [];
        $im_wirausaha_ijin = implode(',', $data['wirausaha_ijin']);
        $ex_wirausaha_ijin = explode(',', $im_wirausaha_ijin);
        array_push($data['count_wirausaha_ijin'], array_count_values($ex_wirausaha_ijin));

        //-------------------------Wirausaha Lokal/Nasional/Internasional------------------------

        $query_wirausaha_lokal = DB::select('SELECT wirausaha_lokal
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_wirausaha_lokal);
        $data['wirausaha_lokal'] =[];

        foreach ($query_wirausaha_lokal as $key => $value) {
            array_push($data['wirausaha_lokal'], $value->wirausaha_lokal);

        }
        $data['count_wirausaha_lokal'] = [];
        $im_wirausaha_lokal = implode(',', $data['wirausaha_lokal']);
        $ex_wirausaha_lokal = explode(',', $im_wirausaha_lokal);
        array_push($data['count_wirausaha_lokal'], array_count_values($ex_wirausaha_lokal));

        //-------------------------perusahaan_swasta_ijin------------------------

        $query_perusahaan_swasta_ijin = DB::select('SELECT perusahaan_swasta_ijin
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_perusahaan_swasta_ijin);
        $data['perusahaan_swasta_ijin'] =[];

        foreach ($query_perusahaan_swasta_ijin as $key => $value) {
            array_push($data['perusahaan_swasta_ijin'], $value->perusahaan_swasta_ijin);

        }
        $data['count_perusahaan_swasta_ijin'] = [];
        $im_perusahaan_swasta_ijin = implode(',', $data['perusahaan_swasta_ijin']);
        $ex_perusahaan_swasta_ijin = explode(',', $im_perusahaan_swasta_ijin);
        array_push($data['count_perusahaan_swasta_ijin'], array_count_values($ex_perusahaan_swasta_ijin));

        //-------------------------perusahaan_lokal------------------------

        $query_perusahaan_lokal = DB::select('SELECT perusahaan_lokal
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_perusahaan_lokal);
        $data['perusahaan_lokal'] =[];

        foreach ($query_perusahaan_lokal as $key => $value) {
            array_push($data['perusahaan_lokal'], $value->perusahaan_lokal);

        }
        $data['count_perusahaan_lokal'] = [];
        $im_perusahaan_lokal = implode(',', $data['perusahaan_lokal']);
        $ex_perusahaan_lokal = explode(',', $im_perusahaan_lokal);
        array_push($data['count_perusahaan_lokal'], array_count_values($ex_perusahaan_lokal));

        //-------------------------instansi_pemerintah_bumn------------------------

        $query_instansi_pemerintah_bumn = DB::select('SELECT instansi_pemerintah_bumn
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_instansi_pemerintah_bumn);
        $data['instansi_pemerintah_bumn'] =[];

        foreach ($query_instansi_pemerintah_bumn as $key => $value) {
            array_push($data['instansi_pemerintah_bumn'], $value->instansi_pemerintah_bumn);

        }
        $data['count_instansi_pemerintah_bumn'] = [];
        $im_instansi_pemerintah_bumn = implode(',', $data['instansi_pemerintah_bumn']);
        $ex_instansi_pemerintah_bumn = explode(',', $im_instansi_pemerintah_bumn);
        array_push($data['count_instansi_pemerintah_bumn'], array_count_values($ex_instansi_pemerintah_bumn));

        //-------------------------organisasi_non_profit------------------------

        $query_organisasi_non_profit = DB::select('SELECT organisasi_non_profit
        FROM `tb_jenis_tempat_bekerja_saat_ini`
        JOIN tb_mahasiswa ON tb_jenis_tempat_bekerja_saat_ini.npm = tb_mahasiswa.npm'.$prodi_id);
        // dd($query_organisasi_non_profit);
        $data['organisasi_non_profit'] =[];

        foreach ($query_organisasi_non_profit as $key => $value) {
            array_push($data['organisasi_non_profit'], $value->organisasi_non_profit);

        }
        $data['count_organisasi_non_profit'] = [];
        $im_organisasi_non_profit = implode(',', $data['organisasi_non_profit']);
        $ex_organisasi_non_profit = explode(',', $im_organisasi_non_profit);
        array_push($data['count_organisasi_non_profit'], array_count_values($ex_organisasi_non_profit));

        // dd($data);
        echo json_encode($data);

    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
                ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
                ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
                ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
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
                $data[] = $user->wirausaha_ijin;
                $data[] = $user->wirausaha_lokal;
                $data[] = $user->perusahaan_swasta_ijin;
                $data[] = $user->perusahaan_lokal;
                $data[] = $user->instansi_pemerintah_bumn;
                $data[] = $user->organisasi_non_profit;

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
            $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
            ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
            ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_jenis_tempat_bekerja_saat_ini')
            ->Leftjoin('tb_mahasiswa', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - JENIS TEMPAT KERJA SAAT INI');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'Wirausaha ijin');
        $sheet->setCellValue('G3', 'wirausaha lokal');
        $sheet->setCellValue('H3', 'perusahaan swasta ijin');
        $sheet->setCellValue('I3', 'perusahaan lokal');
        $sheet->setCellValue('J3', 'instansi pemerintah bumn');
        $sheet->setCellValue('K3', 'organisasi non profit');


        //filte
        $sheet->setAutoFilter('A1:G1');
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
        $sheet->mergeCells("K3:K4");



        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(27);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(25);
        $sheet->getColumnDimension('K')->setWidth(25);



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
        $sheet->getStyle('A5:K50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:K4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:K3')->applyFromArray($styleheader);


        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $value->wirausaha_ijin);
            $sheet->setCellValue('G'.$i, $value->wirausaha_lokal);
            $sheet->setCellValue('H'.$i, $value->perusahaan_swasta_ijin);
            $sheet->setCellValue('I'.$i, $value->perusahaan_lokal);
            $sheet->setCellValue('J'.$i, $value->instansi_pemerintah_bumn);
            $sheet->setCellValue('K'.$i, $value->organisasi_non_profit);

            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Jenis tempat kerja saat ini - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
