@extends('layout.headerfooter')
@section('konten')

{{-- content1 --}}
<div class="breadcrumb__area dark-green breadcrumb-space overflow-hidden custom-width position-relative z-1" data-background="assets/imgs/breadcrumb/layanan.png">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12">
                <div class="breadcrumb__content">
                    <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                        <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">Layanan Sirkulasi</h1>
                    </div>
                    <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                        <nav>
                            <ul>
                                <li><span><a href="/">Home</a></span></li>
                                <li class="active"><span>Layanan Sirkulasi</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- content2 --}}
<section class="error pt-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error__content">
                    <div class="section__title-wrapper text-center">
                        <h3 class="section__title mb-30 mb-xs-10 wow fadeInLeft animated" data-wow-delay=".2s">Astaga!Error 404 <br> Try Again</h3>
                        <p>Belum ada konten</p>
                        <div class="footer-form mb-60 wow fadeInLeft animated" data-wow-delay=".6s">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
