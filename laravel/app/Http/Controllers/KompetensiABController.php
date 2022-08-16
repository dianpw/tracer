<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KompetensiABController extends Controller{
    public function index(){
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
        return view('KompetensiAB.index', compact('auth_user', 'show_tahun', 'tahun_terakhir'));
    }

    public function show_data_kompetensi_a(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_kompetensia')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_kompetensia')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_kompetensia')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
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
                $data[] = $user->etika;
                $data[] = $user->keahlian;
                $data[] = $user->penggunaan_ti;
                $data[] = $user->bahasa_inggris;
                $data[] = $user->komunikasi;
                $data[] = $user->kerjasama;
                $data[] = $user->pengembangan_diri;

                $data[] = $update;
                // $data[] = $action_edit;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function show_data_kompetensi_b(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_kompetensib')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_kompetensib')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_kompetensib')
                ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
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
                $data[] = $user->etika;
                $data[] = $user->keahlian;
                $data[] = $user->penggunaan_ti;
                $data[] = $user->bahasa_inggris;
                $data[] = $user->komunikasi;
                $data[] = $user->kerjasama;
                $data[] = $user->pengembangan_diri;
                
                $data[] = $update;
                // $data[] = $action_edit;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function graph($tahun=null){
    
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' where tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' where mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' where kode_prodi_id = "'.Auth::user()->prodi_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }

        $query_etika = DB::select('SELECT *, SUM(etika) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['etika'] = [];
        foreach ($query_etika as $key => $value) {
        array_push($data['etika'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_keahlian = DB::select('SELECT *, SUM(keahlian) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['keahlian'] = [];
        foreach ($query_keahlian as $key => $value) {
        array_push($data['keahlian'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_penggunaan_ti = DB::select('SELECT *, SUM(penggunaan_ti) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['penggunaan_ti'] = [];
        foreach ($query_penggunaan_ti as $key => $value) {
        array_push($data['penggunaan_ti'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_bahasa_inggris = DB::select('SELECT *, SUM(bahasa_inggris) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['bahasa_inggris'] = [];
        foreach ($query_bahasa_inggris as $key => $value) {
        array_push($data['bahasa_inggris'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_komunikasi = DB::select('SELECT *, SUM(komunikasi) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['komunikasi'] = [];
        foreach ($query_komunikasi as $key => $value) {
        array_push($data['komunikasi'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_kerjasama = DB::select('SELECT *, SUM(kerjasama) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['kerjasama'] = [];
        foreach ($query_kerjasama as $key => $value) {
        array_push($data['kerjasama'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_pengembangan_diri = DB::select('SELECT *, SUM(pengembangan_diri) as jumlah  FROM `tb_kompetensia`
        LEFT JOIN tb_mahasiswa ON tb_kompetensia.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['pengembangan_diri'] = [];
        foreach ($query_pengembangan_diri as $key => $value) {
        array_push($data['pengembangan_diri'], (int)$value->jumlah);
        }

        $data['push_kategori_a'] =  [];
        array_push(
            $data['push_kategori_a'],
            $data['etika'],
            $data['keahlian'],
            $data['penggunaan_ti'],
            $data['bahasa_inggris'],
            $data['komunikasi'],
            $data['kerjasama'],
            $data['pengembangan_diri']
        );

        //------------------------KOMPETENSI B----------------------------------

        $query_b_etika = DB::select('SELECT *, SUM(etika) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['etika_b'] = [];
        foreach ($query_b_etika as $key => $value) {
        array_push($data['etika_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_keahlian = DB::select('SELECT *, SUM(keahlian) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['keahlian_b'] = [];
        foreach ($query_b_keahlian as $key => $value) {
        array_push($data['keahlian_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_penggunaan_ti = DB::select('SELECT *, SUM(penggunaan_ti) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['penggunaan_ti_b'] = [];
        foreach ($query_b_penggunaan_ti as $key => $value) {
        array_push($data['penggunaan_ti_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_bahasa_inggris = DB::select('SELECT *, SUM(bahasa_inggris) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['bahasa_inggris_b'] = [];
        foreach ($query_b_bahasa_inggris as $key => $value) {
        array_push($data['bahasa_inggris_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_komunikasi = DB::select('SELECT *, SUM(komunikasi) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['komunikasi_b'] = [];
        foreach ($query_b_komunikasi as $key => $value) {
        array_push($data['komunikasi_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_kerjasama= DB::select('SELECT *, SUM(kerjasama) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['kerjasama_b'] = [];
        foreach ($query_b_kerjasama as $key => $value) {
        array_push($data['kerjasama_b'], (int)$value->jumlah);
        }

        //-------------------------------------------------
        $query_b_pengembangan_diri = DB::select('SELECT *, SUM(pengembangan_diri) as jumlah  FROM `tb_kompetensib`
        LEFT JOIN tb_mahasiswa ON tb_kompetensib.npm = tb_mahasiswa.npm
        '.$prodi_id
        );
        $data['pengembangan_diri_b'] = [];
        foreach ($query_b_pengembangan_diri as $key => $value) {
        array_push($data['pengembangan_diri_b'], (int)$value->jumlah);
        }

        $data['push_kategori_b'] =  [];
        array_push(
            $data['push_kategori_b'],
            $data['etika_b'],
            $data['keahlian_b'],
            $data['penggunaan_ti_b'],
            $data['bahasa_inggris_b'],
            $data['komunikasi_b'],
            $data['kerjasama_b'],
            $data['pengembangan_diri_b']                                
        );
        // dd($data);
        return $data;
    }

    public function exportExcel_a(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 5;
        $no=1;
        $query = '';


        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_kompetensia')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_kompetensia')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_kompetensia')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KOMPETENSI A');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'ETIKA');
        $sheet->setCellValue('G3', 'KEAHLIAN');
        $sheet->setCellValue('H3', 'PENGGUNAAN TI');
        $sheet->setCellValue('I3', 'BAHASA INGGRIS');
        $sheet->setCellValue('J3', 'KOMUNIKASI');
        $sheet->setCellValue('K3', 'KERJASAMA');
        $sheet->setCellValue('L3', 'PENGEMBANGAN DIRI');
        //filte
        $sheet->setAutoFilter('A1:D1');
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
        $sheet->mergeCells('K3:K4');
        $sheet->mergeCells('L3:L4');


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
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);



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
        $sheet->getStyle('A5:L50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:L4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:L3')->applyFromArray($styleheader);

        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $value->etika);
            $sheet->setCellValue('G'.$i, $value->keahlian);
            $sheet->setCellValue('H'.$i, $value->penggunaan_ti);
            $sheet->setCellValue('I'.$i, $value->bahasa_inggris);
            $sheet->setCellValue('J'.$i, $value->komunikasi);
            $sheet->setCellValue('K'.$i, $value->kerjasama);
            $sheet->setCellValue('L'.$i, $value->pengembangan_diri); 
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Kompetensi A - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
    }

    public function exportExcel_b(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 5;
        $no=1;
        $query = '';


        if(Auth::user()->role_id == 1){
            $query = DB::table('tb_kompetensib')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_kompetensib')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_kompetensib')
            ->Leftjoin('tb_mahasiswa', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - KOMPETENSI B');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'ETIKA');
        $sheet->setCellValue('G3', 'KEAHLIAN');
        $sheet->setCellValue('H3', 'PENGGUNAAN TI');
        $sheet->setCellValue('I3', 'BAHASA INGGRIS');
        $sheet->setCellValue('J3', 'KOMUNIKASI');
        $sheet->setCellValue('K3', 'KERJASAMA');
        $sheet->setCellValue('L3', 'PENGEMBANGAN DIRI');
                    //filte
        $sheet->setAutoFilter('A1:D1');
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
        $sheet->mergeCells('K3:K4');
        $sheet->mergeCells('L3:L4');

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
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);

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
        $sheet->getStyle('A5:L50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:L4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:L3')->applyFromArray($styleheader);



        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $value->etika);
            $sheet->setCellValue('G'.$i, $value->keahlian);
            $sheet->setCellValue('H'.$i, $value->penggunaan_ti);
            $sheet->setCellValue('I'.$i, $value->bahasa_inggris);
            $sheet->setCellValue('J'.$i, $value->komunikasi);
            $sheet->setCellValue('K'.$i, $value->kerjasama);
            $sheet->setCellValue('L'.$i, $value->pengembangan_diri);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Kompetensi B - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
    }

}
