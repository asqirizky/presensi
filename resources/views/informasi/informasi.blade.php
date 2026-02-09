@extends('layout.headerfooter')
@section('konten')
<main>


<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-heading d-inline-block position-relative"
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                    Informasi Layanan
                </h1>
            </div>
            <div class="col-xl-4 col-lg-5 ms-auto">
                {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                <ul class="style-none d-inline-flex pager">
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Informasi Layanan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="contact-us-section pt-150 lg-pt-80">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="address-block-one text-center mb-40 wow fadeInUp">
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="assets/images/icon/icon_90.svg" alt="" class="lazy-img"></div>
                                <h5 class="title">Alamat Pusat</h5>
                                <p>Jalan KHR Syamsul Arifin Sukorejo, Sumberejo, Banyuputih, Sukorejo, Sumberejo, Kec. Banyuputih, Kabupaten Situbondo, Jawa Timur 68374</p>
                            </div> <!-- /.address-block-one -->
                        </div>
                        <div class="col-md-6">
                            <div class="address-block-one text-center mb-40 wow fadeInUp">
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="assets/images/icon/icon_91.svg" alt="" class="lazy-img"></div>
                                <h5 class="title">Kontak </h5>
                                <p>Whatapps<br><a href="https://wa.me/6285117351997" target="_blank" class="call text-lg fw-500">+6285117351997</a></p>
                            </div> <!-- /.address-block-one -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-details position-relative mt-150 lg-mt-80 mb-150 lg-mb-80">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-12">
                    <article class="blog-meta-two style-two">
                        <div class="post-data">
                            <div class="blog-title"><h4>Koleksi</h4></div>
                            <p>Kami mempunya berbagai koleksi di Perpustakaan Ibrahimy, mulaia dari monograf dan serial, baik berupa fiksi dan non-fiksi, dalam bentuk cetak dan digital. Kami juga mengumpulkan terbitan berseri harian seperti surat kabar dan juga terbitan berseri bulanan seperti majalah. Kami juga menyajikan koleksi secara online dalam bentuk E-Journal Resource Guide dan Repository.</p>
                            <div class="blog-title"><h4>Keanggotaan</h4></div>
                            <p>Pemustaka dapat memperoleh hak akses koleksi Perpustakaan jika telah menjadi anggota Perpustakaan Ibrahimy. Pemustaka dapat mendaftarkan diri sebagai anggota Perpustakaan dengan cara mendatangi Perpustakaan Ibrahimy.</p>
                            <div class="blog-title"><h4>Kerja Sama</h4></div>
                            <p>Prosedur kerja sama Perpustakaan Ibrahimy dimulai dengan menentukan kebutuhan dan memilih mitra yang sesuai. Setelah proposal disusun dan diajukan, diadakan pertemuan untuk mencapai kesepakatan, yang diikuti dengan penandatanganan MoU atau kontrak. Selengkapnya dapat dilihat disini.</p>
                            <!-- /.post-details-meta -->
                        </div>
                        <!-- /.post-data -->
                    </article>
                    <!-- /.blog-meta-two -->
                </div>
            </div>
        </div>
    </div>

	<div class="faq-section-two position-relative mt-180 lg-mt-100 pb-150 lg-pb-80">
		<div class="container">
			<div class="position-relative">
				<div class="title-one mb-40">
					<h2>Jam Layanan</h2>
					<p class="text-lg pt-15 lg-pt-10">Perpustakaan Ibrahimy</p>
				</div>
				<!-- /.title-one -->
				<div class="row">
					<div class="col-12">
						<div class="accordion accordion-style-two mt-15" id="accordionOne">
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										Perpustakaan Pusat
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<div class="row">
											<div class="col-lg-6">
												<h6>Lokasi</h6>
												<p class="mb-50">L:II Masjid Jami' Ibrahimy, PP. Salafiyah Syafi'iyah Sukorejo Situbondo</p>
												<h6>Sabtu-Rabu</h6>
												<ul class="style-none pt-20 pb-30">
													<li>13.00 - 16.30</li>
													<li>20.00 - 23.00</li>
												</ul>
												<h6>Kamis</h6>
												<ul class="style-none pt-20 pb-30">
													<li>13.00 - 16.30</li>
												</ul>
												<h6>Jum'at</h6>
												<ul class="style-none pt-20 pb-30">
													<li>20.30 - 22.00</li>
												</ul>
											</div>
											<div class="col-lg-6 d-flex">
												<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(assets/images/media/img_01.jpg);">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Perpustakaan Putri
									</button>
								</h2>
								<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<div class="row">
											<div class="col-lg-6">
												<h6>Lokasi</h6>
												<p class="mb-50">Area Pondok Putri Pusat, PP. Salafiyah Syafi'iyah Sukorejo Situbondo</p>
												<h6>Sabtu-Rabu</h6>
												<ul class="style-none pt-20 pb-30">
													<li>13.00 - 16.30</li>
													<li>20.00 - 23.00</li>
												</ul>
												<h6>Kamis</h6>
												<ul class="style-none pt-20 pb-30">
													<li>13.00 - 16.30</li>
												</ul>
												<h6>Jum'at</h6>
												<ul class="style-none pt-20 pb-30">
													<li>20.30 - 22.00</li>
												</ul>
											</div>
											<div class="col-lg-6 d-flex">
												<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(assets/images/media/img_02.jpg);">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
										Perpustakaan FIK Ibrahimy
									</button>
								</h2>
								<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<div class="row">
											<div class="col-lg-6">
												<h6>Lokasi</h6>
												<p class="mb-50">Gedung Fakultas Ilmu Kesehatan Area Kampus Putri, PP. Salafiyah Syafi'iyah Sukorejo Situbondo</p>
												<h6>Sabtu-Kamis</h6>
												<ul class="style-none pt-20 pb-30">
													<li>08.00 - 16.30</li>
												</ul>
											</div>
											<div class="col-lg-6 d-flex">
												<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(assets/images/media/img_03.jpg);">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.accordion-style-two -->
					</div>
				</div>
				<!-- <div class="section-btn sm-mt-40">
					<a href="project-v2.html" class="btn-nine rounded-circle d-inline-flex align-items-center justify-content-center tran3s"><i class="bi bi-arrow-up-right"></i></a>
				</div> -->
			</div>
		</div>
		<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_01">
		<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_02">
	</div>
	<!-- /.faq-section-two -->
    <div class="map-banner mt-120 lg-mt-80">
        <div class="gmap_canvas h-100 w-100">
            <iframe class="gmap_iframe h-100 w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6537.462334335621!2d114.27109407677607!3d-7.75126299226757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd129da89e6a201%3A0x9eb7ab98c1b9390e!2sPerpustakaan%20Universitas%20Ibrahimy!5e1!3m2!1sid!2sid!4v1745398261014!5m2!1sid!2sid"></iframe>
        </div>
    </div>
</div>
<!-- ./contact-us-section -->

</main>


@endsection
