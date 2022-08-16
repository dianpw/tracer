<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8" />
        <title>Sistem Tracer Study - UNISMA</title>
        <link rel = "icon" href ="public/images/logounisma.png">
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            .isi_quisioner{
                display:none;
            }
            .m-portlet.m-portlet--creative {
                padding-top: 3.5rem;
                margin-top: 2.5rem;
            }
            .swal-footer {
                background-color: rgb(245, 248, 250);
                margin-top: 32px;
                border-top: 1px solid #E9EEF1;
                overflow: hidden;
              }
              .fade-in {
                animation: fadeIn ease 1s;
                -webkit-animation: fadeIn ease 1s;
                -moz-animation: fadeIn ease 1s;
                -o-animation: fadeIn ease 1s;
                -ms-animation: fadeIn ease 1s;
              }


              @keyframes fadeIn{
                0% {
                  opacity:0;
                }
                100% {
                  opacity:1;
                }
              }

              @-moz-keyframes fadeIn {
                0% {
                  opacity:0;
                }
                100% {
                  opacity:1;
                }
              }

              @-webkit-keyframes fadeIn {
                0% {
                  opacity:0;
                }
                100% {
                  opacity:1;
                }
              }

              @-o-keyframes fadeIn {
                0% {
                  opacity:0;
                }
                100% {
                  opacity:1;
                }
              }

              @-ms-keyframes fadeIn {
                0% {
                  opacity:0;
                }
                100% {
                  opacity:1;
                }
              }

              /* The style below is just for the appearance of the example div */

              .style {
                width:90vw; height:90vh;
                text-align:center;
                padding-top:calc(50vh - 50px);
                margin-left:5vw;
                border:4px double #F00;
                background-color:#000;
              }
              .style p {
                color:#fff;
                font-size:50px;
              }
        </style>
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
             .m-footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e5e6e3;
                color: black;
                text-align: left;
              }
            @media only screen and (max-width: 600px) {
                #m_header_topbar{
                    margin-top: -50px;
                }
                .m-footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e5e6e3;
                color: black;
                text-align: left;
                margin-top:20px;
              }
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
		<!--end::Web font -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="../public/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory ../Vendors -->

		<!--begin:: Global Optional ../Vendors -->
		<link href="../public/vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="../public/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
        <link href="../public/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles -->
		<link href="../public/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../public/assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

        <link href="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="../public/assets/demo/media/img/logo/favicon.ico" />
	</head>
	<body style="background-image: ../public/images/logounisma.png" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark " style="background: #3d8a49;">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo" style="width: 185px">
                                    <H4 style="padding-top:8px;padding-right:10px;font-size:17px;color: whitesmoke">
                                        <img src="../public/images/logounisma.png" style="width: 47px">&nbsp&nbsp
                                        <a style="font-size: 23px;color:#f0f0e9;font-family: 'Passion One';">Tracer Study</a></H4>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools" >
									<!-- BEGIN: Topbar Toggler -->
									@php
								   $str_nama = explode(" ", $data_mhs->nama);
								   $str= $str_nama[0];
									@endphp
									<a id="click_alumni2" style="color: white" id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<div style="margin-bottom:11px;"><b><i class="la la-user"></i> </b> Alumni S2,</div><br><br><br>
										<b >{{$str}}</b>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" style="background-color: #3d8a49" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
								</ul>
							</div>
							<!-- END: Horizontal Menu -->
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid" >
								<div class="m-stack__item m-topbar__nav-wrapper" style="margin-top:-150px">
                                    <a id="click_alumni" href="javascript:;">
                                    <b style="color:whitesmoke"><i class="la la-user"></i> Alumni S2, {{$data_mhs->npm .' | '.$data_mhs->nama}}</b> <b style="color: gray"></b>
                                    </a>
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
										 m-dropdown-toggle="click">
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="padding-left:0px">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper" >
					<div class="m-content" style="margin-top: -40px; margin-bottom:-15px">
                        <div class="isi_biodata">
                            <form id="survey-form" method="POST" action="{{url('submit-tracer-s2')}}">
                            @csrf
                            <input type="hidden" value="{{$data_mhs->npm}}" name="npm">
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 2rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                Lengkapi Data dibawah ini !
                                            </h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>Isi Data berikut</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>* NIK</label>
                                                    <input type="text"  name="nik" required placeholder="Jawaban Anda"  class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class=""> NPWP</label>
                                                    <input type="text" class="form-control m-input" name="npwp" placeholder="Jawaban Anda">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>* Tahun masuk</label>
                                                    <input id="tahun_masuk" type="text"  name="tahun_masuk" required placeholder="Jawaban Anda"  class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class=""> Tahun Lulus sesuai yang tertulis di Ijazah</label>
                                                    <input id="tahun_lulus" type="text" class="form-control m-input" name="tahun_lulus" placeholder="Jawaban Anda">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>* Alamat Email</label>
                                                    <input type="email"  name="email" required placeholder="Jawaban Anda"  class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">* No HP (Whatsapp)</label>
                                                    <input type="text" onkeypress="return isNumberKey(event)" class="form-control m-input" name="no_whatsapp" required placeholder="Jawaban Anda">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row" style="margin-top: -10px">
                                                <div class="col-lg-6">
                                                    <label>* Alamat lengkap:</label>
                                                    <div class="m-input-icon m-input-icon--right">
                                                        <input type="text" class="form-control m-input" name="alamat" required placeholder="Jawaban Anda">
                                                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                                                    </div>
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>*Jenis Kelamin:</label>
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="jeniskelamin" id="jeniskelamin"  value="Laki - laki"> Laki - laki
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan"> Perempuan
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions">
                                        <div class="row">
                                            <div class="col-lg-12 m--align-right">
                                                <button style="margin:12px" id="m_blockui_2_5" type="button" class="btn btn-success berikutnya">Berikutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="isi_quisioner fade-in"><!---->
                            <!-- [Pendidikan dan Pekerjaan Sebelum Kuliah] -->                            
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text ">Pendidikan dan Pekerjaan Sebelum Kuliah</h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>KARAKTERISTIK</br>SOSIO-BIOGRAFI</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                </div>
                            </div> 
                            <!--[Apa nama Perguruan Tinggi terakhir sebelum menempuh pendidikan di S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apa nama Perguruan Tinggi terakhir sebelum menempuh pendidikan di S2 UNISMA?<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <input class="form-control" required placeholder="Jawaban Anda" type="text" name="univs1" id="univs1">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_univs1" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!--[Apa Program Studi yang Anda ambil sebelum menempuh pendidikan di S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apa Program Studi yang Anda ambil sebelum menempuh pendidikan di S2 UNISMA?<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <input class="form-control" required placeholder="Jawaban Anda" type="text" name="prodis1" id="prodis1">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_prodis1" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                                                    
                            <!--[Tahun berapa Anda lulus S1?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Tahun berapa Anda lulus S1?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="input-group mb-3">
                                                        <input id="masuks1" type="text" class="form-control m-input" name="masuks1" placeholder="Jawaban anda..">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_masuks1" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!--[Apakah Anda bekerja sebelum kuliah di S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">                                
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apakah Anda bekerja sebelum kuliah di S2 UNISMA?<b style="color:red">*).required</b>

                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="riwayat_kerja">
                                                            <input type="radio" required name="riwayat_kerja" id="riwayat_kerja" value="Ya, bekerja dan tetap melanjutkan bekerja">
                                                            Ya, bekerja dan tetap melanjutkan bekerja
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="riwayat_kerja1">
                                                            <input type="radio" name="riwayat_kerja" id="riwayat_kerja1" value="Ya, bekerja tapi berhenti saat masuk kuliah di program S2 UNISMA">
                                                            Ya, bekerja tapi berhenti saat masuk kuliah di program S2 UNISMA
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="riwayat_kerja2">
                                                            <input type="radio" name="riwayat_kerja" id="riwayat_kerja2" value="Tidak">
                                                            Tidak -> Lanjut ke A9
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_riwayat_kerja" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!-- [Kegiatan Pendidikan dan Pengalaman Pembelajaran] -->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">Kegiatan Pendidikan dan Pengalaman Pembelajaran</h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>PENDIDIKAN DAN PEMBELAJARAN</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                </div>
                            </div> 
                            
                            <!--[Apakah pendidikan yang diambil di S2 Unisma sesuai dengan latar belakang pendidikan Anda?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body" style="margin-top: -40px">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apakah pendidikan yang diambil di S2 Unisma sesuai dengan latar belakang pendidikan Anda?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sesuailb">
                                                            <input  type="radio" name="sesuailb" id="sesuailb" value="YA">
                                                        YA
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sesuailb2">
                                                            <input  type="radio" name="sesuailb" id="sesuailb2" value="Tidak">
                                                        Tidak
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_sesuailb" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--[Apakah pendidikan yang diambil di S2 Unisma sesuai dengan bidang pekerjaan Anda saat ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body" style="margin-top: -40px">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apakah pendidikan yang diambil di S2 Unisma sesuai dengan bidang pekerjaan Anda saat ini?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sesuaibp">
                                                            <input  type="radio" name="sesuaibp" id="sesuaibp" value="YA">
                                                        YA
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sesuaibp2">
                                                            <input  type="radio" name="sesuaibp" id="sesuaibp2" value="Tidak">
                                                        Tidak
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_sesuaibp" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--[B8 Menurut Anda seberapa besar penekanan pada metode  pembelajaran di bawah ini dilaksanakan di program studi Anda]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px;">
                                        <div class="m-portlet__body">
                                            <b>B8. Menurut Anda seberapa besar penekanan pada metode  pembelajaran di bawah ini dilaksanakan di program studi Anda?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-12" style="margin-left:0px">
                                                    <div class="table-demontrasive">
                                                    
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;">
                                                        <thead class="m-datatable__head">
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Tidak sama sekali </br>(5)</th>
                                                            <th>Tidak </br>(4)</th>
                                                            <th>Cukup </br>(3)</th>
                                                            <th>Besar </br>(2)</th>
                                                            <th>Sangat besar </br>(1)</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Perkuliahan</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kuliah1">
                                                                            <input type="radio" required name="kuliah" id="kuliah1" value="Tidak sama sekali">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kuliah2">
                                                                            <input type="radio" required name="kuliah" id="kuliah2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kuliah3">
                                                                            <input type="radio" required name="kuliah" id="kuliah3" value="Cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kuliah4">
                                                                            <input type="radio" required name="kuliah" id="kuliah4" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kuliah5">
                                                                            <input type="radio" required name="kuliah" id="kuliah5" value="tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Demontrasi (peragaan)</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="demontrasi1">
                                                                            <input type="radio" required name="demontrasi" id="demontrasi1" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="demontrasi2">
                                                                            <input type="radio" required name="demontrasi" id="demontrasi2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="demontrasi3">
                                                                            <input type="radio" required name="demontrasi" id="demontrasi3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="demontrasi4">
                                                                            <input type="radio" required name="demontrasi" id="demontrasi4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="demontrasi5">
                                                                            <input type="radio" required name="demontrasi" id="demontrasi5" value="Sangat besar ">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Partisipasi dalam proyek riset</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="riset1">
                                                                            <input type="radio" required name="riset" id="riset1" value="Tidak sama sekali ">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="riset2">
                                                                            <input type="radio" required name="riset" id="riset2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="riset3">
                                                                            <input type="radio" required name="riset" id="riset3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="riset4">
                                                                            <input type="radio" required name="riset" id="riset4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="riset5">
                                                                            <input type="radio" required name="riset" id="riset5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Magang</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang1">
                                                                            <input type="radio" required name="magang" id="magang1" value="Tidak sama sekali ">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang2">
                                                                            <input type="radio" required name="magang" id="magang2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang3">
                                                                            <input type="radio" required name="magang" id="magang3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang4">
                                                                            <input type="radio" required name="magang" id="magang4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang5">
                                                                            <input type="radio" required name="magang" id="magang5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Praktikum</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="praktikum1">
                                                                            <input type="radio" required name="praktikum" id="praktikum1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="praktikum2">
                                                                            <input type="radio" required name="praktikum" id="praktikum2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="praktikum3">
                                                                            <input type="radio" required name="praktikum" id="praktikum3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="praktikum4">
                                                                            <input type="radio" required name="praktikum" id="praktikum4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="praktikum5">
                                                                            <input type="radio" required name="praktikum" id="praktikum5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Diskusi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="diskusi1">
                                                                            <input type="radio" required name="diskusi" id="diskusi1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="diskusi2">
                                                                            <input type="radio" required name="diskusi" id="diskusi2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="diskusi3">
                                                                            <input type="radio" required name="diskusi" id="diskusi3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="diskusi4">
                                                                            <input type="radio" required name="diskusi" id="diskusi4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="diskusi5">
                                                                            <input type="radio" required name="diskusi" id="diskusi5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kerja lapangan</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerja_lapangan1">
                                                                            <input type="radio" required name="kerja_lapangan" id="kerja_lapangan1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerja_lapangan2">
                                                                            <input type="radio" required name="kerja_lapangan" id="kerja_lapangan2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerja_lapangan3">
                                                                            <input type="radio" required name="kerja_lapangan" id="kerja_lapangan3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerja_lapangan4">
                                                                            <input type="radio" required name="kerja_lapangan" id="kerja_lapangan4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerja_lapangan5">
                                                                            <input type="radio" required name="kerja_lapangan" id="kerja_lapangan5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_penekanan_pada_metode_pembelajaran" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--[Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px;">
                                        <div class="m-portlet__body">
                                            <b>Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-12" style="margin-left:0px">
                                                    <div class="table-demontrasive">
                                                    
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;">
                                                        <thead class="m-datatable__head">
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Tidak sama sekali </br>(5)</th>
                                                            <th>Tidak </br>(4)</th>
                                                            <th>Cukup </br>(3)</th>
                                                            <th>Besar </br>(2)</th>
                                                            <th>Sangat besar</br>(1)</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_dosen1">
                                                                            <input type="radio" required name="interaksi_dosen" id="interaksi_dosen1" value="Tidak sama sekali">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_dosen2">
                                                                            <input type="radio" required name="interaksi_dosen" id="interaksi_dosen2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_dosen3">
                                                                            <input type="radio" required name="interaksi_dosen" id="interaksi_dosen3" value="Cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_dosen4">
                                                                            <input type="radio" required name="interaksi_dosen" id="interaksi_dosen4" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_dosen5">
                                                                            <input type="radio" required name="interaksi_dosen" id="interaksi_dosen5" value="tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pembimbingan akademik</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bimbingan_akademik1">
                                                                            <input type="radio" required name="bimbingan_akademik" id="bimbingan_akademik1" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bimbingan_akademik2">
                                                                            <input type="radio" required name="bimbingan_akademik" id="bimbingan_akademik2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bimbingan_akademik3">
                                                                            <input type="radio" required name="bimbingan_akademik" id="bimbingan_akademik3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bimbingan_akademik4">
                                                                            <input type="radio" required name="bimbingan_akademik" id="bimbingan_akademik4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bimbingan_akademik5">
                                                                            <input type="radio" required name="bimbingan_akademik" id="bimbingan_akademik5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kesempatan berpartisipasi dalam proyek riset</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="proyek_riset1">
                                                                            <input type="radio" required name="proyek_riset" id="proyek_riset1" value="Tidak sama sekali ">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="proyek_riset2">
                                                                            <input type="radio" required name="proyek_riset" id="proyek_riset2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="proyek_riset3">
                                                                            <input type="radio" required name="proyek_riset" id="proyek_riset3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="proyek_riset4">
                                                                            <input type="radio" required name="proyek_riset" id="proyek_riset4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="proyek_riset5">
                                                                            <input type="radio" required name="proyek_riset" id="proyek_riset5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kondisi umum belajar mengajar</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kondisi_belajar1">
                                                                            <input type="radio" required name="kondisi_belajar" id="kondisi_belajar1" value="Tidak sama sekali ">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kondisi_belajar2">
                                                                            <input type="radio" required name="kondisi_belajar" id="kondisi_belajar2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kondisi_belajar3">
                                                                            <input type="radio" required name="kondisi_belajar" id="kondisi_belajar3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kondisi_belajar4">
                                                                            <input type="radio" required name="kondisi_belajar" id="kondisi_belajar4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kondisi_belajar5">
                                                                            <input type="radio" required name="kondisi_belajar" id="kondisi_belajar5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="jejaring_ilmiah1">
                                                                            <input type="radio" required name="jejaring_ilmiah" id="jejaring_ilmiah1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="jejaring_ilmiah2">
                                                                            <input type="radio" required name="jejaring_ilmiah" id="jejaring_ilmiah2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="jejaring_ilmiah3">
                                                                            <input type="radio" required name="jejaring_ilmiah" id="jejaring_ilmiah3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="jejaring_ilmiah4">
                                                                            <input type="radio" required name="jejaring_ilmiah" id="jejaring_ilmiah4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="jejaring_ilmiah5">
                                                                            <input type="radio" required name="jejaring_ilmiah" id="jejaring_ilmiah5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kesempatan untuk berinteraksi dengan teman</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_teman1">
                                                                            <input type="radio" required name="interaksi_teman" id="interaksi_teman1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_teman2">
                                                                            <input type="radio" required name="interaksi_teman" id="interaksi_teman2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_teman3">
                                                                            <input type="radio" required name="interaksi_teman" id="interaksi_teman3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_teman4">
                                                                            <input type="radio" required name="interaksi_teman" id="interaksi_teman4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="interaksi_teman5">
                                                                            <input type="radio" required name="interaksi_teman" id="interaksi_teman5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kesempatan untuk berpartisipasi dalam pelayanan pasien</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="partisipasi_pelayanan1">
                                                                            <input type="radio" required name="partisipasi_pelayanan" id="partisipasi_pelayanan1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="partisipasi_pelayanan2">
                                                                            <input type="radio" required name="partisipasi_pelayanan" id="partisipasi_pelayanan2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="partisipasi_pelayanan3">
                                                                            <input type="radio" required name="partisipasi_pelayanan" id="partisipasi_pelayanan3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="partisipasi_pelayanan4">
                                                                            <input type="radio" required name="partisipasi_pelayanan" id="partisipasi_pelayanan4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="partisipasi_pelayanan5">
                                                                            <input type="radio" required name="partisipasi_pelayanan" id="partisipasi_pelayanan5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Lainnya</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lainnya1">
                                                                            <input type="radio" required name="lainnya" id="lainnya1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lainnya2">
                                                                            <input type="radio" required name="lainnya" id="lainnya2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lainnya3">
                                                                            <input type="radio" required name="lainnya" id="lainnya3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lainnya4">
                                                                            <input type="radio" required name="lainnya" id="lainnya4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lainnya5">
                                                                            <input type="radio" required name="lainnya" id="lainnya5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_penilaian_belajar_mengajar" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--[Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px;">
                                        <div class="m-portlet__body">
                                            <b>Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-12" style="margin-left:0px">
                                                    <div class="table-demontrasive">
                                                    
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;">
                                                        <thead class="m-datatable__head">
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Tidak sama sekali </br>(5)</th>
                                                            <th>Tidak </br>(4)</th>
                                                            <th>Cukup </br>(3)</th>
                                                            <th>Besar </br>(2)</th>
                                                            <th>Sangat besar</br>(1)</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Perpustakaan</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="perpustakaan1">
                                                                            <input type="radio" required name="perpustakaan" id="perpustakaan1" value="Tidak sama sekali">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="perpustakaan2">
                                                                            <input type="radio" required name="perpustakaan" id="perpustakaan2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="perpustakaan3">
                                                                            <input type="radio" required name="perpustakaan" id="perpustakaan3" value="Cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="perpustakaan4">
                                                                            <input type="radio" required name="perpustakaan" id="perpustakaan4" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="perpustakaan5">
                                                                            <input type="radio" required name="perpustakaan" id="perpustakaan5" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Teknologi Informasi dan Komunikasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="tik1">
                                                                            <input type="radio" required name="tik" id="tik1" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="tik2">
                                                                            <input type="radio" required name="tik" id="tik2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="tik3">
                                                                            <input type="radio" required name="tik" id="tik3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="tik4">
                                                                            <input type="radio" required name="tik" id="tik4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="tik5">
                                                                            <input type="radio" required name="tik" id="tik5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Modul belajar</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="modul1">
                                                                            <input type="radio" required name="modul" id="modul1" value="Tidak sama sekali ">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="modul2">
                                                                            <input type="radio" required name="modul" id="modul2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="modul3">
                                                                            <input type="radio" required name="modul" id="modul3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="modul4">
                                                                            <input type="radio" required name="modul" id="modul4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="modul5">
                                                                            <input type="radio" required name="modul" id="modul5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Ruang belajar/ruang kuliah</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_kuliah1">
                                                                            <input type="radio" required name="ruang_kuliah" id="ruang_kuliah1" value="Tidak sama sekali ">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_kuliah2">
                                                                            <input type="radio" required name="ruang_kuliah" id="ruang_kuliah2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_kuliah3">
                                                                            <input type="radio" required name="ruang_kuliah" id="ruang_kuliah3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_kuliah4">
                                                                            <input type="radio" required name="ruang_kuliah" id="ruang_kuliah4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_kuliah5">
                                                                            <input type="radio" required name="ruang_kuliah" id="ruang_kuliah5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Ruang belajar mandiri</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_belajar1">
                                                                            <input type="radio" required name="ruang_belajar" id="ruang_belajar1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_belajar2">
                                                                            <input type="radio" required name="ruang_belajar" id="ruang_belajar2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_belajar3">
                                                                            <input type="radio" required name="ruang_belajar" id="ruang_belajar3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_belajar4">
                                                                            <input type="radio" required name="ruang_belajar" id="ruang_belajar4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ruang_belajar5">
                                                                            <input type="radio" required name="ruang_belajar" id="ruang_belajar5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Laboratorium</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lab1">
                                                                            <input type="radio" required name="lab" id="lab1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lab2">
                                                                            <input type="radio" required name="lab" id="lab2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lab3">
                                                                            <input type="radio" required name="lab" id="lab3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lab4">
                                                                            <input type="radio" required name="lab" id="lab4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="lab5">
                                                                            <input type="radio" required name="lab" id="lab5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Variasi matakuliah yang ditawarkan</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="variasi1">
                                                                            <input type="radio" required name="variasi" id="variasi1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="variasi2">
                                                                            <input type="radio" required name="variasi" id="variasi2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="variasi3">
                                                                            <input type="radio" required name="variasi" id="variasi3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="variasi4">
                                                                            <input type="radio" required name="variasi" id="variasi4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="variasi5">
                                                                            <input type="radio" required name="variasi" id="variasi5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Akomodasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="akomodasi1">
                                                                            <input type="radio" required name="akomodasi" id="akomodasi1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="akomodasi2">
                                                                            <input type="radio" required name="akomodasi" id="akomodasi2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="akomodasi3">
                                                                            <input type="radio" required name="akomodasi" id="akomodasi3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="akomodasi4">
                                                                            <input type="radio" required name="akomodasi" id="akomodasi4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="akomodasi5">
                                                                            <input type="radio" required name="akomodasi" id="akomodasi5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kantin</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kantin1">
                                                                            <input type="radio" required name="kantin" id="kantin1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kantin2">
                                                                            <input type="radio" required name="kantin" id="kantin2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kantin3">
                                                                            <input type="radio" required name="kantin" id="kantin3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kantin4">
                                                                            <input type="radio" required name="kantin" id="kantin4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kantin5">
                                                                            <input type="radio" required name="kantin" id="kantin5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kegiatan_mahasiswa1">
                                                                            <input type="radio" required name="kegiatan_mahasiswa" id="kegiatan_mahasiswa1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kegiatan_mahasiswa2">
                                                                            <input type="radio" required name="kegiatan_mahasiswa" id="kegiatan_mahasiswa2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kegiatan_mahasiswa3">
                                                                            <input type="radio" required name="kegiatan_mahasiswa" id="kegiatan_mahasiswa3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kegiatan_mahasiswa4">
                                                                            <input type="radio" required name="kegiatan_mahasiswa" id="kegiatan_mahasiswa4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kegiatan_mahasiswa5">
                                                                            <input type="radio" required name="kegiatan_mahasiswa" id="kegiatan_mahasiswa5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Fasililtas layanan kesehatan</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="layanan_kesehatan1">
                                                                            <input type="radio" required name="layanan_kesehatan" id="layanan_kesehatan1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="layanan_kesehatan2">
                                                                            <input type="radio" required name="layanan_kesehatan" id="layanan_kesehatan2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="layanan_kesehatan3">
                                                                            <input type="radio" required name="layanan_kesehatan" id="layanan_kesehatan3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="layanan_kesehatan4">
                                                                            <input type="radio" required name="layanan_kesehatan" id="layanan_kesehatan4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="layanan_kesehatan5">
                                                                            <input type="radio" required name="layanan_kesehatan" id="layanan_kesehatan5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Beasiswa dan/atau bantuan biaya hidup</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="biaya_hidup1">
                                                                            <input type="radio" required name="biaya_hidup" id="biaya_hidup1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="biaya_hidup2">
                                                                            <input type="radio" required name="biaya_hidup" id="biaya_hidup2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="biaya_hidup3">
                                                                            <input type="radio" required name="biaya_hidup" id="biaya_hidup3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="biaya_hidup4">
                                                                            <input type="radio" required name="biaya_hidup" id="biaya_hidup4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="biaya_hidup5">
                                                                            <input type="radio" required name="biaya_hidup" id="biaya_hidup5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Parkir</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="parkir1">
                                                                            <input type="radio" required name="parkir" id="parkir1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="parkir2">
                                                                            <input type="radio" required name="parkir" id="parkir2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="parkir3">
                                                                            <input type="radio" required name="parkir" id="parkir3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="parkir4">
                                                                            <input type="radio" required name="parkir" id="parkir4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="parkir5">
                                                                            <input type="radio" required name="parkir" id="parkir5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Transportasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="transport1">
                                                                            <input type="radio" required name="transport" id="transport1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="transport2">
                                                                            <input type="radio" required name="transport" id="transport2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="transport3">
                                                                            <input type="radio" required name="transport" id="transport3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="transport4">
                                                                            <input type="radio" required name="transport" id="transport4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="transport5">
                                                                            <input type="radio" required name="transport" id="transport5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Toilet/sanitari</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="toilet1">
                                                                            <input type="radio" required name="toilet" id="toilet1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="toilet2">
                                                                            <input type="radio" required name="toilet" id="toilet2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="toilet3">
                                                                            <input type="radio" required name="toilet" id="toilet3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="toilet4">
                                                                            <input type="radio" required name="toilet" id="toilet4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="toilet5">
                                                                            <input type="radio" required name="toilet" id="toilet5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Fasilitas ibadah</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ibadah1">
                                                                            <input type="radio" required name="ibadah" id="ibadah1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ibadah2">
                                                                            <input type="radio" required name="ibadah" id="ibadah2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ibadah3">
                                                                            <input type="radio" required name="ibadah" id="ibadah3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ibadah4">
                                                                            <input type="radio" required name="ibadah" id="ibadah4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ibadah5">
                                                                            <input type="radio" required name="ibadah" id="ibadah5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_penilaian_fasilitas_belajar" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--[Bagaimana penilaian Anda terhadap pengalaman belajar di bawah ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px;">
                                        <div class="m-portlet__body">
                                            <b>Bagaimana penilaian Anda terhadap pengalaman belajar di bawah ini?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-12" style="margin-left:0px">
                                                    <div class="table-demontrasive">
                                                    
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;">
                                                        <thead class="m-datatable__head">
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Tidak sama sekali</th>
                                                            <th>Tidak </th>
                                                            <th>Cukup </th>
                                                            <th>Besar </th>
                                                            <th>Sangat besar</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pembelajaran di kelas</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kelas1">
                                                                            <input type="radio" required name="kelas" id="kelas1" value="Tidak sama sekali">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kelas2">
                                                                            <input type="radio" required name="kelas" id="kelas2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kelas3">
                                                                            <input type="radio" required name="kelas" id="kelas3" value="Cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kelas4">
                                                                            <input type="radio" required name="kelas" id="kelas4" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kelas5">
                                                                            <input type="radio" required name="kelas" id="kelas5" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Magang/kerja lapangan/praktikum</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang_kerja1">
                                                                            <input type="radio" required name="magang_kerja" id="magang_kerja1" value="Tidak sama sekali">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang_kerja2">
                                                                            <input type="radio" required name="magang_kerja" id="magang_kerja2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang_kerja3">
                                                                            <input type="radio" required name="magang_kerja" id="magang_kerja3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang_kerja4">
                                                                            <input type="radio" required name="magang_kerja" id="magang_kerja4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="magang_kerja5">
                                                                            <input type="radio" required name="magang_kerja" id="magang_kerja5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pengabdian masyarakat</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengabdian1">
                                                                            <input type="radio" required name="pengabdian" id="pengabdian1" value="Tidak sama sekali">
                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengabdian2">
                                                                            <input type="radio" required name="pengabdian" id="pengabdian2" value="Tidak">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengabdian3">
                                                                            <input type="radio" required name="pengabdian" id="pengabdian3" value="cukup">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengabdian4">
                                                                            <input type="radio" required name="pengabdian" id="pengabdian4" value="Besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengabdian5">
                                                                            <input type="radio" required name="pengabdian" id="pengabdian5" value="Sangat besar">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pelaksanaan riset/penulisan thesis</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="thesis1">
                                                                            <input type="radio" required name="thesis" id="thesis1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="thesis2">
                                                                            <input type="radio" required name="thesis" id="thesis2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="thesis3">
                                                                            <input type="radio" required name="thesis" id="thesis3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="thesis4">
                                                                            <input type="radio" required name="thesis" id="thesis4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="thesis5">
                                                                            <input type="radio" required name="thesis" id="thesis5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Organisasi kemahasiswaan internal fakultas</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_internal1">
                                                                            <input type="radio" required name="organisasi_internal" id="organisasi_internal1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_internal2">
                                                                            <input type="radio" required name="organisasi_internal" id="organisasi_internal2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_internal3">
                                                                            <input type="radio" required name="organisasi_internal" id="organisasi_internal3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_internal4">
                                                                            <input type="radio" required name="organisasi_internal" id="organisasi_internal4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_internal5">
                                                                            <input type="radio" required name="organisasi_internal" id="organisasi_internal5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Organisasi kemahasiswaan lintas fakultas di UNISMA</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas1">
                                                                            <input type="radio" required name="organisasi_lintas" id="organisasi_lintas1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas2">
                                                                            <input type="radio" required name="organisasi_lintas" id="organisasi_lintas2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas3">
                                                                            <input type="radio" required name="organisasi_lintas" id="organisasi_lintas3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas4">
                                                                            <input type="radio" required name="organisasi_lintas" id="organisasi_lintas4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas5">
                                                                            <input type="radio" required name="organisasi_lintas" id="organisasi_lintas5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Organisasi kemahasiswaaan lintas universitas nasional</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_nasional1">
                                                                            <input type="radio" required name="organisasi_lintas_nasional" id="organisasi_lintas_nasional1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_nasional2">
                                                                            <input type="radio" required name="organisasi_lintas_nasional" id="organisasi_lintas_nasional2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_nasional3">
                                                                            <input type="radio" required name="organisasi_lintas_nasional" id="organisasi_lintas_nasional3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_nasional4">
                                                                            <input type="radio" required name="organisasi_lintas_nasional" id="organisasi_lintas_nasional4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_nasional5">
                                                                            <input type="radio" required name="organisasi_lintas_nasional" id="organisasi_lintas_nasional5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Organisasi kemahasiswaan lintas universitas lintas negara (internasional)</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_negara1">
                                                                            <input type="radio" required name="organisasi_lintas_negara" id="organisasi_lintas_negara1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_negara2">
                                                                            <input type="radio" required name="organisasi_lintas_negara" id="organisasi_lintas_negara2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_negara3">
                                                                            <input type="radio" required name="organisasi_lintas_negara" id="organisasi_lintas_negara3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_negara4">
                                                                            <input type="radio" required name="organisasi_lintas_negara" id="organisasi_lintas_negara4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="organisasi_lintas_negara5">
                                                                            <input type="radio" required name="organisasi_lintas_negara" id="organisasi_lintas_negara5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Kegiatan ekstrakurikuler</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ekstrakurikuler1">
                                                                            <input type="radio" required name="ekstrakurikuler" id="ekstrakurikuler1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ekstrakurikuler2">
                                                                            <input type="radio" required name="ekstrakurikuler" id="ekstrakurikuler2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ekstrakurikuler3">
                                                                            <input type="radio" required name="ekstrakurikuler" id="ekstrakurikuler3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ekstrakurikuler4">
                                                                            <input type="radio" required name="ekstrakurikuler" id="ekstrakurikuler4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="ekstrakurikuler5">
                                                                            <input type="radio" required name="ekstrakurikuler" id="ekstrakurikuler5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td class="text-left">Rekreasi dan olahraga</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="olahraga1">
                                                                            <input type="radio" required name="olahraga" id="olahraga1" value="Tidak sama sekali">

                                                                        <span></span></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="olahraga2">
                                                                            <input type="radio" required name="olahraga" id="olahraga2" value="Tidak">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="olahraga3">
                                                                            <input type="radio" required name="olahraga" id="olahraga3" value="Cukup">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="olahraga4">
                                                                            <input type="radio" required name="olahraga" id="olahraga4" value="Besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="olahraga5">
                                                                            <input type="radio" required name="olahraga" id="olahraga5" value="Sangat besar">

                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_penilaian_pengalaman_belajar" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- [Pencarian Kerja dan Transisi ke Dunia Kerja] -->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">Pencarian Kerja dan Transisi ke Dunia Kerja</h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>DUNIA KERJA</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                </div>
                            </div> 

                            <!--[Apakah Anda sudah mempunyai pekerjaan saat lulus S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body" style="margin-top: -40px">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apakah Anda sudah mempunyai pekerjaan saat lulus S2 UNISMA?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sudah_kerja">
                                                            <input  type="radio" name="sudah_kerja" id="sudah_kerja" value="Sudah">
                                                            Sudah
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="sudah_kerja2">
                                                            <input  type="radio" name="sudah_kerja" id="sudah_kerja2" value="Belum">
                                                            Belum
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_sudah_kerja" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Apakah Anda pindah ke pekerjaan baru setelah lulus S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body" style="margin-top: -40px">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apakah Anda pindah ke pekerjaan baru setelah lulus S2 UNISMA?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pindah_kerja">
                                                            <input  type="radio" name="pindah_kerja" id="pindah_kerja" value="Ya">
                                                            Ya
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pindah_kerja2">
                                                            <input  type="radio" name="pindah_kerja" id="pindah_kerja2" value="Tidak, saya tetap bekerja di pekerjaan terdahulu">
                                                            Tidak, saya tetap bekerja di pekerjaan terdahulu
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_pindah_kerja" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[F3 Kapan Anda mulai mencari pekerjaan? ]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>F3. Kapan anda mulai mencari pekerjaan?</b><i>Mohon pekerjaan sambilan tidak dimasukkan ?</i>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="m-radio m-radio--solid m-radio--success" for="pertanyaan22">
                                                                        <input type="radio" required name="pertanyaan_f3" id="pertanyaan22" value="sebelum">
                                                                        Kira - kira &nbsp
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-control" placeholder="Jawaban Anda" type="text" disabled name="pertanyaanf3_input_sebelum" id="univs1">
                                                                </div>
                                                            </td>
                                                            <td>&nbsp bulan sebelum lulus S2 UNISMA</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="m-radio m-radio--solid m-radio--success" for="pertanyaan90">
                                                                        <input type="radio" name="pertanyaan_f3" id="pertanyaan90" value="setelah">
                                                                        Kira - kira &nbsp
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-control" placeholder="Jawaban Anda" type="text" disabled name="pertanyaanf3_input_setelah" id="univs1">
                                                                </div>
                                                            </td>
                                                            <td>&nbsp bulan setelah lulus S2 UNISMA</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="form-check">
                                                                    <label class="m-radio m-radio--solid m-radio--success" for="pertanyaan222">
                                                                        <input type="radio" name="pertanyaan_f3" id="pertanyaan222" value="tidak mencari kerja">
                                                                        Saya tidak mencari kerja
                                                                    <span></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_mulai_mencari_pekerjaan" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Bagaimana Anda mencari/mendapatkan pekerjaan setelah lulus S2 UNISMA? Jawaban bisa lebih dari satu]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Bagaimana Anda mencari/mendapatkan pekerjaan setelah lulus S2 UNISMA? (<i>jawaban boleh lebih dari satu</i>)</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf41">
                                                            <input type="checkbox" name="pertanyaanf4_iklan" id="pertanyaanf41" value="1">
                                                            Melalui iklan di koran/majalah, brosur
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf42">
                                                            <input type="checkbox" name="pertanyaanf4_melamar" id="pertanyaanf42" value="1">
                                                            Melamar ke perusahaan tanpa mengetahui lowongan yang ada
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf43">
                                                            <input type="checkbox" name="pertanyaanf4_pergi" id="pertanyaanf43" value="1">
                                                            Pergi ke bursa/pameran kerja
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf44">
                                                            <input type="checkbox" name="pertanyaanf4_mencari" id="pertanyaanf44" value="1">
                                                            Mencari lewat internet/iklan online/milis
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf45">
                                                            <input type="checkbox" name="pertanyaanf4_dihubungi" id="pertanyaanf45" value="1">
                                                            Dihubungi oleh perusahaan
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf415">
                                                            <input type="checkbox" name="pertanyaanf4_menghubungi_kemenakertrans" id="pertanyaanf415" value="1">
                                                            Menghubungi Kemenakertrans
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf46">
                                                            <input type="checkbox" name="pertanyaanf4_menghubungi_agen_tenaga_kerja" id="pertanyaanf46" value="1">
                                                            Menghubungi agen tenaga kerja komersial/swasta
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf47">
                                                            <input type="checkbox" name="pertanyaanf4_memeroleh" id="pertanyaanf47" value="1">
                                                            Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf48">
                                                            <input type="checkbox" name="pertanyaanf4_menghubungi_kantor" id="pertanyaanf48" value="1">
                                                            Menghubungi kantor kemahasiswaan/hubungan alumni
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf49">
                                                            <input type="checkbox" name="pertanyaanf4_membangun_jejaring" id="pertanyaanf49" value="1">
                                                            Membangun jejaring (network) sejak masih kuliah
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf410">
                                                            <input type="checkbox" name="pertanyaanf4_melalui" id="pertanyaanf410" value="1">
                                                            Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf411">
                                                            <input type="checkbox" name="pertanyaanf4_membangun_bisnis" id="pertanyaanf411" value="1">
                                                            Membangun bisnis sendiri
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf412">
                                                            <input type="checkbox" name="pertanyaanf4_melalui_magang" id="pertanyaanf412" value="1">
                                                            Melalui penempatan kerja atau magang
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf413">
                                                            <input type="checkbox" name="pertanyaanf4_bekerja_tempat_sama" id="pertanyaanf413" value="1">
                                                            Bekerja di tempat yang sama dengan tempat kerja semasa kuliah
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf416">
                                                            <input type="checkbox" name="pertanyaanf4_ditawari_pekerjaan_baru" id="pertanyaanf416" value="1">
                                                            Saya ditawari pekerjaan baru
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf414">
                                                            <input type="checkbox" name="pertanyaanf4_lainnya" id="pertanyaanf414" value="1">
                                                            Lainnya
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_mencari_pekerjaan" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- [PEKERJAAN SAAT INI] -->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">Lewati bagian ini jika Anda belum bekerja</h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>PEKERJAAN SAAT INI</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                </div>
                            </div> 
                            
                            <!--[Bagaimana Anda menggambarkan situasi Anda saat ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Bagaimana Anda menggambarkan situasi Anda saat ini? </b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja1">
                                                            <input type="radio" name="status_kerja" id="status_kerja1" value="Saya bekerja fulltime">
                                                            Saya bekerja fulltime
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja2">
                                                            <input type="radio" name="status_kerja" id="status_kerja2" value="Saya bekerja fulltime dan sedang mencari pekerjaan baru">
                                                            Saya bekerja fulltime dan sedang mencari pekerjaan baru
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja3">
                                                            <input type="radio" name="status_kerja" id="status_kerja3" value="Saya bekerja part-time">
                                                            Saya bekerja part-time
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja4">
                                                            <input type="radio" name="status_kerja" id="status_kerja4" value="Saya bekerja part-time dan sedang mencari pekerjaan baru">
                                                            Saya bekerja part-time dan sedang mencari pekerjaan baru
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja5">
                                                            <input type="radio" name="status_kerja" id="status_kerja5" value="Saya tidak/belum bekerja dan sedang mencari pekerjaan">
                                                            Saya tidak/belum bekerja dan sedang mencari pekerjaan
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja6">
                                                            <input type="radio" name="status_kerja" id="status_kerja6" value="Saya tidak/belum bekerja karena menikah">
                                                            Saya tidak/belum bekerja karena menikah
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja7">
                                                            <input type="radio" name="status_kerja" id="status_kerja7" value="Saya tidak/belum bekerja karena sibuk dengan keluarga dan anak-anak.">
                                                            Saya tidak/belum bekerja karena sibuk dengan keluarga dan anak-anak.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja8">
                                                            <input type="radio" name="status_kerja" id="status_kerja8" value="Saya tidak/belum bekerja karena memang memilih tidak bekerja.">
                                                            Saya tidak/belum bekerja karena memang memilih tidak bekerja.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="status_kerja9">
                                                            <input type="radio" name="status_kerja" id="status_kerja9" value="Saya tidak bekerja karena alasan lain">
                                                            Saya tidak bekerja karena alasan lain
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_status_saat_ini" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>     

                            <!--[Apa jenis perusahaan/ instansi/ institusi tempat Anda bekerja sekarang?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="table-demontrasive">
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;">
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Berijin</th>
                                                            <th>Tidak Berijin</th>
                                                            <th>Lokal</th>
                                                            <th>Nasional</th>
                                                            <th>Internasional</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <div class="checkbox-group required">
                                                            <tr class="text-center">
                                                                <td class="text-left">Wirausaha Ijin/tidak berijin</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastaijintidakberijinberijin">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin[]" id="wiraswastaijintidakberijinberijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastaijintidakberijintidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin[]" id="wiraswastaijintidakberijintidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastaijintidakberijinlokal">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin[]" id="wiraswastaijintidakberijinlokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastaijintidakberijinnasional">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin[]" id="wiraswastaijintidakberijinnasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastaijintidakberijininternasional">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin[]" id="wiraswastaijintidakberijininternasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Wirausaha Lokal/Nasional/Internasional</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastalokal/nasionalberijin">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastalokal_nasional[]" id="wiraswastalokal/nasionalberijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastalokal/nasionaltidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastalokal_nasional[]" id="wiraswastalokal/nasionaltidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastalokal/nasionallokal">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastalokal_nasional[]" id="wiraswastalokal/nasionallokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastalokal/nasionalnasional">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastalokal_nasional[]" id="wiraswastalokal/nasionalnasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="wiraswastainternasional">
                                                                            <input class="form-check-input" type="checkbox" name="wiraswastalokal_nasional[]" id="wiraswastainternasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Perusahaan swasta Ijin/tidak berijin</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanswastaberijin">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanswasta[]" id="perusahaanswastaberijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanswastatidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanswasta[]" id="perusahaanswastatidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanswastalokal">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanswasta[]" id="perusahaanswastalokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanswastanasional">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanswasta[]" id="perusahaanswastanasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanswastainternasional">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanswasta[]" id="perusahaanswastainternasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Perusahaan Lokal/Nasional/Internasional</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanlokalnasional_berijin">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional[]" id="perusahaanlokalnasional_berijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanlokalnasional_tidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional[]" id="perusahaanlokalnasional_tidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanlokalnasional_lokal">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional[]" id="perusahaanlokalnasional_lokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanlokalnasional_nasional">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional[]" id="perusahaanlokalnasional_nasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="perusahaanlokalnasional_internasional">
                                                                            <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional[]" id="perusahaanlokalnasional_internasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Instansi pemerintah (BUMN)</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="bumnberijin">
                                                                            <input class="form-check-input" type="checkbox" name="bumn[]" id="bumnberijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="bumntidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="bumn[]" id="bumntidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="bumnlokal">
                                                                            <input class="form-check-input" type="checkbox" name="bumn[]" id="bumnlokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="bumnnasional">
                                                                            <input class="form-check-input" type="checkbox" name="bumn[]" id="bumnnasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="bumninternasional">
                                                                            <input class="form-check-input" type="checkbox" name="bumn[]" id="bumninternasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                    <td class="text-left">Organisasi non-profit/Lembaga Swadaya Masyarakat</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="organisasiberijin">
                                                                            <input class="form-check-input" type="checkbox" name="organisasi_non_profit[]" id="organisasiberijin" value="berijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="organisasitidakberijin">
                                                                            <input class="form-check-input" type="checkbox" name="organisasi_non_profit[]" id="organisasitidakberijin" value="tidakberijin">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="organisasilokal">
                                                                            <input class="form-check-input" type="checkbox" name="organisasi_non_profit[]" id="organisasilokal" value="lokal">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="organisasinasional">
                                                                            <input class="form-check-input" type="checkbox" name="organisasi_non_profit[]" id="organisasinasional" value="nasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="organisasiinternasional">
                                                                            <input class="form-check-input" type="checkbox" name="organisasi_non_profit[]" id="organisasiinternasional" value="internasional">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </div>
                                                    </table>
                                                </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_jenis_perusahaan_tempat_bekerja" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[D6 Dimana lokasi tempat Anda bekerja? ]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Dimana alamat perusahaan tempat anda bekerja saat ini?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="Name">Pilih Provinsi</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select name="prov_perusahaan" id="txtinput_prov" 
                                                                class="custom-select select2 form-control" style="width:100%">
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="Name">Pilih Kabupaten/Kota</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select name="kota_perusahaan" id="txtinput_kota" 
                                                                class="custom-select select2 form-control" style="width:100%">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_alamat_tempat_bekerja" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Siapa nama atasan langsung anda?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Siapa nama atasan langsung anda?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="input-group mb-6">

                                                        <input type="text" placeholder="Jawaban Anda" name="nama_atasan_langsung" class="form-control" aria-label="Amount (to the nearest dollar)">

                                                        </div>
                                                        <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_nama_atasan_langsung" type="button"><b>Clear Selection</b>

                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Mohon menuliskan kontak HP atasan langsung Anda]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Mohon menuliskan kontak HP atasan langsung Anda</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="input-group mb-6">
                                                        <input type="text" placeholder="Jawaban Anda" name="no_hp_atasan" class="form-control">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_nohp_atasan_langsung" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--[Berapa nominal pendapatan Anda dari pekerjaan utama setiap bulan?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Berapa nominal pendapatan Anda dari pekerjaan utama setiap bulan?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="input-group mb-6">
                                                        <input type="text" onkeypress="return isNumberKey(event)" placeholder="5000000" name="pekerjaan_utama" class="form-control loan_max_amount">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_pendapatan_setiap_bulannya" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S2 UNISMA?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S2 UNISMA?</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="input-group mb-6">
                                                        <input type="text" onkeypress="return isNumberKey(event)" placeholder="5000000" name="kenaikan_s2" class="form-control loan_max_amount">
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kenaikan_s2" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- [Keselarasan Kompetensi] -->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="flaticon-statistics"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">Hubungan antara Studi dengan Kerja</h3>
                                            <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                <span>PEKERJAAN DAN KOMPETENSI</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                </div>
                            </div>

                            
                            <!--[Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bawah ini yang Anda kuasai? (A)]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bawah ini yang Anda kuasai? (A)</b>&nbsp<b style="color:red">*).required</b>
                                            <br><br>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">

                                                <div class="col-lg-12">
                                                    <div class="table-demontrasive">
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Sangat Rendah </br>(1)</th>
                                                            <th>Rendah </br>(2)</th>
                                                            <th>Cukup </br>(3)</th>
                                                            <th>Tinggi </br>(4)</th>
                                                            <th>Sangat Tinggi </br>(5)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Etika</td>
                                                                <td>
                                                                    <div class="form-check">

                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika1">
                                                                            <input class="form-check-input" required type="radio" name="etika" id="etika1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika2">
                                                                            <input class="form-check-input" type="radio" name="etika" id="etika2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika3">
                                                                            <input class="form-check-input" type="radio" name="etika" id="etika3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika4">
                                                                            <input class="form-check-input" type="radio" name="etika" id="etika4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika5">
                                                                            <input class="form-check-input" type="radio" name="etika" id="etika5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Keahlian Berdasarkan Bidang Ilmu</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian1">
                                                                            <input class="form-check-input" required type="radio" name="keahlian" id="keahlian1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian2">
                                                                            <input class="form-check-input" type="radio" name="keahlian" id="keahlian2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian3">
                                                                            <input class="form-check-input" type="radio" name="keahlian" id="keahlian3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian4">
                                                                            <input class="form-check-input" type="radio" name="keahlian" id="keahlian4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian5">
                                                                            <input class="form-check-input" type="radio" name="keahlian" id="keahlian5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Bahasa Inggris</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris1">
                                                                            <input class="form-check-input" required type="radio" name="bahasa_inggris" id="bahasa_inggris1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris2">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris3">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris4">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris5">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Penggunaan Teknologi Informasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti1">
                                                                            <input class="form-check-input" required type="radio" name="penggunaan_ti" id="penggunaan_ti1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti2">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti3">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti4">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti5">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Komunikasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi1">
                                                                            <input class="form-check-input" required type="radio" name="komunikasi" id="komunikasi1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi2">
                                                                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi3">
                                                                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi4">
                                                                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi5">
                                                                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kerja Sama Tim</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama1">
                                                                            <input class="form-check-input" required type="radio" name="kerjasama" id="kerjasama1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama2">
                                                                            <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama3">
                                                                            <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama4">
                                                                            <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama5">
                                                                            <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pengembangan Diri</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri1">
                                                                            <input class="form-check-input" required type="radio" name="pengembangan_diri" id="pengembangan_diri1" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri2">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri3">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri4">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri5">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kompetensi_yang_dikuasai" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bwah ini diperlukan dalam pekerjaan? (B)]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Pada saat lulus S2 UNISMA, pada tingkat mana kompetensi di bwah ini diperlukan dalam pekerjaan? (B)</b>&nbsp<b style="color:red">*).required</b>
                                            <br><br>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="table-demontrasive">
                                                    <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th></th>
                                                            <th>Sangat Rendah </br>(1)</th>
                                                            <th>Rendah </br>(2)</th>
                                                            <th>Cukup </br>(3)</th>
                                                            <th>Tinggi </br>(4)</th>
                                                            <th>Sangat Tinggi </br>(5)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td class="text-left">Etika</td>
                                                                <td>
                                                                    <div class="form-check">

                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika1_b">
                                                                            <input class="form-check-input" required type="radio" name="etika_b" id="etika1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika2_b">
                                                                            <input class="form-check-input" type="radio" name="etika_b" id="etika2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika3_b">
                                                                            <input class="form-check-input" type="radio" name="etika_b" id="etika3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika4_b">
                                                                            <input class="form-check-input" type="radio" name="etika_b" id="etika4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="etika5_b">
                                                                            <input class="form-check-input" type="radio" name="etika_b" id="etika5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Keahlian Berdasarkan Bidang Ilmu</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian1_b">
                                                                            <input class="form-check-input" required type="radio" name="keahlian_b" id="keahlian1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian2_b">
                                                                            <input class="form-check-input" type="radio" name="keahlian_b" id="keahlian2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian3_b">
                                                                            <input class="form-check-input" type="radio" name="keahlian_b" id="keahlian3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian4_b">
                                                                            <input class="form-check-input" type="radio" name="keahlian_b" id="keahlian4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="keahlian5_b">
                                                                            <input class="form-check-input" type="radio" name="keahlian_b" id="keahlian5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Bahasa Inggris</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris1_b">
                                                                            <input class="form-check-input" required type="radio" name="bahasa_inggris_b" id="bahasa_inggris1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris2_b">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris_b" id="bahasa_inggris2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris3_b">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris_b" id="bahasa_inggris3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris4_b">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris_b" id="bahasa_inggris4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris5_b">
                                                                            <input class="form-check-input" type="radio" name="bahasa_inggris_b" id="bahasa_inggris5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Penggunaan Teknologi Informasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti1_b">
                                                                            <input class="form-check-input" required type="radio" name="penggunaan_ti_b" id="penggunaan_ti1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti2_b">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti_b" id="penggunaan_ti2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti3_b">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti_b" id="penggunaan_ti3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti4_b">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti_b" id="penggunaan_ti4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti5_b">
                                                                            <input class="form-check-input" type="radio" name="penggunaan_ti_b" id="penggunaan_ti5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Komunikasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi1_b">
                                                                            <input class="form-check-input" required type="radio" name="komunikasi_b" id="komunikasi1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi2_b">
                                                                            <input class="form-check-input" type="radio" name="komunikasi_b" id="komunikasi2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi3_b">
                                                                            <input class="form-check-input" type="radio" name="komunikasi_b" id="komunikasi3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi4_b">
                                                                            <input class="form-check-input" type="radio" name="komunikasi_b" id="komunikasi4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="komunikasi5_b">
                                                                            <input class="form-check-input" type="radio" name="komunikasi_b" id="komunikasi5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kerja Sama Tim</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama1_b">
                                                                            <input class="form-check-input" required type="radio" name="kerjasama_b" id="kerjasama1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama2_b">
                                                                            <input class="form-check-input" type="radio" name="kerjasama_b" id="kerjasama2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama3_b">
                                                                            <input class="form-check-input" type="radio" name="kerjasama_b" id="kerjasama3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama4_b">
                                                                            <input class="form-check-input" type="radio" name="kerjasama_b" id="kerjasama4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="kerjasama5_b">
                                                                            <input class="form-check-input" type="radio" name="kerjasama_b" id="kerjasama5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pengembangan Diri</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri1_b">
                                                                            <input class="form-check-input" required type="radio" name="pengembangan_diri_b" id="pengembangan_diri1_b" value="1">
                                                                        <span></span>
                                                                    </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri2_b">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri_b" id="pengembangan_diri2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri3_b">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri_b" id="pengembangan_diri3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri4_b">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri_b" id="pengembangan_diri4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri5_b">
                                                                            <input class="form-check-input" type="radio" name="pengembangan_diri_b" id="pengembangan_diri5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kompetensi_dari_unisma" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Seberapa besar peran kompetensi yang diperoleh di S2 UNISMA berikut ini dalam melaksanakan pekerjaan Anda?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                        style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Seberapa besar peran kompetensi yang diperoleh di S2 UNISMA berikut ini dalam melaksanakan pekerjaan
                                                Anda?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="table-demontrasive">
                                                        <table class="table table-striped m-table"
                                                            style="display: block; min-height: 300px; overflow-x: auto;border:1">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th></th>
                                                                    <th>Tidak Sama Sekali</th>
                                                                    <th>Tidak</th>
                                                                    <th>Cukup</th>
                                                                    <th>Besar</th>
                                                                    <th>Sangat Besar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kompetensi multidisiplin di bidang program studi Anda</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="multidisiplin1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="multidisiplin" id="multidisiplin1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="multidisiplin2">
                                                                                <input class="form-check-input " type="radio" name="multidisiplin"
                                                                                    id="multidisiplin2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="multidisiplin3">
                                                                                <input class="form-check-input " type="radio" name="multidisiplin"
                                                                                    id="multidisiplin3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="multidisiplin4">
                                                                                <input class="form-check-input " type="radio" name="multidisiplin"
                                                                                    id="multidisiplin4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="multidisiplin5">
                                                                                <input class="form-check-input " type="radio" name="multidisiplin"
                                                                                    id="multidisiplin5" value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Pengetahuan isu terkini</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="isu_terkini1">
                                                                                <input class="form-check-input " type="radio" required
                                                                                    name="isu_terkini" id="isu_terkini1" value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="isu_terkini2">
                                                                                <input class="form-check-input " type="radio" name="isu_terkini"
                                                                                    id="isu_terkini2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="isu_terkini3">
                                                                                <input class="form-check-input " type="radio" name="isu_terkini"
                                                                                    id="isu_terkini3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="isu_terkini4">
                                                                                <input class="form-check-input " type="radio" name="isu_terkini"
                                                                                    id="isu_terkini4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="isu_terkini5">
                                                                                <input class="form-check-input " type="radio" name="isu_terkini"
                                                                                    id="isu_terkini5" value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Ketrampilan internet</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_internet1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="keterampilan_internet" id="keterampilan_internet1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_internet2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_internet" id="keterampilan_internet2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_internet3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_internet" id="keterampilan_internet3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_internet4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_internet" id="keterampilan_internet4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_internet5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_internet" id="keterampilan_internet5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Ketrampilan komputer</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_komputer1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="keterampilan_komputer" id="keterampilan_komputer1" value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_komputer2">
                                                                                <input class="form-check-input " type="radio" name="keterampilan_komputer"
                                                                                    id="keterampilan_komputer2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_komputer3">
                                                                                <input class="form-check-input " type="radio" name="keterampilan_komputer"
                                                                                    id="keterampilan_komputer3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_komputer4">
                                                                                <input class="form-check-input " type="radio" name="keterampilan_komputer"
                                                                                    id="keterampilan_komputer4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_komputer5">
                                                                                <input class="form-check-input " type="radio" name="keterampilan_komputer"
                                                                                    id="keterampilan_komputer5" value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Berpikir kritis</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berfikir_kritis1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="berfikir_kritis" id="berfikir_kritis1" value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berfikir_kritis2">
                                                                                <input class="form-check-input " type="radio" name="berfikir_kritis"
                                                                                    id="berfikir_kritis2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berfikir_kritis3">
                                                                                <input class="form-check-input " type="radio" name="berfikir_kritis"
                                                                                    id="berfikir_kritis3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berfikir_kritis4">
                                                                                <input class="form-check-input " type="radio" name="berfikir_kritis"
                                                                                    id="berfikir_kritis4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berfikir_kritis5">
                                                                                <input class="form-check-input " type="radio" name="berfikir_kritis"
                                                                                    id="berfikir_kritis5" value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Ketrampilan riset</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_riset1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="keterampilan_riset" id="keterampilan_riset1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_riset2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_riset" id="keterampilan_riset2"
                                                                                    value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_riset3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_riset" id="keterampilan_riset3"
                                                                                    value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_riset4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_riset" id="keterampilan_riset4"
                                                                                    value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="keterampilan_riset5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="keterampilan_riset" id="keterampilan_riset5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan belajar</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_belajar1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="kemampuan_belajar" id="kemampuan_belajar1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_belajar2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_belajar" id="kemampuan_belajar2"
                                                                                    value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_belajar3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_belajar" id="kemampuan_belajar3"
                                                                                    value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_belajar4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_belajar" id="kemampuan_belajar4"
                                                                                    value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_belajar5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_belajar" id="kemampuan_belajar5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan berkomunikasi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_komunikasi1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="kemampuan_komunikasi" id="kemampuan_komunikasi1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_komunikasi2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_komunikasi" id="kemampuan_komunikasi2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_komunikasi3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_komunikasi" id="kemampuan_komunikasi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_komunikasi4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_komunikasi" id="kemampuan_komunikasi4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kemampuan_komunikasi5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kemampuan_komunikasi" id="kemampuan_komunikasi5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Bekerja di bawah tekanan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="di_bawah_tekanan1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="di_bawah_tekanan" id="di_bawah_tekanan1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="di_bawah_tekanan2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="di_bawah_tekanan" id="di_bawah_tekanan2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="di_bawah_tekanan3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="di_bawah_tekanan" id="di_bawah_tekanan3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="di_bawah_tekanan4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="di_bawah_tekanan" id="di_bawah_tekanan4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="di_bawah_tekanan5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="di_bawah_tekanan" id="di_bawah_tekanan5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Manajemen waktu</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_waktu1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="manajemen_waktu" id="manajemen_waktu1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_waktu2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_waktu" id="manajemen_waktu2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_waktu3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_waktu" id="manajemen_waktu3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_waktu4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_waktu" id="manajemen_waktu4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_waktu5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_waktu" id="manajemen_waktu5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Bekerja secara mandiri</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_mandiri1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="bekerja_mandiri" id="bekerja_mandiri1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_mandiri2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_mandiri" id="bekerja_mandiri2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_mandiri3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_mandiri" id="bekerja_mandiri3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_mandiri4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_mandiri" id="bekerja_mandiri4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_mandiri5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_mandiri" id="bekerja_mandiri5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Bekerja dalam tim/bekerjasama dengan orang lain</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_tim1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="bekerja_tim" id="bekerja_tim1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_tim2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_tim" id="bekerja_tim2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_tim3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_tim" id="bekerja_tim3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_tim4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_tim" id="bekerja_tim4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="bekerja_tim5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="bekerja_tim" id="bekerja_tim5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan dalam memecahkan masalah</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="pemecahan_masalah1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="pemecahan_masalah" id="pemecahan_masalah1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="pemecahan_masalah2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="pemecahan_masalah" id="pemecahan_masalah2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="pemecahan_masalah3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="pemecahan_masalah" id="pemecahan_masalah3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="pemecahan_masalah4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="pemecahan_masalah" id="pemecahan_masalah4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="pemecahan_masalah5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="pemecahan_masalah" id="pemecahan_masalah5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Negosiasi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="negosiasi1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="negosiasi" id="negosiasi1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="negosiasi2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="negosiasi" id="negosiasi2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="negosiasi3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="negosiasi" id="negosiasi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="negosiasi4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="negosiasi" id="negosiasi4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="negosiasi5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="negosiasi" id="negosiasi5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan analisis</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="analisis1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="analisis" id="analisis1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="analisis2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="analisis" id="analisis2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="analisis3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="analisis" id="analisis3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="analisis4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="analisis" id="analisis4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="analisis5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="analisis" id="analisis5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Toleransi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="toleransi1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="toleransi" id="toleransi1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="toleransi2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="toleransi" id="toleransi2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="toleransi3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="toleransi" id="toleransi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="toleransi4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="toleransi" id="toleransi4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="toleransi5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="toleransi" id="toleransi5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan adaptasi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="adaptasi1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="adaptasi" id="adaptasi1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="adaptasi2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="adaptasi" id="adaptasi2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="adaptasi3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="adaptasi" id="adaptasi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="adaptasi4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="adaptasi" id="adaptasi4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="adaptasi5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="adaptasi" id="adaptasi5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Loyalitas</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="loyalitas1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="loyalitas" id="loyalitas1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="loyalitas2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="loyalitas" id="loyalitas2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="loyalitas3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="loyalitas" id="loyalitas3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="loyalitas4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="loyalitas" id="loyalitas4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="loyalitas5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="loyalitas" id="loyalitas5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Integritas</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="integritas1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="integritas" id="integritas1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="integritas2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="integritas" id="integritas2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="integritas3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="integritas" id="integritas3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="integritas4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="integritas" id="integritas4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="integritas5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="integritas" id="integritas5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="beda_budaya1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="beda_budaya" id="beda_budaya1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="beda_budaya2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="beda_budaya" id="beda_budaya2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="beda_budaya3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="beda_budaya" id="beda_budaya3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="beda_budaya4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="beda_budaya" id="beda_budaya4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="beda_budaya5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="beda_budaya" id="beda_budaya5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kepemimpinan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kepemimpinan1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="kepemimpinan" id="kepemimpinan1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kepemimpinan2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kepemimpinan" id="kepemimpinan2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kepemimpinan3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kepemimpinan" id="kepemimpinan3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kepemimpinan4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kepemimpinan" id="kepemimpinan4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="kepemimpinan5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="kepemimpinan" id="kepemimpinan5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan dalam memegang tanggungjawab</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="tanggungjawab1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="tanggungjawab" id="tanggungjawab1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="tanggungjawab2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="tanggungjawab" id="tanggungjawab2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="tanggungjawab3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="tanggungjawab" id="tanggungjawab3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="tanggungjawab4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="tanggungjawab" id="tanggungjawab4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="tanggungjawab5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="tanggungjawab" id="tanggungjawab5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Inisiatif</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="inisiatif1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="inisiatif" id="inisiatif1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="inisiatif2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="inisiatif" id="inisiatif2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="inisiatif3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="inisiatif" id="inisiatif3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="inisiatif4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="inisiatif" id="inisiatif4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="inisiatif5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="inisiatif" id="inisiatif5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Manajemen proyek/program</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_proyek1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="manajemen_proyek" id="manajemen_proyek1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_proyek2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_proyek" id="manajemen_proyek2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_proyek3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_proyek" id="manajemen_proyek3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_proyek4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_proyek" id="manajemen_proyek4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="manajemen_proyek5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="manajemen_proyek" id="manajemen_proyek5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="presentasi1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="presentasi" id="presentasi1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="presentasi2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="presentasi" id="presentasi2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="presentasi3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="presentasi" id="presentasi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="presentasi4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="presentasi" id="presentasi4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="presentasi5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="presentasi" id="presentasi5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="menulis_laporan1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="menulis_laporan" id="menulis_laporan1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="menulis_laporan2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="menulis_laporan" id="menulis_laporan2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="menulis_laporan3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="menulis_laporan" id="menulis_laporan3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="menulis_laporan4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="menulis_laporan" id="menulis_laporan4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="menulis_laporan5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="menulis_laporan" id="menulis_laporan5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan untuk terus belajar sepanjang hayat</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="belajar_sepanjang_hayat1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="belajar_sepanjang_hayat" id="belajar_sepanjang_hayat1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="belajar_sepanjang_hayat2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="belajar_sepanjang_hayat" id="belajar_sepanjang_hayat2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="belajar_sepanjang_hayat3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="belajar_sepanjang_hayat" id="belajar_sepanjang_hayat3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="belajar_sepanjang_hayat4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="belajar_sepanjang_hayat" id="belajar_sepanjang_hayat4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="belajar_sepanjang_hayat5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="belajar_sepanjang_hayat" id="belajar_sepanjang_hayat5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan berbahasa Inggris</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="berbahasa_inggris1">
                                                                                <input class="form-check-input " required type="radio"
                                                                                    name="berbahasa_inggris" id="berbahasa_inggris1"
                                                                                    value="Tidak Sama Sekali">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="berbahasa_inggris2">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="berbahasa_inggris" id="berbahasa_inggris2" value="Tidak">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="berbahasa_inggris3">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="berbahasa_inggris" id="berbahasa_inggris3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="berbahasa_inggris4">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="berbahasa_inggris" id="berbahasa_inggris4" value="Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success"
                                                                                for="berbahasa_inggris5">
                                                                                <input class="form-check-input " type="radio"
                                                                                    name="berbahasa_inggris" id="berbahasa_inggris5"
                                                                                    value="Sangat Besar">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light"
                                                            id="reset_peran_kompetensi" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf14">
                                                            <input type="radio" required name="pertanyaanf14" id="pertanyaanf14" value="1">
                                                            Sangat erat
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf141">
                                                            <input type="radio" name="pertanyaanf14" id="pertanyaanf141" value="2">
                                                            Erat
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf142">
                                                            <input type="radio" name="pertanyaanf14" id="pertanyaanf142" value="3">
                                                            Cukup Erat
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf143">
                                                            <input type="radio" name="pertanyaanf14" id="pertanyaanf143" value="4">
                                                            Kurang Erat
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf144">
                                                            <input type="radio" name="pertanyaanf14" id="pertanyaanf144" value="5">
                                                            Tidak Sama Sekali
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_Seberapaerathubunganantarabidangstudi" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?</b>&nbsp<b style="color:red">*).required</b>
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf15">
                                                            <input type="radio" required name="pertanyaanf15" id="pertanyaanf15" value="1">
                                                            Setingkat Lebih Tinggi
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf151">
                                                            <input type="radio" name="pertanyaanf15" id="pertanyaanf151" value="2">
                                                            Tingkat Yang Sama
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf152">
                                                            <input type="radio" name="pertanyaanf15" id="pertanyaanf152" value="3">
                                                            Setingkat Lebih Rendah
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-radio m-radio--solid m-radio--success" for="pertanyaanf153">
                                                            <input type="radio" name="pertanyaanf15" id="pertanyaanf153" value="4">
                                                            Tidak Perlu Pendidikan Tinggi
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--[Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? Jawaban bisa lebih dari satu]-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <b>Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? </b>(<i> Jawaban bisa lebih dari satu</i>)
                                            <div class="form-group m-form__group row" style="margin-left: -40px">
                                                <div class="col-lg-12">
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf161">
                                                            <input type="checkbox" name="pertanyaanf16_pertanyaan_tidak_sesuai" id="pertanyaanf161" value="1">
                                                            Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf162">
                                                            <input type="checkbox" name="pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai" id="pertanyaanf162" value="1">
                                                            Saya belum mendapatkan pekerjaan yang lebih sesuai.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf163">
                                                            <input type="checkbox" name="pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik" id="pertanyaanf163" value="1">
                                                            Di pekerjaan ini saya memeroleh prospek karir yang baik.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf164">
                                                            <input type="checkbox" name="pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan" id="pertanyaanf164" value="1">
                                                            Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf165">
                                                            <input type="checkbox" name="pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang" id="pertanyaanf165" value="1">
                                                            Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf166">
                                                            <input type="checkbox" name="pertanyaanf16_Saya_dapat_memeroleh_pendapatan" id="pertanyaanf166" value="1">
                                                            Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf167">
                                                            <input type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure" id="pertanyaanf167" value="1">
                                                            Pekerjaan saya saat ini lebih aman/terjamin/secure.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf168">
                                                            <input type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik" id="pertanyaanf168" value="1">
                                                            Pekerjaan saya saat ini lebih menarik.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf169">
                                                            <input type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan" id="pertanyaanf169" value="1">
                                                            Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf1610">
                                                            <input type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat" id="pertanyaanf1610" value="1">
                                                            Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf1611">
                                                            <input type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih" id="pertanyaanf1611" value="1">
                                                            Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf1612">
                                                            <input type="checkbox" name="pertanyaanf16_Pada_awal_meniti_karir_ini" id="pertanyaanf1612" value="1">
                                                            Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="pertanyaanf1613">
                                                            <input type="checkbox" name="pertanyaanf16_Lainnya" id="pertanyaanf1613" value="1">
                                                            Lainnya:
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                    <div align="right">
                                                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat2" type="button"><b>Clear Selection</b>
                                                        </button>
                                                    </div>
                                                    </br>
                                                    
                                                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                                        <div class="m-form__actions m-form__actions--solid" style="padding: 10px;">
                                                            <div class="row">
                                                                <div class="col-lg-6">

                                                                </div>
                                                                <div class="col-lg-6 m--align-right">

                                                                    <button type="submit" class="btn btn-success">Submit Tracer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
				</div>
			</div>

			<footer class="m-grid__item		m-footer " style="margin-left:0px">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2020 &copy; sistem Tracer Study by <a href="https://keenthemes.com" class="m-link">UNISMA</a>
							</span>
						</div>
					</div>
                </div>
            </footer>
            <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header" style="padding:11px">
                            <h5 class="modal-title">Detail Data Alumni</h5>

                          </div>

                        <div class="modal-body">
                            <div class="m-portlet m-portlet--full-height " style="background-color: transparant">

                                <div class="m-portlet__body" style="background-color: transparant">
                                    <div class="m-widget13" style="background-color: transparant">
                                        <div class="m-widget13__item">
                                            <span class="m-widget13__desc m--align-right">
                                                NPM
                                            </span>
                                            <span class="m-widget13__text">
                                                {{$data_mhs->npm}}
                                            </span>
                                        </div>
                                        <div class="m-widget13__item">
                                            <span class="m-widget13__desc m--align-right">
                                               Nama Alumni:
                                            </span>
                                            <span class="m-widget13__text">
                                                {{$data_mhs->nama}}
                                            </span>
                                        </div>
                                        <div class="m-widget13__item">
                                            <span class="m-widget13__desc m--align-right">
                                               Tahun lulus:
                                            </span>
                                            <span class="m-widget13__text">
                                                {{$data_mhs->tahun_lulus}}
                                            </span>
                                        </div>

                                        <div class="m-widget13__item">
                                            <span class="m-widget13__desc m--align-right">
                                               Kode PT:
                                            </span>
                                            <span class="m-widget13__text m-widget13__number-bolder m--font-brand">
                                                {{$data_mhs->kode_pt}}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer" style="margin-top: -35px">
                            <button id="m_aside_header_topbar_mobile_toggle" type="button" class="btn btn-danger m-brand__icon m--visible-tablet-and-mobile-inline-block" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

			<!-- end::Footer -->
        </div>
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
        </div>

		<!--begin:: Global Mandatory Vendors -->
		<script src="../public/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="../public/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../public/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="../public/vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="../public/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="../public/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="../public/vendors/wnumb/wNumb.js" type="text/javascript"></script>

		<!--end:: Global Mandatory ../public/Vendors -->

		<!--begin:: Global Optional ../public/Vendors -->
		<script src="../public/vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="../public/vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="../public/vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="../public/vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="../public/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
		<script src="../public/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="../public/vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="../public/vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="../public/vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="../public/vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="../public/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="../public/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="../public/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
		<script src="../public/vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="../public/vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="../public/vendors/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="../public/vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="../public/vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="../public/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="../public/vendors/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="../public/vendors/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="../public/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="../public/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
		<script src="../public/vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
		<script src="../public/vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="../public/vendors/jstree/dist/jstree.js" type="text/javascript"></script>
		<script src="../public/vendors/raphael/raphael.js" type="text/javascript"></script>
		<script src="../public/vendors/morris.js/morris.js" type="text/javascript"></script>
		<script src="../public/vendors/chartist/dist/chartist.js" type="text/javascript"></script>
		<script src="../public/vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="../public/vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
		<script src="../public/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="../public/vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="../public/vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="../public/vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="../public/vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="../public/vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
        <script src="../public/vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>
        <script src="../public/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <script src="../public/assets/demo/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
        <script src="../public/assets/demo/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
        <script src="../public/assets/demo/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
		<!--end:: Global Optional Vendors -->
        <script src="../public/assets/demo/custom/components/base/blockui.js" type="text/javascript"></script>
		<!--begin::Global Theme Bundle -->
		<script src="../public/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
        <script src="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js" type="text/javascript"></script>
        
		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="../public/assets/app/js/dashboard.js" type="text/javascript"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>
            <script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>
        <script>
            const form = document.querySelector('#survey-form');
            // listen to the 'submit' event on the form
            form.addEventListener('submit', evt => {
                // prevent the submit event
                evt.preventDefault();

                // display an alert
                swal('Submit Tracer Study?', {
                    buttons: true
                }).then(val => {
                    // when the promise resolves,
                    // check the value that was passed
                    if (val) {
                    // if the value is true,
                    // actually submit the form
                    form.submit();
                    }
                });
            })
            document.querySelectorAll('.loan_max_amount').forEach(inp => new Cleave(inp, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
              }));
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
            $(document).ready(function(){
                $('div.checkbox-group.required :checkbox:checked').length > 0;
                $('#click_alumni').click(function(){
                    var isi_alumni = '<hr><table border=0>'+ '<tr><td style="text-align: left;">NPM</td><td>:</td><td style="text-align: left;"><b>&nbsp{{$data_mhs->npm}}</b></td></tr>'+ '<tr><td style="text-align: left;">Nama</td><td>:</td><td>&nbsp<b>{{$data_mhs->nama}}</b></td></tr>' + '<tr><td style="text-align: left;">Tahun lulus</td><td>:</td><td style="text-align: left;">&nbsp<b>{{$data_mhs->tahun_lulus}}</b></td></tr>'+ '<tr><td style="text-align: left;">Kode PT</td><td>:</td><td style="text-align: left;">&nbsp<b>{{$data_mhs->kode_pt}}</b></td></tr>' +'</table>'
                    Swal.fire({
                        title: "Data Alumni<hr>",
                        html:  isi_alumni,
                        confirmButtonText: "OK",
                      });
                });
                $('#click_alumni2').click(function(){
                    var isi_alumni = '<hr><table border=0>'+ '<tr><td style="text-align: left;">NPM</td><td>:</td><td style="text-align: left;"><b>&nbsp{{$data_mhs->npm}}</b></td></tr>'+ '<tr><td style="text-align: left;">Nama</td><td>:</td><td>&nbsp<b>{{$data_mhs->nama}}</b></td></tr>' + '<tr><td style="text-align: left;">Tahun lulus</td><td>:</td><td style="text-align: left;">&nbsp<b>{{$data_mhs->tahun_lulus}}</b></td></tr>'+ '<tr><td style="text-align: left;">Kode PT</td><td>:</td><td style="text-align: left;">&nbsp<b>{{$data_mhs->kode_pt}}</b></td></tr>' +'</table>'
                    Swal.fire({
                        title: "Data Alumni<hr>",
                        html:  isi_alumni,
                        confirmButtonText: "OK",
                      });
                });

                function IsEmail(email) {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(!regex.test(email)) {
                      return false;
                    }else{
                      return true;
                    }
                  }

                $('form').submit(function() {
                    $(window).unbind('beforeunload');
                });

                $(window).on('beforeunload', function(){
                    return 'Are you sure you want to leave?';
                    });

                $('#tahun_lulus').datepicker({
                    format: 'yyyy-mm-dd'
                });
                $('#tahun_masuk').datepicker({
                    format: 'yyyy-mm-dd'
                });
                $('#masuks1').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('#txtinput_prov').select2({
                    placeholder: 'Pilih Provinsi...',
                    dropdownParent: $("#txtinput_prov").parent(),
                    ajax: {
                        url: '{{url("/cari/kode_prov")}}',
                        dataType: 'json',
                        delay: 50,
                        processResults: function (data) {
                            return {
                                results:  $.map(data, function (item) {
                                    return {
                                        text: item.nm_prov,
                                        id: item.id_prov 
                                    }
                                })
                            };
                        },
                        cache: true,
                    }
                });
                
                $('#txtinput_prov').on('select2:select', function (e) {
                    var data = e.params.data;
                    console.log(data);
                    var url = '{{url("/cari/kode_kota")}}' + '/' + data.id;
                    $("#txtinput_kota").val(null).trigger('change');
                    ajax_kota(url);
                });

                $("#txtinput_kota").select2({
                    placeholder : 'Pilih Kabupaten/Kota'
                });

                function ajax_kota(url){
                    $('#txtinput_kota').select2({
                        placeholder: 'Pilih Kabupaten/Kota',
                        dropdownParent: $("#txtinput_kota").parent(),
                        minimumResultsForSearch:1,
                        ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 50,
                        processResults: function (data) {
                            return {
                            results:  $.map(data, function (item) {
                                return {
                                text: item.nm_kota,
                                id: item.id_kota 
                                }
                            })
                            };
                        },
                        cache: true,
                        }
                    });
                }



                $('.isi_quisioner').fadeOut();
                $('.berikutnya').click(function(){
                    if($('input[name ="email"]').val() == '' || $('input[name ="jeniskelamin"]').value == '' || $('input[name ="no_whatsapp"]').val() == '' || $('input[name ="alamat"]').val() == ''){
                        swal({
                            title: "Peringatan!",
                            text: "Lengkapi data Anda terlebih dahulu, untuk mengisi quisioner alumni !",
                            button: "OKE",
                        });
                    }else if(IsEmail($('input[name ="email"]').val())==false){
                        swal({
                            title: "Peringatan!",
                            text: "Format email yang anda masukkan salah !",
                            button: "OKE",
                        });
                    }else{
                        $('.isi_biodata').hide();
                        $('.isi_quisioner').fadeIn();
                    }
                });

                //[Apa nama Perguruan Tinggi terakhir sebelum menempuh pendidikan di S2 UNISMA?]
                $('#reset_univs1').click(function() {
                    $('input[name="univs1"]').val('');
                });
                //[Apa Program Studi yang Anda ambil sebelum menempuh pendidikan di S2 UNISMA?]
                $('#reset_prodis1').click(function() {
                    $('input[name="prodis1"]').val('');
                });
                //[Tahun berapa Anda lulus S1?]
                $('#reset_masuks1').click(function() {
                    $('#masuks1').datepicker('setDate', null);
                });
                //[Apakah Anda bekerja sebelum kuliah di S2 UNISMA?]
                $('#reset_riwayat_kerja').click(function() {
                    $('input[name="riwayat_kerja"]').prop('checked', false);
                });
                
                //[Apakah pendidikan yang diambil di S2 Unisma sesuai dengan latar belakang pendidikan Anda?]
                $('#reset_sesuailb').click(function() {
                    $('input[name="sesuailb"]').prop('checked', false);
                });
                //[Apakah pendidikan yang diambil di S2 Unisma sesuai dengan bidang pekerjaan Anda saat ini?]
                $('#reset_sesuaibp').click(function() {
                    $('input[name="sesuaibp"]').prop('checked', false);
                });
                //[B8 Menurut Anda seberapa besar penekanan pada metode  pembelajaran di bawah ini dilaksanakan di program studi Anda]
                $('#reset_penekanan_pada_metode_pembelajaran').click(function() {
                    $('input[name="kuliah"]').prop('checked', false);
                    $('input[name="demontrasi"]').prop('checked', false);
                    $('input[name="riset"]').prop('checked', false);
                    $('input[name="praktikum"]').prop('checked', false);
                    $('input[name="magang"]').prop('checked', false);
                    $('input[name="diskusi"]').prop('checked', false);
                    $('input[name="kerja_lapangan"]').prop('checked', false);
                });
                //[Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?]
                $('#reset_penilaian_belajar_mengajar').click(function() {
                    $('input[name="interaksi_dosen"]').prop('checked', false);
                    $('input[name="bimbingan_akademik"]').prop('checked', false);
                    $('input[name="proyek_riset"]').prop('checked', false);
                    $('input[name="jejaring_ilmiah"]').prop('checked', false);
                    $('input[name="kondisi_belajar"]').prop('checked', false);
                    $('input[name="interaksi_teman"]').prop('checked', false);
                    $('input[name="partisipasi_pelayanan"]').prop('checked', false);
                    $('input[name="lainnya"]').prop('checked', false);
                });

                //[Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini?]
                $('#reset_penilaian_fasilitas_belajar').click(function() {
                    $('input[name="perpustakaan"]').prop('checked', false);
                    $('input[name="tik"]').prop('checked', false);
                    $('input[name="modul"]').prop('checked', false);
                    $('input[name="ruang_belajar"]').prop('checked', false);
                    $('input[name="ruang_kuliah"]').prop('checked', false);
                    $('input[name="lab"]').prop('checked', false);
                    $('input[name="variasi"]').prop('checked', false);
                    $('input[name="akomodasi"]').prop('checked', false);
                    $('input[name="kantin"]').prop('checked', false);
                    $('input[name="kegiatan_mahasiswa"]').prop('checked', false);
                    $('input[name="layanan_kesehatan"]').prop('checked', false);
                    $('input[name="biaya_hidup"]').prop('checked', false);
                    $('input[name="parkir"]').prop('checked', false);
                    $('input[name="transport"]').prop('checked', false);
                    $('input[name="toilet"]').prop('checked', false);
                    $('input[name="ibadah"]').prop('checked', false);
                });

                //[Bagaimana penilaian Anda terhadap pengalaman belajar di bawah ini?]
                $('#reset_penilaian_pengalaman_belajar').click(function() {
                    $('input[name="kelas"]').prop('checked', false);
                    $('input[name="magang_kerja"]').prop('checked', false);
                    $('input[name="pengabdian"]').prop('checked', false);
                    $('input[name="organisasi_internal"]').prop('checked', false);
                    $('input[name="thesis"]').prop('checked', false);
                    $('input[name="organisasi_lintas"]').prop('checked', false);
                    $('input[name="organisasi_lintas_nasional"]').prop('checked', false);
                    $('input[name="organisasi_lintas_negara"]').prop('checked', false);
                    $('input[name="ekstrakurikuler"]').prop('checked', false);
                    $('input[name="olahraga"]').prop('checked', false);
                });

                
                //[Apakah Anda sudah mempunyai pekerjaan saat lulus S2 UNISMA?]
                $('#reset_sudah_kerja').click(function() {
                    $('input[name="sudah_kerja"]').prop('checked', false);
                });

                //[Apakah Anda pindah ke pekerjaan baru setelah lulus S2 UNISMA?]
                $('#reset_pindah_kerja').click(function() {
                    $('input[name="pindah_kerja"]').prop('checked', false);
                });

                //[Kapan Anda mulai mencari pekerjaan? ]
                $('#reset_mulai_mencari_pekerjaan').click(function() {
                    $('input[name="pertanyaan_f3"]').prop('checked', false);                    
                    $('input[name="pertanyaanf3_input_sebelum"]').prop("disabled", true);
                    $('input[name="pertanyaanf3_input_sebelum"]').val('');
                    $('input[name="pertanyaanf3_input_setelah"]').prop("disabled", true);
                    $('input[name="pertanyaanf3_input_setelah"]').val('');
                });
                $("#pertanyaan22").change(function(event){
                    event.preventDefault();
                    $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", false);
                    $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", true);
                    $('input[name ="pertanyaanf3_input_setelah"]').val('');
                });
                $("#pertanyaan222").change(function(event){
                    event.preventDefault();
                    $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", true);
                    $('input[name ="pertanyaanf3_input_sebelum"]').val('');
                    $('input[name ="pertanyaanf3_input_setelah"]').val('');
                    $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", true);
                });
                $("#pertanyaan90").change(function(event){
                    event.preventDefault();
                    $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", false);
                    $('input[name ="pertanyaanf3_input_sebelum"]').val('');
                    $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", true);
                });

                //[Bagaimana Anda mencari/mendapatkan pekerjaan setelah lulus S2 UNISMA? Jawaban bisa lebih dari satu ]
                $('#reset_mencari_pekerjaan').click(function() {
                    $('input[name="pertanyaanf4_iklan"]').prop('checked', false);
                    $('input[name="pertanyaanf4_melamar"]').prop('checked', false);
                    $('input[name="pertanyaanf4_pergi"]').prop('checked', false);
                    $('input[name="pertanyaanf4_mencari"]').prop('checked', false);
                    $('input[name="pertanyaanf4_dihubungi"]').prop('checked', false);
                    $('input[name="pertanyaanf4_menghubungi_kemenakertrans"]').prop('checked', false);
                    $('input[name="pertanyaanf4_menghubungi_agen_tenaga_kerja"]').prop('checked', false);
                    $('input[name="pertanyaanf4_memeroleh"]').prop('checked', false);
                    $('input[name="pertanyaanf4_menghubungi_kantor"]').prop('checked', false);
                    $('input[name="pertanyaanf4_membangun_jejaring"]').prop('checked', false);
                    $('input[name="pertanyaanf4_melalui"]').prop('checked', false);
                    $('input[name="pertanyaanf4_membangun_bisnis"]').prop('checked', false);
                    $('input[name="pertanyaanf4_melalui_magang"]').prop('checked', false);
                    $('input[name="pertanyaanf4_bekerja_tempat_sama"]').prop('checked', false);
                    $('input[name="pertanyaanf4_ditawari_pekerjaan_baru"]').prop('checked', false);
                    $('input[name="pertanyaanf4_lainnya"]').prop('checked', false);
                });

                //[Bagaimana Anda menggambarkan situasi Anda saat ini?]
                $('#reset_status_saat_ini').click(function() {
                    $('input[name="status_kerja"]').prop('checked', false);
                });

                //[D4 Apa jenis perusahaan/ instansi/ institusi tempat Anda bekerja sekarang?]
                $('#reset_jenis_perusahaan_tempat_bekerja').click(function() {
                    $('input[name="wiraswastaijintidakberijin_ijin"]').prop('checked', false);
                    $('input[name="wiraswastaijintidakberijin_tidakijin"]').prop('checked', false);
                    $('input[name="wiraswastaijintidakberijin_lokal"]').prop('checked', false);
                    $('input[name="wiraswastaijintidakberijin_nasional"]').prop('checked', false);
                    $('input[name="wiraswastaijintidakberijin_internasional"]').prop('checked', false);
                });

                //[Apa nama perusahaan/kantor tempat Anda bekerja?]
                $('#reset_perusahaan_tempat_bekerja').click(function() {
                    $('input[name="nama_perusahaan"]').val('');
                });

                //[Dimana lokasi tempat Anda bekerja? ]
                $('#reset_alamat_tempat_bekerja').click(function() {
                    $('#txtinput_prov').val(null).trigger('change');
                    $('#txtinput_kota').val(null).trigger('change');
                });

                //[Siapa nama atasan langsung anda?]
                $('#reset_nama_atasan_langsung').click(function() {
                    $('input[name="nama_atasan_langsung"]').val('');
                });

                //[Mohon menuliskan kontak HP atasan langsung Anda]
                $('#reset_nohp_atasan_langsung').click(function() {
                    $('input[name="no_hp_atasan"]').val('');
                });
                
                //[Berapa nominal pendapatan Anda dari pekerjaan utama setiap bulan?]
                $('#reset_pendapatan_setiap_bulannya').click(function() {
                    $('input[name="pekerjaan_utama"]').val('');
                });

                //[Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S2 UNISMA?]
                $('#reset_kenaikan_s2').click(function() {
                    $('input[name="kenaikan_s2"]').val('');
                });

                //[Pada saat lulus, pada tingkat mana kompetensi di bawah ini Anda kuasai? (A)]
                $('#reset_kompetensi_yang_dikuasai').click(function() {
                    $('input[name="etika"]').prop('checked', false);
                    $('input[name="keahlian"]').prop('checked', false);
                    $('input[name="bahasa_inggris"]').prop('checked', false);
                    $('input[name="penggunaan_ti"]').prop('checked', false);
                    $('input[name="komunikasi"]').prop('checked', false);
                    $('input[name="kerjasama"]').prop('checked', false);
                    $('input[name="pengembangan_diri"]').prop('checked', false);
                });

                //[Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? (B)]
                $('#reset_kompetensi_dari_unisma').click(function() {
                    $('input[name="etika_b"]').prop('checked', false);
                    $('input[name="keahlian_b"]').prop('checked', false);
                    $('input[name="bahasa_inggris_b"]').prop('checked', false);
                    $('input[name="penggunaan_ti_b"]').prop('checked', false);
                    $('input[name="komunikasi_b"]').prop('checked', false);
                    $('input[name="kerjasama_b"]').prop('checked', false);
                    $('input[name="pengembangan_diri_b"]').prop('checked', false);
                });

                //[Seberapa besar peran kompetensi yang diperoleh di S2 UNISMA berikut ini dalam melaksanakan pekerjaan Anda?]
                $('#reset_peran_kompetensi').click(function() {
                    $('input[name="multidisiplin"]').prop('checked', false);
                    $('input[name="isu_terkini"]').prop('checked', false);
                    $('input[name="keterampilan_internet"]').prop('checked', false);
                    $('input[name="keterampilan_komputer"]').prop('checked', false);
                    $('input[name="berfikir_kritis"]').prop('checked', false);
                    $('input[name="keterampilan_riset"]').prop('checked', false);
                    $('input[name="kemampuan_belajar"]').prop('checked', false);
                    $('input[name="kemampuan_komunikasi"]').prop('checked', false);
                    $('input[name="di_bawah_tekanan"]').prop('checked', false);
                    $('input[name="manajemen_waktu"]').prop('checked', false);
                    $('input[name="bekerja_mandiri"]').prop('checked', false);
                    $('input[name="bekerja_tim"]').prop('checked', false);
                    $('input[name="pemecahan_masalah"]').prop('checked', false);
                    $('input[name="negosiasi"]').prop('checked', false);
                    $('input[name="analisis"]').prop('checked', false);
                    $('input[name="toleransi"]').prop('checked', false);
                    $('input[name="adaptasi"]').prop('checked', false);
                    $('input[name="loyalitas"]').prop('checked', false);
                    $('input[name="integritas"]').prop('checked', false);
                    $('input[name="beda_budaya"]').prop('checked', false);
                    $('input[name="kepemimpinan"]').prop('checked', false);
                    $('input[name="tanggungjawab"]').prop('checked', false);
                    $('input[name="inisiatif"]').prop('checked', false);
                    $('input[name="manajemen_proyek"]').prop('checked', false);
                    $('input[name="presentasi"]').prop('checked', false);
                    $('input[name="menulis_laporan"]').prop('checked', false);
                    $('input[name="belajar_sepanjang_hayat"]').prop('checked', false);
                    $('input[name="berbahasa_inggris"]').prop('checked', false);
                });

                //[Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?]
                $('#reset_Seberapaerathubunganantarabidangstudi').click(function() {
                    $('input[name="pertanyaanf14"]').prop('checked', false);
                });

                //[Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?]
                $('#reset_tingkat_pendidikan_yang_tepat').click(function() {
                    $('input[name="pertanyaanf15"]').prop('checked', false);
                });

                //[Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya?]
                $('#reset_tingkat_pendidikan_yang_tepat2').click(function() {
                    $('input[name="pertanyaanf16_pertanyaan_tidak_sesuai"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai"]').prop('checked', false);
                    $('input[name="pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik"]').prop('checked', false);
                    $('input[name="pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan"]').prop('checked', false);
                    $('input[name="pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Saya_dapat_memeroleh_pendapatan"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Pada_awal_meniti_karir_ini"]').prop('checked', false);
                    $('input[name="pertanyaanf16_Lainnya"]').prop('checked', false);
                });

            });
        </script>
    </body>
</html>