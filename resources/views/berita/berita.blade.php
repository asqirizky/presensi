@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/berita.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Berita Perpustakaan
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Berita Perpustakaan</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->
    <!--
    <!--
		=====================================================
			Blog Section Two
		=====================================================
		-->
		<div class="blog-section-two position-relative mt-150 lg-mt-80 mb-150 lg-mb-80">
			<div class="container">
				<div class="position-relative">
					<div class="row gx-xxl-5">
                        @foreach ($berita as $item)
                        <div class="col-md-6">
							<article class="blog-meta-two mb-80 lg-mb-50 wow fadeInUp">
								<figure class="post-img rounded-5 position-relative d-flex align-items-end m0" style="
                                background: url('{{ asset('storage/gambar/' . $item->gambar) }}') no-repeat center;
                                background-size: cover;
                                height: 399px;
                                max-height: 399px;
                                width: 100%;">
									<a href="{{ asset('/berita-'.$item->slug.'') }}" class="stretched-link rounded-5 date tran3s">{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</a>
								</figure>
								<div class="post-data">
									<div class="d-flex justify-content-between align-items-center flex-wrap">
										<a href="{{ asset('/berita-'.$item->slug.'') }}" class="blog-title"><h4 style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->judul }}</h4></a>
										<a href="{{ asset('/berita-'.$item->slug.'') }}" class="round-btn rounded-circle d-flex align-items-center justify-content-center tran3s"><i class="bi bi-arrow-up-right"></i></a>
									</div>
									<div class="post-info">{{ $item->penulis }}</div>
								</div>
							</article>
							<!-- /.blog-meta-two -->
						</div>
                        @endforeach

					</div>

                    <div class="pagination-one mt-20">
                        <ul class="style-none d-flex align-items-center justify-content-center">
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">Last <i class="bi bi-arrow-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /.pagination-one -->
				</div>
			</div>
		</div>
		<!-- /.blog-section-two -->
</main>


@endsection
