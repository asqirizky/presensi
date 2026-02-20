<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.6
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
<base href="../../../" />
		<title>Absensi Khidmah</title>
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
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

        <style>
           /* Video Background */
           .video-bg {
               position: fixed;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
               object-fit: cover;
               z-index: -1;
           }

            /* Glass Effect */
        .glass-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .glass-form button:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Center Content */
        .content-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* White Text for Better Contrast */
        .text-light {
            color: white !important;
        }

        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">


            <!-- Background Video -->
            <video autoplay muted loop class="video-bg">
                <source src="{!! asset('admin/assets/media/lofi.mp4') !!}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>

			<!--begin::Authentication - Sign-up -->
			<div class="content-center d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column flex-center rounded-4 w-md-600px p-10">
						<!--begin::Content-->
						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
							<!--begin::Wrapper-->
							<div class="glass-form d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
								<!--begin::Form-->
								<form class="form w-100" method="POST" enctype="multipart/form-data" action="admin/absensi-absen">
                                @csrf
									<!--begin::Heading-->
									<div class="text-center mb-11">
										<!--begin::Title-->
										<h1 class="text-gray-900 fw-bolder mb-3">Absen Digital</h1>
										<!--end::Title-->
										<!--begin::Subtitle-->
										<div class="text-gray-900 fw-semibold fs-6">Perpustakaan Ibrahimy</div>
										<!--end::Subtitle=-->
									</div>
									<!--begin::Heading-->

									<!--begin::Separator-->
									<div class="separator separator-content my-14">
										<span class="w-125px text-gray-900 fw-semibold fs-7">Absen Here</span>
									</div>
									<!--end::Separator-->
									<!--begin::Input group=-->
									<div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password" name="nik" required autocomplete="off" autofocus>
                                    </div>
									<!--begin::Submit button-->
                                    <div class="d-grid mb-10">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="text-dark text-center">Zeinuri x Yogy @2025 Lib IT Dev.</div>

								</form>
								<!--end::Form-->
							</div>
							<!--end::Wrapper-->

						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>

        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="admin/assets/plugins/global/plugins.bundle.js"></script>
        <script src="admin/assets/js/scripts.bundle.js"></script>

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
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>

