<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>
        <meta charset="utf-8" />
        <title>Sistem Tracer Study - UNISMA</title>
        <link rel = "icon" href ="images/logounisma.png">
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>

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

        </style>
		<!--end::Web font -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="../vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="../vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="../vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
        <link href="../vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js" rel="stylesheet"/>
		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles -->
		<link href="../assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="../assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

        <link href="../assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="../assets/demo/media/img/logo/favicon.ico" />
	</head>

	<!-- end::Head -->

    <!-- begin::Body -->
    <!DOCTYPE html>

	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

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

                                        <H4 style="padding-top:7px;padding-right:10px;font-size:17px;color: whitesmoke"> <img src="images/logounisma.png" style="width: 47px">&nbsp&nbsp<a style="font-size: 25px;color:#f0f0e9;font-family: 'Passion One';">Tracer Study</a></H4>

								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools" >

									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
										<span ></span>
									</a>

									<!-- END -->

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" style="border-color: white" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span style="background-color: white"></span>
									</a>

									<!-- END -->

									<!-- BEGIN: Responsive Header Menu Toggler -->


									<!-- END -->

									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"> </i>
									</a>

									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">

								</ul>
							</div>

							<!-- END: Horizontal Menu -->

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-topbar__nav-wrapper">
                                  <b style="color:rgb(196, 199, 98) ;margin-right: 5px" id="tanggal"></b>| <b style="color:rgb(116, 146, 117) ;margin-right: 20px" id="clock"></b>
                                
                                  <ul class="m-topbar__nav m-nav m-nav--inline">

										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
										 m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<span class="m-type m--bg-success"><span class="m--font-light">
                                                       
                                                    </span></span>
												</span>
												<span class="m-topbar__username m--hide">Nick</span>
                                            </a>

											<div class="m-dropdown__wrapper">

												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="color: green"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/bg5.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<span class="m-type m--bg-success"><span class="m--font-light">
                                                                    
                                                                </span></span>

																<!--
						<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
						-->
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

							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				

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
								2020 &copy; sistem Tracer Study by <a href="https://keenthemes.com" class="m-link">UNISMA</a>
							</span>
						</div>

					</div>
				</>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Sidebar -->


		<!-- end::Quick Sidebar -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</>

		<!-- end::Scroll Top -->

		<!-- begin::Quick Nav -->

		<!-- begin::Quick Nav -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="../vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="../vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="../vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="../vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="../vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="../vendors/wnumb/wNumb.js" type="text/javascript"></script>

		<!--end:: Global Mandatory ../Vendors -->

		<!--begin:: Global Optional ../Vendors -->
		<script src="../vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="../vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="../vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="../vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="../vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
		<script src="../vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="../vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="../vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="../vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="../vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="../vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="../vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="../vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
		<script src="../vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="../vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="../vendors/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="../vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="../vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="../vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="../vendors/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="../vendors/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="../vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="../vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
		<script src="../vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
		<script src="../vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="../vendors/jstree/dist/jstree.js" type="text/javascript"></script>
		<script src="../vendors/raphael/raphael.js" type="text/javascript"></script>
		<script src="../vendors/morris.js/morris.js" type="text/javascript"></script>
		<script src="../vendors/chartist/dist/chartist.js" type="text/javascript"></script>
		<script src="../vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="../vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
		<script src="../vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="../vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="../vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="../vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="../vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="../vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
        <script src="../vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>
        <script src="../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <script src="../assets/demo/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
        <script src="../assets/demo/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
        <script src="../assets/demo/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
		<!--end:: Global Optional Vendors -->
        <script src="../assets/demo/custom/components/base/blockui.js" type="text/javascript"></script>
		<!--begin::Global Theme Bundle -->
		<script src="../assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
        <script src="../assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="../assets/app/js/dashboard.js" type="text/javascript"></script>
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
            //-->
            </script>

            <!-- Menampilkan Hari, Bulan dan Tahun -->
            <br>
            <script type='text/javascript'>
                <!--
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
                //-->

                </script>
