<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Tracer Study - UNISMA</title>
    <link rel="icon" href="public/images/logounisma.png">
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .isi_quisioner {
            display: none;
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


        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* The style below is just for the appearance of the example div */

        .style {
            width: 90vw;
            height: 90vh;
            text-align: center;
            padding-top: calc(50vh - 50px);
            margin-left: 5vw;
            border: 4px double #F00;
            background-color: #000;
        }

        .style p {
            color: #fff;
            font-size: 50px;
        }

    </style>
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
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

        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text,
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
            color: #1d9d19;
        }

        .m-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #e5e6e3;
            color: black;
            text-align: left;
        }

        @media only screen and (max-width: 600px) {
            #m_header_topbar {
                margin-top: -50px;
            }

            .m-footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e5e6e3;
                color: black;
                text-align: left;
                margin-top: 20px;
            }
        }

        @media only screen and (max-width: 700px) {
            #m_header_topbar {
                margin-top: -50px;
            }
        }

        @media only screen and (max-width: 850px) {
            #m_header_topbar {
                margin-top: -50px;
            }
        }

        @media only screen and (max-width: 930px) {
            #m_header_topbar {
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
    <link href="../public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../public/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../public/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="../public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
        type="text/css" />
    <link href="../public/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet"
        type="text/css" />
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
    <link rel="stylesheet" type="text/css"
        href="../public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="../public/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="../public/assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css" />

    <link href="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet"
        type="text/css" />-->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="../public/assets/demo/media/img/logo/favicon.ico" />
</head>

<body style="background-image: ../public/images/logounisma.png"
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
                                    <a style="font-size: 23px;color:#f0f0e9;font-family: 'Passion One';">Tracer
                                        Study</a>
                                </H4>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- BEGIN: Topbar Toggler -->
                                @php
                                    $str_nama = explode(' ', $data_mhs->nama);
                                    $str = $str_nama[0];
                                @endphp
                                <a id="click_alumni2" style="color: white" id="m_aside_header_topbar_mobile_toggle"
                                    href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <div style="margin-bottom:11px;"><b><i class="la la-user"></i> </b> Alumni S1,
                                    </div><br><br><br>
                                    <b>{{ $str }}</b>
                                </a>
                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" style="background-color: #3d8a49"
                        id="m_header_nav">
                        <!-- BEGIN: Horizontal Menu -->
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                        <div id="m_header_menu"
                            class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                            <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            </ul>
                        </div>
                        <!-- END: Horizontal Menu -->
                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar"
                            class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                            <div class="m-stack__item m-topbar__nav-wrapper" style="margin-top:-150px">
                                <a id="click_alumni" href="javascript:;">
                                    <b style="color:whitesmoke"><i class="la la-user"></i> Alumni S1,
                                        {{ $data_mhs->npm . ' | ' . $data_mhs->nama }}</b> <b style="color: gray"></b>
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
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body"
            style="padding-left:0px">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                    class="la la-close"></i></button>
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content" style="margin-top: -40px; margin-bottom:-15px">
                    <div class="isi_biodata">
                        <form id="survey-form" method="POST" action="{{ url('submit-tracer-s1') }}">
                            @csrf
                            <input type="hidden" value="{{ $data_mhs->npm }}" name="npm">
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                                style="margin-bottom: 2rem;">
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
                                    <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                        style="margin-top: -20px">
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>NIK &nbsp<b style="color:red">*).required</b></label>
                                                    <input type="text" name="nik" required placeholder="Jawaban Anda"
                                                        class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class=""> NPWP (bila memiliki)</label>
                                                    <input type="text" class="form-control m-input" name="npwp"
                                                        placeholder="Jawaban Anda">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>Tahun masuk  &nbsp<b style="color:red">*).required</b></label>
                                                    <input id="tahun_masuk" type="text" name="tahun_masuk" required placeholder="Jawaban Anda" class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Tahun Lulus sesuai yang tertulis di
                                                        Ijazah</label>
                                                    <input id="tahun_lulus" type="text" class="form-control m-input" name="tahun_lulus" placeholder="Jawaban Anda"  value="{{ $data_mhs->tahun_lulus }}" >
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6">
                                                    <label>Alamat Email &nbsp<b style="color:red">*).required</b></label>
                                                    <input type="email" name="email" required placeholder="Jawaban Anda"
                                                        class="form-control m-input">
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">No HP (Whatsapp)  &nbsp<b style="color:red">*).required</b></label>
                                                    <input type="text" onkeypress="return isNumberKey(event)"
                                                        class="form-control m-input" name="no_whatsapp" required
                                                        placeholder="Jawaban Anda">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row" style="margin-top: -10px">
                                                <div class="col-lg-6">
                                                    <label>Alamat lengkap:  &nbsp<b style="color:red">*).required</b></label>
                                                    <div class="m-input-icon m-input-icon--right">
                                                        <input type="text" class="form-control m-input" name="alamat"
                                                            required placeholder="Jawaban Anda">
                                                        <span
                                                            class="m-input-icon__icon m-input-icon__icon--right"><span><i
                                                                    class="la la-map-marker"></i></span></span>
                                                    </div>
                                                    <span class="m-form__help">&nbsp</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Jenis Kelamin:  &nbsp<b style="color:red">*).required</b></label>
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="jeniskelamin" id="jeniskelamin"
                                                                value="Laki - laki"> Laki - laki
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio m-radio--solid">
                                                            <input type="radio" name="jeniskelamin" id="jeniskelamin"
                                                                value="Perempuan"> Perempuan
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
                                                <button style="margin:12px" id="m_blockui_2_5" type="button"
                                                    class="btn btn-success berikutnya">Berikutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="isi_quisioner">
                        <!--isi_quisioner fade-in-->
                        <!-- [Informasi Umum] -->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 1.5rem;">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">INSTRUMEN KUISIONER TRACER STUDY S1 (1 tahun setelah lulus)
                                        </h3>
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
                        <!--[D1P. Jelaskan status Anda saat ini?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>1. Jelaskan status Anda saat ini? </b>(<i>Pilih salah satu</i>)
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="status_kerja1">
                                                        <input type="radio" name="status_kerja" id="status_kerja1"
                                                            value="Bekerja (Fultime / Parttime)">
                                                        Bekerja (Fultime / Parttime)
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="status_kerja2">
                                                        <input type="radio" name="status_kerja" id="status_kerja2"
                                                            value="Wirausaha">
                                                        Wirausaha
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="status_kerja3">
                                                        <input type="radio" name="status_kerja" id="status_kerja3"
                                                            value="Melanjutkan pendidikan">
                                                        Melanjutkan pendidikan
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="status_kerja4">
                                                        <input type="radio" name="status_kerja" id="status_kerja4"
                                                            value="Tidak kerja tetapi sedang mencari kerja">
                                                        Tidak kerja tetapi sedang mencari kerja
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="status_kerja5">
                                                        <input type="radio" name="status_kerja" id="status_kerja5"
                                                            value="Belum memungkinkan bekerja">
                                                        Belum memungkinkan bekerja
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light" id="reset_status_saat_ini"
                                                        type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[F12 Sebutkan sumber dana dalam pembiayaan kuliah?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>2. Sebutkan sumberdana dalam pembiayaan kuliah?</b>&nbsp<b
                                            style="color:red">*).required</b>

                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf12">
                                                        <input type="radio" required name="pertanyaanf12"
                                                            id="pertanyaanf12" value="Biaya Sendiri/Keluarga">
                                                        Biaya Sendiri/Keluarga
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf121">
                                                        <input type="radio" name="pertanyaanf12" id="pertanyaanf121"
                                                            value="Beasiswa ADIK">
                                                        Beasiswa ADIK
                                                        <span></span>
                                                    </label>
                                                </div>


                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf122">
                                                        <input type="radio" name="pertanyaanf12" id="pertanyaanf122"
                                                            value="Beasiswa BIDIKMISI">
                                                        Beasiswa BIDIKMISI
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf123">
                                                        <input type="radio" name="pertanyaanf12" id="pertanyaanf123"
                                                            value="Beasiswa PPA">
                                                        Beasiswa PPA
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf124">
                                                        <input type="radio" name="pertanyaanf12" id="pertanyaanf124"
                                                            value="Beasiswa AFIRMASI">
                                                        Beasiswa AFIRMASI
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf125">
                                                        <input type="radio" name="pertanyaanf12" id="pertanyaanf125"
                                                            value="Beasiswa Perusahaan/swasta">
                                                        Beasiswa Perusahaan/swasta
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light" id="reset_pembiayaan"
                                                        type="button"><b>Clear Selection</b>

                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- [Sudah Bekerja] -->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 1.5rem;">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">Lewati bagian ini jika Anda belum bekerja</h3>
                                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                            <span>Sudah Bekerja</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                </div>
                            </div>
                            <div class="m-portlet__body">
                            </div>
                        </div>                        
                        <!--[F5 Berapa bulan waktu yang dibutuhkan (sebelum dan sesudah kelulusan Anda) untuk mendapatkan pekerjaan pertama?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>3. Dalam berapa bulan Anda mendapatkan pekerjaan?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="m-radio m-radio--solid m-radio--success"
                                                                    for="pertanyaanf51">
                                                                    <input type="radio" name="pertanyaan2_f5"
                                                                        id="pertanyaanf51" value="sebelum">
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-control"
                                                                    placeholder="Jawaban Anda" disabled type="text"
                                                                    name="pertanyaanf5input" id="pertanyaanf5input1">
                                                            </div>
                                                        </td>
                                                        <td> Bulan sebelum lulus</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="m-radio m-radio--solid m-radio--success"
                                                                    for="pertanyaanf52">
                                                                    <input type="radio" name="pertanyaan2_f5"
                                                                        id="pertanyaanf52" value="setelah">
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-control"
                                                                    placeholder="Jawaban Anda" disabled type="text"
                                                                    name="pertanyaanf5input2" id="pertanyaanf5input2">
                                                            </div>
                                                        </td>
                                                        <td>Bulan setelah lulus </td>
                                                    </tr>
                                                </table>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_bulan_untuk_mencari_pekerjaan" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[D6 Dimana lokasi tempat Anda bekerja? ]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>Dimana alamat perusahaan tempat anda bekerja saat ini?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="Name">4. Pilih Provinsi</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select name="prov_perusahaan" id="txtinput_prov"
                                                                class="custom-select select2 form-control"
                                                                style="width:100%">
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="Name">5. Pilih Kabupaten/Kota</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select name="kota_perusahaan" id="txtinput_kota"
                                                                class="custom-select select2 form-control"
                                                                style="width:100%">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_alamat_tempat_bekerja" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[D5. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>6. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan1">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan1" value="Instansi Pemerintahan">
                                                        Instansi Pemerintahan
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan2">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan2" value="BUMN/BUMD">
                                                        BUMN/BUMD
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan3">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan3"
                                                            value="Institusi/Organisasi Multilateral">
                                                        Institusi/Organisasi Multilateral
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan4">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan4"
                                                            value="Oragnisasi Non-profit/Lembaga Swadaya Masyarakat">
                                                        Oragnisasi Non-profit/Lembaga Swadaya Masyarakat
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan5">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan5" value="Perusahaan Swasta">
                                                        Perusahaan Swasta
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan6">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan6"
                                                            value="Wiraswasta/Perusahaan Sendiri">
                                                        Wiraswasta/Perusahaan Sendiri
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="jenis_perusahaan7">
                                                        <input type="radio" name="jenis_perusahaan"
                                                            id="jenis_perusahaan7" value="Lainnya…">
                                                        Lainnya…
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_jenis_perusahaan" type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[D6 Apa nama perusahaan/kantor tempat Anda bekerja?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>7. Apa nama perusahaan tempat anda bekerja saat ini?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-6">
                                                    <input type="text" placeholder="Jawaban Anda" name="nama_perusahaan"
                                                        class="form-control">
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_perusahaan_tempat_bekerja" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[Siapa nama atasan langsung anda?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>8. Siapa nama atasan langsung anda?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-6">

                                                    <input type="text" placeholder="Jawaban Anda"
                                                        name="nama_atasan_langsung" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)">

                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_nama_atasan_langsung" type="button"><b>Clear
                                                            Selection</b>

                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[Mohon menuliskan kontak HP atasan langsung Anda]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi"
                            style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>9. Mohon menuliskan kontak HP atasan langsung Anda</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-6">
                                                    <input type="text" placeholder="Jawaban Anda" name="no_hp_atasan"
                                                        class="form-control">
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_nohp_atasan_langsung" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[10. Berapa rata-rata pendapatan Anda per bulan?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>10.	Berapa rata-rata pendapatan Anda per bulan?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <table>
                                                    <tr>
                                                        <td class="input-group pt-3 pr-3">Take Home Pay </td>
                                                        <td>
                                                            <div class="input-group mb-3">
                                                                <input type="text" onkeypress="return isNumberKey(event)"
                                                                    placeholder="5000000" name="pekerjaan_utama"
                                                                    class="form-control loan_max_amount"
                                                                    aria-label="Amount (to the nearest Rupiah)">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_pendapatan_setiap_bulannya" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- [Wirausaha] -->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">Lewati bagian ini jika Anda tidak berwirausaha
                                        </h3>
                                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                            <span>Alumni Berwirausaha</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                </div>
                            </div>
                            <div class="m-portlet__body">
                            </div>
                        </div>
                        <!--[D7. Bila berwirausaha, apa posisi/jabatan Anda saat ini? ]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>11. Bila berwirausaha, apa posisi/jabatan Anda saat ini?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="posisi1">
                                                        <input type="radio" name="posisi" id="posisi1" value="Founder">
                                                        Founder
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="posisi2">
                                                        <input type="radio" name="posisi" id="posisi2" value="Co-Founder">
                                                        Co-Founder
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="posisi3">
                                                        <input type="radio" name="posisi" id="posisi3" value="Staff">
                                                        Staff
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="posisi4">
                                                        <input type="radio" name="posisi" id="posisi4"
                                                            value="Freelance/Kerja Lepas">
                                                        Freelance/Kerja Lepas
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light" id="reset_posisi"
                                                        type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[Apa tingkat tempat kerja Anda?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>12. Apa tingkat tempat kerja Anda?</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="tingkat1">
                                                        <input type="radio" name="tingkat" id="tingkat1"
                                                            value="Lokal/wilayah/wirausaha tidak berbadan hukum">
                                                        Lokal/wilayah/wirausaha tidak berbadan hukum
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="tingkat2">
                                                        <input type="radio" name="tingkat" id="tingkat2"
                                                            value="Nasional/wiraswasta berbadan hukum">
                                                        Nasional/wiraswasta berbadan hukum
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success" for="tingkat3">
                                                        <input type="radio" name="tingkat" id="tingkat3"
                                                            value="Multinasional/internasional">
                                                        Multinasional/internasional
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light" id="reset_tingkat"
                                                        type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- [Studi Lanjut] -->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">Lewati bagian ini jika Anda tidak sedang Studi
                                            Lanjut</h3>
                                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                            <span>Studi Lanjut</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                </div>
                            </div>
                            <div class="m-portlet__body">
                            </div>
                        </div>
                        <!--[Apabila Anda melanjutkan studi, sebutkan:]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>Apabila Anda melanjutkan studi, sebutkan:</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <table class="col-lg-12">
                                                    <tr>
                                                        <td style="width: 20%;">13. Perguruan Tinggi </td>
                                                        <td>
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Universitas Islam Malang" name="universitas" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">14. Program Studi </td>
                                                        <td>
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Jawaban anda.." name="prodi"
                                                                    class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">15. Tanggal Masuk (mulai studi) </td>
                                                        <td>
                                                            <div class="input-group mb-3">
                                                                <input id="masuk_study" type="text"
                                                                    class="form-control m-input" name="masuk_study"
                                                                    placeholder="Jawaban anda..">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">16. Sumber Biaya</td>
                                                        <td>
                                                            <div class="m-radio-inline">
                                                                <label class="m-radio m-radio--solid">
                                                                    <input type="radio" name="biaya" id="biaya"
                                                                        value="Biaya Sendiri"> Biaya Sendiri
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio m-radio--solid">
                                                                    <input type="radio" name="biaya" id="biaya"
                                                                        value="Beasiswa"> Beasiswa
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light" id="reset_lanjut_study"
                                                        type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- [Kompetensi Lulusan] -->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 1.5rem;">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="flaticon-statistics"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text"></h3>
                                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                            <span>Kompetensi Lulusan</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                </div>
                            </div>
                            <div class="m-portlet__body">
                            </div>
                        </div>
                        <!--[F14 Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>17. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</b>&nbsp<b
                                            style="color:red">*).required</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf14">
                                                        <input type="radio" required name="pertanyaanf14" id="pertanyaanf14"
                                                            value="1">
                                                        Sangat erat
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf141">
                                                        <input type="radio" name="pertanyaanf14" id="pertanyaanf141"
                                                            value="2">
                                                        Erat
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf142">
                                                        <input type="radio" name="pertanyaanf14" id="pertanyaanf142"
                                                            value="3">
                                                        Cukup Erat
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf143">
                                                        <input type="radio" name="pertanyaanf14" id="pertanyaanf143"
                                                            value="4">
                                                        Kurang Erat
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf144">
                                                        <input type="radio" name="pertanyaanf14" id="pertanyaanf144"
                                                            value="5">
                                                        Tidak sama sekali
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_Seberapaerathubunganantarabidangstudi"
                                                        type="button"><b>Clear Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[E3 Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>18. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat
                                            ini?</b>&nbsp<b style="color:red">*).required</b>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf15">
                                                        <input type="radio" required name="pertanyaanf15" id="pertanyaanf15"
                                                            value="1">
                                                        Setingkat Lebih Tinggi
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf151">
                                                        <input type="radio" name="pertanyaanf15" id="pertanyaanf151"
                                                            value="2">
                                                        Tingkat Yang Sama
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf152">
                                                        <input type="radio" name="pertanyaanf15" id="pertanyaanf152"
                                                            value="3">
                                                        Setingkat Lebih Rendah
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="m-radio m-radio--solid m-radio--success"
                                                        for="pertanyaanf153">
                                                        <input type="radio" name="pertanyaanf15" id="pertanyaanf153"
                                                            value="4">
                                                        Tidak Perlu Pendidikan Tinggi
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div align="right">
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[Pada saat lulus, pada tingkat mana kompetensi di bawah ini Anda kuasai? (A)]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>19. Pada SAAT LULUS, pada tingkat mana kompetensi di bawah ini Anda kuasai?
                                            (A)</b>&nbsp<b style="color:red">*).required</b>
                                        <br><br>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">

                                            <div class="col-lg-12">
                                                <div class="table-demontrasive">
                                                    <table class="table table-striped m-table"
                                                        style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
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

                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="etika" id="etika1"
                                                                                value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika" id="etika2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika" id="etika3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika" id="etika4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika" id="etika5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Keahlian Berdasarkan Bidang Ilmu
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="keahlian" id="keahlian1"
                                                                                value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian" id="keahlian2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian" id="keahlian3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian" id="keahlian4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian" id="keahlian5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Bahasa Inggris</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="bahasa_inggris"
                                                                                id="bahasa_inggris1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris" id="bahasa_inggris2"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris" id="bahasa_inggris3"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris" id="bahasa_inggris4"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris" id="bahasa_inggris5"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Penggunaan Teknologi Informasi
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="penggunaan_ti"
                                                                                id="penggunaan_ti1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti" id="penggunaan_ti2"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti" id="penggunaan_ti3"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti" id="penggunaan_ti4"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti" id="penggunaan_ti5"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Komunikasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="komunikasi"
                                                                                id="komunikasi1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi" id="komunikasi2"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi" id="komunikasi3"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi" id="komunikasi4"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi" id="komunikasi5"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kerja Sama Tim</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="kerjasama"
                                                                                id="kerjasama1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama" id="kerjasama2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama" id="kerjasama3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama" id="kerjasama4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama" id="kerjasama5" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pengembangan Diri</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri1">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="pengembangan_diri"
                                                                                id="pengembangan_diri1" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri"
                                                                                id="pengembangan_diri2" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri3">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri"
                                                                                id="pengembangan_diri3" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri4">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri"
                                                                                id="pengembangan_diri4" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri5">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri"
                                                                                id="pengembangan_diri5" value="5">
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
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_kompetensi_yang_dikuasai" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? (B)]-->
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi" style="margin-bottom: 0.5rem;">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                    style="margin-top: -20px">
                                    <div class="m-portlet__body">
                                        <b>20. Pada SAAT INI, bagaimanan kontribusi UNISMA dalam kompetensi di bawah ini?
                                            (B)</b>&nbsp<b style="color:red">*).required</b>
                                        <br><br>
                                        <div class="form-group m-form__group row" style="margin-left: -40px">
                                            <div class="col-lg-12">
                                                <div class="table-demontrasive">
                                                    <table class="table table-striped m-table"
                                                        style="display: block; min-height: 300px; overflow-x: auto;border:1;width:100%">
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

                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="etika_b" id="etika1_b"
                                                                                value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika_b" id="etika2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika_b" id="etika3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika_b" id="etika4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="etika5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="etika_b" id="etika5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Keahlian Berdasarkan Bidang Ilmu
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="keahlian_b"
                                                                                id="keahlian1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian_b" id="keahlian2_b"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian_b" id="keahlian3_b"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian_b" id="keahlian4_b"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="keahlian5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="keahlian_b" id="keahlian5_b"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Bahasa Inggris</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="bahasa_inggris_b"
                                                                                id="bahasa_inggris1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris_b"
                                                                                id="bahasa_inggris2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris_b"
                                                                                id="bahasa_inggris3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris_b"
                                                                                id="bahasa_inggris4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="bahasa_inggris5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="bahasa_inggris_b"
                                                                                id="bahasa_inggris5_b" value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Penggunaan Teknologi Informasi
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="penggunaan_ti_b"
                                                                                id="penggunaan_ti1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti_b" id="penggunaan_ti2_b"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti_b" id="penggunaan_ti3_b"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti_b" id="penggunaan_ti4_b"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="penggunaan_ti5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="penggunaan_ti_b" id="penggunaan_ti5_b"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Komunikasi</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="komunikasi_b"
                                                                                id="komunikasi1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi_b" id="komunikasi2_b"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi_b" id="komunikasi3_b"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi_b" id="komunikasi4_b"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="komunikasi5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="komunikasi_b" id="komunikasi5_b"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Kerja Sama Tim</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="kerjasama_b"
                                                                                id="kerjasama1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama_b" id="kerjasama2_b"
                                                                                value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama_b" id="kerjasama3_b"
                                                                                value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama_b" id="kerjasama4_b"
                                                                                value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="kerjasama5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="kerjasama_b" id="kerjasama5_b"
                                                                                value="5">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center">
                                                                <td class="text-left">Pengembangan Diri</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri1_b">
                                                                            <input class="form-check-input" required
                                                                                type="radio" name="pengembangan_diri_b"
                                                                                id="pengembangan_diri1_b" value="1">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri2_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri_b"
                                                                                id="pengembangan_diri2_b" value="2">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri3_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri_b"
                                                                                id="pengembangan_diri3_b" value="3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri4_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri_b"
                                                                                id="pengembangan_diri4_b" value="4">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label
                                                                            class="m-radio m-radio--solid m-radio--success"
                                                                            for="pengembangan_diri5_b">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="pengembangan_diri_b"
                                                                                id="pengembangan_diri5_b" value="5">
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
                                                    <button style="background-color:white;color:#97c197"
                                                        class="btn waves-effect waves-light"
                                                        id="reset_kompetensi_dari_unisma" type="button"><b>Clear
                                                            Selection</b>
                                                    </button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </br>

                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid"
                                style="padding: 10px;">
                                <div class="row">
                                    <div class="col-lg-6">

                                    </div>
                                    <div class="col-lg-6 m--align-right">

                                        <button type="submit" class="btn btn-success">Submit
                                            Tracer</button>
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
                        2020 &copy; sistem Tracer Study by <a href="https://keenthemes.com"
                            class="m-link">UNISMA</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        style="display: none;" aria-hidden="true">
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
                                        {{ $data_mhs->npm }}
                                    </span>
                                </div>
                                <div class="m-widget13__item">
                                    <span class="m-widget13__desc m--align-right">
                                        Nama Alumni:
                                    </span>
                                    <span class="m-widget13__text">
                                        {{ $data_mhs->nama }}
                                    </span>
                                </div>
                                <div class="m-widget13__item">
                                    <span class="m-widget13__desc m--align-right">
                                        Tahun lulus:
                                    </span>
                                    <span class="m-widget13__text">
                                        {{ $data_mhs->tahun_lulus }}
                                    </span>
                                </div>

                                <div class="m-widget13__item">
                                    <span class="m-widget13__desc m--align-right">
                                        Kode PT:
                                    </span>
                                    <span class="m-widget13__text m-widget13__number-bolder m--font-brand">
                                        {{ $data_mhs->kode_pt }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="margin-top: -35px">
                    <button id="m_aside_header_topbar_mobile_toggle" type="button"
                        class="btn btn-danger m-brand__icon m--visible-tablet-and-mobile-inline-block"
                        data-dismiss="modal">Close</button>

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
    <script src="../public/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript">
    </script>
    <script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js"
        type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript">
    </script>
    <script src="../public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js"
        type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js"
        type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript">
    </script>
    <script src="../public/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
    <script src="../public/vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="../public/vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="../public/vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
    <script src="../public/vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
    <script src="../public/vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="../public/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../public/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript">
    </script>
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
    <script src="../public/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript">
    </script>
    <script src="../public/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="../public/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript">
    </script>
    <script src="../public/vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript">
    </script>
    <script src="../public/vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script src="../public/vendors/jstree/dist/jstree.js" type="text/javascript"></script>
    <script src="../public/vendors/raphael/raphael.js" type="text/javascript"></script>
    <script src="../public/vendors/morris.js/morris.js" type="text/javascript"></script>
    <script src="../public/vendors/chartist/dist/chartist.js" type="text/javascript"></script>
    <script src="../public/vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
    <script src="../public/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
    <script src="../public/vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
    <script src="../public/vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
    <script src="../public/vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
    <script src="../public/vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
    <script src="../public/vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="../public/vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript">
    </script>
    <script src="../public/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="../public/assets/demo/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="../public/assets/demo/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
    <script src="../public/assets/demo/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript">
    </script>
    <!--end:: Global Optional Vendors -->
    <script src="../public/assets/demo/custom/components/base/blockui.js" type="text/javascript"></script>
    <!--begin::Global Theme Bundle -->
    <script src="../public/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors -->
    <script src="../public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js" type="text/javascript">
    </script>

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

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        $(document).ready(function() {



            $('div.checkbox-group.required :checkbox:checked').length > 0;
            $('#click_alumni').click(function() {
                var isi_alumni = '<hr><table border=0>' +
                    '<tr><td style="text-align: left;">NPM</td><td>:</td><td style="text-align: left;"><b>&nbsp{{ $data_mhs->npm }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Nama</td><td>:</td><td>&nbsp<b>{{ $data_mhs->nama }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Tahun lulus</td><td>:</td><td style="text-align: left;">&nbsp<b>{{ $data_mhs->tahun_lulus }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Kode PT</td><td>:</td><td style="text-align: left;">&nbsp<b>{{ $data_mhs->kode_pt }}</b></td></tr>' +
                    '</table>'
                Swal.fire({
                    title: "Data Alumni<hr>",
                    html: isi_alumni,
                    confirmButtonText: "OK",
                });
            });
            $('#click_alumni2').click(function() {
                var isi_alumni = '<hr><table border=0>' +
                    '<tr><td style="text-align: left;">NPM</td><td>:</td><td style="text-align: left;"><b>&nbsp{{ $data_mhs->npm }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Nama</td><td>:</td><td>&nbsp<b>{{ $data_mhs->nama }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Tahun lulus</td><td>:</td><td style="text-align: left;">&nbsp<b>{{ $data_mhs->tahun_lulus }}</b></td></tr>' +
                    '<tr><td style="text-align: left;">Kode PT</td><td>:</td><td style="text-align: left;">&nbsp<b>{{ $data_mhs->kode_pt }}</b></td></tr>' +
                    '</table>'
                Swal.fire({
                    title: "Data Alumni<hr>",
                    html: isi_alumni,
                    confirmButtonText: "OK",
                });
            });

            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

            $('form').submit(function() {
                $(window).unbind('beforeunload');
            });

            $(window).on('beforeunload', function() {
                return 'Are you sure you want to leave?';
            });

            $('#tahun_lulus').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#tahun_masuk').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#masuk_study').datepicker({
                format: 'yyyy-mm-dd'
            });

            $('#txtinput_prov').select2({
                placeholder: 'Pilih Provinsi...',
                dropdownParent: $("#txtinput_prov").parent(),
                ajax: {
                    url: '{{ url('/cari/kode_prov') }}',
                    dataType: 'json',
                    delay: 50,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
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

            $('#txtinput_prov').on('select2:select', function(e) {
                var data = e.params.data;
                console.log(data);
                var url = '{{ url('/cari/kode_kota') }}' + '/' + data.id;
                $("#txtinput_kota").val(null).trigger('change');
                ajax_kota(url);
            });

            $("#txtinput_kota").select2({
                placeholder: 'Pilih Kabupaten/Kota'
            });

            function ajax_kota(url) {
                $('#txtinput_kota').select2({
                    placeholder: 'Pilih Kabupaten/Kota',
                    dropdownParent: $("#txtinput_kota").parent(),
                    minimumResultsForSearch: 1,
                    ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 50,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
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
            $('.berikutnya').click(function() {
                if ($('input[name ="email"]').val() == '' || $('input[name ="jeniskelamin"]').value == '' ||
                    $('input[name ="no_whatsapp"]').val() == '' || $('input[name ="alamat"]').val() == '') {
                    swal({
                        title: "Peringatan!",
                        text: "Lengkapi data Anda terlebih dahulu, untuk mengisi quisioner alumni !",
                        button: "OKE",
                    });
                } else if (IsEmail($('input[name ="email"]').val()) == false) {
                    swal({
                        title: "Peringatan!",
                        text: "Format email yang anda masukkan salah !",
                        button: "OKE",
                    });
                } else {
                    $('.isi_biodata').hide();
                    $('.isi_quisioner').fadeIn();
                }
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

            $('#reset_pembiayaan').click(function() {
                $('input[name="pertanyaanf12"]').prop('checked', false);
            });

            //[F3 Kapan Anda mulai mencari pekerjaan? ]
            $('#reset_mulai_mencari_pekerjaan').click(function() {
                $('input[name="pertanyaan_f3"]').prop('checked', false);
                $('input[name="pertanyaanf3_input_sebelum"]').prop("disabled", true);
                $('input[name="pertanyaanf3_input_sebelum"]').val('');
                $('input[name="pertanyaanf3_input_setelah"]').prop("disabled", true);
                $('input[name="pertanyaanf3_input_setelah"]').val('');
            });
            $("#pertanyaan22").change(function(event) {
                event.preventDefault();
                $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", false);
                $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", true);
                $('input[name ="pertanyaanf3_input_setelah"]').val('');
            });
            $("#pertanyaan222").change(function(event) {
                event.preventDefault();
                $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", true);
                $('input[name ="pertanyaanf3_input_sebelum"]').val('');
                $('input[name ="pertanyaanf3_input_setelah"]').val('');
                $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", true);
            });
            $("#pertanyaan90").change(function(event) {
                event.preventDefault();
                $('input[name ="pertanyaanf3_input_setelah"]').prop("disabled", false);
                $('input[name ="pertanyaanf3_input_sebelum"]').val('');
                $('input[name ="pertanyaanf3_input_sebelum"]').prop("disabled", true);
            });

            //[F4 Bagaimana cara Anda mendapatkan pekerjaan setelah lulus dari program pascasarjana Unisma? ]
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
                $('input[name="pertanyaanf4_lainnya"]').prop('checked', false);
            });

            //[F6 Berapa perusahaan/instansi/institusi yang sudah Anda lamar (lewat surat atau email) sebelum Anda memperoleh pekerjaan pertama?]
            $('#reset_perusahaan_yang_sudah_anda_lamar_lewat_email').click(function() {
                $('input[name="pertanyaanf6"]').val('');
            });

            //[F7 Berapa banyak perusahaan/instansi/institusi yang merespon lamaran Anda?]
            $('#reset_perusahaan_merespon').click(function() {
                $('input[name="pertanyaanf7"]').val('');
            });

            //[F7a Berapa banyak perusahaan/instansi/institusi yang mengundang Anda untuk wawancara?]
            $('#reset_perusahaan_yang_mengundang_anda').click(function() {
                $('input[name="pertanyaanf7a"]').val('');
            });

            //[F9 Bagaimana anda menggambarkan situasi anda saat ini? ]
            $('#reset_menggambarkan_situasi_anda').click(function() {
                $('input[name="pertanyaanf9_belajar"]').prop('checked', false);
                $('input[name="pertanyaanf9_menikah"]').prop('checked', false);
                $('input[name="pertanyaanf9_sibuk_keluarga"]').prop('checked', false);
                $('input[name="pertanyaanf9_sedang_mencari_pekerjaan"]').prop('checked', false);
                $('input[name="pertanyaanf9_lainnya"]').prop('checked', false);
            });

            //[F5 Berapa bulan waktu yang dibutuhkan (sebelum dan sesudah kelulusan Anda) untuk mendapatkan pekerjaan pertama?]
            $('#reset_bulan_untuk_mencari_pekerjaan').click(function() {
                $('input[name="pertanyaan2_f5"]').prop('checked', false);
                $('input[name="pertanyaanf5input"]').val('');
                $('input[name="pertanyaanf5input2"]').val('');
                $('input[name="pertanyaanf5input2"]').prop("disabled", true);
                $('input[name="pertanyaanf5input"]').prop("disabled", true);
            });
            $("#pertanyaanf52").change(function(event) {
                event.preventDefault();
                $('input[name="pertanyaanf5input2"]').prop("disabled", false);
                $('input[name="pertanyaanf5input"]').prop("disabled", true);
                $('input[name="pertanyaanf5input"]').val('');
            });
            $("#pertanyaanf51").change(function(event) {
                event.preventDefault();
                $('input[name="pertanyaanf5input"]').prop("disabled", false);
                $('input[name="pertanyaanf5input2"]').val('');
                $('input[name="pertanyaanf5input2"]').prop("disabled", true);
            });

            //[F10 Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?]
            $('#reset_pekerjaan_dalam_4minggu').click(function() {
                $('input[name="pertanyaanf10"]').prop('checked', false);
            });

            //[D1P. Jelaskan status Anda saat ini?]
            $('#reset_status_saat_ini').click(function() {
                $('input[name="status_kerja"]').prop('checked', false);
            });

            //[D5. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang]
            $('#reset_jenis_perusahaan').click(function() {
                $('input[name="jenis_perusahaan"]').prop('checked', false);
            });

            //[D6 Apa nama perusahaan/kantor tempat Anda bekerja?]
            $('#reset_perusahaan_tempat_bekerja').click(function() {
                $('input[name="nama_perusahaan"]').val('');
            });

            //[D6 Dimana lokasi tempat Anda bekerja? ]
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

            //[D4 Apa jenis perusahaan/ instansi/ institusi tempat Anda bekerja sekarang?]
            $('#reset_jenis_perusahaan_tempat_bekerja').click(function() {
                $('input[name="wiraswastaijintidakberijin_ijin"]').prop('checked', false);
                $('input[name="wiraswastaijintidakberijin_tidakijin"]').prop('checked', false);
                $('input[name="wiraswastaijintidakberijin_lokal"]').prop('checked', false);
                $('input[name="wiraswastaijintidakberijin_nasional"]').prop('checked', false);
                $('input[name="wiraswastaijintidakberijin_internasional"]').prop('checked', false);
            });

            //[D8.1, D8.2, D8.3]
            $('#reset_pendapatan_setiap_bulannya').click(function() {
                $('input[name="pekerjaan_utama"]').val('');
                $('input[name="lembur_tips"]').val('');
                $('input[name="pekerjaan_lainnya"]').val('');
            });

            //[F14 Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?]
            $('#reset_Seberapaerathubunganantarabidangstudi').click(function() {
                $('input[name="pertanyaanf14"]').prop('checked', false);
            });

            //[E3 Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?]
            $('#reset_tingkat_pendidikan_yang_tepat').click(function() {
                $('input[name="pertanyaanf15"]').prop('checked', false);
            });

            //[D7. Bila berwirausaha, apa posisi/jabatan Anda saat ini? ]
            $('#reset_posisi').click(function() {
                $('input[name="posisi"]').prop('checked', false);
            });

            //[Apa tingkat tempat kerja Anda?]
            $('#reset_tingkat').click(function() {
                $('input[name="tingkat"]').prop('checked', false);
            });

            //[Apabila Anda melanjutkan studi, sebutkan:]
            $('#reset_lanjut_study').click(function() {
                $('input[name="biaya"]').prop('checked', false);
                $('input[name="universitas"]').val('');
                $('input[name="prodi"]').val('');
                $('#masuk_study').datepicker('setDate', null);
            });

            //[F4 Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya?]
            $('#reset_tingkat_pendidikan_yang_tepat2').click(function() {
                $('input[name="pertanyaanf16_pertanyaan_tidak_sesuai"]').prop('checked', false);
                $('input[name="pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai"]').prop(
                    'checked', false);
                $('input[name="pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik"]')
                    .prop('checked', false);
                $('input[name="pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan"]').prop('checked',
                    false);
                $('input[name="pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang"]').prop('checked',
                    false);
                $('input[name="pertanyaanf16_Saya_dapat_memeroleh_pendapatan"]').prop('checked', false);
                $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure"]').prop(
                    'checked', false);
                $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik"]').prop('checked',
                    false);
                $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan"]').prop('checked',
                    false);
                $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat"]').prop(
                    'checked', false);
                $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih"]').prop('checked', false);
                $('input[name="pertanyaanf16_Pada_awal_meniti_karir_ini"]').prop('checked', false);
                $('input[name="pertanyaanf16_Lainnya"]').prop('checked', false);
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

            //[Menurut Anda, bagaimanakah profil karakter kepribadian Anda dalam lingkungan kerja?]
            $('#reset_profil_lingkungan_kerja').click(function() {
                $('input[name="tanggung_jawab"]').prop('checked', false);
                $('input[name="bekerjasama"]').prop('checked', false);
                $('input[name="bersungguhsungguh"]').prop('checked', false);
                $('input[name="bekerjakeras"]').prop('checked', false);
                $('input[name="toleran"]').prop('checked', false);
                $('input[name="meletakkansegalasesuatu"]').prop('checked', false);
                $('input[name="kreatifdaninovatif"]').prop('checked', false);
                $('input[name="keputusanterbaik"]').prop('checked', false);
            });

            //[Apakah Saudara mengikuti organisasi kemahasiswaan berbasis ke NU an?]
            $('#reset_kemahasiswaan_nu').click(function() {
                $('input[name="organisasikemahasiswaanNU"]').prop('checked', false);
            });

            //[Organisasi apa yang pernah saudara ikuti selama kuliah di Unisma dan sebagai apa?]
            $('#reset_organisasi_dalam_kemahasiswaan').click(function() {
                $('input[name="organisasi_dalam_kemahasiswaan"]').val('');
            });

            //[Apakah keikutsertaan saudara dalam organisasi tersebut berpengaruh terhadap capaian karir saat ini?]
            $('#reset_pengaruh_organisasi').click(function() {
                $('input[name="pengaruh_organisasi"]').prop('checked', false);
            });
        });
    </script>
</body>

</html>
