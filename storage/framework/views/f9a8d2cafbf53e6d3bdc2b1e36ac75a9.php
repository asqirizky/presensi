<?php $__env->startSection('admin-konten'); ?>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Beranda</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Beranda</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <?php echo $__env->make('layout.preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::KONTEN-->
                <!--begin::Row-->
                <div class="row gx-5 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-10">
                        <!--begin::Lists Widget 19-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Heading-->
                            <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('admin/assets/media/svg/top-green.png" data-bs-theme="light">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column text-white pt-15">
                                    <span class="fw-bold fs-2x mb-3">Aset</span>
                                    <div class="fs-4 text-white">
                                        <span class="opacity-75">Perpustakaan Ibrahimy</span>
                                    </div>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div class="card-body mt-n20">
                                <!--begin::Stats-->
                                <div class="mt-n20 position-relative">
                                    <!--begin::Row-->
                                    <div class="row g-3 g-lg-6">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-3">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-bank fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo e(App\Models\Aset\Aset_gedung::count()); ?></span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Gedung</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-3">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-element-10 fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo e(App\Models\Aset\Aset_lokasi::count()); ?></span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Ruang</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-3">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-lots-shopping fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo e(App\Models\Aset\Aset::count()); ?></span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Jenis Barang</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-3">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-element-2 fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?php echo e(App\Models\Aset\Aset_unit::count()); ?></span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Unit</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Lists Widget 19-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8 mb-10">
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-10">
                            <!--begin::Col-->
                            <div class="col-xl-6 mb-5 mb-xl-10">
                                <!--begin::Slider Widget 2-->
                                <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5000">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h4 class="card-title d-flex align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Konten Website</span>
                                            <span class="text-gray-500 mt-1 fw-bold fs-7">Statistik konten ditampilkan di sini</span>
                                        </h4>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Carousel Indicators-->
                                            <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" class="active ms-1"></li>
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" class="ms-1"></li>
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class="ms-1"></li>
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="3" class="ms-1"></li>
                                            </ol>
                                            <!--end::Carousel Indicators-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-6">
                                        <!--begin::Carousel-->
                                        <div class="carousel-inner">
                                            <!--begin::Item-->
                                            <div class="carousel-item active show">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol me-5">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="ki-outline ki-message-notif fs-3x text-success"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <!--begin::Subtitle-->
                                                        <h4 class="fw-bold text-gray-800 mb-3">Berita</h4>
                                                        <!--end::Subtitle-->
                                                        <!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Number-->
                                                                <span class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1"><?php echo e(App\Models\Berita::count()); ?></span>
                                                                <!--end::Number-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="carousel-item">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol me-5">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="ki-outline ki-book fs-3x text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <!--begin::Subtitle-->
                                                        <h4 class="fw-bold text-gray-800 mb-3">Resource Guide</h4>
                                                        <!--end::Subtitle-->
                                                        <!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Number-->
                                                                <span class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1"><?php echo e(App\Models\Resource::count() / 27 * 100); ?>%</span>
                                                                <!--end::Number-->
                                                                <span class="text-gray-500 fw-semibold fs-6"><?php echo e(App\Models\Resource::count()); ?> dari 27 Prodi</span>
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Wrapper-->

                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="carousel-item">
                                                <!--begin::Wrapper-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol me-5">
                                                        <span class="symbol-label bg-light-warning">
                                                            <i class="ki-outline ki-calendar-2 fs-3x text-warning"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <!--begin::Subtitle-->
                                                        <h4 class="fw-bold text-gray-800 mb-3">Kegiatan</h4>
                                                        <!--end::Subtitle-->
                                                        <!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Number-->
                                                                <span class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1"><?php echo e(App\Models\Kegiatan::count()); ?></span>
                                                                <!--end::Number-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Wrapper-->

                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="carousel-item">
                                                <!--begin::Wrapper-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol me-5">
                                                        <span class="symbol-label bg-light-info">
                                                            <i class="ki-outline ki-notepad-bookmark fs-3x text-info"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <!--begin::Subtitle-->
                                                        <h4 class="fw-bold text-gray-800 mb-3">Buletin Pustakaloka</h4>
                                                        <!--end::Subtitle-->
                                                        <!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Number-->
                                                                <span class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1"><?php echo e(App\Models\Buletin::count()); ?></span>
                                                                <!--end::Number-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Wrapper-->

                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Carousel-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Slider Widget 2-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
							<div class="col-xl-6 mb-xl-10">
								<!--begin::Slider Widget 1-->
								<div id="kt_sliders_widget_1_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5000">
									<!--begin::Header-->
									<div class="card-header pt-5">
										<!--begin::Title-->
										<h4 class="card-title d-flex align-items-start flex-column">
											<span class="card-label fw-bold text-gray-800">Jumlah Pustakawan</span>
											<span class="text-gray-500 mt-1 fw-bold fs-7">Statistik pustakawan di tampilkan di sini</span>
										</h4>
										<!--end::Title-->
										<!--begin::Toolbar-->
										<div class="card-toolbar">
											<!--begin::Carousel Indicators-->
											<ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
												<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0" class="active ms-1"></li>
												<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1" class="ms-1"></li>
												<li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="2" class="ms-1"></li>
											</ol>
											<!--end::Carousel Indicators-->
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body py-6">
										<!--begin::Carousel-->
										<div class="carousel-inner mt-n5">
											<!--begin::Item-->
											<div class="carousel-item active show">
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center mb-5">
													<!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol me-5">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="ki-outline ki-user-tick fs-3x text-success"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
													<!--begin::Info-->
													<div class="m-0">
														<!--begin::Subtitle-->
														<h4 class="fw-bold text-gray-800 mb-3">Pustakawan Struktural</h4>
														<!--end::Subtitle-->
														<!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Number-->
                                                                <span class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1"><?php echo e(App\Models\Kehadiran\Pegawai::count()); ?></span>
                                                                <!--end::Number-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
													</div>
													<!--end::Info-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="carousel-item">
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center mb-5">
													<!--begin::Chart-->
													<div class="w-80px flex-shrink-0 me-2">
														<div class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_2" style="height: 100px"></div>
													</div>
													<!--end::Chart-->
													<!--begin::Info-->
													<div class="m-0">
														<!--begin::Subtitle-->
														<h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
														<!--end::Subtitle-->
														<!--begin::Items-->
														<div class="d-flex d-grid gap-5">
															<!--begin::Item-->
															<div class="d-flex flex-column flex-shrink-0 me-4">
																<!--begin::Section-->
																<span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>3 Topics</span>
																<!--end::Section-->
																<!--begin::Section-->
																<span class="d-flex align-items-center text-gray-500 fw-bold fs-7">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>1 Speakers</span>
																<!--end::Section-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex flex-column flex-shrink-0">
																<!--begin::Section-->
																<span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>50 Min</span>
																<!--end::Section-->
																<!--begin::Section-->
																<span class="d-flex align-items-center text-gray-500 fw-bold fs-7">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>72 students</span>
																<!--end::Section-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Items-->
													</div>
													<!--end::Info-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Action-->
												<div class="m-0">
													<a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
													<a href="#" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
												</div>
												<!--end::Action-->
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="carousel-item">
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center mb-5">
													<!--begin::Chart-->
													<div class="w-80px flex-shrink-0 me-2">
														<div class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_3" style="height: 100px"></div>
													</div>
													<!--end::Chart-->
													<!--begin::Info-->
													<div class="m-0">
														<!--begin::Subtitle-->
														<h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
														<!--end::Subtitle-->
														<!--begin::Items-->
														<div class="d-flex d-grid gap-5">
															<!--begin::Item-->
															<div class="d-flex flex-column flex-shrink-0 me-4">
																<!--begin::Section-->
																<span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>3 Topics</span>
																<!--end::Section-->
																<!--begin::Section-->
																<span class="d-flex align-items-center text-gray-500 fw-bold fs-7">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>1 Speakers</span>
																<!--end::Section-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex flex-column flex-shrink-0">
																<!--begin::Section-->
																<span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>50 Min</span>
																<!--end::Section-->
																<!--begin::Section-->
																<span class="d-flex align-items-center text-gray-500 fw-bold fs-7">
																<i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>72 students</span>
																<!--end::Section-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Items-->
													</div>
													<!--end::Info-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Action-->
												<div class="m-0">
													<a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
													<a href="#" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Continue</a>
												</div>
												<!--end::Action-->
											</div>
											<!--end::Item-->
										</div>
										<!--end::Carousel-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Slider Widget 1-->
							</div>
							<!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Engage widget 4-->
                        <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                            <!--begin::Body-->
                            <div class="card-body d-flex ps-xl-15">
                                <!--begin::Wrapper-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                    <span class="me-2">Beberapa dokumen
                                    <span class="position-relative d-inline-block text-danger">
                                        <a href="/admin/akreditasi-instrumen" class="text-danger opacity-75-hover">Akreditasi</a>
                                        <!--begin::Separator-->
                                        <span class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                        <!--end::Separator-->
                                    </span></span> yang perlu dilengkapi
                                    <br />sebagai penunjang Akreditasi Perpustakaan</div>
                                    <!--end::Title-->
                                    <!--begin::Action-->
                                    <div class="mb-3">
                                        <a href="/admin/akreditasi-instrumen" class="btn btn-danger fw-semibold me-2">Selengkapnya</a>
                                    </div>
                                    <!--begin::Action-->
                                </div>
                                <!--begin::Wrapper-->
                                <!--begin::Illustration-->
                                <img src="admin/assets/media/santri/menara.png" class="position-absolute bottom-0 end-0 h-150px" alt="" />
                                <!--end::Illustration-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--end::KONTEN-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--end::Footer-->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/home.blade.php ENDPATH**/ ?>