@extends('layout.sidebarnavbar')
@section('admin-konten')

<!-- content -->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    @if(request()->is('admin/layanan-kartu(Putra)'))
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Pembuatan Kartu Anggota - Putra</h1>
                    @elseif(request()->is('admin/layanan-kartu(Putri)'))
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Pembuatan Kartu Anggota - Putra</h1>
                    @else
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Pembuatan Kartu Anggota</h1>
                    @endif
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    @if(request()->is('admin/layanan-kartu(Putra)'))
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/layanan-kartu" class="text-muted text-hover-primary">Kartu Anggota</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Putra</li>
                        <!--end::Item-->
                    </ul>
                    @elseif(request()->is('admin/layanan-kartu(Putri)'))
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/layanan-kartu" class="text-muted text-hover-primary">Kartu Anggota</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Putri</li>
                        <!--end::Item-->
                    </ul>
                    @else
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Kartu Anggota</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                    @endif
                </div>
            </div>
        </div>
        <!--begin::Content-->
        @php
            $baru_pi = App\Models\Layanan\Layanan_kartu::where('slug1', "Anggota Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri")->count();
            $baru_pa = App\Models\Layanan\Layanan_kartu::where('slug1', "Anggota Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra")->count();
            $baru = $baru_pa + $baru_pi;

            $ulang_pa = App\Models\Layanan\Layanan_kartu::where('slug1', "Perpanjang/Cetak Ulang-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra")->count();
            $ulang_pi = App\Models\Layanan\Layanan_kartu::where('slug1', "Perpanjang/Cetak Ulang-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri")->count();
            $ulang = $ulang_pa + $ulang_pi;

            $maba_pa = App\Models\Layanan\Layanan_kartu::where('slug1', "Mahasiswa Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra")->count();
            $maba_pi = App\Models\Layanan\Layanan_kartu::where('slug1', "Mahasiswa Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri")->count();
            $maba = $maba_pa + $maba_pi;

            $maba_pa_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Mahasiswa Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra-Selesai")->count();
            $ulang_pa_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Perpanjang/Cetak Ulang-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra-Selesai")->count();
            $baru_pa_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Anggota Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putra-Selesai")->count();
            $maba_pi_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Mahasiswa Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri-Selesai")->count();
            $ulang_pi_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Perpanjang/Cetak Ulang-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri-Selesai")->count();
            $baru_pi_s = App\Models\Layanan\Layanan_kartu::where('slug2', "Anggota Baru-". Carbon\Carbon::now()->isoFormat('MMMM-Y') ."-Putri-Selesai")->count();
            $cetak = $maba_pa_s + $maba_pi_s + $ulang_pa_s + $ulang_pi_s + $baru_pa_s + $baru_pi_s;

            $total = $baru * 20000 + $ulang * 10000;

        @endphp
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if(request()->is('admin/layanan-kartu'))
                <!--begin::Referral program-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Body-->
					<div class="card-body py-10">
						<h2 class="mb-8">Statistik Layanan Kartu Anggota Bulan {{ Carbon\Carbon::now()->isoFormat('MMMM Y') }}</h2>
						<!--begin::Stats-->
						<div class="row">
							<!--begin::Col-->
							<div class="col">
								<div class="card card-dashed flex-center min-w-175px my-3 p-6">
									<span class="fs-4 fw-semibold text-success pb-1 px-2">Anggota Baru</span>
									<span class="fs-lg-2tx fw-bold d-flex justify-content-center">
									<span data-kt-countup="true" data-kt-countup-value="{{ $baru }}">0</span></span>
								</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col">
								<div class="card card-dashed flex-center min-w-175px my-3 p-6">
									<span class="fs-4 fw-semibold text-danger pb-1 px-2">Cetak Ulang</span>
									<span class="fs-lg-2tx fw-bold d-flex justify-content-center">
									<span data-kt-countup="true" data-kt-countup-value="{{ $ulang }}">0</span></span>
								</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col">
								<div class="card card-dashed flex-center min-w-175px my-3 p-6">
									<span class="fs-4 fw-semibold text-primary pb-1 px-2">Mahasiswa Baru</span>
									<span class="fs-lg-2tx fw-bold d-flex justify-content-center">
									<span data-kt-countup="true" data-kt-countup-value="{{ $maba }}">0</span></span>
								</div>
							</div>
							<!--end::Col-->
                            <!--begin::Col-->
							<div class="col">
								<div class="card card-dashed flex-center min-w-175px my-3 p-6">
									<span class="fs-4 fw-semibold text-info pb-1 px-2">Kartu tercetak</span>
									<span class="fs-lg-2tx fw-bold d-flex justify-content-center">
									<span data-kt-countup="true" class="me-2" data-kt-countup-value="{{ $cetak }}">0</span>Kartu</span>
								</div>
							</div>
							<!--end::Col-->
                            <!--begin::Col-->
							<div class="col">
								<div class="card card-dashed flex-center min-w-175px my-3 p-6">
									<span class="fs-4 fw-semibold text-warning pb-1 px-2">Pendapatan</span>
									<span class="fs-lg-2tx fw-bold d-flex justify-content-center">Rp.
									<span data-kt-countup="true" class="me-2" data-kt-countup-value="{{ $total }}">0</span></span>
								</div>
							</div>
							<!--end::Col-->

						</div>
						<!--end::Stats-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Referral program-->
                <div class="row g-5 g-xl-8 mb-2">
                    @if(auth()->user()->hasPermissionTo('layanan kartu-putra'))
                    <div class="col-xl-6">
                        <!--begin: Statistics Widget 6-->
                        <a href="admin/layanan-kartu(Putra)" class="card card-xl-stretch mb-xl-8 bg-light-success border-hover-success">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-1 pb-0 ">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <div class="text-gray-900 fw-bold fs-2 mb-4">Layanan Kartu Perpustakaan Putra</div>
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Kartu Tercetak</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-check-circle fs-3 text-success me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pa_s + $maba_pa_s + $ulang_pa_s }}">0</div><span class="fs-2 fw-bold ms-2">Kartu</span>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Pendapatan</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-tag  fs-3 text-success me-2">
                                                </i>
                                                <span class="fs-2 fw-bold">Rp.</span>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pa * 20000 + $ulang_pa * 10000 }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                    </div>
                                </div>
                                <img src="admin/assets/media/santri/santripa.png" alt="" class="align-self-end h-150px">
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end: Statistics Widget 6-->
                    </div>
                    @endif
                    @if(auth()->user()->hasPermissionTo('layanan kartu-putri'))
                    <div class="col-xl-6">
                        <!--begin: Statistics Widget 6-->
                        <a href="admin/layanan-kartu(Putri)" class="card card-xl-stretch mb-xl-8 bg-light-success border-hover-success">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-1 pb-0 ">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <div class="text-gray-900 fw-bold fs-2 mb-4">Layanan Kartu Perpustakaan Putri</div>
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Kartu Tercetak</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-check-circle fs-3 text-success me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pi_s + $maba_pi_s + $ulang_pi_s }}">0</div><span class="fs-2 fw-bold ms-2">Kartu</span>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Pendapatan</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-tag  fs-3 text-success me-2">
                                                </i>
                                                <span class="fs-2 fw-bold">Rp.</span>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pi * 20000 + $ulang_pi * 10000 }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                    </div>
                                </div>
                                <img src="admin/assets/media/santri/santripi.png" alt="" class="align-self-end h-150px">
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end: Statistics Widget 6-->
                    </div>
                    @endif
                </div>
                <!--begin::Products-->
                @else
                @if(request()->is('admin/layanan-kartu(Putra)'))
                <div class="row g-5 g-xl-8 mb-2">
                    <div class="col-xl-12">
                        <!--begin: Statistics Widget 6-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-1 pb-0 ">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <div class="text-gray-900 fw-bold fs-2 mb-4">Layanan Kartu Perpustakaan Putra</div>
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Cetak Baru</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-simcard fs-3 text-success me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pa }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Cetak Ulang</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $ulang_pa }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Mahasiswa Baru</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-profile-user fs-3 text-primary me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $maba_pa }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Kartu Tercetak</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-check-circle fs-3 text-info me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pa_s + $maba_pa_s + $ulang_pa_s }}">0</div><span class="fs-2 fw-bold ms-2">Kartu</span>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Pendapatan</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-tag  fs-3 text-warning me-2">
                                                </i>
                                                <span class="fs-2 fw-bold">Rp.</span>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pa * 20000 + $ulang_pa * 10000 }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                </div>
                                <img src="admin/assets/media/santri/santripa.png" alt="" class="align-self-end h-150px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>
                </div>
                @elseif(request()->is('admin/layanan-kartu(Putri)'))
                <div class="row g-5 g-xl-8 mb-2">
                    <div class="col-xl-12">
                        <!--begin: Statistics Widget 6-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-1 pb-0 ">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <div class="text-gray-900 fw-bold fs-2 mb-4">Layanan Kartu Perpustakaan Putri</div>
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Cetak Baru</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-simcard fs-3 text-success me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pi }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Cetak Ulang</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $ulang_pi }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Mahasiswa Baru</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-profile-user fs-3 text-primary me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $maba_pi }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Kartu Tercetak</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-check-circle fs-3 text-info me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pi_s + $maba_pi_s + $ulang_pi_s }}">0</div><span class="fs-2 fw-bold ms-2">Kartu</span>
                                            </div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Pendapatan</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-tag  fs-3 text-warning me-2">
                                                </i>
                                                <span class="fs-2 fw-bold">Rp.</span>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $baru_pi * 20000 + $ulang_pi * 10000 }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                </div>
                                <img src="admin/assets/media/santri/santripi.png" alt="" class="align-self-end h-150px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>
                </div>
                @endif
                @endif
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4">
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Anggota"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                            @if(auth()->user()->hasPermissionTo('layanan kartu-cetak data'))
                            @if(request()->is('admin/layanan-kartu(Putra)'))
                            <form action="{{ route('layanan.kartu.export.data', ['jk' => $jk ?? 'Putra']) }}" method="GET" class="d-flex align-items-center gap-2">
                                <select name="bulan" class="form-select" data-control="select2" data-hide-search="true" required>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ sprintf('%02d', $m) }}" {{ request('bulan') == sprintf('%02d', $m) ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="tahun" class="form-select" data-control="select2" data-hide-search="true" required>
                                    @php
                                        $currentYear = now()->year;
                                    @endphp
                                    @for($year = $currentYear; $year >= 2020; $year--)
                                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-success">Cetak</button>
                            </form>
                            @elseif(request()->is('admin/layanan-kartu(Putri)'))
                            <form action="{{ route('layanan.kartu.export.data', ['jk' => $jk ?? 'Putri']) }}" method="GET" class="d-flex align-items-center gap-2">
                                <select name="bulan" class="form-select" data-control="select2" data-hide-search="true" required>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ sprintf('%02d', $m) }}" {{ request('bulan') == sprintf('%02d', $m) ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="tahun" class="form-select" data-control="select2" data-hide-search="true" required>
                                    @php
                                        $currentYear = now()->year;
                                    @endphp
                                    @for($year = $currentYear; $year >= 2020; $year--)
                                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-success">Cetak</button>
                            </form>
                            @endif
                            @endif

                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Ket Cetak" data-kt-ecommerce-product-filter="status">
                                    <option></option>
                                    <option value="all">Semua</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            @if(auth()->user()->hasPermissionTo('layanan kartu-laporan'))
                            @if(request()->is('admin/layanan-kartu'))
                            <!--begin::Laporan-->
                            <a class="btn btn-success" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-abstract-26 fs-3 me-1"></i>Rekap</a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('laporan.harian', ['jk' => 'Putra', 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="menu-link px-3">Putra</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('laporan.harian', ['jk' => 'Putri', 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="menu-link px-3">Putri</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Laporan-->
                            @else
                            @if(request()->is('admin/layanan-kartu(Putra)'))
                            <a href="{{ route('laporan.harian', ['jk' => 'Putra', 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary"><i class="ki-outline ki-abstract-26 fs-3"></i>Rekap</a>
                            @elseif(request()->is('admin/layanan-kartu(Putri)'))
                            <a href="{{ route('laporan.harian', ['jk' => 'Putri', 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary"><i class="ki-outline ki-abstract-26 fs-3"></i>Rekap</a>
                            @endif
                            @if(auth()->user()->hasPermissionTo('layanan kartu-tambah'))
                            <button type="button" class="btn btn-light-success" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah
                            </button>
                            @endif
                            @endif
                            @endif
                        </div>
                        @include('admin.Layanan.kartu.tambah')
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped fs-6 gy-4" id="kt_ecommerce_products_table">
                            <thead class="fw-bold fs-5 bg-success">
                                <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start ps-5 min-800px">Hari, Tanggal</th>
                                    <th>ID Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Kategori</th>
                                    <th>Petugas</th>
                                    <th>Shif</th>
                                    <th>Ket.Cetak</th>
                                    <th class="text-end rounded-end pe-5">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($kartu as $item)
                                @if(request()->is('admin/layanan-kartu('.$item->jk.')'))
                                @if($item->jk == ''.$item->jk.'')
                                <tr>
                                    <td class="ps-5">{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y - hh:mm') }}</td>
                                    <td>{{ $item->idanggota }}
                                        @if($item->jk == "Putra")
                                        <span class="badge badge-light-primary">Pa</span>
                                        @elseif($item->jk == "Putri")
                                        <span class="badge badge-light-danger">Pi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-gray-900 fs-5">{{ $item->nama }}</div>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Asrama: {{ $item->asrama }}</span>
                                    </td>
                                    <td>
                                        @if($item->kategori == "Mahasiswa Baru")
                                        <div class="badge py-3 px-4 fs-7 badge-light-primary">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == "Perpanjang/Cetak Ulang")
                                        <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == "Anggota Baru")
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">{{ $item->kategori }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $item->petugas }}</td>
                                    <td>{{ $item->shif }}</td>
                                    <td>
                                        @if($item->ket == "Selesai")
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">Selesai</div>
                                        @else
                                        @if ($item->ket == "Selesai")
                                        @else
                                        @if(auth()->user()->hasPermissionTo('layanan kartu-ubah'))
                                        <a href="#" class="btn btn-light-danger btn-sm" onclick="event.preventDefault(); document.getElementById('label').submit();">Belum</a>
                                        <form id="label" action="{{ asset('/admin/layanan-kartu('.$item->id.')/ubah') }}" method="POST" class="d-none">
                                            @csrf
                                            <input type="radio" class="btn-check" name="ket" value="Selesai" checked>
                                            <input type="radio" class="btn-check" name="slug2" value="{{ $item->kategori.'-'.Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM-Y').'-'.$item->jk }}" checked>
                                        </form>
                                        @else
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">Selesai</div>
                                        @endif
                                        @endif
                                        @endif
                                    </td>
                                    <td class="text-end pe-5">
                                        <a href="#" class="btn btn-light-primary btn-sm btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-down fs-5"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan kartu-edit'))
                                            <div class="menu-item px-3">
                                                <a href=# class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{ $item->id }}">Edit</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan kartu-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/layanan-kartu('.$item->id.')/hapus') }}" class="menu-link px-3  delete-button">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        @include('admin.Layanan.kartu.edit')
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endif
                                @elseif(request()->is('admin/layanan-kartu'))
                                <tr>
                                    <td class="ps-5">{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y - hh:mm') }}</td>
                                    <td>{{ $item->idanggota }}
                                        @if($item->jk == "Putra")
                                        <span class="badge badge-light-primary">Pa</span>
                                        @elseif($item->jk == "Putri")
                                        <span class="badge badge-light-danger">Pi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-gray-900 fs-5">{{ $item->nama }}</div>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Asrama: {{ $item->asrama }}</span>
                                    </td>
                                    <td>
                                        @if($item->kategori == "Mahasiswa Baru")
                                        <div class="badge py-3 px-4 fs-7 badge-light-primary">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == "Perpanjang/Cetak Ulang")
                                        <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == "Anggota Baru")
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">{{ $item->kategori }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $item->petugas }}</td>
                                    <td>{{ $item->shif }}</td>
                                    <td>
                                        @if($item->ket == "Selesai")
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">Selesai</div>
                                        @else
                                        @if ($item->ket == "Selesai")
                                        @else
                                        @if(auth()->user()->hasPermissionTo('layanan kartu-ubah'))
                                        <a href="#" class="btn btn-light-danger btn-sm" onclick="event.preventDefault(); document.getElementById('label').submit();">Belum</a>
                                        <form id="label" action="{{ asset('/admin/layanan-kartu('.$item->id.')/ubah') }}" method="POST" class="d-none">
                                            @csrf
                                            <input type="radio" class="btn-check" name="ket" value="Selesai" checked>
                                            <input type="radio" class="btn-check" name="slug2" value="{{ $item->kategori.'-'.Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM-Y').'-'.$item->jk }}" checked>
                                        </form>
                                        @else
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">Selesai</div>
                                        @endif
                                        @endif
                                        @endif
                                    </td>
                                    <td class="text-end pe-5">
                                        <a href="#" class="btn btn-light-primary btn-sm btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-down fs-5"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan kartu-edit'))
                                            <div class="menu-item px-3">
                                                <a href=# class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{ $item->id }}">Edit</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan kartu-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/layanan-kartu('.$item->id.')/hapus') }}" class="menu-link px-3 delete-button">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        @include('admin.Layanan.kartu.edit')
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
</div>

<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>
<!--begin::Veadmin/ndors Javascript(used for this page only)-->
<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendadmin/ors Javascript-->
<!--begin::Cuadmin/stom Javascript(used for this page only)-->
<script src="admin/assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Custom Javascript-->
@include('layout.footer')

<!--end::Javascript-->
@endsection

