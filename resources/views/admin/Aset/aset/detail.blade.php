@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">{{ $aset->nama }}</h1>
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
                        <li class="breadcrumb-item text-muted">Detail</li>
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
                    <div class="col-xl-4">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->
                                {{-- <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Name-->
                                    <div class="fs-3 text-gray-800 fw-bold mb-3">{{ $aset->nama }}</div>
                                    <!--end::Name-->
                                </div>
                                <!--end::User Info--> --}}
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3 mb-2">
                                    <div class="fw-bold">Detail Barang</div>
                                    @if(auth()->user()->hasPermissionTo('aset-edit'))
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{ $aset->id }}">Edit</a>
                                    @endif
                                </div>
                                <!--end::Details toggle-->
                                @include('admin.Aset.aset.edit')
                                <div class="separator"></div>
                                <!--begin::Details content-->
                                <div>
                                    <div class="pb-5 fs-6">
                                        <!--begin::Row-->
										<div class="row mb-7 mt-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Nama</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ $aset->nama }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Ketegori</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ $aset->kategori->kategori }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Jenis</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ $aset->kategori->jenis }}<span class="ms-2 badge badge-lg badge-light-success">{{ $aset->kategori->kode }}</span></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Jumlah</label>
											<!--end::Label-->
                                            @php
                                                $jumlah = App\Models\Aset\Aset_unit::where('aset_id', $aset->id)->count();
                                            @endphp
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ $jumlah }} Unit</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Dibuat</label>
											<!--end::Label-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ Carbon\Carbon::parse($aset->created_at)->isoFormat('dddd, D MMMM Y - HH:MM') }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Diperbarui</label>
											<!--end::Label-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">{{ Carbon\Carbon::parse($aset->updated_at)->isoFormat('dddd, D MMMM Y - HH:MM') }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-xl-8">
                        <!--begin::Table Widget 5-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">{{ $aset->nama }}</span>
                                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Terdapat {{ $jumlah }} Unit Barang</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Actions-->
                                <div class="card-toolbar">
                                    <!--begin::Filters-->
                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                        <!--begin::Destination-->
                                        <!--begin::Search-->
                                        {{-- <a href="#" class="btn btn-light-success btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_update_unit{{ $aset->id }}">Tambah Unit</a> --}}
                                        @if(auth()->user()->hasPermissionTo('aset-cetak label'))
                                        <a target="_blank" href="{{ asset('/admin/aset-cetaklabel('.$aset->id.')') }}" class="btn btn-light-warning btn-sm">Cetak Label</a>
                                        @endif
                                        @if(auth()->user()->hasPermissionTo('aset-tambah unit'))
                                        <button href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_tambah_unit">Tambah Unit</button>
                                        @endif
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Filters-->
                                </div>
                                @include('admin.Aset.aset.tambahunit')
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
                                        <tr class="fw-bold text-white bg-success">
                                            <th class="min-w-200px rounded-start ps-4">No.Inventaris</th>
                                            <th></th>
                                            <th class="text-end pe-3 min-w-100px">Tanggal</th>
                                            <th></th>
                                            <!--<th class="text-end pe-3 min-w-150px">Harga</th>-->
                                            <!--<th class="text-end pe-3 min-w-100px">NB</th>-->
                                            <th class="text-end pe-3 min-w-100px">Lokasi</th>
                                            <th class="text-end pe-3 min-w-100px">Kondisi</th>
                                            <th></th>
                                            <th class="text-end pe-0 min-w-75px rounded-end pe-4">Opsi</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($aset->units as $item)
                                        <tr>
                                            <!--begin::Item-->
                                            <td class="ps-4">
                                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_detail_unit{{ $item->id }}" class="text-gray-900 text-hover-primary">{{ $aset->kategori->kode.'/'. Carbon\Carbon::parse($item->tanggal)->isoFormat('DD.MM.YY').'/'.$item->sumber->kode.'/'.str_pad($aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$item->kode_unit }}</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td></td>
                                            <td class="text-end">{{ Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMM Y') }}</td>
                                            <!--end::Product ID-->
                                            <td></td>
                                            <!--begin::Date added-->
                                            {{-- <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td> --}}
                                            <!--end::Date added-->
                                            <!--begin::Date added-->
                                            <td class="text-end">{{ $item->lokasi->lokasi }}</td>
                                            <!--end::Date added-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                @if($item->kondisi == "Baik")
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">Baik</span>
                                                @elseif($item->kondisi == "Rusak")
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Rusak</span>
                                                @elseif($item->kondisi == "Hilang")
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">Hilang</span>
                                                @endif
                                            </td>
                                            <!--end::Status-->
                                            <td></td>
                                            <!--begin::Qty-->
                                            <td class="text-end pe-2">
                                                @if(auth()->user()->hasPermissionTo('aset-lihat pemeliharaan'))
                                                <a href="{{ asset('admin/aset-pemeliharaan='.$item->id.'') }}" class="btn btn-icon btn-light-warning btn-sm"><i class="ki-outline ki-setting-2"></i></a>
                                                @endif
                                                @if(auth()->user()->hasPermissionTo('aset-edit unit'))
                                                <a href="#" class="btn btn-icon btn-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_unit{{ $item->id }}"><i class="ki-outline ki-pencil"></i></a>
                                                @endif
                                                @if(auth()->user()->hasPermissionTo('aset-hapus unit'))
                                                <a href="{{ asset('admin/aset-hapus('.$item->id.')') }}" class="btn btn-icon btn-light-danger btn-sm delete-button"><i class="ki-outline ki-trash"></i></a>
                                                @endif
                                            </td>
                                            <!--end::Qty-->
                                            @include('admin.Aset.aset.editunit')
                                            @include('admin.Aset.aset.detailunit')
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

