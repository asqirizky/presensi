<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-700px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="modal-header pb-0 border-0 justify-content-end">
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
        <div  class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form class="text-start" id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('aset-kategori.update', $item->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Kategori</h1>
                    <div class="text-muted fw-semibold fs-5">Aset Perpustakaan Ibrahimy</a>.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Nama Kategori Barang</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="kategori" id="kategori" class="form-control mb-3 mb-lg-0" value="{{ $item->kategori }}" placeholder="Nama Kategori Barang" required="" autocomplete="kategori">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Kode</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="kode" id="kode" class="form-control mb-3 mb-lg-0" value="{{ $item->kode }}" placeholder="Kode Kategori" required="" autocomplete="kode">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-15">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Jenis</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select id="jenis" name="jenis" class="form-select" data-control="select2" data-placeholder="Pilih Jenis Kategori" data-hide-search="true" required autocomplete="jenis">
                        <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                        <option value="Barang Kendaraan">Barang Kendaraan</option>
                        <option value="Elekronik">Elekronik</option>
                        <option value="Mebeler">Mebeler</option>
                        <option value="Perlangkapan">Perlangkapan</option>
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
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






