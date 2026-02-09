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
                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('kehadiran-izin.update',$item->id) }}">
                    @csrf
                    @method('PUT')
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Edit Izin Pegawai</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Kehadiran Umana' Perpustakaan Ibrahimy</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="mb-8 d-flex flex-column fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold required">Nama</label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" value="{{ $item->nama_pegawai}}" placeholder="Shift" readonly />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                            <span class="required">Tanggal Mulai</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <input class="form-control" name="tgl_mulai" placeholder="Pick date" value="{{ $item->tgl_mulai }}" type="date">
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                            <span class="required">Tanggal Selesai</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <input class="form-control flatpickr-input" name="tgl_selesai" value="{{ $item->tgl_selesai }}" placeholder="Jam Pulang" type="date" >
                        <!--end::Image input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                            <span class="required">Keterangan</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <select class="form-select" name="keterangan" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required>
                            <option value="Sakit" {{ $item->keterangan == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Izin" {{ $item->keterangan == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Tugas Pesantren" {{ $item->keterangan == 'Tugas Pesantren' ? 'selected' : '' }}>Tugas Pesantren</option>
                            <option value="Berpergian" {{ $item->keterangan == 'Berpergian' ? 'selected' : '' }}>Berpergian</option>
                        </select>
                        <!--end::Image input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row text-start">
                        <!--begin::Label-->
                        <label class="mb-2 text-gray-900 required fw-semibold fs-6">Jadwal</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="d-flex flex-warp">
                            @foreach ($jadwal as $shift)
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" name="shifts[]" value="{{ $shift->id }}"
                                        {{ in_array($shift->id, $selectedJadwalIds[$item->id] ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $shift->jadwal }}</label>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Col-->
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
