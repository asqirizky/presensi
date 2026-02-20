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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Berita</h1>
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
                        <li class="breadcrumb-item text-muted">Data Berita</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/berita" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
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
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4">
                                </i>
                                <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control w-250px ps-12" placeholder="Cari Berita" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        @if(auth()->user()->hasPermissionTo('berita-tambah'))
                        <div class="card-toolbar">
                            <!--begin::Select-->
                            <a href="/admin/berita=tambah" class="btn btn-light-primary">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah Berita
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
                            <thead class="fw-bold fs-5 bg-warning">
                                <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
                                <th class="max-w-200px rounded-start ps-4">Berita</th>
                                    <th class="min-w-200px">Penulis</th>
                                    <th class="min-w-200px">Tanggal Terbit</th>
                                    <th class="text-end min-w-70px rounded-end pe-4">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($berita as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex">
                                            <!--begin::Thumbnail-->
                                            <a class="symbol symbol-75px">
                                                @if($item->gambar == null)
                                                <img src="admin/assets/media/avatars/blank.png" alt="image">
                                                @else
                                                <img src="{{ asset('/storage/gambar/' . $item->gambar) }}" alt="image">
                                                @endif
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a class="text-gray-800 fs-5 fw-bold mb-2" data-kt-ecommerce-category-filter="category_name">{{ $item->judul }}</a>
                                                <!--end::Title-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7 fw-bold mt-2">url : <a href="berita/{{ $item->slug }}" class="text-muted text-hover-primary">https://www.lib.ibrahimy.ac.id/berita/{{ $item->slug }}</a></div>
                                                <!--end::Description-->
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</td>
                                    <td class="text-end pe-4">
                                        <a href="#" class="btn btn-sm btn-light-warning btn-active-warning btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('berita-edit'))
                                            <div class="menu-item px-3">
                                                <a href="admin/berita=edit({{ $item->id }})" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            @endif
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('berita-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('/admin/berita('.$item->id.')/hapus') }}" class="menu-link px-3 delete-button">Hapus</a>
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
    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
</div>



@endsection
