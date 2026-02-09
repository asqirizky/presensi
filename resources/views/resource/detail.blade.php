@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/resourceguide.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Resource Guide
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li><a href="/resourceguide">ResourceGuide</a></li>
                        <li>/</li>
                        <li>{{ $resource->prodi }}</li>
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

    <style>
        [data-resource] a {
        text-decoration: none; /* Hilangkan garis bawah default */
        color: #007bff; /* Warna mengikuti elemen induk */
        }

        [data-resource] a:hover {
        text-decoration: underline; /* Tambahkan garis bawah saat hover */
        color: blue; /* Warna biru saat hover */
        }
    </style>

	<div class="blog-details position-relative mt-150 lg-mt-80 mb-150 lg-mb-80">
		<div class="container">
			<div class="row gx-xl-5">
                <div class="col-lg-12">
                    <article class="blog-meta-two style-two">
                        <div class="post-data">
                            <div class="blog-title"><h3 class="fw-bold">Resource Guide Prodi {{ $resource->prodi }}</h3></div>
                            <div class="post-details-meta" data-resource>
                                {!! $resource->resource !!}
                            </div>
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
