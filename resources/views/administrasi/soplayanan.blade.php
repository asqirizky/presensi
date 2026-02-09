@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<main>
    {{-- content1 --}}
    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/administrasi.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: rgba(255, 255, 255, 0.7); padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        SOP Layanan
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>SOP Layanan</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<!-- /.inner-banner-one -->

    <!--
	=====================================================
		Blog Details
	=====================================================
	-->
	<div class="blog-details position-relative mt-150 lg-mt-80 mb-150 lg-mb-80">
		<div class="container">
			<div class="row gx-xl-5">
                <div class="col-lg-12">
                    <article class="blog-meta-two style-two">
                        <div class="post-data">
                            <div class="blog-title"><h3>Prosedur Layanan Baca di Tempat</h3></div>
                            <p>Menjamin pemustaka dapat memanfaatkan koleksi yang ada untuk dibaca di area Perpustakaan dalam keadaan nyaman.</p>
                            <div class="post-details-meta">
                                <h4>Keterkaitan</h4>
                                <p>1. SOP Registrasi Kartu Anggota
                                <br>2. SOP Usulan Buku</br>
                                <h4>Prosedur Kerja</h4>
                                <h5>1.Pelaksanaan Layanan Membaca di Tempat</h5>
                                <p>
                                    - Pemustaka datang dengan membawa kartu anggota dan melakukan absensi menggunakan scand kartu di ruang lobby
                                    <br>- Bagi pemustaka yang tidak memiliki kartu atau kartu habis masa berlaku, dapat melakukan registrasi atau perpanjangan kartu kepada petugas lobby
                                    <br>- Bagi pengunjung, tamu, tenaga pengajar, dan dosen mengisi buku tamu terlebih dahulu dan menggunakan cocard yang telah disediakan oleh petugas lobby
                                    <br>- Pemustaka menyimpan tas/barang bawaan pada petugas lobby
                                    <br>- Pemustaka datang ke ruang koleksi dan memilih mandiri buku yang akan dibaca
                                    <br>- Pemustaka meninggalkan buku yang telah dibaca di meja baca
                                    <br>- Pemustaka harus melewati pintu detektor bila hendak keluar perpustakaan
                                </p>
                                <h5>2.Pengawasan Pengendalian</h5>
                                <p>
                                    - Pustakawan memastikan sistem absensi dan pintu detector dalam keadaan aktif
                                    <br>- Pustakawan memantau ketertiban, kebersihan ruang baca
                                    <br>- Pustakawan membantu pemustaka yang membutuhkan informasi
                                    <br>- Laporan layanan Baca Di Tempat berisi ketentuan, data pengunjung, buku yang dibaca, usulan buku, serta saran pengunjung, dan disahkan oleh Kasubag dan Kabag
                                    <br>- Kabag Teknis dan Layanan Pemustaka meninjau laporan kinerja layanan baca di tempat untuk menentukan lembaga dengan jumlah pengunjung terbanyak
                                    <br>- Selanjutnya Kabag Teknis dan Layanan akan merekapitulasi laporan untuk dilaporkan kepala Kepala Perpustakaan
                                </p>
                            </div>
                            <div class="blog-title mt-20"><h3>Prosedur Layanan Referensi</h3></div>
                            <p>Menjamin pemustaka dapat memanfaatkan referensi yang ada untuk dibaca di area Perpustakaan dalam keadaan nyaman</p>
                            <div class="post-details-meta">
                                <h4>Keterkaitan</h4>
                                <p>1. SOP Registrasi Kartu Anggota
                                <br>2. SOP Usulan Buku</br>
                                <h4>Prosedur Kerja</h4>
                                <h5>1.Pelaksanaan Layanan Referensi</h5>
                                <p>
                                    -Layanan referensi berada di ruang baca
                                    <br>- Pemustaka dapat juga menyampaikan kebutuhan referensi melalui contact person yang telah disediakan oleh pustakawan
                                    <br>- Pustakawan membantu pemustaka dalam penggunaan OPAC
                                    <br>- Pustakawan mengidentifikasi kebutuhan informasi dan menganalisis jawaban referensi dengan sumber yang ada. Jika sumber belum tersedia, pustakawan menambahkannya ke dalam daftar usulan buku
                                    <br>- Dalam memberikan jawaban refensi, pustakawan dan petugas dapat melakukan kemas ulang informasi untuk melengkapi kebutuhan infromasi pemustaka.
                                </p>
                                <h5>2.Pengawasan Pengendalian</h5>
                                <p>
                                    - Pustakawan memastikan sistem absensi dan pintu detector dalam keadaan aktif
                                    <br>- Laporan Layanan Referensi memuat semua aktivitas, kendala yang dihadapi, dan solusi yang dilakukan pada layanan Referensi berlangsung
                                    <br>- Kabag Teknis dan Layanan pemustaka mereview Laporan kegiatan kinerja Layanan Referensi dan melihat kemungkinan untuk mendiskusikan langkah-langkah yang bisa dilakukan untuk meningkatkan kualitas layanan
                                    <br>- Selanjutnya Kabag Teknis dan Layanan akan merekapitulasi laporan untuk dilaporkan kepala Kepala Perpustakaan
                                </p>
                            </div>
                            <!-- /.post-details-meta -->
                        </div>
                        <!-- /.post-data -->
                    </article>
                    <!-- /.blog-meta-two -->
                </div>
            </div>
		</div>
	</div>
	<!-- /.blog-details -->




</main>

@endsection
