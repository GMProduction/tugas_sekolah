@extends('base')

@section('moreCss')
@endsection

@section('content')

    <section>
        <div style="height: 57px"></div>

        <div class="slider">
            <img src="https://ngalam.co/wp-content/uploads/2017/05/IMG_20170524_111824-681x511.jpg" />
            <img src="https://i.ytimg.com/vi/irNL9frXvqE/maxresdefault.jpg" />
        </div>

        <div style="height: 50px"></div>
    </section>
    <section class="container">
        <h4 class="text-center fw-bold">Kategori Pilihan</h4>

        <div class="slider-kategori">
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://dynamic.zacdn.com/wg4qiGb0sFVvz_8zkSpPREj-5fE=/fit-in/346x500/filters:quality(90):fill(ffffff)/http://static.id.zalora.net/p/ocean-toy-0853-7195672-1.jpg">
                    <p class="title">Mainan Anak</p>

                </a>
            </div>
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://dynamic.zacdn.com/wg4qiGb0sFVvz_8zkSpPREj-5fE=/fit-in/346x500/filters:quality(90):fill(ffffff)/http://static.id.zalora.net/p/ocean-toy-0853-7195672-1.jpg">
                    <p class="title">Mainan Anak</p>

                </a>
            </div>
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://dynamic.zacdn.com/wg4qiGb0sFVvz_8zkSpPREj-5fE=/fit-in/346x500/filters:quality(90):fill(ffffff)/http://static.id.zalora.net/p/ocean-toy-0853-7195672-1.jpg">
                    <p class="title">Mainan Anak</p>

                </a>
            </div>
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://dynamic.zacdn.com/wg4qiGb0sFVvz_8zkSpPREj-5fE=/fit-in/346x500/filters:quality(90):fill(ffffff)/http://static.id.zalora.net/p/ocean-toy-0853-7195672-1.jpg">
                    <p class="title">Mainan Anak</p>

                </a>
            </div>
        </div>


        <div style="height: 50px"></div>
        <div>
            <h4 class="mb-5 text-center fw-bold">Rekomendasi Untukmu</h4>

            <div class="row">


                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg" />
                        <div class="content">
                            <p class="title mb-0">Mainan Lego</p>
                            <p class="description mb-0">Mainan lego untuk anak2</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg" />
                        <div class="content">
                            <p class="title mb-0">Mainan Lego</p>
                            <p class="description mb-0">Mainan lego untuk anak2</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg" />
                        <div class="content">
                            <p class="title mb-0">Mainan Lego</p>
                            <p class="description mb-0">Mainan lego untuk anak2</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://images.tokopedia.net/img/cache/900/product-1/2020/3/23/97199234/97199234_8a94e9d7-d20a-418c-a869-6744090c5407_684_684.jpg" />
                        <div class="content">
                            <p class="title mb-0">Mainan Lego</p>
                            <p class="description mb-0">Mainan lego untuk anak2</p>

                        </div>
                    </a>
                </div>
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Register</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Payment Slip</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>


                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </section>


@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.slider-kategori').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });
    </script>

@endsection
