@extends('layout.headerfooter')
@section('konten')
<main>

    <!--
	=============================================
		Inner Banner
	==============================================
	-->
	<div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative" style="background-image: url(assets/images/media/komitmen.png);">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-lg-6">
                    <h1 class="hero-heading d-inline-block position-relative" style="background-color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #0e3e2f;">
                        Komitmen Layanan
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    {{-- <p class="text-white text-lg mb-70 lg-mb-40">Memahami sejarah perpustakaan memperluas wawasan dan apresiasi literasi.</p> --}}
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Komitmen Layanan</li>
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
                            <div class="blog-title"><h4>Komitmen Layanan</h4></div>
                            <p>Kami sebagai pustakawan berkomitmen untuk memberikan layanan terbaik kepada pengunjung Perpustakaan Ibrahihmy
                                dengan menjunjung tinggi nilai-nilai profesionalisme, integritas dan tanggung jawab setiap aspek pelayanan,
                                berikut merupakan poin-poin komitmen layanan kami:</p>
                            <div class="post-details-meta">
                                <h4>1.Kepuasan Pelanggan sebagai Prioritas Utama</h4>
                                <ul class="style-none list-item">
                                    <p>Kami berkomitmen untuk menempatkan kepuasan pelanggan sebagai tujuan utama kami. Setiap masukan dan feedback dari pengunjung akan kami terima dengan terbuka dan digunakan untuk perbaikan layanan secara berkelanjutan.</p>
                                </ul>
                                <h4>2.Responsive dan Tepat Waktu</h4>
                                <ul class="style-none list-item">
                                    <p>Kami memahami pentingnya waktu bagi pelanggan. Oleh karena itu, kami berkomitmen untuk merespon setiap permintaan, pertanyaan atau keluhan pelanggan secara cepat dan tepat waktu.</p>
                                </ul>
                                <h4>3.Profesionalisme dalam Pelayananan</h4>
                                <ul class="style-none list-item">
                                    <p>Kami menjunjung tinggi standart profesionalisme dalam setiap interaksi dengan pelanggan. setiap pustakawan dilatih untuk bersikap ramah, menghormati, dan memiliki pengetahuan yang memadai untuk membantu pengunjung dengan solusi yang relevan.</p>
                                </ul>
                                <h4>4.Transparansi dan Kejujuran</h4>
                                <ul class="style-none list-item">
                                    <p>Kami berkomitmen untuk bersikap transparan dan jujur dalam setiap transaksi dan berinteraksi dengan pengunjung. Informasi mengenai layanan dan kebijakan akan disampaikan dengan jelas.</p>
                                </ul>
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
