<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $pegawai->id }}" tabindex="-1" aria-hidden="true">
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('kehadiran-pegawai.update', $pegawai->id) }}">
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
                <div class="fv-row mb-14">
                    <!--begin::Label-->
                    <label class="mb-5 d-block required fw-semibold fs-6">Foto</label>
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
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('/storage/pegawai/' . $pegawai->foto) }});"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Foto">
                            <i class="ki-outline ki-pencil fs-7">
                            </i>
                            <!--begin::Inputs-->
                            <input type="file" name="foto" id="foto" value="blank.png" accept=".png, .jpg, .jpeg"/>
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Foto">
                            <i class="ki-outline ki-cross fs-2">
                            </i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus foto">
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
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">NIK</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" class="form-control form-control-solid form-control-lg" value="{{ $pegawai->nik }}" required readonly>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Nama Pegawai</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" name="nama_pegawai" class="form-control form-control-solid form-control-lg" value="{{ $pegawai->nama_pegawai }}" readonly>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Tempat Lahir</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" name="tempat_lahir" class="form-control form-control-lg" value="{{ $pegawai->tempat_lahir }}" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Tanggal Lahir</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" name="tgl_lahir" class="form-control form-control-lg" value="{{ $pegawai->tgl_lahir }}" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Terhitung Mulai Tanggal</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" name="tmt" class="form-control form-control-lg" value="{{ $pegawai->tmt }}" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Terhitung Mulai Tanggal Mengajar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="date" name="tmt_mengajar" class="form-control form-control-lg" value="{{ $pegawai->tmt_mengajar }}">
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Domisili</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <input type="text" class="form-control form-control-solid form-control-lg" value="{{ ucwords(strtolower($pegawai->domisili)) }}" readonly>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Pendidikan Terakhir</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="pend_terakhir" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required >
                            <option value="SD" {{ $pegawai->keterangan == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP/SLTP" {{ $pegawai->keterangan == 'SMP/SLTP' ? 'selected' : '' }}>SMP/SLTP</option>
                            <option value="SMA/SLTA" {{ $pegawai->keterangan == 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                            <option value="S1" {{ $pegawai->keterangan == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ $pegawai->keterangan == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ $pegawai->keterangan == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Status Perkawinan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="status_perkawinan" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required >
                            <option value="Belum Menikah" {{ $pegawai->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Menikah" {{ $pegawai->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Jenis Kelamin</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="jk" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required >
                            <option value="Laki-laki" {{ $pegawai->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pegawai->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Ruang</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="ruang" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required >
                            <option value="Perpustakaan Putra" {{ $pegawai->ruang == 'Perpustakaan Putra' ? 'selected' : '' }}>Perpustakaan Putra</option>
                            <option value="Perpustakaan Putri" {{ $pegawai->ruang == 'Perpustakaan Putri' ? 'selected' : '' }}>Perpustakaan Putri</option>
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Jabatan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="nama_jabatan" value="" data-control="select2" data-hide-search="true" data-placeholder="Pilih Jabatan" required >
                            <option value="" disabled selected>Pilih Jabatan</option>
                            @foreach ($jabatan as $jab)
                                <option value="{{ $jab->nama_jabatan }}"{{ old('jabatan', $pegawai->nama_jabatan ?? '') == $jab->nama_jabatan ? 'selected' : '' }}>{{ $jab->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Status</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="gap-5 d-flex align-items-center">
                        <!--begin::Switch-->
                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                            <input class="form-check-input" name="status" type="checkbox" value="{{ $pegawai->status }}"  {{ $pegawai->status == '1' ? 'checked' : '' }} >
                            <span id="statusLabel" class="form-check-label fw-semibold text-muted">
                                {{ $pegawai->status == '1' ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    <!--end::Switch-->
                    </div>
                    <!--end::Col-->
                </div>
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

<!--<script src="admin/assets/plugins/global/plugins.bundle.js"></script>-->
<!--<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>-->

{{-- @include('sweetalert::alert') --}}

<script>
    function updateStatusLabel() {
        const checkbox = document.getElementById('statusCheckbox');
        const label = document.getElementById('statusLabel');
        label.textContent = checkbox.checked ? 'Aktif' : 'Tidak Aktif';
    }
</script>
