<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
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
                <form class="form" method="POST" enctype="multipart/form-data" action="/admin/kehadiran-izin">
                    <?php echo csrf_field(); ?>
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Tambah Izin Khidmah</h1>
                        <div class="text-muted fw-semibold fs-5">Absensi Khidmah Perpustakaan.</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fw-semibold fs-6">Pilih khidmah</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="mb-8 fv-row">
                            <select class="form-select" name="nik" data-control="select2" data-hide-search="true" data-placeholder="Pilih Khidmah" required autocomplete="lokasi">
                                <option disabled selected>Pilih Khidmah</option>
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->nik); ?>"><?php echo e($item->nama_pegawai); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                            <label class="mb-2 required fw-semibold fs-6">Tanggal Mulai</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                            <input type="date" class="form-control form-control-lg" name="tgl_mulai" placeholder="Tanggal Mulai" required>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fw-semibold fs-6">Tanggal Selesai</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <input type="date" class="form-control form-control-lg" name="tgl_selesai" placeholder="Tanggal Selesai" required>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fw-semibold fs-6">Keterangan</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="mb-8 fv-row">
                            <select class="form-select" name="keterangan" data-control="select2" data-hide-search="true" data-placeholder="Pilih Keterangan" required autocomplete="lokasi">
                                <option disabled selected>Pilih Keterangan</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Berpergian">Berpergian</option>
                                <option value="Tugas Pesantren">Tugas Pesantren</option>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Col-->
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fw-semibold fs-6">Pilih Shift</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="mt-3 d-flex align-items-center">
                            <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="form-check form-check-custom form-check-inline me-3">
                                    <input type="checkbox" class="form-check-input" name="shifts[]" value="<?php echo e($item->id); ?>">
                                    <span class="fw ps-2 fs-6"><?php echo e($item->jadwal); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        
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

<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>


<?php /**PATH /home/yogy/Dokumen/presensi/resources/views/admin/Kehadiran/izin/izinpegawai_tambah.blade.php ENDPATH**/ ?>