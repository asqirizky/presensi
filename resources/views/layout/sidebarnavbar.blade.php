<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
<base href="../" />
		<title>Admin Website - Perpustakaan Ibrahimy</title>
		<meta charset="utf-8" />
		<meta name="description" content="Admin Website Perpustakaan Ibrahimy hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
		<meta name="keywords" content="Admin Website Perpustakaan Ibrahimy hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Admin Website - Perpustakaan Ibrahimy" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />

		<link rel="canonical" href="http://preview.keenthemes.comlayouts/light-sidebar.html" />
		<link rel="shortcut icon" href="admin/assets/media/logos/logo perpus icon.png" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="admin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        {{-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script> --}}




		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

        <style>
            body  {
                background-image: url("admin/assets/media/svg/bg.svg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }
        </style>

    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body onload="realtimeClock()" id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="true">
					<!--begin::Header container-->
					<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<!--begin::Sidebar mobile toggle-->
						<div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
								<i class="ki-outline ki-abstract-14 fs-2 fs-md-1"></i>
							</div>
						</div>
						<!--end::Sidebar mobile toggle-->
						<!--begin::Mobile logo-->
						<div class="flex-1 d-flex align-items-center flex-lg-grow-0">
							<a href="/admin/home" class="d-lg-none">
								<img alt="Logo" src="admin/assets/media/logos/default-small.svg" class="h-30px" />
							</a>
						</div>
						<!--end::Mobile logo-->
						<!--begin::Header wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<!--begin::Menu-->
								<div class="px-2 my-5 menu menu-rounded menu-column menu-lg-row my-lg-0 align-items-stretch fw-semibold px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-title">Sistem Manajemen Website Perpustakaan Ibrahimy</span>
										</span>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Navbar-->
							<div class="shrink-0 app-navbar">
                                <div class="app-navbar-item ms-1 ms-md-4">
									<!--begin::Menu wrapper-->
                                    @php
                                        $hari = Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
                                    @endphp
                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">
										<span class="bullet bullet-dot bg-primary h-6px w-6px animation-blink me-2"></span>
										<label class="">{{ $hari }} - </label>
                                        <label id="clock" class="ms-2"></label>
                                    </span>
									<!--end::Menu wrapper-->
								</div>
								<!--begin::Theme mode-->
								<div class="app-navbar-item ms-1 ms-md-4">
									<!--begin::Menu toggle-->
									<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<i class="ki-outline ki-night-day theme-light-show fs-1"></i>
										<i class="ki-outline ki-moon theme-dark-show fs-1"></i>
									</a>
									<!--begin::Menu toggle-->
									<!--begin::Menu-->
									<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-night-day fs-2"></i>
												</span>
												<span class="menu-title">Terang</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-moon fs-2"></i>
												</span>
												<span class="menu-title">Gelap</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-screen fs-2"></i>
												</span>
												<span class="menu-title">Sistem</span>
											</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Theme mode-->
								<!--begin::User menu-->
								<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<img src="storage/foto/{{ auth()->user()->foto }}" class="rounded-3" alt="user" />
									</div>
									<!--begin::User account menu-->
									<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="px-3 menu-item">
											<div class="px-3 menu-content d-flex align-items-center">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
													<img alt="Logo" src="storage/foto/{{ auth()->user()->foto }}" />
												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}
													<span class="px-2 py-1 badge badge-light-success fw-bold fs-8 ms-2">AKtif</span></div>
													<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->idstaf }}</a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="my-2 separator"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="px-5 menu-item">
											<a href="#" class="px-5 menu-link">Profil</a>
										</div>
										<!--end::Menu item-->

										<!--begin::Menu item-->
										<div class="px-5 menu-item">
											<a href="{{ route('logout') }}" class="px-5 menu-link">Keluar</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::User account menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User menu-->
								<!--begin::Header menu toggle-->
								<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
									<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
										<i class="ki-outline ki-element-4 fs-1"></i>
									</div>
								</div>
								<!--end::Header menu toggle-->
								<!--begin::Aside toggle-->
								<!--end::Header menu toggle-->
							</div>
							<!--end::Navbar-->
						</div>
						<!--end::Header wrapper-->
					</div>
					<!--end::Header container-->
				</div>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Logo-->
						<div class="px-6 app-sidebar-logo" id="kt_app_sidebar_logo">
							<!--begin::Logo image-->
							<a href="index.html">
								<img alt="Logo" src="admin/assets/media/logos/default.svg" class="h-35px app-sidebar-logo-default theme-light-show" />
								<img alt="Logo" src="admin/assets/media/logos/default-dark.svg" class="h-35px app-sidebar-logo-default theme-dark-show" />
								<img alt="Logo" src="admin/assets/media/logos/default-small.svg" class="h-35px app-sidebar-logo-minimize" />
							</a>
							<!--end::Logo image-->
							<!--begin::Sidebar toggle-->
							<!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
							<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
								<i class="rotate-180 ki-outline ki-black-left-line fs-3"></i>
							</div>
							<!--end::Sidebar toggle-->
						</div>
						<!--end::Logo-->
						<!--begin::sidebar menu-->
						<div class="overflow-hidden app-sidebar-menu flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
								<!--begin::Scroll wrapper-->
								<div id="kt_app_sidebar_menu_scroll" class="mx-3 my-5 scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
									<!--begin::Menu-->
									<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
										<!--begin:Menu item-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <a class="menu-link {{ request()->is('admin/home') ? 'active' : ''}}" href="admin/home">
                                                <span class="menu-icon">
													<i class="ki-outline ki-home fs-2"></i>
												</span>
												<span class="menu-title">Beranda</span>
											</a>
										</div>
										<!--end:Menu item-->
                                        <!--begin:Menu item-->
										<div class="pt-5 menu-item">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Aplikasi</span>
											</div>
											<!--end:Menu content-->
										</div>


                                        @php
                                        $kehadiranPermissions = [
                                            'kehadiran hadir-lihat',
                                            'kehadiran pegawai-lihat',
                                            'kehadiran jadwal-lihat',
                                            'kehadiran izin-lihat',
                                            'kehadiran jabatan-lihat',
                                            'kehadiran tunjangan-lihat',
                                            'kehadiran rekapan-lihat',
                                            'kehadiran generate-lihat',
                                            'kehadiran libur-lihat',
                                        ];

                                        $kehadiranActive = request()->is('admin/kehadiran-*');
                                        @endphp

                                        @canany($kehadiranPermissions)
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ $kehadiranActive ? 'here show' : '' }}">
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-calendar-tick fs-2"></i>
                                                </span>
                                                <span class="menu-title">Struktural</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                @can('kehadiran hadir-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-hadir') ? 'active' : '' }}" href="admin/kehadiran-hadir">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Absen Room</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran pegawai-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-pegawai') ? 'active' : '' }}" href="admin/kehadiran-pegawai">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Pegawai</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran jadwal-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-jadwal') ? 'active' : '' }}" href="admin/kehadiran-jadwal">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Jadwal</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran izin-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-izin') ? 'active' : '' }}" href="admin/kehadiran-izin">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Izin</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran libur-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-libur') ? 'active' : '' }}" href="admin/kehadiran-libur">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Libur</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran jabatan-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-jabatan') ? 'active' : '' }}" href="admin/kehadiran-jabatan">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Jabatan</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran tunjangan-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-tunjangan') ? 'active' : '' }}" href="admin/kehadiran-tunjangan">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Tunjangan</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('kehadiran rekapan-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/kehadiran-rekapan') ? 'active' : '' }}" href="admin/kehadiran-rekapan">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Rekap</span>
                                                    </a>
                                                </div>
                                                @endcan

                                            </div>
                                        </div>
                                        @endcanany


                                        @php
                                            $absenPermission = [
                                                'absen absen-lihat',
                                                'absen barokah-lihat',
                                                'absen izin-lihat',
                                                'absen khidmah-lihat',
                                                'absen libur-lihat',
                                                'absen lokasi-lihat',
                                                'absen rekap-lihat',
                                                'absen shift-lihat',
                                            ];

                                            $absenActive = request()->is('admin/absensi-*');
                                        @endphp

                                        @canany($absenPermission)
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ $absenActive ? 'here show' : '' }}">
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-user-tick fs-2"></i>
                                                </span>
                                                <span class="menu-title">Tenaga Khidmah</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                @can('absen khidmah-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-khidmah') ? 'active' : '' }}" href="admin/absensi-khidmah">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Khidmah</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen izin-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-izin') ? 'active' : '' }}" href="admin/absensi-izin">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Izin</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen libur-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-libur') ? 'active' : '' }}" href="admin/absensi-libur">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Libur</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen shift-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-shift') ? 'active' : '' }}" href="admin/absensi-shift">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Shift</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen lokasi-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-lokasi') ? 'active' : '' }}" href="admin/absensi-lokasi">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Lokasi</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen barokah-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-barokah') ? 'active' : '' }}" href="admin/absensi-barokah">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Barokah</span>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('absen rekap-lihat')
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->is('admin/absensi-rekap') ? 'active' : '' }}" href="admin/absensi-rekap">
                                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                        <span class="menu-title">Rekap</span>
                                                    </a>
                                                </div>
                                                @endcan

                                            </div>
                                        </div>
                                        @endcanany



										<div class="pt-5 menu-item">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Hak Akses</span>
											</div>
											<!--end:Menu content-->
										</div>

                                        @if(auth()->user()->hasPermissionTo('pengguna-lihat') || auth()->user()->hasPermissionTo('akses pengguna-lihat'))
                                        <!--begin:Menu item-->
                                        @if(request()->is('admin/pengguna') || request()->is('admin/pengguna-akses'))
										<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                                        @else
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        @endif
											<!--begin:Menu link-->
											<span class="menu-link">
												<span class="menu-icon">
													<i class="ki-outline ki-address-book fs-2"></i>
												</span>
												<span class="menu-title">Pengguna</span>
												<span class="menu-arrow"></span>
											</span>
											<!--end:Menu link-->
											<!--begin:Menu sub-->
											<div class="menu-sub menu-sub-accordion">
												<!--begin:Menu item-->
                                                @if(auth()->user()->hasPermissionTo('pengguna-lihat'))
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link {{ request()->is('admin/pengguna') ? 'active' : ''}}" href="admin/pengguna">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Data Pengguna</span>
													</a>
													<!--end:Menu link-->
												</div>
                                                @endif
												<!--end:Menu item-->
												<!--begin:Menu item-->
                                                @if(auth()->user()->hasPermissionTo('akses pengguna-lihat'))
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link {{ request()->is('admin/pengguna-akses') ? 'active' : ''}}" href="admin/pengguna-akses">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Akses</span>
													</a>
													<!--end:Menu link-->
												</div>
                                                @endif
												<!--end:Menu item-->
											</div>
											<!--end:Menu sub-->
										</div>
                                        @endif
										<!--end:Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Scroll wrapper-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
						<!--begin::Footer-->

						<!--end::Footer-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Main-->
					@if (config('app.debug'))
						<div class="px-4 py-3 text-center text-white maintenance-alert">
							⚠️ Sistem sedang dalam masa perbaikan (maintenance). Beberapa fitur mungkin tidak berjalan dengan normal.
						</div>
					@endif

					<style>
						.maintenance-alert {
							background-color: #f59e0b; /* Amber */
							animation: pulse 1.5s ease-in-out infinite;
							font-weight: bold;
							position: relative;
							z-index: 9999;
						}

						@keyframes pulse {
							0%, 100% {
								opacity: 1;
							}
							50% {
								opacity: 0.6;
							}
						}
					</style>

					@yield('admin-konten')
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
        @if (session('success'))
        <script>
            Swal.fire({
                title: 'Alhamdulillah!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
        @endif
        @if (session('error'))
        <script>
            Swal.fire({
                title: 'Astaghfirullah!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        </script>
        @endif
        // Script Delete Button
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.delete-button').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--beign::Script Maintenance-->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.maintenance').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Mohon maaf',
                            text: "Halaman ini sedang dalam perbaikan",
                            icon: 'warning',
                            showCancelButton: false,
                            cancelButtonText: 'Kembali',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--end::Script Maintenance-->
		<!--begin::Script Warning-->
		<script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.warning').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Setelah data ini disimpan tidak bisa diedit kembali!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, simpan!',
                            cancelButtonText: 'Batal',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--end::Javascript-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "admin/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
		<script src="admin/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script src="admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('admin/assets/js/jam.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
