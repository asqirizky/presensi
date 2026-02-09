@extends('layout.sidebarnavbar')
@section('admin-konten')


<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Cek Plagiasi</h1>
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
                        <li class="breadcrumb-item text-muted">Cek Plagiasi</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Row-->
				<div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
					<!--begin::Col-->
					<div class="col-xl-3">
						<!--begin::Card widget 3-->
						<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-60" style="background-color: #00a884;background-image:url('admin/assets/media/santri/pattern.png')">
							<!--begin::Header-->
							<div class="card-header pt-5">
								<!--begin::Icon-->
								<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #00a884">
									<i class="ki-outline ki-teacher text-white fs-2qx lh-0"></i>
								</div>
								<!--end::Icon-->
							</div>
							<!--end::Header-->
							<!--begin::Card body-->
							<div class="card-body d-flex align-items-end mb-3">
								<!--begin::Info-->
								<div class="d-flex align-items-center">
									<span class="fs-4hx text-white fw-bold me-6">{{ App\Models\Layanan\Layanan_plagiasi::count() }}</span>
									<div class="fw-bold fs-6 text-white">
										<span class="d-block">Mahasiswa</span>
									</div>
								</div>
								<!--end::Info-->
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
								<!--begin::Progress-->
								<div class="fw-bold text-white py-1 fs-5">
									<span>Tingkat Plagiasi Mahasiswa 2021; {{ $totalRataPlagiasi }}%</span>
								</div>
								<!--end::Progress-->
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card widget 3-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xl-3">
						<!--begin::Card widget 3-->
						<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-60" style="background-color: #7239EA;background-image:url('admin/assets/media/santri/pattern.png')">
							<!--begin::Header-->
							<div class="card-header pt-5">
								<!--begin::Icon-->
								<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
									<i class="ki-outline ki-abstract-26 text-white fs-2qx lh-0"></i>
								</div>
								<!--end::Icon-->
							</div>
							<!--end::Header-->
							<!--begin::Card body-->
							<div class="card-body d-flex align-items-end mb-3">
								<!--begin::Info-->
								<div class="d-flex align-items-center">
									<span class="fs-4hx text-white fw-bold me-6">{{ $jumlahTotal }}</span>
									<div class="fw-bold fs-6 text-white">
										<span class="d-block">Mahasiswa cek</span>
                                        <span>plagiasi lebih dari 1 kali</span>
									</div>
								</div>
								<!--end::Info-->
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
								<!--begin::Progress-->
								<div class="fw-bold text-white py-1 fs-5">
									<span>Total pendapatan</span><br>
									<span>Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</span>
								</div>
								<!--end::Progress-->
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card widget 3-->
					</div>
					<!--end::Col-->

					<!--begin::Col-->
					<div class="col-xl-6">
						<!--begin::Engage widget 9-->
						<div class="card h-lg-100" style="background: linear-gradient(112.14deg, #FF8A00 0%, #E96922 100%)">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Row-->
								<div class="row align-items-center">
									<!--begin::Col-->
									<div class="col-sm-7 pe-0 mb-5 mb-sm-0">
										<!--begin::Wrapper-->
										<div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
											<!--begin::Container-->
											<div class="mb-7">
												<!--begin::Title-->
												<div class="mb-6">
													<h3 class="fs-2x fw-semibold text-white">Rekapitulasi</h3>
													<span class="fw-semibold text-white opacity-75">Mahasiswa yang cek plagiasi lebih dari 1 kali</span>
												</div>
												<!--end::Title-->
												<!--begin::Items-->
												<div class="d-flex flex-wrap mb-2">
													<!--begin::Stat-->
													<div class="rounded min-w-100px py-3 px-4 my-1 me-2" style="border: 1px dashed rgba(255, 255, 255, 0.2)">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="text-white fs-4 fw-bold"><span data-kt-countup="true" data-kt-countup-value="{{ $jumlahPutra }}">0</span> Mhs</span></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-semibold fs-8 text-white opacity-90">Putra</div>
														<!--end::Label-->
													</div>
													<!--end::Stat-->
													<!--begin::Stat-->
													<div class="rounded min-w-100px py-3 px-4 my-1" style="border: 1px dashed rgba(255, 255, 255, 0.2)">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="text-white fs-4 fw-bold">Rp.<span data-kt-countup="true" data-kt-countup-value="{{ $putra }}">0</span></span></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-semibold fs-8 text-white opacity-90">Total Pendapatan</div>
														<!--end::Label-->
													</div>
													<!--end::Stat-->
												</div>
												<!--begin::Items-->
												<div class="d-flex flex-wrap">
													<!--begin::Stat-->
													<div class="rounded min-w-100px py-3 px-4 my-1 me-2" style="border: 1px dashed rgba(255, 255, 255, 0.2)">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="text-white fs-4 fw-bold"><span data-kt-countup="true" data-kt-countup-value="{{ $jumlahPutri }}">0</span> Mhs</span></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-semibold fs-8 text-white opacity-90">Putri</div>
														<!--end::Label-->
													</div>
													<!--end::Stat-->
													<!--begin::Stat-->
													<div class="rounded min-w-100px py-3 px-4 my-1" style="border: 1px dashed rgba(255, 255, 255, 0.2)">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="text-white fs-6 fw-bold">Rp.<span data-kt-countup="true" data-kt-countup-value="{{ $putri }}">0</span></span></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-semibold fs-8 text-white opacity-90">Total Pendapatan</div>
														<!--end::Label-->
													</div>
													<!--end::Stat-->
												</div>
												<!--end::Items-->
											</div>
											<!--end::Container-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--begin::Col-->
                                    <!--begin::Col-->
									<div class="col-sm-5">
										<!--begin::Illustration-->
										<img src="{{ asset('admin/assets/media/santri/menara.png') }}"  class="position-absolute bottom-0 end-0 h-250px" alt="" />
										<!--end::Illustration-->
									</div>
									<!--begin::Col-->
								</div>
								<!--begin::Row-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Engage widget 9-->
					</div>
					<!--end::Col-->
					<!--end::Col-->
				</div>
				<!--end::Row-->
                <!--begin::Card-->
                <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100 mb-8" data-bs-ride="carousel" data-bs-interval="5000">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h4 class="card-title d-flex align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Tingkat Plagiasi Mahasiswa</span>
                            <span class="text-gray-500 mt-1 fw-bold fs-7">Angkatan 2021 Setiap Program Studi</span>
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
                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="4" class="ms-1"></li>
                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="5" class="ms-1"></li>
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
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    {{-- <h3 class="mb-3 text-success text-center">Fakultas Syariah dan Ekonomi Islam</h3> --}}
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-success">Fakultas Syariah dan Ekonomi Islam</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Syariah dan Ekonomi Islam')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            <span class="fs-7 fw-semibold text-success pb-1 px-2">{{ $prodi->prodi }}</span>
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span data-kt-countup="true" data-kt-countup-value="{{ number_format($prodi->rata_plagiasi) }}">0</span>%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="carousel-item">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-info">Fakultas Dakwah</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Dakwah')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            <span class="fs-7 fw-semibold text-info pb-1 px-2">{{ $prodi->prodi }}</span>
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span>{{ number_format($prodi->rata_plagiasi) }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="carousel-item">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-warning">Fakultas Tarbiyah</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Tarbiyah')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            <span class="fs-7 fw-semibold text-warning pb-1 px-2">{{ $prodi->prodi }}</span>
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span>{{ number_format($prodi->rata_plagiasi) }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="carousel-item">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-primary">Fakultas Sains dan Teknologi</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Sains dan Teknologi')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            @if($prodi->prodi == 'Teknologi Hasil Perikanan')
                                            <span class="fs-7 fw-semibold text-primary pb-1 px-2">Tek. Hasil Perikanan</span>
                                            @else
                                            <span class="fs-7 fw-semibold text-primary pb-1 px-2">{{ $prodi->prodi }}</span>
                                            @endif
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span>{{ number_format($prodi->rata_plagiasi) }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="carousel-item">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-danger">Fakultas Sosial dan Humaniora</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Sosial dan Humaniora')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            <span class="fs-7 fw-semibold text-danger pb-1 px-2">{{ $prodi->prodi }}</span>
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span>{{ number_format($prodi->rata_plagiasi) }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="carousel-item">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="text-center">
                                        <div class="badge py-3 px-7 fs-4 badge-light-secondary">Fakultas Ilmu Kesehatan</div>
                                    </div>
                                    @foreach ($rataPlagiasi as $prodi)
                                    @if($prodi->fakultas == 'Ilmu Kesehatan')
                                    <div class="col">
                                        <div class="card card-dashed flex-center min-w-175px my-3 p-3">
                                            <span class="fs-7 fw-semibold pb-1 px-2">{{ $prodi->prodi }}</span>
                                            <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                            <span>{{ number_format($prodi->rata_plagiasi) }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Carousel-->
                    </div>
                    <!--end::Body-->
                </div>
				<div class="card">
					<!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Mahasiswa"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Add product-->
                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-rekap'))
                            <a href="/admin/layanan-cekplagiasi=rekap" class="btn btn-light-success">
                                <i class="ki-outline ki-file-up fs-2"></i>Rekap
                            </a>
                            @endif
                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-tambah'))
                            <a href="/admin/layanan-cekplagiasi=tambah" class="btn btn-danger">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah
                            </a>
                            @endif
                            {{-- @endif --}}
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

					<!--begin::Card body-->
					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-striped fs-6 gy-5" id="kt_ecommerce_products_table">
							<thead class="fw-bold fs-5 bg-danger">
								<tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
									<th class="rounded-start ps-5 min-800px">Tanggal</th>
									<th class="w-20">Cek Ke</th>
									<th class="text-center">NIM</th>
									<th>Nama</th>
									<th>Prodi</th>
									<th class="text-center">Dokumen</th>
									<th class="text-center">Plagiasi</th>
									<th class="text-end rounded-end pe-5">Opsi</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
                                @foreach ($plagiasi as $item)
								<tr>
                                    <td class="ps-4">
                                        <div class="badge py-3 px-4 fs-7 badge-light">{{ Carbon\Carbon::parse($item->updated_at)->isoFormat('dddd, D MMMM Y') }}</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            @if($item->update_count == 1)
                                                <div class="badge py-3 px-4 fs-7 badge-light-primary">Pertama</div>
                                            @else
                                                <div class="badge py-3 px-4 fs-7 badge-light-warning">Ke-{{ $item->update_count }}</div>
                                            @endif                                     
                                            @if($item->riwayatPlagiasi->count() < $item->update_count)
                                                <div class="badge py-3 px-4 fs-7 badge-light-danger">Belum dicek</div>
                                            @endif
                                        </div>
                                    </td>

                                    @if($item->mahasiswa_id == null)
                                    <td class="text-center"><div class="badge py-3 px-4 fs-7 badge-light-primary">Non Tugas Akhir</div></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>-</td>
                                    @else
                                    <td class="text-center">{{ $item->mahasiswa->nim }}</td>
                                    <td>{{ $item->mahasiswa->nama }}</td>
                                    <td>{{ $item->mahasiswa->prodi }}</td>
                                    @endif
                                    <td class="text-center">
                                        @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-file'))
                                        <a href="{{ route('plagiasi.download', $item->id) }}">
                                            <img alt="" class="w-35px hover-scale" src="{{ asset('admin/assets/media/svg/files/doc.svg') }}">
                                        </a>
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        @if(optional($item->riwayatPlagiasi->last())->persentase == null)
                                        <div class="badge py-3 px-4 badge-light-warning fs-7">Belum</div>
                                        @else
                                        @if(optional($item->riwayatPlagiasi->last())->persentase >= 30)
                                        <div class="badge py-3 px-4 badge-light-danger fs-7">{{ optional($item->riwayatPlagiasi->last())->persentase ?? 'Belum ada data' }}%</div>
                                        @elseif(optional($item->riwayatPlagiasi->last())->persentase <= 30)
                                        <div class="badge py-3 px-4 badge-light-success fs-7">{{ optional($item->riwayatPlagiasi->last())->persentase ?? 'Belum ada data' }}%</div>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="#" class="btn btn-sm btn-icon btn-light-danger" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-dots-horizontal fs-2"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-cetak'))
                                            @if(optional($item->riwayatPlagiasi->last())->persentase <= 30)
                                            @if(optional($item->riwayatPlagiasi->last())->persentase == null)
                                            @else
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('hasilcekplagiasi='.$item->id) }}" class="menu-link px-3" target="_blank">Cetak Ket</a>
                                            </div>
                                            @endif
                                            @endif
                                            @endif
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-riwayat'))
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_detail{{ $item->id }}">Riwayat</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-hasil'))
                                            <div class="menu-item px-3">
                                                @php
                                                    $sudahDicek = $item->riwayatPlagiasi->count() > 0 && 
                                                                ($item->update_count == 1 || $item->riwayatPlagiasi->count() == $item->update_count);
                                                @endphp

                                                @if(!$sudahDicek)
                                                    <a href="javascript:void(0);" class="menu-link px-3" onclick="showBelumDicekAlert()" data-bs-toggle="modal" data-bs-target="#kt_modal_hasil{{ $item->id }}">
                                                        Upload Hasil
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="menu-link px-3 text-muted" onclick="showSudahDicekAlert()">
                                                        Upload Hasil
                                                    </a>
                                                @endif
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-edit'))
                                            @if($item->riwayatPlagiasi->count() > 0)
                                            <div class="menu-item px-3">
                                                @php
                                                    $sudahDicek = $item->riwayatPlagiasi->count() >= $item->update_count;
                                                @endphp


                                                @if($sudahDicek)
                                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upload{{ $item->id }}">
                                                        Upload Ulang Doc
                                                    </a>
                                                @else
                                                    <a class="menu-link px-3 text-muted" href="javascript:void(0);" onclick="alertBelumDicek()">
                                                        Upload Ulang Doc
                                                    </a>
                                                @endif
                                            </div>
                                            @endif
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/layanan-cekplagiasi-'.$item->id.'=edit') }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('layanan cekplagiasi-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/layanan-cekplagiasi/'.$item->id.'/hapus') }}" data-url="" class="menu-link px-3 delete-button">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        @include('admin.Layanan.cekplagiasi.detail')
                                        @include('admin.Layanan.cekplagiasi.upload')
                                        @include('admin.Layanan.cekplagiasi.hasil')
                                        <!--end::Menu-->
                                    </td>
								</tr>
                                @endforeach
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
            </div>
        </div>
    </div>
</div>

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>
<!--end::Globadmin/al Javascript Bundle-->
<!--begin::Veadmin/ndors Javascript(used for this page only)-->
<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendadmin/ors Javascript-->
<!--begin::Cuadmin/stom Javascript(used for this page only)-->
<script src="admin/assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<!--end::Custom Javascript-->
@if (session('success'))
<script>
    Swal.fire({
    title: 'Alhamdulillah!',
    text: '{{ session('berhasil') }}',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
});
</script>
@endif

<script>
    function alertBelumDicek() {
        Swal.fire({
            icon: 'warning',
            title: 'Astaghfirullah!',
            text: 'File sebelumnya masih belum dicek. Silakan tunggu hingga proses pengecekan selesai sebelum mengunggah ulang.',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
    }
</script>
<script>
    function showSudahDicekAlert() {
        Swal.fire({
            title: 'Astaghfirullah!',
            text: 'File sudah selesai dicek. Anda tidak bisa mengunggah hasil lagi.',
            icon: 'info',
            confirmButtonText: 'OK',
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    }
</script>

<!--end::Javascript-->
<!--begin::Footer-->
@include('layout.footer')
<!--end::Footer-->

@endsection
