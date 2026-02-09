@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/buletin.png);">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                    Buletin Pustakaloka
                </h1>
            </div>
            <div class="col-xl-4 col-lg-5 ms-auto">
                {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                <ul class="style-none d-inline-flex pager">
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Buletin Pustakaloka</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--
		=============================================
			BLock Feature Twelve
		==============================================
		-->
		<div class="block-feature-twelve position-relative pt-130 lg-pt-80 pb-180 lg-pb-80">
			<div class="container">
				<div class="row gx-xl-5">
                    @foreach ($buletin as $item)
					<div class="col-lg-12 mt-40 md-mt-20">
						<div class="card-style-nineteen">
							<div class="row">
								<div class="col-lg-7">
									<h3 class="color-deep fw-bold mt-20">Buletin Pustakaloka Edisi {{ $item->edisi }}</h3>
									<p class="text">Perpustakaan Ibrahimy</p>
                                    <a href="{{ asset('/storage/buletin/' . $item->file) }}" target="_blank" class="btn-seven d-inline-flex align-items-center">
                                        <span class="text">Baca</span>
                                        <div class="icon tran3s rounded-circle d-flex align-items-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_27.svg" alt="" class="lazy-img"></i></div>
                                    </a>
								</div>
								<div class="col-lg-4 ms-auto">
									<div class="counter-block-one mt-40 text-end">
                                        <div class="counter-block-one md-mt-40">
                                            <h3 class="color-deep fw-bold mt-20">{{ Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</h3>
                                            <p class="m0">{{ Carbon\Carbon::parse($item->tanggal)->diffForHumans() }}</p>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>

			</div>
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_45.svg" alt="" class="lazy-img shapes shape_01">
		</div>
		<!-- /.block-feature-twelve -->

@endsection
