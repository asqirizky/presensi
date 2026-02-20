<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_detail_unit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <div class="">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{ $aset->nama }}</h1>
                        <div class="text-muted fw-semibold fs-4 mb-4">No.INV : {{ $aset->kategori->kode.'/'. Carbon\Carbon::parse($item->tanggal)->isoFormat('DD.MM.YY').'/'.$item->sumber->kode.'/'.str_pad($aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$item->kode_unit }}</div>
                        <!--end::Title-->
                        <a href="{{ asset('/storage/fotobarang/' . $item->foto) }}" target="_blank" class="symbol symbol-150px">
                            @if($item->foto == null)
                            <img alt="Pic" src="{{ asset('admin/assets/media/svg/files/blank-image.svg') }}" />
                            @else
                            <img alt="Pic" src="{{ asset('/storage/fotobarang/' . $item->foto) }}" />
                            @endif
                        </a>
                    </div>
                    <!--end::Heading-->
                    <div class="pb-5 fs-4 text-start">
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Tanggal Pengadaaan</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: {{ Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Sumber Dana</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: {{ $item->sumber->sumberdana }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Harga</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Lokasi</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: {{ $item->lokasi->lokasi }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Kondisi</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: {{ $item->kondisi }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Nomor Bukti</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <span class="fw-bold fs-4 text-gray-800">: {{ $item->nb }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7 mt-7">
                            <!--begin::Label-->
                            <label class="col-lg-5 fw-semibold text-muted">Kwitansi</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-7">
                                <a href="{{ asset('/storage/kwitansi/' . $item->kwitansi) }}" target="_blank" class="symbol symbol-100px">
                                    @if($item->kwitansi == null)
                                    <img alt="Pic" src="{{ asset('admin/assets/media/svg/files/blank-image.svg') }}"/>
                                    @else
                                    <img alt="Pic" src="{{ asset('/storage/kwitansi/' . $item->kwitansi) }}" />
                                    @endif
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="text-center mt-20">
                            <button type="reset" class="btn btn-light-warning me-3" data-bs-dismiss="modal">Tutup</button>
                            {{--  <button class="btn btn-primary" >  --}}
                        </div>
                    </div>


                </div>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->

            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Update user details-->
