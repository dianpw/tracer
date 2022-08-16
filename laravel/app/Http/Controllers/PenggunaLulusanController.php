<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PenggunaLulusanController extends Controller{
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
        
        return view('pengguna-lulusan.index', compact('auth_user'));
    }

    
    public function show_datatable1(){
        try {
            $result = [];
            $count = 1;
            
            $query = DB::table('tb_perusahaan')
                        ->orderBy('created_at', 'desc')
                        ->get();
    
            // dd($query);
            foreach ($query as $user) {
    
                $data = [];
                //SELECT id_perusahaan, nama, email, no_whatsapp, alamat, jeniskelamin, jabatan, nama_perusahaan, alamat_perusahaan, no_tel_kantor, jumlah_lulusan, masa_kerja, gaji_awal, ipk, masukan, created_at FROM tb_perusahaan WHERE 1
                $panggilan='';
                if($user->jeniskelamin == 'Laki - laki'){
                $panggilan= "Bapak ";
                }else{
                $panggilan= "Ibu ";
                }
                $data[] = $count++;
                $data[] = ('<i class="fas fa-user-tie"></i> ' . $panggilan . $user->nama . ' [ ' . $user->jabatan . ' ]' . '</br><i class="fas fa-map-marker-alt"></i> ' . $user->alamat . '</br><i class="fas fa-phone-alt"></i> ' . $user->no_whatsapp . '</br><i class="fas fa-at"></i> ' . $user->email);

                $data[] = ('<i class="fas fa-building"></i> ' . $user->nama_perusahaan . '</br><i class="fas fa-map-marker-alt"></i> ' . $user->alamat_perusahaan . '</br><i class="fas fa-phone-alt"></i> ' . $user->no_tel_kantor . '</br>');
    
                $data[] = ($user->masukan);
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }
    
    public function show_datatable2(){
        try {
            $result = [];
            $count = 1;
            
            $query = DB::table('tb_perusahaan')
                        ->orderBy('created_at', 'desc')
                        ->get();
    
            // dd($query);
            foreach ($query as $user) {
    
                $data = [];
                //SELECT id_perusahaan, nama, email, no_whatsapp, alamat, jeniskelamin, jabatan, nama_perusahaan, alamat_perusahaan, no_tel_kantor, jumlah_lulusan, masa_kerja, gaji_awal, ipk, masukan, created_at FROM tb_perusahaan WHERE 1
                $panggilan='';
                if($user->jeniskelamin == 'Laki - laki'){
                $panggilan= "Bapak ";
                }else{
                $panggilan= "Ibu ";
                }
                $data[] = $count++;
                $data[] = ($user->nama_perusahaan);
                $data[] = ($user->jumlah_lulusan . ' Orang');
                $data[] = ($user->masa_kerja . ' Tahun');
                $data[] = ($user->gaji_awal . ' Juta');
                $data[] = ($user->ipk);
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }  
    
    public function show_datatable3(){
        try {
            $result = [];
            $count = 1;
            
            $query = DB::table('tb_perusahaan')
                        ->orderBy('created_at', 'desc')
                        ->get();
    
            // dd($query);
            foreach ($query as $user) {
    
                $data = [];
                //SELECT id_perusahaan, nama, email, no_whatsapp, alamat, jeniskelamin, jabatan, nama_perusahaan, alamat_perusahaan, no_tel_kantor, jumlah_lulusan, masa_kerja, gaji_awal, ipk, masukan, created_at FROM tb_perusahaan WHERE 1
                $panggilan='';
                if($user->jeniskelamin == 'Laki - laki'){
                $panggilan= "Bapak ";
                }else{
                $panggilan= "Ibu ";
                }
                $data[] = $count++;
                $data[] = ('<i class="fas fa-building"></i> ' . $user->nama_perusahaan . '</br><i class="fas fa-map-marker-alt"></i> ' . $user->alamat_perusahaan . '</br><i class="fas fa-phone-alt"></i> ' . $user->no_tel_kantor);
                $data[] = ($user->jumlah_lulusan . ' Orang');
                $data[] = ($user->masa_kerja . ' Tahun');
                $data[] = ($user->gaji_awal . ' Juta');
                $data[] = ($user->ipk);
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
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->get();
        }else if(Auth::user()->role_id == 2){
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('mhs_fakultas_id', Auth::user()->fakultas_user_id)
            ->get();
        }
        else{
            $query = DB::table('tb_penekanan_metode_pembelajaran')
            ->Leftjoin('tb_mahasiswa', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id',  'tm_kode_prodi.kode')
            ->where('kode_prodi_id', Auth::user()->prodi_id)
            ->get();
        }

        // dd($query);

        $sheet->setCellValue('B2', 'LAPORAN TRACER STUDY - PENEKANAN METODE PEMBELAJARAN');

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'NAMA');
        $sheet->setCellValue('D3', 'PRODI');
        $sheet->setCellValue('E3', 'TAHUN LULUS');
        $sheet->setCellValue('F3', 'PERKULIAHAN');
        $sheet->setCellValue('G3', 'DEMONSTRASI');
        $sheet->setCellValue('H3', 'PARTISIPASI RISET');
        $sheet->setCellValue('I3', 'PRAKTIKUM');
        $sheet->setCellValue('J3', 'KERJA LAPANGAN');
        $sheet->setCellValue('K3', 'MAGANG');
        $sheet->setCellValue('L3', 'DISKUSI');

        //filte
        $sheet->setAutoFilter('A1:E1');
        //color cell

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

        //size cells
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(15);
        $sheet->getColumnDimension('L')->setWidth(15);

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
            $sheet->setCellValue('F'.$i, $value->perkuliahan);
            $sheet->setCellValue('G'.$i, $value->demontrasi);
            $sheet->setCellValue('H'.$i, $value->partisipasi_riset);
            $sheet->setCellValue('I'.$i, $value->praktikum);
            $sheet->setCellValue('J'.$i, $value->kerja_lapangan);
            $sheet->setCellValue('K'.$i, $value->magang);
            $sheet->setCellValue('L'.$i, $value->diskusi);

            $i++;
            
        }

        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Penekanan Metode Pembelajaran - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");
    }
}
