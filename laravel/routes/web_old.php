<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SearchMahasiswaController@index'); 
Route::get('perusahaan', 'SearchMahasiswaController@perusahaan'); 

//login
Route::get('admin-login', 'LoginController@index')->name('login')->middleware('access');
Route::post('post-login', 'LoginController@postLogin');
Route::match(['post', 'get'],'reg', 'LoginController@postRegister');

//select alamat
Route::get('/cari/kode_kota/{id_prov}', 'SelectController@load_kota');
Route::get('/cari/kota', 'SelectController@load_kota_no_prov');
Route::get('/cari/kode_prov', 'SelectController@load_prov');

Route::group(['middleware' => ['auth', 'loguser']], function(){
    //dashboard
    Route::get('dashboard', 'DashboardController@index');
    Route::get('filter_dashboard/{tahun_lulus}', 'DashboardController@filter_dashboard');
    Route::get('graph-record/{tahun_lulus}', 'DashboardController@graph_record');
    Route::get('logout', 'LoginController@logout');

    //user
    Route::resource('users','UserController');
    Route::get('datatable_users', 'UserController@show_data');
    Route::get('user/edit/{id}','UserController@edit'); 
    //data alumni yang sudah bekerja
    Route::get('data-alumni-sudah-bekerja', 'DataAlumniBekerjaController@index');
    Route::get('datatable_data_alumni_sudah_bekerja', 'DataAlumniBekerjaController@show_data');

    Route::get('datatable_pendapatan_perbulan', 'PendapatanPerbulanController@show_data');

    //roles
    Route::resource('roles','RoleController');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::get('datatable_roles', 'RoleController@show_data');
    Route::get('fetch', 'QuisionerController@fetch')->name('fetch');
    Route::get('/user/{username}', 'QuisionerController@view')->name('user.view');

    //master mahasiswa
    Route::get('data-mahasiswa', 'MasterMahasiswaController@index');
    Route::get('show_datatable_mahasiswa', 'MasterMahasiswaController@show_datatable');
    Route::get('get_user/{id_user}', 'UserController@AjaxDetail');
    Route::match(['get', 'post'], 'destroy_users', 'UserController@destroy');
    Route::match(['get', 'post'],'update_users', 'UserController@update');
    
    //select
    Route::get('/cari/kode_prodi/{id_fakultas}', 'SelectController@load_prodi');
    Route::get('/cari/prodi', 'SelectController@load_prodi_no_fakultas');
    Route::get('/cari/kode_fakultas', 'SelectController@load_fakultas');
    Route::get('/cari/filter_tahun', 'SelectController@filter_tahun');
    Route::match(['get', 'post'], 'simpan_users', 'UserController@simpan');

    //graph waktu mencari pekerjaan
    Route::get('waktu-mencari-pekerjaan', 'WaktuMencariPekerjaanController@index');
    Route::get('graph-waktu-mencari-pekerjaan/{tahun_lulus}', 'WaktuMencariPekerjaanController@graph');
    Route::get('datatable-waktu-mencari-pekerjaan', 'WaktuMencariPekerjaanController@show_data');

    //graph Pengguna Lulusan
    Route::get('pengguna-lulusan', 'PenggunaLulusanController@index');
    Route::get('datatable-pengguna-lulusan-1', 'PenggunaLulusanController@show_datatable1');
    Route::get('datatable-pengguna-lulusan-2', 'PenggunaLulusanController@show_datatable2');

    //graph tingkat kepuasan
    Route::get('tingkat-kepuasan', 'TingkatKepuasanController@index');
    Route::get('graph-tingkat-kepuasan', 'TingkatKepuasanController@graph');
    Route::get('datatable-tingkat-kepuasan', 'TingkatKepuasanController@show_data');
    
    //graph soft skill
    Route::get('soft-skill', 'SoftSkillController@index');
    Route::get('graph-soft-skill', 'SoftSkillController@graph');
    Route::get('datatable-soft-skill', 'SoftSkillController@show_data');

    //graph soft skill
    Route::get('kriteria', 'KriteriaController@index');
    Route::get('graph-kriteria', 'KriteriaController@graph');
    Route::get('datatable-kriteria', 'KriteriaController@show_data');

    //graph penekanan metode pembelajaran
    Route::get('penekanan-metode-pembelajaran', 'PenekananMetodePembelajaranController@index');
    Route::get('graph-penekanan-metode-pembelajaran/{tahun_lulus}', 'PenekananMetodePembelajaranController@graph');
    Route::get('datatable-penekanan-metode-pembelajaran', 'PenekananMetodePembelajaranController@show_data');
    
    //graph pbm
    Route::get('pbm', 'PBMController@index');
    Route::get('graph-pbm/{tahun_lulus}', 'PBMController@graph');
    Route::get('datatable-pbm', 'PBMController@show_data');

    //graph kondisi-fasilitas-belajar
    Route::get('kondisi-fasilitas-belajar', 'KFBController@index');
    Route::get('graph-kondisi-fasilitas-belajar/{tahun_lulus}', 'KFBController@graph');
    Route::get('datatable-kondisi-fasilitas-belajar', 'KFBController@show_data');

    //graph peran-kompetensi
    Route::get('peran-kompetensi', 'PeranKompetensiController@index');
    Route::get('graph-peran-kompetensi/{tahun_lulus}', 'PeranKompetensiController@graph');
    Route::get('datatable-peran-kompetensi', 'PeranKompetensiController@show_data');

    //graph pengalaman-belajar
    Route::get('pengalaman-belajar', 'PengalamanPelajarController@index');
    Route::get('graph-pengalaman-belajar/{tahun_lulus}', 'PengalamanPelajarController@graph');
    Route::get('datatable-pengalaman-belajar', 'PengalamanPelajarController@show_data');

    //graph transisi-dunia-kerja
    Route::get('transisi-dunia-kerja', 'TransisiDuniaKerja@index');
    Route::get('graph-transisi-dunia-kerja/{tahun_lulus}', 'TransisiDuniaKerja@graph');
    Route::get('datatable-transisi-dunia-kerja', 'TransisiDuniaKerja@show_data');

    //graph cara memperoleh pekerjaan
    Route::get('cara-memperoleh-pekerjaan', 'CaraMemperolehPekerjaanController@index');
    Route::get('datatable-cara-memperoleh-pekerjaan', 'CaraMemperolehPekerjaanController@show_data');
    Route::get('graph-cara-memperoleh-pekerjaan/{tahun_lulus}', 'CaraMemperolehPekerjaanController@graph');

    //graph masa tunggu
    Route::get('masa-tunggu', 'MasaTungguController@index');
    Route::get('graph-masa-tunggu/{tahun_lulus}', 'MasaTungguController@graph');
    Route::get('datatable-masa-tunggu', 'MasaTungguController@show_data');

    //graph situasi saat ini I
    Route::get('situasi-saat-ini-I', 'SituasiSaatIni1Controller@index');
    Route::get('graph-situasi-saat-ini-I/{tahun_lulus}', 'SituasiSaatIni1Controller@graph');
    Route::get('datatable-situasi-saat-ini-I', 'SituasiSaatIni1Controller@show_data');

    //graph situasi saat ini II
    Route::get('situasi-saat-ini-II', 'SituasiSaatIni2Controller@index');
    Route::get('graph-situasi-saat-ini-II/{tahun_lulus}', 'SituasiSaatIni2Controller@graph');
    Route::get('datatable-situasi-saat-ini-II', 'SituasiSaatIni2Controller@show_data');

    //graph pengangguran terbuka
    Route::get('pengangguran-terbuka', 'PengangguranTerbukaController@index');
    Route::get('graph-pengangguran-terbuka/{tahun_lulus}', 'PengangguranTerbukaController@graph');
    Route::get('datatable-pengangguran-terbuka', 'PengangguranTerbukaController@show_data');

    //graph jenis tempat kerja
    Route::get('jenis-tempat-bekerja', 'JenisTempatBekerjaSaatIniController@index');
    Route::get('graph-jenis-tempat-bekerja/{tahun_lulus}', 'JenisTempatBekerjaSaatIniController@graph');
    Route::get('datatable-jenis-tempat-bekerja', 'JenisTempatBekerjaSaatIniController@show_data');

    //graph pendapatan perbulan
    Route::get('pendapatan-perbulan', 'PendapatanPerbulanController@index');
    Route::get('graph-pendapatan-perbulan/{tahun_lulus}', 'PendapatanPerbulanController@graph');

    //graph keselarasan Horizontal
    Route::get('keselarasan-horizontal', 'KeselarasanHorizontalController@index');
    Route::get('graph-keselarasan-horizontal/{tahun_lulus}', 'KeselarasanHorizontalController@graph');
    Route::get('datatable-keselarasan-horizontal', 'KeselarasanHorizontalController@show_data');

    //graph keselarasan Vertical
    Route::get('keselarasan-vertical', 'KeselarasanVerticalController@index');
    Route::get('graph-keselarasan-vertical/{tahun_lulus}', 'KeselarasanVerticalController@graph');
    Route::get('datatable-keselarasan-vertical', 'KeselarasanVerticalController@show_data');

    //graph pengambilan pekerjaan tidak sesuai
    Route::get('pengambilan-pekerjaan-tidak-sesuai', 'AlasanPengambilanPekerjaanTidakSesuaiController@index');
    Route::get('graph-pengambilan-pekerjaan-tidak-sesuai/{tahun_lulus}', 'AlasanPengambilanPekerjaanTidakSesuaiController@graph');
    Route::get('datatable-pengambilan-pekerjaan-tidak-sesuai', 'AlasanPengambilanPekerjaanTidakSesuaiController@show_data');

    //graph organisasi kemahasiswaan
    Route::get('organisasi-kemahasiswaan', 'OrganisasiKemahasiswaanController@index');
    Route::get('graph-organisasi-kemahasiswaan/{tahun_lulus}', 'OrganisasiKemahasiswaanController@graph');
    Route::get('datatable-organisasi-kemahasiswaan', 'OrganisasiKemahasiswaanController@show_data');


    //graph pengurus kegiatan organisasi
    //Route::get('pengurus-kegiatan-organisasi', 'PengurusKegiatanOrganisasiController@index');
    //Route::get('datatable-pengurus-kegiatan-organisasi', 'PengurusKegiatanOrganisasiController@show_data');
    //Route::get('graph-pengurus-kegiatan-organisasi/{tahun_lulus}', 'PengurusKegiatanOrganisasiController@graph');

    //graph kemahasiswaan NU
    Route::get('kemahasiswaan-nu', 'KemahasiswaanNUController@index');
    Route::get('datatable-kemahasiswaan-nu', 'KemahasiswaanNUController@show_data');
    Route::get('graph-kemahasiswaan-nu/{tahun_lulus}', 'KemahasiswaanNUController@graph');

    //graph kemahasiswaan YA NU
    //Route::get('kemahasiswaan-ya-nu', 'KemahasiswaanYANUController@index');
    //Route::get('datatable-kemahasiswaan-ya-nu', 'KemahasiswaanYANUController@show_data');
    //Route::get('graph-kemahasiswaan-ya-nu/{tahun_lulus}', 'KemahasiswaanYANUController@graph');


    //graph berwirausaha
    Route::get('berwirausaha', 'PanitiaKegiatanOrganisasiController@index');
    Route::get('datatable-berwirausaha', 'PanitiaKegiatanOrganisasiController@show_data');
    Route::get('graph-berwirausaha/{tahun_lulus}', 'PanitiaKegiatanOrganisasiController@graph');

    //graph lanjut study
    Route::get('lanjut-study', 'PengurusKegiatanOrganisasiController@index');
    Route::get('datatable-lanjut-study', 'PengurusKegiatanOrganisasiController@show_data');
    Route::get('graph-lanjut-study/{tahun_lulus}', 'PengurusKegiatanOrganisasiController@graph');

    //graph pengaruh-organisasi
    Route::get('pengaruh-organisasi', 'PanitiaKegiatanOrganisasiNUController@index');
    Route::get('graph-pengaruh-organisasi/{tahun_lulus}', 'PanitiaKegiatanOrganisasiNUController@graph');
    Route::get('datatable-pengaruh-organisasi', 'PanitiaKegiatanOrganisasiNUController@show_data');
    
    //graph kesesuaian-pendidikan
    Route::get('kesesuaian-pendidikan', 'KesesuaianPendidikanController@index');
    Route::get('graph-kesesuaian-pendidikan/{tahun_lulus}', 'KesesuaianPendidikanController@graph');
    Route::get('datatable-kesesuaian-pendidikan', 'KesesuaianPendidikanController@show_data');

    //graph sebelum-kuliah
    Route::get('sebelum-kuliah', 'SebelumKuliahController@index');
    Route::get('graph-sebelum-kuliah/{tahun_lulus}', 'SebelumKuliahController@graph');
    Route::get('datatable-sebelum-kuliah', 'SebelumKuliahController@show_data');

    //profile
    Route::get('profile', 'ProfileController@index');
    Route::post('editPassword', 'ProfileController@editPassword');

    //filter pencarian
    Route::get('filter-pencarian', 'FilterPencarianController@index');
    Route::post('update_tahun', 'FilterPencarianController@update');

    //graph kemulusan transisi
    Route::get('kemulusan-transisi', 'KemulusanTransisiController@index');
    Route::get('graph-kemulusan-transisi/{tahun_lulus}', 'KemulusanTransisiController@graph');
    Route::get('datatable-kemulusan-transisi', 'KemulusanTransisiController@show_data');


    //graph profil karakter
    Route::get('profil-karakter', 'ProfilKarakterController@index');
    Route::get('graph-profil-karakter/{tahun_lulus}', 'ProfilKarakterController@graph');
    Route::get('datatable-profil-karakter', 'ProfilKarakterController@show_data');

    //graph kompetensi SB
    Route::get('kompetensi-AB', 'KompetensiABController@index');
    Route::get('graph-kompetensi-AB/{tahun_lulus}', 'KompetensiABController@graph');
    Route::get('datatable-kompetensi-A', 'KompetensiABController@show_data_kompetensi_a');
    Route::get('datatable-kompetensi-B', 'KompetensiABController@show_data_kompetensi_b');

    //graph pembiayaan kuliah
    Route::get('pembiayaan-kuliah', 'PembiayaanKuliahController@index');
    Route::get('graph-pembiayaan-kuliah/{tahun_lulus}', 'PembiayaanKuliahController@graph');
    Route::get('datatable-pembiayaan-kuliah', 'PembiayaanKuliahController@show_data');

    //graph fashboard
    Route::get('graph-dashboard/{tahun_lulus}', 'DashboardController@graph');

    //export excell
    Route::get('export_organisasi', 'OrganisasiKemahasiswaanController@exportExcel');
    Route::get('export_lanjut_study', 'PengurusKegiatanOrganisasiController@exportExcel');
    Route::get('export_berwirausaha', 'PanitiaKegiatanOrganisasiController@exportExcel');
    Route::get('export_kemahasiswaan_nu', 'KemahasiswaanNUController@exportExcel');
    Route::get('export_kemahasiswaan_ya_nu', 'KemahasiswaanYANUController@exportExcel');
    //Route::get('export_lanjut_study', 'PengurusKegiatanOrganisasiNUController@exportExcel');
    Route::get('export_pengaruh_organisasi', 'PanitiaKegiatanOrganisasiNUController@exportExcel');
    Route::get('export_sebelum_kuliah', 'SebelumKuliahController@exportExcel');
    Route::get('export_kesesuaian_pendidikan', 'KesesuaianPendidikanController@exportExcel');
    Route::get('export_pengguna_lulusan', 'PenggunaLulusanController@exportExcel');
    Route::get('export_penekanan_metode_pembelajaran', 'PenekananMetodePembelajaranController@exportExcel');
    Route::get('export_tingkat_kepuasan', 'TingkatKepuasanController@exportExcel');
    Route::get('export_soft_skill', 'SoftSkillController@exportExcel');
    Route::get('export_kriteria', 'KriteriaController@exportExcel');
    Route::get('export_pbm', 'PBMController@exportExcel');
    Route::get('export_kondisi_fasilitas_belajar', 'KFBController@exportExcel');
    Route::get('export_peran_kompetensi', 'PeranKompetensiController@exportExcel');
    Route::get('export_pengalaman_belajar', 'PengalamanPelajarController@exportExcel');
    Route::get('export_transisi_dunia_kerja', 'TransisiDuniaKerja@exportExcel');
    Route::get('export_waktu_mencari_pekerjaan', 'WaktuMencariPekerjaanController@exportExcel');
    Route::get('export_cara_memperoleh_pekerjaan', 'CaraMemperolehPekerjaanController@exportExcel');
    Route::get('export_masa_tunggu', 'MasaTungguController@exportExcel');
    Route::get('export_kemulusan_transisi', 'KemulusanTransisiController@exportExcel');
    Route::get('export_data_alumni_sudah_bekerja', 'DataAlumniBekerjaController@exportExcel');
    Route::get('export_situasi_saat_ini_1', 'SituasiSaatIni1Controller@exportExcel');
    Route::get('export_situasi_saat_ini_2', 'SituasiSaatIni2Controller@exportExcel');
    Route::get('export_pengangguran_terbuka', 'PengangguranTerbukaController@exportExcel');
    Route::get('export_jenis_tempat_kerja_saat_ini', 'JenisTempatBekerjaSaatIniController@exportExcel');
    Route::get('export_pendapatan_perbulan', 'PendapatanPerbulanController@exportExcel');
    Route::get('export_keselarasan_horizontal', 'KeselarasanHorizontalController@exportExcel');
    Route::get('export_keselarasan_vertical', 'KeselarasanVerticalController@exportExcel');
    Route::get('export_pengambilan_pekerjaan_tidak_sesuai', 'AlasanPengambilanPekerjaanTidakSesuaiController@exportExcel');
    Route::get('export_profil_karakter', 'ProfilKarakterController@exportExcel');
    Route::get('export_kompetensi_a', 'KompetensiABController@exportExcel_a');
    Route::get('export_kompetensi_b', 'KompetensiABController@exportExcel_b');
    Route::get('export_pembiayaan_kuliah', 'PembiayaanKuliahController@exportExcel');

});

