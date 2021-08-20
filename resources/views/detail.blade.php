@extends('base')

@section('moreCss')
@endsection

@section('content')


    <section class="container">


        <div>
            <div style="height: 130px"></div>
            <h4 class="mb-4  fw-bold"><span class="t-primary">Nama Barang</span> (kategori)</h4>
            <hr>

            <div class="row">


                <div class="col-6">
                    <div class="slider-for">
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="gambar-detail" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="gambar-detail" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="gambar-detail" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="gambar-detail" />
                    </div>
                    <div class="slider-nav mt-3">
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="m-2" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="m-2" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="m-2" />
                        <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg"
                            class="m-2" />
                    </div>


                    <p class="mt-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                        has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>

                <div class="col-5">

                    <div class="table-container p-5">

                        <p class="mb-0 fw-bold">Harga</p>
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0 fw-bold t-yellow">Rp. 1.000.000</h4>

                        </div>

                        <form>
                         


                        

                            

                            <div class="qty-input mt-5">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product-qty" min="0" max="10" value="1">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>

                            <div class="mb-5 mt-4">
                                <label for="keteranganTambahan" class="form-label">Keterangan Tambahan</label>
                                <textarea class="form-control" id="keteranganTambahan" rows="3"></textarea>
                            </div>

                    <div class="mb-3"></div>
                    <a type="submit" class="btn bt-primary w-100">Tambah Ke keranjang</a>
                    <a type="submit" class="btn bt-orange  w-100">Beli Sekarang</a>
                    </form>
                </div>
            </div>

    </section>


@endsection

@section('script')

    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
@endsection
