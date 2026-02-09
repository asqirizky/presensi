@extends('layout.sidebarnavbar')
@section('admin-konten')

<!-- content -->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Aset</h1>
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
                        <li class="breadcrumb-item text-muted">Data Aset</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
        </div>
        <!--begin::Content-->

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Statistik-->
                <div class="row g-5 g-xl-8 mb-2">
                    <div class="col-xl-12">
                        <!--begin: Statistics Widget 6-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-1 pe-0 pb-0 ">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <div class="text-gray-900 fw-bold fs-2 mb-4">Statisitik Aset Perpustakaan Ibrahimy</div>
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-bank fs-3 text-success me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Aset\Aset_gedung::count() }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <div class="fw-semibold fs-6 text-gray-600">Gedung</div>
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-element-10 fs-3 text-danger me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Aset\Aset_lokasi::count() }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <div class="fw-semibold fs-6 text-gray-600">Ruang</div>
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-lots-shopping fs-3 text-primary me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Aset\Aset::count() }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <div class="fw-semibold fs-6 text-gray-600">Barang</div>
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-element-2 fs-3 text-info me-2">
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Aset\Aset_unit::count() }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <div class="fw-semibold fs-6 text-gray-600">Unit</div>
                                        </div>
                                        <!--end::Stat-->
                                        @php
                                            $total = App\Models\Aset\Aset_unit::sum('harga');
                                        @endphp
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                            <div class="fw-semibold fs-6 text-gray-600">Total Kekayaan Aset</div>
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-tag  fs-3 text-warning me-2">
                                                </i>
                                                <span class="fs-2 fw-bold">Rp.</span>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $total }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                </div>
                                <img src="admin/assets/media/santri/menara.png" alt="" class="align-self-end h-150px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>
                </div>
                <!--end::Statistik-->
                <!--begin::Products-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Barang" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Add product-->
                            @if(auth()->user()->hasPermissionTo('aset-export'))
                            <a href="#" class="btn btn-light-success" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="ki-outline ki-exit-up fs-2"></i>Export</a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    @foreach ($lokasi as $lok)
                                    <div class="menu-item px-3">
                                        <a href="{{ asset('/admin/aset-export('.$lok->id.')') }}" class="menu-link px-3">{{ $lok->lokasi }}</a>
                                    </div>
                                    @endforeach
                                    <!--end::Menu item-->
                                </div>
                            @endif
                            @if(auth()->user()->hasPermissionTo('aset-tambah'))
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_tambah"><i class="ki-outline ki-plus fs-2"></i>Tambah</a>
                            @endif
                            <!--end::Add product-->
                        </div>
                        @include('admin.aset.aset.tambah')
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-striped gs-0 gy-4" id="kt_ecommerce_products_table">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-white bg-primary">
                                        <th class="ps-4 rounded-start">Barang</th>
                                        <th>Kategori Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-end rounded-end pe-4">Opsi</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($aset as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold mb-1 fs-6">{{ $item->nama }}</div>
                                                    <span class="text-muted fw-semibold text-muted d-block fs-7">ditambahkan pada: {{ Carbon\Carbon::parse($item->create_at)->isoFormat('D MMMM Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->kategori->kategori }}</td>
                                        <td>
                                            <div class="text-gray-900 mb-1 fs-6">{{ $item->kategori->kode }}</div>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $item->kategori->jenis }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $jumlah = App\Models\Aset\Aset_unit::where('aset_id', $item->id)->count();
                                            @endphp
                                            <div class="text-gray-900 mb-1 fs-6">{{ $jumlah }}</div>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">Barang</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-end pe-4">
                                            @if(auth()->user()->hasPermissionTo('aset-detail'))
                                            <a href="{{ asset('/admin/aset-detail('.$item->id.')') }}" class="btn btn-light-success btn-sm me-1">Detail</a>
                                            @endif
                                            @if(auth()->user()->hasPermissionTo('aset-hapus'))
                                            <a href="{{ asset('admin/aset('.$item->id.')/hapus') }}" class="btn btn-light-danger btn-sm delete-button">Hapus</a>
                                            @endif
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
                </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-button').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('href'); // Ambil URL dari atribut href
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-danger', // Gaya tombol
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke URL untuk menghapus data
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
<!--end::Javascript-->
@endsection

