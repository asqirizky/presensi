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
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/administrasi.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Prosedur Kerja Sama
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Prosedur Kerja Sama</li>
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
                <div class="col-lg-12">
                    <article class="blog-meta-two style-two">
                        <div class="post-data">
                            <div class="blog-title"><h3>Prosedur Kerja Sama Perpustakaan Ibrahimy</h3></div>
                            <p>Prosedur kerja sama Perpustakaan Ibrahimy dimulai dengan identifikasi kebutuhan dengan calon mitra. Setelah menyusun proposal kerja sama, Perpustakaan mengajukan dan mengatur pertemuan untuk membahas kesepakatan, yang dilanjutkan dengan penyusunan dan pendatanganan MoU atau kontrak.</p>
                            <!-- /.post-details-meta -->
                        </div>
                        <!-- /.post-data -->
                    </article>
                    <!-- /.blog-meta-two -->
                </div>
            </div>
		</div>
	</div>
	<!-- /.blog-details -->




</main>

@endsection
