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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('akreditasi-kriteria.update', $item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Kriteria Penilaian</h1>
                    <div class="text-muted fw-semibold fs-5">Akreditasi Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Point Penilaian</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="point" class="form-control mb-3 mb-lg-0" placeholder="Point Penilaian Akreditasi" value="{{ $item->point }}" required autocomplete="point">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Komponen Penilaian</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <select class="form-select" name="komponen" data-control="select2" data-hide-search="false" data-placeholder="Pilih Komponen Penilaian">
                        <option value="{{ $item->komponen }}">{{ $item->komponen }}</option>
                        <option value="Koleksi Perpustakaan">Koleksi Perpustakaan</option>
                        <option value="Sarana dan Prasarana Perpustakaan">Sarana dan Prasarana Perpustakaan</option>
                        <option value="Pelayanan Perpustakaan">Pelayanan Perpustakaan</option>
                        <option value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                        <option value="Penyelenggaraan Perpustakaan">Penyelenggaraan Perpustakaan</option>
                        <option value="Inovasi dan Kreativitas">Inovasi dan Kreativitas</option>
                        <option value="Tingkat Kegemaran Membaca">Tingkat Kegemaran Membaca</option>
                        <option value="Indeks Pembangunan Literasi Masyarakat">Indeks Pembangunan Literasi Masyarakat</option>
                        <option value="Komponen Pendukung">Komponen Pendukung</option>
                    </select>
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-14">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="kategori" class="form-control mb-3 mb-lg-0" placeholder="Kategori" value="{{ $item->kategori }}" required>
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



<script>
    $("#tanggal").flatpickr({
        dateFormat: "j F Y",
    });

</script>


{{-- @include('sweetalert::alert') --}}
