@extends('layout.headerfooter')
@section('konten')

<style>
    .url{
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    h3{

    }
</style>

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
                    <li><a href="/berita">Berita</a></li>
                    <li>/</li>
                    <li>{{ Str::words($berita->judul, 3, '...') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--blog-details-->
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
                            <figure class="post-img position-relative d-flex align-items-end m0" style="background-image: url({{ asset('/storage/gambar/' . $berita->gambar) }});">
                                <div class="date">{{ Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</div>
                            </figure>
                            <div class="post-data">
                                <div class="post-info">{{ $berita->penulis }} </div>
                                <div class="blog-title"><h4>{{ $berita->judul }}</h4></div>
                                <div class="post-details-meta">
                                    {!! $berita->isi !!}
                                </div>
                                <!-- /.post-details-meta -->
                                <div class="bottom-widget d-sm-flex align-items-center justify-content-between">
                                    <ul class="d-flex share-icon align-items-center style-none pt-20">
                                        <li>Bagikan:</li>
                                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.post-data -->
                        </article>

                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="blog-sidebar md-mt-80 ps-xxl-4">
                            <form action="#" class="sidebar-search">
                                <input type="text" placeholder="Cari..">
                                <button class="tran3s"><i class="bi bi-search"></i></button>
                            </form>
                            <!-- /.blog-category -->
                            <div class="blog-recent-news mt-60 lg-mt-40">
                                <h3 class="sidebar-title">Berita Terkini</h3>
                                @foreach ($list as $item)
                                <article class="recent-news">
                                    <figure class="post-img" style="background-image: url({{ asset('/storage/gambar/' . $item->gambar) }});">
                                    </figure>
                                    <div class="post-data">
                                        <div class="date">{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</div>
                                        <a href="{{ asset('/berita-'.$item->slug.'') }}" class="blog-title"><h3 style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->judul }}</h3></a>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                            <!-- /.blog-recent-news -->
                            <!-- /.blog-keyword -->
							<div class="contact-banner text-center mt-50 lg-mt-30">
								<h3 class="mb-20">Ada Pertanyaan? <br>Tanya Pustakawan</h3>
								<a href="https://wa.me/6285117351997" class="tran3s fw-500">Tanya</a>
							</div>
							<!-- /.contact-banner -->
                        </div>
                        <!-- /.blog-sidebar -->
                    </div>
                </div>
			</div>
		</div>
		<!-- /.blog-details -->

@endsection