//data alumni sudah input tracer
Route::get('alumni-sudah-input', 'DataAlumniInputController@index');
Route::get('export-alumni-sudah-input', 'DataAlumniInputController@exportExcel');
Route::get('datatable-alumni-sudah-input', 'DataAlumniInputController@show_data');
//submit tracer
Route::post('submit-perusahaan', 'QuisionerController@submit_perusahaan');
Route::post('submit-tracer', 'QuisionerController@submit_tracer_s1');
Route::post('submit-tracer-s2', 'QuisionerController@submit_tracer_s2s3');
Route::post('submit-tracer-s3', 'QuisionerController@submit_tracer_s2s3');
//get data quisioner
//quisioner
Route::get('quisioner/{nim}', 'QuisionerController@pageQuisioner');
Route::get('get_data_quisioner/{nim}', 'QuisionerController@get_data_quisioner');
Route::match(['get', 'post'], 'importAccount', 'MasterMahasiswaController@importAccount');
Route::post('search_mahasiswa', 'SearchMahasiswaController@searchMahasiswa');
Route::get('get_mahasiswa/{id_mahasiswa}', 'MasterMahasiswaController@AjaxDetail');
Route::match(['get', 'post'], 'simpan_mahasiswa', 'MasterMahasiswaController@simpan');
Route::match(['get', 'post'], 'update_mahasiswa', 'MasterMahasiswaController@update');
Route::match(['get', 'post'], 'destroy_mahasiswa', 'MasterMahasiswaController@destroy');
Route::delete('myproducts/{id}', 'MasterMahasiswaController@destroy_checkbox');

