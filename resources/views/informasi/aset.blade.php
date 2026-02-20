@extends('layout.headerfooter')
@section('konten')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    @media (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        th, td {
            width: 100%;
            box-sizing: border-box;
        }
        th {
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
        }
    }
</style>

<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-heading d-inline-block position-relative"
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                    Aset
                </h1>

            </div>
            <div class="col-xl-4 col-lg-5 ms-auto">
                {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                <ul class="style-none d-inline-flex pager">
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Aset</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--
=============================================
	Text Feature Two
==============================================
-->
<div class="text-feature-two position-relative pt-110 lg-pt-80 pb-110 lg-pb-80">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-7">
				<div class="title-one">
					<h2 class="text-white">Statistik Aset Perpustakaan Ibrahimy</h2>
				</div>
				<!-- /.title-one -->
			</div>
			<div class="col-lg-5 ms-auto">
				<p class="m0 text-md text-white md-pt-10">Statistik aset perpustakaan digunakan untuk evaluasi, perencanaan, pelaporan, akuntabilitas, dan pengambilan keputusan strategis.</p>
			</div>
		</div>
		<div class="row gx-0 mt-50 lg-mt-20 md-mt-10">
			<div class="col-lg-3">
				<div class="card-style-five text-center mt-60">
					<div class="icon d-flex align-content-center justify-content-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_1.svg" alt="" class="lazy-img"></div>
					<div class="main-count fw-500"><span class="counter">{{ App\Models\Aset\Aset_gedung::count() }}</span></div>
					<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">Gedung</p>
				</div>
				<!-- /.card-style-five -->
			</div>
			<div class="col-lg-3">
				<div class="card-style-five text-center mt-60">
					<div class="icon d-flex align-content-center justify-content-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_4.svg" alt="" class="lazy-img"></div>
					<div class="main-count fw-500"><span class="counter">{{ App\Models\Aset\Aset_lokasi::count() }}</span></div>
					<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">Ruang</p>
				</div>
				<!-- /.card-style-five -->
			</div>
			<div class="col-lg-3">
				<div class="card-style-five text-center mt-60">
					<div class="icon d-flex align-content-center justify-content-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_2.svg" alt="" class="lazy-img"></div>
					<div class="main-count fw-500"><span class="counter">{{ App\Models\Aset\Aset::count() }}</span></div>
					<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">Barang</p>
				</div>
				<!-- /.card-style-five -->
			</div>
			<div class="col-lg-3">
				<div class="card-style-five text-center mt-60">
					<div class="icon d-flex align-content-center justify-content-center"><img src="images/lazy.svg" data-src="assets/images/icon/icon_3.svg" alt="" class="lazy-img"></div>
					<div class="main-count fw-500"><span class="counter">{{ App\Models\Aset\Aset_unit::count() }}</span></div>
					<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">Unit</p>
				</div>
				<!-- /.card-style-five -->
			</div>

		</div>
	</div>
	<img src="images/lazy.svg" data-src="images/shape/shape_07.svg" alt="" class="lazy-img shapes shape_01">
	<img src="images/lazy.svg" data-src="images/shape/shape_08.svg" alt="" class="lazy-img shapes shape_02">
</div>
<!-- /.text-feature-two -->



<div class="service-details mt-150 lg-mt-80 mb-100 lg-mb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-lg-4 ">
                <aside class="md-mt-40">
                    <div class="service-nav-item">
                        <ul class="style-none" id="myTab" role="tablist">
                            <li><a class="d-flex align-items-center w-100 active" id="gedung-tab" data-bs-toggle="tab" data-bs-target="#gedung" type="button" role="tab" aria-controls="gedung" aria-selected="true">
                                <img src="images/lazy.svg" data-src="assets/images/icon/icon_72.svg" alt="" class="lazy-img">
                                <span>Data Gedung</span>
                            </a></li>
                            <li><a href="" class="d-flex align-items-center w-100" id="ruang-tab" data-bs-toggle="tab" data-bs-target="#ruang" type="button" role="tab" aria-controls="ruang" aria-selected="true">
                                <img src="images/lazy.svg" data-src="assets/images/icon/icon_73.svg" alt="" class="lazy-img">
                                <span>Data Ruang</span>
                            </a></li>
                            <li><a href="" class="d-flex align-items-center w-100" id="inventaris-tab" data-bs-toggle="tab" data-bs-target="#inventaris" type="button" role="tab" aria-controls="inventaris" aria-selected="true">
                                <img src="images/lazy.svg" data-src="assets/images/icon/icon_74.svg" alt="" class="lazy-img">
                                <span>Data Inventaris</span>
                            </a></li>

                        </ul>
                    </div>

                    <!-- /.contact-banner -->
                </aside>
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="details-meta ps-xxl-5 ps-xl-3 mb-20">
                    <div class="tab-content" >
                        <div class="tab-pane fade show active" id="gedung" role="tabpanel" aria-labelledby="gedung-tab">
                            <div class="coaching__content">
                                <div class="fadeInLeft animated" data-wow-delay=".4s">
                                    <article class="blog-meta-two style-two position-relative mb-150 lg-mb-80">
                                        <div class="post-data">
                                            <div class="blog-title"><h4>Data Aset - Gedung Perpustakaan Ibrahimy</h4></div>
                                            <div class="post-details-meta">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Gedung</th>
                                                            <th>Nama Area</th>
                                                            <th>Luas Gedung</th>
                                                            <th>Lantai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($gedung as $bangunan)
                                                        <tr>
                                                            <td>{{ $bangunan->gedung }}</td>
                                                            <td>{{ $bangunan->area }}</td>
                                                            <td>{{ $bangunan->luas }}</td>
                                                            <td>{{ $bangunan->lantai }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ruang" role="tabpanel" aria-labelledby="ruang-tab">
                            <div class="coaching__content">
                                <div class="fadeInLeft animated" data-wow-delay=".4s">
                                    <article class="blog-meta-two style-two position-relative mb-150 lg-mb-80">
                                        <div class="post-data">
                                            <div class="blog-title"><h4>Data Aset - Ruang Perpustakaan Ibrahimy</h4></div>
                                            <div class="post-details-meta">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Ruang</th>
                                                            <th>Nama Gedung</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lokasi as $ruang)
                                                        <tr>
                                                            <td>{{ $ruang->lokasi }}</td>
                                                            <td>{{ $ruang->gedung }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="inventaris" role="tabpanel" aria-labelledby="inventaris-tab">
                            <div class="coaching__content">
                                <div class="fadeInLeft animated" data-wow-delay=".4s">
                                    <article class="blog-meta-two style-two position-relative mb-150 lg-mb-80">
                                        <div class="post-data">
                                            <div class="blog-title"><h4>Data Aset - Inventaris Perpustakaan Ibrahimy</h4></div>
                                            <div class="post-details-meta">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Ruang</th>
                                                            <th>Nama Inventaris</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($lokasi as $lok)
                                                        @php
                                                            $rowspan = $lok->units->count();
                                                        @endphp
                                                        @foreach($lok->units as $index => $item)
                                                        <tr>
                                                            @if($index == 0)
                                                            <td rowspan="{{ $rowspan }}">{{ $lok->lokasi }}</td>
                                                            @endif
                                                            <td>{{ $item->aset->nama }}</td>
                                                            <td>{{ $item->count }}</td>
                                                        </tr>
                                                        @endforeach
                                                        @endforeach
                                                        @php
                                                            $total = App\Models\Aset\Aset_unit::count();
                                                        @endphp
                                                        <tr>
                                                            <td colspan="2">Total Aset</td>
                                                            <td>{{ $total }} Unit</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
