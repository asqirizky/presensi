@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Riwayat Pemeliharaan Aset</h1>
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
                        <li class="breadcrumb-item text-muted">Pemeliharaan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
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
                            <!--end::Add product-->
                        </div>
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
                                    <tr class="fw-bold text-white bg-info">
                                        <th class="ps-4 rounded-start">Tanggal</th>
                                        <th>Barang</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Petugas</th>
                                        <th></th>
                                        <th>Biaya</th>
                                        <th class="text-end rounded-end pe-4">Opsi</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($pemeliharaan as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="badge py-3 px-4 fs-7 badge-light-info">
                                                {{ Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM Y') }}
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Gambar -->
                                            <div class="symbol symbol-50px overflow-hidden me-3">
                                                <div class="symbol-label">
                                                    <img src="{{ asset('/storage/fotobarang/' . $item->unit->foto) }}" alt="{{ $item->judul }}" class="w-100" />
                                                </div>
                                            </div>
                                            <!--end::Gambar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <div class="ms-2 text-gray-900 fw-bold mb-1 fs-5">{{ $item->unit->aset->nama }}</div>
                                                <span class="badge fs-7 badge-light-success">No.INV : {{ $item->unit->aset->kategori->kode.'/'. Carbon\Carbon::parse($item->unit->tanggal)->isoFormat('DD.MM.YY').'/'.$item->unit->sumber->kode.'/'.str_pad($item->unit->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$item->unit->kode_unit }}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <td>
                                            @if($item->kategori == "Perbaikan")
                                            <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ $item->kategori }}</div>
                                            @elseif($item->kategori == "Servis Rutin")
                                            <div class="badge py-3 px-4 fs-7 badge-light-primary">{{ $item->kategori }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fs-7">{{ $item->deskripsi }}</span>
                                        </td>
                                        <td>{{ $item->petugas }}</td>
                                        <td></td>
                                        <td>
                                            <div class="badge py-3 px-4 fs-7 badge-light-success">
                                            Rp {{ number_format($item->biaya, 0, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            @if(auth()->user()->hasPermissionTo('aset-lihat pemeliharaan'))
                                            <a href="{{ asset('admin/aset-pemeliharaan='.$item->unit->id.'') }}" class="btn btn-info btn-sm me-1">Detail</a>
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

<!--end::Javascript-->
@endsection

