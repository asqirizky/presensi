@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/img_32.jpg);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Tugas & Fungsi
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Tugas dan Fungsi</li>
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
                    <div class="col-lg-8">
                        <article class="blog-meta-two style-two">
                            <div class="post-data">
                                <div class="blog-title"><h4>Fungsi dan Tugas Pokok</h4></div>
                                <p >Dalam kapasitasnya sebagai Perpustakaan Perguruan Tinggi yang disediakan untuk mahasiswa dan para dosen, walaupun pada prinsipnya bersifat umum untuk siapa saja sesuai atauran yang berlaku, fungsi dan tugas pokoknya pun agak istimewa dari perpustakaan umum.</p>
                                <div class="post-details-meta">
                                    <h3>Tugas Pokok</h3>
                                    <ul class="style-none list-item">
                                        <p>Untuk menunjang kegiatan proses belajar mengajar maka Perpustakaan Universitas Ibrahimy mempunyai tugas pokok sebagai berikut:
                                        <br>1.  Pengolahan bahan pustaka.
                                        <br>2.  Pembinaan dan pengembangan koleksi bahan pustaka.
                                        <br>3.  Penambahan koleksi perpustakaan.
                                        <br>4.  Pelayanan kepada para pemakai koleksi bahan pustaka dan fasilitas perpustakaan.
                                        <br>5.  Pemeliharaan dan pengawetan koleksi bahan pustaka.
                                        <br>6.  Penelitian kebutuhan para pemakai.
                                        <br>7.  Penyelenggaraan bimbingan para pemakai.
                                        <br>8.  Pembinaan minat baca
                                        </p>
                                    </ul>
                                    <h3>Fungsi</h3>
                                    <ul class="style-none list-item">
                                        <p>Perpustakaan Universitas Ibrahimy berfungsi menunjang kebutuhan informasi ilmiyah bagi seluruh mahasiswa civitas akademika dalam rangka melaksanakan tugas-tugas, seperti tercantum dalam Tri Daharma Perguruan Tinggi:
                                        <br>1.  Membentuk manusia sosial yang berjiwa pancasila dan bertanggung jawab akan terwujudnya masyarakat sosial Indonesia yang adil dan makmur,materil maupun spirituil–pendidikan dan pengajaran.
                                        <br>2.  Melakukan penelitian dan usaha kemajuan dalam lapangan ilmu pengetahuan, kebudayaan dan kehidupan masyarakat-penelitian..
                                        <br>3.  Menyiapkan tenaga yang cukup untuk memangku jabatan yang memerlukan pendidikan tinggi dan yang berdiri sendiri dalam memelihara dan memajukan ilmu pengetahuan-pengabdian.
                                        </p>
                                    </ul>
                                </div>
                                <!-- /.post-details-meta -->

                            </div>
                            <!-- /.post-data -->
                        </article>
                        <!-- /.blog-meta-two -->
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="blog-sidebar md-mt-80 ps-xxl-4">
                            <div class="blog-recent-news lg-mt-40">
                                <article class="recent-news">
                                    <figure class="post-img" style="background-image: url(assets/images/media/img_10.jpg);
                                    background-size: cover;
                                    height: 600px;
                                    max-height: 600px;
                                    width: 100%;"">
                                    </figure>
                                </article>
                            </div>
                            <!-- /.blog-recent-news -->
                        </div>
                        <!-- /.blog-sidebar -->
                    </div>
                </div>
			</div>
		</div>
		<!-- /.blog-details -->


</main>


@endsection
