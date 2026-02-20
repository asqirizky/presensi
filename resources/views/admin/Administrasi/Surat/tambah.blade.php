@extends('layout.sidebarnavbar')
@section('admin-konten')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Tambah Surat Keluar</h1>
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
                        <li class="breadcrumb-item text-muted">Tambah</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="/" target="blank" class="btn btn-sm btn-light-success">Preview Website</a>
                </div>
            </div>
        </div>


        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Card-->
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: 10%; background-position-x: 100%; background-image: url('admin/assets/media/santri/gerbang.png')">
                    <!--begin::Card header-->
                    <div class="card-header pt-10">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <i class="ki-outline ki-folder-up fs-2x text-primary"></i>
                                </div>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Surat Keluar</h2>
                                <div class="text-muted fw-bold">
                                <a>Perpustakaan Ibrahimy</a>
                                <span class="mx-3">|</span>8 dokumen</div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <!--begin::Navs-->
                        <div class="d-flex overflow-auto h-55px">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary me-6" href="admin/administrasi-surat">Surat</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary me-6 active" href="admin/administrasi-surat=surat">Tambah</a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                        </div>
                        <!--begin::Navs-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Card-->
                <form id="kt_docs_repeater_basic" class="form" method="POST" enctype="multipart/form-data" action="/admin/administrasi-surat">
                    @csrf
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Identitas Surat</h3>
                            </div>
                        </div>

                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold required fs-6">Kategori Surat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="kategori" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kategori Surat" id="kt_ecommerce_add_product_status_select">
                                            <option value=""></option>
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
                                        <input type="text" name="namasurat" class="form-control mb-3 mb-lg-0" placeholder="Masukkan Nama Surat(Hal)" required>
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
                                                <input type="text" name="tujuan_nama" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Masukkan Nama(Tujuan)">
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="tujuan_jabatan" class="form-control form-control-lg" placeholder="Masukkan Jabatan(Tujuan)">
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
                                        <input type="text" name="tempat" class="form-control mb-3 mb-lg-0" placeholder="Masukkan Nama Tempat(Tujuan)" required>
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
                                        <input type="text" name="lampiran" class="form-control mb-3 mb-lg-0" placeholder="Masukkan Jumlah Lampiran Surat">
                                        <div class="form-text">Contoh: 1 Halaman/1 Berkas | Kosongi jika tidak ada</div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            {{-- <div class="card-footer d-flex justify-content-end">
                                <a href="/admin/administrasi-surat" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Isi Surat (Template 1)</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold fs-6" style="font-style: italic;">Assalâmu’alaikum Warahmatullâhi Wabarakâtuh.</label>
                                    <label class="form-label fw-semibold fs-6">Salam Silaturrahim, semoga kita semua selalu dalam lindungan dan petunjuk Allah Swt dalam menjalankan tugas sehari-hari. Âmîn.</label>
                                    <!--end::Label-->
                                </div>
                                <!--begin::Repeater-->
                                <div class="row mb-6" id="paragraf1">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-10">
                                                        <textarea  class="form-control mb-2" name="isi[]" placeholder="Paragraf" data-kt-autosize="true"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" data-repeater-create class="btn btn-icon btn-light-primary mt-3 mt-md-8">
                                                            <i class="ki-outline ki-plus fs-3"></i>
                                                        </button>
                                                        <button type="button" data-repeater-delete class="btn btn-icon btn-light-danger mt-3 mt-md-8 ms-2">
                                                            <i class="ki-outline ki-trash fs-5"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                                <!--begin::Repeater-->
                                <div class="row mb-6" id="isian1">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control mb-2" placeholder="Isian 1"/>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control mb-2" placeholder="Isian 2"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-icon btn-light-primary">
                                                            <i class="ki-outline ki-plus fs-3"></i>
                                                        </a>
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-light-danger ms-2">
                                                            <i class="ki-outline ki-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                                <!--begin::Repeater-->
                                <div class="row mb-6" id="paragraf2">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-10">
                                                        <textarea class="form-control mb-2" placeholder="Paragraf" data-kt-autosize="true"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-icon btn-light-primary mt-3 mt-md-8">
                                                            <i class="ki-outline ki-plus fs-3"></i>
                                                        </a>
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-light-danger mt-3 mt-md-8 ms-2">
                                                            <i class="ki-outline ki-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                                <!--begin::Repeater-->
                                <div class="row mb-6" id="isian2">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control mb-2" placeholder="Isian 1"/>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control mb-2" placeholder="Isian 2"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-icon btn-light-primary">
                                                            <i class="ki-outline ki-plus fs-3"></i>
                                                        </a>
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-light-danger ms-2">
                                                            <i class="ki-outline ki-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                                <!--begin::Repeater-->
                                <div class="row mb-2" id="paragraf3">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-10">
                                                        <textarea class="form-control mb-2" placeholder="Paragraf" data-kt-autosize="true"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-icon btn-light-primary mt-3 mt-md-8">
                                                            <i class="ki-outline ki-plus fs-3"></i>
                                                        </a>
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-light-danger mt-3 mt-md-8 ms-2">
                                                            <i class="ki-outline ki-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                                <!--begin::Label-->
                                <div class="row">
                                    <label class="form-label fw-semibold fs-6">Demikian permohonan kami, atas bereknannya kami ucapkan terima kasih. Jazâ kumullâhu ahsanal jazâ’.</label>
                                    <label class="form-label fw-semibold fs-6" style="font-style: italic;">Wassalâmu’alaikum Warahmatullâhi Wabarakâtuh.</label>
                                </div>
                                <!--end::Label-->
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="/admin/administrasi-surat" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Script untuk Form Repeater -->
<!-- jQuery (pastikan ini di-load lebih dulu) -->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>

<script src="admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>

<!-- Form Repeater -->

<script>
    $('#paragraf1').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
</script>



@include('layout.footer')

@endsection
