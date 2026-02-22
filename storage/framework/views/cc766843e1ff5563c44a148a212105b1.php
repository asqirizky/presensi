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
                <form method="POST" action="<?php echo e(route('admin.kehadiran-edit.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-6">
                        <label class="mb-2 required fw-semibold fs-6">Pilih Pustakawan</label>
                        <select class="form-select" id="selectPegawai" name="nik" data-control="select2" data-hide-search="true" data-placeholder="Pilih Pustakawan" required>
                            <option value="" disabled selected>Pilih Pustakawan</option>
                             <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p->nik); ?>">
                                    <?php echo e($p->nama_pegawai); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="mb-6">
                        <label class="mb-2 fs-6 required fw-semibold">Mode Hari</label>
                        <div class="gap-4 mt-3 flex-warp d-flex">
                            <?php $__currentLoopData = [
                                'satu_full'   => 'Satu Hari (Full)',
                                'satu_shift'  => 'Satu Hari (Shift)',
                                'banyak_full' => 'Beberapa Hari (Full)',
                                'banyak_shift'=> 'Beberapa Hari (Shift)'
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input need-pegawai mode-hari" type="radio" name="mode_hari" value="<?php echo e($key); ?>">
                                    <span class="fw ps-2 fs-6"><?php echo e($label); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div class="mb-6">
                        <label class="mb-2 required fw-semibold fs-6">Tanggal Mulai</label>
                        <input id="tanggal_mulai" type="date" name="tanggal_mulai" class="form-control form-control-lg need-pegawai" value="<?php echo e(old('tanggal_mulai')); ?>">
                    </div>

                    <div class="mb-6">
                        <label class="required fw-semibold">Tanggal Selesai</label>
                        <input id="tanggal_selesai" type="date" name="tanggal_selesai" class="form-control form-control-lg need-pegawai" value="<?php echo e(old('tanggal_selesai')); ?>">
                    </div>

                    
                    <div class="mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fw-semibold fs-6">Pilih Shift</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="mt-3 d-flex align-items-center">
                            <label class="form-check form-check-custom form-check-inline me-3">
                                <input type="radio"
                                    class="form-check-input need-pegawai shift-input"
                                    name="shifts[]"
                                    value="Pagi">
                                <span class="fw ps-2 fs-6">Pagi</span>
                            </label>

                            <label class="form-check form-check-custom form-check-inline me-3">
                                <input type="radio"
                                    class="form-check-input need-pegawai shift-input"
                                    name="shifts[]"
                                    value="Siang">
                                <span class="fw ps-2 fs-6">Siang</span>
                            </label>

                            <label class="form-check form-check-custom form-check-inline me-3">
                                <input type="radio"
                                    class="form-check-input need-pegawai shift-input"
                                    name="shifts[]"
                                    value="Malam">
                                <span class="fw ps-2 fs-6">Malam</span>
                            </label>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Simpan Absen
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

<script>
    const JADWAL_PEGAWAI = <?php echo json_encode($jadwalPegawai, 15, 512) ?>;
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const selectPegawai = $('#selectPegawai');
    const needPegawai  = document.querySelectorAll('.need-pegawai');
    const modeHari     = document.querySelectorAll('.mode-hari');
    const shiftInputs  = document.querySelectorAll('.shift-input');
    const tglMulai     = document.getElementById('tanggal_mulai');
    const tglSelesai   = document.getElementById('tanggal_selesai');

    function toggleByPegawai() {
        const aktif = !!selectPegawai.val();

        needPegawai.forEach(el => {
            if (el.type === 'radio' || el.type === 'radio') {
                el.disabled = !aktif;
            } else {
                el.readOnly = !aktif;
                el.style.pointerEvents = aktif ? 'auto' : 'none';
            }
        });

            tglMulai.addEventListener('change', function () {
            syncTanggal();

            const mode = document.querySelector('.mode-hari:checked')?.value;
            if (mode === 'satu_shift') {
                enableShiftByTanggal();
            }
        });


        shiftInputs.forEach(checkbox => {
            checkbox.addEventListener('change', function () {

                const mode = document.querySelector('.mode-hari:checked')?.value;

                // 🔥 HANYA di mode satu_shift
                if (mode === 'satu_shift' && this.checked) {
                    shiftInputs.forEach(other => {
                        if (other !== this) {
                            other.checked = false;
                        }
                    });
                }
            });
        });


    }

    function resetShift() {
        shiftInputs.forEach(s => {
            s.checked = false;
            s.disabled = true;
        });
    }

    function enableShift() {
        shiftInputs.forEach(s => s.disabled = false);
    }

    function enableShiftByTanggal() {

        const nik = $('#selectPegawai').val();
        const tanggal = tglMulai.value;
        if (!nik || !tanggal) return;

        // ambil hari (Senin, Selasa, dst)
        const hari = new Date(tanggal).toLocaleDateString('id-ID', { weekday: 'long' });

        // cari jadwal pegawai sesuai hari
        const jadwal = JADWAL_PEGAWAI.find(j =>
            j.nik == nik && j.hari.toLowerCase() === hari.toLowerCase()
        );

        // default: semua shift mati
        shiftInputs.forEach(s => {
            s.checked = false;
            s.disabled = true;
        });

        if (!jadwal) return;

        shiftInputs.forEach(s => {
            const shift = s.value.toLowerCase(); // pagi | siang | malam
            if (jadwal[shift] == 1) {
                s.disabled = false;
            }
        });
    }


    function syncTanggal() {
        // untuk mode satu hari → samakan tanggal
        const mode = document.querySelector('.mode-hari:checked')?.value;

        if (mode === 'satu_full' || mode === 'satu_shift') {
            tglSelesai.value = tglMulai.value;
        }
    }

    function handleModeHari(mode) {

        // default
        tglSelesai.disabled = false;
        enableShift();

        // === SATU HARI FULL ===
        if (mode === 'satu_full') {
            tglSelesai.disabled = true;
            resetShift();
            syncTanggal();
        }

        // === SATU HARI (SHIFT) → sesuai jadwal ===
        else if (mode === 'satu_shift') {
            tglSelesai.disabled = true;
            syncTanggal();
            enableShiftByTanggal(); // 🔥 hanya shift yg dimiliki
        }

        // === BEBERAPA HARI FULL ===
        else if (mode === 'banyak_full') {
            resetShift();
            tglSelesai.disabled = false;
        }

        // === BEBERAPA HARI (SHIFT) → SEMUA AKTIF ===
        else if (mode === 'banyak_shift') {
            tglSelesai.disabled = false;
            enableShift(); // 🔥 semua shift aktif
        }
    }

    // EVENT
    selectPegawai.on('change.select2', toggleByPegawai);

    modeHari.forEach(radio => {
        radio.addEventListener('change', function () {
            handleModeHari(this.value);
        });
    });

    tglMulai.addEventListener('change', syncTanggal);

    toggleByPegawai();
});
</script>



<?php /**PATH /var/www/html/resources/views/admin/Kehadiran/rekapan/absen_mandiri.blade.php ENDPATH**/ ?>