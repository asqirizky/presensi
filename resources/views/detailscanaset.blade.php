<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Aset Perpustakaan Ibrahimy</title>
		<meta charset="utf-8" />
		<meta name="description" content="Kegiatan bulanan perpustakaan ibrahimy akan ditampilkan di sini" />
		<meta name="keywords" content="Kegiatan bulanan perpustakaan ibrahimy akan ditampilkan di sini" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Kegiatan - Perpustakaan Ibrahimy" />
		<meta property="og:url" content="https://www.lib.ibrahimy.ac.id" />
		<meta property="og:site_name" content="Kegiatan Perpustakaan Ibrahimy" />
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
                                    <h1 class="text-white fs-2 fw-bold text-center mt-3">Detail Aset Perpustakaan Ibrahimy</h1>
                                    <label class="badge py-4 px-8 fs-2 badge-light text-primary mt-2 mb-12" id="clock">Loading...</label>
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Brand-->
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto">
                                        <!--begin::Card-->
                                        <div class="card mb-8">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <div class="fs-4 fw-bold text-center mb-3">Foto Barang</div>
                                                <!--begin::Summary-->
                                                <div class="d-flex flex-center flex-column">
                                                    <a href={{ asset('storage/fotobarang/'.$unit->foto.'') }} target="_blank">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-200px symbol">
                                                            <img src="{{ asset('storage/fotobarang/'.$unit->foto.'') }}" alt="image">
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </a>
                                                    <!--begin::Name-->
                                                </div>
                                                <!--end::Summary-->
                                                <!--end::Details content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                        <!--begin::Card-->
                                        <div class="card mb-8">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <div class="fs-4 fw-bold text-center mb-3">Kwitansi</div>
                                                <!--begin::Summary-->
                                                <div class="d-flex flex-center flex-column">
                                                    <a href={{ asset('storage/kwitansi/'.$unit->kwitansi.'') }} target="_blank">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-200px symbol">
                                                            <img src="{{ asset('storage/kwitansi/'.$unit->kwitansi.'') }}" alt="image">
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </a>
                                                    <!--begin::Name-->
                                                </div>
                                                <!--end::Summary-->
                                                <!--end::Details content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->

                                    </div>
                                    <!--end::Sidebar-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-xl-8">
                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header">
                                                        <!--begin::Card title-->
                                                        <div class="card-title flex-column">
                                                            <h3 class="fw-bold mb-1">{{ $unit->aset->nama }}</h3>
                                                            <div class="fs-6 fw-semibold text-gray-500">Aset Perpustakaan Ibrahimy</div>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body p-9">
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">No. Inventaris</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6">
                                                                <span class="fw-bold fs-6 text-gray-800">{{ $unit->aset->kategori->kode.'/'. Carbon\Carbon::parse($unit->tanggal)->isoFormat('DD.MM.YY').'/'.$unit->sumber->kode.'/'.str_pad($unit->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$unit->kode_unit }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Nama Barang</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6">
                                                                <span class="fw-bold fs-6 text-gray-800">{{ $unit->aset->nama }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Nomor Bukti</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                @if($unit->nb == null)
                                                                <span class="fw-semibold text-gray-800 fs-6">-</span>
                                                                @else
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $unit->nb }}</span>
                                                                @endif
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Volume</label>
                                                            <!--end::Label-->
                                                            @php
                                                                $jumlah = App\Models\Aset\Aset_unit::where('aset_id', $unit->aset_id)->count();
                                                            @endphp
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $jumlah }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Harga Barang</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">Rp {{ number_format($unit->harga, 0, ',', '.') }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Kondisi Barang</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $unit->kondisi }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Tanggal Pembelian</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ Carbon\Carbon::parse($unit->tanggal)->isoFormat('D MMMM Y') }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Kategori Barang</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $unit->aset->kategori->kategori }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Sumber Dana</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $unit->sumber->sumberdana }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--end::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-6 fw-semibold text-muted">Lokasi Barang</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <span class="fw-semibold text-gray-800 fs-6">{{ $unit->lokasi->lokasi }}</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->

                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end:::Tab pane-->
                                        </div>
                                        <!--end:::Tab content-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Layout-->
                            </div>
                            <!--end::Content container-->

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

	</body>
	<!--end::Body-->
</html>
