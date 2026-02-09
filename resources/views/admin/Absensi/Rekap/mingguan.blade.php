@extends('layout.sidebarnavbar')
@section('admin-konten')

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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Rekap Absen Mingguan</h1>
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
                <!--begin: Statistics Widget 6-->
                <div class="card card mb-5 mb-xl-10">
                    <div class="card-body py-10">
                        <div class="text-gray-900 fw-bold fs-2 mb-4">Rekap Absensi Khidmah Perpustakaan Ibrahimy bulan {{ Carbon\Carbon::now()->isoFormat('MMMM Y') }}</div>
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">Kehadiran</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard fs-3 text-success me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $jumlahHadir }}">
                                        {{ $jumlahHadir }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ $persentaseHadir }}% dalam seminggu
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">Tanpa Keterangan</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-simcard-2 fs-3 text-danger me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $jumlahTanpaKeterangan }}">
                                        {{ $jumlahTanpaKeterangan }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ $persentaseTanpaKeterangan }}% dalam seminggu
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6">
                                <div class="fw-semibold fs-6 text-gray-600">Izin</div>
                                <div class="d-flex align-items-center">
                                    <i class="ki-outline ki-profile-user fs-3 text-primary me-2"></i>
                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $jumlahIzin }}">
                                        {{ $jumlahIzin }}
                                    </div>
                                </div>
                                <div class="text-muted fs-7 mt-1">
                                    {{ $persentaseIzin }}% dalam seminggu
                                </div>
                            </div>
                            <!--end::Stat-->
                        </div>
                    </div>
                </div>
				<!--end::Navbar-->
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <a href="admin/absensi-rekap" class="btn btn-primary me-4">Perhari</a>
                            <a href="admin/rekap-bulanan" class="btn btn-success me-4">Perbulan</a>
                            @if(auth()->user()->hasPermissionTo('absen rekap-edit'))
                                <a href="{{ url('admin/rekap-absen') }}" class="btn btn-info me-4">Edit</a>
                            @endif
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card title-->
                        <div class="card-toolbar d-flex flex-wrap gap-4 align-items-end justify-content-between">
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
                            <!-- Form Filter Minggu -->
                            <form method="GET" class="d-flex align-items-end gap-2 mb-0">
                                <!-- Input Bulan -->
                                <div>
                                    <input type="month" name="bulan" value="{{ $bulan }}" class="form-control" onchange="this.form.submit()">
                                </div>
                                <!-- Pilih Minggu -->
                                <div>
                                    <select name="minggu_ke" class="form-select" data-control="select2" data-hide-search="true" onchange="this.form.submit()">
                                        @foreach ($weeks as $index => $week)
                                            <option value="{{ $index + 1 }}" {{ $minggu_ke == $index + 1 ? 'selected' : '' }}>
                                                Minggu {{ $index + 1 }} ({{ $week['label'] }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        @php
                            use Carbon\CarbonPeriod;
                            $range = CarbonPeriod::create($tanggal_awal, $tanggal_akhir);
                        @endphp

                        @foreach ($rekap as $shift => $groupedByNik)
                            <h4 class="mt-5">Shift : {{ ucfirst($shift) }}</h4>
                            <table class="table align-middle table-striped table-row-dashed fs-6 gy-5">
                                <thead class="fw-bold fs-5 bg-primary">
                                    <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
                                        <th class="rounded-start w-10px pe-2"></th>
                                        <th class="text-start">NIK</th>
                                        <th class="text-start">Nama</th>
                                        @foreach ($range as $date)
                                            <th class="text-center">{{ $date->format('d M') }}</th>
                                        @endforeach
                                        <th class="text-center rounded-end min-w-100px"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($groupedByNik as $nik => $absens)
                                        @php
                                            $khidmah = $khidmahs->firstWhere('nik', $nik);
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td>{{ $nik }}</td>
                                            <td>{{ $khidmah->nama ?? '-' }}</td>
                                            @foreach ($range as $date)
                                                @php
                                                    $dateString = $date->toDateString();
                                                    $absen = $absens->firstWhere('tanggal', $dateString);

                                                    $izin = $izinList->first(function ($i) use ($nik, $dateString, $shift) {
                                                        return (string)$i->nik === (string)$nik &&
                                                            \Carbon\Carbon::parse($i->tanggal_mulai)->toDateString() <= $dateString &&
                                                            \Carbon\Carbon::parse($i->tanggal_selesai)->toDateString() >= $dateString &&
                                                            $i->shifts->contains('nama', $shift);
                                                        });


                                                    $libur = $holidays->get($dateString);
                                                @endphp
                                                <td class="text-center">
                                                    @if ($libur)
                                                        <span class="text-danger">Libur</span>
                                                    @elseif ($izin)
                                                        <span class="text-primary">{{ $izin->keterangan ?? 'Izin' }}</span>
                                                    @elseif ($absen)
                                                        <span class="text-success">{{ $absen['keterangan'] }}</span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center">Tidak ada data tersedia</td>
                                        </tr>
                                    @endforelse
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
</div>
<!--end:::Main-->

@endsection
