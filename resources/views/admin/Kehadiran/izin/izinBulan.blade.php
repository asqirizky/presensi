@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="py-3 app-toolbar py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="flex-wrap page-title d-flex flex-column justify-content-center me-3">
                    <!--begin::Title-->
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">
                        Data Izin Pegawai</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Izin</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="pt-6 border-0 card-header bg-success">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="my-1 d-flex align-items-center position-relative">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center" data-kt-user-table-toolbar="base">
                                <!-- Filter Form -->
                                <form method="GET" class="d-flex flex-wrap gap-2 align-items-end">
                                    <div>
                                        <select name="bulan" id="bulan" class="form-select" data-control="select2" data-hide-search="true">
                                            @foreach(range(1, 12) as $b)
                                                <option value="{{ $b }}" {{ request('bulan', now()->month) == $b ? 'selected' : '' }}>
                                                    {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <select name="tahun" id="tahun" class="form-select" data-control="select2" data-hide-search="true">
                                            @foreach(range(now()->year - 5, now()->year + 1) as $t)
                                                <option value="{{ $t }}" {{ request('tahun', now()->year) == $t ? 'selected' : '' }}>
                                                    {{ $t }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-danger">
                                        <i class="ki-outline ki-filter fs-5"></i> Filter
                                    </button>

                                    <a href="admin/kehadiran-izin" class="btn btn-warning">
                                        <i class="ki-outline ki-calendar fs-5"></i> Perhari
                                    </a>
                                </form>

                                <!-- Button Tambah Izin -->
                                @if(auth()->user()->hasPermissionTo('kehadiran izin-tambah'))
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
                                        <i class="ki-duotone ki-plus fs-2"></i> Tambah Izin
                                    </a>

                                    @include('admin.Kehadiran.izin.izinpegawai_tambah')
                                @endif

                            </div>
                        </div>

                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="py-4 card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead class="fw-bold fs-5 bg-success">
                                <tr class="text-white text-start fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start w-10px pe-2"></th>
                                    <th class="text-start min-w-125px">Nama</th>
                                    <th class="text-center min-w-100px">Tanggal Mulai</th>
                                    <th class="text-center min-w-100px">Tanggal Selesai</th>
                                    <th class="text-center"></th>
                                    <th class="text-center min-w-100px">Keterangan</th>
                                    <th></th>
                                    <th class="text-center rounded-end min-w-100px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($izin as $item)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="px-4 py-3 badge fs-7 badge-light-primary">{{ $item->nik }} - {{ $item->nama_pegawai }}</div>
                                    </td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($item->tgl_mulai)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($item->tgl_selesai)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td></td>
                                    <td class="text-center">{{ $item->keterangan }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center pe-4">
                                        <a href="#" class="btn btn-sm btn-light-primary btn-active-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('kehadiran izin-edit'))
                                                <div class="px-3 menu-item">
                                                    <a class="px-3 menu-link" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target{{ $item->id }}">Edit</a>
                                                </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('kehadiran izin-hapus'))
                                                <div class="px-3 menu-item">
                                                    <a href="{{ route('kehadiran-izin.hapus', $item->id) }}" class="px-3 menu-link delete-button">Hapus</a>
                                                </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    @include('admin.Kehadiran.izin.izinEdit')
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
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
</div>
<!--end:::Main-->

<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
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
<!--end::Javascript-->

@endsection
