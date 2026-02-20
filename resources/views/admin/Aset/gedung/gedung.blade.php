@extends('layout.sidebarnavbar')
@section('admin-konten')

<!-- content -->
 {{-- content --}}
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Gedung</h1>
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
                        <li class="breadcrumb-item text-muted">Data Gedung</li>
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
				<!--begin::Category-->
				<div class="card card-flush">
					<!--begin::Card header-->
					<div class="card-header align-items-center py-5 gap-2 gap-md-5">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1">
								<i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
								<input type="text" data-kt-ecommerce-category-filter="search" class="form-control w-350px ps-12" placeholder="Cari Gedung" />
							</div>
							<!--end::Search-->
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
                        @if(auth()->user()->hasPermissionTo('lokasi aset-tambah'))
						<div class="card-toolbar">
							<!--begin::Add customer-->
							<!--begin::Add product-->
							<a class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Tambah Gedung</a>
							<!--end::Add product-->
                            @include('admin.Aset.gedung.tambah')
                            <!--end::Add customer-->
						</div>
                        @endif
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table-->
						<table class="table align-middle gs-0 gy-4 table-row-dashed" id="kt_ecommerce_category_table">
							<thead>
								<tr class="fw-bold text-white bg-primary">
									<th class="ps-4 rounded-start text-start min-w-100px">Gedung</th>
									<th class="text-start min-w-100px">Luas</th>
									<th>Jumlah Lantai</th>
									<th class="text-end min-w-70px pe-4 rounded-end">Opsi</th>
								</tr>
							</thead>
							<tbody class="fw-semibold text-gray-600">
                                @foreach ( $gedung as $item )
                                <tr>
									<td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold mb-1 fs-6">{{ $item->gedung }}</div>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $item->area }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->luas == null)
										<div class="badge py-3 px-4 fs-7 badge-light-danger">Belum Diketahui</div>
                                        @else
										<div class="badge py-3 px-4 fs-7 badge-light-primary">{{ $item->luas }}</div>
                                        @endif
                                    </td>
									<td>
										<!--begin::Badges-->
                                        <div class="text-gray-900 fw-bold mb-1 fs-6">{{ $item->lantai }}</div>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Lantai</span>										<!--end::Badges-->
                                    </td>
									<td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
										<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('gedung aset-edit'))
											<div class="menu-item px-3">
                                                <a class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#kt_modal_update_edit{{ $item->id }}">Edit</a>
											</div>
                                            @endif
											<!--end::Menu item-->
											<!--begin::Menu item-->
                                            @if(auth()->user()->hasPermissionTo('gedung aset-hapus'))
                                            <div class="menu-item px-3">
                                                <a href="{{ asset('admin/aset-gedung('.$item->id.')/hapus') }}" class="menu-link px-3 delete-button" data-kt-users-table-filter="delete_row" data-confirm-delete="true">Hapus</a>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
										</div>
                                        @include('admin.Aset.gedung.edit')
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
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
    </div>
</div>

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>
<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="admin/assets/js/custom/apps/ecommerce/catalog/categories.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

@endsection
