<!--begin::Modal - Update user details-->
<div class="modal fade text-start" id="kt_modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('kegiatan.update', $item->id) }}">
                @csrf
                @method('PUT')

                <!--begin::Heading-->
                <div class="mb-8 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">{{ $item->kegiatan }}</h1>
                    <div class="text-muted fw-semibold fs-5">Akan dilaksanakan pada {{ Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM Y') }}.</div>
                    <!--end::Title-->
                </div>
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kegiatan</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="kegiatan" id="kegiatan" value="{{ $item->kegiatan }}" class="form-control mb-3 mb-lg-0" placeholder="Nama Kegiatan" required autocomplete="kegiatan">
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    {{-- <div class="form-text">File memiliki format: pdf.</div> --}}
                    <!--end::Hint-->
                </div>
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                    <!--end::Label-->
                    <select class="form-select" name="kategori" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kategori Kegiatan">
                        <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                        <option value="Mingguan">Mingguan</option>
                        <option value="Bulanan">Bulanan</option>
                        <option value="Tahunan">Tahunan</option>
                    </select>
                </div>
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tanggal Pelaksanaan</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="date" name="tanggal" id="tanggal" value="{{ $item->tanggal }}" class="form-control mb-3 mb-lg-0" required autocomplete="tanggal">
                    <!--end::Image input-->
                </div>
                <div class="fv-row mb-14">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Penangguna Jawab/Ketua Panitia</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <select class="form-select" name="pj" data-control="select2" data-hide-search="true" data-placeholder="Pilih Penanggung Jawab">
                        <option value="{{ $item->pj }}">{{ $item->pj }}</option>
                        @foreach ($user as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
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

<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>

{{--  --}}
