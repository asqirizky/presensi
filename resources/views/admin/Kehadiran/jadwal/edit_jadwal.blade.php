<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="rounded modal-content">
            <!--begin::Modal header-->
            <div class="pb-0 border-0 modal-header justify-content-end">
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
            <div class="px-10 pt-0 modal-body scroll-y px-lg-15 pb-15">
                <!--begin:Form-->
                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('kehadiran-jadwal.update',$item->id) }}">
                    @csrf
                    @method('PUT')
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Edit Shift</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="mb-8 d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold required">Shift</label>
                        <!--end::Label-->
                        <input type="text" class="form-control" value="{{ $item->jadwal}}" placeholder="Shift" name="jadwal" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                            <span class="required">Jam Masuk</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <input class="form-control flatpickr-input" name="jamMasuk" placeholder="Pick date" value="{{ $item->jamMasuk }}" type="time">
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                            <span class="required">Jam Pulang</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <input class="form-control flatpickr-input" name="jamPulang" value="{{ $item->jamPulang }}" placeholder="Jam Pulang" type="time" >
                        <!--end::Image input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
$("#kt_datepicker_10").flatpickr({
    enableTime: false,
    noCalendar: false,
    dateFormat: "H:i",
});

$("#kt_datepicker_11").flatpickr({
    enableTime: false,
    noCalendar: false,
    dateFormat: "H:i",
});
</script>
