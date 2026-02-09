<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_details{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('buletin.update', $item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Buletin</h1>
                    <div class="text-muted fw-semibold fs-5">Tambahkan buletin sesuai edisi yang terbit.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="row mb-10">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Edisi</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative">
                            <!--begin::Input-->
                            <input type="text" class="form-control " minlength="1" maxlength="3" placeholder="EDISI" name="edisi" value="{{ $item->edisi }}"/>
                            <!--end::Input-->
                            <!--begin::CVV icon-->
                            <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                <i class="ki-outline ki-book fs-1">
                                </i>
                            </div>
                            <!--end::CVV icon-->
                        </div>
                        <!--end::Input wrapper-->
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-8 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Tanggal Terbit</label>
                        <!--end::Label-->
                        <!--begin::Row-->
                        <div class="row fv-row">
                            <!--begin::Col-->
                            <div class="col-12">
                                <input type="text" name="tanggal" id="tanggal" class="form-control mb-3" placeholder="Tanggal Terbit" value="{{ $item->tanggal }}" required autocomplete="tanggal">
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Input group-->
                <div class="fv-row mb-12">
                    <!--begin::Label-->
                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                        <!--begin::Icon-->
                        <img alt="" class="w-30px me-3" src="{{ asset('admin/assets/media/svg/files/pdf.svg') }}">
                        <!--end::Icon-->
                        <!--begin::Info-->
                        <div class="ms-1 fw-semibold">
                            <!--begin::Desc-->
                            <a href="{{ asset('/storage/buletin/' . $item->file) }}" class="fs-6 text-hover-primary fw-bold">Buletin Pustakaloka Edisi {{ $item->edisi }} - {{ $item->tanggal }}</a>
                            <!--end::Desc-->
                            <!--begin::Number-->
                            <div class="text-gray-500">0.7mb</div>
                            <!--end::Number-->
                        </div>
                        <!--begin::Info-->
                    </div>
                    <!--end::Hint-->
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

{{-- <script src="admin/assets/plugins/global/plugins.bundle.js"></script> --}}


<script>
    $("#tanggal").flatpickr({
        dateFormat: "j F Y",
    });

</script>

<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>


{{--  --}}
