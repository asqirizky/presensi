@extends('layout.sidebarnavbar')
@section('admin-konten')

{{-- content --}}
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Rekap Absen Bulanan</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
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
				<!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Body-->
                    <div class="card-body py-10">
                        <div class="text-gray-900 fw-bold fs-2 mb-4">Rekap Absensi Khidmah Perpustakaan Ibrahimy bulan {{ Carbon\Carbon::now()->isoFormat('MMMM Y') }}</div>
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">
                                    Hadir ({{ \Carbon\Carbon::parse($startOfMonth)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endOfMonth)->format('d M Y') }})
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard fs-3 text-success me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ round($jumlahHadir) }}">
                                        {{ round($jumlahHadir) }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ round($persentaseHadir) }}% dari {{ number_format($totalKehadiranMaks) }} total kehadiran
                                    @if($jumlahHari > 0 && $totalAnggota > 0)
                                        ({{ $totalAnggota }} anggota × {{ round($jumlahHari) }} hari)
                                    @endif
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">Tanpa Keterangan</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ round($jumlahTanpaKeterangan) }}">
                                        {{ round($jumlahTanpaKeterangan) }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ round($persentaseTanpaKeterangan) }}% dari {{ number_format($totalKehadiranMaks) }} total kehadiran ({{ $totalAnggota }} anggota × {{ $totalHari }} hari)
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">Izin</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-profile-user fs-3 text-primary me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ round($jumlahIzin) }}">
                                        {{ round($jumlahIzin) }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ round($persentaseIzin) }}% dari {{ number_format($totalKehadiranMaks) }} total kehadiran ({{ $totalAnggota }} anggota × {{ $totalHari }} hari)
                                </div>
                            </div>
                            <!--end::Stat-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
				<!--end::Navbar-->
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--end::Button filter-->
                            <a href="admin/absensi-rekap" class="btn btn-success me-4">Perhari</a>
                            <a href="admin/rekap-mingguan" class="btn btn-warning me-4">Perminggu</a>
                            @if(auth()->user()->hasPermissionTo('absen rekap-edit'))
                                <a href="{{ url('admin/rekap-absen') }}" class="btn btn-info me-4">Edit</a>
                            @endif
                            <!--end::Button filter-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card title-->
                        <div class="card-toolbar d-flex flex-wrap justify-content-end align-items-end gap-4">
                            <!-- Form Cetak PDF Rekap Bulanan -->
                            <form method="GET" action="{{ route('rekap.laporan', ['bulan' => request('bulan', now()->month), 'tahun' => request('tahun', now()->year)]) }}" target="_blank" class="d-flex align-items-end gap-2 mb-0">
                                <!-- Pilih Bulan -->
                                <div>
                                    <select name="bulan" id="bulan" class="form-select" data-control="select2" data-hide-search="true" required>
                                        @foreach(range(1, 12) as $b)
                                            <option value="{{ $b }}" {{ request('bulan', now()->month) == $b ? 'selected' : '' }}>
                                                {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Pilih Tahun -->
                                <div>
                                    <select name="tahun" id="tahun" class="form-select" data-control="select2" data-hide-search="true" required>
                                        @foreach(range(now()->year - 5, now()->year + 1) as $t)
                                            <option value="{{ $t }}" {{ request('tahun', now()->year) == $t ? 'selected' : '' }}>
                                                {{ $t }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Tombol Cetak -->
                                <div>
                                    <button type="submit" class="btn btn-danger btn-md fw-bold">
                                        <i class="ki-outline ki-down-square me-1"></i> Cetak
                                    </button>
                                </div>
                            </form>
                            <!-- Form Filter Bulan -->
                            <form method="GET" class="d-flex align-items-end gap-2 mb-0">
                                <div>
                                    <input type="month" name="bulan" value="{{ $bulan }}" class="form-control w-auto">
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-md">Filter</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        @foreach ($rekap as $shift => $users)
                        <h4 class="mt-5">Shift : {{ ucfirst($shift) }}</h4>
                        <!--begin::Table-->
                        <table class="table align-middle table-striped table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead class="fw-bold fs-5 bg-primary">
                                <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
                                    <th class="rounded-start w-10px pe-2"></th>
                                    <th class="text-start min-w-125px">Nama</th>
                                    <th class="text-center min-w-125px">Jumlah Hadir</th>
                                    <th class="text-center min-w-10px"></th>
                                    <th class="text-center min-w-10px">Persentase (%)</th>
                                    <th class="text-center min-w-125px"></th>
                                    <th class="text-center rounded-end min-w-100px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($users as $nik => $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $nik }} - {{ $data['nama'] }}</td>
                                    <td class="text-center">{{ $data['jumlah_hadir'] }} / {{ $totalHari }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center">{{ $data['persentase'] }}%</td>
                                    <td class="text-center"></td>
                                    <td class="text-center pe-0">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 delete-button">Hapus</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @endforeach
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
    @include('layout.footer')
    <!--end::Footer-->


</div>
<!--end:::Main-->

@endsection
