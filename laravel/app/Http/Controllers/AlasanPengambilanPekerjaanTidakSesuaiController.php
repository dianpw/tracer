<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AlasanPengambilanPekerjaanTidakSesuaiController extends Controller
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
        return view('pengambilan_pekerjaan_tidak_sesuai.index', compact('auth_user','show_tahun', 'tahun_terakhir'));
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
        $query_pertanyaan_tidak_sesuai_pekerjaan = DB::select('SELECT  pertanyaan_tidak_sesuai_pekerjaan,
        COUNT(pertanyaan_tidak_sesuai_pekerjaan) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where pertanyaan_tidak_sesuai_pekerjaan = 1 '. $prodi_id);

        $query_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai = DB::select('SELECT  Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai,
        COUNT(Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai = 1 '. $prodi_id);

        $query_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik = DB::select('SELECT  di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik,
        COUNT(di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik = 1 '. $prodi_id);

        $query_saya_lebih_suka_bekerja_di_area_pekerjaan = DB::select('SELECT  saya_lebih_suka_bekerja_di_area_pekerjaan,
        COUNT(saya_lebih_suka_bekerja_di_area_pekerjaan) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where saya_lebih_suka_bekerja_di_area_pekerjaan = 1 '. $prodi_id);


        $query_saya_dipromosikan_ke_posisi_yang_kurang = DB::select('SELECT  saya_dipromosikan_ke_posisi_yang_kurang,
        COUNT(saya_dipromosikan_ke_posisi_yang_kurang) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where saya_dipromosikan_ke_posisi_yang_kurang = 1 '. $prodi_id);

        $query_Saya_dapat_memeroleh_pendapatan = DB::select('SELECT  Saya_dapat_memeroleh_pendapatan,
        COUNT(Saya_dapat_memeroleh_pendapatan) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where Saya_dapat_memeroleh_pendapatan = 1 '. $prodi_id);

        $query_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure = DB::select('SELECT  Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure,
                COUNT(Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
                JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
                where Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure = 1 '. $prodi_id);

        $query_Pekerjaan_saya_saat_ini_lebih_menarik = DB::select('SELECT  Pekerjaan_saya_saat_ini_lebih_menarik,
        COUNT(Pekerjaan_saya_saat_ini_lebih_menarik) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where Pekerjaan_saya_saat_ini_lebih_menarik = 1 '. $prodi_id);

        $query_Pekerjaan_saya_saat_ini_lebih_memungkinkan = DB::select('SELECT  Pekerjaan_saya_saat_ini_lebih_memungkinkan,
                COUNT(Pekerjaan_saya_saat_ini_lebih_memungkinkan) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
                JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
                where Pekerjaan_saya_saat_ini_lebih_memungkinkan = 1 '. $prodi_id);

        $query_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat = DB::select('SELECT  Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat,
        COUNT(Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat = 1 '. $prodi_id);

        $query_Pekerjaan_saya_saat_ini_dapat_lebih = DB::select('SELECT  Pekerjaan_saya_saat_ini_dapat_lebih,
                COUNT(Pekerjaan_saya_saat_ini_dapat_lebih) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
                JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
                where Pekerjaan_saya_saat_ini_dapat_lebih = 1 '. $prodi_id);

        $query_Pada_awal_meniti_karir_ini = DB::select('SELECT  Pada_awal_meniti_karir_ini,
        COUNT(Pada_awal_meniti_karir_ini) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
        JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
        where Pada_awal_meniti_karir_ini = 1 '. $prodi_id);

        $query_Lainnya = DB::select('SELECT  Lainnya,
                COUNT(Lainnya) AS jumlah  FROM `tb_pengambilan_pekerjaan_tidak_sesuai`
                JOIN tb_mahasiswa ON tb_pengambilan_pekerjaan_tidak_sesuai.npm = tb_mahasiswa.npm
                where Lainnya = 1 '. $prodi_id);


        $data['pertanyaan_tidak_sesuai_pekerjaan'] =[];
        $data['Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai'] =[];
        $data['di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik'] =[];
        $data['saya_lebih_suka_bekerja_di_area_pekerjaan'] =[];

        $data['saya_dipromosikan_ke_posisi_yang_kurang'] =[];
        $data['Saya_dapat_memeroleh_pendapatan'] =[];
        $data['Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure'] =[];
        $data['Pekerjaan_saya_saat_ini_lebih_menarik'] =[];
        $data['Pekerjaan_saya_saat_ini_lebih_memungkinkan'] =[];
        $data['Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat'] =[];
        $data['Pekerjaan_saya_saat_ini_dapat_lebih'] =[];
        $data['Pada_awal_meniti_karir_ini'] =[];
        $data['Lainnya'] =[];


        foreach ($query_pertanyaan_tidak_sesuai_pekerjaan as $key => $value) {
            array_push($data['pertanyaan_tidak_sesuai_pekerjaan'], (int)$value->jumlah);
        }
        foreach ($query_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai as $key => $value) {
            array_push($data['Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai'], (int)$value->jumlah);
        }
        foreach ($query_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik as $key => $value) {
            array_push($data['di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik'], (int)$value->jumlah);
        }
        foreach ($query_saya_lebih_suka_bekerja_di_area_pekerjaan as $key => $value) {
            array_push($data['saya_lebih_suka_bekerja_di_area_pekerjaan'], (int)$value->jumlah);
        }


        foreach ($query_saya_dipromosikan_ke_posisi_yang_kurang as $key => $value) {
            array_push($data['saya_dipromosikan_ke_posisi_yang_kurang'], (int)$value->jumlah);
        }
        foreach ($query_Saya_dapat_memeroleh_pendapatan as $key => $value) {
            array_push($data['Saya_dapat_memeroleh_pendapatan'], (int)$value->jumlah);
        }
        foreach ($query_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure as $key => $value) {
            array_push($data['Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure'], (int)$value->jumlah);
        }
        foreach ($query_Pekerjaan_saya_saat_ini_lebih_menarik as $key => $value) {
            array_push($data['Pekerjaan_saya_saat_ini_lebih_menarik'], (int)$value->jumlah);
        }
        foreach ($query_Pekerjaan_saya_saat_ini_lebih_memungkinkan as $key => $value) {
            array_push($data['Pekerjaan_saya_saat_ini_lebih_memungkinkan'], (int)$value->jumlah);
        }
        foreach ($query_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat as $key => $value) {
            array_push($data['Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat'], (int)$value->jumlah);
        }
        foreach ($query_Pekerjaan_saya_saat_ini_dapat_lebih as $key => $value) {
            array_push($data['Pekerjaan_saya_saat_ini_dapat_lebih'], (int)$value->jumlah);
        }
        foreach ($query_Pada_awal_meniti_karir_ini as $key => $value) {
            array_push($data['Pada_awal_meniti_karir_ini'], (int)$value->jumlah);
        }
        foreach ($query_Lainnya as $key => $value) {
            array_push($data['Lainnya'], (int)$value->jumlah);
        }


        // dd($data);
        echo json_encode($data);

    }
    public function show_data(){
        try {
            $result = [];
            $count = 1;


            if(Auth::user()->role_id == 1){
                $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
                ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }else if(Auth::user()->role_id == 2){
                $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
                ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
                ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
                ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
                ->whereNotNull('tb_mahasiswa.npm')
                ->get();
            }
            else{
                $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
                ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
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
                $data[] = $user->pertanyaan_tidak_sesuai_pekerjaan== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->saya_lebih_suka_bekerja_di_area_pekerjaan== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->saya_dipromosikan_ke_posisi_yang_kurang== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Saya_dapat_memeroleh_pendapatan== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pekerjaan_saya_saat_ini_lebih_menarik== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pekerjaan_saya_saat_ini_lebih_memungkinkan== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pekerjaan_saya_saat_ini_dapat_lebih== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Pada_awal_meniti_karir_ini== 1 ? '<center><i class="la la-check"></i></center>' : '';
                $data[] = $user->Lainnya== 1 ? '<center><i class="la la-check"></i></center>' : '';


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
            $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
            ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
            ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
            ->Leftjoin('tb_mahasiswa', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - PENGAMBILAN PEKERJAAN TIDAK SESUAI');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
         $sheet->setCellValue('F3', 'pertanyaan tidak sesuai ');
         $sheet->setCellValue('G3', 'Saya belum mendapatkan pekerjaan yang lebih sesuai');

         $sheet->setCellValue('H3', 'di pekerjaan ini saya memeroleh prospek karir yang baik');
         $sheet->setCellValue('I3', 'saya lebih suka bekerja di area pekerjaan');
         $sheet->setCellValue('J3', 'saya dipromosikan ke posisi yang kurang');
         $sheet->setCellValue('K3', 'Saya dapat memeroleh pendapatan');
         $sheet->setCellValue('L3', 'Pekerjaan saya saat ini lebih aman terjamin secure');
         $sheet->setCellValue('M3', 'Pekerjaan saya saat ini lebih menarik');
         $sheet->setCellValue('N3', 'Pekerjaan saya saat ini lebih memungkinkan');
         $sheet->setCellValue('O3', 'Pekerjaan saya saat ini lokasinya lebih dekat');
         $sheet->setCellValue('P3', 'Pekerjaan saya saat ini dapat lebih');
         $sheet->setCellValue('Q3', 'Pada awal meniti karir ini');
         $sheet->setCellValue('R3', 'Lainnya');



        //filte
        $sheet->setAutoFilter('A1:I1');
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
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(20);
        $sheet->getColumnDimension('P')->setWidth(20);
        $sheet->getColumnDimension('Q')->setWidth(20);
        $sheet->getColumnDimension('R')->setWidth(20);





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
        $sheet->getStyle('A5:R50')->applyFromArray($styleArray);
        $sheet->getStyle('A3:R4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:D2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:R3')->applyFromArray($styleheader);
        foreach ($query as $key => $value) {
            $sheet->setCellValue('A'.$i, $no++);
            $sheet->setCellValue('B'.$i, $value->npm);
            $sheet->setCellValue('C'.$i, $value->nama);
            $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' .$value->prodi);
            $sheet->setCellValue('E'.$i, $value->tahun_lulus);
            $sheet->setCellValue('F'.$i, $value->pertanyaan_tidak_sesuai_pekerjaan== 1 ? 'YA' : '');
            $sheet->setCellValue('G'.$i, $value->Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai== 1 ? 'YA' : '');
            $sheet->setCellValue('H'.$i, $value->di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik== 1 ? 'YA' : '');
            $sheet->setCellValue('I'.$i, $value->saya_lebih_suka_bekerja_di_area_pekerjaan== 1 ? 'YA' : '');
            $sheet->setCellValue('J'.$i, $value->saya_dipromosikan_ke_posisi_yang_kurang== 1 ? 'YA' : '');
            $sheet->setCellValue('K'.$i, $value->Saya_dapat_memeroleh_pendapatan== 1 ? 'YA' : '');
            $sheet->setCellValue('L'.$i, $value->Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure== 1 ? 'YA' : '');
            $sheet->setCellValue('M'.$i, $value->Pekerjaan_saya_saat_ini_lebih_menarik== 1 ? 'YA' : '');
            $sheet->setCellValue('N'.$i, $value->Pekerjaan_saya_saat_ini_lebih_memungkinkan== 1 ? 'YA' : '');
            $sheet->setCellValue('O'.$i, $value->Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat== 1 ? 'YA' : '');
            $sheet->setCellValue('P'.$i, $value->Pekerjaan_saya_saat_ini_dapat_lebih== 1 ? 'YA' : '');
            $sheet->setCellValue('Q'.$i, $value->Pada_awal_meniti_karir_ini== 1 ? 'YA' : '');
            $sheet->setCellValue('R'.$i, $value->Lainnya== 1 ? 'YA' : '');


            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Pengambilan Pekerjaan tidak sesuai - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
        }
}