Route::get('show_fakultas', 'MasterMahasiswaController@show_fakultas');
Route::get('show_prodi', 'MasterMahasiswaController@show_prodi');

Route::get('data-fakultas', 'FakultasController@index');
Route::post('simpan-fakultas', 'FakultasController@simpan');
Route::post('update-fakultas', 'FakultasController@update');
Route::post('destroy-fakultas', 'FakultasController@destroy');
Route::get('datatable_fakultas', 'FakultasController@show_data');
Route::get('get_fakultas/{id_fakultas}', 'FakultasController@AjaxDetail');

Route::get('data-prodi', 'ProdiController@index');
Route::get('datatable_prodi', 'ProdiController@show_data');
Route::post('simpan-prodi', 'ProdiController@simpan');
Route::post('update-prodi', 'ProdiController@update');
Route::post('destroy-prodi', 'ProdiController@destroy');
Route::get('get_prodi/{id_prodi}', 'ProdiController@AjaxDetail');

Route::get('data-video', 'VideoController@index');
Route::get('datatable_video', 'VideoController@show_video');
Route::post('update-video', 'VideoController@update_video');
Route::get('/cari/kode_status', 'VideoController@load_status');
Route::get('get_video/{id}', 'VideoController@AjaxDetail');

Route::delete('myproductsDeleteAll', 'MasterMahasiswaController@deleteAll');
Route::get('view_finish', function () {
    return view('finish_submit');
});
