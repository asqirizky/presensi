@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
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
                        <div class="mb-4 text-gray-900 fw-bold fs-2">Rekap Absensi Khidmah Perpustakaan Ibrahimy {{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</div>
                        <div class="flex-wrap d-flex">
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Hadir</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard fs-3 text-success me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $jumlahHadir }}">{{ $jumlahHadir }}</div>
                                </div>
                                <div class="mt-1 text-muted fs-7">{{ $persentase }}% dari {{ $totalAnggota }} anggota</div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Tanpa Keterangan</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                         data-kt-countup-value="{{ $jumlahTanpaKeterangan }}">
                                        {{ $jumlahTanpaKeterangan }}
                                    </div>
                                </div>
                                <div class="mt-1 text-muted fs-7">{{ $persentaseTanpaKeterangan }}% dari {{ $totalAnggota }} anggota</div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="px-4 py-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                                <div class="text-gray-600 fw-semibold fs-6">Izin</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-profile-user fs-3 text-primary me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $jumlahIzin }}">
                                        {{ $jumlahIzin }}
                                    </div>
                                </div>
                                <div class="mt-1 text-muted fs-7">{{ $persentaseIzin }}% dari {{ $totalAnggota }} anggota</div>
                            </div
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
                            <a href="admin/rekap-mingguan" class="btn btn-success me-4">Perminggu</a>
                            <a href="admin/rekap-bulanan" class="btn btn-warning me-4">Perbulan</a>
                            @if(auth()->user()->hasPermissionTo('absen rekap-edit'))
                                <a href="{{ url('admin/rekap-absen') }}" class="btn btn-info me-4">Edit</a>
                            @endif
                            <!--end::Button filter-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card title-->
                        <div class="flex-wrap gap-4 card-toolbar d-flex align-items-end">
                            <form action="{{ route('rekap.harian') }}" method="GET" class="flex-wrap gap-3 d-flex align-items-center">
                                <!-- Pilihan Tanggal -->
                                <div class="gap-2 d-flex align-items-center">
                                    <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal }}" class="form-control form-control-md mw-150px">
                                </div>
                                <!-- Tombol Filter -->
                                <button type="submit" class="btn btn-md btn-primary fw-bold">Filter</button>
                            </form>
                            <form method="GET" action="{{ route('rekap.laporan', ['bulan' => request('bulan', now()->month), 'tahun' => request('tahun', now()->year)]) }}" target="_blank" class="mb-4 d-flex align-items-center">
                                <div class="me-2">
                                    <select name="bulan" id="bulan" class="form-select" data-control="select2" data-hide-search="true" required>
                                        @foreach(range(1, 12) as $b)
                                            <option value="{{ $b }}" {{ request('bulan', now()->month) == $b ? 'selected' : '' }}>
                                                {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="me-2">
                                    <select name="tahun" id="tahun" class="form-select" data-control="select2" data-hide-search="true" required>
                                        @foreach(range(now()->year - 5, now()->year + 1) as $t)
                                            <option value="{{ $t }}" {{ request('tahun', now()->year) == $t ? 'selected' : '' }}>
                                                {{ $t }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="align-self-end">
                                    <button type="submit" class="btn btn-danger btn-md fw-bold">
                                        <i class="ki-outline ki-down-square me-1"></i> Cetak
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="py-4 card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-striped table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead class="fw-bold fs-5 bg-primary">
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
                            @foreach ( $rekap as $shift => $absens )
                                @forelse ( $absens as $absen )
                                <tr>
                                    <td class="ps-4">{{ $absen['nik'] }} - {{ $absen['nama'] }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($absen['tanggal'])->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td class="text-center">
                                        {{ $absen['jam_masuk'] ?? '-' }}
                                    </td>
                                    <td class="text-center">{{ $absen['shift'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        {{ $absen['keterangan'] ?? '-' }}
                                    </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="7" class="text-center">No data available in data</td></tr>
                                    @endforelse
                                @endforeach
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
    @include('layout.footer')
    <!--end::Footer-->
</div>
<!--end:::Main-->

@endsection

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/apps/projects/project/project.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<script src="assets/js/custom/utilities/modals/new-target.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
