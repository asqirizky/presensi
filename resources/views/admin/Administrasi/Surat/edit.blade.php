@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">{{ $surat->namasurat }}</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/administrasi-surat" class="text-muted text-hover-primary">Surat Keluar</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Edit</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="/" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Edit Surat</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('administrasi-surat.update', $surat->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold required fs-6">Kategori Surat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="kategori" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kategori Surat" id="kt_ecommerce_add_product_status_select">
                                            <option value="{{ $surat->kategori }}">{{ $surat->kategori }}</option>
                                            <option value="A.1-Keputusan Kepala Perpustakaan">A.1-Keputusan Kepala Perpustakaan</option>
                                            <option value="A.2-Internal Perpustakaan">A.2-Internal Perpustakaan</option>
                                            <option value="A.3-Universitas">A.3-Universitas</option>
                                            <option value="A.4-Ma'had">A.4-Ma'had</option>
                                            <option value="A.5-External Ma'had">A.5-External Ma'had</option>
                                            <option value="A.6-Anggaran Rutin">A.6-Anggaran Rutin</option>
                                            <option value="A.7-Anggaran Non Rutin">A.7-Anggaran Non Rutin</option>
                                            <option value="A.8-Non Anggaran (Fotocopy)">A.8-Non Anggaran (Fotocopy)</option>
                                            <option value="A.9-Non Anggaran (Rental)">A.9-Non Anggaran (Rental)</option>
                                            <option value="A.10-Rekom Khusus">A.10-Rekom Khusus</option>
                                            <option value="A.11-Laporan Kegiatan/Triwulan">A.11-Laporan Kegiatan/Triwulan</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Surat(Hal)</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="namasurat" class="form-control mb-3 mb-lg-0" value="{{ $surat->namasurat }}" placeholder="Masukkan Nama Surat(Hal)" required>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tujuan</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="tujuan_nama" value="{{ $surat->tujuan_nama }}" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Masukkan Nama(Tujuan)">
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="tujuan_jabatan" value="{{ $surat->tujuan_jabatan }}" class="form-control form-control-lg" placeholder="Masukkan Jabatan(Tujuan)">
                                            </div>
                                            <div class="form-text">Contoh: Nama: KHR. Ahmad Azaim Ibrahimy - Jabatan: Pengasuh Pondok Pesantren Salafiyah Syafi'iyah Sukorejo</div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="tempat" value="{{ $surat->tempat }}" class="form-control mb-3 mb-lg-0" placeholder="Masukkan Nama Tempat(Tujuan)" required>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lampiran</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="lampiran" value="{{ $surat->lampiran }}" class="form-control mb-3 mb-lg-0" placeholder="Masukkan Jumlah Lampiran Surat">
                                        <div class="form-text">Contoh: 1 Halaman/1 Berkas | Kosongi jika tidak ada</div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="/admin/administrasi-surat" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        extraPlugins: 'pastefromword',
        removePlugins: 'image,flash',
        height: 500
    });
</script>


@include('layout.footer')

@endsection
