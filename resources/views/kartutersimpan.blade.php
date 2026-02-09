<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Pelayanan Kartu - Perpustakaan Ibrahimy</title>
		<meta charset="utf-8" />
		<meta name="description" content="Kegiatan bulanan perpustakaan ibrahimy akan ditampilkan di sini" />
		<meta name="keywords" content="Kegiatan bulanan perpustakaan ibrahimy akan ditampilkan di sini" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Kegiatan - Perpustakaan Ibrahimy" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="http://preview.keenthemes.comindex.html" />
		<link rel="shortcut icon" href="{{ asset('admin/assets/media/logos/logo perpus icon.png') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{ asset('kegiatan/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('kegiatan/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('kegiatan/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body class="page-bg">
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            particlesJS.load('particles-js', "particlesjs-config.json");
        </script>
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->

        <!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page launcher d-flex flex-row me-lg-5" id="kt_page">
				<!--begin::Content-->
				<div class="d-flex flex-row-fluid">
					<!--begin::Container-->
					<div class="d-flex flex-column flex-row-fluid align-items-center">
						<!--begin::Menu-->
						<div class="d-flex flex-column flex-center flex-column-fluid mb-5 mb-lg-10">
							<!--begin::Brand-->
							<div class="d-flex flex-center pt-10 pt-lg-0 mb-10 mb-lg-0 h-lg-225px">
								<!--begin::Sidebar toggle-->
								<div class="btn btn-icon btn-active-color-primary w-30px h-30px d-lg-none me-4 ms-n15" id="kt_sidebar_toggle">
									<i class="ki-duotone ki-abstract-14 fs-1">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Sidebar toggle-->
								<!--begin::Logo-->
								<a class="text-center">
									<img alt="Logo" src="{{ asset('admin/assets/media/logos/logo perpus.png') }}" class="h-100px" />
                                    <h1 class="text-white fs-2 fw-bold text-center mt-3">Perpustakaan Ibrahimy</h1>
                                    <h1 class="text-white fs-4 text-center mt-1">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h1>
                                    <label class="badge py-4 px-8 fs-2 badge-light text-primary mt-2 mb-12" id="clock">Loading...</label>
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Brand-->
							<!--begin::Row-->
							<div class="row g-7 w-xxl-850px">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<!--begin::Card-->
                                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('kegiatan/media/perpustakaan/banner-masjid.png')">
										<!--begin::Card header-->
                                        <div class="card-body pt-7 pb-7">
                                            <!--begin::Heading-->
                                            <div class="card-px text-center pt-15 pb-15">
                                                <!--begin::Title-->
                                                <h2 class="fs-2x fw-bold mb-0">Data berhasil tersimpan!</h2>
                                                <!--end::Title-->
                                                <!--begin::Description-->
                                                <p class="text-gray-500 fs-4 fw-semibold py-7">hubungi bagian percetakan kartu
                                                <br>bila terjadi masalah penginputan data.</p>
                                                <!--end::Description-->
                                                <!--begin::Action-->
                                                <a href="#" class="btn btn-primary er fs-6 px-8 py-4">Tambahkan Data Baru</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Illustration-->
                                            <div class="text-center pb-15 px-5">
                                                <img src="{{ asset('kegiatan/media/perpustakaan/sukron.png') }}" alt="" class="mw-100 h-200px h-sm-325px">
                                            </div>
                                            <!--end::Illustration-->
                                        </div>
										<!--end::Card header-->
									</div>
									<!--end::Card-->
                                </div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Menu-->
						<!--begin::Footer-->
						<div class="d-flex flex-column-auto flex-center">
							<!--begin::Navs-->
							<ul class="menu fw-semibold order-1">
								<li class="menu-item">
									<a href="https://lib.ibrahimy.ac.id" target="_blank" class="menu-link text-white opacity-50 opacity-100-hover px-3">www.lib.ibrahimy.ac.id</a>
								</li>
							</ul>
							<!--end::Navs-->
						</div>
						<!--end::Footer-->
					</div>
					<!--begin::Content-->
				</div>
				<!--begin::Content-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<!--begin::Modals-->
		<!--begin::Javascript-->
        <script>
            function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const time = `${hours}:${minutes}:${seconds}`;
            document.getElementById('clock').textContent = time;
            }

            // Update the clock every second
            setInterval(updateClock, 1000);

            // Initialize clock on page load
            updateClock();
        </script>

		<script>var hostUrl = "kegiatan/";</script>
        <!--begin::Javascript-->
        <script>
            var hostUrl = "kegiatan/";
        </script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="kegiatan/plugins/global/plugins.bundle.js"></script>
		<script src="kegiatan/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="kegiatan/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="kegiatan/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="kegiatan/js/widgets.bundle.js"></script>
		<script src="kegiatan/js/custom/widgets.js"></script>
		<script src="kegiatan/js/custom/apps/chat/chat.js"></script>
		<script src="kegiatan/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="kegiatan/js/custom/utilities/modals/create-campaign.js"></script>
		<script src="kegiatan/js/custom/utilities/modals/create-app.js"></script>
		<script src="kegiatan/js/custom/utilities/modals/users-search.js"></script>
        <!--end::Custom Javascript-->
	</body>
	<!--end::Body-->
</html>
