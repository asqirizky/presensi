@extends('layout.headerfooter')
@section('konten')

<!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/koleksi.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Museum
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-70 lg-mb-40">iGLAM - Ibrahimy Gallery Library Archive & Museum</p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li><a href="/museum">Museum</a></li>
                        <li>/</li>
                        <li>{{ Str::words($museum->judul, 3, '...') }}</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->
		<!--
		=============================================
			Product Details One
		==============================================
		-->
		<div class="product-details-one mt-150 lg-mt-80 mb-150 lg-mb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 order-lg-2">
						<div class="tab-content product-img-tab-content h-100">
							<div class="tab-pane fade show active h-100" id="img1" role="tabpanel">
								<a class="fancybox w-100 h-100 d-flex align-items-center justify-content-center" data-fancybox="" href="{{ asset('/storage/koleksi/museum/' . $museum->gambar) }}" tabindex="-1">
									<img src="assets/images/lazy.svg" data-src="{{ asset('/storage/koleksi/museum/' . $museum->gambar) }}" alt="" class="lazy-img">
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 order-lg-3">
						<div class="product-info ps-xxl-5 md-mt-40">
							<div class="stock-tag">Museum</div>
							<h2 class="product-name fw-bold">{{ $museum->judul }}</h2>
							<div class="row mt-40">
								<div class="col-xl-6">
									<h5>Tipe</h5>
								</div>
								<div class="col-xl-6">
                                    <h5 class="fw-bold">: @if($museum->tipe == null) Belum diketahui @else {{ $museum->tipe }} @endif</h5>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-xl-6">
									<h5>Pembuat</h5>
								</div>
								<div class="col-xl-6">
                                    <h5 class="fw-bold">:
                                        @if($museum->pembuat == null) Belum diketahui @else {{ $museum->pembuat }} @endif
                                    </h5>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-xl-6">
									<h5>Tanggal dibuat</h5>
								</div>
								<div class="col-xl-6">
                                    <h5 class="fw-bold">:
                                        @if($museum->tanggal == null) Belum diketahui @else
                                        {{ Carbon\Carbon::parse($museum->tanggal)->isoFormat('D MMMM Y') }}
                                        @endif
                                    </h5>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-xl-6">
									<h5>Tanggal publikasi</h5>
								</div>
								<div class="col-xl-6">
                                    <h5 class="fw-bold">: {{ Carbon\Carbon::parse($museum->created_at)->isoFormat('D MMMM Y') }}</h5>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-xl-6">
									<h5>Lembaga Penanggung Jawab</h5>
								</div>
								<div class="col-xl-6">
                                    <h5 class="fw-bold">: @if($museum->lembaga == null) Belum diketahui @else {{ $museum->lembaga }} @endif</h5>
								</div>
							</div>
						</div> <!-- /.product-info -->
					</div>
				</div>

				<div class="product-review-tab mt-30 mb-140 lg-mt-100">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#item1" type="button"
								role="tab" aria-selected="true">Deskripsi</button>
						</li>
						{{-- <li class="nav-item">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#item2" type="button" role="tab"
								aria-selected="false">Technical Info</button>
						</li> --}}
					</ul>
					<div class="tab-content mt-30 lg-mt-20">
						<div class="tab-pane fade show active" id="item1" role="tabpanel">
                            @if($museum->deskripsi == null)
                            <p>Belum ada Deskripsi/keterangan</p>
                            @else
                            {!! $museum->deskripsi !!}
                            @endif
						</div>
					</div>
				</div> <!-- /.product-review-tab -->
			</div>
		</div> <!-- /.product-details-one -->


@endsection
