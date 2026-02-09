@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- konten --}}
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Tenaga Khidmah</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/absensi-khidmah" class="text-muted text-hover-primary">Tenaga Khidmah</a>
                        </li>                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Tambah</li>
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
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header bg-success rounded-start rounded-end border-0 ">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Tambah Tenaga Khidmah</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" method="POST" enctype="multipart/form-data" action="/admin/absensi-khidmah">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <input type="radio" class="btn-check" name="nik" value="nik" checked>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="nama" class="form-control form-control-lg form-control" placeholder="Nama" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat Lahir</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="tempat_lahir" class="form-control form-control-lg form-control" placeholder="Tempat Lahir" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="date" name="tanggal_lahir" class="form-control form-control-lg " placeholder="" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Berkhidmah Sejak</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="date" name="tanggal_khidmah" class="form-control form-control-lg " placeholder="" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="alamat" class="form-control form-control-lg form-control" placeholder="Alamat" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Asrama</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="asrama" class="form-control form-control-lg form-control" placeholder="Asrama" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Sekolah Pagi</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Input-->
                                        <select id="diniyah" name="diniyah" class="form-select" data-control="select2" data-placeholder="Pilih Sekolah Pagi" data-hide-search="true" required autocomplete="gedung">
                                            <option>Pilih Madrasah</option>
                                            <option value="Madrasah Ibtida'iyah">Madrasah Ibtida'iyah</option>
                                            <option value="Madrasah Tsanawiyah">Madrasah Tsanawiyah</option>
                                            <option value="Madrasah Aliyah">Madrasah Aliyah</option>
                                            <option value="Madrasah Ta'hiliyah">Madrasah Ta'hiliyah</option>
                                            <option value="Madrasah I'dadiyah">Madrasah I'dadiyah</option>
                                            <option value="Lulus">Lulus</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sekolah Sore</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="sekolah_sore" class="form-control form-control-lg form-control" placeholder="Sekolah Sore" value="" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Lokasi</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="lokasi" class="form-select" data-control="select2" data-placeholder="Pilih Lokasi" data-hide-search="true" required autocomplete="lokasi">
                                            <option value="" disabled selected>Pilih Lokasi</option>
                                            @foreach ( $lokasi as $item )
                                            <option value="{{ $item->lokasi }}">{{ $item->lokasi }}</option>
                                            @endforeach
                                            <!--end::Input-->
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6" valign="top">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                                    <!--end::Label-->
                                    <!--begin::Conditions-->
                                    <div class="col-lg-8 fv-row">
                                        <div class="btn-group w-100 mb-lg-0" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-color-muted btn-active-success active" data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="gender" value="Laki-laki" required autocomplete="gender" checked="checked"/>
                                                <!--end::Input-->
                                                Laki-laki
                                            </label>
                                            <!--end::Radio-->
                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-color-muted btn-active-danger" data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="gender" value="Perempuan" required autocomplete="gender"/>
                                                <!--end::Input-->
                                                Perempuan
                                            </label>
                                            <!--end::Radio-->
                                        </div>
                                    </div>
                                    <!--end::Conditions-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6" valign="top">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Foto</label>
                                    <!--end::Label-->
                                    <!--begin::Image input-->
                                    <div class="col-lg-8">
                                        <!--begin::Image placeholder-->
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('{{ asset('admin/assets/media/svg/files/blank-image.svg') }}');
                                            }

                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('{{ asset('admin/assets/media/svg/files/blank-image-dark.svg') }}');
                                            }
                                        </style>
                                        <!--end::Image placeholder-->
                                        <!--begin::Image input-->
                                        <div class="me-4 image-input image-input-outline image-input-placeholder image-input-empty" data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Upload Foto" data-bs-original-title="Upload Foto" data-kt-initialized="1">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="foto" value="blank.png" accept=".png, .jpg, .jpeg" required="" autocomplete="foto">
                                                <input type="hidden" name="avatar_remove" value="1">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel Foto" data-bs-original-title="Cancel Foto" data-kt-initialized="1">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Hapus foto" data-bs-original-title="Hapus foto" data-kt-initialized="1">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--begin::Hint-->
                                        <div class="form-text">File memiliki format: png, jpg, jpeg. Maksimal ukuran
                                            1MB(1024kb)</div>
                                        @error('foto')
                                        <div class="form-text text-danger">Gambar terlalu besar</div>
                                        @enderror
                                        <!--end::Hint-->
                                        <!--end::Image input-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-end">
                                    <a href="/admin/absensi-khidmah" class="btn btn-light-warning me-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                        <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-gray-900 order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Ibrahimy
                    Library Developer Team</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                </li>
                <li class="menu-item">
                    <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->

@endsection
@if (session('success'))
<script>
    Swal.fire({
        title: 'Alhamdulillah!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
</script>
@endif
