<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-700px">
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
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 psb-15">
                <!--begin:Form-->
                <form class="text-start" method="POST" enctype="multipart/form-data" action="{{ asset('/admin/aset-pemeliharaan='.$item->id.'/store') }}">
                @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Tambah Pemeliharaan</h1>
                        <div class="text-muted fw-semibold fs-5">{{ $unit->aset->nama }}</a>.</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2 ">Tanggal</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" name="tanggal" value="{{ $item->tanggal }}" class="form-control mb-3 mb-lg-0" required>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class=" required fw-semibold fs-6 mb-2 ">Jenis</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="kategori" class="form-select" data-control="select2" data-placeholder="Pilih Jenis Pemeliharaan" data-hide-search="true" required>
                            @if($item->kategori == "Servis Rutin")
                            <option value="Servis Rutin" selected>Servis Rutin</option>
                            <option value="Perbaikan">Perbaikan</option>
                            @elseif($item->kategori == "Perbaikan")
                            <option value="Perbaikan" selected>Perbaikan</option>
                            <option value="Servis Rutin">Servis Rutin</option>
                            @endif
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class=" required fw-semibold fs-6 mb-2 ">Deskripsi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Pemeliharaan" data-kt-autosize="true">{{ $item->deskripsi }}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class=" required fw-semibold fs-6 mb-2 ">Petugas</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="petugas" value="{{ $item->petugas }}" placeholder="Petugas Pemeliharaan" class="form-control mb-3 mb-lg-0" required>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-14">
                        <!--begin::Label-->
                        <label class=" required fw-semibold fs-6 mb-2 ">Biaya</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="biaya" min="1000" value="{{ $item->biaya }}" class="form-control mb-3 mb-lg-0" required>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        {{-- <button class="btn btn-primary" >  --}}
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
            <!--end::Modal body-->
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Update user details-->

<script src="assets/plugins/global/plugins.bundle.js"></script>


<script src="assets/js/custom/utilities/modals/bidding.js"></script>



