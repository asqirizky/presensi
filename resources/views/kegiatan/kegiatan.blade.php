@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                    Kegiatan Perpustakaan
                </h1>
            </div>
            <div class="col-xl-4 col-lg-5 ms-auto">
                {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                <ul class="style-none d-inline-flex pager">
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Kegiatan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@php
    $hari = Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
    $bulan = Carbon\Carbon::now()->isoFormat('MMMM Y');
@endphp
<!--
		=============================================
			BLock Feature Twelve
		==============================================
		-->
		<div class="block-feature-twelve position-relative pt-130 lg-pt-80 pb-180 lg-pb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-11">
						<div class="title-one mb-40 lg-mb-20">
							<h2 class="color-deep">Kegiatan bulan {{ $bulan }}.</h2>
						</div>
						<!-- /.title-one -->
					</div>
				</div>
				<div class="row gx-xl-5">
                    @foreach ($kegiatan as $list)
                    @if(request()->is('kegiatan='.$list->slug.''))
                    @if($list->slug == ''.$list->slug.'')
					<div class="col-lg-12 mt-40 md-mt-20">
						<div class="card-style-nineteen">
							<div class="row">
								<div class="col-lg-7">
									<h3 class="color-deep fw-bold mt-20">{{ $list->kegiatan }}</h3>
									<p class="text-md mb-35">Kegiatan <span class="fw-bold">{{ $list->kategori }}</span> Perpustakaan Ibrahimy.</p>
									<div class="btn-seven d-inline-flex align-items-center">
										<span class="text">Hitung mundur</span>
										<div class="icon tran3s rounded-circle d-flex align-items-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_27.svg" alt="" class="lazy-img"></i></div>
                                    </div>
								</div>
								<div class="col-lg-4 ms-auto">
									<div class="counter-block-one md-mt-40">
                                        <h3 class="color-deep fw-bold mt-20">{{ Carbon\Carbon::parse($list->tanggal)->isoFormat('dddd, D MMMM Y') }}</h3>
										<p class="m0">{{ Carbon\Carbon::parse($list->tanggal)->diffForHumans() }}</p>
									</div>
									<div class="counter-block-one mt-60 md-mt-20">
                                        <h4 class="color-deep fw-bold mt-20"  id="countdown-{{ $list->id }}">Loading countdown...</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <script>
                        const eventTime{{ $list->id }} = new Date("{{ \Carbon\Carbon::parse($list->tanggal)->format('Y-m-d H:i:s') }}").getTime();

                        setInterval(function () {
                            const now = new Date().getTime();
                            const distance = eventTime{{ $list->id }} - now;

                            if (distance < 0) {
                                document.getElementById("countdown-{{ $list->id }}").innerText = "Acara sudah dimulai!";
                                return;
                            }

                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            document.getElementById("countdown-{{ $list->id }}").innerText =
                                `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
                        }, 1000);
                    </script>
                    @endif
                    @endif
                    @endforeach
				</div>

			</div>
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_45.svg" alt="" class="lazy-img shapes shape_01">
		</div>
		<!-- /.block-feature-twelve -->

@endsection
