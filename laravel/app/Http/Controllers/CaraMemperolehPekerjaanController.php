<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CaraMemperolehPekerjaanController extends Controller
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
        return view('cara_memperoleh_pekerjaan.index', compact('auth_user', 'show_tahun', 'tahun_terakhir'));
    }
    public function graph($tahun=null){
        $prodi_id = '';
        if(Auth::user()->role_id == 1){
           $prodi_id = ' and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 2){
            $prodi_id = ' and mhs_fakultas_id= "'.Auth::user()->fakultas_user_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }else if(Auth::user()->role_id == 3){
            $prodi_id = ' and kode_prodi_id = "'.Auth::user()->prodi_id.'" and tb_mahasiswa.npm is not null and YEAR(tahun_lulus) = "'.$tahun.'"';
        }
        $query_melalui_iklan = DB::select('SELECT  melalui_iklan,
        COUNT(melalui_iklan) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where melalui_iklan = 1'. $prodi_id);
        //melamar_keperusahaan
        $query_melamar_keperusahaan = DB::select('SELECT  melamar_keperusahaan,
        COUNT(melamar_keperusahaan) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where melamar_keperusahaan = 1'. $prodi_id);

        //pergi kebursa
        $query_pergi_kebursa = DB::select('SELECT  pergi_kebursa,
        COUNT(pergi_kebursa) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where pergi_kebursa = 1'. $prodi_id);

        //mencari_lewat_internet
        $query_mencari_lewat_internet = DB::select('SELECT  mencari_lewat_internet,
        COUNT(mencari_lewat_internet) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where mencari_lewat_internet = 1'. $prodi_id);

        //dihubungi_oleh_perusahaan
        $query_dihubungi_oleh_perusahaan = DB::select('SELECT  dihubungi_oleh_perusahaan,
        COUNT(dihubungi_oleh_perusahaan) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where dihubungi_oleh_perusahaan = 1'. $prodi_id);

        //menghubungi_kemenakertrans
        $query_menghubungi_kemenakertrans = DB::select('SELECT  menghubungi_kemenakertrans,
        COUNT(menghubungi_kemenakertrans) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where menghubungi_kemenakertrans = 1'. $prodi_id);

        //menghubungi_agen_tenaga_kerja
        $query_menghubungi_agen_tenaga_kerja = DB::select('SELECT  menghubungi_agen_tenaga_kerja,
        COUNT(menghubungi_agen_tenaga_kerja) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where menghubungi_agen_tenaga_kerja = 1'. $prodi_id);

        //memeroleh_informasi_dari_pusat 
        $query_memeroleh_informasi_dari_pusat = DB::select('SELECT  memeroleh_informasi_dari_pusat,
        COUNT(memeroleh_informasi_dari_pusat) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where memeroleh_informasi_dari_pusat = 1'. $prodi_id);

         //menghubungi_kantor_kemahasiswaan
         $query_menghubungi_kantor_kemahasiswaan = DB::select('SELECT  menghubungi_kantor_kemahasiswaan,
         COUNT(menghubungi_kantor_kemahasiswaan) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where menghubungi_kantor_kemahasiswaan = 1'. $prodi_id);

        //membangun_jejaring
        $query_membangun_jejaring = DB::select('SELECT  membangun_jejaring,
        COUNT(membangun_jejaring) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where membangun_jejaring = 1'. $prodi_id);

        //melalui_relasi
        $query_melalui_relasi = DB::select('SELECT  melalui_relasi,
        COUNT(melalui_relasi) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where melalui_relasi = 1'. $prodi_id);

        //membangun_bisnis_sendiri
        $query_membangun_bisnis_sendiri = DB::select('SELECT  membangun_bisnis_sendiri,
        COUNT(membangun_bisnis_sendiri) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where membangun_bisnis_sendiri = 1'. $prodi_id);

        //melalui_penempatan_kerja_magang
        $query_melalui_penempatan_kerja_magang = DB::select('SELECT  melalui_penempatan_kerja_magang,
        COUNT(melalui_penempatan_kerja_magang) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where melalui_penempatan_kerja_magang = 1'. $prodi_id);

        //bekerja_ditempat_yang_sama
        $query_bekerja_ditempat_yang_sama = DB::select('SELECT  bekerja_ditempat_yang_sama,
        COUNT(bekerja_ditempat_yang_sama) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where bekerja_ditempat_yang_sama = 1'. $prodi_id);

        //lainnya
        $query_lainnya = DB::select('SELECT  lainnya,
        COUNT(lainnya) AS jumlah  FROM `tb_cara_memperoleh_pekerjaan`
        JOIN tb_mahasiswa ON tb_cara_memperoleh_pekerjaan.npm = tb_mahasiswa.npm
        where lainnya = 1'. $prodi_id);

        //   dd($query);
        $data['melalui_iklan'] =[];
        $data['melamar_keperusahaan'] =[];
        $data['pergi_kebursa'] =[];
        $data['mencari_lewat_internet'] =[];
        $data['dihubungi_oleh_perusahaan'] =[];
        $data['menghubungi_kemenakertrans'] =[];
        $data['menghubungi_agen_tenaga_kerja'] =[];
        $data['memeroleh_informasi_dari_pusat'] =[];
        $data['menghubungi_kantor_kemahasiswaan'] =[];
        $data['membangun_jejaring'] =[];
        $data['melalui_relasi'] =[];
        $data['membangun_bisnis_sendiri'] =[];
        $data['melalui_penempatan_kerja_magang'] =[];
        $data['bekerja_ditempat_yang_sama'] =[];
        $data['lainnya'] =[];


        foreach ($query_melalui_iklan as $key => $value) {
            array_push($data['melalui_iklan'], (int)$value->jumlah);
        }
        foreach ($query_melamar_keperusahaan as $key => $value) {
            array_push($data['melamar_keperusahaan'], (int)$value->jumlah);
        }
        foreach ($query_pergi_kebursa as $key => $value) {
            array_push($data['pergi_kebursa'], (int)$value->jumlah);
        }
        foreach ($query_mencari_lewat_internet as $key => $value) {
            array_push($data['mencari_lewat_internet'], (int)$value->jumlah);
        }
        foreach ($query_dihubungi_oleh_perusahaan as $key => $value) {
            array_push($data['dihubungi_oleh_perusahaan'], (int)$value->jumlah);
        }
        foreach ($query_menghubungi_kemenakertrans as $key => $value) {
            array_push($data['menghubungi_kemenakertrans'], (int)$value->jumlah);
        }
        foreach ($query_menghubungi_agen_tenaga_kerja as $key => $value) {
            array_push($data['menghubungi_agen_tenaga_kerja'], (int)$value->jumlah);
        }
        foreach ($query_memeroleh_informasi_dari_pusat as $key => $value) {
            array_push($data['memeroleh_informasi_dari_pusat'], (int)$value->jumlah);
        }
        foreach ($query_menghubungi_kantor_kemahasiswaan as $key => $value) {
            array_push($data['menghubungi_kantor_kemahasiswaan'], (int)$value->jumlah);
        }
        foreach ($query_membangun_jejaring as $key => $value) {
            array_push($data['membangun_jejaring'], (int)$value->jumlah);
        }
        foreach ($query_melalui_relasi as $key => $value) {
            array_push($data['melalui_relasi'], (int)$value->jumlah);
        }
        foreach ($query_membangun_bisnis_sendiri as $key => $value) {
            array_push($data['membangun_bisnis_sendiri'], (int)$value->jumlah);
        }
        foreach ($query_melalui_penempatan_kerja_magang as $key => $value) {
            array_push($data['melalui_penempatan_kerja_magang'], (int)$value->jumlah);
        }
        foreach ($query_bekerja_ditempat_yang_sama as $key => $value) {
            array_push($data['bekerja_ditempat_yang_sama'], (int)$value->jumlah);
        }
        foreach ($query_lainnya as $key => $value) {
            array_push($data['lainnya'], (int)$value->jumlah);
        }
        // dd($data);
        echo json_encode($data);

    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_cara_memperoleh_pekerjaan')
                ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_cara_memperoleh_pekerjaan')
                ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_cara_memperoleh_pekerjaan')
                ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
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
                $data[] = $user->melalui_iklan == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->melamar_keperusahaan == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->pergi_kebursa == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->mencari_lewat_internet == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->dihubungi_oleh_perusahaan == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->menghubungi_kemenakertrans == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->menghubungi_agen_tenaga_kerja == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->memeroleh_informasi_dari_pusat == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->menghubungi_kantor_kemahasiswaan == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->membangun_jejaring == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->melalui_relasi == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->membangun_bisnis_sendiri == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->melalui_penempatan_kerja_magang == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->bekerja_ditempat_yang_sama == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->lainnya == 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $update== 1 ? '<center><i class="la la-check"></i></center>' : '';
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
            $query = DB::table('tb_cara_memperoleh_pekerjaan')
            ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_cara_memperoleh_pekerjaan')
            ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_cara_memperoleh_pekerjaan')
            ->Leftjoin('tb_mahasiswa', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - Cara Memperoleh Pekerjaan');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'melalui iklan');
        $sheet->setCellValue('G3', 'melamar keperusahaan');
        $sheet->setCellValue('H3', 'pergi kebursa');
        $sheet->setCellValue('I3', 'mencari lewat internet');
        $sheet->setCellValue('J3', 'dihubungi oleh perusahaan');
        $sheet->setCellValue('K3', 'menghubungi kemenakertrans');
        $sheet->setCellValue('L3', 'menghubungi agen tenaga kerja');
        $sheet->setCellValue('M3', 'memeroleh informasi dari pusat');
        $sheet->setCellValue('N3', 'menghubungi kantor kemahasiswaan');
        $sheet->setCellValue('O3', 'membangun jejaring');
        $sheet->setCellValue('P3', 'melalui relasi');
        $sheet->setCellValue('Q3', 'membangun bisnis sendiri');
        $sheet->setCellValue('R3', 'melalui penempatan kerja magang');
        $sheet->setCellValue('S3', 'bekerja ditempat yang sama');
        $sheet->setCellValue('T3', 'lainnya');


        //filte
        $sheet->setAutoFilter('A1:E1');
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
        $sheet->mergeCells("L3:L4");
        $sheet->mergeCells("M3:M4");
        $sheet->mergeCells("N3:N4");
        $sheet->mergeCells("O3:O4");
        $sheet->mergeCells("P3:P4");
        $sheet->mergeCells("Q3:Q4");
        $sheet->mergeCells("R3:R4");
        $sheet->mergeCells("S3:S4");
        $sheet->mergeCells("T3:T4");


        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(16);
        $sheet->getColumnDimension('G')->setWidth(16);
        $sheet->getColumnDimension('H')->setWidth(16);
        $sheet->getColumnDimension('I')->setWidth(16);
        $sheet->getColumnDimension('J')->setWidth(16);
        $sheet->getColumnDimension('K')->setWidth(16);
        $sheet->getColumnDimension('L')->setWidth(16);
        $sheet->getColumnDimension('M')->setWidth(16);
        $sheet->getColumnDimension('N')->setWidth(16);
        $sheet->getColumnDimension('O')->setWidth(16);
        $sheet->getColumnDimension('P')->setWidth(16);
        $sheet->getColumnDimension('Q')->setWidth(16);
        $sheet->getColumnDimension('R')->setWidth(16);
        $sheet->getColumnDimension('S')->setWidth(16);
        $sheet->getColumnDimension('T')->setWidth(16);




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
        $sheet->getStyle('A5:T50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:T4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:T3')->applyFromArray($styleheader);

        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
             $sheet->setCellValue('F'.$i,$value->melalui_iklan == 1 ? 'YA' : '');
             $sheet->setCellValue('G'.$i,$value->melamar_keperusahaan == 1 ? 'YA' : '');
             $sheet->setCellValue('H'.$i,$value->pergi_kebursa == 1 ? 'YA' : '');
             $sheet->setCellValue('I'.$i,$value->mencari_lewat_internet == 1 ? 'YA' : '');
             $sheet->setCellValue('J'.$i,$value->dihubungi_oleh_perusahaan == 1 ? 'YA' : '');
             $sheet->setCellValue('K'.$i,$value->menghubungi_kemenakertrans == 1 ? 'YA' : '');
             $sheet->setCellValue('L'.$i,$value->menghubungi_agen_tenaga_kerja == 1 ? 'YA' : '');
             $sheet->setCellValue('M'.$i,$value->memeroleh_informasi_dari_pusat == 1 ? 'YA' : '');
             $sheet->setCellValue('N'.$i,$value->menghubungi_kantor_kemahasiswaan == 1 ? 'YA' : '');
             $sheet->setCellValue('O'.$i,$value->membangun_jejaring == 1 ? 'YA' : '');
             $sheet->setCellValue('P'.$i,$value->melalui_relasi == 1 ? 'YA' : '');
             $sheet->setCellValue('Q'.$i,$value->membangun_bisnis_sendiri == 1 ? 'YA' : '');
             $sheet->setCellValue('R'.$i,$value->melalui_penempatan_kerja_magang == 1 ? 'YA' : '');
             $sheet->setCellValue('S'.$i,$value->bekerja_ditempat_yang_sama == 1 ? 'YA' : '');
             $sheet->setCellValue('T'.$i,$value->lainnya == 1 ? 'YA' : '');


            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Cara Memperoleh Pekerjaan - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
