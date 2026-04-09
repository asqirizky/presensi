<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update<?php echo e($item->id); ?>" tabindex="-1" aria-hidden="true">
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
        <?php
            $aktifRankDosen = !empty($item->tmt_mengajar);

            $rankDosen = $pegawaiModal->t_rank_dosen ?? 0;
            $sksOld = old('sks_dosen', 0);
            $tBarokahPreview = $aktifRankDosen ? ($sksOld * $rankDosen) : 0;
        ?>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="pt-0 modal-body scroll-y px-15 px-lg-15 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_edit" class="form" method="POST" enctype="multipart/form-data" action="admin/kehadiran-barokah_pustakawan">
                <?php echo csrf_field(); ?>
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3"><?php echo e($item->nama_pegawai); ?></h1>
                    <div class="text-muted fw-semibold fs-5">Generate Barokah Pustakawan</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row text-start">
                    <!--begin::Label-->
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="mb-8 fv-row">
                        <input type="hidden" name="pegawai_id" class="form-control form-control-solid form-control-lg" value="<?php echo e($item->id); ?>" readonly>
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
                            <?php $__currentLoopData = $kehadiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunjangan); ?>"><?php echo e(ucwords(strtolower($berkah->tempatTinggal))); ?> - <?php echo e($berkah->tunjangan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $barokahJabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunjangan_jabatan); ?>"><?php echo e($berkah->nama_jabatan); ?> - <?php echo e($berkah->tunjangan_jabatan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $pengabdian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunjangan_pengabdian); ?>"><?php echo e($berkah->tunjangan_pengabdian); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $tunkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunkel); ?>"><?php echo e($berkah->tunkel); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $kehormatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunjangan_kehormatan); ?>"><?php echo e($berkah->tunjangan_kehormatan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $barokahAnak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berkah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($berkah->tunjangan_anak); ?>"><?php echo e($berkah->tunjangan_anak); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php if($aktifRankDosen): ?>
                            <input type="number" name="sks_dosen"
                                class="form-control"
                                placeholder="Masukkan SKS"
                                value="<?php echo e(old('sks_dosen')); ?>">
                        <?php else: ?>
                            <input type="number" class="form-control" value="0" readonly>
                            <input type="hidden" name="sks_dosen" value="0">
                        <?php endif; ?>
                        <span class="input-group-text">x</span>
                        <input type="text" class="form-control"
                            value="<?php echo e(number_format($pegawaiModal->t_rank_dosen ?? 0, 0, ',', '.')); ?>"
                            readonly>
                    </div>
                    <?php if(!$aktifRankDosen): ?>
                        <small class="text-muted">
                            Pegawai ini belum memiliki TMT Mengajar
                        </small>
                    <?php endif; ?>
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



<?php /**PATH /home/yogy/Dokumen/presensi/resources/views/admin/Kehadiran/barokah_pustakawan/update_barokah.blade.php ENDPATH**/ ?>