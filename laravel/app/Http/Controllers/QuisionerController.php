<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User; 
use App\QuisionerModel;
use Illuminate\Support\Facades\Redirect;

class QuisionerController extends Controller
{
    public function pageQuisioner($npm=null){
        //SELECT tb_mahasiswa.*, tm_kode_prodi.jenjang FROM tb_mahasiswa INNER JOIN tm_kode_prodi ON tm_kode_prodi.kode=tb_mahasiswa.kode_prodi_id ORDER BY tm_kode_prodi.jenjang ASC
        $data_mhs = DB::table('tb_mahasiswa')
                ->select(DB::raw('id, npm, nama, nik, npwp, status_baru, tahun_lulus, tahun_masuk, mhs_fakultas_id, kode_prodi_id, kode_pt, email, jk, no_hp, alamat, tb_mahasiswa.created_at, tm_kode_prodi.jenjang'))
                ->Leftjoin('tm_kode_prodi', 'tm_kode_prodi.kode',  'tb_mahasiswa.kode_prodi_id')
                ->where('npm', '=', $npm)
                ->first();
        //var_dump($data_mhs);
        //$data_mhs = DB::select('SELECT id, npm, nama, nik, npwp, status_baru, tahun_lulus, tahun_masuk, mhs_fakultas_id, kode_prodi_id, kode_pt, email, jk, no_hp, alamat, created_at, tm_kode_prodi.jenjang FROM tb_mahasiswa INNER JOIN tm_kode_prodi ON tm_kode_prodi.kode=tb_mahasiswa.kode_prodi_id ORDER BY tm_kode_prodi.jenjang ASC WHERE npm ='.$npm);
        
        $tahun = date("Y", strtotime('-1 year'));
        $lulus = date('Y', strtotime($data_mhs->tahun_lulus));
        if($data_mhs == null){
            return view('not_found');
        }else if($data_mhs->jenjang == 'S1'){
            if($lulus == $tahun){
                return view('quisioner.s1', compact('data_mhs'));
            }else{
                return view('quisioner.index', compact('data_mhs'));
            }
        }else if($data_mhs->jenjang == 'S2'){
            return view('quisioner.s2', compact('data_mhs'));
        }else if($data_mhs->jenjang == 'S3'){
            return view('quisioner.s3', compact('data_mhs'));
        }
        // dd($pertanyaan_awal); 

    }

    public function fetch(Request $request){
        $pertanyaan1 = DB::table('tb_quisioner')
            ->where('id', 1)
            ->first();
        $opsi_pertanyaan = DB::table('tb_pilihan_jawaban_quisioner')
                        ->where('quisioner_id', $pertanyaan1->id)
                        ->get();
        $data_opsi_pertanyaan = [];
        foreach($opsi_pertanyaan as $key => $value){
            array_push($data_opsi_pertanyaan,  [$value->id, $value->pilihan, $value->keterangan]);
        }
        $pertanyaan_awal = [];
        array_push($pertanyaan_awal,    ['pertanyaan' => $pertanyaan1,
                                        'opsi'       => $data_opsi_pertanyaan
        ]);
        // dd($pertanyaan_awal);
        echo json_encode($pertanyaan_awal);
    }

    public function get_data_quisioner($nim){
        $query = DB::table('tb_result_quisioner')
                ->where('nim', $nim)
                ->get();
        dd($query);
    }

