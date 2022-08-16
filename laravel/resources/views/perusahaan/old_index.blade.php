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
		<link href="public/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
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
        <link href="public/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles -->
		<link href="public/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="public/assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

        <link href="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="public/assets/demo/media/img/logo/favicon.ico" />
	</head>
	<body style="background-image: public/images/logounisma.png" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
                                        <img src="public/images/logounisma.png" style="width: 47px">&nbsp&nbsp
                                        <a style="font-size: 23px;color:#f0f0e9;font-family: 'Passion One';">Tracer Study</a></H4>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools" >
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
                        <form id="survey-form" method="POST" action="{{url('submit-perusahaan')}}">
                            <div class="isi_biodata">
                                @csrf
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 2rem;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Mohon Lengkapi Data dibawah ini
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
                                                        <label>* Nama Lengkap </label>
                                                        <input type="text"  name="nama" required placeholder="Jawaban Anda"  class="form-control m-input">
                                                        <span class="m-form__help">&nbsp</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="">* Jabatan</label>
                                                        <input type="text" class="form-control m-input" name="jabatan" required placeholder="Jawaban Anda">
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
                                                        <label>* Alamat lengkap</label>
                                                        <div class="m-input-icon m-input-icon--right">
                                                            <input type="text" class="form-control m-input" name="alamat" required placeholder="Jawaban Anda">
                                                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                                                        </div>
                                                        <span class="m-form__help">&nbsp</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>*Jenis Kelamin</label>
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
                            <div class="isi_quisioner fade-in"><!--isi_biodata-->
                                <!-- [Identitas Perusahaan] -->                            
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">Mohon Lengkapi Data dibawah ini</h3>
                                                <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                    <span>Identitas Perusahaan</span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                    </div>
                                </div>                             
                                <!--[Nama Perusahaan / kantor]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Nama Perusahaan / kantor</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-6">
                                                            <input type="text" placeholder="Jawaban Anda" name="nama_perusahaan" class="form-control">
                                                            </div>
                                                            <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_nama_perusahaan" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <!--[Alamat Perusahaan / kantor]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Alamat Perusahaan / kantor</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-6">
                                                            <input type="text" placeholder="Jawaban Anda" name="alamat_perusahaan" class="form-control">
                                                            </div>
                                                            <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_alamat_perusahaan" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Nomor Telp Perusahaan / kantor]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Nomor Telp Perusahaan / kantor</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-6">
                                                            <input type="text" placeholder="Jawaban Anda" name="no_tel_kantor" class="form-control">
                                                            </div>
                                                            <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_no_tel_kantor" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- [Informasi Umum] -->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">Mohon Lengkapi Data dibawah ini</h3>
                                                <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                    <span>Informasi Umum</span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                    </div>
                                </div>                            
                                <!--[Berapakah jumlah lulusan Universitas Islam Malang yang bekerja di perusahaan Anda ?]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Berapakah jumlah lulusan Universitas Islam Malang yang bekerja di perusahaan Anda ?</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-6">

                                                            <input type="number" placeholder="Jawaban Anda" name="jumlah_lulusan" class="form-control">

                                                            </div>
                                                            <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_jumlah_lulusan" type="button"><b>Clear Selection</b>

                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Berapakah rata-rata masa kerja lulusan Universitas Islam Malang yang bekerja di perusahaan Anda (dalam tahun) ?]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Berapakah rata-rata masa kerja lulusan Universitas Islam Malang yang bekerja di perusahaan Anda (dalam tahun) ?</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-6">
                                                            <input type="number" placeholder="Jawaban Anda" name="masa_kerja" class="form-control">
                                                        </div>
                                                        <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_masa_kerja" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Berapakah gaji/pendapatan awal yang diterima lulusan Universitas Islam Malang di perusahaan Anda (dalam jutaan rupiah) ?]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Berapakah gaji/pendapatan awal yang diterima lulusan Universitas Islam Malang di perusahaan Anda (dalam jutaan rupiah) ?</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">                                                    
                                                        <div class="input-group mb-6">
                                                            <input type="number" placeholder="Jawaban Anda" name="gaji_awal" class="form-control">
                                                        </div>
                                                        <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_gaji_awal" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Berapakah nilai IPK (skala Kurang) minimal untuk bekerja di perusahaan Anda ?]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Berapakah nilai IPK (skala Kurang) minimal untuk bekerja di perusahaan Anda ?</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">                                                    
                                                        <div class="input-group mb-6">
                                                            <input type="text" placeholder="Jawaban Anda" name="ipk" class="form-control">
                                                        </div>
                                                        <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_ipk" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- [Informasi Khusus] -->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">Mohon Lengkapi Data dibawah ini</h3>
                                                <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                    <span>Informasi Khusus</span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                    </div>
                                </div>                             
                                <!--[Tingkat Kepuasan Pengguna Lulusan (sebagai atasan terhadap alumni yang bekerja di perusahaan anda)]-->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Tingkat Kepuasan Pengguna Lulusan (sebagai atasan terhadap alumni yang bekerja di perusahaan anda)</b>&nbsp<b style="color:red">*).required</b>
                                                <br><br>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">

                                                    <div class="col-lg-12">
                                                        <div class="table-demontrasive">
                                                        <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th></th>
                                                                <th>Sangat Baik</th>
                                                                <th>Baik</th>
                                                                <th>Cukup</th>
                                                                <th>Kurang</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            <tr class="text-center">
                                                                    <td class="text-left">Etika</td>
                                                                    <td>
                                                                        <div class="form-check">

                                                                            <label class="m-radio m-radio--solid m-radio--success" for="etika1">
                                                                                <input class="form-check-input" required type="radio" name="etika" id="etika1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="etika2">
                                                                                <input class="form-check-input" type="radio" name="etika" id="etika2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="etika3">
                                                                                <input class="form-check-input" type="radio" name="etika" id="etika3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="etika4">
                                                                                <input class="form-check-input" type="radio" name="etika" id="etika4" value="Kurang">
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
                                                                                <input class="form-check-input" required type="radio" name="keahlian" id="keahlian1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="keahlian2">
                                                                                <input class="form-check-input" type="radio" name="keahlian" id="keahlian2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="keahlian3">
                                                                                <input class="form-check-input" type="radio" name="keahlian" id="keahlian3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="keahlian4">
                                                                                <input class="form-check-input" type="radio" name="keahlian" id="keahlian4" value="Kurang">
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
                                                                                <input class="form-check-input" required type="radio" name="bahasa_inggris" id="bahasa_inggris1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris2">
                                                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris3">
                                                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_inggris4">
                                                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="bahasa_inggris4" value="Kurang">
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
                                                                                <input class="form-check-input" required type="radio" name="penggunaan_ti" id="penggunaan_ti1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti2">
                                                                                <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti3">
                                                                                <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penggunaan_ti4">
                                                                                <input class="form-check-input" type="radio" name="penggunaan_ti" id="penggunaan_ti4" value="Kurang">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan berkomunikasi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kemampuan_komunikasi1">
                                                                                <input class="form-check-input" required type="radio" name="kemampuan_komunikasi" id="kemampuan_komunikasi1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kemampuan_komunikasi2">
                                                                                <input class="form-check-input" type="radio" name="kemampuan_komunikasi" id="kemampuan_komunikasi2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kemampuan_komunikasi3">
                                                                                <input class="form-check-input" type="radio" name="kemampuan_komunikasi" id="kemampuan_komunikasi3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kemampuan_komunikasi4">
                                                                                <input class="form-check-input" type="radio" name="kemampuan_komunikasi" id="kemampuan_komunikasi4" value="Kurang">
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
                                                                                <input class="form-check-input" required type="radio" name="kerjasama" id="kerjasama1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kerjasama2">
                                                                                <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kerjasama3">
                                                                                <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kerjasama4">
                                                                                <input class="form-check-input" type="radio" name="kerjasama" id="kerjasama4" value="Kurang">
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
                                                                                <input class="form-check-input" required type="radio" name="pengembangan_diri" id="pengembangan_diri1" value="Sangat Baik">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri2">
                                                                                <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri2" value="Baik">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri3">
                                                                                <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri3" value="Cukup">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengembangan_diri4">
                                                                                <input class="form-check-input" type="radio" name="pengembangan_diri" id="pengembangan_diri4" value="Kurang">
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
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kepuasan_pengguna" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- [Harapan User] -->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">Mohon Lengkapi Data dibawah ini</h3>
                                                <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                                    <span>Harapan User</span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                    </div>
                                </div>                            
                                <!--[Apakah nilai soft skill yang Anda inginkan dari lulusan Unisma Malang ? -->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Apakah nilai soft skill yang Anda inginkan dari lulusan Unisma Malang ? </br>Ket: <i>Soft skill adalah nilai kepribadian serta kemampuan seseorang dalam berinteraksi dengan sesama dan dengan lingkungan</i></b>&nbsp<b style="color:red">*).required</b>
                                                <br><br>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="table-demontrasive">
                                                        <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th></th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>7</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kepercayaan diri</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri1">
                                                                                <input class="form-check-input" required type="radio" name="percara_diri" id="percara_diri1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri2">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri3">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri4">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri5">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri6">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="percara_diri7">
                                                                                <input class="form-check-input" type="radio" name="percara_diri" id="percara_diri7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kepemimpinan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan1">
                                                                                <input class="form-check-input" required type="radio" name="kepemimpinan" id="kepemimpinan1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan2">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan3">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan4">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan5">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan6">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kepemimpinan7">
                                                                                <input class="form-check-input" type="radio" name="kepemimpinan" id="kepemimpinan7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kejujuran</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran1">
                                                                                <input class="form-check-input" required type="radio" name="kejujuran" id="kejujuran1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran2">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran3">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran4">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran5">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran6">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kejujuran7">
                                                                                <input class="form-check-input" type="radio" name="kejujuran" id="kejujuran7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kedisiplinan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan1">
                                                                                <input class="form-check-input" required type="radio" name="kedisiplinan" id="kedisiplinan1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan2">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan3">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan4">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan5">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan6">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="kedisiplinan7">
                                                                                <input class="form-check-input" type="radio" name="kedisiplinan" id="kedisiplinan7" value="7">
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
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komunikasi6">
                                                                                <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komunikasi7">
                                                                                <input class="form-check-input" type="radio" name="komunikasi" id="komunikasi7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Motivasi tinggi</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi1">
                                                                                <input class="form-check-input" required type="radio" name="motivasi" id="motivasi1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi2">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi3">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi4">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi5">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi6">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="motivasi7">
                                                                                <input class="form-check-input" type="radio" name="motivasi" id="motivasi7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Mudah adaptasi & bekerjasama</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi1">
                                                                                <input class="form-check-input" required type="radio" name="adaptasi" id="adaptasi1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi2">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi3">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi4">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi5">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi6">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="adaptasi7">
                                                                                <input class="form-check-input" type="radio" name="adaptasi" id="adaptasi7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Mampu bekerja dalam tekanan</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan1">
                                                                                <input class="form-check-input" required type="radio" name="tekanan" id="tekanan1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan2">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan3">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan4">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan5">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan6">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="tekanan7">
                                                                                <input class="form-check-input" type="radio" name="tekanan" id="tekanan7" value="7">
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
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_soft_skill" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Selain nilai soft skill, kriteria apakah yang Anda inginkan dari lulusan Unisma Malang ? -->
                                <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin-top: -20px">
                                            <div class="m-portlet__body">
                                                <b>Selain nilai soft skill, kriteria apakah yang Anda inginkan dari lulusan Unisma Malang ?</b>&nbsp<b style="color:red">*).required</b>
                                                <br><br>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">
                                                        <div class="table-demontrasive">
                                                        <table class="table table-striped m-table" style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th></th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>7</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td class="text-left">IPK</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk1">
                                                                                <input class="form-check-input" required type="radio" name="krit_ipk" id="krit_ipk1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk2">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk3">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk4">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk5">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk6">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="krit_ipk7">
                                                                                <input class="form-check-input" type="radio" name="krit_ipk" id="krit_ipk7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan Bahasa asing</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing1">
                                                                                <input class="form-check-input" required type="radio" name="bahasa_asing" id="bahasa_asing1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing2">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing3">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing4">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing5">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing6">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="bahasa_asing7">
                                                                                <input class="form-check-input" type="radio" name="bahasa_asing" id="bahasa_asing7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan menggoperasikan Komputer</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer1">
                                                                                <input class="form-check-input" required type="radio" name="komputer" id="komputer1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer2">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer3">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer4">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer5">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer6">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="komputer7">
                                                                                <input class="form-check-input" type="radio" name="komputer" id="komputer7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Jumlah penghargaan yang diterima</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan1">
                                                                                <input class="form-check-input" required type="radio" name="penghargaan" id="penghargaan1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan2">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan3">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan4">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan5">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan6">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="penghargaan7">
                                                                                <input class="form-check-input" type="radio" name="penghargaan" id="penghargaan7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Lama pengalaman kerja</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman1">
                                                                                <input class="form-check-input" required type="radio" name="pengalaman" id="pengalaman1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman2">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman3">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman4">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman5">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman6">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pengalaman7">
                                                                                <input class="form-check-input" type="radio" name="pengalaman" id="pengalaman7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Jumlah pelatihan yang pernah diikuti</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan1">
                                                                                <input class="form-check-input" required type="radio" name="pelatihan" id="pelatihan1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan2">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan3">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan4">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan5">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan6">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="pelatihan7">
                                                                                <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan7" value="7">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td class="text-left">Kemampuan mengendarai</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara1">
                                                                                <input class="form-check-input" required type="radio" name="berkendara" id="berkendara1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara2">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara2" value="2">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara3">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara3" value="3">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara4">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara4" value="4">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara5">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara5" value="5">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara6">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara6" value="6">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="m-radio m-radio--solid m-radio--success" for="berkendara7">
                                                                                <input class="form-check-input" type="radio" name="berkendara" id="berkendara7" value="7">
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
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kriteria" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <!--[Masukan apakah yang ingin Anda sampaikan kepada Unisma Malang untuk peningkatan mutu lulusan ?]-->
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
                                                <b>Masukan apakah yang ingin Anda sampaikan kepada Unisma Malang untuk peningkatan mutu lulusan ?</b>
                                                <div class="form-group m-form__group row" style="margin-left: -40px">
                                                    <div class="col-lg-12">                                                    
                                                        <div class="input-group mb-6">
                                                            <textarea class="form-control" placeholder="Jawaban Anda" id="masukan" name="masukan" rows="4" ></textarea>
                                                        </div>
                                                        <div align="right">
                                                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_masukan" type="button"><b>Clear Selection</b>
                                                            </button>
                                                        </div>
                                                        
                                                        <br>

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
                        </form>
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
			<!-- end::Footer -->
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

		<!--end:: Global Mandatory public/Vendors -->

		<!--begin:: Global Optional public/Vendors -->
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
		<!--end:: Global Optional Vendors -->
        <script src="public/assets/demo/custom/components/base/blockui.js" type="text/javascript"></script>
		<!--begin::Global Theme Bundle -->
		<script src="public/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
        <script src="public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js" type="text/javascript"></script>
        
		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="public/assets/app/js/dashboard.js" type="text/javascript"></script>
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

                $('.isi_quisioner').fadeOut();
                $('.berikutnya').click(function(){ 
                    if($('input[name ="jabatan"]').val() == '' || $('input[name ="nama"]').val() == '' || $('input[name ="email"]').val() == '' || $('input[name ="jeniskelamin"]').value == '' || $('input[name ="no_whatsapp"]').val() == '' || $('input[name ="alamat"]').val() == ''){
                        swal({
                            title: "Peringatan!",
                            text: "Lengkapi data Anda terlebih dahulu, untuk mengisi quisioner !",
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

                //[Nama Perusahaan / kantor]
                $('#reset_perusahaan_tempat_bekerja').click(function() {
                    $('input[name="nama_perusahaan"]').val('');
                });
                //[Alamat Perusahaan / kantor]
                $('#reset_alamat_perusahaan').click(function() {
                    $('input[name="alamat_perusahaan"]').val('');
                });

                //[No telp Perusahaan / kantor]
                $('#reset_no_tel_kantor').click(function() {
                    $('input[name="no_tel_kantor"]').val('');
                });

                //[Berapakah jumlah lulusan Universitas Islam Malang yang bekerja di perusahaan Anda ?]
                $('#reset_jumlah_lulusan').click(function() {
                    $('input[name="jumlah_lulusan"]').val('');
                });  

                //[Berapakah rata-rata masa kerja lulusan Universitas Islam Malang yang bekerja di perusahaan Anda (dalam tahun) ?]
                $('#reset_masa_kerja').click(function() {
                    $('input[name="masa_kerja"]').val('');
                }); 

                //[Berapakah gaji/pendapatan awal yang diterima lulusan Universitas Islam Malang di perusahaan Anda (dalam jutaan rupiah) ?]
                $('#reset_gaji_awal').click(function() {
                    $('input[name="gaji_awal"]').val('');
                });

                //[Berapakah nilai IPK (skala Kurang) minimal untuk bekerja di perusahaan Anda ?]
                $('#reset_ipk').click(function() {
                    $('input[name="ipk"]').val('');
                });  
                
                //[Tingkat Kepuasan Pengguna Lulusan (sebagai atasan terhadap alumni yang bekerja di perusahaan anda)]
                $('#reset_kepuasan_pengguna').click(function() {
                    $('input[name="etika"]').prop('checked', false);
                    $('input[name="keahlian"]').prop('checked', false);
                    $('input[name="bahasa_inggris"]').prop('checked', false);
                    $('input[name="penggunaan_ti"]').prop('checked', false);
                    $('input[name="komunikasi"]').prop('checked', false);
                    $('input[name="kerjasama"]').prop('checked', false);
                    $('input[name="pengembangan_diri"]').prop('checked', false);
                });             

                //[Apakah nilai soft skill yang Anda inginkan dari lulusan Unisma Malang ? ]
                $('#reset_soft_skill').click(function() {
                    $('input[name="percara_diri"]').prop('checked', false);
                    $('input[name="kepemimpinan"]').prop('checked', false);
                    $('input[name="kejujuran"]').prop('checked', false);
                    $('input[name="kedisiplinan"]').prop('checked', false);
                    $('input[name="komunikasi"]').prop('checked', false);
                    $('input[name="motivasi"]').prop('checked', false);
                    $('input[name="adaptasi"]').prop('checked', false);
                    $('input[name="tekanan"]').prop('checked', false);
                });

                //[Selain nilai soft skill, kriteria apakah yang Anda inginkan dari lulusan Unisma Malang ? ]
                $('#reset_kriteria').click(function() {
                    $('input[name="krit_ipk"]').prop('checked', false);
                    $('input[name="bahasa_asing"]').prop('checked', false);
                    $('input[name="komputer"]').prop('checked', false);
                    $('input[name="penghargaan"]').prop('checked', false);
                    $('input[name="pengalaman"]').prop('checked', false);
                    $('input[name="pelatihan"]').prop('checked', false);
                    $('input[name="berkendara"]').prop('checked', false);
                });
                //[Masukan apakah yang ingin Anda sampaikan kepada Unisma Malang untuk peningkatan mutu lulusan ? ]
                $('#reset_masukan').click(function() {
                    $('textarea#masukan').val('');
                }); 

            });
        </script>
    </body>
</html>