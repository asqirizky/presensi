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
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">Lokasi</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Absensi</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Lokasi</li>
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
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="gap-2 py-5 card-header align-items-center gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="my-1 d-flex align-items-center position-relative">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                         <!--begin::Card toolbar-->
                         @if(auth()->user()->hasPermissionTo('absen barokah-tambah'))
                         <div class="card-toolbar">
                            <!--begin::Select-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah Barokah
                            </button>
                            <!--end::Select-->
                            @include('admin.Absensi.Barokah.tambah_barokah')
                        </div>
                        @endif
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="pt-0 card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed table-striped fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead class="fw-bold fs-5 bg-info">
                                <tr class="text-start text-white-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start w-10px"></th>
                                    <th class="text-center min-w-200px"></th>
                                    <th class="text-center min-w-100px"></th>
                                    <th class="text-center min-w-70px">Nominal Barokah</th>
                                    <th class="text-center min-w-100px"></th>
                                    <th class="text-center min-w-100px"></th>
                                    <th class="text-center min-w-100px"></th>
                                    <th class="text-center rounded-end">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($barokah as $item)

                                <tr>
                                    <td></td>
                                    <td class="text-center text-gray-900"></td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"></span>
                                    </td>
                                    <td class="text-center text-gray-900 pe-0">Rp. {{ $item->barokah }}</td>
                                    <td class="text-center text-gray-900 pe-0"><span class="fw-bold"></span></td>
                                    <td class="text-center text-gray-900 pe-0"></td>
                                    <td class="text-center pe-0" data-order="Published">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success"></div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
										<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px" data-kt-menu="true">
                                            <!--begin::Menu item-->
											<div class="px-3 menu-item">
                                                <a class="px-3 menu-link" data-bs-toggle="modal" data-bs-target="#kt_modal_update_edit{{ $item->id }}">Edit</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="{{ asset('/admin/absensi-barokah('.$item->id.')/hapus') }}" class="px-3 menu-link" data-kt-users-table-filter="delete_row" data-confirm-delete="true">Hapus</a>
                                            </div>
                                            <!--end::Menu item-->
										</div>
                                        @include('admin.absensi.barokah.editbarokah')
										<!--end::Menu-->
									</td>
                                </tr>
                                @empty
                                <tr><td colspan="8" class="text-center">No available data in table</td></tr>

                                @endforelse
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="py-3 app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack">
            <!--begin::Copyright-->
            <div class="order-2 text-gray-900 order-md-1">
                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Ibrahimy Library Developer Team</a>
            </div>
            <!--end::Copyright-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->

@endsection