    public function submit_tracer_s1(Request $request){
        $post = $request->all();
        if( $request->npwp == null){
            $npwp = "";
        }else{
            $npwp = $request->npwp;
        }
        if( $request->tahun_lulus == null){
            $tahun_lulus = "";
        }else{
            $tahun_lulus = $request->tahun_lulus;
        }
        DB::table('tb_mahasiswa')->where('npm', $post['npm'])
        ->update([
            'nik'               => $request->nik,
            'npwp'              => $npwp,
            'tahun_masuk'       => $request->tahun_masuk,
            'tahun_lulus'       => $tahun_lulus,
            'email'             => $request->email,
            'no_hp'             => $request->no_whatsapp,
            'alamat'            => $request->alamat,
            'jk'                => $request->jeniskelamin
        ]);

        //B8. Menurut Anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi Anda?
        DB::Table('tb_penekanan_metode_pembelajaran')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_penekanan_metode_pembelajaran')
        ->insert([
            'npm'                        => $request->npm,
            'perkuliahan'                => $request->kuliah,
            'demontrasi'                 => $request->demontrasi,
            'partisipasi_riset'          => $request->riset,
            'praktikum'                  => $request->praktikum,
            'kerja_lapangan'             => $request->kerja_lapangan,
            'magang'                     => $request->magang,
            'diskusi'                    => $request->diskusi,
        ]);

        //F12. Sebutkan sumberdana dalam pembiayaan kuliah?
        DB::Table('tb_pembiayaan_kuliah')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pembiayaan_kuliah')
        ->insert([
            'npm'          => $request->npm,
            'pembiayaan'   => $request->pertanyaanf12,

        ]);

        //F3. Kapan anda mulai mencari pekerjaan?
        DB::Table('tb_waktu_mulai_mencari_pekerjaan')
        ->where('npm', $post['npm'])
        ->delete();
        if($request->pertanyaanf3_input_sebelum != ''){
            DB::table('tb_waktu_mulai_mencari_pekerjaan')
            ->insert([
                'npm'                           => $request->npm,
                'waktu_mulai_mencari_pekerjaan' => $request->pertanyaan_f3,
                'bulan'                         => $request->pertanyaanf3_input_sebelum
                ]);
        }else{
            DB::table('tb_waktu_mulai_mencari_pekerjaan')
            ->insert([
                'npm'                           => $request->npm,
                'waktu_mulai_mencari_pekerjaan' => $request->pertanyaan_f3,
                'bulan'                         => $request->pertanyaanf3_input_setelah
                ]);
        }
        
        //F4. Bagaimana cara Anda mendapatkan pekerjaan setelah lulus dari program pascasarjana UNISMA?
        DB::Table('tb_cara_memperoleh_pekerjaan')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_cara_memperoleh_pekerjaan')
        ->insert([
            'npm'                               => $request->npm,
            'melalui_iklan'                     => $request->pertanyaanf4_iklan == null ? "" : $request->pertanyaanf4_iklan,
            'melamar_keperusahaan'              => $request->pertanyaanf4_melamar == null ? "" : $request->pertanyaanf4_melamar,
            'pergi_kebursa'                     => $request->pertanyaanf4_pergi == null ? "" : $request->pertanyaanf4_pergi,
            'mencari_lewat_internet'            => $request->pertanyaanf4_mencari == null ? "" : $request->pekerjaan_lainnpertanyaanf4_mencariya,
            'dihubungi_oleh_perusahaan'         => $request->pertanyaanf4_dihubungi == null ? "" : $request->pekerjaan_lainpertanyaanf4_dihubunginya,
            'menghubungi_kemenakertrans'        => $request->pertanyaanf4_menghubungi_kemenakertrans == null ? "" : $request->pertanyaanf4_menghubungi_kemenakertrans,
            'menghubungi_agen_tenaga_kerja'     => $request->pertanyaanf4_menghubungi_agen_tenaga_kerja == null ? "" : $request->pertanyaanf4_menghubungi_agen_tenaga_kerja,
            'memeroleh_informasi_dari_pusat'    => $request->pertanyaanf4_memeroleh == null ? "" : $request->pertanyaanf4_memeroleh,
            'menghubungi_kantor_kemahasiswaan'  => $request->pertanyaanf4_menghubungi_kantor == null ? "" : $request->pertanyaanf4_menghubungi_kantor,
            'membangun_jejaring'                => $request->pertanyaanf4_membangun_jejaring == null ? "" : $request->pertanyaanf4_membangun_jejaring,
            'melalui_relasi'                    => $request->pertanyaanf4_melalui == null ? "" : $request->pertanyaanf4_melalui,
            'membangun_bisnis_sendiri'          => $request->pertanyaanf4_membangun_bisnis == null ? "" : $request->pertanyaanf4_membangun_bisnis,
            'melalui_penempatan_kerja_magang'   => $request->pertanyaanf4_melalui_magang == null ? "" : $request->pertanyaanf4_melalui_magang,
            'bekerja_ditempat_yang_sama'        => $request->pertanyaanf4_bekerja_tempat_sama == null ? "" : $request->pertanyaanf4_bekerja_tempat_sama,
            'lainnya'                           => $request->pertanyaanf4_lainnya == null ? "" : $request->pertanyaanf4_lainnya
        ]);

        //F6. Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?
        //F7. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?
        //F7a. Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara? 
        DB::Table('tb_kemulusan_transisi')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kemulusan_transisi')
        ->insert([
            'npm'                               => $request->npm,
            'perusahaan_dilamar'                => $request->pertanyaanf6,    //F6
            'perusahaan_merespon'               => $request->pertanyaanf7,    //F7
            'perusahaan_mengundang_wawancara'   => $request->pertanyaanf7a    //F7a
        ]);

        //F9. Bagaimana anda menggambarkan situasi anda saat ini? 
        DB::Table('tb_situasi_saat_ini_2')
        ->where('npm', $post['npm'])
        ->delete();
        if( $request->pertanyaanf9_menikah == null){
            $pertanyaanf9_menikah = "";
        }else{
            $pertanyaanf9_menikah = $request->pertanyaanf9_menikah;
        }
        if( $request->pertanyaanf9_belajar == null){
            $pertanyaanf9_belajar = "";
        }else{
            $pertanyaanf9_belajar = $request->pertanyaanf9_belajar;
        }
        if( $request->pertanyaanf9_sibuk_keluarga == null){
            $pertanyaanf9_sibuk_keluarga = "";
        }else{
            $pertanyaanf9_sibuk_keluarga = $request->pertanyaanf9_sibuk_keluarga;
        }
        if( $request->pertanyaanf9_sedang_mencari_pekerjaan == null){
            $pertanyaanf9_sedang_mencari_pekerjaan = "";
        }else{
            $pertanyaanf9_sedang_mencari_pekerjaan = $request->pertanyaanf9_sedang_mencari_pekerjaan;
        }
        if( $request->pertanyaanf9_lainnya == null){
            $pertanyaanf9_lainnya = "";
        }else{
            $pertanyaanf9_lainnya = $request->pertanyaanf9_lainnya;
        }
        DB::table('tb_situasi_saat_ini_2')
        ->insert([
            'npm'                       => $request->npm,
            'menikah'                   => $pertanyaanf9_menikah,
            'melanjutkan_pendidikan'    => $pertanyaanf9_belajar,
            'sibuk_dengan_keluarga'     => $pertanyaanf9_sibuk_keluarga,
            'sedang_mencari_pekerjaan'  => $pertanyaanf9_sedang_mencari_pekerjaan,
            'lainnya'                   => $pertanyaanf9_lainnya,
        ]);

        //F5. Berapa bulan waktu yang dibutuhkan (sebelum dan sesudah kelulusan Anda) untuk mendapatkan pekerjaan pertama?
        DB::Table('tb_masa_tunggu')
        ->where('npm', $post['npm'])
        ->delete();
        if($request->pertanyaanf5input != ''){
        DB::table('tb_masa_tunggu')
        ->insert([
            'npm'         => $request->npm,
            'masa_tunggu' => $request->pertanyaan2_f5,
            'bulan'       => $request->pertanyaanf5input
            ]);
        }else{
        DB::table('tb_masa_tunggu')
        ->insert([
            'npm'         => $request->npm,
            'masa_tunggu' => $request->pertanyaan2_f5,
            'bulan'       => $request->pertanyaanf5input2
            ]);
        }

        //F10. Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?
        $check_input_f10 = '';
        if($request->pertanyaanf10 != null){
            if($request->pertanyaanf10 == 1){
                $check_input_f10 = 'tidak';
                $request->pertanyaanf10 = 1;
            }else if($request->pertanyaanf10 == 2){
                $check_input_f10 = 'tidak_tapi_saya_sedang_menunggu_hasil_lamaran';
                $request->pertanyaanf10 = 1;
            }else if($request->pertanyaanf10 == 3){
                $check_input_f10 = 'ya_saya_akan_mulai_bekerja_2_minggu_kedepan';
                $request->pertanyaanf10 = 1;
            }else if($request->pertanyaanf10 == 4){
                $check_input_f10 = 'ya_tapi_saya_belum_pasti_akan_bekerja_dalam_2_minggu';
                $request->pertanyaanf10 = 1;
            }else if($request->pertanyaanf10 == 5){
                $check_input_f10 = 'lainnya';
                $request->pertanyaanf10 = 1;
            }
            DB::Table('tb_pengangguran_terbuka')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_pengangguran_terbuka')
            ->insert([
                'npm'               => $request->npm,
                $check_input_f10    => $request->pertanyaanf10,
            ]);
        }

        //Jelaskan status Anda saat ini?
        //Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang? 
        //Apa nama perusahaan tempat anda bekerja saat ini?
        //Dimana lokasi tempat Anda bekerja? 
        //Siapa nama atasan langsung anda?
        //Mohon menuliskan kontak HP atasan langsung Anda
        DB::Table('tb_data_alumni_sudah_bekerja')
        ->where('npm', $post['npm'])
        ->delete();
        
        if( $request->status_kerja == null){
            $status_kerja = "";
        }else{
            $status_kerja = $request->status_kerja;
        }
        if( $request->jenis_perusahaan == null){
            $jenis_perusahaan = "";
        }else{
            $jenis_perusahaan = $request->jenis_perusahaan;
        }
        if( $request->nama_perusahaan == null){
            $nama_perusahaan = "";
        }else{
            $nama_perusahaan = $request->nama_perusahaan;
        }
        if( $request->prov_perusahaan == null){
            $prov_perusahaan = "";
        }else{
            $prov_perusahaan = $request->prov_perusahaan;
        }
        if( $request->kota_perusahaan == null){
            $kota_perusahaan = "";
        }else{
            $kota_perusahaan = $request->kota_perusahaan;
        }
        if( $request->nama_atasan_langsung == null){
            $nama_atasan_langsung = "";
        }else{
            $nama_atasan_langsung = $request->nama_atasan_langsung;
        }
        if( $request->no_hp_atasan == null){
            $no_hp_atasan = "";
        }else{
            $no_hp_atasan = $request->no_hp_atasan;
        }
        DB::table('tb_data_alumni_sudah_bekerja') 
        ->insert([
            'npm'                       => $request->npm,
            'status'                    => $status_kerja,
            'jenis_perusahaan'          => $jenis_perusahaan,
            'nama_perusahaan'           => $nama_perusahaan,
            'prov_perusahaan'           => $prov_perusahaan,
            'kota_perusahaan'           => $kota_perusahaan,
            'nama_atasan'               => $nama_atasan_langsung,
            'nomor_hp_atasan'           => $no_hp_atasan
        ]);

        //D4. Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?
        DB::Table('tb_jenis_tempat_bekerja_saat_ini')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_jenis_tempat_bekerja_saat_ini')
        ->insert([
            'npm'                       => $request->npm,
            'wirausaha_ijin'            => $request->wiraswastaijintidakberijin == null ? null : implode(',',$request->wiraswastaijintidakberijin),
            'wirausaha_lokal'           => $request->wiraswastalokal_nasional == null ? null : implode(',',$request->wiraswastalokal_nasional),
            'perusahaan_swasta_ijin'    => $request->perusahaanswasta == null ? null : implode(',',$request->perusahaanswasta),
            'perusahaan_lokal'          => $request->perusahaanlokalnasional == null ? null : implode(',',$request->perusahaanlokalnasional),
            'instansi_pemerintah_bumn'  => $request->bumn == null ? null : implode(',',$request->bumn),
            'organisasi_non_profit'     => $request->organisasi_non_profit == null ? null : implode(',',$request->organisasi_non_profit),
        ]);

        //[D8_1] Kira-kira berapa pendapatan Anda dari pekerjaan utama setiap bulan?
        //[D8_2] Kira-kira berapa pendapatan Anda dari lembur dan tips setiap bulan?
        //[D8_3] Kira-kira berapa pendapatan Anda dari pekerjaan lainnya setiap bulan?
        DB::Table('tb_pendapatan_setiap_bulan')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pendapatan_setiap_bulan')
        ->insert([
            'npm'                       => $request->npm,
            'dari_pekerjaan_utama'      => str_replace(",","",$request->pekerjaan_utama == null ? "" : $request->pekerjaan_utama),   //[D8_1]
            'dari_lembur'               => str_replace(",","",$request->lembur_tips == null ? "" : $request->lembur_tips),       //[D8_2]
            'dari_pekerjaan_lainnya'    => str_replace(",","",$request->pekerjaan_lainnya == null ? "" : $request->pekerjaan_lainnya)  //[D8_3]
        ]);

        //F14. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?
        $check_input_f14 = '';
        if($request->pertanyaanf14 != null){
            if($request->pertanyaanf14 == 1){
                $check_input_f14 = 'sangat_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 2){
                $check_input_f14 = 'erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 3){
                $check_input_f14 = 'cukup_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 4){
                $check_input_f14 = 'kurang_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 5){
                $check_input_f14 = 'tidak_sama_sekali';
                $request->pertanyaanf14 = 1;
            }
            DB::Table('tb_keselarasan_horizontal')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_horizontal')
            ->insert([
                'npm'               => $request->npm,
                $check_input_f14    => $request->pertanyaanf14,
            ]);
        }

        //E3. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?
        $check_input_f15 = '';
        if($request->pertanyaanf15 != null){
            if($request->pertanyaanf15 == 1){
                $check_input_f15 = 'setingkat_lebih_tinggi';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 2){
                $check_input_f15 = 'tingkat_yang_sama';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 3){
                $check_input_f15 = 'setingkat_lebih_rendah';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 4){
                $check_input_f15 = 'tidak_perlu_pendidikan_tinggi';
                $request->pertanyaanf15 = 1;
            }
            DB::Table('tb_keselarasan_vertical')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_vertical')
            ->insert([
                'npm'          => $request->npm,
                $check_input_f15 => $request->pertanyaanf15,
            ]);
        }

        //[D7] Bila berwirausaha, apa posisi/jabatan Anda saat ini? 
        //Apa tingkat tempat kerja Anda
        DB::Table('tb_berwirausaha')
        ->where('npm', $post['npm']) 
        ->delete();
        if( $request->posisi == null){
            $posisi = "";
        }else{
            $posisi = $request->posisi;
        }
        if( $request->tingkat == null){
            $tingkat = "";
        }else{
            $tingkat = $request->tingkat;
        }
        DB::table('tb_berwirausaha')
            ->insert([
            'npm'       => $request->npm,
            'posisi'    => $posisi,    //[D7]
            'tingkat'    => $tingkat
        ]);

        //Apabila Anda melanjutkan studi, sebutkan 
        DB::Table('lanjut_study')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('lanjut_study')
            ->insert([
            'npm'           => $request->npm,
            'biaya'         => $request->biaya == null ? "" : $request->biaya,
            'universitas'   => $request->universitas == null ? "" : $request->universitas,
            'prodi'         => $request->prodi == null ? "" : $request->prodi,
            'masuk_study'   => $request->masuk_study == null ? "" : $request->masuk_study
        ]);

        //F4. Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya?
        DB::Table('tb_pengambilan_pekerjaan_tidak_sesuai')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
        ->insert([
            'npm'   => $request->npm,
            'pertanyaan_tidak_sesuai_pekerjaan' => $request->pertanyaanf16_pertanyaan_tidak_sesuai_pekerjaan,
            'Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai' => $request->pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai,
            'di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik' => $request->pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik,
            'saya_lebih_suka_bekerja_di_area_pekerjaan' => $request->pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan,
            'saya_dipromosikan_ke_posisi_yang_kurang' => $request->pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang,
            'Saya_dapat_memeroleh_pendapatan' => $request->pertanyaanf16_Saya_dapat_memeroleh_pendapatan,
            'Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure,
            'Pekerjaan_saya_saat_ini_lebih_menarik' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik,
            'Pekerjaan_saya_saat_ini_lebih_memungkinkan' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan,
            'Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat,
            'Pekerjaan_saya_saat_ini_dapat_lebih' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih,
            'Pada_awal_meniti_karir_ini' => $request->pertanyaanf16_Pada_awal_meniti_karir_ini,
            'Lainnya' => $request->pertanyaanf16_Lainnya,
        ]);

        //Pada saat lulus, pada tigkat mana kompetensi di bawah ini yang Anda kuasai? (A)
        DB::Table('tb_kompetensia')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensia')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika,
            'keahlian'              =>$request->keahlian,
            'bahasa_inggris'        =>$request->bahasa_inggris,
            'penggunaan_ti'         =>$request->penggunaan_ti,
            'komunikasi'            =>$request->komunikasi,
            'kerjasama'             =>$request->kerjasama,
            'pengembangan_diri'     =>$request->pengembangan_diri, 
        ]);

        //Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? (B)
        DB::Table('tb_kompetensib')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensib')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika_b,
            'keahlian'              =>$request->keahlian_b,
            'bahasa_inggris'        =>$request->bahasa_inggris_b,
            'penggunaan_ti'         =>$request->penggunaan_ti_b,
            'komunikasi'            =>$request->komunikasi_b,
            'kerjasama'             =>$request->kerjasama_b,
            'pengembangan_diri'     =>$request->pengembangan_diri_b, 

        ]);

        //Menurut Anda, Bagaimana profil karakter kepribadian Anda dalam lingkungan kerja?
        DB::Table('tb_profil_karakter_kepribadian')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_profil_karakter_kepribadian')
        ->insert([
            'npm'                                   => $request->npm,
            'pekerjaandenganpenuhtanggungjawab'     => $request->tanggung_jawab,
            'Mampubekerjasamadalamtim'              => $request->bekerjasama,
            'Bersungguh_sungguh'                    => $request->bersungguhsungguh,
            'Bekerjakerassesuaidengankompetensi'    => $request->bekerjakeras,
            'Tolerandanmampumenerima'               => $request->toleran,
            'Meletakkansegalasesuatu'               => $request->meletakkansegalasesuatu,
            'Kreatifdaninovatif'                    => $request->kreatifdaninovatif,
            'Mampumembuatkeputusanterbaik'          => $request->keputusanterbaik,
        ]);

        //Apakah Anda pernah menjabat dalam suatu organisasi kemahasiswaan ataupun organisasi ke-NU-an?
        DB::Table('tb_organisasi_nu')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_organisasi_nu')
            ->insert([
            'npm'           => $request->npm,
            'organisasi_nu' => $request->organisasikemahasiswaanNU == null ? "" : $request->organisasikemahasiswaanNU
        ]);

        //Organisasi apa yang pernah saudara ikuti selama kuliah di Unisma dan sebagai apa?
        DB::Table('tb_organisasi_kemahasiswaan_yang_diikuti')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_organisasi_kemahasiswaan_yang_diikuti')
            ->insert([
            'npm'           => $request->npm,
            'organisasi'    => $request->organisasi_dalam_kemahasiswaan == null ? "" : $request->organisasi_dalam_kemahasiswaan
        ]);

        //Apakah keikutsertaan saudara dalam organisasi tersebut berpengaruh terhadap capaian karir saat ini? 
        DB::Table('tb_pengaruh_organisasi')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pengaruh_organisasi')
            ->insert([
            'npm'                   => $request->npm,
            'pengaruh_organisasi'   => $request->pengaruh_organisasi == null ? "" : $request->pengaruh_organisasi
        ]);

        return redirect('view_finish');
    }

    public function submit_tracer_s1_1th(Request $request){
        $post = $request->all();
        DB::table('tb_mahasiswa')->where('npm', $post['npm'])
        ->update([
            'nik'               => $request->nik,
            'npwp'              => $request->npwp,
            'tahun_masuk'       => $request->tahun_masuk,
            'tahun_lulus'       => $request->tahun_lulus == null ? "" : $request->tahun_lulus,
            'email'             => $request->email,
            'no_hp'             => $request->no_whatsapp,
            'alamat'            => $request->alamat,
            'jk'                => $request->jeniskelamin
        ]);

        //1. Jelaskan status Anda saat ini?
        //6. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang? 
        //7. Apa nama perusahaan tempat anda bekerja saat ini?
        //4. 5. Dimana lokasi tempat Anda bekerja? 
        //8. Siapa nama atasan langsung anda?
        //9. Mohon menuliskan kontak HP atasan langsung Anda
        DB::Table('tb_data_alumni_sudah_bekerja')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_data_alumni_sudah_bekerja') 
        ->insert([
            'npm'                       => $request->npm,
            'status'                    => $request->status_kerja == null ? "" : $request->status_kerja,
            'jenis_perusahaan'          => $request->jenis_perusahaan == null ? "" : $request->jenis_perusahaan,
            'nama_perusahaan'           => $request->nama_perusahaan == null ? "" : $request->nama_perusahaan,
            'prov_perusahaan'           => $request->prov_perusahaan == null ? "" : $request->prov_perusahaan,
            'kota_perusahaan'           => $request->kota_perusahaan == null ? "" : $request->kota_perusahaan,
            'nama_atasan'               => $request->nama_atasan_langsung == null ? "" : $request->nama_atasan_langsung,
            'nomor_hp_atasan'           => $request->no_hp_atasan == null ? "" : $request->no_hp_atasan
        ]);

        //2. Sebutkan sumberdana dalam pembiayaan kuliah?
        DB::Table('tb_pembiayaan_kuliah')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pembiayaan_kuliah')
        ->insert([
            'npm'          => $request->npm,
            'pembiayaan'   => $request->pertanyaanf12 == null ? "" : $request->pertanyaanf12,

        ]);
        
        //3. Dalam berapa bulan Anda mendapatkan pekerjaan?
        DB::Table('tb_masa_tunggu')
        ->where('npm', $post['npm'])
        ->delete();
        if($request->pertanyaanf5input != ''){
        DB::table('tb_masa_tunggu')
        ->insert([
            'npm'         => $request->npm,
            'masa_tunggu' => $request->pertanyaan2_f5 == null ? "" : $request->pertanyaan2_f5,
            'bulan'       => $request->pertanyaanf5input == null ? "" : $request->pertanyaanf5input
            ]);
        }else{
        DB::table('tb_masa_tunggu')
        ->insert([
            'npm'         => $request->npm,
            'masa_tunggu' => $request->pertanyaan2_f5 == null ? "" : $request->pertanyaan2_f5,
            'bulan'       => $request->pertanyaanf5input2 == null ? "" : $request->pertanyaanf5input2
            ]);
        }

        //10. Berapa rata-rata pendapatan Anda per bulan? (take home pay)
        DB::Table('tb_pendapatan_setiap_bulan')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pendapatan_setiap_bulan')
        ->insert([
            'npm'                       => $request->npm,
            'dari_pekerjaan_utama'      => str_replace(",","",$request->pekerjaan_utama == null ? "" : $request->pekerjaan_utama)
        ]);

        //11. Bila berwirausaha, apa posisi/jabatan Anda saat ini? 
        //12. Apa tingkat tempat kerja Anda
        DB::Table('tb_berwirausaha')
        ->where('npm', $post['npm'])
        ->delete();
        if( $request->posisi == null){
            $posisi = "";
        }else{
            $posisi = $request->posisi;
        }
        if( $request->tingkat == null){
            $tingkat = "";
        }else{
            $tingkat = $request->tingkat;
        }
        DB::table('tb_berwirausaha')
            ->insert([
            'npm'       => $request->npm,
            'posisi'    => $posisi,    //[D7]
            'tingkat'    => $tingkat
        ]);

        //Apabila Anda melanjutkan studi, sebutkan 
        //13. Di Perguruan Tinggi mana Anda melanjutkan studi lanjut?
        //14. Di program studi mana Anda melanjutkan studi lanjut?
        //15. Kapan Anda memulai studi lanjut? (isian tanggal mm/dd/yyyy)
        //16. Sebutkan sumber biaya Anda melanjutka studi lanjut?
        DB::Table('lanjut_study')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('lanjut_study')
            ->insert([
            'npm'           => $request->npm,
            'biaya'         => $request->biaya == null ? "" : $request->biaya,
            'universitas'   => $request->universitas == null ? "" : $request->universitas,
            'prodi'         => $request->prodi == null ? "" : $request->prodi,
            'masuk_study'   => $request->masuk_study == null ? "" : $request->masuk_study
        ]);

        //17. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?
        $check_input_f14 = '';
        if($request->pertanyaanf14 != null){
            if($request->pertanyaanf14 == 1){
                $check_input_f14 = 'sangat_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 2){
                $check_input_f14 = 'erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 3){
                $check_input_f14 = 'cukup_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 4){
                $check_input_f14 = 'kurang_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 5){
                $check_input_f14 = 'tidak_sama_sekali';
                $request->pertanyaanf14 = 1;
            }
            DB::Table('tb_keselarasan_horizontal')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_horizontal')
            ->insert([
                'npm'               => $request->npm,
                $check_input_f14    => $request->pertanyaanf14 == null ? "" : $request->pertanyaanf14,
            ]);
        }

        //18. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?
        $check_input_f15 = '';
        if($request->pertanyaanf15 != null){
            if($request->pertanyaanf15 == 1){
                $check_input_f15 = 'setingkat_lebih_tinggi';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 2){
                $check_input_f15 = 'tingkat_yang_sama';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 3){
                $check_input_f15 = 'setingkat_lebih_rendah';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 4){
                $check_input_f15 = 'tidak_perlu_pendidikan_tinggi';
                $request->pertanyaanf15 = 1;
            }
            DB::Table('tb_keselarasan_vertical')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_vertical')
            ->insert([
                'npm'          => $request->npm,
                $check_input_f15 => $request->pertanyaanf15 == null ? "" : $request->pertanyaanf15,
            ]);
        }

        //19. Pada saat lulus, pada tigkat mana kompetensi di bawah ini yang Anda kuasai? (A)
        DB::Table('tb_kompetensia')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensia')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika == null ? "" : $request->etika,
            'keahlian'              =>$request->keahlian == null ? "" : $request->keahlian,
            'bahasa_inggris'        =>$request->bahasa_inggris == null ? "" : $request->bahasa_inggris,
            'penggunaan_ti'         =>$request->penggunaan_ti == null ? "" : $request->penggunaan_ti,
            'komunikasi'            =>$request->komunikasi == null ? "" : $request->komunikasi,
            'kerjasama'             =>$request->kerjasama == null ? "" : $request->kerjasama,
            'pengembangan_diri'     =>$request->pengembangan_diri == null ? "" : $request->pengembangan_diri, 
        ]);

        //20. Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? (B)
        DB::Table('tb_kompetensib')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensib')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika_b == null ? "" : $request->etika_b,
            'keahlian'              =>$request->keahlian_b == null ? "" : $request->keahlian_b,
            'bahasa_inggris'        =>$request->bahasa_inggris_b == null ? "" : $request->bahasa_inggris_b,
            'penggunaan_ti'         =>$request->penggunaan_ti_b == null ? "" : $request->penggunaan_ti_b,
            'komunikasi'            =>$request->komunikasi_b == null ? "" : $request->komunikasi_b,
            'kerjasama'             =>$request->kerjasama_b == null ? "" : $request->kerjasama_b,
            'pengembangan_diri'     =>$request->pengembangan_diri_b == null ? "" : $request->pengembangan_diri_b, 

        ]);

        return redirect('view_finish');
    }

    public function submit_tracer_s2s3(Request $request){
        $post = $request->all();
        DB::table('tb_mahasiswa')->where('npm', $post['npm'])
        ->update([
            'nik'               => $request->nik,
            'npwp'              => $request->npwp,
            'tahun_masuk'       => $request->tahun_masuk,
            'tahun_lulus'       => $request->tahun_lulus == null ? "" : $request->tahun_lulus,
            'email'             => $request->email,
            'no_hp'             => $request->no_whatsapp,
            'alamat'            => $request->alamat,
            'jk'                => $request->jeniskelamin
        ]);

        //KARAKTERISTIK SOSIO-BIOGRAFI
        DB::Table('tb_riwayat_s1')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_riwayat_s1')
        ->insert([
            'npm'              => $request->npm,
            'univs1'           => $request->univs1 == null ? "" : $request->univs1, //Apa nama Perguruan Tinggi terakhir sebelum menempuh pendidikan di S2 UNISMA?
            'prodis1'          => $request->prodis1 == null ? "" : $request->prodis1,    //Apa Program Studi yang Anda ambil sebelum menempuh pendidikan di S2 UNISMA?
            'masuks1'          => $request->masuks1 == null ? "" : $request->masuks1,    //Tahun berapa Anda lulus S1?
            'riwayat_kerja'    => $request->riwayat_kerja == null ? "" : $request->riwayat_kerja   //Apakah Anda bekerja sebelum kuliah di S2 UNISMA?
        ]);

        //KEGIATAN PENDIDIKAN DAN PENGALAMAN PEMBELAJARAN
        DB::Table('tb_kesesuaian')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kesesuaian')
        ->insert([
            'npm'       => $request->npm,
            'sesuailb'  => $request->sesuailb == null ? "" : $request->sesuailb, //Apakah pendidikan yang diambil di S2 Unisma sesuai dengan latar belakang pendidikan Anda?
            'sesuaibp'  => $request->sesuaibp == null ? "" : $request->sesuaibp    //Apakah pendidikan yang diambil di S2 Unisma sesuai dengan bidang pekerjaan Anda saat ini?
        ]);

        //B8. Menurut Anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi Anda?
        DB::Table('tb_penekanan_metode_pembelajaran')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_penekanan_metode_pembelajaran')
        ->insert([
            'npm'                        => $request->npm,
            'perkuliahan'                => $request->kuliah == null ? "" : $request->kuliah,
            'demontrasi'                 => $request->demontrasi == null ? "" : $request->demontrasi,
            'partisipasi_riset'          => $request->riset == null ? "" : $request->riset,
            'praktikum'                  => $request->praktikum == null ? "" : $request->praktikum,
            'kerja_lapangan'             => $request->kerja_lapangan == null ? "" : $request->kerja_lapangan,
            'magang'                     => $request->magang == null ? "" : $request->magang,
            'diskusi'                    => $request->diskusi == null ? "" : $request->diskusi,
        ]);

        //Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? 
        DB::Table('tb_penilaian_belajar_mengajar')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_penilaian_belajar_mengajar')
        ->insert([
            'npm'                       => $request->npm,
            'interaksi_dosen'           => $request->interaksi_dosen == null ? "" : $request->interaksi_dosen,
            'bimbingan_akademik'        => $request->bimbingan_akademik == null ? "" : $request->bimbingan_akademik,
            'proyek_riset'              => $request->proyek_riset == null ? "" : $request->proyek_riset,
            'jejaring_ilmiah'           => $request->jejaring_ilmiah == null ? "" : $request->jejaring_ilmiah,
            'kondisi_belajar'           => $request->kondisi_belajar == null ? "" : $request->kondisi_belajar,
            'interaksi_teman'           => $request->interaksi_teman == null ? "" : $request->interaksi_teman,
            'partisipasi_pelayanan'     => $request->partisipasi_pelayanan == null ? "" : $request->partisipasi_pelayanan,
            'lainnya'                   => $request->lainnya == null ? "" : $request->lainnya
        ]);

        //Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini? 
        DB::Table('tb_penilaian_fasilitas_belajar')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_penilaian_fasilitas_belajar')
        ->insert([
            'npm'                   => $request->npm,
            'perpustakaan'          => $request->perpustakaan == null ? "" : $request->perpustakaan,
            'tik'                   => $request->tik == null ? "" : $request->tik,
            'modul'                 => $request->modul == null ? "" : $request->modul,
            'ruang_belajar'         => $request->ruang_belajar == null ? "" : $request->ruang_belajar,
            'ruang_kuliah'          => $request->ruang_kuliah == null ? "" : $request->ruang_kuliah,
            'lab'                   => $request->lab == null ? "" : $request->lab,
            'variasi'               => $request->variasi == null ? "" : $request->variasi,
            'akomodasi'             => $request->akomodasi == null ? "" : $request->akomodasi,
            'kantin'                => $request->kantin == null ? "" : $request->kantin,
            'kegiatan_mahasiswa'    => $request->kegiatan_mahasiswa == null ? "" : $request->kegiatan_mahasiswa,
            'layanan_kesehatan'     => $request->layanan_kesehatan == null ? "" : $request->layanan_kesehatan,
            'biaya_hidup'           => $request->biaya_hidup == null ? "" : $request->biaya_hidup,
            'parkir'                => $request->parkir == null ? "" : $request->parkir,
            'transport'             => $request->transport == null ? "" : $request->transport,
            'toilet'                => $request->toilet == null ? "" : $request->toilet,
            'ibadah'                => $request->ibadah == null ? "" : $request->ibadah
        ]);

        //Bagaimana penilaian Anda terhadap pengalaman belajar di bawah ini? 
        DB::Table('tb_penilaian_pengalaman_belajar')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_penilaian_pengalaman_belajar')
        ->insert([
            'npm'                           => $request->npm,
            'kelas'                         => $request->kelas == null ? "" : $request->kelas,
            'magang_kerja'                  => $request->magang_kerja == null ? "" : $request->magang_kerja,
            'pengabdian'                    => $request->pengabdian == null ? "" : $request->pengabdian,
            'organisasi_internal'           => $request->organisasi_internal == null ? "" : $request->organisasi_internal,
            'thesis'                        => $request->thesis == null ? "" : $request->thesis,
            'organisasi_lintas'             => $request->organisasi_lintas == null ? "" : $request->organisasi_lintas,
            'organisasi_lintas_nasional'    => $request->organisasi_lintas_nasional == null ? "" : $request->organisasi_lintas_nasional,
            'organisasi_lintas_negara'      => $request->organisasi_lintas_negara == null ? "" : $request->organisasi_lintas_negara,
            'ekstrakurikuler'               => $request->ekstrakurikuler == null ? "" : $request->ekstrakurikuler,
            'olahraga'                      => $request->olahraga == null ? "" : $request->olahraga
        ]);
        
        //Apakah Anda sudah mempunyai pekerjaan saat lulus S2 UNISMA?
        //Apakah Anda pindah ke pekerjaan baru setelah lulus S2 UNISMA?
        DB::Table('tb_pekerjaan_s2')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pekerjaan_s2')
        ->insert([
            'npm'           => $request->npm,
            'sudah_kerja'   => $request->sudah_kerja == null ? "" : $request->sudah_kerja,
            'pindah_kerja'  => $request->pindah_kerja == null ? "" : $request->pindah_kerja
        ]);

        //Kapan anda mulai mencari pekerjaan?
        DB::Table('tb_waktu_mulai_mencari_pekerjaan')
        ->where('npm', $post['npm'])
        ->delete();
        if($request->pertanyaanf3_input_sebelum != ''){
            DB::table('tb_waktu_mulai_mencari_pekerjaan')
            ->insert([
                'npm'                           => $request->npm,
                'waktu_mulai_mencari_pekerjaan' => $request->pertanyaan_f3 == null ? "" : $request->pertanyaan_f3,
                'bulan'                         => $request->pertanyaanf3_input_sebelum == null ? "" : $request->pertanyaanf3_input_sebelum
                ]);
        }else{
            DB::table('tb_waktu_mulai_mencari_pekerjaan')
            ->insert([
                'npm'                           => $request->npm,
                'waktu_mulai_mencari_pekerjaan' => $request->pertanyaan_f3 == null ? "" : $request->pertanyaan_f3,
                'bulan'                         => $request->pertanyaanf3_input_setelah == null ? "" : $request->pertanyaanf3_input_setelah
                ]);
        }

        //Bagaimana Anda mencari/mendapatkan pekerjaan setelah lulus S2 UNISMA? Jawaban bisa lebih dari satu
        DB::Table('tb_cara_memperoleh_pekerjaan')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_cara_memperoleh_pekerjaan')
        ->insert([ 
            'npm'                               => $request->npm,
            'melalui_iklan'                     => $request->pertanyaanf4_iklan == null ? "" : $request->pertanyaanf4_iklan,
            'melamar_keperusahaan'              => $request->pertanyaanf4_melamar == null ? "" : $request->pertanyaanf4_melamar,
            'pergi_kebursa'                     => $request->pertanyaanf4_pergi == null ? "" : $request->pertanyaanf4_pergi,
            'mencari_lewat_internet'            => $request->pertanyaanf4_mencari == null ? "" : $request->pertanyaanf4_mencari,
            'dihubungi_oleh_perusahaan'         => $request->pertanyaanf4_dihubungi == null ? "" : $request->pertanyaanf4_dihubungi,
            'menghubungi_kemenakertrans'        => $request->pertanyaanf4_menghubungi_kemenakertrans == null ? "" : $request->pertanyaanf4_menghubungi_kemenakertrans,
            'menghubungi_agen_tenaga_kerja'     => $request->pertanyaanf4_menghubungi_agen_tenaga_kerja == null ? "" : $request->pertanyaanf4_menghubungi_agen_tenaga_kerja,
            'memeroleh_informasi_dari_pusat'    => $request->pertanyaanf4_memeroleh == null ? "" : $request->pertanyaanf4_memeroleh,
            'menghubungi_kantor_kemahasiswaan'  => $request->pertanyaanf4_menghubungi_kantor == null ? "" : $request->pertanyaanf4_menghubungi_kantor,
            'membangun_jejaring'                => $request->pertanyaanf4_membangun_jejaring == null ? "" : $request->pertanyaanf4_membangun_jejaring,
            'melalui_relasi'                    => $request->pertanyaanf4_melalui == null ? "" : $request->pertanyaanf4_melalui,
            'membangun_bisnis_sendiri'          => $request->pertanyaanf4_membangun_bisnis == null ? "" : $request->pertanyaanf4_membangun_bisnis,
            'melalui_penempatan_kerja_magang'   => $request->pertanyaanf4_melalui_magang == null ? "" : $request->pertanyaanf4_melalui_magang,
            'bekerja_ditempat_yang_sama'        => $request->pertanyaanf4_bekerja_tempat_sama == null ? "" : $request->pertanyaanf4_bekerja_tempat_sama,
            'ditawari_pekerjaan_baru'           => $request->pertanyaanf4_ditawari_pekerjaan_baru == null ? "" : $request->pertanyaanf4_ditawari_pekerjaan_baru,
            'lainnya'                           => $request->pertanyaanf4_lainnya == null ? "" : $request->pertanyaanf4_lainnya
        ]);

        //Bagaimana Anda menggambarkan situasi Anda saat ini?
        //Apa nama perusahaan tempat anda bekerja?
        //Dimana lokasi tempat Anda bekerja? 
        //Siapa nama atasan langsung anda?
        //Mohon menuliskan kontak HP atasan langsung Anda
        DB::Table('tb_data_alumni_sudah_bekerja')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_data_alumni_sudah_bekerja') 
        ->insert([
            'npm'                       => $request->npm,
            'status'                    => $request->status_kerja == null ? "" : $request->status_kerja,
            'nama_perusahaan'           => $request->nama_perusahaan == null ? "" : $request->nama_perusahaan,
            'prov_perusahaan'           => $request->prov_perusahaan == null ? "" : $request->prov_perusahaan,
            'kota_perusahaan'           => $request->kota_perusahaan == null ? "" : $request->kota_perusahaan,
            'nama_atasan'               => $request->nama_atasan_langsung == null ? "" : $request->nama_atasan_langsung,
            'nomor_hp_atasan'           => $request->no_hp_atasan == null ? "" : $request->no_hp_atasan
        ]);

        //Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?
        DB::Table('tb_jenis_tempat_bekerja_saat_ini')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_jenis_tempat_bekerja_saat_ini')
        ->insert([
            'npm'                       => $request->npm,
            'wirausaha_ijin'            => $request->wiraswastaijintidakberijin == null ? null : implode(',',$request->wiraswastaijintidakberijin),
            'wirausaha_lokal'           => $request->wiraswastalokal_nasional == null ? null : implode(',',$request->wiraswastalokal_nasional),
            'perusahaan_swasta_ijin'    => $request->perusahaanswasta == null ? null : implode(',',$request->perusahaanswasta),
            'perusahaan_lokal'          => $request->perusahaanlokalnasional == null ? null : implode(',',$request->perusahaanlokalnasional),
            'instansi_pemerintah_bumn'  => $request->bumn == null ? null : implode(',',$request->bumn),
            'organisasi_non_profit'     => $request->organisasi_non_profit == null ? null : implode(',',$request->organisasi_non_profit),
        ]);

        //Berapa nominal pendapatan Anda dari pekerjaan utama setiap bulan?
        //Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S2 UNISMA?
        DB::Table('tb_pendapatan_setiap_bulan')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pendapatan_setiap_bulan')
        ->insert([
            'npm'                       => $request->npm,
            'dari_pekerjaan_utama'      => str_replace(",","",$request->pekerjaan_utama == null ? "" : $request->pekerjaan_utama),   
            'kenaikan_s2'               => str_replace(",","",$request->kenaikan_s2 == null ? "" : $request->kenaikan_s2),       
        ]);

        
        //Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bawah ini yang Anda kuasai? (A)
        DB::Table('tb_kompetensia')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensia')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika == null ? "" : $request->etika,
            'keahlian'              =>$request->keahlian == null ? "" : $request->keahlian,
            'bahasa_inggris'        =>$request->bahasa_inggris == null ? "" : $request->bahasa_inggris,
            'penggunaan_ti'         =>$request->penggunaan_ti == null ? "" : $request->penggunaan_ti,
            'komunikasi'            =>$request->komunikasi == null ? "" : $request->komunikasi,
            'kerjasama'             =>$request->kerjasama == null ? "" : $request->kerjasama,
            'pengembangan_diri'     =>$request->pengembangan_diri == null ? "" : $request->pengembangan_diri, 
        ]);

        //Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bwah ini diperlukan dalam pekerjaan? (B)
        DB::Table('tb_kompetensib')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_kompetensib')
        ->insert([
            'npm'                   => $request->npm,
            'etika'                 =>$request->etika_b == null ? "" : $request->etika_b,
            'keahlian'              =>$request->keahlian_b == null ? "" : $request->keahlian_b,
            'bahasa_inggris'        =>$request->bahasa_inggris_b == null ? "" : $request->bahasa_inggris_b,
            'penggunaan_ti'         =>$request->penggunaan_ti_b == null ? "" : $request->penggunaan_ti_b,
            'komunikasi'            =>$request->komunikasi_b == null ? "" : $request->komunikasi_b,
            'kerjasama'             =>$request->kerjasama_b == null ? "" : $request->kerjasama_b,
            'pengembangan_diri'     =>$request->pengembangan_diri_b == null ? "" : $request->pengembangan_diri_b, 
        ]);

        //Seberapa besar peran kompetensi yang diperoleh di S2 UNISMA berikut ini dalam melaksanakan pekerjaan Anda?
        DB::Table('peran_kompetensi')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('peran_kompetensi')
        ->insert([
            'npm'                       => $request->npm,
            'multidisiplin'             => $request->multidisiplin == null ? "" : $request->multidisiplin,
            'isu_terkini'               => $request->isu_terkini == null ? "" : $request->isu_terkini,
            'keterampilan_internet'     => $request->keterampilan_internet == null ? "" : $request->keterampilan_internet,
            'keterampilan_komputer'     => $request->keterampilan_komputer == null ? "" : $request->keterampilan_komputer,
            'berfikir_kritis'           => $request->berfikir_kritis == null ? "" : $request->berfikir_kritis,
            'keterampilan_riset'        => $request->keterampilan_riset == null ? "" : $request->keterampilan_riset,
            'kemampuan_belajar'         => $request->kemampuan_belajar == null ? "" : $request->kemampuan_belajar,
            'kemampuan_komunikasi'      => $request->kemampuan_komunikasi == null ? "" : $request->kemampuan_komunikasi,
            'di_bawah_tekanan'          => $request->di_bawah_tekanan == null ? "" : $request->di_bawah_tekanan,
            'manajemen_waktu'           => $request->manajemen_waktu == null ? "" : $request->manajemen_waktu,
            'bekerja_mandiri'           => $request->bekerja_mandiri == null ? "" : $request->bekerja_mandiri,
            'bekerja_tim'               => $request->bekerja_tim == null ? "" : $request->bekerja_tim,
            'pemecahan_masalah'         => $request->pemecahan_masalah == null ? "" : $request->pemecahan_masalah,
            'negosiasi'                 => $request->negosiasi == null ? "" : $request->negosiasi,
            'analisis'                  => $request->analisis == null ? "" : $request->analisis,
            'toleransi'                 => $request->toleransi == null ? "" : $request->toleransi,
            'adaptasi'                  => $request->adaptasi == null ? "" : $request->adaptasi,
            'loyalitas'                 => $request->loyalitas == null ? "" : $request->loyalitas,
            'integritas'                => $request->integritas == null ? "" : $request->integritas,
            'beda_budaya'               => $request->beda_budaya == null ? "" : $request->beda_budaya,
            'kepemimpinan'              => $request->kepemimpinan == null ? "" : $request->kepemimpinan,
            'tanggungjawab'             => $request->tanggungjawab == null ? "" : $request->tanggungjawab,
            'inisiatif'                 => $request->inisiatif == null ? "" : $request->inisiatif,
            'manajemen_proyek'          => $request->manajemen_proyek == null ? "" : $request->manajemen_proyek,
            'presentasi'                => $request->presentasi == null ? "" : $request->presentasi,
            'menulis_laporan'           => $request->menulis_laporan == null ? "" : $request->menulis_laporan,
            'belajar_sepanjang_hayat'   => $request->belajar_sepanjang_hayat == null ? "" : $request->belajar_sepanjang_hayat,
            'berbahasa_inggris'         => $request->berbahasa_inggris == null ? "" : $request->berbahasa_inggris
        ]);

        //Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?
        $check_input_f14 = '';
        if($request->pertanyaanf14 != null){
            if($request->pertanyaanf14 == 1){
                $check_input_f14 = 'sangat_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 2){
                $check_input_f14 = 'erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 3){
                $check_input_f14 = 'cukup_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 4){
                $check_input_f14 = 'kurang_erat';
                $request->pertanyaanf14 = 1;
            }else if($request->pertanyaanf14 == 5){
                $check_input_f14 = 'tidak_sama_sekali';
                $request->pertanyaanf14 = 1;
            }
            DB::Table('tb_keselarasan_horizontal')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_horizontal')
            ->insert([
                'npm'               => $request->npm,
                $check_input_f14    => $request->pertanyaanf14 == null ? "" : $request->pertanyaanf14
            ]);
        }

        //Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?
        $check_input_f15 = '';
        if($request->pertanyaanf15 != null){
            if($request->pertanyaanf15 == 1){
                $check_input_f15 = 'setingkat_lebih_tinggi';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 2){
                $check_input_f15 = 'tingkat_yang_sama';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 3){
                $check_input_f15 = 'setingkat_lebih_rendah';
                $request->pertanyaanf15 = 1;
            }else if($request->pertanyaanf15 == 4){
                $check_input_f15 = 'tidak_perlu_pendidikan_tinggi';
                $request->pertanyaanf15 = 1;
            }
            DB::Table('tb_keselarasan_vertical')
            ->where('npm', $post['npm'])
            ->delete();
            DB::table('tb_keselarasan_vertical')
            ->insert([
                'npm'          => $request->npm,
                $check_input_f15 => $request->pertanyaanf15 == null ? "" : $request->pertanyaanf15
            ]);
        }

        //Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya?
        DB::Table('tb_pengambilan_pekerjaan_tidak_sesuai')
        ->where('npm', $post['npm'])
        ->delete();
        DB::table('tb_pengambilan_pekerjaan_tidak_sesuai')
        ->insert([
            'npm'   => $request->npm,
            'pertanyaan_tidak_sesuai_pekerjaan' => $request->pertanyaanf16_pertanyaan_tidak_sesuai_pekerjaan,
            'Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai' => $request->pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai,
            'di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik' => $request->pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik,
            'saya_lebih_suka_bekerja_di_area_pekerjaan' => $request->pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan,
            'saya_dipromosikan_ke_posisi_yang_kurang' => $request->pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang,
            'Saya_dapat_memeroleh_pendapatan' => $request->pertanyaanf16_Saya_dapat_memeroleh_pendapatan,
            'Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure,
            'Pekerjaan_saya_saat_ini_lebih_menarik' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik,
            'Pekerjaan_saya_saat_ini_lebih_memungkinkan' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan,
            'Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat,
            'Pekerjaan_saya_saat_ini_dapat_lebih' => $request->pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih,
            'Pada_awal_meniti_karir_ini' => $request->pertanyaanf16_Pada_awal_meniti_karir_ini,
            'Lainnya' => $request->pertanyaanf16_Lainnya,
        ]);

        return redirect('view_finish');

    }
    public function submit_perusahaan(Request $request){
        $post = $request->all();
        $id_perusahaan = uniqid(); //generate ID

        //Informasi Perusahaan
        DB::table('tb_perusahaan')
        ->insert([
            'id_perusahaan'     => $id_perusahaan,
            'nama'              => $request->nama, //Nama Lengkap
            'email'             => $request->email, //Alamat Email
            'no_whatsapp'       => $request->no_whatsapp, //No HP (Whatsapp)
            'alamat'            => $request->alamat, //Alamat lengkap
            'jeniskelamin'      => $request->jeniskelamin, //Jenis Kelamin
            'jabatan'           => $request->jabatan == null ? "" : $request->jabatan, //Jabatan
            'nama_perusahaan'   => $request->nama_perusahaan == null ? "" : $request->nama_perusahaan, //Nama Perusahaan / kantor
            'alamat_perusahaan' => $request->alamat_perusahaan == null ? "" : $request->alamat_perusahaan, //Alamat Perusahaan / kantor
            'no_tel_kantor'     => $request->no_tel_kantor == null ? "" : $request->no_tel_kantor, //No telp Perusahaan / kantor
            'jumlah_lulusan'    => $request->jumlah_lulusan == null ? "" : $request->jumlah_lulusan, //Berapakah jumlah lulusan Universitas Islam Malang yang bekerja di perusahaan Anda ?
            'masa_kerja'        => $request->masa_kerja == null ? "" : $request->masa_kerja, //Berapakah rata-rata masa kerja lulusan Universitas Islam Malang yang bekerja di perusahaan Anda (dalam tahun) ?
            'gaji_awal'         => $request->gaji_awal == null ? "" : $request->gaji_awal, //Berapakah gaji/pendapatan awal yang diterima lulusan Universitas Islam Malang di perusahaan Anda (dalam jutaan rupiah) ?
            'ipk'               => $request->ipk == null ? "" : $request->ipk, //Berapakah nilai IPK (skala Kurang) minimal untuk bekerja di perusahaan Anda ?
            'masukan'           => $request->masukan == null ? "" : $request->masukan //Masukan apakah yang ingin Anda sampaikan kepada Unisma Malang untuk peningkatan mutu lulusan ? 
        ]);

        //Tingkat Kepuasan Pengguna Lulusan (sebagai atasan terhadap alumni yang bekerja di perusahaan anda)
        DB::table('tb_kepuasan_pengguna')
        ->insert([
            'id_perusahaan'       => $id_perusahaan,
            'etika'                 =>$request->etika == null ? "" : $request->etika,
            'keahlian'              =>$request->keahlian == null ? "" : $request->keahlian,
            'bahasa_inggris'        =>$request->bahasa_inggris == null ? "" : $request->bahasa_inggris,
            'penggunaan_ti'         =>$request->penggunaan_ti == null ? "" : $request->penggunaan_ti,
            'komunikasi'            =>$request->komunikasi == null ? "" : $request->komunikasi,
            'kerjasama'             =>$request->kerjasama == null ? "" : $request->kerjasama,
            'pengembangan_diri'     =>$request->pengembangan_diri == null ? "" : $request->pengembangan_diri
        ]);

        //Apakah nilai soft skill yang Anda inginkan dari lulusan Unisma Malang ?
        DB::table('soft_skill')
        ->insert([
            'id_perusahaan' => $id_perusahaan,
            'percara_diri'  => $request->percara_diri == null ? "" : $request->percara_diri, 
            'kepemimpinan'  => $request->kepemimpinan == null ? "" : $request->kepemimpinan, 
            'kejujuran'     => $request->kejujuran == null ? "" : $request->kejujuran, 
            'kedisiplinan'  => $request->kedisiplinan == null ? "" : $request->kedisiplinan, 
            'komunikasi'    => $request->komunikasi == null ? "" : $request->komunikasi, 
            'motivasi'      => $request->motivasi == null ? "" : $request->motivasi, 
            'adaptasi'      => $request->adaptasi == null ? "" : $request->adaptasi, 
            'tekanan'       => $request->tekanan == null ? "" : $request->tekanan
        ]);

        //Selain nilai soft skill, kriteria apakah yang Anda inginkan dari lulusan Unisma Malang ? 
        DB::table('kriteria')
        ->insert([
            'id_perusahaan' => $id_perusahaan,
            'krit_ipk'      => $request->krit_ipk == null ? "" : $request->krit_ipk, 
            'bahasa_asing'  => $request->bahasa_asing == null ? "" : $request->bahasa_asing, 
            'komputer'      => $request->komputer == null ? "" : $request->komputer, 
            'penghargaan'   => $request->penghargaan == null ? "" : $request->penghargaan, 
            'pengalaman'    => $request->pengalaman == null ? "" : $request->pengalaman, 
            'pelatihan'     => $request->pelatihan == null ? "" : $request->pelatihan, 
            'berkendara'    => $request->berkendara == null ? "" : $request->berkendara
        ]);
        
        return redirect('view_finish');        
    }
}