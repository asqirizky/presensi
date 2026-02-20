@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Statistik Layanan
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Statistik Layanan</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->
    <div class="error-page text-center d-flex align-items-center justify-content-center flex-column light-bg position-relative">
        <h1 class="font-magnita">404</h1>
        <h2 class="fw-bold">Halaman tidak ditemukan</h2>
        <p class="text-lg mb-45">Halaman masih dalam perbaikan</p>
        <div><a href="/" class="btn-four">Kembali</a></div>
        <img src="images/lazy.svg" data-src="images/assets/ils_05.svg" alt="" class="lazy-img shapes shape_01">
        <img src="images/lazy.svg" data-src="images/assets/ils_06.svg" alt="" class="lazy-img shapes shape_02">
    </div>
    <!-- /.error-page -->




@endsection
