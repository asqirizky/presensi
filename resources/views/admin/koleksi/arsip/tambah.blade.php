<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_tambah" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="modal-header pb-0 border-0 justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <i class="ki-outline ki-cross fs-1"></i>
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="/admin/koleksi-arsip">
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Arsip</h1>
                    <div class="text-muted fw-semibold fs-5">Ibrahimy Gallery Library Archive Museum</a>.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required d-block fw-semibold fs-6 mb-5">Gambar</label>
                    <!--end::Label-->
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
                        <label
                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Upload Foto" data-bs-original-title="Upload Foto" data-kt-initialized="1">
                            <i class="ki-outline ki-pencil fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="gambar" value="blank.png" accept=".png, .jpg, .jpeg" required>
                            <input type="hidden" name="avatar_remove" value="1">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel Foto" data-bs-original-title="Cancel Foto" data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Hapus foto" data-bs-original-title="Hapus foto" data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <div class="form-text">File memiliki format: png, jpg, jpeg.</div>
                    @error('kwitansi')
                        <div class="form-text text-danger">File terlalu besar</div>
                    @enderror
                    <!--begin::Actions-->
                </div>
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Judul</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="judul" class="form-control mb-3 mb-lg-0" placeholder="Judul Galeri" required>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2">Tipe</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="tipe" class="form-control mb-3 mb-lg-0" placeholder="Tipe Galeri">
                    <!--end::Input-->
                    <div class="form-text">misalnya: 'Kegiatan', 'Dokumentasi', dll. kosongi jika tidak ada</div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2">Pembuat</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="pembuat" class="form-control mb-3 mb-lg-0" placeholder="Pembuat">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2">Tanggal</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="date" name="tanggal" class="form-control mb-3 mb-lg-0" placeholder="Tanggal Galeri">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2">Lembaga Penanggung Jawab</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="lembaga" class="form-control mb-3 mb-lg-0" placeholder="lembaga Penanggung Jawab">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea class="form-control @error('content') is-invalid @enderror" name="deskripsi" id="deskripsi"></textarea>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    {{--  <button class="btn btn-primary" >  --}}
                    <button type="submit" id="kt_docs_sweetalert_state_success" class="btn btn-success">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
            <!--end:Form-->
        </div>
        <!--end::Modal body-->

            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Update user details-->

<script src="assets/plugins/global/plugins.bundle.js"></script>


<script src="assets/js/custom/utilities/modals/bidding.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
</script>



