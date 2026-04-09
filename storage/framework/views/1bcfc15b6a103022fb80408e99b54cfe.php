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
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">Rekap Absen Harian</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Rekap</li>
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
                <!--begin: Statistics Widget-->
                <div class="mb-5 card mb-xl-10">
                    <!--begin::Body-->
                    <div class="py-10 card-body">
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-4 text-gray-900 fw-bold fs-2">Rekap Absensi Pustakawan Perpustakaan Ibrahimy</div>
                            <div class="gap-2 mb-6">
                                <form method="GET" action="<?php echo e(route('laporan.cetak', ['bulan' => request('bulan', now()->month), 'tahun' => request('tahun', now()->year)])); ?>" target="_blank" class="mb-4 d-flex align-items-center">
                                    <div class="gap-2 d-flex align-items-end">
                                        <div>
                                            <select name="bulan" id="bulan" class="form-select" data-control="select2" data-hide-search="true">
                                                <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($b); ?>" <?php echo e(request('bulan', now()->month) == $b ? 'selected' : ''); ?>>
                                                        <?php echo e(\Carbon\Carbon::create()->month($b)->translatedFormat('F')); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div>
                                            <select name="tahun" id="tahun" class="form-select" data-control="select2" data-hide-search="true">
                                                <?php $__currentLoopData = range(now()->year - 5, now()->year + 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($t); ?>" <?php echo e(request('tahun', now()->year) == $t ? 'selected' : ''); ?>>
                                                        <?php echo e($t); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-md fw-bold">
                                            <i class="ki-outline ki-down-square me-1"></i>Cetak
                                        </button>
                                            <a href="<?php echo e(route('kehadiran-barokah_pustakawan.index')); ?>" class="btn btn-warning btn-md fw-bold">Input Barokah</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if($shiftAktif): ?>
                            <div class="mb-4 alert alert-success d-flex align-items-center" role="alert">
                                <i class="ki-outline ki-clock fs-2 me-2"></i>
                                <div>
                                    <strong>Shift Aktif:</strong> <?php echo e($shiftAktif->jadwal); ?>

                                    (<?php echo e(\Carbon\Carbon::parse($shiftAktif->jamMasuk)->format('H:i')); ?>

                                    - <?php echo e(\Carbon\Carbon::parse($shiftAktif->jamPulang)->format('H:i')); ?>)
                                    <br>
                                    <span id="countdown" class="transition-colors duration-500 fw-bold"></span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="mb-4 alert alert-warning d-flex align-items-center" role="alert">
                                <i class="ki-outline ki-alert-circle fs-2 me-2"></i>
                                <div>
                                    <strong>Tidak ada shift aktif saat ini.</strong>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($shiftAktif): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const jamPulang = "<?php echo e($shiftAktif->jamPulang); ?>";
                                    const [hour, minute, second] = jamPulang.split(':').map(Number);
                                    const now = new Date();
                                    const waktuPulang = new Date();

                                    waktuPulang.setHours(hour, minute, second, 0);

                                    // Jika shift lewat tengah malam
                                    if (waktuPulang < now) waktuPulang.setDate(waktuPulang.getDate() + 1);

                                    const countdownEl = document.getElementById('countdown');

                                    function updateCountdown() {
                                        const now = new Date();
                                        const selisih = waktuPulang - now;

                                        if (selisih <= 0) {
                                            countdownEl.innerText = "Waktu shift telah berakhir, memuat ulang...";
                                            location.reload();
                                            return;
                                        }

                                        const jam = Math.floor(selisih / (1000 * 60 * 60));
                                        const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
                                        const detik = Math.floor((selisih % (1000 * 60)) / 1000);

                                        countdownEl.innerText = `⏳ Waktu menuju pergantian shift: ${jam.toString().padStart(2, '0')} jam ${menit.toString().padStart(2, '0')} menit ${detik.toString().padStart(2, '0')} detik`;

                                        // 🔹 Warna adaptif berdasarkan tema & sisa waktu
                                        const persentase = selisih / (1000 * 60 * 60 * 12); // 12 jam shift max
                                        const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                                        if (persentase > 0.1) {
                                            countdownEl.style.color = isDark ? '#6EE7B7' : '#065F46'; // hijau
                                        } else if (persentase > 0.0,5) {
                                            countdownEl.style.color = isDark ? '#FCD34D' : '#92400E'; // kuning
                                        } else {
                                            countdownEl.style.color = isDark ? '#FCA5A5' : '#991B1B'; // merah
                                        }
                                    }

                                    updateCountdown;
                                    setInterval(updateCountdown, 1000);
                                });
                            </script>
                        <?php endif; ?>
                        <div class="flex-wrap d-flex">
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Hadir</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard fs-3 text-success me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo e($hadir); ?>"><?php echo e($hadir); ?></div>
                                </div>
                                <div class="mt-1 text-muted fs-7"></div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Tanpa Keterangan</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo e($tanpaKeterangan); ?>"><?php echo e($tanpaKeterangan); ?></div>
                                </div>
                                <div class="mt-1 text-muted fs-7"></div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Izin</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-profile-user fs-3 text-primary me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?php echo e($izinJumlah); ?>"><?php echo e($izinJumlah); ?></div>
                                </div>
                                <div class="mt-1 text-muted fs-7"></div>
                            </div>
                            <!--end::Stat-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end: Statistics Widget-->
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="gap-2 py-5 card-header align-items-center gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--end::Button filter-->
                            <a href="admin/kehadiran-rekapan" class="btn btn-primary me-4">Perhari</a>
                                <a href="admin/kehadiran-mingguan" class="btn btn-success maintenance me-4">Perminggu</a>
                                <a href="admin/kehadiran-bulanan" class="btn btn-warning maintenance me-4">Perbulan</a>
                                <a href="admin/kehadiran-edit" class="btn btn-danger me-4">Edit</a>
                            <!--end::Button filter-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card title-->
                        <div class="gap-2 card-toolbar d-flex justify-content-end align-items-center">
                            <form action="" method="GET" class="gap-2 d-flex align-items-center">
                                <input class="form-control mw-150px" type="date" name="tanggal" value="<?php echo e($tanggal); ?>">
                                <button class="btn fw-bold btn-primary">Filter</button>
                            </form>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="py-4 card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead class="fw-bold fs-5 bg-success">
                                <tr class="text-white text-start fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start ps-4 min-w-125px">Nama</th>
                                    <th class="text-center min-w-125px">Tanggal</th>
                                    <th class="text-center min-w-125px">Jam Masuk</th>
                                    <th class="text-center min-w-125px">Shift</th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center min-w-10px rounded-end">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            <?php $__currentLoopData = $rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift => $absens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__empty_1 = true; $__currentLoopData = $absens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="px-4 py-3 badge fs-7 badge-light-success">
                                            <?php echo e($item->nik); ?> - <?php echo e($item->nama_pegawai); ?>

                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e(Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM Y')); ?></td>
                                    <td class="text-center"><?php echo e($item->jam_masuk); ?></td>
                                    <td class="text-center"><?php echo e($item->shift); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <?php
                                            $ket = strtolower(trim($item->keterangan));
                                        ?>

                                        <?php if(str_contains($ket, 'izin')): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-warning">
                                                <?php echo e($item->keterangan); ?>

                                            </div>
                                        <?php elseif($ket == 'hadir'): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-success">
                                                <?php echo e($item->keterangan); ?>

                                            </div>
                                        <?php elseif(str_contains($ket, 'sakit')): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-danger">
                                                <?php echo e($item->keterangan); ?>

                                            </div>
                                        <?php elseif(str_contains($ket, 'bepergian')): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-info">
                                                <?php echo e($item->keterangan); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-primary">
                                                <?php echo e($item->keterangan); ?>

                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="py-4 text-center text-muted">No data available in table</td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
				<!--end::Navbar-->
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
<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendadmin/ors Javascript-->
<!--begin::Cuadmin/stom Javascript(used for this page only)-->
<script src="admin/assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="admin/assets/js/widgets.bundle.js"></script>
<script src="admin/assets/js/custom/widgets.js"></script>
<script src="admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="admin/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="admin/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="admin/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

<script>
    // Auto refresh setiap 5 menit untuk cek pergantian shift
    setInterval(() => {
        fetch("<?php echo e(route('kehadiran-rekap.index')); ?>", { method: 'HEAD' })
            .then(() => {
                location.reload();
            });
    }, 5 * 60 * 1000); // setiap 5 menit
    // Opsional: tampilkan waktu sekarang (biar kelihatan realtime)
    setInterval(() => {
        const now = new Date();
        document.getElementById('waktu-sekarang')?.textContent =
            now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }, 1000);
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yogy/Dokumen/presensi/resources/views/admin/Kehadiran/rekapan/rekapan.blade.php ENDPATH**/ ?>