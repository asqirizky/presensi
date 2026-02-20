<!--begin::Modal - Upgrade plan-->
<div class="modal fade" id="kt_modal_ubah_{{ $item->id }}" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal body-->
            <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                <!--begin::Heading-->
                <div class="mb-7 mt-13 text-center">
                    <h1 class="mb-3">Perhatian!</h1>
                </div>
                <form action="{{ asset('/admin/kegiatan('.$item->id.')/ubah') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                    <!--end::Heading-->
                    <!--begin::Plans-->
                    <div class="text-center fs-5">
                        <!--begin::Row-->
                        <input type="radio" class="btn-check" name="ket" value="Terlaksana" checked>
                        <p>Apakah kegiatan {{ $item['kegiatan'] }} benar-benar
                        <label class="text-muted fs-7" for="Selesai" ><span class="badge badge-lg badge-light-success d-inline">terlaksana</span></label>.
                        </p>
                        <p>setelah anda mengkonfirmasi penyelesaian kompetensi ini, anda <span class="badge badge-lg badge-light-danger d-inline">tidak akan dapat mengubahnya</span> kembali. jazakumullah khairon!.</p>
                    </div>
                    <!--end::Plans-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-center flex-row-fluid pt-4">
                        <button type="submit" class="btn btn-primary me-3">
                            <span class="indicator-label">Ya</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Upgrade plan-->




