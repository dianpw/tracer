<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use Carbon;
use App\Imports\importAlumni;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataAlumniInputController extends Controller{
    public function index(){                    
		$show_tahun= DB::select('SELECT YEAR(tahun_lulus) as tahun_lulus FROM tb_mahasiswa WHERE YEAR(tahun_lulus) != 0000 GROUP BY YEAR(tahun_lulus)');

        if(Auth::user()->role_id == null){
            Session::flush();
            Auth::logout();
            return Redirect('admin-login');
        }
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
            //select id, npm, nama, nik, npwp, status_baru, tahun_lulus, tahun_masuk, mhs_fakultas_id, kode_prodi_id, tm_kode_prodi.jenjang, tm_kode_prodi.prodi, kode_pt, email, jk, no_hp, alamat, tb_mahasiswa.created_at from tb_mahasiswa left join tm_kode_prodi on tb_mahasiswa.kode_prodi_id = tm_kode_prodi.kode where tb_mahasiswa.nik is not null
            $query = DB::table('tb_mahasiswa')
            //->Leftjoin('tb_mahasiswa', 'tb_biodata.npm', 'tb_mahasiswa.npm')
            ->Leftjoin('tm_kode_prodi', 'tb_mahasiswa.kode_prodi_id', 'tm_kode_prodi.kode')
            ->Leftjoin('tb_penekanan_metode_pembelajaran', 'tb_penekanan_metode_pembelajaran.npm',  'tb_mahasiswa.npm')            
            ->Leftjoin('tb_pembiayaan_kuliah', 'tb_pembiayaan_kuliah.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_waktu_mulai_mencari_pekerjaan', 'tb_waktu_mulai_mencari_pekerjaan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_cara_memperoleh_pekerjaan', 'tb_cara_memperoleh_pekerjaan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_kemulusan_transisi', 'tb_kemulusan_transisi.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_situasi_saat_ini_2', 'tb_situasi_saat_ini_2.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_masa_tunggu', 'tb_masa_tunggu.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_pengangguran_terbuka', 'tb_pengangguran_terbuka.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_data_alumni_sudah_bekerja', 'tb_data_alumni_sudah_bekerja.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('prov_perusahaan', 'tb_data_alumni_sudah_bekerja.prov_perusahaan',  'prov_perusahaan.id_prov')
            ->Leftjoin('kota_perusahaan', 'tb_data_alumni_sudah_bekerja.kota_perusahaan',  'kota_perusahaan.id_kota')

            ->Leftjoin('tb_jenis_tempat_bekerja_saat_ini', 'tb_jenis_tempat_bekerja_saat_ini.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_pendapatan_setiap_bulan', 'tb_pendapatan_setiap_bulan.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_keselarasan_horizontal', 'tb_keselarasan_horizontal.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_keselarasan_vertical', 'tb_keselarasan_vertical.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_berwirausaha', 'tb_berwirausaha.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('lanjut_study', 'lanjut_study.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_pengambilan_pekerjaan_tidak_sesuai', 'tb_pengambilan_pekerjaan_tidak_sesuai.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_kompetensia', 'tb_kompetensia.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_kompetensib', 'tb_kompetensib.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_profil_karakter_kepribadian', 'tb_profil_karakter_kepribadian.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_organisasi_nu', 'tb_organisasi_nu.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_organisasi_kemahasiswaan_yang_diikuti', 'tb_organisasi_kemahasiswaan_yang_diikuti.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_pengaruh_organisasi', 'tb_pengaruh_organisasi.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_riwayat_s1', 'tb_riwayat_s1.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_kesesuaian', 'tb_kesesuaian.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_penilaian_belajar_mengajar', 'tb_penilaian_belajar_mengajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_penilaian_pengalaman_belajar', 'tb_penilaian_pengalaman_belajar.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('tb_pekerjaan_s2', 'tb_pekerjaan_s2.npm',  'tb_mahasiswa.npm')
            ->Leftjoin('peran_kompetensi', 'peran_kompetensi.npm',  'tb_mahasiswa.npm')

            ->whereNotNull('tb_mahasiswa.nik')
            ->select('tb_mahasiswa.id', 'tb_mahasiswa.npm', 'nama', 'nik', 'npwp', 'status_baru', 'tahun_lulus', 'tahun_masuk', 'mhs_fakultas_id', 'kode_prodi_id', 'tm_kode_prodi.jenjang', 'tm_kode_prodi.prodi', 'kode_pt', 'email', 'jk', 'no_hp', 'alamat', 'tb_mahasiswa.updated_at', 'perkuliahan', 'demontrasi', 'partisipasi_riset', 'praktikum', 'kerja_lapangan', 'magang', 'diskusi', 'pembiayaan', 'waktu_mulai_mencari_pekerjaan', 'tb_waktu_mulai_mencari_pekerjaan.bulan as waktu_mulai_mencari_pekerjaan_bulan', 'melalui_iklan', 'melamar_keperusahaan', 'pergi_kebursa', 'mencari_lewat_internet', 'dihubungi_oleh_perusahaan', 'menghubungi_kemenakertrans', 'menghubungi_agen_tenaga_kerja', 'memeroleh_informasi_dari_pusat', 'menghubungi_kantor_kemahasiswaan', 'membangun_jejaring', 'melalui_relasi', 'membangun_bisnis_sendiri', 'melalui_penempatan_kerja_magang', 'bekerja_ditempat_yang_sama', 'ditawari_pekerjaan_baru', 'tb_cara_memperoleh_pekerjaan.lainnya', 'perusahaan_dilamar', 'perusahaan_merespon', 'perusahaan_mengundang_wawancara', 'menikah', 'melanjutkan_pendidikan', 'sibuk_dengan_keluarga', 'sedang_mencari_pekerjaan', 'tb_situasi_saat_ini_2.lainnya as situasi_saat_ini_lainnya', 'masa_tunggu', 'tb_masa_tunggu.bulan as masa_tunggu_bulan', 'tidak', 'tidak_tapi_saya_sedang_menunggu_hasil_lamaran', 'ya_saya_akan_mulai_bekerja_2_minggu_kedepan', 'ya_tapi_saya_belum_pasti_akan_bekerja_dalam_2_minggu', 'tb_pengangguran_terbuka.lainnya as pengangguran_terbuka_lainnya', 'status', 'jenis_perusahaan', 'nama_atasan', 'nomor_hp_atasan', 'nama_perusahaan', 'nm_prov', 'nm_kota', 'no_telp_perusahaan', 'wirausaha_ijin', 'wirausaha_lokal', 'perusahaan_swasta_ijin', 'perusahaan_lokal', 'instansi_pemerintah_bumn', 'organisasi_non_profit', 'dari_pekerjaan_utama', 'dari_lembur', 'dari_pekerjaan_lainnya', 'kenaikan_s2', 'sangat_erat', 'erat', 'cukup_erat', 'kurang_erat', 'tidak_sama_sekali', 'setingkat_lebih_tinggi', 'tingkat_yang_sama', 'setingkat_lebih_rendah', 'tidak_perlu_pendidikan_tinggi', 'posisi', 'tingkat', 'biaya', 'universitas', 'lanjut_study.prodi as lanjut_study_prodi', 'masuk_study', 'pertanyaan_tidak_sesuai_pekerjaan', 'Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai', 'di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik', 'saya_lebih_suka_bekerja_di_area_pekerjaan', 'saya_dipromosikan_ke_posisi_yang_kurang', 'Saya_dapat_memeroleh_pendapatan', 'Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure', 'Pekerjaan_saya_saat_ini_lebih_menarik', 'Pekerjaan_saya_saat_ini_lebih_memungkinkan', 'Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat', 'Pekerjaan_saya_saat_ini_dapat_lebih', 'Pada_awal_meniti_karir_ini', 'tb_pengambilan_pekerjaan_tidak_sesuai.Lainnya as pengambilan_pekerjaan_tidak_sesuai_Lainnya', 'tb_kompetensia.etika as kompetensia_etika', 'tb_kompetensia.keahlian as kompetensia_keahlian', 'tb_kompetensia.bahasa_inggris as kompetensia_bahasa_inggris', 'tb_kompetensia.penggunaan_ti as kompetensia_penggunaan_ti', 'tb_kompetensia.komunikasi as kompetensia_komunikasi', 'tb_kompetensia.kerjasama as kompetensia_kerjasama', 'tb_kompetensia.pengembangan_diri as kompetensia_pengembangan_diri', 'tb_kompetensib.etika as kompetensib_etika', 'tb_kompetensib.keahlian as kompetensib_keahlian', 'tb_kompetensib.bahasa_inggris as kompetensib_bahasa_inggris', 'tb_kompetensib.penggunaan_ti as kompetensib_penggunaan_ti', 'tb_kompetensib.komunikasi as kompetensib_komunikasi', 'tb_kompetensib.kerjasama as kompetensib_kerjasama', 'tb_kompetensib.pengembangan_diri as kompetensib_pengembangan_diri', 'pekerjaandenganpenuhtanggungjawab', 'Mampubekerjasamadalamtim', 'Bersungguh_sungguh', 'Bekerjakerassesuaidengankompetensi', 'Tolerandanmampumenerima', 'Meletakkansegalasesuatu', 'Kreatifdaninovatif', 'Mampumembuatkeputusanterbaik', 'organisasi_nu', 'organisasi', 'pengaruh_organisasi', 'univs1', 'prodis1', 'masuks1', 'riwayat_kerja', 'sesuailb', 'sesuaibp', 'interaksi_dosen', 'bimbingan_akademik', 'proyek_riset', 'jejaring_ilmiah', 'kondisi_belajar', 'interaksi_teman', 'partisipasi_pelayanan', 'tb_penilaian_belajar_mengajar.lainnya as penilaian_belajar_mengajar_lainnya', 'kelas', 'magang_kerja', 'pengabdian', 'organisasi_internal', 'thesis', 'organisasi_lintas', 'organisasi_lintas_nasional', 'organisasi_lintas_negara', 'ekstrakurikuler', 'olahraga', 'sudah_kerja', 'pindah_kerja', 'multidisiplin', 'isu_terkini', 'keterampilan_internet', 'keterampilan_komputer', 'berfikir_kritis', 'keterampilan_riset', 'kemampuan_belajar', 'kemampuan_komunikasi', 'di_bawah_tekanan', 'manajemen_waktu', 'bekerja_mandiri', 'bekerja_tim', 'pemecahan_masalah', 'negosiasi', 'analisis', 'toleransi', 'adaptasi', 'loyalitas', 'integritas', 'beda_budaya', 'kepemimpinan', 'tanggungjawab', 'inisiatif', 'manajemen_proyek', 'presentasi', 'menulis_laporan', 'belajar_sepanjang_hayat', 'berbahasa_inggris' )
            ->get();

            //var_dump($query);

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
        
        $sheet->setCellValue('A2', 'LAPORAN TRACER STUDY - Alumni Sudah Input Tracer');
        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NPM');
        $sheet->setCellValue('C3', 'Nama');
        $sheet->setCellValue('D3', 'Prodi');
        $sheet->setCellValue('E3', 'Tahun Lulus');
        $sheet->setCellValue('F3', 'Tahun Masuk');
        $sheet->setCellValue('G3', 'NIK');
        $sheet->setCellValue('H3', 'NPWP');
        $sheet->setCellValue('I3', 'Jenis Kelamin');
        $sheet->setCellValue('J3', 'No HP');
        $sheet->setCellValue('K3', 'Email');
        $sheet->setCellValue('L3', 'Alamat');

        $sheet->setCellValue('M3', 'Penekanan Metode Pembelajaran');
        $sheet->setCellValue('M4', 'Perkuliahan');
        $sheet->setCellValue('N4', 'Demonstrasi');
        $sheet->setCellValue('O4', 'Partisipasi Riset');
        $sheet->setCellValue('P4', 'Praktikum');
        $sheet->setCellValue('Q4', 'Kerja Lapangan');
        $sheet->setCellValue('R4', 'Magang');
        $sheet->setCellValue('S4', 'Diskusi');

        $sheet->setCellValue('T3', 'Sumberdana dalam Pembiayaan kuliah');

        $sheet->setCellValue('U3', 'Waktu Mulai Mencari Pekerjaan');
        $sheet->setCellValue('U4', 'Waktu mencari Pekerjaan');
        $sheet->setCellValue('V4', 'Bulan');

        $sheet->setCellValue('W3', 'Cara Memperoleh Pekerjaan');
        $sheet->setCellValue('W4', 'Melalui iklan di koran/ majalah, brosur');
        $sheet->setCellValue('X4', 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada');
        $sheet->setCellValue('Y4', 'Pergi ke bursa/pameran kerja');
        $sheet->setCellValue('Z4', 'Mencari lewat internet/iklan online/milis');
        $sheet->setCellValue('AA4', 'Dihubungi oleh perusahaan');
        $sheet->setCellValue('AB4', 'Menghubungi Kemenakertrans');
        $sheet->setCellValue('AC4', 'Menghubungi agen tenaga kerja komersial/swasta');
        $sheet->setCellValue('AD4', 'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas');
        $sheet->setCellValue('AE4', 'Menghubungi kantor kemahasiswaan/hubungan alumni');
        $sheet->setCellValue('AF4', 'Membangun jejaring (network) sejak masih kuliah');
        $sheet->setCellValue('AG4', 'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)');
        $sheet->setCellValue('AH4', 'Membangun bisnis sendiri');
        $sheet->setCellValue('AI4', 'Melalui penempatan kerja atau magang');
        $sheet->setCellValue('AJ4', 'Bekerja di tempat yang sama dengan tempat kerja semasa');
        $sheet->setCellValue('AK4', 'Lainnya');

        $sheet->setCellValue('AL3', 'Kemulusan Transisi');
        $sheet->setCellValue('AL4', 'Perusahaan Dilamar');
        $sheet->setCellValue('AM4', 'Perusahaan merespon');
        $sheet->setCellValue('AN4', 'Perusahaan mengundang wawancara');

        $sheet->setCellValue('AO3', 'Situasi saat ini');
        $sheet->setCellValue('AO4', 'Saya menikah');
        $sheet->setCellValue('AP4', 'Saya masih belajar/ melanjutkan kuliah profesi atau pascasarjana');
        $sheet->setCellValue('AQ4', 'Saya sibuk dengan keluarga dan anak-anak');
        $sheet->setCellValue('AR4', 'Saya sekarang sedang mencari pekerjaan');
        $sheet->setCellValue('AS4', 'Lainnya');

        $sheet->setCellValue('AT3', 'Masa Tunggu');
        $sheet->setCellValue('AT4', 'Masa Tunggu');
        $sheet->setCellValue('AU4', 'Bulan');
        
        $sheet->setCellValue('AV3', 'Pengangguran Terbuka');
        $sheet->setCellValue('AV4', 'Tidak');
        $sheet->setCellValue('AW4', 'Tidak, tapi saya sedang menunggu hasil lamaran kerja');
        $sheet->setCellValue('AX4', 'Ya, saya akan mulai bekerjaa dalam 2 minggu ke depan');
        $sheet->setCellValue('AY4', 'Ya, teapi saya belum pasti akan bekerja salam 2 minggu ke depan');
        $sheet->setCellValue('AZ4', 'Lainnya');

        $sheet->setCellValue('BA3', 'Data Alumni yang sudah bekerja');
        $sheet->setCellValue('BA4', 'Status');
        $sheet->setCellValue('BB4', 'Nama Perusahaan');
        $sheet->setCellValue('BC4', 'Jenis Perusahaan');
        $sheet->setCellValue('BD4', 'Nama Atasan');
        $sheet->setCellValue('BE4', 'No HP Atasan');
        $sheet->setCellValue('BF4', 'Alamat Perusahaan');
        $sheet->setCellValue('BG4', 'No Telp Perusahaan');

        $sheet->setCellValue('BH3', 'Jenis Tempat Kerja');
        $sheet->setCellValue('BH4', 'Wirausaha Ijin/Tidak Berijin');
        $sheet->setCellValue('BI4', 'Wirausaha Local/Nasional/Internasional');
        $sheet->setCellValue('BJ4', 'Perusahaan Swasta Ijin/Tidak Berijin');
        $sheet->setCellValue('BK4', 'Perusahaan Local/Nasional/Internasional');
        $sheet->setCellValue('BL4', 'Instansi Pemerintah (BUMN)');
        $sheet->setCellValue('BM4', 'Organisasi Non-Profit/Lembaga Swadaya Masyarakat');

        $sheet->setCellValue('BN3', 'Pendapatan Perbulan');
        $sheet->setCellValue('BN4', 'Pekerjaan Utama');
        $sheet->setCellValue('BO4', 'Lembur');
        $sheet->setCellValue('BP4', 'Pekerjaan Lainnya');
        $sheet->setCellValue('BQ4', 'Kenaikan Pendapatan setelah Mengambil S2/S3');

        $sheet->setCellValue('BR3', 'Keselarasan Horizontal');
        $sheet->setCellValue('BR4', 'Sangat erat');
        $sheet->setCellValue('BS4', 'Erat');
        $sheet->setCellValue('BT4', 'Cukup erat');
        $sheet->setCellValue('BU4', 'Kurang erat');
        $sheet->setCellValue('BV4', 'Tidak sama sekali');

        $sheet->setCellValue('BW3', 'Keselarasan Vertical');
        $sheet->setCellValue('BW4', 'Setingkat lebih tinggi');
        $sheet->setCellValue('BX4', 'Tingkat yang sama');
        $sheet->setCellValue('BY4', 'Setingkat lebih rendah');
        $sheet->setCellValue('BZ4', 'Tidak perlu pendidikan tinggi');

        $sheet->setCellValue('CA3', 'Alumni Berwirausaha');
        $sheet->setCellValue('CA4', 'Jabatan');
        $sheet->setCellValue('CB4', 'Tingkat tempat kerja');

        $sheet->setCellValue('CC3', 'Alumni Melanjutkan Studi');
        $sheet->setCellValue('CC4', 'Sumber Biaya');
        $sheet->setCellValue('CD4', 'Perguruan Tinggi');
        $sheet->setCellValue('CE4', 'Program Studi');
        $sheet->setCellValue('CF4', 'Tanggal Masuk');

        $sheet->setCellValue('CG3', 'Alasan Pengambilan pekerjaan tidak sesuai');
        $sheet->setCellValue('CG4', 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya');
        $sheet->setCellValue('CH4', 'Saya belum mendapatkan pekerjaan yang lebih sesuai');
        $sheet->setCellValue('CI4', 'Di pekerjaan ini saya memeroleh prospek karir yang baik');
        $sheet->setCellValue('CJ4', 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya');
        $sheet->setCellValue('CK4', 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya');
        $sheet->setCellValue('CL4', 'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini');
        $sheet->setCellValue('CM4', 'Pekerjaan saya saat ini lebih aman/terjamin/secure');
        $sheet->setCellValue('CN4', 'Pekerjaan saya saat ini lebih menarik ');
        $sheet->setCellValue('CO4', 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.');
        $sheet->setCellValue('CP4', 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya');
        $sheet->setCellValue('CQ4', 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya');
        $sheet->setCellValue('CR4', 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya');
        $sheet->setCellValue('CS4', 'Lainnya');

        $sheet->setCellValue('CT3', 'Kompetensi A');
        $sheet->setCellValue('CT4', 'Etika');
        $sheet->setCellValue('CU4', 'Keahlian berdasarkan bidang ilmu');
        $sheet->setCellValue('CV4', 'Bahasa inggris');
        $sheet->setCellValue('CW4', 'Penggunaan teknologi informasi');
        $sheet->setCellValue('CX4', 'Komunikasi');
        $sheet->setCellValue('CY4', 'Kerja sama tim');
        $sheet->setCellValue('CZ4', 'Pengembangan diri');

        $sheet->setCellValue('DA3', 'Kompetensi B');
        $sheet->setCellValue('DA4', 'Etika');
        $sheet->setCellValue('DB4', 'Keahlian berdasarkan bidang ilmu');
        $sheet->setCellValue('DC4', 'Bahasa inggris');
        $sheet->setCellValue('DD4', 'Penggunaan teknologi informasi');
        $sheet->setCellValue('DE4', 'Komunikasi');
        $sheet->setCellValue('DF4', 'Kerja sama tim');
        $sheet->setCellValue('DG4', 'Pengembangan diri');

        $sheet->setCellValue('DH3', 'Profil Karakter');
        $sheet->setCellValue('DH4', 'Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan');
        $sheet->setCellValue('DI4', 'Mampu bekerjasama dalam tim');
        $sheet->setCellValue('DJ4', 'Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan');
        $sheet->setCellValue('DK4', 'Bekerja keras sesuai dengan kompetensi');
        $sheet->setCellValue('DL4', 'Toleran dan mampu menerima masukkan dari siapapun');
        $sheet->setCellValue('DM4', 'Meletakkan segala sesuatu secara professional');
        $sheet->setCellValue('DN4', 'Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan');
        $sheet->setCellValue('DO4', 'Mampu membuat keputusan terbaik dengan arif dan bijaksana');

        $sheet->setCellValue('DP3', 'Menjabat di Organisasi Kemahasiswaan / NU');

        $sheet->setCellValue('DQ3', 'Organisasi Kemahasiswaan');

        $sheet->setCellValue('DR3', 'Pengaruh organisasi dengan pencapaian karir');

        $sheet->setCellValue('DS3', 'Pendidikan dan Pekerjaan Sebelum Kuliah S2');
        $sheet->setCellValue('DS4', 'Perguruan Tinggi S1');
        $sheet->setCellValue('DT4', 'Program Studi S1');
        $sheet->setCellValue('DU4', 'Lulus S1');
        $sheet->setCellValue('DV4', 'Riwayat Kerja sebelum kuliah di S2 UNISMA');

        $sheet->setCellValue('DW3', 'Kesesuaian Pendidikan yang diambil di S2/S3 UNISMA');
        $sheet->setCellValue('DW4', 'Latar belakang pendidikan');
        $sheet->setCellValue('DX4', 'Bidang pekerjaan saat ini');

        $sheet->setCellValue('DY3', 'Penilaian Terhadap Aspek Belajar Mengajar');
        $sheet->setCellValue('DY4', 'Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah');
        $sheet->setCellValue('DZ4', 'Pembimbingan Akademik');
        $sheet->setCellValue('EA4', 'Kesempatan bepartisipasi dalam proyek riset');
        $sheet->setCellValue('EB4', 'Kondisi umum belajar mengajar');
        $sheet->setCellValue('EC4', 'Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional');
        $sheet->setCellValue('ED4', 'Kesempatan untuk berinteraksi dengan teman');
        $sheet->setCellValue('EE4', 'Kesempatan untuk bepartisipasi dalam pelayanan pasien');

        $sheet->setCellValue('EF3', 'Penilaian Terhadap Pengalaman Belajar');
        $sheet->setCellValue('EF4', 'Pembelajaran di kelas');
        $sheet->setCellValue('EG4', 'Magang/ Kerja lapangan praktikum');
        $sheet->setCellValue('EH4', 'Pengabdian masyarakat');
        $sheet->setCellValue('EI4', 'Pelaksanaan riset penulisan tesis');
        $sheet->setCellValue('EJ4', 'Organisasi kemahasiswaan internal fakultas');
        $sheet->setCellValue('EK4', 'Organisasi kemahasiswaan lintas fakultas di Unisma');
        $sheet->setCellValue('EL4', 'Organisasi kemahasiswaan lintas universitas nasional');
        $sheet->setCellValue('EM4', 'Organisasi kemahasiswaan lintas universitas lintas negara (internasional)');
        $sheet->setCellValue('EN4', 'Kegiatan ekstrakurikuler');
        $sheet->setCellValue('EO4', 'Rekreasi dan olahraga');
        
        $sheet->setCellValue('EP3', 'Transisi ke Dunia Kerja');
        $sheet->setCellValue('EP4', 'Bekerja saat lulus S2/S3 di UNISMA');
        $sheet->setCellValue('EQ4', 'Pindah kerja setelah lulus S2/S3 di UNISMA');
        
        $sheet->setCellValue('ER3', 'Peran Kompetensi S2/S3 di UNISMA dalam Melaksanakan Pekerjaan');
        $sheet->setCellValue('ER4', 'Pengetahuan isu terkini');
        $sheet->setCellValue('ES4', 'Ketrampilan internet');
        $sheet->setCellValue('ET4', 'Ketrampilan komputer');
        $sheet->setCellValue('EU4', 'Berpikir kritis');
        $sheet->setCellValue('EV4', 'Keterampilan riset');
        $sheet->setCellValue('EW4', 'Kemampuan belajar');
        $sheet->setCellValue('EX4', 'Bekerja di bawah tekanan ');
        $sheet->setCellValue('EY4', 'Manajemen waktu');
        $sheet->setCellValue('EZ4', 'Bekeja secara mandiri');
        $sheet->setCellValue('FA4', 'Kemampuan dalam memecahkan masalah');
        $sheet->setCellValue('FB4', 'Negosiasi');
        $sheet->setCellValue('FC4', 'Kemampuan analisis');
        $sheet->setCellValue('FD4', 'Toleransi');
        $sheet->setCellValue('FE4', 'Kemampuan adaptasi');
        $sheet->setCellValue('FF4', 'Loyalitas');
        $sheet->setCellValue('FG4', 'Integritas');
        $sheet->setCellValue('FH4', 'Bekerja dengan orang yang berbeda budaya maupun latar belakang');
        $sheet->setCellValue('FI4', 'Kepemimpinan');
        $sheet->setCellValue('FJ4', 'Kemampuan dalam memegang tanggung jawab');
        $sheet->setCellValue('FK4', 'Inisiatif');
        $sheet->setCellValue('FL4', 'Manajemen proyek/ program');
        $sheet->setCellValue('FM4', 'Kemampuan untuk mempresentasikan ide/ produk/ laporan');
        $sheet->setCellValue('FN4', 'Kemampuan dalam menulis laporan, memo dan dokumen');
        $sheet->setCellValue('FO4', 'Kemampuan untuk terus belajar sepanjang hayat');


        //filte
        $sheet->setAutoFilter('A1:FO1');
        //color cell
            //warna nomer

            //warna depart

        //freeze pane

        $sheet->freezePaneByColumnAndRow(1,'E1');
        $sheet->freezePane('E5');

        //merge cells
        $sheet->mergeCells("A2:FO2"); //Judul

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
        $sheet->mergeCells("M3:S3"); //Penekanan Metode Pembelajaran
        $sheet->mergeCells("T3:T4"); //Sumberdana dalam Pembiayaan kuliah
        $sheet->mergeCells("U3:V3"); //Waktu Mulai Mencari Pekerjaan
        $sheet->mergeCells("W3:AK3"); //Cara Memperoleh Pekerjaan
        $sheet->mergeCells("AL3:AN3"); //Kemulusan Transisi
        $sheet->mergeCells("AO3:AS3"); //Situasi saat ini
        $sheet->mergeCells("AT3:AU3"); //Masa Tunggu
        $sheet->mergeCells("AV3:AZ3"); //Pengangguran Terbuka
        $sheet->mergeCells("BA3:BG3"); //Data Alumni yang sudah bekerja
        $sheet->mergeCells("BH3:BM3"); //Jenis Tempat Kerja
        $sheet->mergeCells("BN3:BQ3"); //Pendapatan Perbulan
        $sheet->mergeCells("BR3:BV3"); //Keselarasan Horizontal
        $sheet->mergeCells("BW3:BZ3"); //Keselarasan Vertical
        $sheet->mergeCells("CA3:CB3"); //Alumni Berwirausaha
        $sheet->mergeCells("CC3:CF3"); //Alumni Melanjutkan Studi
        $sheet->mergeCells("CG3:CS3"); //Alasan Pengambilan pekerjaan tidak sesuai
        $sheet->mergeCells("CT3:CZ3"); //Kompetensi A
        $sheet->mergeCells("DA3:DG3"); //Kompetensi B
        $sheet->mergeCells("DH3:DO3"); //Profil Karakter
        $sheet->mergeCells("DP3:DP4"); //Menjabat di Organisasi Kemahasiswaan / NU
        $sheet->mergeCells("DQ3:DQ4"); //Organisasi Kemahasiswaan
        $sheet->mergeCells("DR3:DR4"); //Pengaruh organisasi dengan pencapaian karir
        $sheet->mergeCells("DS3:DV3"); //Pendidikan dan Pekerjaan Sebelum Kuliah S2
        $sheet->mergeCells("DW3:DX3"); //Kesesuaian Pendidikan yang diambil di S2/S3 UNISMA
        $sheet->mergeCells("DY3:EE3"); //Penilaian Terhadap Aspek Belajar Mengajar
        $sheet->mergeCells("EF3:EO3"); //Penilaian Terhadap Pengalaman Belajar
        $sheet->mergeCells("EP3:EQ3"); //Transisi ke Dunia Kerja
        $sheet->mergeCells("ER3:FO3"); //Peran Kompetensi S2/S3 di UNISMA dalam Melaksanakan Pekerjaan

        //size cells
            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getColumnDimension('B')->setWidth(15);
            $sheet->getColumnDimension('C')->setWidth(30);
            $sheet->getColumnDimension('D')->setWidth(35);
            $sheet->getColumnDimension('E')->setWidth(15);
            $sheet->getColumnDimension('F')->setWidth(15);
            $sheet->getColumnDimension('G')->setWidth(20);
            $sheet->getColumnDimension('H')->setWidth(20);
            $sheet->getColumnDimension('I')->setWidth(15);
            $sheet->getColumnDimension('J')->setWidth(15);
            $sheet->getColumnDimension('K')->setWidth(40);
            $sheet->getColumnDimension('L')->setWidth(50);
            $sheet->getColumnDimension('M')->setWidth(20);
            $sheet->getColumnDimension('N')->setWidth(20);
            $sheet->getColumnDimension('O')->setWidth(20);
            $sheet->getColumnDimension('P')->setWidth(20);
            $sheet->getColumnDimension('Q')->setWidth(20);
            $sheet->getColumnDimension('R')->setWidth(20);
            $sheet->getColumnDimension('S')->setWidth(20);
            $sheet->getColumnDimension('T')->setWidth(35);
            $sheet->getColumnDimension('U')->setWidth(35);
            $sheet->getColumnDimension('V')->setWidth(10);
            $sheet->getColumnDimension('W')->setWidth(35);
            $sheet->getColumnDimension('X')->setWidth(35);
            $sheet->getColumnDimension('Y')->setWidth(35);
            $sheet->getColumnDimension('Z')->setWidth(35);
            $sheet->getColumnDimension('AA')->setWidth(35);
            $sheet->getColumnDimension('AB')->setWidth(35);
            $sheet->getColumnDimension('AC')->setWidth(35);
            $sheet->getColumnDimension('AD')->setWidth(40);
            $sheet->getColumnDimension('AE')->setWidth(35);
            $sheet->getColumnDimension('AF')->setWidth(35);
            $sheet->getColumnDimension('AG')->setWidth(35);
            $sheet->getColumnDimension('AH')->setWidth(35);
            $sheet->getColumnDimension('AI')->setWidth(35);
            $sheet->getColumnDimension('AJ')->setWidth(35);
            $sheet->getColumnDimension('AK')->setWidth(10);
            $sheet->getColumnDimension('AL')->setWidth(20);
            $sheet->getColumnDimension('AM')->setWidth(20);
            $sheet->getColumnDimension('AN')->setWidth(35);
            $sheet->getColumnDimension('AO')->setWidth(15);
            $sheet->getColumnDimension('AP')->setWidth(35);
            $sheet->getColumnDimension('AQ')->setWidth(35);
            $sheet->getColumnDimension('AR')->setWidth(35);
            $sheet->getColumnDimension('AS')->setWidth(10);
            $sheet->getColumnDimension('AT')->setWidth(35);
            $sheet->getColumnDimension('AU')->setWidth(10);
            $sheet->getColumnDimension('AV')->setWidth(10);
            $sheet->getColumnDimension('AW')->setWidth(40);
            $sheet->getColumnDimension('AX')->setWidth(40);
            $sheet->getColumnDimension('AY')->setWidth(40);
            $sheet->getColumnDimension('AZ')->setWidth(10);
            $sheet->getColumnDimension('BA')->setWidth(35);
            $sheet->getColumnDimension('BB')->setWidth(20);
            $sheet->getColumnDimension('BC')->setWidth(25);
            $sheet->getColumnDimension('BD')->setWidth(15);
            $sheet->getColumnDimension('BE')->setWidth(15);
            $sheet->getColumnDimension('BF')->setWidth(40);
            $sheet->getColumnDimension('BG')->setWidth(20);
            $sheet->getColumnDimension('BH')->setWidth(20);
            $sheet->getColumnDimension('BI')->setWidth(30);
            $sheet->getColumnDimension('BJ')->setWidth(20);
            $sheet->getColumnDimension('BK')->setWidth(30);
            $sheet->getColumnDimension('BL')->setWidth(20);
            $sheet->getColumnDimension('BM')->setWidth(30);
            $sheet->getColumnDimension('BN')->setWidth(20);
            $sheet->getColumnDimension('BO')->setWidth(20);
            $sheet->getColumnDimension('BP')->setWidth(20);
            $sheet->getColumnDimension('BQ')->setWidth(30);
            $sheet->getColumnDimension('BR')->setWidth(15);
            $sheet->getColumnDimension('BS')->setWidth(15);
            $sheet->getColumnDimension('BT')->setWidth(15);
            $sheet->getColumnDimension('BU')->setWidth(15);
            $sheet->getColumnDimension('BV')->setWidth(15);
            $sheet->getColumnDimension('BW')->setWidth(15);
            $sheet->getColumnDimension('BX')->setWidth(15);
            $sheet->getColumnDimension('BY')->setWidth(15);
            $sheet->getColumnDimension('BZ')->setWidth(20);
            $sheet->getColumnDimension('CA')->setWidth(20);
            $sheet->getColumnDimension('CB')->setWidth(40);
            $sheet->getColumnDimension('CC')->setWidth(20);
            $sheet->getColumnDimension('CD')->setWidth(20);
            $sheet->getColumnDimension('CE')->setWidth(20);
            $sheet->getColumnDimension('CF')->setWidth(20);
            $sheet->getColumnDimension('CG')->setWidth(45);
            $sheet->getColumnDimension('CH')->setWidth(30);
            $sheet->getColumnDimension('CI')->setWidth(30);
            $sheet->getColumnDimension('CJ')->setWidth(45);
            $sheet->getColumnDimension('CK')->setWidth(50);
            $sheet->getColumnDimension('CL')->setWidth(40);
            $sheet->getColumnDimension('CM')->setWidth(30);
            $sheet->getColumnDimension('CN')->setWidth(20);
            $sheet->getColumnDimension('CO')->setWidth(55);
            $sheet->getColumnDimension('CP')->setWidth(30);
            $sheet->getColumnDimension('CQ')->setWidth(40);
            $sheet->getColumnDimension('CR')->setWidth(55);
            $sheet->getColumnDimension('CS')->setWidth(15);
            $sheet->getColumnDimension('CT')->setWidth(15);
            $sheet->getColumnDimension('CU')->setWidth(25);
            $sheet->getColumnDimension('CV')->setWidth(15);
            $sheet->getColumnDimension('CW')->setWidth(20);
            $sheet->getColumnDimension('CX')->setWidth(15);
            $sheet->getColumnDimension('CY')->setWidth(15);
            $sheet->getColumnDimension('CZ')->setWidth(15);
            $sheet->getColumnDimension('DA')->setWidth(15);
            $sheet->getColumnDimension('DB')->setWidth(20);
            $sheet->getColumnDimension('DC')->setWidth(15);
            $sheet->getColumnDimension('DD')->setWidth(20);
            $sheet->getColumnDimension('DE')->setWidth(15);
            $sheet->getColumnDimension('DF')->setWidth(15);
            $sheet->getColumnDimension('DG')->setWidth(15);
            $sheet->getColumnDimension('DH')->setWidth(40);
            $sheet->getColumnDimension('DI')->setWidth(40);
            $sheet->getColumnDimension('DJ')->setWidth(40);
            $sheet->getColumnDimension('DK')->setWidth(40);
            $sheet->getColumnDimension('DL')->setWidth(40);
            $sheet->getColumnDimension('DM')->setWidth(40);
            $sheet->getColumnDimension('DN')->setWidth(40);
            $sheet->getColumnDimension('DO')->setWidth(40);
            $sheet->getColumnDimension('DP')->setWidth(30);
            $sheet->getColumnDimension('DQ')->setWidth(40);
            $sheet->getColumnDimension('DR')->setWidth(30);
            $sheet->getColumnDimension('DS')->setWidth(30);
            $sheet->getColumnDimension('DT')->setWidth(30);
            $sheet->getColumnDimension('DU')->setWidth(15);
            $sheet->getColumnDimension('DV')->setWidth(40);
            $sheet->getColumnDimension('DW')->setWidth(20);
            $sheet->getColumnDimension('DX')->setWidth(20);
            $sheet->getColumnDimension('DY')->setWidth(40);
            $sheet->getColumnDimension('DZ')->setWidth(20);
            $sheet->getColumnDimension('EA')->setWidth(30);
            $sheet->getColumnDimension('EB')->setWidth(20);
            $sheet->getColumnDimension('EC')->setWidth(40);
            $sheet->getColumnDimension('ED')->setWidth(30);
            $sheet->getColumnDimension('EE')->setWidth(30);
            $sheet->getColumnDimension('EF')->setWidth(20);
            $sheet->getColumnDimension('EG')->setWidth(20);
            $sheet->getColumnDimension('EH')->setWidth(20);
            $sheet->getColumnDimension('EI')->setWidth(20);
            $sheet->getColumnDimension('EJ')->setWidth(30);
            $sheet->getColumnDimension('EK')->setWidth(30);
            $sheet->getColumnDimension('EL')->setWidth(30);
            $sheet->getColumnDimension('EM')->setWidth(40);
            $sheet->getColumnDimension('EN')->setWidth(20);
            $sheet->getColumnDimension('EO')->setWidth(20);
            $sheet->getColumnDimension('EP')->setWidth(20);
            $sheet->getColumnDimension('EQ')->setWidth(30);
            $sheet->getColumnDimension('ER')->setWidth(20);
            $sheet->getColumnDimension('ES')->setWidth(20);
            $sheet->getColumnDimension('ET')->setWidth(20);
            $sheet->getColumnDimension('EU')->setWidth(20);
            $sheet->getColumnDimension('EV')->setWidth(20);
            $sheet->getColumnDimension('EW')->setWidth(20);
            $sheet->getColumnDimension('EX')->setWidth(20);
            $sheet->getColumnDimension('EY')->setWidth(20);
            $sheet->getColumnDimension('EZ')->setWidth(20);
            $sheet->getColumnDimension('FA')->setWidth(30);
            $sheet->getColumnDimension('FB')->setWidth(20);
            $sheet->getColumnDimension('FC')->setWidth(20);
            $sheet->getColumnDimension('FD')->setWidth(20);
            $sheet->getColumnDimension('FE')->setWidth(20);
            $sheet->getColumnDimension('FF')->setWidth(20);
            $sheet->getColumnDimension('FG')->setWidth(20);
            $sheet->getColumnDimension('FH')->setWidth(40);
            $sheet->getColumnDimension('FI')->setWidth(20);
            $sheet->getColumnDimension('FJ')->setWidth(30);
            $sheet->getColumnDimension('FK')->setWidth(20);
            $sheet->getColumnDimension('FL')->setWidth(20);
            $sheet->getColumnDimension('FM')->setWidth(40);
            $sheet->getColumnDimension('FN')->setWidth(40);
            $sheet->getColumnDimension('FO')->setWidth(40);


        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'wrapText' => true,
                'shrinkToFit' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $styleArrayNumb = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'wrapText' => true,
                'shrinkToFit' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]

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
        $count = 4 + count($query);
        //dd($count);
        $sheet->getStyle('A5:FO'.$count)->applyFromArray($styleArray);
        $sheet->getStyle('A3:FO4')->applyFromArray($styleHeader);
        $sheet->getStyle('A2:FO2')->applyFromArray($styletitle);
        $sheet->getStyle('A3:FO3')->applyFromArray($styleheader);
        //format
            $sheet->getStyle('A5:A'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('V5:V'.$count)->applyFromArray($styleArrayNumb);
            //$sheet->getStyle('E5:F'.$count)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
            $sheet->getStyle('B5:B'.$count)->applyFromArray($styleArray);
            $sheet->getStyle('B5:B'.$count)->getNumberFormat()->setFormatCode('0');
            $sheet->getStyle('G5:H'.$count)->getNumberFormat()->setFormatCode('0');
            $sheet->getStyle('J5:J'.$count)->getNumberFormat()->setFormatCode('0');
            $sheet->getStyle('W5:AS'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('AU5:AZ'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('BE5:BE'.$count)->getNumberFormat()->setFormatCode('0');
            $sheet->getStyle('BG5:BG'.$count)->getNumberFormat()->setFormatCode('0');
            $sheet->getStyle('BN5:BQ'.$count)->getNumberFormat()->setFormatCode('_("Rp"* #,##0.00_);_("Rp"* \(#,##0.00\);_("Rp"* "-"??_);_(@_)');
            $sheet->getStyle('BR5:BV'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('BW5:BZ'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('CG5:CS'.$count)->applyFromArray($styleArrayNumb);
            $sheet->getStyle('CT5:DG'.$count)->applyFromArray($styleArrayNumb);
        
        foreach ($query as $key => $value) {
            //Umum
                $sheet->setCellValue('A'.$i, $no++);
                $sheet->setCellValue('B'.$i, $value->npm);
                $sheet->setCellValue('C'.$i, $value->nama);
                $sheet->setCellValue('D'.$i, $value->jenjang . ' - ' . $value->prodi);
                $sheet->setCellValue('E'.$i, $value->tahun_lulus);
                $sheet->setCellValue('F'.$i, $value->tahun_masuk);
                $sheet->setCellValue('G'.$i, $value->nik);
                $sheet->setCellValue('H'.$i, $value->npwp);
                $sheet->setCellValue('I'.$i, $value->jk);
                $sheet->setCellValue('J'.$i, $value->no_hp);
                $sheet->setCellValue('K'.$i, $value->email);
                $sheet->setCellValue('L'.$i, $value->alamat);
            //Penekanan Metode Pembelajaran
                $sheet->setCellValue('M'.$i, $value->perkuliahan);
                $sheet->setCellValue('N'.$i, $value->demontrasi);
                $sheet->setCellValue('O'.$i, $value->partisipasi_riset);
                $sheet->setCellValue('P'.$i, $value->praktikum);
                $sheet->setCellValue('Q'.$i, $value->kerja_lapangan);
                $sheet->setCellValue('R'.$i, $value->magang);
                $sheet->setCellValue('S'.$i, $value->diskusi);
            //Sumberdana dalam Pembiayaan kuliah
                $sheet->setCellValue('T'.$i, $value->pembiayaan);
            //Waktu Mulai Mencari Pekerjaan
                $sheet->setCellValue('U'.$i, $value->waktu_mulai_mencari_pekerjaan);
                $sheet->setCellValue('V'.$i, $value->waktu_mulai_mencari_pekerjaan_bulan);
            //Cara Memperoleh Pekerjaan
                $sheet->setCellValue('W'.$i, $value->melalui_iklan == 0 ? "" : $value->melalui_iklan);
                $sheet->setCellValue('X'.$i, $value->melamar_keperusahaan == 0 ? "" : $value->melamar_keperusahaan);
                $sheet->setCellValue('Y'.$i, $value->pergi_kebursa == 0 ? "" : $value->pergi_kebursa);
                $sheet->setCellValue('Z'.$i, $value->mencari_lewat_internet == 0 ? "" : $value->mencari_lewat_internet);
                $sheet->setCellValue('AA'.$i, $value->dihubungi_oleh_perusahaan == 0 ? "" : $value->dihubungi_oleh_perusahaan);
                $sheet->setCellValue('AB'.$i, $value->menghubungi_kemenakertrans == 0 ? "" : $value->menghubungi_kemenakertrans);
                $sheet->setCellValue('AC'.$i, $value->menghubungi_agen_tenaga_kerja == 0 ? "" : $value->menghubungi_agen_tenaga_kerja);
                $sheet->setCellValue('AD'.$i, $value->memeroleh_informasi_dari_pusat == 0 ? "" : $value->memeroleh_informasi_dari_pusat);
                $sheet->setCellValue('AE'.$i, $value->menghubungi_kantor_kemahasiswaan == 0 ? "" : $value->menghubungi_kantor_kemahasiswaan);
                $sheet->setCellValue('AF'.$i, $value->membangun_jejaring == 0 ? "" : $value->membangun_jejaring);
                $sheet->setCellValue('AG'.$i, $value->melalui_relasi == 0 ? "" : $value->melalui_relasi);
                $sheet->setCellValue('AH'.$i, $value->membangun_bisnis_sendiri == 0 ? "" : $value->membangun_bisnis_sendiri);
                $sheet->setCellValue('AI'.$i, $value->melalui_penempatan_kerja_magang == 0 ? "" : $value->melalui_penempatan_kerja_magang);
                $sheet->setCellValue('AJ'.$i, $value->bekerja_ditempat_yang_sama == 0 ? "" : $value->bekerja_ditempat_yang_sama);
                $sheet->setCellValue('AK'.$i, $value->lainnya == 0 ? "" : $value->lainnya);
            //Kemulusan Transisi
                $sheet->setCellValue('AL'.$i, $value->perusahaan_dilamar);
                $sheet->setCellValue('AM'.$i, $value->perusahaan_merespon);
                $sheet->setCellValue('AN'.$i, $value->perusahaan_mengundang_wawancara);
            //Situasi saat ini
                $sheet->setCellValue('AO'.$i, $value->menikah);
                $sheet->setCellValue('AP'.$i, $value->melanjutkan_pendidikan);
                $sheet->setCellValue('AQ'.$i, $value->sibuk_dengan_keluarga);
                $sheet->setCellValue('AR'.$i, $value->sedang_mencari_pekerjaan);
                $sheet->setCellValue('AS'.$i, $value->situasi_saat_ini_lainnya);
            //Masa Tunggu
                $sheet->setCellValue('AT'.$i, $value->masa_tunggu);
                $sheet->setCellValue('AU'.$i, $value->masa_tunggu_bulan);
            //Pengangguran Terbuka
                $sheet->setCellValue('AV'.$i, $value->tidak == 0 ? "" : $value->tidak);
                $sheet->setCellValue('AW'.$i, $value->tidak_tapi_saya_sedang_menunggu_hasil_lamaran == 0 ? "" : $value->tidak_tapi_saya_sedang_menunggu_hasil_lamaran);
                $sheet->setCellValue('AX'.$i, $value->ya_saya_akan_mulai_bekerja_2_minggu_kedepan == 0 ? "" : $value->ya_saya_akan_mulai_bekerja_2_minggu_kedepan);
                $sheet->setCellValue('AY'.$i, $value->ya_tapi_saya_belum_pasti_akan_bekerja_dalam_2_minggu == 0 ? "" : $value->ya_tapi_saya_belum_pasti_akan_bekerja_dalam_2_minggu);
                $sheet->setCellValue('AZ'.$i, $value->pengangguran_terbuka_lainnya == 0 ? "" : $value->pengangguran_terbuka_lainnya);
            //Data Alumni yang sudah bekerja
                $sheet->setCellValue('BA'.$i, $value->status);
                $sheet->setCellValue('BB'.$i, $value->nama_perusahaan);
                $sheet->setCellValue('BC'.$i, $value->jenis_perusahaan);
                $sheet->setCellValue('BD'.$i, $value->nama_atasan);
                $sheet->setCellValue('BE'.$i, $value->nomor_hp_atasan);
                $sheet->setCellValue('BF'.$i, $value->nm_kota == null ? $value->nm_prov : $value->nm_kota . ", " .$value->nm_prov);
                $sheet->setCellValue('BG'.$i, $value->no_telp_perusahaan);
            //Jenis Tempat Kerja
                $sheet->setCellValue('BH'.$i, $value->wirausaha_ijin);
                $sheet->setCellValue('BI'.$i, $value->wirausaha_lokal);
                $sheet->setCellValue('BJ'.$i, $value->perusahaan_swasta_ijin);
                $sheet->setCellValue('BK'.$i, $value->perusahaan_lokal);
                $sheet->setCellValue('BL'.$i, $value->instansi_pemerintah_bumn);
                $sheet->setCellValue('BM'.$i, $value->organisasi_non_profit);
            //Pendapatan Perbulan
                $sheet->setCellValue('BN'.$i, $value->dari_pekerjaan_utama == null ? 0 : $value->dari_pekerjaan_utama);
                $sheet->setCellValue('BO'.$i, $value->dari_lembur == null ? 0 : $value->dari_lembur);
                $sheet->setCellValue('BP'.$i, $value->dari_pekerjaan_lainnya == null ? 0 : $value->dari_pekerjaan_lainnya);
                $sheet->setCellValue('BQ'.$i, $value->kenaikan_s2 == null ? 0 : $value->kenaikan_s2);
            //Keselarasan Horizontal
                $sheet->setCellValue('BR'.$i, $value->sangat_erat == 0 ? "" : $value->sangat_erat);
                $sheet->setCellValue('BS'.$i, $value->erat == 0 ? "" : $value->erat);
                $sheet->setCellValue('BT'.$i, $value->cukup_erat == 0 ? "" : $value->cukup_erat);
                $sheet->setCellValue('BU'.$i, $value->kurang_erat == 0 ? "" : $value->kurang_erat);
                $sheet->setCellValue('BV'.$i, $value->tidak_sama_sekali == 0 ? "" : $value->tidak_sama_sekali);
            //Keselarasan Vertical
                $sheet->setCellValue('BW'.$i, $value->setingkat_lebih_tinggi == 0 ? "" : $value->setingkat_lebih_tinggi);
                $sheet->setCellValue('BX'.$i, $value->tingkat_yang_sama == 0 ? "" : $value->tingkat_yang_sama);
                $sheet->setCellValue('BY'.$i, $value->setingkat_lebih_rendah == 0 ? "" : $value->setingkat_lebih_rendah);
                $sheet->setCellValue('BZ'.$i, $value->tidak_perlu_pendidikan_tinggi == 0 ? "" : $value->tidak_perlu_pendidikan_tinggi);
            //Alumni Berwirausaha
                $sheet->setCellValue('CA'.$i, $value->posisi);
                $sheet->setCellValue('CB'.$i, $value->tingkat);
            //Alumni Melanjutkan Studi
                $sheet->setCellValue('CC'.$i, $value->biaya);
                $sheet->setCellValue('CD'.$i, $value->universitas);
                $sheet->setCellValue('CE'.$i, $value->lanjut_study_prodi);
                $sheet->setCellValue('CF'.$i, $value->masuk_study);
            //Alasan Pengambilan pekerjaan tidak sesuai
                $sheet->setCellValue('CG'.$i, $value->pertanyaan_tidak_sesuai_pekerjaan == 0 ? "" : $value->pertanyaan_tidak_sesuai_pekerjaan);
                $sheet->setCellValue('CH'.$i, $value->Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai == 0 ? "" : $value->Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai);
                $sheet->setCellValue('CI'.$i, $value->di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik == 0 ? "" : $value->di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik);
                $sheet->setCellValue('CJ'.$i, $value->saya_lebih_suka_bekerja_di_area_pekerjaan == 0 ? "" : $value->saya_lebih_suka_bekerja_di_area_pekerjaan);
                $sheet->setCellValue('CK'.$i, $value->saya_dipromosikan_ke_posisi_yang_kurang == 0 ? "" : $value->saya_dipromosikan_ke_posisi_yang_kurang);
                $sheet->setCellValue('CL'.$i, $value->Saya_dapat_memeroleh_pendapatan == 0 ? "" : $value->Saya_dapat_memeroleh_pendapatan);
                $sheet->setCellValue('CM'.$i, $value->Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure == 0 ? "" : $value->Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure);
                $sheet->setCellValue('CN'.$i, $value->Pekerjaan_saya_saat_ini_lebih_menarik == 0 ? "" : $value->Pekerjaan_saya_saat_ini_lebih_menarik);
                $sheet->setCellValue('CO'.$i, $value->Pekerjaan_saya_saat_ini_lebih_memungkinkan == 0 ? "" : $value->Pekerjaan_saya_saat_ini_lebih_memungkinkan);
                $sheet->setCellValue('CP'.$i, $value->Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat == 0 ? "" : $value->Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat);
                $sheet->setCellValue('CQ'.$i, $value->Pekerjaan_saya_saat_ini_dapat_lebih == 0 ? "" : $value->Pekerjaan_saya_saat_ini_dapat_lebih);
                $sheet->setCellValue('CR'.$i, $value->Pada_awal_meniti_karir_ini == 0 ? "" : $value->Pada_awal_meniti_karir_ini);
                $sheet->setCellValue('CS'.$i, $value->pengambilan_pekerjaan_tidak_sesuai_Lainnya == 0 ? "" : $value->pengambilan_pekerjaan_tidak_sesuai_Lainnya);
            //Kompetensi A
                $sheet->setCellValue('CT'.$i, $value->kompetensia_etika);
                $sheet->setCellValue('CU'.$i, $value->kompetensia_keahlian);
                $sheet->setCellValue('CV'.$i, $value->kompetensia_bahasa_inggris);
                $sheet->setCellValue('CW'.$i, $value->kompetensia_penggunaan_ti);
                $sheet->setCellValue('CX'.$i, $value->kompetensia_komunikasi);
                $sheet->setCellValue('CY'.$i, $value->kompetensia_kerjasama);
                $sheet->setCellValue('CZ'.$i, $value->kompetensia_pengembangan_diri);
            //Kompetensi B
                $sheet->setCellValue('DA'.$i, $value->kompetensib_etika);
                $sheet->setCellValue('DB'.$i, $value->kompetensib_keahlian);
                $sheet->setCellValue('DC'.$i, $value->kompetensib_bahasa_inggris);
                $sheet->setCellValue('DD'.$i, $value->kompetensib_penggunaan_ti);
                $sheet->setCellValue('DE'.$i, $value->kompetensib_komunikasi);
                $sheet->setCellValue('DF'.$i, $value->kompetensib_kerjasama);
                $sheet->setCellValue('DG'.$i, $value->kompetensib_pengembangan_diri);
            //Profil Karakter
                $sheet->setCellValue('DH'.$i, $value->pekerjaandenganpenuhtanggungjawab);
                $sheet->setCellValue('DI'.$i, $value->Mampubekerjasamadalamtim);
                $sheet->setCellValue('DJ'.$i, $value->Bersungguh_sungguh);
                $sheet->setCellValue('DK'.$i, $value->Bekerjakerassesuaidengankompetensi);
                $sheet->setCellValue('DL'.$i, $value->Tolerandanmampumenerima);
                $sheet->setCellValue('DM'.$i, $value->Meletakkansegalasesuatu);
                $sheet->setCellValue('DN'.$i, $value->Kreatifdaninovatif);
                $sheet->setCellValue('DO'.$i, $value->Mampumembuatkeputusanterbaik);
            //Menjabat di Organisasi Kemahasiswaan / NU
                $sheet->setCellValue('DP'.$i, $value->organisasi_nu);
            //Organisasi Kemahasiswaan
                $sheet->setCellValue('DQ'.$i, $value->organisasi);
            //Pengaruh organisasi dengan pencapaian karir
                $sheet->setCellValue('DR'.$i, $value->pengaruh_organisasi);
            //Pendidikan dan Pekerjaan Sebelum Kuliah S2
                $sheet->setCellValue('DS'.$i, $value->univs1);
                $sheet->setCellValue('DT'.$i, $value->prodis1);
                $sheet->setCellValue('DU'.$i, $value->masuks1);
                $sheet->setCellValue('DV'.$i, $value->riwayat_kerja);
            //Kesesuaian Pendidikan
                $sheet->setCellValue('DW'.$i, $value->sesuailb);
                $sheet->setCellValue('DX'.$i, $value->sesuaibp);
            //Penilaian Terhadap Aspek Belajar Mengajar
                $sheet->setCellValue('DY'.$i, $value->interaksi_dosen);
                $sheet->setCellValue('DZ'.$i, $value->bimbingan_akademik);
                $sheet->setCellValue('EA'.$i, $value->proyek_riset);
                $sheet->setCellValue('EB'.$i, $value->jejaring_ilmiah);
                $sheet->setCellValue('EC'.$i, $value->kondisi_belajar);
                $sheet->setCellValue('ED'.$i, $value->interaksi_teman);
                $sheet->setCellValue('EE'.$i, $value->partisipasi_pelayanan);
            //Penilaian Terhadap Pengalaman Belajar
                $sheet->setCellValue('EF'.$i, $value->kelas);
                $sheet->setCellValue('EG'.$i, $value->magang_kerja);
                $sheet->setCellValue('EH'.$i, $value->pengabdian);
                $sheet->setCellValue('EI'.$i, $value->organisasi_internal);
                $sheet->setCellValue('EJ'.$i, $value->thesis);
                $sheet->setCellValue('EK'.$i, $value->organisasi_lintas);
                $sheet->setCellValue('EL'.$i, $value->organisasi_lintas_nasional);
                $sheet->setCellValue('EM'.$i, $value->organisasi_lintas_negara);
                $sheet->setCellValue('EN'.$i, $value->ekstrakurikuler);
                $sheet->setCellValue('EO'.$i, $value->olahraga);
            //Transisi ke Dunia Kerja
                $sheet->setCellValue('EP'.$i, $value->sudah_kerja);
                $sheet->setCellValue('EQ'.$i, $value->pindah_kerja);
            //Peran Kompetensi S2/S3 di UNISMA dalam Melaksanakan Pekerjaan
                $sheet->setCellValue('ER'.$i, $value->isu_terkini);
                $sheet->setCellValue('ES'.$i, $value->keterampilan_internet);
                $sheet->setCellValue('ET'.$i, $value->keterampilan_komputer);
                $sheet->setCellValue('EU'.$i, $value->berfikir_kritis);
                $sheet->setCellValue('EV'.$i, $value->keterampilan_riset);
                $sheet->setCellValue('EW'.$i, $value->kemampuan_belajar);
                $sheet->setCellValue('EX'.$i, $value->di_bawah_tekanan);
                $sheet->setCellValue('EY'.$i, $value->manajemen_waktu);
                $sheet->setCellValue('EZ'.$i, $value->bekerja_mandiri);
                $sheet->setCellValue('FA'.$i, $value->pemecahan_masalah);
                $sheet->setCellValue('FB'.$i, $value->negosiasi);
                $sheet->setCellValue('FC'.$i, $value->analisis);
                $sheet->setCellValue('FD'.$i, $value->toleransi);
                $sheet->setCellValue('FE'.$i, $value->adaptasi);
                $sheet->setCellValue('FF'.$i, $value->loyalitas);
                $sheet->setCellValue('FG'.$i, $value->integritas);
                $sheet->setCellValue('FH'.$i, $value->beda_budaya);
                $sheet->setCellValue('FI'.$i, $value->kepemimpinan);
                $sheet->setCellValue('FJ'.$i, $value->tanggungjawab);
                $sheet->setCellValue('FK'.$i, $value->inisiatif);
                $sheet->setCellValue('FL'.$i, $value->manajemen_proyek);
                $sheet->setCellValue('FM'.$i, $value->presentasi);
                $sheet->setCellValue('FN'.$i, $value->menulis_laporan);
                $sheet->setCellValue('FO'.$i, $value->belajar_sepanjang_hayat);
            $i++;
        }
/**/
        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $date = date('d-F-Y');
        $file_name = 'Laporan Alumni Input Tracer Study - '. $date.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        $writer->save("php://output");

    }
    
    public function importAlumni(){
        $data = Excel::toArray(new importAlumni, request()->file('file'));

        $data_excel =  collect(head($data))->each(function ($row, $key) {
            if($row['npm'] != null){
                DB::table('tb_mahasiswa')->where('npm', $row['npm'])
                ->update([
                    'nama'              => $row['nama_lengkap_sesuai_ijasah'],
                    'nik'               => isset($row['nik']) ? $row['nik'] : "",
                    'npwp'              => $row['npwp_jika_sudah_memiliki_npwp'],
                    'email'             => $row['username'],
                    'no_hp'             => $row['nomor_hp_wa']
                ]);

                DB::Table('tb_data_alumni_sudah_bekerja')
                ->where('npm', $row['npm'])
                ->delete();    
                DB::table('tb_data_alumni_sudah_bekerja') 
                ->insert([
                    'npm'                       => $row['npm'],
                    'status'                    => $row['jelaskan_situasi_ini'],
                    'jenis_perusahaan'          => $row['apa_jenis_perusahaan_instansi_institusi_tempat_anda_bekerja_sekarang'],
                    'nama_perusahaan'           => $row['apa_nama_perusahaan_kantor_tempat_anda_bekerja_saat_ini'],
                    'prov_perusahaan'           => $row['dimana_lokasi_propinsi_tempat_anda_bekerja'],
                    'kota_perusahaan'           => $row['dimana_lokasi_kabupaten_atau_kota_tempat_anda_bekerja'],
                    'nama_atasan'               => $row['siapa_nama_atasan_langsung_anda'],
                    'nomor_hp_atasan'           => $row['mohon_menuliskan_kontak_hpemail_atasan_langsung_anda']
                ]);
                
                DB::Table('tb_berwirausaha')
                ->where('npm', $row['npm'])
                ->delete();             
                if( $row['apabila_anda_sedang_berwirausaha_apa_posisi_jabatan_anda_saat_ini'] == null){
                    $posisi = "";
                }else{
                    $posisi = $row['apabila_anda_sedang_berwirausaha_apa_posisi_jabatan_anda_saat_ini'];
                }
                if( $row['apabila_anda_sedang_berwirausaha_apa_tingkat_kerja_anda'] == null){
                    $tingkat = "";
                }else{
                    $tingkat = $row['apabila_anda_sedang_berwirausaha_apa_tingkat_kerja_anda'];
                }                 
                DB::table('tb_berwirausaha')
                    ->insert([
                    'npm'       => $row['npm'],
                    'posisi'    => $posisi,    //[D7]
                    'tingkat'    => $tingkat
                ]);
                
                DB::Table('lanjut_study')
                ->where('npm', $row['npm'])
                ->delete();  
                DB::table('lanjut_study') //$request->biaya == null ? "" : $request->biaya
                    ->insert([
                    'npm'           => $row['npm'],
                    'biaya'         => $row['apabila_anda_sedang_melanjutkan_pendidikan_untuk_4_pertanyaan_di_bawah_ini_dari_mana_sumber_biaya_studi_lanjut_anda'] == null ? "" : $row['apabila_anda_sedang_melanjutkan_pendidikan_untuk_4_pertanyaan_di_bawah_ini_dari_mana_sumber_biaya_studi_lanjut_anda'],
                    'universitas'   => $row['apabila_anda_sedang_melanjutkan_pendidikan_sebutkan_nama_perguruan_tinggi_nya_mohon_tidak_disingkat'] == null ? "" : $row['apabila_anda_sedang_melanjutkan_pendidikan_sebutkan_nama_perguruan_tinggi_nya_mohon_tidak_disingkat'],
                    'prodi'         => $row['apabila_anda_sedang_melanjutkan_pendidikan_sebutkan_nama_program_studi_yang_anda_ambil'] == null ? "" : $row['apabila_anda_sedang_melanjutkan_pendidikan_sebutkan_nama_program_studi_yang_anda_ambil'],
                    'masuk_study'   => $row['apabila_anda_sedang_melanjutkan_pendidikan_kapan_anda_memulai_aktifitas_studi_lanjutnya'] == null ? "" : $row['apabila_anda_sedang_melanjutkan_pendidikan_kapan_anda_memulai_aktifitas_studi_lanjutnya']
                ]);
                
                DB::Table('tb_keselarasan_horizontal')
                ->where('npm', $row['npm'])
                ->delete();  
                DB::table('tb_keselarasan_horizontal')
                ->insert([
                    'npm'               => $row['npm'],
                    'erat'              => $row['seberapa_erat_hubungan_antara_bidang_studi_dengan_pekerjaan_anda'] == "Erat" ? "1" : "0",
                    'sangat_erat'       => $row['seberapa_erat_hubungan_antara_bidang_studi_dengan_pekerjaan_anda'] == "Sangat Erat" ? "1" : "0",
                    'cukup_erat'        => $row['seberapa_erat_hubungan_antara_bidang_studi_dengan_pekerjaan_anda'] == "Cukup Erat" ? "1" : "0",
                    'kurang_erat'       => $row['seberapa_erat_hubungan_antara_bidang_studi_dengan_pekerjaan_anda'] == "Kurang Erat" ? "1" : "0",
                    'tidak_sama_sekali' => $row['seberapa_erat_hubungan_antara_bidang_studi_dengan_pekerjaan_anda'] == "Tidak Sama Sekali" ? "1" : "0"
                ]);

                DB::Table('tb_keselarasan_vertical')
                ->where('npm', $row['npm'])
                ->delete();  
                DB::table('tb_keselarasan_vertical')
                ->insert([
                    'npm'                           => $row['npm'],
                    'setingkat_lebih_tinggi'        => $row['tingkat_pendidikan_apa_yang_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini'] == "Setingkat Lebih Tinggi" ? "1" : "0",
                    'tingkat_yang_sama'             => $row['tingkat_pendidikan_apa_yang_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini'] == "Tingkat Yang Sama" ? "1" : "0",
                    'setingkat_lebih_rendah'        => $row['tingkat_pendidikan_apa_yang_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini'] == "Setingkat Lebih Rendah" ? "1" : "0",
                    'tidak_perlu_pendidikan_tinggi' => $row['tingkat_pendidikan_apa_yang_paling_tepat_sesuai_untuk_pekerjaan_anda_saat_ini'] == "Tidak Perlu Pendidikan Tinggi" ? "1" : "0"
                ]);
                
                DB::Table('tb_pembiayaan_kuliah')
                ->where('npm', $row['npm'])
                ->delete();   
                DB::table('tb_pembiayaan_kuliah')
                ->insert([
                    'npm'          => $row['npm'],
                    'pembiayaan'   => $row['sebutkan_sumberdana_dalam_pembiayaan_saat_kuliah_s1_di_unisma_bukan_ketika_studi_lanjut']
                ]);
                
                if (preg_match("/:/i", $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_1_sangat_rendah'])){
                    $sangat_rendah = explode(':', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_1_sangat_rendah']);
                }else{
                    $sangat_rendah = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_1_sangat_rendah']);
                }

                if(preg_match("/:/i", $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_2_rendah'])){
                    $rendah = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_2_rendah']);
                }else{
                    $rendah = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_2_rendah']);
                }

                if(preg_match("/:/i", $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_3_cukup'])){
                    $cukup = explode(':', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_3_cukup']);
                }else{
                    $cukup = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_3_cukup']);
                }

                if(preg_match("/:/i", $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_4_tinggi'])){
                    $tinggi = explode(':', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_4_tinggi']);
                }else{
                    $tinggi = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_4_tinggi']);
                }

                if(preg_match("/:/i", $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_5_sangat_tinggi'])){
                    $sangat_tinggi = explode(':', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_5_sangat_tinggi']);
                }else{
                    $sangat_tinggi = explode(';', $row['pada_saat_lulus_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_a_5_sangat_tinggi']);
                }
                
                if(in_array("Etika", $sangat_rendah)){
                    $etika = "1";
                }elseif(in_array("Etika", $rendah)){
                    $etika = "2";
                }elseif(in_array("Etika", $cukup)){
                    $etika = "3";
                }elseif(in_array("Etika", $tinggi)){
                    $etika = "4";
                }elseif(in_array("Etika", $sangat_tinggi)){
                    $etika = "5";
                }else{
                    $etika = "0";
                }

                if(in_array("Keahlian berdasarkan bidang ilmu", $sangat_rendah)){
                    $keahlian = "1";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $rendah)){
                    $keahlian = "2";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $cukup)){
                    $keahlian = "3";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $tinggi)){
                    $keahlian = "4";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $sangat_tinggi)){
                    $keahlian = "5";
                }else{
                    $keahlian = "0";
                }

                if(in_array("Bahasa Inggris", $sangat_rendah)){
                    $bahasa_inggris = "1";
                }elseif(in_array("Bahasa Inggris", $rendah)){
                    $bahasa_inggris = "2";
                }elseif(in_array("Bahasa Inggris", $cukup)){
                    $bahasa_inggris = "3";
                }elseif(in_array("Bahasa Inggris", $tinggi)){
                    $bahasa_inggris = "4";
                }elseif(in_array("Bahasa Inggris", $sangat_tinggi)){
                    $bahasa_inggris = "5";
                }else{
                    $bahasa_inggris = "0";
                }

                if(in_array("Penggunaan Teknologi Informasi", $sangat_rendah)){
                    $penggunaan_ti = "1";
                }elseif(in_array("Penggunaan Teknologi Informasi", $rendah)){
                    $penggunaan_ti = "2";
                }elseif(in_array("Penggunaan Teknologi Informasi", $cukup)){
                    $penggunaan_ti = "3";
                }elseif(in_array("Penggunaan Teknologi Informasi", $tinggi)){
                    $penggunaan_ti = "4";
                }elseif(in_array("Penggunaan Teknologi Informasi", $sangat_tinggi)){
                    $penggunaan_ti = "5";
                }else{
                    $penggunaan_ti = "0";
                }
                
                if(in_array("Komunikasi", $sangat_rendah)){
                    $komunikasi = "1";
                }elseif(in_array("Komunikasi", $rendah)){
                    $komunikasi = "2";
                }elseif(in_array("Komunikasi", $cukup)){
                    $komunikasi = "3";
                }elseif(in_array("Komunikasi", $tinggi)){
                    $komunikasi = "4";
                }elseif(in_array("Komunikasi", $sangat_tinggi)){
                    $komunikasi = "5";
                }else{
                    $komunikasi = "0";
                }
                
                if(in_array("Kerjasama Tim", $sangat_rendah)){
                    $kerjasama = "1";
                }elseif(in_array("Kerjasama Tim", $rendah)){
                    $kerjasama = "2";
                }elseif(in_array("Kerjasama Tim", $cukup)){
                    $kerjasama = "3";
                }elseif(in_array("Kerjasama Tim", $tinggi)){
                    $kerjasama = "4";
                }elseif(in_array("Kerjasama Tim", $sangat_tinggi)){
                    $kerjasama = "5";
                }else{
                    $kerjasama = "0";
                }
                
                if(in_array("Pengembangan Diri", $sangat_rendah)){
                    $pengembangan_diri = "1";
                }elseif(in_array("Pengembangan Diri", $rendah)){
                    $pengembangan_diri = "2";
                }elseif(in_array("Pengembangan Diri", $cukup)){
                    $pengembangan_diri = "3";
                }elseif(in_array("Pengembangan Diri", $tinggi)){
                    $pengembangan_diri = "4";
                }elseif(in_array("Pengembangan Diri", $sangat_tinggi)){
                    $pengembangan_diri = "5";
                }else{
                    $pengembangan_diri = "0";
                }
                
                DB::Table('tb_kompetensia')
                ->where('npm', $row['npm'])
                ->delete();                
                DB::table('tb_kompetensia')
                ->insert([
                    'npm'                   =>$row['npm'],
                    'etika'                 =>$etika,
                    'keahlian'              =>$keahlian,
                    'bahasa_inggris'        =>$bahasa_inggris,
                    'penggunaan_ti'         =>$penggunaan_ti,
                    'komunikasi'            =>$komunikasi,
                    'kerjasama'             =>$kerjasama,
                    'pengembangan_diri'     =>$pengembangan_diri, 
                ]);

                if (preg_match("/:/i", $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_1_sangat_rendah'])){
                    $sangat_rendah_b = explode(':', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_1_sangat_rendah']);
                }else{
                    $sangat_rendah_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_1_sangat_rendah']);
                }

                if(preg_match("/:/i", $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_2_rendah'])){
                    $rendah_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_2_rendah']);
                }else{
                    $rendah_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_2_rendah']);
                }

                if(preg_match("/:/i", $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_3_cukup'])){
                    $cukup_b = explode(':', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_3_cukup']);
                }else{
                    $cukup_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_3_cukup']);
                }

                if(preg_match("/:/i", $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_4_tinggi'])){
                    $tinggi_b = explode(':', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_4_tinggi']);
                }else{
                    $tinggi_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_4_tinggi']);
                }

                if(preg_match("/:/i", $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_5_sangat_tinggi'])){
                    $sangat_tinggi_b = explode(':', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_5_sangat_tinggi']);
                }else{
                    $sangat_tinggi_b = explode(';', $row['pada_saat_ini_pada_tingkat_kompetensi_di_bawah_ini_yang_anda_kuasai_kompetensi_b_5_sangat_tinggi']);
                }

                if(in_array("Etika", $sangat_rendah_b)){
                    $etika_b = "1";
                }elseif(in_array("Etika", $rendah_b)){
                    $etika_b = "2";
                }elseif(in_array("Etika", $cukup_b)){
                    $etika_b = "3";
                }elseif(in_array("Etika", $tinggi_b)){
                    $etika_b = "4";
                }elseif(in_array("Etika", $sangat_tinggi_b)){
                    $etika_b = "5";
                }else{
                    $etika_b = "0";
                }

                if(in_array("Keahlian berdasarkan bidang ilmu", $sangat_rendah_b)){
                    $keahlian_b = "1";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $rendah_b)){
                    $keahlian_b = "2";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $cukup_b)){
                    $keahlian_b = "3";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $tinggi_b)){
                    $keahlian_b = "4";
                }elseif(in_array("Keahlian berdasarkan bidang ilmu", $sangat_tinggi_b)){
                    $keahlian_b = "5";
                }else{
                    $keahlian_b = "0";
                }

                if(in_array("Bahasa Inggris", $sangat_rendah_b)){
                    $bahasa_inggris_b = "1";
                }elseif(in_array("Bahasa Inggris", $rendah_b)){
                    $bahasa_inggris_b = "2";
                }elseif(in_array("Bahasa Inggris", $cukup_b)){
                    $bahasa_inggris_b = "3";
                }elseif(in_array("Bahasa Inggris", $tinggi_b)){
                    $bahasa_inggris_b = "4";
                }elseif(in_array("Bahasa Inggris", $sangat_tinggi_b)){
                    $bahasa_inggris_b = "5";
                }else{
                    $bahasa_inggris_b = "0";
                }

                if(in_array("Penggunaan Teknologi Informasi", $sangat_rendah_b)){
                    $penggunaan_ti_b = "1";
                }elseif(in_array("Penggunaan Teknologi Informasi", $rendah_b)){
                    $penggunaan_ti_b = "2";
                }elseif(in_array("Penggunaan Teknologi Informasi", $cukup_b)){
                    $penggunaan_ti_b = "3";
                }elseif(in_array("Penggunaan Teknologi Informasi", $tinggi_b)){
                    $penggunaan_ti_b = "4";
                }elseif(in_array("Penggunaan Teknologi Informasi", $sangat_tinggi_b)){
                    $penggunaan_ti_b = "5";
                }else{
                    $penggunaan_ti_b = "0";
                }

                if(in_array("Komunikasi", $sangat_rendah_b)){
                    $komunikasi_b = "1";
                }elseif(in_array("Komunikasi", $rendah_b)){
                    $komunikasi_b = "2";
                }elseif(in_array("Komunikasi", $cukup_b)){
                    $komunikasi_b = "3";
                }elseif(in_array("Komunikasi", $tinggi_b)){
                    $komunikasi_b = "4";
                }elseif(in_array("Komunikasi", $sangat_tinggi_b)){
                    $komunikasi_b = "5";
                }else{
                    $komunikasi_b = "0";
                }

                if(in_array("Kerjasama Tim", $sangat_rendah_b)){
                    $kerjasama_b = "1";
                }elseif(in_array("Kerjasama Tim", $rendah_b)){
                    $kerjasama_b = "2";
                }elseif(in_array("Kerjasama Tim", $cukup_b)){
                    $kerjasama_b = "3";
                }elseif(in_array("Kerjasama Tim", $tinggi_b)){
                    $kerjasama_b = "4";
                }elseif(in_array("Kerjasama Tim", $sangat_tinggi_b)){
                    $kerjasama_b = "5";
                }else{
                    $kerjasama_b = "0";
                }

                if(in_array("Pengembangan Diri", $sangat_rendah_b)){
                    $pengembangan_diri_b = "1";
                }elseif(in_array("Pengembangan Diri", $rendah_b)){
                    $pengembangan_diri_b = "2";
                }elseif(in_array("Pengembangan Diri", $cukup_b)){
                    $pengembangan_diri_b = "3";
                }elseif(in_array("Pengembangan Diri", $tinggi_b)){
                    $pengembangan_diri_b = "4";
                }elseif(in_array("Pengembangan Diri", $sangat_tinggi_b)){
                    $pengembangan_diri_b = "5";
                }else{
                    $pengembangan_diri_b = "0";
                }
                
                DB::Table('tb_kompetensib')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_kompetensib')
                ->insert([
                    'npm'                   =>$row['npm'],
                    'etika'                 =>$etika_b,
                    'keahlian'              =>$keahlian_b,
                    'bahasa_inggris'        =>$bahasa_inggris_b,
                    'penggunaan_ti'         =>$penggunaan_ti_b,
                    'komunikasi'            =>$komunikasi_b,
                    'kerjasama'             =>$kerjasama_b,
                    'pengembangan_diri'     =>$pengembangan_diri_b, 

                ]);
                DB::Table('tb_penekanan_metode_pembelajaran')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_penekanan_metode_pembelajaran')
                ->insert([
                    'npm'                        => $row['npm'],
                    'perkuliahan'                => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_perkuliahan'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_perkuliahan'],
                    'demontrasi'                 => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_demonstrasi'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_demonstrasi'],
                    'partisipasi_riset'          => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_partisipasi_dalam_proyek_riset'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_partisipasi_dalam_proyek_riset'],
                    'praktikum'                  => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_magang'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_magang'],
                    'kerja_lapangan'             => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_praktikum'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_praktikum'],
                    'magang'                     => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_kerja_lapangan'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_kerja_lapangan'],
                    'diskusi'                    => $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_diskusi'] == null ? "" : $row['menurut_anda_seberapa_besar_penekanan_pada_metode_pembelajaran_di_bawah_ini_dilaksanakan_di_program_studi_anda_diskusi'],
                ]);

                $source = $row['kapan_anda_mulai_mencari_pekerjaan_mohon_pekerjaan_sambilan_tidak_dimasukkan'];
                //echo $source;
                if (preg_match("/setelah/i", $source)){
                    $mulai_mencari = "setelah";
                    $bulan = "";
                }elseif(preg_match("/sesudah/i", $source)){
                    $mulai_mencari = "setelah";
                    
                    if(strstr($source,':')){
                        $no = explode(':', $source, 2);
                        $bulan = end($no);
                    }elseif(strstr($source,';')){
                        $no = explode(';', $source, 2); 
                        $bulan = end($no);
                    }else{
                        $bulan = "";
                    }                
                }elseif(preg_match("/sebelum/i", $source)){
                    $mulai_mencari = "sebelum";
                    
                    if(strstr($source,':')){
                        $no = explode(':', $source, 2);
                        $bulan = end($no);
                    }elseif(strstr($source,';')){
                        $no = explode(';', $source, 2); 
                        $bulan = end($no);
                    }else{
                        $bulan = "";
                    }     
                }elseif(preg_match("/Belum bekerja/i", $source)){
                    $mulai_mencari = "tidak mencari kerja";
                    $bulan = "";
                }elseif(preg_match("/tidak mencari kerja/i", $source)){
                    $mulai_mencari = "tidak mencari kerja";
                    $bulan = "";
                }else{
                    $mulai_mencari = "";
                    $bulan = "";
                }
                DB::Table('tb_waktu_mulai_mencari_pekerjaan')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_waktu_mulai_mencari_pekerjaan')
                ->insert([
                    'npm'                           => $row['npm'],
                    'waktu_mulai_mencari_pekerjaan' => $mulai_mencari,
                    'bulan'                         => $bulan
                ]);

                $source1 = $row['bagaimana_anda_mencari_pekerjaan_tersebut_jawaban_bisa_lebih_dari_1'];
                if(preg_match("/:/i", $source1)){
                    $pisah = explode(':', $source1);
                }else{
                    $pisah = explode(';', $source1);
                }
                $melalui_iklan = in_array("Melalui iklan di koran/ majalah/ brosur", $pisah) != null ? "1" : "";
                $melamar_keperusahaan = in_array("Melamar ke perusahaan tanpa mengetahui lowongan yang ada", $pisah) != null ? "1" : "";
                $pergi_kebursa = in_array("Pergi ke bursa/ pameran kerja", $pisah) != null ? "1" : "";
                $mencari_lewat_internet = in_array("Mencari lewat internet/ iklan online/ milis", $pisah) != null ? "1" : "";
                $dihubungi_oleh_perusahaan = in_array("Dihubungi oleh perusahan", $pisah) != null ? "1" : "";
                $menghubungi_kemenakertrans = in_array("Menghubungi Kemenakertrans", $pisah) != null ? "1" : "";
                $menghubungi_agen_tenaga_kerja = in_array("Menghubungi agen tenaga kerja komersial/swasta", $pisah) != null ? "1" : "";
                $memeroleh_informasi_dari_pusat = in_array("Memperoleh informasi dari pusat/kantor pengembangan karir fakultas/universitas", $pisah) != null ? "1" : "";
                $menghubungi_kantor_kemahasiswaan = in_array("Menghubungi kantor kemahasiswaan/hubungan alumni", $pisah) != null ? "1" : "";
                $membangun_jejaring = in_array("Membangun jejaring (network) sejak masih kuliah", $pisah) != null ? "1" : "";
                $melalui_relasi = in_array("Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)", $pisah) != null ? "1" : "";
                $membangun_bisnis_sendiri = in_array("Membangun bisnis sendiri", $pisah) != null ? "1" : "";
                $melalui_penempatan_kerja_magang = in_array("Melalui penempata kerja atau magang", $pisah) != null ? "1" : "";
                $bekerja_ditempat_yang_sama = in_array("Bekerja di tempat yang sama dengan tempat kerja semasa kuliahi oleh perusahan", $pisah) != null ? "1" : "";
                $ditawari_pekerjaan_baru = in_array("Ditawari pekerjaan baru", $pisah) != null ? "1" : "";
                $lainnya = in_array("Lainnya ", $pisah) != null ? "1" : "";
            
                DB::Table('tb_cara_memperoleh_pekerjaan')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_cara_memperoleh_pekerjaan')
                ->insert([ 
                    'npm'                               => $row['npm'],
                    'melalui_iklan'                     => $melalui_iklan,
                    'melamar_keperusahaan'              => $melamar_keperusahaan,
                    'pergi_kebursa'                     => $pergi_kebursa,
                    'mencari_lewat_internet'            => $mencari_lewat_internet,
                    'dihubungi_oleh_perusahaan'         => $dihubungi_oleh_perusahaan,
                    'menghubungi_kemenakertrans'        => $menghubungi_kemenakertrans,
                    'menghubungi_agen_tenaga_kerja'     => $menghubungi_agen_tenaga_kerja,
                    'memeroleh_informasi_dari_pusat'    => $memeroleh_informasi_dari_pusat,
                    'menghubungi_kantor_kemahasiswaan'  => $menghubungi_kantor_kemahasiswaan,
                    'membangun_jejaring'                => $membangun_jejaring,
                    'melalui_relasi'                    => $melalui_relasi,
                    'membangun_bisnis_sendiri'          => $membangun_bisnis_sendiri,
                    'melalui_penempatan_kerja_magang'   => $melalui_penempatan_kerja_magang,
                    'bekerja_ditempat_yang_sama'        => $bekerja_ditempat_yang_sama,
                    'ditawari_pekerjaan_baru'           => $ditawari_pekerjaan_baru,
                    'lainnya'                           => $lainnya
                ]);

                DB::Table('tb_kemulusan_transisi')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_kemulusan_transisi')
                ->insert([
                    'npm'                               => $row['npm'],
                    'perusahaan_dilamar'                => $row['berapa_perusahaaninstansiinstitusi_yang_sudah_anda_lamar_lewat_surat_atau_e_mail_sebelum_anda_memeroleh_pekerjaan_pertama'],    //F6
                    'perusahaan_merespon'               => $row['berapa_perusahaaninstansiinstitusi_yang_sudah_anda_lamar_lewat_surat_atau_e_mail_yang_merespon_lamaran_anda'],    //F7
                    'perusahaan_mengundang_wawancara'   => $row['berapa_perusahaaninstansiinstitusi_yang_mengundang_anda_untuk_wawancara']    //F7a
                ]);
                
                $sbr = $row['apakah_anda_aktif_mencari_pekerjaan_dalam_4_minggu_terakhir_pilih_salah_satu_jawaban']; 
                
                DB::Table('tb_pengangguran_terbuka')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_pengangguran_terbuka')
                ->insert([
                    'npm'       => $row['npm'],
                    'tidak'     => $sbr == "Tidak" ? "1" : "0", 
                    'tidak_tapi_saya_sedang_menunggu_hasil_lamaran'         => $sbr == "Tidak, tapi saya sedang menunggu hasil lamaran kerja" ? "1" : "0", 
                    'ya_saya_akan_mulai_bekerja_2_minggu_kedepan'           => $sbr == "Ya, saya akan mulai bekerja dalam 2 minggu ke depan" ? "1" : "0", 
                    'ya_tapi_saya_belum_pasti_akan_bekerja_dalam_2_minggu'  => $sbr == "Ya, tapi saya belum pasti akan bekerja selama 2 minggu ke depan" ? "1" : "0", 
                    'lainnya'   => $sbr == "Lainnya " ? "1" : "0"
                ]);

                $sbr1 = $row['jika_menurut_anda_pekerjaan_anda_saat_ini_tidak_sesuai_dengan_pendidikan_anda_mengapa_anda_mengabilnya_jawaban_bisa_lebih_dari_1']; 
                if(preg_match("/:/i", $sbr1)){
                    $data = explode(':', $sbr1);
                }elseif(preg_match("/;/i", $sbr1)){
                    $data = explode(';', $sbr1);
                }else{
                    $data = array($sbr1);
                }
                //print_r($data);
                //echo "</br>";

                /**/
                DB::Table('tb_pengambilan_pekerjaan_tidak_sesuai')
                ->where('npm', $row['npm'])
                ->delete();
                DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
                ->insert([
                    'npm'   => $row['npm'],
                    'pertanyaan_tidak_sesuai_pekerjaan' => in_array("Pertanyaan tidak sesuai", $data) != null ? "1" : "0",
                    'Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai' => in_array("Saya belum mendapatkan pekerjaan yang lebih sesuai", $data) != null ? "1" : "0",
                    'di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik' => in_array("Di pekerjaan ini saya memeroleh prospek karir yang baik", $data) != null ? "1" : "0",
                    'saya_lebih_suka_bekerja_di_area_pekerjaan' => in_array("Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya", $data) != null ? "1" : "0",
                    'saya_dipromosikan_ke_posisi_yang_kurang' => in_array(" Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya", $data) != null ? "1" : "0",
                    'Saya_dapat_memeroleh_pendapatan' => in_array("Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.", $data) != null ? "1" : "0",
                    'Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure' => in_array("Pekerjaan saya saat ini lebih aman/terjamin/secure", $data) != null ? "1" : "0",
                    'Pekerjaan_saya_saat_ini_lebih_menarik' => in_array("Pekerjaan saya saat ini lebih menarik", $data) != null ? "1" : "0",
                    'Pekerjaan_saya_saat_ini_lebih_memungkinkan' => in_array("Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll", $data) != null ? "1" : "0",
                    'Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat' => in_array("Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya", $data) != null ? "1" : "0",
                    'Pekerjaan_saya_saat_ini_dapat_lebih' => in_array("Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya", $data) != null ? "1" : "0",
                    'Pada_awal_meniti_karir_ini' => in_array("Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan say", $data) != null ? "1" : "0",
                    'Lainnya' => in_array("Lainnya", $data) != null ? "1" : "0",
                ]);
            }
        });
            
            //dd($data_excel);

        if($data_excel){
            $notification = array(
                'message' => 'Sukses Import data!',
                'alert-type' => 'success'
            );
            
            return 
            Redirect::to('alumni-sudah-input')->with($notification);
        }
    

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

    public function update(Request $request){
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

    public function destroy(Request $request){
        try {
        DB::table('users')->where('id', '=', $request->id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
        return response()->json(['status' => 'success', 'result' => 'User berhasil dihapus'], 200);
    }

    public function AjaxDetail($id_user){
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
