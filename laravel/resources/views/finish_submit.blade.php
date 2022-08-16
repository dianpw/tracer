<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
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

		<!--end:: Global Mandatory public/Vendors -->

		<!--begin:: Global Optional public/Vendors -->
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
        <link rel="stylesheet" type="text/css" href="public/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js" rel="stylesheet"/>
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

	<!-- end::Head -->

    <!-- begin::Body -->
    <!DOCTYPE html>

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

                                        <H4 style="padding-top:8px;padding-right:10px;font-size:17px;color: whitesmoke"> <a style="font-size: 23px;color:#f0f0e9;font-family: 'Passion One';"></a></H4>

								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools" >

									<!-- BEGIN: Left Aside Minimize Toggle -->


									<!-- END -->

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->


									<!-- END -->

									<!-- BEGIN: Responsive Header Menu Toggler -->


									<!-- END -->

									<!-- BEGIN: Topbar Toggler -->



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



  <div class="m-invoice-2" style="background-color: #e3e8e4;margin-top:20px">
    <div class="m-invoice__wrapper">
        <div class="m-invoice__head" style="background-image: url(assets/app/media/img//logos/bg-6.jpg);">
            <div class="m-invoice__container m-invoice__container--centered">
                <div class="m-invoice__logo">
                    <a href="#">
                        <h1>Success Submit Form</h1><br>
                        <h5 style="color:cadetblue">Terima kasih sudah mengisi Tracer Study  </h5>
                    </a>
                    <a href="#">
                        <img width="300px" class="img_logo" src="public/LogoTraceStudy.png" >
                    </a>
                </div>
                <span class="m-invoice__desc">
                    <br>
                    <h5>Universitas Islam Malang</h5>
                    @Tracer Study Unisma
                </span>

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
				</>
            </footer>


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