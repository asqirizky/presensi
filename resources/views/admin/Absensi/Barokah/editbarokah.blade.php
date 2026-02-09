<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_edit{{  $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="modal-header pb-0 border-0 justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <i class="ki-outline ki-cross fs-1">
                </i>
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y px-15 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('absensi-barokah.update',$item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Nominal Barokah</h1>
                    <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                    <!--begin::Hint-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="text-start fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Barokah</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <div class="input-group mb-5">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="barokah" value="{{ $item->barokah }}" class="form-control mb-3 mb-lg-0" required autocomplete="lokasi">
                    </div>
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    {{--  <button class="btn btn-primary" >  --}}
                    <button type="submit" class="btn btn-primary">
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

<script src="admin/assets/plugins/global/plugins.bundle.js"></script>



<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>


{{-- @include('sweetalert::alert') --}}
