@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/img_32.jpg);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Visi Misi
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Visi Misi</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->
    <!--
		=====================================================
			Blog Details
		=====================================================
		-->
		<div class="blog-details position-relative mt-150 lg-mt-80 mb-150 lg-mb-80">
			<div class="container">
				<div class="row gx-xl-5">
                    <div class="col-lg-8">
                        <article class="blog-meta-two style-two">
                            <div class="post-data">
                                <div class="post-details-meta">
                                    <h3>Visi</h3>
                                    <ul class="style-none list-item">
                                        <p>Memperkuat terwujudnya visi Universitas Dengan Profesionalisme, Layanan Inofasi, dan Koleksi Islam Serta Sain Yang Unggul.</p>
                                    </ul>
                                    <h3>Misi</h3>
                                    <ul class="style-none list-item">
                                        <li>Mendorong budaya belajar mahasiswa sepanjang hayat, penelitian dan pengabdian kepada masyarakat</li>
                                        <li>Memperkaya pengalaman belajar mahasiswa  dan menfasilitasi penelitian di semua ditingkatan.</li>
                                        <li>Melibatkan komonitas diseluruh layanan,koleksi, dan teknologi pendidikan yang inovatif.</li>
                                        <li>Menginvestasikan staf, koleksi, dan perpustakaan fisik dan  digital,  serta bermitra dari dalam maupun luar Universitas.</li>
                                    </ul>
                                </div>
                                <!-- /.post-details-meta -->

                            </div>
                            <!-- /.post-data -->
                        </article>
                        <!-- /.blog-meta-two -->
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="blog-sidebar md-mt-80 ps-xxl-4">
                            <div class="blog-recent-news lg-mt-40">
                                <article class="recent-news">
                                    <figure class="post-img" style="background-image: url(assets/images/media/img_10.jpg);
                                    background-size: cover;
                                    height: 600px;
                                    max-height: 600px;
                                    width: 100%;"">
                                    </figure>
                                </article>
                            </div>
                            <!-- /.blog-recent-news -->
                        </div>
                        <!-- /.blog-sidebar -->
                    </div>
                </div>
			</div>
		</div>
		<!-- /.blog-details -->


</main>


@endsection
