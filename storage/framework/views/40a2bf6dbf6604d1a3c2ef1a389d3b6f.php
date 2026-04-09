<?php $__env->startSection('admin-konten'); ?>


<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="py-3 app-toolbar py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="flex-wrap page-title d-flex flex-column justify-content-center me-3">
                    <!--begin::Title-->
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">
                        Barokah Pustakawan</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/kehadiran-rekapan" class="text-muted text-hover-primary">Rekapan</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Barokah Pustakawan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Products-->
                <div class="card card-flush" >
                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('kehadiran-barokah_pustakawan.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <!--begin::Card header-->
                        <div class="gap-2 py-5 card-header align-items-center gap-md-5 bg-success" style="background-image: url('/admin/assets/media/pattern.png'); background-size: 650px; background-position: right; background-repeat: no-repeat;">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--end::Button filter-->
                                    <button type="submit" class="btn btn-danger me-4">Simpan</button>
                                <!--end::Button filter-->
                                <!--begin::Menu-->
                                <a href="#" class="btn btn-m btn-light-primary btn-active-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    APBM <?php echo e(request('apbm', date('Y'))); ?>

                                    <i class="ki-outline ki-down fs-5 ms-1"></i>
                                </a>
                                <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded
                                            menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-100px"
                                    data-kt-menu="true">
                                    <?php $__currentLoopData = range(date('Y') - 1, date('Y') + 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apbm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="px-3 menu-item">
                                            <a href="<?php echo e(request()->fullUrlWithQuery(['apbm' => $apbm])); ?>"
                                            class="px-3 menu-link <?php echo e(request('apbm', date('Y')) == $apbm ? 'active' : ''); ?>">
                                                <?php echo e($apbm); ?>

                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="py-4 card-body">
                            <!--begin::Table-->
                            <table class="table align-middle table-striped table-row-dashed fs-6 gy-5" >
                                <thead class="fw-bold fs-5 bg-success">
                                    <tr class="text-white text-start fw-bold fs-7 text-uppercase gs-0">
                                        <th class="rounded-start ps-4"></th>
                                        <th class="text-start min-w-10px">Nama</th>
                                        <th class="text-center min-w-125px">Kehadiran</th>
                                        <th class="text-center min-w-125px">Jabatan</th>
                                        <th class="text-center min-w-125px">Pengabdian</th>
                                        <th class="text-center min-w-125px">Tunkel</th>
                                        <th class="text-center min-w-125px">Kehormatan</th>
                                        <th class="text-center min-w-120px">Anak</th>
                                        <th class="text-center min-w-125px rounded-end">TBK</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $aktifRankDosen = !empty($item->tmt_mengajar);

                                        $rankDosen = (int) ($item->t_rank_dosen ?? 0);
                                        $sksOld    = (int) old("sks_dosen.$item->id", 0);

                                        $tBarokahPreview = $aktifRankDosen
                                            ? ($sksOld * $rankDosen)
                                            : 0;
                                    ?>

                                    <tr>
                                        <td></td>
                                        <!-- Nama -->
                                        <td class="text-start">
                                            <span class="px-4 py-3 badge fs-7 badge-light-success">
                                                <?php echo e($item->nama_pegawai); ?>

                                            </span>
                                        </td>
                                        <!-- Kehadiran -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_kehadiran]" value="0">
                                                <input class="form-check-input" type="checkbox" value   ="<?php echo e($item->kehadiran); ?>" name="pegawai[<?php echo e($item->id); ?>][t_kehadiran]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->t_kehadiran > 0 ? 'checked' : ''); ?>/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                    <?php echo e(number_format($item->kehadiran, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- Jabatan -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_jabatan]" value="0">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($item->jabatan); ?>" name="pegawai[<?php echo e($item->id); ?>][t_jabatan]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->t_jabatan > 0 ? 'checked' : ''); ?>

                                                id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                <?php echo e(number_format($item->jabatan, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- Pengabdian -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_pengabdian]" value="0">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($item->pengabdian); ?>" name="pegawai[<?php echo e($item->id); ?>][t_pengabdian]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->t_pengabdian > 0 ? 'checked' : ''); ?>

                                                id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                <?php echo e(number_format($item->pengabdian, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- Tunkel -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_tunkel]" value="0">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($item->tunkel); ?>" name="pegawai[<?php echo e($item->id); ?>][t_tunkel]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->tunkel > 0 ? 'checked' : ''); ?>

                                                id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                <?php echo e(number_format($item->tunkel, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- Kehormatan -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_kehormatan]" value="0">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($item->kehormatan); ?>" name="pegawai[<?php echo e($item->id); ?>][t_kehormatan]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->tunkel > 0 ? 'checked' : ''); ?>

                                                id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                <?php echo e(number_format($item->kehormatan, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- Anak -->
                                        <td class="text-center">
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input type="hidden" name="pegawai[<?php echo e($item->id); ?>][t_anak]" value="0">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($item->anak); ?>" name="pegawai[<?php echo e($item->id); ?>][t_anak]"
                                                <?php echo e(isset($barokah[$item->id]) && $barokah[$item->id]->anak > 0 ? 'checked' : ''); ?>

                                                id="flexRadioLg"/>
                                                <label class="form-check-label" for="flexRadioLg">
                                                <?php echo e(number_format($item->anak, 0, ',', '.')); ?>

                                                </label>
                                            </div>
                                        </td>
                                        <!-- TBK -->
                                        <td class="text-center">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text">SKS</span>

                                                <?php if($aktifRankDosen): ?>
                                                    <input
                                                        type="number"
                                                        name="sks_dosen[<?php echo e($item->id); ?>]"
                                                        class="form-control"
                                                        min="0"
                                                        value="<?php echo e($sksOld); ?>">
                                                <?php else: ?>
                                                    <input type="number" class="form-control" value="0" readonly>
                                                    <input type="hidden" name="sks_dosen[<?php echo e($item->id); ?>]" value="0">
                                                <?php endif; ?>

                                                <span class="input-group-text">x</span>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="<?php echo e(number_format($rankDosen)); ?>"
                                                    readonly>
                                            </div>

                                            <?php if(!$aktifRankDosen): ?>
                                                <small class="mt-1 text-muted d-block">
                                                    Belum memiliki TMT Mengajar
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </form>
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--end::Footer-->
</div>
<!--end:::Main-->

<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/js/scripts.bundle.js"></script>
<!--begin::Veadmin/ndors Javascript(used for this page only)-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/js/scripts.bundle.js"></script>
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--end::Custom Javascript-->
<!--end::Javascript-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yogy/Dokumen/presensi/resources/views/admin/Kehadiran/barokah_pustakawan/barokah_generate.blade.php ENDPATH**/ ?>