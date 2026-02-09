@extends('layout.sidebarnavbar')
@section('admin-konten')

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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Surat Keluar</h1>
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
                        <li class="breadcrumb-item text-muted">Surat Keluar</li>
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
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::KONTEN-->
                <!--begin::Card-->
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-5" style="background-size: 10%; background-position-x: 100%; background-image: url('admin/assets/media/santri/gerbang.png')">
                    <!--begin::Card header-->
                    <div class="card-header pt-10">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <i class="ki-outline ki-folder-up fs-2x text-primary"></i>
                                </div>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Surat Keluar</h2>
                                <div class="text-muted fw-bold">
                                <a>Perpustakaan Ibrahimy</a>
                                <span class="mx-3">|</span>8 dokumen</div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <!--begin::Navs-->
                        <div class="d-flex overflow-auto h-55px">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary me-6 active" href="/admin/administrasi-surat">Surat</a>
                                </li>
                                <!--end::Nav item-->
                                @if(auth()->user()->hasPermissionTo('surat keluar-tambah'))
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary me-6 " href="admin/administrasi-surat=tambah">Tambah</a>
                                </li>
                                <!--end::Nav item-->
                                @endif
                            </ul>
                        </div>
                        <!--begin::Navs-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Card-->
                @if(!request()->has('kode'))
                <!--begin::Documents toolbar-->
				<div class="d-flex flex-wrap flex-stack mb-6">
					<!--begin::Title-->
					<h3 class="fw-bold my-2">Surat Keluar
					<span class="fs-6 text-gray-500 fw-semibold ms-1">{{ App\Models\Administrasi\Surat::count() }} dokumen</span></h3>
					<!--end::Title-->
					<!--begin::Controls-->
                    @if(auth()->user()->hasPermissionTo('surat keluar-tambah'))
					<div class="d-flex my-2">
						<a href="admin/administrasi-surat=tambah" class="btn btn-primary btn-sm">Tambah</a>
					</div>
                    @endif
					<!--end::Controls-->
				</div>
				<!--end::Documents toolbar-->
                <!--begin::Row-->
                <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.1" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Keputusan Kepala Perpustakaan</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', 'A.1-Keputusan Kepala Perpustakaan')->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.2" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Internal Perpustakaan</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', 'A.2-Internal Perpustakaan')->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.3" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Universitas</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', 'A.3-Universitas')->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.4" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Ma'had</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.4-Ma'had")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.5" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">External Ma'had</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.5-External Ma'had")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.6" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Anggaran Rutin</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.6-Anggaran Rutin")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                    <!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.7" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Anggaran Non Rutin</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.7-Anggaran Non Rutin")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.8" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Non Anggaran (Fotocopy)</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.8-Non Anggaran (Fotocopy)")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.9" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Non Anggaran (Rental)</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.9-Non Anggaran (Rental)")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.10" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Rekom Khusus</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.10-Rekom Khusus")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-6 col-lg-4 col-xl-3">
						<!--begin::Card-->
						<div class="card h-100">
                            <!--begin::Name-->
                            <a href="/admin/administrasi-surat?kode=A.11" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
									<!--begin::Image-->
									<div class="symbol symbol-75px mb-5">
										<img src="admin/assets/media/santri/folder-document.svg" class="theme-light-show" alt="" />
										<img src="admin/assets/media/santri/folder-document-dark.svg" class="theme-dark-show" alt="" />
									</div>
									<!--end::Image-->
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Laporan Kegiatan/Triwulan</div>
									<!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="fs-7 fw-semibold text-gray-500">{{ App\Models\Administrasi\Surat::where('kategori', "A.11-Laporan Kegiatan/Triwulan")->count() }} Dokumen</div>
                                    <!--end::Description-->
                                </div>
                            </a>
                            <!--end::Name-->
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                </div>
                <!--end::Row-->
                @else
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header pt-8">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
                                <input type="text" data-kt-filemanager-table-filter="search" class="form-control w-250px ps-15" placeholder="Cari Surat" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <!--begin::Add customer-->
                                @if(auth()->user()->hasPermissionTo('surat keluar-tambah'))
                                <a href="/admin/administrasi-surat=tambah" class="btn btn-flex btn-primary">
                                <i class="ki-outline ki-plus-square fs-2 me-1"></i>Tambah</a>
                                @endif
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-filemanager-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Terpilih</div>
                                <button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">Pilih</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table header-->
                        <div class="d-flex flex-stack">
                            <!--begin::Folder path-->
                            <div class="badge py-3 px-4 fs-7 badge-light-primary">
                                <div class="d-flex align-items-center flex-wrap">
                                <i class="ki-outline ki-abstract-32 fs-1 text-primary me-3"></i>
                                <a href="admin/administrasi-surat">Surat Keluar</a>
                                @php
                                    $kode = request()->query('kode');
                                    // Ambil kategori lengkap dengan mencari kategori yang dimulai dengan kode yang diberikan
                                    $kategoriLengkap = $surat->where('kategori', 'like', $kode . '-%')->first()->kategori ?? $kode;
                                @endphp
                                <i class="ki-duotone ki-right fs-1 text-primary mx-1"></i>{{ request()->query('kode') }}</div>
                            </div>
                            <!--end::Folder path-->
                            <!--begin::Folder Stats-->
                            <div class="badge py-3 px-4 fs-7 badge-light-primary">
                                <span id="kt_file_manager_items_counter">{{ App\Models\Administrasi\Surat::count() }} dokumen</span>
                            </div>
                            <!--end::Folder Stats-->
                        </div>
                        <!--end::Table header-->
                        <!--begin::Table-->
                        <table id="kt_file_manager_list" data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Surat</th>
                                    <th>No.Surat</th>
                                    <th>Tanggal</th>
                                    <th>Verifikasi</th>
                                    <th class="text-end">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($surat as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-document fs-2x text-primary me-4"></i>
                                            <div class="text-gray-800">{{ $item->namasurat }}</div>
                                        </div>
                                    </td>
                                    @php
                                        $bulanRomawi = [
                                            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
                                            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
                                            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
                                        ];
                                        $tanggal = \Carbon\Carbon::parse($item->created_at);
                                    @endphp
                                    <td><div class="badge py-3 px-4 fs-7 badge-light-primary">{{ '0828/'.str_pad($item->id, 2, '0', STR_PAD_LEFT).'/' . \Illuminate\Support\Str::before($item->kategori, '-') . '/' . '18.05.97' .'/071.095/'.$bulanRomawi[(int)$tanggal->format('m')].'/'.Carbon\Carbon::parse($item->created_at)->isoFormat('Y') }}</div></td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</td>
                                    <td>
                                        @if($item->verifikasi == "Terverifikasi")
                                        <div class="badge py-3 px-4 fs-7 badge-success">Terverifikasi</div>
                                        @else
                                        <div class="badge py-3 px-4 fs-7 badge-danger">Belum</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-dots-square fs-5 ms-1"></i></button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            @if(auth()->user()->hasPermissionTo('surat keluar-cetak'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/storage/surat_keluar/' . $item->isi) }}" class="menu-link px-3">Cetak</a>
                                            </div>
                                            @endif
                                            @if(auth()->user()->hasPermissionTo('surat keluar-verifikasi'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('verifikasisurat='.$item->id.'') }}" class="menu-link px-3">Verifikasi</a>
                                            </div>
                                            @endif
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('surat keluar-edit'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/administrasi-surat='.$item->id.'') }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('surat keluar-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/administrasi-surat='.$item->id.'/hapus') }}" data-url="" class="menu-link px-3 delete-button">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
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
                @endif
                <!--end::KONTEN-->
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
<script src="admin/assets/js/custom/apps/file-manager/list.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

@include('layout.footer')

@endsection
