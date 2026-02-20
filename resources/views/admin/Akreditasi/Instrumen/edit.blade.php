<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_details{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('akreditasi-instrumen.update', $item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Instrumen Penilaian</h1>
                    <div class="text-muted fw-semibold fs-5">Akreditasi Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kriteria Penilaian</label>
                    <!--end::Label-->
                    <select class="form-select" name="kriteria" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kriteria Penilaian">
                        <option value="{{ $item->kriteria }}">{{ $item->kriterias->point }}</option>
                        @foreach ($kriteria as $point)
                        <option value="{{ $point->id }}">{{ $point->point }} - {{ $point->komponen }}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Aspek Penilaian</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="aspek_penilaian" value="{{ $item->aspek_penilaian }}" class="form-control mb-3 mb-lg-0" placeholder="Aspek Penilaian Akreditasi" required autocomplete="aspek_penilaian">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Item Penilaian</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <textarea name="item_penilaian" class="form-control" placeholder="Item Penilaian" data-kt-autosize="true">{{ $item->item_penilaian }}</textarea>
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Item Terpenuhi</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="item_terpenuhi" class="form-control mb-3 mb-lg-0" placeholder="Item Terpenuhi" value="{{ $item->item_terpenuhi }}">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Bukti Fisik</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <textarea name="bukti_fisik" class="form-control" placeholder="Deskripsi Bukti Fisik" data-kt-autosize="true">{{ $item->bukti_fisik }}</textarea>
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-12">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Dokumen</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="file" name="dokumen" class="form-control mb-3 mb-lg-0">
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text">File memiliki format: pdf.</div>
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



<script>
    $("#tanggal").flatpickr({
        dateFormat: "j F Y",
    });

</script>


{{-- @include('sweetalert::alert') --}}
