<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Kegiatan Perpustakaan Ibrahimy</title>
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
                                    <h1 class="text-gray-800 fs-2 fw-bold text-center mt-3">Kegiatan Perpustakaan Ibrahimy</h1>
                                    <h1 class="text-gray-800 fs-4 text-center mt-1">Bulan {{ Carbon\Carbon::now()->isoFormat('MMMM Y') }}</h1>
                                    <label class="badge py-4 px-8 fs-2 badge-light text-primary mt-2 mb-12" id="clock">Loading...</label>
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Brand-->
							<!--begin::Row-->
							<div class="row g-7 w-xxl-850px">
								<!--begin::Col-->
                                @foreach ($events as $event)
                                @if(request()->is('kegiatan('.$event->slug.')'))
                                @if($event->slug == ''.$event->slug.'')
								<div class="col-xxl-12">
									<!--begin::Card-->
                                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('kegiatan/media/perpustakaan/banner-masjid.png')">
										<!--begin::Card header-->
										<div class="card-header pt-7 pb-7">
											<div class="d-flex align-items-center">
												<!--begin::Icon-->
												<div class="symbol symbol me-5">
                                                    @if ($event->ket ==  "Belum")
                                                    @if ($event->kategori == "Mingguan")
													<div class="symbol-label fs-3 bg-danger text-light">{{ Carbon\Carbon::parse($event->tanggal)->isoFormat('D') }}</div>
                                                    @elseif($event->kategori == "Bulanan")
													<div class="symbol-label fs-3 bg-warning text-light">{{ Carbon\Carbon::parse($event->tanggal)->isoFormat('D') }}</div>
                                                    @elseif($event->kategori == "Tahunan")
													<div class="symbol-label fs-3 bg-primary text-light">{{ Carbon\Carbon::parse($event->tanggal)->isoFormat('D') }}</div>
                                                    @endif
                                                    @elseif ($event->ket ==  "Terlaksana")
													<div class="symbol-label fs-3 bg-success text-light">{{ Carbon\Carbon::parse($event->tanggal)->isoFormat('D') }}</div>
                                                    @endif
												</div>
												<!--end::Icon-->
												<!--begin::Title-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-1 mb-1">{{ $event->kegiatan }}
                                                    @if ($event->kategori == "Mingguan")
                                                        <span class="badge badge-light-danger fw-bold ms-2">{{ $event->kategori }}</span>
                                                    @elseif($event->kategori == "Bulanan")
                                                        <span class="badge badge-light-warning fw-bold ms-2">{{ $event->kategori }}</span>
                                                    @elseif($event->kategori == "Tahunan")
                                                        <span class="badge badge-light-primary fw-bold ms-2">{{ $event->kategori }}</span>
                                                    @endif
                                                    </div>
													<div class="text-muted fw-bold">
													<a class="text-primary">{{ Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }}</a>
													<span class="mx-3">|</span>PJ/Ketua Panitia : {{ $event->pj }}
												</div>
												<!--end::Title-->
											</div>
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->

										<div class="card-body text-center">
											<!--begin::Navs-->
                                            @if ($event->ket == "Belum")
											<div class="badge py-4 px-7 fs-6 badge-light-danger" id="countdown-{{ $event->id }}"></div>
                                            @elseif ($event->ket == "Terlaksana")
											<div class="badge py-4 px-5 fs-6 badge-success">Kegiatan Terlaksana</div>
                                            @endif
											<!--begin::Navs-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
                                </div>
                                @endif
                                @endif
                                @endforeach
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

        <script>
        // Pass event data from the server to JavaScript
        const events = @json($events);

        // Loop through each event and set up a countdown
        events.forEach(event => {
            const eventDate = new Date(event.tanggal).getTime();
            const countdownElement = document.getElementById(`countdown-${event.id}`);

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = eventDate - now;

                if (distance <= 0) {
                    clearInterval(interval);
                    countdownElement.innerHTML = "Belum Terlaksana";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;
            }, 1000);
        });
        </script>

		<script>var hostUrl = "kegiatan/";</script>

	</body>
	<!--end::Body-->
</html>
