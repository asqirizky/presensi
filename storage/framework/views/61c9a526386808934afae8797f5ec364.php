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
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">Data Tenaga Khidmah</h1>
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
                        <li class="breadcrumb-item text-muted">Khidmah</li>
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
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="gap-2 py-5 card-header align-items-center gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="my-1 d-flex align-items-center position-relative">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control w-250px ps-12" placeholder="Cari Tenaga Khidmah" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="gap-5 card-toolbar flex-row-fluid justify-content-end">
                            <!--begin::Add product-->
                            <?php if(auth()->user()->hasPermissionTo('absen khidmah-tambah')): ?>
                            <a href="admin/absensi-khidmah_tambah" class="btn btn-primary">Tambah Tenaga Khidmah</a>
                            <?php endif; ?>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="pt-0 card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead class="fw-bold fs-5 bg-success">
                                <tr class="text-white text-start fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start w-10px"></th>
                                    <th class="text-start">NIK</th>
                                    <th class="text-center min-w-200px">Nama</th>
                                    <th class="text-center min-w-70px"></th>
                                    <th class="text-center min-w-100px">Alamat</th>
                                    <th class="text-center min-w-100px">Asrama</th>
                                    <th class="text-center min-w-100px">Lokasi</th>
                                    <th class="text-center rounded-end min-w-70px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-white-600">
                                <?php $__currentLoopData = $khidmah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="px-4 py-3 badge fs-7 badge-light-success">
                                            <?php echo e($item->nik); ?>

                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="overflow-hidden symbol symbol-circle symbol-50px me-3">
                                            <div class="symbol-label">
                                                <img src="<?php echo e(asset('/storage/khidmah/' . $item->foto)); ?>" alt="<?php echo e($item->nama); ?>" class="w-100" />
                                            </div>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <div class="mb-1 text-gray-800"><?php echo e($item->nama); ?></div>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <td class="text-center pe-0"></td>
                                    <td class="text-center pe-0"><?php echo e($item->alamat); ?></td>
                                    <td class="text-center pe-0"><?php echo e($item->asrama); ?></td>
                                    <td class="text-center pe-0" data-order="Published">
                                        <!--begin::Badges-->
                                        <?php if($item->lokasi == "Perpustakaan Putra"): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-primary"><?php echo e($item->lokasi); ?></div>
                                        <?php elseif($item->lokasi == "Perpustakaan Putri"): ?>
                                            <div class="px-4 py-3 badge fs-7 badge-light-danger"><?php echo e($item->lokasi); ?></div>
                                        <?php endif; ?>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-success btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
										<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
										<!--begin::Menu-->
										<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-info fw-semibold fs-7 w-125px" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <?php if(auth()->user()->hasPermissionTo('absen khidmah-detail')): ?>
											<div class="px-3 menu-item">
                                                <a class="px-3 menu-link" href="<?php echo e(asset('/admin/absensi-detail_khidmah('.$item->id.')')); ?>">Detail</a>
                                            </div>
                                            <?php endif; ?>
											<!--end::Menu item-->
											<!--begin::Menu item-->
                                            <?php if(auth()->user()->hasPermissionTo('absen khidmah-hapus')): ?>
                                            <div class="px-3 menu-item">
                                                <a href="<?php echo e(asset('/admin/absensi-khidmah('.$item->id.')/hapus')); ?>" class="px-3 menu-link" data-kt-users-table-filter="delete_row" data-confirm-delete="true">Hapus</a>
                                            </div>
                                            <?php endif; ?>
                                            <!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
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

<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Absensi/Khidmah/khidmah.blade.php ENDPATH**/ ?>