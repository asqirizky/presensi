@extends('layout.headerfooter')
@section('konten')

{{-- konten --}}
<main>
    {{-- content1 --}}
    <div class="breadcrumb__area dark-green breadcrumb-space overflow-hidden custom-width position-relative z-1" data-background="assets/imgs/breadcrumb/informasi.png">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">Kebijakan Organisasi</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="/">Home</a></span></li>
                                    <li class="active"><span>Kebijakan Organisasi</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- content2 --}}
    <section class="section-space-top section-space-bottom-2 overflow-hidden">
        <div class="choose-us__area">
            <div class="container">
                <div class="row align-items-center">
                    <h2 class="story-details__content-title mb-30 wow fadeInLeft animated" data-wow-delay=".2xxs">Kebijakan Organisasi</h2>
                    <p>Kami sebagai pustakawan berkomitmen untuk memberikan layanan terbaik kepada pengunjung Perpustakaan Ibrahihmy <br> dengan menjunjung tinggi nilai-nilai profesionalisme, integritas dan tanggung jawab setiap aspek pelayanan, <br> berikut merupakan poin-poin komitmen layanan kami:</p>
                    <div class="col-xl-12 col-lg-12">
                        <div class="choose-us2__list mt-15 wow fadeInLeft animated" data-wow-delay=".5s">
                            <div class="choose-us2__list-text">
                                <h4><i class="fa-solid me-4">1.</i>Kepuasan Pelanggan sebagai Prioritas Utama</h4>
                                <p class="ms-5">Kami berkomitmen untuk menempatkan kepuasan pelanggan sebagai tujuan utama kami. <br> Setiap masukan dan feedback dari pengunjung akan kami terima dengan terbuka dan digunakan untuk perbaikan layanan secara berkelanjutan.</p>
                            </div>
                            <div class="choose-us2__list-text">
                                <h4><i class="fa-solid me-4">2.</i>Responsive & On Time</h4>
                                <p class="ms-5">Kami memahami pentingnya waktu bagi pelanggan. Oleh karena itu, kami berkomitmen untuk merespon setiap permintaan, pertanyaan atau keluhan pelanggan secara cepat dan tepat waktu.</p>
                            </div>
                            <div class="choose-us2__list-text">
                                <h4><i class="fa-solid me-4">3.</i>Profesionalisme dalam Pelayanan</h4>
                                <p class="ms-5">Kami menjunjung tinggi standart profesionalisme dalam setiap interaksi dengan pelanggan. <br> setiap pustakawan dilatih untuk bersikap ramah, menghormati, dan memiliki pengetahuan yang memadai untuk membantu pengunjung dengan solusi yang relevan</p>
                            </div>
                            <div class="choose-us2__list-text">
                                <h4><i class="fa-solid me-4">4.</i>Transparansi dan Kejujuran</h4>
                                <p class="ms-5">Kami berkomitmen untuk bersikap transparan dan jujur dalam setiap transaksi dan berinteraksi dengan pengunjung. <br> Informasi mengenai layanan dan kebijakan akan disampaikan dengan jelas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
