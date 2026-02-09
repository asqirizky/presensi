<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_edit{{ $khidmah->id }}" tabindex="-1" aria-hidden="true">
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
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('absensi-khidmah.update',$khidmah->id) }}">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Khidmah</h1>
                    <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--end::Heading-->
                <div class="fv-row mb-14">
                    <!--begin::Label-->
                    <label class="d-block required fw-semibold fs-6 mb-5">Foto</label>
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
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('/storage/khidmah/' . $khidmah->foto) }});"></div>
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
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Nomor Induk Khidmah</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="nik" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $khidmah->nik }}" placeholder="Lokasi Khidmah" required autocomplete="kode_lokasi" readonly>
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Nama</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="nama" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->nama }}" placeholder="Nama" required autocomplete="nama">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tempat Lahir</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="tempat_lahir" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->tempat_lahir }}" placeholder="Tempat Lahir" required autocomplete="tempat_lahir">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="date" name="tanggal_lahir" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->tanggal_lahir }}" placeholder="Tanggal Lahir" required autocomplete="tanggal_lahir">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Tanggal Khidmah</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="date" name="tanggal_khidmah" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->tanggal_khidmah }}" placeholder="Tanggal Lahir" required autocomplete="tanggal_lahir">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="alamat" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->alamat }}" placeholder="Alamat" required autocomplete="alamat">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Asrama</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="asrama" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->asrama }}" placeholder="Asrama" required autocomplete="asrama">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Pendidikan Pagi</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="diniyah" data-control="select2" data-hide-search="true" data-placeholder="Pilih Lokasi Khidmah" required autocomplete="diniyah">
                            <option value="{{ $khidmah->diniyah }}">{{ $khidmah->diniyah }}</option>
                            <option value="Madrasah Ibtida'iyah">Madrasah Ibtida'iyah</option>
                            <option value="Madrasah Tsanawiyah">Madrasah Tsanawiyah</option>
                            <option value="Madrasah Aliyah">Madrasah Aliyah</option>
                            <option value="Madrasah Ta'hiliyah">Madrasah Ta'hiliyah</option>
                            <option value="Madrasah I'dadiyah">Madrasah I'dadiyah</option>
                            <option value="Lulus">Lulus</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Pendidikan Sore</label>
                    <!--end::Label-->
                    <!--begin::Image placeholder-->
                    <input type="text" name="sekolah_sore" class="form-control mb-3 mb-lg-0" value="{{ $khidmah->sekolah_sore }}" placeholder="Pendidikan Sore" required autocomplete="asrama">
                    <!--end::Image input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                    <!--end::Label-->
                    <!--begin::Conditions-->
                    <div class="col-lg-12 fv-row">
                        <div class="btn-group w-100 mb-lg-0" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                            <!--begin::Radio-->
                            <label class="btn btn-outline btn-color-muted btn-active-success active" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="gender" value="{{ $khidmah->gender }}" required autocomplete="gender" checked="checked"/>
                                <!--end::Input-->
                                Laki-laki
                            </label>
                            <!--end::Radio-->
                            <!--begin::Radio-->
                            <label class="btn btn-outline btn-color-muted btn-active-danger" data-kt-button="true">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="gender" value="{{ $khidmah->gender }}" required autocomplete="gender"/>
                                <!--end::Input-->
                                Perempuan
                            </label>
                            <!--end::Radio-->
                        </div>
                    </div>
                    <!--end::Conditions-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-8">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Lokasi Khidmah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="lokasi" data-control="select2" data-hide-search="true" data-placeholder="Pilih Lokasi Khidmah" required autocomplete="lokasi">
                            <option value="{{ $khidmah->lokasi }}">{{ $khidmah->lokasi }}</option>
                            @foreach ( $lokasi as $khidmah )
                            <option value="{{ $khidmah->lokasi }}">{{ $khidmah->lokasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    {{--  <button class="btn btn-primary" >  --}}
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Input group-->
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
