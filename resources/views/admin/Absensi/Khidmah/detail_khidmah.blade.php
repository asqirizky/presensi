@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="py-3 app-toolbar py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="flex-wrap page-title d-flex flex-column justify-content-center me-3">
                    <!--begin::Title-->
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">Data Tenaga Khidmah</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/absensi-khidmah" class="text-muted text-hover-primary">Khidmah</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $khidmah->nama }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
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
                                <!--begin::Details toggle-->
                                @if(auth()->user()->hasPermissionTo('absen khidmah-edit'))
                                <div class="py-3 mb-2 d-flex flex-stack fs-4">
                                    <div class="fw-bold">Detail Khidmah</div>
                                    <a class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_edit{{ $khidmah->id }}">Edit</a>
                                </div>
                                <!--end::Details toggle-->
                                @include('admin.Absensi.Khidmah.edit_khidmah')
                                @endif
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
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->nama }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->tempat_lahir }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Tgl. Lahir</label>
											<!--end::Label-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ Carbon\Carbon::parse($khidmah->tanggal_lahir)->isoFormat('dddd, D MMMM Y') }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Tgl. Khidmah</label>
											<!--end::Label-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ Carbon\Carbon::parse($khidmah->tanggal_khidmah)->isoFormat('dddd, D MMMM Y') }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                        <div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Alamat</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->alamat }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                        <div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Asrama</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->asrama }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                        <div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Lokasi</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->lokasi }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                        <div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Pend. Pagi</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->diniyah }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
                                        <div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Pend. Sore</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="text-gray-800 fw-bold fs-6">{{ $khidmah->sekolah_sore }}</span>
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
                        <form class="form" method="POST" enctype="multipart/form-data" action="{{ asset('admin/absensi-khidmah/kelolah-shift/'.$khidmah->id) }}">
                        @csrf
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="text-gray-900 card-label fw-bold">Tambah shift untuk</span>
                                    <span class="mt-1 text-gray-500 fw-semibold fs-6">{{ $khidmah->nama }}</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Actions-->
                                <div class="card-toolbar">
                                    <!--begin::Filters-->
                                    <div class="flex-wrap gap-4 d-flex flex-stack">
                                        <!--begin::Destination-->
                                        <!--begin::Search-->
                                        {{-- <a href="#" class="btn btn-light-success btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_update_unit{{ $aset->id }}">Tambah Unit</a> --}}
                                        <button type="submit" class="btn btn-light-warning btn-sm">Simpan</button>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Filters-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-white fw-bold bg-success">
                                            <th class="rounded-start ps-4">Hari</th>
                                            <th></th>
                                            <th class="pe-3 min-w-100px">Pilih Shift</th>
                                            <th class="rounded-end"></th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @php
                                            $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                        @endphp
                                        @foreach ($hari_list as $hari)
                                            <tr>
                                            <td class="ps-4">
                                                <span class="px-4 py-3 badge badge-light-primary fs-7">{{ $hari }}</span>
                                            </td>
                                                @foreach ($shifts as $shift)
                                                @php
                                                    // Cek apakah shift ini sudah dimiliki oleh khidmah di hari ini
                                                    $isChecked = $khidmah->shifts()
                                                        ->wherePivot('hari', $hari)
                                                        ->wherePivot('shift_id', $shift->id)
                                                        ->exists();
                                                @endphp
                                                <td>
                                                    <div class="form-check form-check-custom">
                                                        <input class="form-check-input" type="checkbox" name="shifts[{{ $hari }}][]" value="{{ $shift->id }}" id="flexCheckDefault" {{ $isChecked ? 'checked' : '' }}/>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{ $shift->shift }}
                                                        </label>
                                                    </div>
                                                </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        </form>
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

@endsection()
