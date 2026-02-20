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

<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/resourceguide.png);">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-heading d-inline-block position-relative"
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                    Resource Guide
                </h1>

            </div>
            <div class="col-xl-4 col-lg-5 ms-auto">
                {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                <ul class="style-none d-inline-flex pager">
                    <li><a href="/">Home</a></li>
                    <li>/</li>
                    <li>Resource Guide</li>
                </ul>
            </div>
        </div>
    </div>
</div>


        <!--
		=====================================================
			FAQ Section Three
		=====================================================
		-->
        <div class="faq-section-three border-top pt-120 lg-pt-80 pb-150 lg-pb-80">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pasca" type="button" role="tab" >Pasca Sarjana</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fsei" type="button" role="tab" >Fakultas Syariah & Ekonomi Islam</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dakwah" type="button" role="tab" >Fakultas Dakwah</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tarbiyah" type="button" role="tab" >Fakultas Tarbiyah</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#saintek" type="button" role="tab" >Fakultas Sains & Teknologi</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fishum" type="button" role="tab" >Fakultas Sosial & Humaniora</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kesehatan" type="button" role="tab" >Fakultas Ilmu Kesehatan</button>
                    </div>
                </nav>
                <div class="tab-content mt-60 mb-60 lg-mt-40">
                    <div class="tab-pane fade" id="nav-all" role="tabpanel" tabindex="0">
                        <div class="accordion accordion-style-one" id="accordionOne">
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										How does the free trial work?
									</button>
							  	</h2>
							  	<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
							  	</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										How do you find different criteria in your process?
									</button>
								</h2>
								<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
										What do you look for in a founding team?
									</button>
								</h2>
								<div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										Do you recommend Pay as you go or Pre pay?
									</button>
								</h2>
								<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										What do I get for $0 with my plan?
									</button>
								</h2>
								<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
                            <div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
										How does the free trial work?
									</button>
								</h2>
								<div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
                            <div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										What does First Round look for in an idea?
									</button>
								</h2>
								<div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
									<div class="accordion-body">
										<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="tab-pane fade show active" id="pasca" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S2 – Pendidikan Agama Islam' ||
                                $item->prodi == 'S2 – Hukum Ekonomi Syariah' ||
                                $item->prodi == 'S3 – Studi Islam'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fsei" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Hukum Keluarga Islam' ||
                                $item->prodi == 'S1 – Hukum Ekonomi Syariah' ||
                                $item->prodi == 'S1 – Manajemen dan Bisnis Syariah' ||
                                $item->prodi == 'S1 – Ekonomi Syariah' ||
                                $item->prodi == 'S1 – Akuntansi Syariah'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dakwah" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Bimbingan dan Penyuluhan Islam' ||
                                $item->prodi == 'S1 – Ilmu Al-Quran dan Tafsir' ||
                                $item->prodi == 'S1 – Komunikasi dan Penyiaran Islam'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tarbiyah" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Pendidikan Agama Islam' ||
                                $item->prodi == 'S1 – Pendidikan Bahasa Arab' ||
                                $item->prodi == 'S1 – Pendidikan Islam Anak Usia Dini' ||
                                $item->prodi == 'S1 – Tadris Matematika'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="saintek" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Arsitektur' ||
                                $item->prodi == 'D3 – Budidaya Perikanan' ||
                                $item->prodi == 'S1 – Teknologi Hasil Perikanan' ||
                                $item->prodi == 'S1 – Ilmu Komputer' ||
                                $item->prodi == 'S1 – Sistem Informasi' ||
                                $item->prodi == 'S1 – Teknologi Informasi'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fishum" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Akuntansi' ||
                                $item->prodi == 'S1 - Hukum' ||
                                $item->prodi == 'S1 – Psikologi' ||
                                $item->prodi == 'S1 - Pendidikan Bahasa Inggris'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kesehatan" role="tabpanel" tabindex="0">
                        <div class="row gx-xxl-5">
                            @foreach ($resource as $item)
                            @if(
                                $item->prodi == 'S1 – Kebidanan' ||
                                $item->prodi == 'S1 – Farmasi'
                            )
                            <div class="col-lg-6 d-flex wow fadeInUp">
                                <div class="card-style-six text-center vstack tran3s w-100 mt-30">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
                                    <div class="mt-10">Program Studi</div>
                                    <h4 class="fw-bold mb-10">{{ $item->prodi }}</h4>
                                    <a href="{{ asset('/resourceguide-'.$item->slug.'') }}" class="arrow-btn tran3s m-auto stretched-link"><img src="images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
                                </div>
                                <!-- /.card-style-six -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.faq-section-three -->


@endsection
