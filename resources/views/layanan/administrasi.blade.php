@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<main>
    {{-- content1 --}}
    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/layanan.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Layanan Administrasi
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Layanan Administrasi</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->
<!--
		=============================================
			BLock Feature Six
		==============================================
		-->
		<div class="block-feature-six bg-two position-relative pt-150 lg-pt-60 pb-120 lg-pb-40">
			<div class="container">
				<div class="row gx-lg-5">
					<div class="col-lg-4 wow fadeInLeft">
						<div class="title-one">
							<h2>Layanan Administrasi</h2>
						</div>
						<!-- /.title-one -->
                        <p class="text-lg text-dark mt-40 md-mt-20 mb-35 md-mb-30">Beberapa layanan Administrasi Perpustakaan Ibrahimy.</p>
                        <a href="https://wa.me/6285117351997" class="btn-eleven d-inline-flex align-items-center md-mb-60">
							<span class="text">Tanya Pustakawan</span>
							<div class="icon tran3s rounded-circle d-flex align-items-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_27.svg" alt="" class="lazy-img"></i></div>
						</a>
					</div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 d-flex wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card-style-eight rounded-5 vstack tran3s w-100 mb-30 active">
                                    {{-- <div class="icon d-flex align-items-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_69.svg" alt="" class="lazy-img"></div> --}}
                                    <h4 class="fw-bold mt-30 mb-20">Layanan Bebas Pustaka</h4>
                                    <p>Layanan untuk memastikan mahasiswa atau pegawai bebas dari tanggungan pinjaman buku perpustakaan.</p>
									<a href="https://wa.me/6285117351997" class="stretched-link"></a>
                                </div>
                                <!-- /.card-style-eight -->
                            </div>
                            <div class="col-md-6 d-flex wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card-style-eight rounded-5 vstack tran3s w-100 mb-30 active">
                                    {{-- <div class="icon d-flex align-items-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_69.svg" alt="" class="lazy-img"></div> --}}
                                    <h4 class="fw-bold mt-30 mb-20">Layanan Cek Plagiasi</h4>
                                    <p>Layanan untuk memeriksa kemiripan karya tulis guna mendeteksi indikasi plagiasi.</p>
									<a href="https://wa.me/6285117351997" class="stretched-link"></a>
                                </div>
                                <!-- /.card-style-eight -->
                            </div>
                            <div class="col-md-6 d-flex wow fadeInUp" data-wow-delay="0.2s">
                                <div class="card-style-eight rounded-5 vstack tran3s w-100 mb-30">
                                    {{-- <div class="icon d-flex align-items-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_70.svg" alt="" class="lazy-img"></div> --}}
                                    <h4 class="fw-bold mt-30 mb-20">Layanan Kartu Anggota</h4>
                                    <p>Layanan pembuatan dan pengelolaan kartu keanggotaan untuk akses layanan perpustakaan.</p>
									<a href="https://wa.me/6285117351997" class="stretched-link"></a>
                                </div>
                                <!-- /.card-style-eight -->
                            </div>
                            <div class="col-md-6 d-flex wow fadeInUp" data-wow-delay="0.3s">
                                <div class="card-style-eight rounded-5 vstack tran3s w-100 mb-30">
                                    {{-- <div class="icon d-flex align-items-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_71.svg" alt="" class="lazy-img"></div> --}}
                                    <h4 class="fw-bold mt-30 mb-20">Layanan Usulan Buku</h4>
                                    <p>Layanan untuk mengusulkan buku baru yang dibutuhkan agar tersedia di perpustakaan.</p>
									<a href="https://wa.me/6285117351997" class="stretched-link"></a>
                                </div>
                                <!-- /.card-style-eight -->
                            </div>
                        </div>
                    </div>
				</div>

			</div>
			<img src="images/lazy.svg" data-src="images/shape/shape_11.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="images/shape/shape_12.svg" alt="" class="lazy-img shapes shape_02">
		</div>
		<!-- /.block-feature-six -->


</main>

@endsection
