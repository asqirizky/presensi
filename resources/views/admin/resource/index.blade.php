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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Resource Guide</h1>
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
                        <li class="breadcrumb-item text-muted">Resource Guide</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/resource" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
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
                <!--begin::KONTEN-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4">
                                </i>
                                <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control w-250px ps-12" placeholder="Cari Resource" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        @if(auth()->user()->hasPermissionTo('resource-tambah'))
                        <div class="card-toolbar">
                            <!--begin::Select-->
                            <a href="/admin/resource=tambah" class="btn btn-light-primary">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah Resource
                            </a>
                            <!--end::Select-->
                        </div>
                        @endif
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead class="fw-bold fs-5 bg-primary">
                                <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
                                    <th class="max-w-200px ps-4 rounded-start">Prodi</th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-end min-w-70px pe-4 rounded-end">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($resource as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex">
                                            <div class="position-relative ps-6 pe-3 py-2">
                                                @if(
                                                    $item->prodi == 'S2 – Pendidikan Agama Islam' ||
                                                    $item->prodi == 'S3 – Studi Islam' ||
                                                    $item->prodi == 'S2 – Hukum Ekonomi Syariah'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-secondary"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Hukum Keluarga Islam' ||
                                                    $item->prodi == 'S1 – Hukum Ekonomi Syariah' ||
                                                    $item->prodi == 'S1 – Manajemen dan Bisnis Syariah' ||
                                                    $item->prodi == 'S1 – Ekonomi Syariah' ||
                                                    $item->prodi == 'S1 – Akuntansi Syariah'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-info"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Bimbingan dan Penyuluhan Islam' ||
                                                    $item->prodi == 'S1 – Ilmu Al-Quran dan Tafsir' ||
                                                    $item->prodi == 'S1 – Komunikasi dan Penyiaran Islam'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Pendidikan Agama Islam' ||
                                                    $item->prodi == 'S1 – Pendidikan Bahasa Arab' ||
                                                    $item->prodi == 'S1 – Pendidikan Islam Anak Usia Dini' ||
                                                    $item->prodi == 'S1 – Tadris Matematika'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-danger"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Arsitektur' ||
                                                    $item->prodi == 'S1 – Budidaya Perikanan' ||
                                                    $item->prodi == 'S1 – Ilmu Komputer' ||
                                                    $item->prodi == 'S1 – Sistem Informasi' ||
                                                    $item->prodi == 'S1 – Teknologi Hasil Perikanan' ||
                                                    $item->prodi == 'S1 – Teknologi Informasi'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-primary"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Akuntansi' ||
                                                    $item->prodi == 'S1 - Hukum' ||
                                                    $item->prodi == 'S1 - Psikologi' ||
                                                    $item->prodi == 'S1 - Pendidikan Bahasa Inggris'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                                                @elseif(
                                                    $item->prodi == 'S1 – Kebidanan' ||
                                                    $item->prodi == 'S1 – Farmasi'
                                                )
                                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-secondary"></div>
                                                @endif

                                                <div class="text-gray-800 fs-5 fw-bold mb-1">{{ $item->prodi }}</div>
                                                <div class="d-flex align-items-center">
                                                @if(
                                                    $item->prodi == 'S2 – Pendidikan Agama Islam' ||
                                                    $item->prodi == 'S3 – Studi Islam' ||
                                                    $item->prodi == 'S2 – Hukum Ekonomi Syariah'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Pasca Sarjana</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Hukum Keluarga Islam' ||
                                                    $item->prodi == 'S1 – Hukum Ekonomi Syariah' ||
                                                    $item->prodi == 'S1 – Manajemen dan Bisnis Syariah' ||
                                                    $item->prodi == 'S1 – Ekonomi Syariah' ||
                                                    $item->prodi == 'S1 – Akuntansi Syariah'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Syariah dan Ekonomi Islam</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Bimbingan dan Penyuluhan Islam' ||
                                                    $item->prodi == 'S1 – Ilmu Al-Quran dan Tafsir' ||
                                                    $item->prodi == 'S1 – Komunikasi dan Penyiaran Islam'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Dakwah</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Pendidikan Agama Islam' ||
                                                    $item->prodi == 'S1 – Pendidikan Bahasa Arab' ||
                                                    $item->prodi == 'S1 – Pendidikan Islam Anak Usia Dini' ||
                                                    $item->prodi == 'S1 – Tadris Matematika'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Tarbiyah</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Arsitektur' ||
                                                    $item->prodi == 'D3 – Budidaya Perikanan' ||
                                                    $item->prodi == 'S1 – Teknologi Hasil Perikanan' ||
                                                    $item->prodi == 'S1 – Ilmu Komputer' ||
                                                    $item->prodi == 'S1 – Sistem Informasi' ||
                                                    $item->prodi == 'S1 – Teknologi Informasi'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Sains dan Teknologi</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Akuntansi' ||
                                                    $item->prodi == 'S1 - Hukum' ||
                                                    $item->prodi == 'S1 - Psikologi' ||
                                                    $item->prodi == 'S1 - Pendidikan Bahasa Inggris'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Ilmu Sosial dan Humaniora</span>
                                                @elseif(
                                                    $item->prodi == 'S1 – Kebidanan' ||
                                                    $item->prodi == 'S1 – Farmasi'
                                                )
                                                <span class="fw-bold text-gray-600 fs-7">Fakultas Ilmu Kesehatan</span>
                                                @endif

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-end pe-4">
                                        <a href="#" class="btn btn-sm btn-light-primary btn-active-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('resource-edit'))
                                            <div class="menu-item px-3">
                                                <a href="admin/resource=edit({{ $item->id }})" class="menu-link px-3">Edit</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('resource-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/resource('.$item->id.')/hapus') }}" class="menu-link px-3 delete-button">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Category-->
                <!--end::KONTEN-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
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
<script src="admin/assets/js/custom/apps/ecommerce/catalog/categories.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
    @include('layout.footer')
    <!--end::Footer-->
</div>


@endsection
