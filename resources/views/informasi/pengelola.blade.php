@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<main>
    {{-- content1 --}}
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative"
                        style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Pengelola Perpustakaan
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Pengelola Perpustakaan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!--
		=====================================================
			Team Section Four
		=====================================================
		-->
		<div class="team-section-four light-bg border-top pt-150 lg-pt-80 pb-100 lg-pb-40">
			<div class="container">
				<div class="position-relative">
					<div class="row">
                        @foreach ($user->where('jabatan', 'Kepala Perpustakaan') as $item)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp">
                            <div class="card-style-fifteen mb-50 lg-mb-40">
                                <div class="media d-flex align-items-center justify-content-center position-relative overflow-hidden">
                                    <img src="images/lazy.svg" data-src="{{ asset('/storage/foto/' . $item->foto) }}" alt="" class="lazy-img w-100" style="background-repeat: no-repeat; background-position: center; background-size: cover; height: 290px; max-height: 290px; width: 100%;">
                                </div>
                                <h4 class="fw-500 pt-20 m0">{{ $item->name }}</h4>
                                <div class="fs-6">{{ $item->jabatan }}</div>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($user->where('jabatan', 'Kepala Tata Usaha') as $item)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp">
                            <div class="card-style-fifteen mb-50 lg-mb-40">
                                <div class="media d-flex align-items-center justify-content-center position-relative overflow-hidden">
                                    <img src="images/lazy.svg" data-src="{{ asset('/storage/foto/' . $item->foto) }}" alt="" class="lazy-img w-100" style="background-repeat: no-repeat; background-position: center; background-size: cover; height: 290px; max-height: 290px; width: 100%;">
                                </div>
                                <h4 class="fw-500 pt-20 m0">{{ $item->name }}</h4>
                                <div class="fs-6">{{ $item->jabatan }}</div>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($user->whereNotIn('jabatan', ['Kepala Perpustakaan', 'Kepala Tata Usaha']) as $item)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp">
                            <div class="card-style-fifteen mb-50 lg-mb-40">
                                <div class="media d-flex align-items-center justify-content-center position-relative overflow-hidden">
                                    <img src="images/lazy.svg" data-src="{{ asset('/storage/foto/' . $item->foto) }}" alt="" class="lazy-img w-100" style="background-repeat: no-repeat; background-position: center; background-size: cover; height: 290px; max-height: 290px; width: 100%;">
                                </div>
                                <h4 class="fw-500 pt-20 m0">{{ $item->name }}</h4>
                                <div class="fs-6">{{ $item->jabatan }}</div>
                            </div>
                        </div>
                        @endforeach

					</div>
				</div>
			</div>
		</div>
		<!-- /.team-section-four -->

</main>

@endsection
