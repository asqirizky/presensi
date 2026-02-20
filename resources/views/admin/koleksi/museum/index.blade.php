@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Museum</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Museum</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
        </div>
        <!--begin::Content-->


        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Products-->
                <!--begin::Lists Widget 19-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Heading-->
                    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px" style="background-image:url('admin/assets/media/santri/bg2.png" data-bs-theme="light">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column text-white pt-15">
                            <span class="fw-bold fs-2x mb-3">Museum</span>
                            <div class="fs-4 text-white">
                                <span class="opacity-75">iGLAM - Ibrahimy Gallery Library Archive Museum</span>
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
                            <!--begin::Items-->
                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-2 py-5">
                                <!--begin::Symbol-->
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                            <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Museum"/>
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    @if(auth()->user()->hasPermissionTo(permission: 'koleksi museum-tambah'))
                                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                        <!--begin::Add product-->
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kt_modal_tambah">
                                            <i class="ki-outline ki-plus fs-2"></i>Tambah
                                        </button>
                                        <!--end::Add product-->
                                    </div>
                                    @endif
                                    @include('admin.koleksi.museum.tambah')
                                </div>
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gs-0 gy-4" id="kt_ecommerce_products_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bold text-white bg-danger">
                                                    <th class="ps-4 rounded-start">Museum</th>
                                                    <th></th>
                                                    <th>Tipe</th>
                                                    <th>Pembuat</th>
                                                    <th></th>
                                                    <th class="text-center me-2">Tanggal</th>
                                                    <th>Lembaga</th>
                                                    <th class="text-end rounded-end pe-4">Opsi</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @foreach ($museum as $item)
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <!--begin:: Gambar -->
                                                        <div class="symbol symbol-50px overflow-hidden me-3">
                                                            <div class="symbol-label">
                                                                <img src="{{ asset('/storage/koleksi/museum/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100" />
                                                            </div>
                                                        </div>
                                                        <!--end::Gambar-->
                                                        <!--begin::User details-->
                                                        <div class="d-flex flex-column">
                                                            <div class="text-gray-800 fw-bold fs-6 mb-1">{{ $item->judul }}</div>
                                                        </div>
                                                        <!--begin::User details-->
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        @if($item->tipe == null)
                                                        <div class="badge py-3 px-4 badge-light-warning fs-7">Belum diketahui</div>
                                                        @else
                                                        <div class="badge py-3 px-4 badge-light-primary fs-7">{{ $item->tipe }}</div>
                                                        @endif
                                                    </td>
                                                    <td class="fw-bold">
                                                        @if($item->pembuat == null)
                                                        <div class="badge py-3 px-4 badge-light-danger fs-7">Belum diketahui</div>
                                                        @else
                                                        {{ $item->pembuat }}
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <div class="badge py-3 px-4 badge-light-secondary fs-7">{{ Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</div>
                                                    </td>
                                                    <td>
                                                        @if($item->lembaga == null)
                                                        <div class="badge py-3 px-4 badge-light-danger fs-7">Belum diketahui</div>
                                                        @else
                                                        <div class="badge py-3 px-4 badge-light-success fs-7">{{ $item->lembaga }}</div>
                                                        @endif
                                                    </td>
                                                    <td class="text-end pe-4">
                                                        <button class="btn btn-sm btn-light-danger btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                                        <i class="ki-outline ki-down fs-5 ms-1"></i></button>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <!--end::Menu item-->
                                                            @if(auth()->user()->hasPermissionTo('koleksi museum-edit'))
                                                            <div class="menu-item px-3">
                                                                <a href="{{ asset('/admin/koleksi-museum='. $item->id) }}" class="menu-link px-3">Edit</a>
                                                            </div>
                                                            @endif
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            @if(auth()->user()->hasPermissionTo('koleksi museum-hapus'))
                                                            <div class="menu-item px-3">
                                                                <a href="{{ asset('/admin/koleksi-museum/'.$item->id.'/hapus') }}" data-url="" class="menu-link px-3 delete-button">Hapus</a>
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
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                                <!--end::Stats-->
                            </div>
                            <!--end::Items-->
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Lists Widget 19-->
                <!--end::Products-->
            </div>
        </div>
    </div>
</div>


<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="admin/assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--begin::Vendors Javascript(used for this page only)-->
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<!--end::Custom Javascript-->
@include('layout.footer')

@endsection
