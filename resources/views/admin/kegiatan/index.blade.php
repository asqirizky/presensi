@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Kegiatan</h1>
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
                        <li class="breadcrumb-item text-muted">Kegiatan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/kegiatan" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
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
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card header-->
					<!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4">
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Kegiatan"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Ket" data-kt-ecommerce-product-filter="status">
                                    <option></option>
                                    <option value="all">Semua</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Terlaksana">Terlaksana</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            @if(auth()->user()->hasPermissionTo('kegiatan-tambah'))
                            <!--begin::Add product-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
                                <i class="ki-outline ki-plus fs-2"></i>Tambah Kegiatan
                            </button>
                            <!--end::Add product-->
                            @endif
                        </div>
                        @include('admin.kegiatan.tambah')
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-striped fs-6 gy-5" id="kt_ecommerce_products_table">
							<thead class="fw-bold fs-5 bg-success">
								<tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
									<th class="rounded-start ps-5 min-800px">Kegiatan</th>
									<th></th>
									<th></th>
									<th class="text-center">Kategori</th>
									<th>Waktu</th>
									<th>PJ/K.Panitia</th>
									<th class="text-center">Keterangan</th>
									<th class="text-end rounded-end pe-5">Opsi</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
                                @foreach ($kegiatan as $item)
								<tr>
                                    <td class="ps-5">{{ $item->kegiatan }}</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        @if($item->kategori == 'Mingguan')
                                        <div class="badge py-3 px-4 fs-7 badge-light-info">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == 'Bulanan')
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">{{ $item->kategori }}</div>
                                        @elseif($item->kategori == 'Tahunan')
                                        <div class="badge py-3 px-4 fs-7 badge-light-primary">{{ $item->kategori }}</div>
                                        @endif
									</td>
                                    <td>{{ Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM Y') }}</td>
									<td>{{ $item->pj }}</td>
									<td class="text-center">
                                        @if($item->ket == 'Terlaksana')
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">{{ $item->ket }}</div>
                                        @else
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">{{ $item->ket }}</div>
                                        @endif
                                    </td>
									<td class="text-end pe-5">
                                        @if(auth()->user()->hasPermissionTo('kegiatan-ubah'))
                                        @if($item->ket == 'Belum')
                                        <button type="button" class="btn btn-icon btn-sm btn-light-success me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_ubah_{{ $item->id }}">
                                            <i class="ki-outline ki-check fs-2"></i>
                                        </button>
                                        @else
                                        @endif
										@endif
										<a href="#" class="btn btn-light-success btn-active-success btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
											<!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('kegiatan-edit'))
											<div class="menu-item px-3">
                                                <a href=# class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{ $item->id }}">Edit</a>
											</div>
                                            @endif
											<!--end::Menu item-->
											<!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('kegiatan-hapus'))
											<div class="menu-item px-3">
                                                <a href="{{ asset('/admin/kegiatan('.$item->id.')/hapus') }}" class="menu-link px-3 delete-button">Hapus</a>
											</div>
                                            @endif
											<!--end::Menu item-->
										</div>
                                        @include('admin.kegiatan.edit')
                                        @include('admin.kegiatan.ubah')
										<!--end::Menu-->
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
		<script src="admin/assets/js/custom/apps/ecommerce/catalog/products.js"></script>
		<script src="admin/assets/js/widgets.bundle.js"></script>
		<script src="admin/assets/js/custom/widgets.js"></script>
		<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
		<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
</div>



@endsection
