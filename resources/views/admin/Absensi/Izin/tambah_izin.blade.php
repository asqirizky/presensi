<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="/admin/absensi-izin">
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Izin Khidmah</h1>
                    <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Pilih khidmah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="nik" data-control="select2" data-hide-search="true" data-placeholder="Pilih Khidmah" required autocomplete="lokasi">
                            <option value="">Pilih Khidmah</option>
                            @foreach ( $khidmahs as $item )
                            <option value="{{ $item->nik }}">{{ $item->nik }} - {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tanggal Mulai</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" class="form-control form-control-lg" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tanggal Selesai</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" class="form-control form-control-lg" name="tanggal_selesai" placeholder="Tanggal Selesai" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Keterangan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="keterangan" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required autocomplete="lokasi">
                            <option>Pilih Keterangan</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                            <option value="Tugas Pesantren">Tugas Pesantren</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Col-->
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Pilih Shift</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="d-flex align-items-center mt-3">
                        @foreach ( $shifts as $item )
                            <label class="form-check form-check-custom form-check-inline me-3">
                                <input type="checkbox" class="form-check-input" name="shifts[]" value="{{ $item->id }}">
                                <span class="fw ps-2 fs-6">{{ $item->id }} - {{ $item->shift }}</span>
                            </label>
                        @endforeach
                    </div>
                    <!--end::Col-->
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
