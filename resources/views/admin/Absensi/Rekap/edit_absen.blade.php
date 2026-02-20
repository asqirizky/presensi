<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $absen['nik'] }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="pb-0 border-0 modal-header justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <i class="ki-outline ki-cross fs-1">
                </i>
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="pt-0 modal-body scroll-y px-15 px-lg-15 pb-15">
            <!--begin:Form-->
            <form method="POST" enctype="multipart/form-data" action="{{ route('rekap-absen.update', $absen['id']) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3">Tambah Absen Khidmah</h1>
                    <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Nama Khidmah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Nama Khidmah" value="{{ $absen['nik'] }} - {{ $absen['nama'] }}" required readonly>
                    <input type="hidden" name="nik" value="{{ $absen['nik'] }}">
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Tanggal</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" class="form-control form-control-lg" name="tanggal" placeholder="Tanggal Mulai" value="{{ $absen['tanggal'] }}" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Keterangan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="keterangan" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required autocomplete="lokasi">
                            <option value="{{ $absen['keterangan'] }}">{{ $absen['keterangan'] }}</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Col-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Shift</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="shift" data-control="select2" data-hide-search="true" data-placeholder="Pilih Shift" required autocomplete="lokasi">
                            <option value="" disabled @selected(old('shift', $item->shift ?? '') == '')>Pilih Shift</option>
                            @foreach ($shifts as $item)
                                <option value="{{ $item->shift }}" @selected(old('shift', $item->shift ?? '') == $item->shift)>{{ $item->shift }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Col-->
                <!--end::Input group-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    {{--  <button class="btn btn-primary" >  --}}
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
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



{{-- @include('sweetalert::alert') --}}
