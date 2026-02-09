@extends('layout.headerfooter')
@section('konten')

<main>
     {{-- content1 --}}
     <div class="breadcrumb__area dark-green breadcrumb-space overflow-hidden custom-width position-relative z-1" data-background="assets/imgs/breadcrumb/layanan.png">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">Layanan Koleksi Referensi</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="/">Home</a></span></li>
                                    <li class="active"><span>Layanan Koleksi Referensi</span></li>
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
                    <h2 class="story-details__content-title mb-30 wow fadeInLeft animated" data-wow-delay=".5s">Layanan Koleksi Referensi</h2>
                    <div class="col-xl-12 col-lg-12">
                        <div class="choose-us2__list mt-15 wow fadeInLeft animated" data-wow-delay=".5s">
                            <div class="choose-us2__list-text">
                                <p>Layanan koleksi referensi di Perpustkaan Ibrahimy bertujuan untuk menyediakan sumber informasi yang lengkap termasuk mahasiswa dan seluruh orang yang membutuhkan. Koleksi referensi di Perpustakaan Ibrahimy meliputi Ensiklopedi, kamus, direktori, serta buku pengetahuan lainnya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="choose-us2__list mt-15 wow fadeInLeft animated" data-wow-delay=".5s">
                        <div class="choose-us2__list-text">
                            <h4>Prosedur Akses Koleksi Referensi</h4>
                            <p><i class="fa-solid fa-check"></i> Pemustaka dapat langsung mengunjungi Perpustakaan untuk melihat dan membaca koleksi.</p>
                            <p><i class="fa-solid fa-check"></i> Pemustaka yang membutuhkan bantuan khusus dapat mendatangi staff yang siap membantu melayani selama jam pelayanan.</p>
                            <p><i class="fa-solid fa-check"></i> Untuk akses koleksi digital, pemustaka dapat mengakses melalui portal perpustakaan dengan mengunjungi website <em><a href="https://opac.lib.ibrahimy.ac.id">opac.lib.ibrahimy.ac.id</a></em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
