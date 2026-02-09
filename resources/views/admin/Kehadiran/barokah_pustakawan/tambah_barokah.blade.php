<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
        @php
            $aktifRankDosen = !empty($item->tmt_mengajar);

            $rankDosen = (int) ($pegawaiModal->t_rank_dosen ?? 0);
            $sksOld = (int) old('sks_dosen', 0);

            $tBarokahPreview = $aktifRankDosen
                ? ($sksOld * $rankDosen)
                : 0;
        @endphp

        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="pt-0 modal-body scroll-y px-15 px-lg-15 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="admin/kehadiran-barokah_pustakawan">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3">{{ $item->nama_pegawai }}</h1>
                    <div class="text-muted fw-semibold fs-5">Generate Barokah Pustakawan</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row text-start">
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <input type="hidden" name="pegawai_id" class="form-control form-control-solid form-control-lg" value="{{ $item->id }}" readonly>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Barokah Kehadiran</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_kehadiran" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pegawai" required>
                            <option disabled selected>Pilih Tunjangan</option>
                            @foreach ( $kehadiran as $berkah )
                                <option value="{{ $berkah->tunjangan }}">{{ ucwords(strtolower($berkah->tempatTinggal)) }} - {{ $berkah->tunjangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row text-start">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Barokah Jabatan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_jabatan" data-control="select2" data-hide-search="true" data-placeholder="Pilih Tunjangan" required>
                            <option disabled selected></option>
                            @foreach ( $barokahJabatan as $berkah )
                                <option value="{{ $berkah->tunjangan_jabatan }}">{{ $berkah->nama_jabatan }} - {{ $berkah->tunjangan_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Barokah Pengabdian</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_pengabdian" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pegawai" required>
                            <option disabled selected>Pilih Tunjangan</option>
                            @foreach ( $pengabdian as $berkah )
                                <option value="{{ $berkah->tunjangan_pengabdian }}">{{ $berkah->tunjangan_pengabdian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Barokah Tunkel</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_tunkel" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pegawai" required>
                            <option disabled selected>Pilih Tunjangan</option>
                            @foreach ( $tunkel as $berkah )
                                <option value="{{ $berkah->tunkel }}">{{ $berkah->tunkel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Barokah Kehormatan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_kehormatan" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pegawai" required>
                            <option disabled selected>Pilih Tunjangan</option>
                            @foreach ( $kehormatan as $berkah )
                                <option value="{{ $berkah->tunjangan_kehormatan }}">{{ $berkah->tunjangan_kehormatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 fw-semibold fs-6">Barokah Anak</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <select class="form-select" name="t_anak" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pegawai" required>
                            <option disabled selected>Pilih Tunjangan</option>
                            @foreach ( $barokahAnak as $berkah )
                                <option value="{{ $berkah->tunjangan_anak }}">{{ $berkah->tunjangan_anak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 text-start fv-row">
                    <label class="mb-2 fw-semibold fs-6">Barokah Rank Dosen</label>
                    <div class="mb-5 input-group">
                        <span class="input-group-text">sks</span>
                        @if($aktifRankDosen)
                            <input type="number" name="sks_dosen"
                                class="form-control"
                                placeholder="Masukkan SKS"
                                value="{{ old('sks_dosen') }}">
                        @else
                            <input type="number" class="form-control" value="0" readonly>
                            <input type="hidden" name="sks_dosen" value="0">
                            <input type="hidden" name="periode" value="{{ $periode }}">
                        @endif
                        <span class="input-group-text">x</span>
                        <input type="text" class="form-control"
                            value="{{ number_format($pegawaiModal->t_rank_dosen ?? 0, 0, ',', '.') }}"
                            readonly>
                    </div>
                    @if(!$aktifRankDosen)
                        <small class="text-muted">
                            Pegawai ini belum memiliki TMT Mengajar
                        </small>
                    @endif
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


{{-- @include('sweetalert::alert') --}}
