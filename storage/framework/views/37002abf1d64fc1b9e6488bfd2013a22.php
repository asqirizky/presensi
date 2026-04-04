<?php $__env->startSection('admin-konten'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center text-white">Pilih Room Absensi</h2>

    <div class="row justify-content-center g-4">
        <!-- Absen Biasa -->
        <div class="col-md-5">
            <div class="overflow-hidden shadow-lg card rounded-4">
                <!-- Preview Background -->
                <div class="p-3" style="
                    background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364);
                    background-size: 300% 300%;
                    height: 200px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    animation: gradientMove 8s ease infinite;">
                    <div class="text-center">
                        <i class="bi bi-person-check" style="font-size: 3rem; color:white;"></i>
                        <p class="mt-2 mb-0" style="color:white; font-size: 0.9rem;">Absen Manual</p>
                    </div>
                </div>
                <div class="text-center card-body">
                    <h5 class="card-title">Absen Biasa</h5>
                    <p class="card-text">Isi absensi dengan input manual.</p>
                    <a href="<?php echo e(route('kehadiran-absen.index')); ?>" class="btn btn-outline-primary w-100">Masuk</a>
                </div>
            </div>
        </div>

        <!-- Absen Fingerprint -->
        <div class="col-md-5">
            <div class="overflow-hidden shadow-lg card rounded-4">
                <!-- Preview Background -->
                <div class="p-3" style="
                    background: linear-gradient(-45deg, #1a2a6c, #b21f1f, #fdbb2d);
                    background-size: 300% 300%;
                    height: 200px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    animation: gradientMove 8s ease infinite;">
                    <div class="text-center">
                        <!-- SVG SIDIK JARI -->
                        <svg class="fingerprint-svg" viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M100 220 C30 220, 20 170, 40 135 C60 100, 80 95, 100 95 C120 95, 140 100, 160 135 C180 170, 170 220, 100 220" />
                                <path d="M100 200 C45 200, 40 165, 55 140 C70 115, 85 110, 100 110 C115 110, 130 115, 145 140 C160 165, 155 200, 100 200" stroke-width="5"/>
                                <path d="M100 180 C60 180, 62 150, 75 130 C88 110, 97 108, 100 108 C103 108, 112 110, 125 130 C138 150, 140 180, 100 180" stroke-width="4"/>
                                <path d="M100 160 C78 160, 82 140, 92 128 C98 120, 101 120, 100 120 C99 120, 102 120, 108 128 C118 140, 122 160, 100 160" stroke-width="3"/>
                                <path d="M100 140 C92 140, 92 130, 98 124 C100 122, 100 122, 100 122 C100 122, 100 122, 102 124 C108 130, 108 140, 100 140" stroke-width="2.5"/>
                            </g>
                            <g fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round">
                                <path d="M100 120 C98 130, 98 140, 100 150 C102 160, 106 170, 106 180" opacity="0.9"/>
                            </g>
                        </svg>
                        <p class="mt-2 mb-0" style="color:white; font-size: 0.9rem;">Scan Jari</p>
                    </div>
                </div>
                <div class="text-center card-body">
                    <h5 class="card-title">Absen Fingerprint</h5>
                    <p class="card-text">Gunakan fingerprint scanner untuk absen otomatis.</p>
                    <a href="#" class="btn btn-outline-success w-100">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
/* SVG Fingerprint Styling */
.fingerprint-svg {
    width: 70px;
    height: auto;
    color: #00e6ff;
    filter: drop-shadow(0 0 6px rgba(0,230,255,0.4));
    animation: fpPulse 1.6s ease-in-out infinite;
    transform-origin: center;
}
@keyframes fpPulse {
    0%   { transform: scale(1); opacity: 1; }
    50%  { transform: scale(1.06); opacity: 0.85; }
    100% { transform: scale(1); opacity: 1; }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Kehadiran/kehadiran/hadir.blade.php ENDPATH**/ ?>