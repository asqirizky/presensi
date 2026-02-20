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
<base href="../../" />
        <title>Verifikasi - Surat Perpustakaan Ibrahimy</title>
        <meta charset="utf-8" />
        <meta name="description" content="Verifikasi Surat Perpustakaan Ibrahimy hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
        <meta name="keywords" content="Verifikasi Surat Perpustakaan Ibrahimy hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Verifikasi Surat - Perpustakaan Ibrahimy" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="http://preview.keenthemes.comauthentication/general/welcome.html" />
		<link rel="shortcut icon" href="admin/assets/media/logos/logo perpus icon.png" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
    @php
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];
        $tanggal = \Carbon\Carbon::parse($surat->created_at);
    @endphp
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('admin/assets/media/auth/bg8.jpg'); } [data-bs-theme="dark"] body { background-image: url('admin/assets/media/auth/bg8-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<div class="card card-flush w-md-650px py-5">
                        @if($surat->verifikasi == "Terverifikasi")
                        <div class="card-body py-15 py-lg-20">
                            <!--begin::Logo-->
                            <div class="mb-7">
                                <div class="">
                                    <img alt="Logo" src="admin/assets/media/logos/logo perpus.png" class="h-80px" />
                                </div>
                            </div>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <div class="mb-7 text-center">
                                <div style="display: inline-block;">
                                    {!! DNS2D::getBarcodeHTML("www.lib.ibrahimy.ac.id/verifikasi=$surat->id", 'QRCODE', 5, 5) !!}
                                </div>
                            </div>
                            <h1 class="fw-bolder text-gray-900 mb-5">Terverifikasi</h1>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-semibold fs-6 text-gray-500 mb-7">Anda telah menverifikasi Surat {{ $surat->namasurat }} Perpustakaan Ibrahimy dengan nomor surat {{ '0828/'.str_pad($surat->id, 2, '0', STR_PAD_LEFT).'/' . \Illuminate\Support\Str::before($surat->kategori, '-') . '/' . Carbon\Carbon::parse($surat->created_at)->isoFormat('DD.MM.YY').'/071.095/'.$bulanRomawi[(int)$tanggal->format('m')].'/'.Carbon\Carbon::parse($surat->created_at)->isoFormat('Y') }}.</div>
                            <!--end::Text-->
                            <!--begin::Illustration-->
                            {{-- <div class="mb-0">
                                <img src="admin/assets/media/auth/welcome.png" class="mw-100 mh-300px theme-light-show" alt="" />
                                <img src="admin/assets/media/auth/welcome-dark.png" class="mw-100 mh-300px theme-dark-show" alt="" />
                            </div> --}}
                            <!--end::Illustration-->
                            <!--begin::Link-->
                            <!--end::Link-->
                        </div>
                        @else
                        <div class="card-body py-15 py-lg-20">
                            <form method="POST" enctype="multipart/form-data" action="{{ asset('verifikasisurat/'.$surat->id.'') }}">
                                @csrf
                                <!--begin::Logo-->
                                <input type="radio" class="btn-check" name="verifikasi" value="Terverifikasi" checked>
                                <div class="mb-7">
                                    <a href="index.html" class="">
                                        <img alt="Logo" src="admin/assets/media/logos/logo perpus.png" class="h-80px" />
                                    </a>
                                </div>
                                <!--end::Logo-->
                                <!--begin::Title-->
                                <h1 class="fw-bolder text-gray-900 mb-5">Verifikasi Surat Perpustakaan Ibrahimy</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-semibold fs-6 text-gray-500 mb-7">Surat {{ $surat->namasurat }} dengan nomor surat {{ '0828/'.str_pad($surat->id, 2, '0', STR_PAD_LEFT).'/' . \Illuminate\Support\Str::before($surat->kategori, '-') . '/' . '18.05.97' .'/071.095/'.$bulanRomawi[(int)$tanggal->format('m')].'/'.Carbon\Carbon::parse($surat->created_at)->isoFormat('Y') }} Perpustakaan Ibrahimy saat ini sedang menunggu verifikasi tanda tangan elektronik anda.</div>
                                <!--end::Text-->
                                <!--begin::Illustration-->
                                {{-- <div class="mb-0">
                                    <img src="admin/assets/media/auth/welcome.png" class="mw-100 mh-300px theme-light-show" alt="" />
                                    <img src="admin/assets/media/auth/welcome-dark.png" class="mw-100 mh-300px theme-dark-show" alt="" />
                                </div> --}}
                                <!--end::Illustration-->
                                <!--begin::Link-->
                                <div class="mb-0">
                                    {{-- <a href="{{ asset('surat='.$surat->id.'') }}" class="btn btn-sm btn-light-warning me-2">Lihat Surat</a> --}}
                                    <button type="submit" class="btn btn-sm btn-primary">Verifikasi</button>
                                </div>
                                <!--end::Link-->
                            </form>
						</div>
                        @endif
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
		<script src="admin/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
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
