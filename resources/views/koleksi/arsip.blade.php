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
                        Arsip
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-70 lg-mb-40">iGLAM - Ibrahimy Gallery Library Archive & Museum</p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Arsip</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->

<!--
    =============================================
    	Product Section One
    ==============================================
    -->
    <div class="product-section-one mt-150 lg-mt-80 mb-150 lg-mb-60">
        <div class="container">
            <div class="shop-page-header d-lg-flex align-items-center justify-content-between">
                <p class="m0 md-pb-20">
                    Menampilkan
                    <span class="fw-500 text-dark">{{ $arsip->firstItem() }}–{{ $arsip->lastItem() }}</span>
                    dari
                    <span class="fw-500 text-dark">{{ $arsip->total() }}</span> hasil
                </p>
                <ul class="shop-filter-one style-none d-md-flex align-items-center">
                    <li class="me-md-3 sm-mb-10">
                        <select class="theme-select-menu">
                            <option value="Category">Category</option>
                            <option value="Mens items">Books</option>
                            <option value="Womens items">Visiting Card</option>
                            <option value="Womens items">Magazine</option>
                        </select>
                    </li>

                </ul>
            </div> <!-- /.shop-page-header -->
            <div class="products-wrapper mt-40">
                <div class="row gx-xxl-5">
                    @foreach ($arsip as $item)
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-block-one mb-60 md-mb-40">
                            <div class="img-holder style-two">
                                <a href="{{ asset('/arsip='.$item->id) }}" class="d-flex align-items-center justify-content-center h-100">
                                    <img src="assets/images/lazy.svg" data-src="{{ asset('/storage/koleksi/arsip/' . $item->gambar) }}" alt="" class="lazy-img product-img tran4s w-100" style="height: 480px; object-fit: cover;">
                                </a>
                                <a href="{{ asset('/arsip='.$item->id) }}" class="cart-button">Selengkapnya</a>
                            </div> <!-- /.img-holder -->
                            <div class="product-meta">
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <a href="{{ asset('/arsip='.$item->id) }}" class="product-title fw-bold fs-4">{{ $item->judul }}</a>
                                </div>
                                <div class="price">{{ $item->tanggal }}</div>
                            </div> <!-- /.product-meta -->
                        </div> <!-- /.product-block-two -->
                    </div>
                    @endforeach
                </div>
                <div class="pagination-one mt-30 lg-mt-10">
                    <ul class="style-none d-flex align-items-center justify-content-center">
                        {{-- Tombol "First" --}}
                        @if ($arsip->currentPage() > 1)
                            <li>
                                <a href="{{ $arsip->url(1) }}">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Tombol Angka --}}
                        @for ($i = 1; $i <= $arsip->lastPage(); $i++)
                            {{-- Tampilkan hanya sebagian angka, sisanya "..." --}}
                            @if ($i == 1 || $i == $arsip->lastPage() || ($i >= $arsip->currentPage() - 1 && $i <= $arsip->currentPage() + 1))
                                <li>
                                    <a href="{{ $arsip->url($i) }}" class="{{ $arsip->currentPage() == $i ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @elseif ($i == 2 && $arsip->currentPage() > 4)
                                <li>...</li>
                            @elseif ($i == $arsip->lastPage() - 1 && $arsip->currentPage() < $arsip->lastPage() - 3)
                                <li>...</li>
                            @endif
                        @endfor

                        {{-- Tombol "Last" --}}
                        @if ($arsip->currentPage() < $arsip->lastPage())
                            <li>
                                <a href="{{ $arsip->url($arsip->lastPage()) }}">
                                    Akhir <i class="bi bi-arrow-right"></i>
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
                <!-- /.pagination-one -->
            </div> <!-- /.products-wrapper -->
        </div>
    </div> <!-- /.product-section-one -->



@endsection
