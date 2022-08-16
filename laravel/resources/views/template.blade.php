<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8" />
        <title>Sistem Tracer Study - UNISMA</title>
        <link rel = "icon" href ="public/images/logounisma.png">
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Passion+One);
              .m-menu__link:hover {
                background-color: #f1f3ea;
                color: #95ec16;
              }
              .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--active > .m-menu__link .m-menu__link-text {
                color: #1d9d19;
            }
            @media only screen and (max-width: 700px) {
                #m_header_topbar{
                    margin-top: -50px;
                }
              }
              @media only screen and (max-width: 850px) {
                #m_header_topbar{
                    margin-top: -50px;
                }
              }
              @media only screen and (max-width: 930px) {
                #m_header_topbar{
                    margin-top: -50px;
                }
              }
        </style>

		<link href="public/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="public/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
        <link href="public/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="public/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link href="public/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link rel="shortcut icon" href="public/assets/demo/media/img/logo/favicon.ico" />
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-brand  m-brand--skin-dark " style="background: #3d8a49;">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo" style="width: 185px">
                                    <H4 style="padding-top:7px;padding-right:10px;font-size:17px;color: whitesmoke"> 
                                        <img src="public/images/logounisma.png" style="width: 47px">&nbsp&nbsp
                                        <a style="font-size: 25px;color:#f0f0e9;font-family: 'Passion One';">Tracer Study</a>
                                    </H4>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools" >
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
										<span ></span>
									</a>
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" style="border-color: white" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span style="background-color: white"></span>
									</a>
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"> </i>
									</a>
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
								</ul>
							</div>
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-topbar__nav-wrapper">
                                    <b style="color:rgb(196, 199, 98) ;margin-right: 5px" id="tanggal"></b>| <b style="color:rgb(116, 146, 117) ;margin-right: 20px" id="clock"></b>
                                    @php
                                        $nama_role = '';
                                        $prodi = '';
                                        $nama = '';
                                    @endphp
                                    @if (Auth::user()->role_id == 3)
                                        @php
                                            $nama_role = 'Prodi ';
                                            $prodi = $auth_user->prodi.', ';
                                            $nama = Auth::user()->name;
                                        @endphp

                                    @elseif(Auth::user()->role_id == 2)
                                        @php
                                            $nama_role = ''. $auth_user->fakultas;
                                            $prodi = '';
                                            $nama = ', '.Auth::user()->name;
                                        @endphp
                                    @else
                                        @php
                                            $nama_role = '';
                                            $prodi = '<span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded" style="background-color: #73ae4e;color:white">Superadmin</span>';
                                            $nama = ', <span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded" style="background-color: #2a8dd3;color:white"><b>'.Auth::user()->name.'</b></span> ';
                                        @endphp
                                    @endif
                                    <b style="color: #bf1919">{{$nama_role}} <?php echo $prodi; ?> </b> 
                                    <b style="color: gray"><?php echo $nama; ?></b>
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<span class="m-type m--bg-success"><span class="m--font-light">
                                                        @php
                                                            $auth = substr(Auth::user()->name, 0,2);
                                                            echo $auth;
                                                        @endphp
                                                    </span></span>
												</span>
												<span class="m-topbar__username m--hide">Nick</span>
                                            </a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="color: green"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(public/assets/app/media/img/bg/bg-5.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<span class="m-type m--bg-success">
                                                                    <span class="m--font-light">
                                                                        @php
                                                                            $auth = substr(Auth::user()->name, 0,1);
                                                                            echo $auth;
                                                                        @endphp
                                                                    </span>
                                                                </span>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500" style="color: #74867c"> {{Auth::user()->name}}</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">{{Auth::user()->email}}</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																<li class="m-nav__item">
																	<a href="{{url('profile')}}" id="m_blockui_master_input_bulan" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">My Profile</span>
																			</span>
																		</span>
                                                                    </a>
                                                                </li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="{{url('logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark " style="background-color: white;">
                    <!-- BEGIN: Aside Menu -->
                    @php
                        $dashboard = Request::segment(1);
                        $check_page_dashboard = $dashboard == 'dashboard' ? '--active' : '';
                        $filter_pencarian = Request::segment(1);
                        $check_page_filter_pencarian = $filter_pencarian == 'filter-pencarian' ? '--active' : '';

                        $data_mahasiswa = Request::segment(1);
                        $check_page_data_mahasiswa = $data_mahasiswa == 'data-mahasiswa' ? '--active' : '';
                        $data_users = Request::segment(1);

                        $check_page_data_users = $data_users == 'users' ? '--active' : '';

                        //Kegiatan Pendidikan Dan Pengalaman Pembelajaran
                        $penekanan_metode_pembelajaran = Request::segment(1);
                        $check_page_penekanan_metode_pembelajaran = $penekanan_metode_pembelajaran == 'penekanan-metode-pembelajaran' ? '--active' : '';

                        //Data Pengguna Lulusan
                        $pengguna_lulusan = Request::segment(1);
                        $check_page_pengguna_lulusan = $pengguna_lulusan == 'pengguna-lulusan' ? '--active' : '';
                        $tingkat_kepuasan = Request::segment(1);
                        $check_page_tingkat_kepuasan = $tingkat_kepuasan == 'tingkat-kepuasan' ? '--active' : '';
                        $soft_skill = Request::segment(1);
                        $check_page_soft_skill = $soft_skill == 'soft-skill' ? '--active' : '';
                        $kriteria = Request::segment(1);
                        $check_page_kriteria = $kriteria == 'kriteria' ? '--active' : '';

                        $pbm = Request::segment(1);
                        $check_page_pbm = $pbm == 'pbm' ? '--active' : '';

                        $kondisi_fasilitas_belajar = Request::segment(1);
                        $check_page_kondisi_fasilitas_belajar = $kondisi_fasilitas_belajar == 'kondisi-fasilitas-belajar' ? '--active' : '';

                        $pengalaman_belajar = Request::segment(1);
                        $check_page_pengalaman_belajar = $pengalaman_belajar == 'pengalaman-belajar' ? '--active' : '';

                        $transisi_dunia_kerja = Request::segment(1);
                        $check_page_transisi_dunia_kerja = $transisi_dunia_kerja == 'transisi-dunia-kerja' ? '--active' : '';




                        $mencari_pekerjaan = Request::segment(1);
                        $check_page_mencari_pekerjaan = $mencari_pekerjaan == 'waktu-mencari-pekerjaan' ? '--active' : '';
                        $cara_memperoleh_pekerjaan = Request::segment(1);
                        $check_page_cara_memperoleh_pekerjaan = $cara_memperoleh_pekerjaan == 'cara-memperoleh-pekerjaan' ? '--active' : '';
                        $masa_tunggu = Request::segment(1);
                        $check_page_masa_tunggu = $masa_tunggu == 'masa-tunggu' ? '--active' : '';
                        $situasi_saat_ini_1 = Request::segment(1);
                        $check_page_situasi_saat_ini_1 = $situasi_saat_ini_1 == 'situasi-saat-ini-I' ? '--active' : '';
                        $situasi_saat_ini_2 = Request::segment(1);
                        $check_page_situasi_saat_ini_2 = $situasi_saat_ini_2 == 'situasi-saat-ini-II' ? '--active' : '';
                        $pengangguran_terbuka = Request::segment(1);
                        $check_page_pengangguran_terbuka = $pengangguran_terbuka == 'pengangguran-terbuka' ? '--active' : '';
                        $jenis_tempat_kerja = Request::segment(1);
                        $check_page_jenis_tempat_kerja = $jenis_tempat_kerja == 'jenis-tempat-bekerja' ? '--active' : '';
                        $pembiayaan_kuliah = Request::segment(1);
                        $check_page_pembiayaan_kuliah = $pembiayaan_kuliah == 'pembiayaan-kuliah' ? '--active' : '';
                        $pendapatan_perbulan = Request::segment(1);
                        $check_page_pendapatan_perbulan = $pendapatan_perbulan == 'pendapatan-perbulan' ? '--active' : '';
                        $keselarasan_horizontal = Request::segment(1);
                        $check_page_keselarasan_horizontal = $keselarasan_horizontal == 'keselarasan-horizontal' ? '--active' : '';
                        $keselarasan_vertical = Request::segment(1);
                        $check_page_keselarasan_vertical = $keselarasan_vertical == 'keselarasan-vertical' ? '--active' : '';
                        $pengambilan_pekerjaan_tidak_sesuai = Request::segment(1);
                        $check_page_pengambilan_pekerjaan_tidak_sesuai = $pengambilan_pekerjaan_tidak_sesuai == 'pengambilan-pekerjaan-tidak-sesuai' ? '--active' : '';
                        $kemulusan_transisi = Request::segment(1);
                        $check_page_kemulusan_transisi = $kemulusan_transisi == 'kemulusan-transisi' ? '--active' : '';
                        $organisasi_kemahasiswaan = Request::segment(1);
                        $check_page_organisasi_kemahasiswaan = $organisasi_kemahasiswaan == 'organisasi-kemahasiswaan' ? '--active' : '';
                        $pengurus_kegiatan_organisasi = Request::segment(1);
                        $check_page_pengurus_kegiatan_organisasi = $pengurus_kegiatan_organisasi == 'pengurus-kegiatan-organisasi' ? '--active' : '';
                        
                        $berwirausaha = Request::segment(1);
                        $check_page_berwirausaha = $berwirausaha == 'berwirausaha' ? '--active' : '';
                        
                        $kemahasiswaan_nu = Request::segment(1);
                        $check_page_kemahasiswaan_nu = $kemahasiswaan_nu == 'kemahasiswaan-nu' ? '--active' : '';
                        $kemahasiswaan_ya_nu = Request::segment(1);
                        $check_page_kemahasiswaan_ya_nu = $kemahasiswaan_ya_nu == 'kemahasiswaan-ya-nu' ? '--active' : '';
                        
                        $lanjut_study = Request::segment(1);
                        $check_page_lanjut_study = $lanjut_study == 'lanjut-study' ? '--active' : '';
                        
                        $pengaruh_organisasi = Request::segment(1);
                        $check_page_pengaruh_organisasi = $pengaruh_organisasi == 'pengaruh-organisasi' ? '--active' : '';
                        
                        $sebelum_kuliah = Request::segment(1);
                        $check_page_sebelum_kuliah = $sebelum_kuliah == 'sebelum-kuliah' ? '--active' : '';

                        $kesesuaian_pendidikan = Request::segment(1);
                        $check_page_kesesuaian_pendidikan = $kesesuaian_pendidikan == 'kesesuaian-pendidikan' ? '--active' : '';

                        $peran_kompetensi = Request::segment(1);
                        $check_page_peran_kompetensi = $peran_kompetensi == 'peran-kompetensi' ? '--active' : '';

                        $kompetensiAB = Request::segment(1);
                        $check_page_kompetensiAB = $kompetensiAB == 'kompetensi-AB' ? '--active' : '';
                        $data_alumni_sudah_bekerja = Request::segment(1);
                        $check_page_data_alumni_sudah_bekerja = $data_alumni_sudah_bekerja == 'data-alumni-sudah-bekerja' ? '--active' : '';
                        $profil_karakter = Request::segment(1);
                        $check_page_profil_karakter = $profil_karakter == 'profil-karakter' ? '--active' : '';
                        $alumni_sudah_input = Request::segment(1);
                        $check_data_alumni_sudah_input = $alumni_sudah_input == 'alumni-sudah-input' ? '--active' : '';
                        $fakultas = Request::segment(1);
                        $check_data_fakultas = $fakultas == 'data-fakultas' ? '--active' : '';
                        $prodi = Request::segment(1);
                        $check_data_prodi = $prodi == 'data-prodi' ? '--active' : '';
                        $video = Request::segment(1);
                        $check_data_video = $video == 'data-video' ? '--active' : '';


                    @endphp

					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item{{$check_page_dashboard}}" aria-haspopup="true">
                                <a href="{{url('dashboard')}}" id="m_blockui_dashboard" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-analytics"></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Dashboard</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="m-menu__item  m-menu__item{{$check_data_alumni_sudah_input}}" aria-haspopup="true">
                                <a href="{{url('alumni-sudah-input')}}" id="m_blockui_dashboard" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1"></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Alumni sudah input Tracer</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @php
                                if(Auth::user()->role_id == 1){
                            @endphp
                                <li class="m-menu__item  m-menu__item{{$check_page_filter_pencarian}}" aria-haspopup="true"><a href="{{url('filter-pencarian')}}" id="m_blockui_dashboard" class="m-menu__link"><i class="m-menu__link-icon flaticon-search"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Filter Pencarian</span>
                                    <span class="m-menu__link-badge"></span> </span></span></a>
                                </li>
                            @php
                                }
                            @endphp
                            @php
                                if(Auth::user()->role_id == 1){
                            @endphp
                            <li class="m-menu__section ">
                                <h4 class="m-menu__section-text">Master Data</h4>
                                <i class="m-menu__section-icon flaticon-more-v2"></i>
                            </li>
                                <li class="m-menu__item  m-menu__item{{$check_page_data_mahasiswa}}"  aria-haspopup="true"><a href="{{url('data-mahasiswa')}}" id="m_blockui_evaluasi_dosen" class="m-menu__link"><i class="m-menu__link-icon flaticon-book "></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Data Mahasiswa Alumni</span>
                                    <span class="m-menu__link-badge"></span> </span></span></a></li>
                                <li class="m-menu__item  m-menu__item{{$check_data_fakultas}}"  aria-haspopup="true"><a href="{{url('data-fakultas')}}" id="m_blockui_evaluasi_dosen" class="m-menu__link"><i class="m-menu__link-icon flaticon-interface-4 "></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Data Fakultas</span>
                                    <span class="m-menu__link-badge"></span> </span></span></a></li>
                                <li class="m-menu__item  m-menu__item{{$check_data_prodi}}"  aria-haspopup="true"><a href="{{url('data-prodi')}}" id="m_blockui_evaluasi_dosen" class="m-menu__link"><i class="m-menu__link-icon
                                    flaticon-background  "></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Data Program Studi</span>
                                    <span class="m-menu__link-badge"></span> </span></span></a></li>
                                <li class="m-menu__item  m-menu__item{{$check_data_video}}"  aria-haspopup="true"><a href="{{url('data-video')}}" id="m_blockui_evaluasi_dosen" class="m-menu__link"><i class="m-menu__link-icon
                                    flaticon-analytics  "></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Data Video</span>
                                    <span class="m-menu__link-badge"></span> </span></span></a></li>

                            @php
                                }
                            @endphp

                            <li class="m-menu__section ">
                                <h4 class="m-menu__section-text">Tracer Pengguna Lulusan</h4>
                                <i class="m-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <!-- -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pengguna_lulusan}}"  aria-haspopup="true">
                                <a href="{{url('pengguna-lulusan')}}" id="m_blockui_master_input_bulan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Data Pengguna Lulusan</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- -->
                            <li class="m-menu__item  m-menu__item{{$check_page_tingkat_kepuasan }}"  aria-haspopup="true">
                                <a href="{{url('tingkat-kepuasan')}}" id="m_blockui_master_input_bulan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Tingkat Kepuasan Pengguna Lulusan</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- -->
                            <li class="m-menu__item  m-menu__item{{$check_page_soft_skill}}"  aria-haspopup="true">
                                <a href="{{url('soft-skill')}}" id="m_blockui_master_input_bulan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Soft Skill</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- -->
                            <li class="m-menu__item  m-menu__item{{$check_page_kriteria}}"  aria-haspopup="true">
                                <a href="{{url('kriteria')}}" id="m_blockui_master_input_bulan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Kriterian Lulusan</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="m-menu__section ">
                                <h4 class="m-menu__section-text">Tracer Mahasiswa Alumni</h4>
                                <i class="m-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <!-- Menurut Anda seberapa besar penekanan pada metode  pembelajaran di bawah ini dilaksanakan di program studi Anda?     -->
                            <li class="m-menu__item  m-menu__item{{$check_page_penekanan_metode_pembelajaran}}"  aria-haspopup="true">
                                <a href="{{url('penekanan-metode-pembelajaran')}}" id="m_blockui_master_input_bulan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-graph "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Penekanan Metode Pembelajaran [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Sebutkan sumber dana dalam pembiayaan kuliah?     -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pembiayaan_kuliah}}"  aria-haspopup="true">
                                <a href="{{url('pembiayaan-kuliah')}}" id="m_blockui_test4" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-map-location  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pembiayaan Kuliah [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Kapan Anda mulai mencari pekerjaan?     -->
                            <li class="m-menu__item  m-menu__item{{$check_page_mencari_pekerjaan}}"  aria-haspopup="true">
                                <a href="{{url('waktu-mencari-pekerjaan')}}" id="m_blockui_master_users" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-calendar "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Waktu mulai mencari pekerjaan [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Bagaimana cara Anda mendapatkan pekerjaan setelah lulus dari program pascasarjana Unisma?     -->
                            <li class="m-menu__item  m-menu__item{{$check_page_cara_memperoleh_pekerjaan}}"  aria-haspopup="true">
                                <a href="{{url('cara-memperoleh-pekerjaan')}}" id="m_blockui_arsip" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-earth-globe "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Cara memperoleh pekerjaan [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- 
                                [F6]  Berapa perusahaan/instansi/institusi yang sudah Anda lamar (lewat surat atau email) sebelum Anda memperoleh pekerjaan pertama?
                                [F7]  Berapa banyak perusahaan/instansi/institusi yang merespon lamaran Anda?
                                [F7a] Berapa banyak perusahaan/instansi/institusi yang mengundang Anda untuk wawancara?
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_kemulusan_transisi}}"  aria-haspopup="true">
                                <a href="{{url('kemulusan-transisi')}}" id="m_blockui_role_user" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-clipboard "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Kemulusan Transisi [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Bagaimana anda menggambarkan situasi anda saat ini?    -->
                            <li class="m-menu__item  m-menu__item{{$check_page_situasi_saat_ini_2}}"  aria-haspopup="true">
                                <a href="{{url('situasi-saat-ini-II')}}" id="m_blockui_test2" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-graphic-1 "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Situasi Saat ini [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Berapa bulan waktu yang dibutuhkan (sebelum dan sesudah kelulusan Anda) untuk mendapatkan pekerjaan pertama?   -->
                            <li class="m-menu__item  m-menu__item{{$check_page_masa_tunggu}}"  aria-haspopup="true">
                                <a href="{{url('masa-tunggu')}}" id="m_blockui_data_user" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-stopwatch "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Masa Tunggu [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?   -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pengangguran_terbuka}}"  aria-haspopup="true">
                                <a href="{{url('pengangguran-terbuka')}}" id="m_blockui_test3" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-exclamation-square  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pengangguran Terbuka [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!--
                                Jelaskan status Anda saat ini?
                                Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?    
                                Apa nama perusahaan/kantor tempat Anda bekerja?
                                Dimana lokasi tempat Anda bekerja? 
                                Siapa nama atasan langsung anda?
                                Mohon menuliskan kontak HP atasan langsung Anda?
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_data_alumni_sudah_bekerja}}"  aria-haspopup="true">
                                <a href="{{url('data-alumni-sudah-bekerja')}}" id="m_blockui_print" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-clipboard "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Data Alumni Sudah Bekerja [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Apa jenis perusahaan/ instansi/ institusi tempat Anda bekerja sekarang?  -->
                            <li class="m-menu__item  m-menu__item{{$check_page_jenis_tempat_kerja}}"  aria-haspopup="true">
                                <a href="{{url('jenis-tempat-bekerja')}}" id="m_blockui_test4" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-map-location  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Jenis Tempat Kerja [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!--    
                                [D8_1] Kira-kira berapa pendapatan Anda dari pekerjaan utama setiap bulan?
                                [D8_2] Kira-kira berapa pendapatan Anda dari lembur dan tips setiap bulan?
                                [D8_3] Kira-kira berapa pendapatan Anda dari pekerjaan lainnya setiap bulan?
                                Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S3 UNISMA?
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pendapatan_perbulan}}"  aria-haspopup="true">
                                <a href="{{url('pendapatan-perbulan')}}" id="m_blockui_test5" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-cart  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pendapatan Perbulan [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?  -->
                            <li class="m-menu__item  m-menu__item{{$check_page_keselarasan_horizontal}}"  aria-haspopup="true">
                                <a href="{{url('keselarasan-horizontal')}}" id="m_blockui_test6" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-more-v6  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Keselarasan Horizontal [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?  -->
                            <li class="m-menu__item  m-menu__item{{$check_page_keselarasan_vertical}}"  aria-haspopup="true">
                                <a href="{{url('keselarasan-vertical')}}" id="m_blockui_test7" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-more-v5 "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Keselarasan Vertical [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- 
                                Bila berwirausaha, apa posisi/jabatan Anda saat ini?  
                                Apa tingkat tempat kerja Anda?
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_berwirausaha}}"  aria-haspopup="true">
                                <a href="{{url('berwirausaha')}}" id="m_blockui_data_pegawai" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-user-add  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Data Alumni Berwirausaha [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Apabila Anda melanjutkan studi, sebutkan -->
                            <li class="m-menu__item  m-menu__item{{$check_page_lanjut_study}}"  aria-haspopup="true">
                                <a href="{{url('lanjut-study')}}" id="m_blockui_master_kategori_karyawan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-user-settings  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Lanjut Study [S1]</span> 
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>                                
                            <!-- Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pengambilan_pekerjaan_tidak_sesuai}}"  aria-haspopup="true">
                                <a href="{{url('pengambilan-pekerjaan-tidak-sesuai')}}" id="m_blockui_test8" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-warning  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pengambilan Pekerjaan tidak sesuai [S1][S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- 
                                A. Pada saat lulus, pada tigkat mana kompetensi di bawah ini yang Anda kuasai?
                                B. Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? 
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_kompetensiAB}}"  aria-haspopup="true">
                                <a href="{{url('kompetensi-AB')}}" id="m_blockui_test10" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-more-v5 "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Kompetensi A & B [S1][S2][S3]</span>
                                        <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Menurut Anda, Bagaimana profil karakter kepribadian Anda dalam lingkungan kerja? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_profil_karakter}}"  aria-haspopup="true">
                                <a href="{{url('profil-karakter')}}" id="m_blockui_test9" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-user-settings  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Profil Karakter Kepribadian [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Apakah Anda pernah menjabat dalam suatu organisasi kemahasiswaan ataupun organisasi ke-NU-an? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_kemahasiswaan_nu}}"  aria-haspopup="true">
                                <a href="{{url('kemahasiswaan-nu')}}" id="m_blockui_data_kegiatan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-avatar  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Kemahasiswaan NU [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Organisasi apa yang pernah saudara ikuti selama kuliah di Unisma dan sebagai apa? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_organisasi_kemahasiswaan}}"  aria-haspopup="true">
                                <a href="{{url('organisasi-kemahasiswaan')}}" id="m_blockui_evaluasi_karyawan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-avatar  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Organisasi Kemahasiswaan [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <!-- Apakah keikutsertaan saudara dalam organisasi tersebut berpengaruh terhadap capaian karir saat ini? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pengaruh_organisasi}}"  aria-haspopup="true">
                                <a href="{{url('pengaruh-organisasi')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pengaruh Organisasi dengan Karir [S1]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Pendidikan dan Pekerjaan Sebelum Kuliah -->
                            <li class="m-menu__item  m-menu__item{{$check_page_sebelum_kuliah}}"  aria-haspopup="true">
                                <a href="{{url('sebelum-kuliah')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Pendidikan dan Pekerjaan Sebelum Kuliah [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Kesesuaian Pendidikan -->
                            <li class="m-menu__item  m-menu__item{{$check_page_kesesuaian_pendidikan}}"  aria-haspopup="true">
                                <a href="{{url('kesesuaian-pendidikan')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Kesesuaian Pendidikan [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pbm}}"  aria-haspopup="true">
                                <a href="{{url('pbm')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Penilaian terhadap aspek belajar mengajar [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_pengalaman_belajar}}"  aria-haspopup="true">
                                <a href="{{url('pengalaman-belajar')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Penilaian terhadap pengalaman belajar [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>  
                            <!-- 
                                Apakah Anda sudah mempunyai pekerjaan saat lulus S3 UNISMA?
                                Apakah Anda pindah ke pekerjaan baru setelah lulus S3 UNISMA?
                            -->
                            <li class="m-menu__item  m-menu__item{{$check_page_transisi_dunia_kerja}}"  aria-haspopup="true">
                                <a href="{{url('transisi-dunia-kerja')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Transisi ke Dunia kerja [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            <!-- Seberapa besar peran kompetensi yang diperoleh di S3 UNISMA berikut ini dalam melaksanakan pekerjaan Anda? -->
                            <li class="m-menu__item  m-menu__item{{$check_page_peran_kompetensi}}"  aria-haspopup="true">
                                <a href="{{url('peran-kompetensi')}}" id="m_blockui_evaluasi_karyawan_lapangan" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-edit-1  "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Peran Kompetensi [S2][S3]</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li> 
                            @php
                                if(Auth::user()->role_id == 1){
                            @endphp
                            <li class="m-menu__section ">
                                <h4 class="m-menu__section-text">Managament Akun</h4>
                                <i class="m-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="m-menu__item  m-menu__item{{$check_page_data_users }}"  aria-haspopup="true">
                                <a href="{{url('users')}}" id="m_blockui_evaluasi_dosen" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-users "></i>
                                    <span class="m-menu__link-title"> 
                                        <span class="m-menu__link-wrap"> 
                                            <span class="m-menu__link-text">Data Users</span>
                                            <span class="m-menu__link-badge"></span> 
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @php
                                }
                            @endphp
                        </ul>
					</div>
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper kontenn" >
					<div class="m-content" style="margin-top: -40px;margin-left:-20px; margin-bottom:-35px">
						@yield('konten')
                    </div>
				</div>
			</div>
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2021 &copy; Sistem Tracer Study by <a href="https://keenthemes.com" class="m-link">UNISMA</a>
							</span>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!--begin:: Global Mandatory Vendors -->
		<script src="public/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="public/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="public/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="public/vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="public/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="public/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="public/vendors/wnumb/wNumb.js" type="text/javascript"></script>
		<script src="public/vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="public/vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="public/vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="public/vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="public/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
		<script src="public/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="public/vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="public/vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="public/vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="public/vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="public/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="public/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="public/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
		<script src="public/vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="public/vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="public/vendors/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="public/vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="public/vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="public/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="public/vendors/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="public/vendors/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="public/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="public/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
		<script src="public/vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
		<script src="public/vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="public/vendors/jstree/dist/jstree.js" type="text/javascript"></script>
		<script src="public/vendors/raphael/raphael.js" type="text/javascript"></script>
		<script src="public/vendors/morris.js/morris.js" type="text/javascript"></script>
		<script src="public/vendors/chartist/dist/chartist.js" type="text/javascript"></script>
		<script src="public/vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="public/vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
		<script src="public/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="public/vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="public/vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="public/vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="public/vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="public/vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
        <script src="public/vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>
        <script src="public/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <script src="public/assets/demo/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
        <script src="public/assets/demo/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
        <script src="public/assets/demo/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script src="public/assets/demo/custom/components/base/blockui.js" type="text/javascript"></script>
		<script src="public/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
        <script src="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="public/assets/app/js/dashboard.js" type="text/javascript"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
        <script>
            function showTime() {
                var a_p = "";
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();
                if (curr_hour < 12) {
                    a_p = "AM";
                } else {
                    a_p = "PM";
                }
                if (curr_hour == 0) {
                    curr_hour = 12;
                }
                if (curr_hour > 12) {
                    curr_hour = curr_hour - 12;
                }
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);
             document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            setInterval(showTime, 500);
        </script>
        <script type='text/javascript'>
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var thisDay = date.getDay(),
                thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;
            $('#tanggal').html(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
        </script>
    </body>
</html>
