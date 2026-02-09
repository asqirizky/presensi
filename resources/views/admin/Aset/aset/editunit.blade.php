<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit_unit{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form class="text-start" id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ asset('/admin/aset-update('.$item->id.')') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{ $aset->nama }}</h1>
                        <div class="text-muted fw-semibold fs-5">No.INV : {{ str_pad($aset->id + 1, 3, '0', STR_PAD_LEFT).'/'.$aset->kategori->kode.'/'. Carbon\Carbon::parse($item->tanggal)->isoFormat('DD.MM.YY').'/'.$item->sumber->kode.'/'.$item->lokasi->kode.'/'.$item->kode_unit }}</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
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
                        <label class="required fw-semibold fs-6 mb-2 ">Lokasi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="lokasi_id" class="form-select" data-control="select2" data-placeholder="Pilih Sumber Dana" data-hide-search="true" required autocomplete="sumber_id">
                            <option value="{{ $item->lokasi_id }}">{{ $item->lokasi->lokasi }}</option>
                            @foreach ($lokasi as $lokasi )
                            <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2 ">Kondisi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="kondisi" class="form-select" data-control="select2" data-placeholder="Pilih Kondisi Barang" data-hide-search="true" required autocomplete="sumber_id">
                            <option value="{{ $item->kondisi }}">{{ $item->kondisi }}</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Hilang">Hilang</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2 ">Sumber Dana</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="sumber_id" class="form-select" data-control="select2" data-placeholder="Pilih Sumber Dana" data-hide-search="true" required autocomplete="sumber_id">
                            <option value="{{ $item->sumber_id }}">{{ $item->sumber->sumberdana }}</option>
                            @foreach ($sumber as $sumberdana)
                            <option value="{{ $sumberdana->id }}">{{ $sumberdana->sumberdana }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2 ">Harga</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="harga" id="harga" min="1000" value="{{ $item->harga }}" class="form-control mb-3 mb-lg-0" required>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2 ">Nomor Bukti</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="nb" class="form-control mb-3 mb-lg-0" value="{{ $item->nb }}" placeholder="Nomor Bukti/Kwitansi">
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--end::Heading-->
                    <div class="fv-row mb-14">
                        <!--begin::Label-->
                        <label class="d-block fw-semibold fs-6 mb-5">Foto Barang</label>
                        <!--end::Label-->
                        <!--begin::Image placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url('{{ asset('admin/assets/media/svg/files/blank-image.svg') }}');
                            }

                            [data-bs-theme="dark"] .image-input-placeholder {
                                background-image: url('{{ asset('admin/assets/media/svg/files/blank-image-dark.svg') }}');
                            }
                        </style>
                        <!--end::Image placeholder-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            @if($item->foto == null)
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('admin/assets/media/svg/files/blank-image.svg') }});"></div>
                            @else
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('/storage/fotobarang/' . $item->foto) }});"></div>
                            @endif
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Foto">
                                <i class="ki-outline ki-pencil fs-7">
                                </i>
                                <!--begin::Inputs-->
                                <input type="file" name="foto" id="foto" value="blank.png" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Foto">
                                <i class="ki-outline ki-cross fs-2">
                                </i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus foto">
                                <i class="ki-outline ki-cross fs-2">
                                </i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <div class="form-text">File memiliki format: png, jpg, jpeg. Maksimal ukuran 1MB(1024kb)</div>
                        @error('kwitansi')
                            <div class="form-text text-danger">File terlalu besar</div>
                        @enderror
                    </div>
                    <!--begin::Actions-->
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
                <!--end:Form-->
            </div>
            <!--end::Modal body-->

            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Update user details-->
