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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Data Bebas Pustaka Mahasiswa</h1>
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
                        <li class="breadcrumb-item text-muted">Bebas Pustaka</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
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
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Mahasiswa"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Angkatan" data-kt-ecommerce-product-filter="status">
                                    <option></option>
                                    <option value="all">Semua</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            @if(auth()->user()->hasPermissionTo('layanan bebas pustaka-export'))
                            <a href="#" class="btn btn-light-success"><i class="ki-outline ki-exit-up fs-2"></i>Export</a>
                            @endif
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-striped fs-6 gy-4" id="kt_ecommerce_products_table">
							<thead class="fw-bold fs-5 bg-success">
								<tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
									<th class="rounded-start ps-5 min-800px">Pemberkasan</th>
									<th>Nama Mahasiswa</th>
									<th>Fakultas</th>
									<th>Prodi</th>
									<th></th>
									<th></th>
									<th>Angkatan</th>
									<th class="text-end rounded-end pe-5">Opsi</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
                                @foreach ($plagiasi as $item)
                                @continue(is_null($item->mahasiswa_id)) {{-- lewati jika mahasiswa_id null --}}
                                @if(optional($item->riwayatPlagiasi->last())->persentase <= 30)
                                @if(optional($item->riwayatPlagiasi->last())->persentase == null)
                                @else
								<tr>
                                    <td class="ps-5">
                                        @if($item->ket == null)
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">Belum</div>
                                        @else
                                        <div class="badge py-3 px-4 fs-7 badge-light">{{ Carbon\Carbon::parse($item->updated_at)->isoFormat('D MMMM Y') }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold mb-1 fs-6">{{ $item->mahasiswa->nama }}</div>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $item->mahasiswa->nim }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->mahasiswa->programstudi->fakultas == 'Syariah dan Ekonomi Islam')
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @elseif($item->mahasiswa->programstudi->fakultas == 'Dakwah')
                                        <div class="badge py-3 px-4 fs-7 badge-light-info">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @elseif($item->mahasiswa->programstudi->fakultas == 'Tarbiyah')
                                        <div class="badge py-3 px-4 fs-7 badge-light-warning">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @elseif($item->mahasiswa->programstudi->fakultas == 'Sains dan Teknologi')
                                        <div class="badge py-3 px-4 fs-7 badge-light-primary">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @elseif($item->mahasiswa->programstudi->fakultas == 'Sosial dan Humaniora')
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @elseif($item->mahasiswa->programstudi->fakultas == 'Ilmu Kesehatan')
                                        <div class="badge py-3 px-4 fs-7 badge-light-secondary">Fakultas {{ $item->mahasiswa->programstudi->fakultas }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $item->mahasiswa->prodi }}</td>
                                    <td></td>
                                    <td></td>
									<td>{{ $item->mahasiswa->angkatan }}</td>
									<td class="text-end pe-4">
                                        @if($item->ket == 'Terverifikasi')
                                        @if(auth()->user()->hasPermissionTo('layanan bebas pustaka-cetak'))
                                        <a href="{{ asset('ketbebaspustaka='.$item->id.'') }}" target="_blank" class="btn btn-success btn-sm me-1 hover-scale">Cetak Ket.</a>
                                        @endif
                                        @elseif($item->ket == 'Permohonan Terkirim')
                                        <div class="badge py-3 px-4 fs-7 badge-light-info">Permohonan Terkirim</div>
                                        @else
                                        @if(auth()->user()->hasPermissionTo('layanan bebas pustaka-kirim'))
                                        <form action="{{ route('kirim', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nama" value="{{ $item->mahasiswa->nama }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">

                                            <button type="submit" class="btn btn-primary btn-sm me-1 hover-scale konfirmasi">
                                                Verifikasi
                                            </button>
                                        </form>
                                        @endif
                                        @endif
                                    </td>
								</tr>
                                @endif
                                @endif
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.konfirmasi').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const form = this.closest('form'); // Cari form terdekat dari tombol

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda akan mengirim pesan permintaan verifikasi kepada pimpinan!",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: 'Yakin!',
                            cancelButtonText: 'Batal',
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Submit form jika dikonfirmasi
                            }
                        });
                    });
                });
            });
        </script>
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
