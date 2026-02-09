<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
            <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="{{ route('absensi-izin.update',$item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Izin Khidmah</h1>
                    <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Input group-->
                <div class="fv-row mb-8 text-start">
                    <!--begin::Label-->
                    <label class="fw-semibold fs-6 mb-2 text-gray-900">Nama</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" class="form-control form-control-solid" name="tanggal_mulai" value="{{ $item->nama_khidmah }}" readonly>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8 text-start">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2 text-gray-900">Tanggal Mulai</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" class="form-control" name="tanggal_mulai" value="{{ $item->tanggal_mulai }}">
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8 text-start">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2 text-gray-900">Tanggal Selesai</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" class="form-control" name="tanggal_selesai" value="{{ $item->tanggal_selesai }}">
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8 text-start">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Keterangan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="keterangan" value="{{ $item->keterangan }}" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required autocomplete="lokasi">
                            <option value="{{ $item->keterangan }}">{{ $item->keterangan }}</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                            <option value="Tugas Pesantren">Tugas Pesantren</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8 text-start">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2 text-gray-900">Shift</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="d-flex flex-warp">
                        @foreach ($shifts as $shift)
                            <div class="form-check me-3">
                                <input type="checkbox" class="form-check-input" name="shifts[]" value="{{ $shift->id }}"
                                    {{ $item->shifts->contains('id', $shift->id) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $shift->shift }}</label>
                            </div>
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

{{-- <script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script> --}}

{{-- @include('sweetalert::alert') --}}
