@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Tambah Resource Guide</h1>
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
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/resource" class="text-muted text-hover-primary">Data Resource</a>
                        </li>
                        <!--end::Item-->
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
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="/resourceguide" class="btn btn-sm btn-light-success">Preview Website</a>
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
            <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::KONTEN-->
                <!--begin::Form-->
                <form class="form d-flex flex-column flex-lg-row" method="POST" enctype="multipart/form-data" action="/admin/resource">
                    @csrf
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Resource Guide</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <label class="required form-label">Program Studi</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="prodi" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Pilih Program Studi" id="kt_ecommerce_add_product_status_select">
                                                <option value=""></option>
                                                <optgroup label="Pasca Sarjana">
                                                    <option value="S3 – Studi Islam">S3 – Studi Islam</option>
                                                    <option value="S2 – Pendidikan Agama Islam">S2 – Pendidikan Agama Islam</option>
                                                    <option value="S2 – Hukum Ekonomi Syariah">S2 – Hukum Ekonomi Syariah</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Syariah dan Ekonomi Islam">
                                                    <option value="S1 – Hukum Keluarga Islam">S1 – Hukum Keluarga Islam</option>
                                                    <option value="S1 – Hukum Ekonomi Syariah">S1 – Hukum Ekonomi Syariah</option>
                                                    <option value="S1 – Manajemen dan Bisnis Syariah">S1 – Manajemen dan Bisnis Syariah</option>
                                                    <option value="S1 – Ekonomi Syariah">S1 – Ekonomi Syariah</option>
                                                    <option value="S1 – Akuntansi Syariah">S1 – Akuntansi Syariah</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Dakwah">
                                                    <option value="S1 – Bimbingan dan Penyuluhan Islam">S1 – Bimbingan dan Penyuluhan Islam</option>
                                                    <option value="S1 – Komunikasi dan Penyiaran Islam">S1 – Komunikasi dan Penyiaran Islam</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Tarbiyah">
                                                    <option value="S1 – Pendidikan Agama Islam">S1 – Pendidikan Agama Islam</option>
                                                    <option value="S1 – Pendidikan Bahasa Arab">S1 – Pendidikan Bahasa Arab</option>
                                                    <option value="S1 – Pendidikan Islam Anak Usia Dini">S1 – Pendidikan Islam Anak Usia Dini</option>
                                                    <option value="S1 – Tadris Matematika">S1 – Tadris Matematika</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Sains dan Teknologi">
                                                    <option value="S1 – Arsitektur">S1 – Arsitektur</option>
                                                    <option value="S1 – Budidaya Perikanan">S1 – Budidaya Perikanan</option>
                                                    <option value="S1 – Ilmu Komputer">S1 – Ilmu Komputer</option>
                                                    <option value="S1 – Sistem Informasi">S1 – Sistem Informasi</option>
                                                    <option value="S1 – Teknologi Informasi">S1 – Teknologi Informasi</option>
                                                    <option value="S1 – Teknologi Hasil Perikanan">S1 – Teknologi Hasil Perikanan</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Ilmu Sosial dan Humaniora">
                                                    <option value="S1 – Akuntansi">S1 – Akuntansi</option>
                                                    <option value="S1 - Hukum">S1 - Hukum</option>
                                                    <option value="S1 - Psikologi">S1 - Psikologi</option>
                                                    <option value="S1 - Pendidikan Bahasa Inggris">S1 - Pendidikan Bahasa Inggris</option>
                                                </optgroup>
                                                <optgroup label="Fakultas Ilmu Kesehatan">
                                                    <option value="S1 – Kebidanan">S1 – Kebidanan</option>
                                                    <option value="S1 – Farmasi">S1 – Farmasi</option>
                                                </optgroup>
                                            </select>
                                            <!--end::Description-->
                                        </div>

                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Isi Resource Guide</label>
                                                <!--end::Label-->
                                                <textarea class="form-control @error('content') is-invalid @enderror" name="resource" id="resource"></textarea>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="/admin/berita" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            <!--end::KONTEN-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
</div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create( document.querySelector( '#resource' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
