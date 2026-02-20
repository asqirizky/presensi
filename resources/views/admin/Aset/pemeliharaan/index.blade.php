@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">{{ $unit->aset->nama }} - No.INV : {{ $unit->aset->kategori->kode.'/'. Carbon\Carbon::parse($unit->tanggal)->isoFormat('DD.MM.YY').'/'.$unit->sumber->kode.'/'.str_pad($unit->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$unit->kode_unit }}</h1>
                    <!--end::Title-->
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
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/aset" class="text-muted text-hover-primary">Data Aset</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ asset('/admin/aset-detail('.$unit->aset->id.')') }}" class="text-muted text-hover-primary">Detail</a>
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
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Basic info-->
                <div class="row g-xxl-9">
                    <div class="col-xl-3">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol mb-7">
                                        <img src="{{ asset('/storage/fotobarang/' . $unit->foto) }}" alt="image" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="fs-3 text-gray-800 fw-bold mb-3">{{ $unit->aset->nama }}</div>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="mb-9">
                                        <!--begin::Badge-->
                                        <div class="badge py-3 px-4 fs-7 badge-light-info d-inline">{{ $unit->aset->kategori->kode.'/'. Carbon\Carbon::parse($unit->tanggal)->isoFormat('DD.MM.YY').'/'.$unit->sumber->kode.'/'.str_pad($unit->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$unit->kode_unit }}</div>
                                        <!--begin::Badge-->
                                    </div>
                                    <!--end::Position-->
                                </div>
                                <!--end::User Info-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3 mb-2">
                                    <div class="fw-bold">Detail</div>
                                </div>
                                <!--end::Details toggle-->
                                {{-- @include('admin.Aset.aset.editunit') --}}
                                <div class="separator"></div>
                                <!--begin::Details content-->
                                <div class="pb-5 fs-6">
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Tanggal</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: {{ Carbon\Carbon::parse($unit->tanggal)->isoFormat('D MMMM Y') }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Sumber</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: {{ $unit->sumber->sumberdana }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Harga</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: Rp {{ number_format($unit->harga, 0, ',', '.') }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Lokasi</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: {{ $unit->lokasi->lokasi }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Kondisi</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: {{ $unit->kondisi }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">No.Bukti</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">: {{ $unit->nb }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--end::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Kwitansi</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
                                            <a href="{{ asset('/storage/kwitansi/' . $unit->kwitansi) }}" target="_blank" class="symbol symbol-100px">
                                                <img alt="Pic" src="{{ asset('/storage/kwitansi/' . $unit->kwitansi) }}" />
                                            </a>
                                        </div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-xl-9">
                        <!--begin::Table Widget 5-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Riwayat Pemeliharaan</span>
                                    <span class="text-gray-500 mt-1 fw-semibold fs-6">{{ $unit->aset->nama }} - No.INV : {{ $unit->aset->kategori->kode.'/'. Carbon\Carbon::parse($unit->tanggal)->isoFormat('DD.MM.YY').'/'.$unit->sumber->kode.'/'.str_pad($unit->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$unit->kode_unit }}</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Actions-->
                                <div class="card-toolbar">
                                    <!--begin::Filters-->
                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                        <!--begin::Destination-->
                                        <!--begin::Search-->
                                        {{-- <a href="#" class="btn btn-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_update_unit{{ $aset->id }}">Tambah Unit</a> --}}
                                        @if(auth()->user()->hasPermissionTo('aset-tambah pemeliharaan'))
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_tambah">Tambah</button>
                                        @endif
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Filters-->
                                    @include('admin.Aset.pemeliharaan.tambah')
                                </div>
                                <!--end::Actions-->
                                <!--begin::View component-->

                                <!--end::View component-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_ecommerce_products_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="fw-bold text-white bg-info">
                                            <th class="rounded-start ps-4">Tanggal</th>
                                            <th></th>
                                            <th class="">Kategori</th>
                                            <th class="">Deskripsi</th>
                                            <th class="">Petugas</th>
                                            <th class="">Biaya</th>
                                            <th></th>
                                            <th class="text-end rounded-end pe-4">Opsi</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($unit->pemeliharaan as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <div class="badge py-3 px-4 fs-7 badge-light-info">
                                                    {{ Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}
                                                </div>
                                            </td>
                                            <td></td>
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
                                            <td>
                                                <div class="badge py-3 px-4 fs-7 badge-light-success">
                                                Rp {{ number_format($item->biaya, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td></td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></button>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    @if(auth()->user()->hasPermissionTo('aset-edit pemeliharaan'))
                                                    <div class="menu-item px-3">
                                                        <a class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{ $item->id }}">Edit</a>
                                                    </div>
                                                    @endif
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    @if(auth()->user()->hasPermissionTo('aset-edit pemeliharaan'))
                                                    <div class="menu-item px-3">
                                                        <a href="{{ asset('/admin/aset-pemeliharaan='.$item->id.'/hapus') }}" class="menu-link px-3 delete-button" data-kt-users-table-filter="delete_row" data-confirm-delete="true">Hapus</a>
                                                    </div>
                                                    @endif
                                                    <!--end::Menu item-->
                                                </div>
                                                @include('admin.Aset.pemeliharaan.edit')
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
                        <!--end::Table Widget 5-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
</div>
@include('layout.footer')

<!--begin::Javascript-->
<script>
    var hostUrl = "admin/assets/";
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
@endsection

<!--end::Javascript-->

