<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $aset->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-700px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="modal-header pb-0 border-0 justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <i class="ki-duotone ki-cross fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('aset.update', $aset->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">{{ $aset->nama }}</h1>
                    <div class="text-muted fw-semibold fs-5">Aset Perpustakaan Ibrahimy</a>.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Nama Barang</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="nama" class="form-control mb-3 mb-lg-0" placeholder="Nama Barang" value="{{ $aset->nama }}" required>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-15">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kategori_id" class="form-select" data-control="select2" data-placeholder="Pilih Sumber Dana" data-hide-search="true" required autocomplete="kategori_id">
                        <option value="{{ $aset->kategori_id }}">{{ $aset->kategori->kategori }}</option>
                        @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                        @endforeach
                    </select>
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



