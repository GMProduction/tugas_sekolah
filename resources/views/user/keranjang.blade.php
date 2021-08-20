@extends('user.dashboard')

@section('contentUser')



    <section class="container">

        <div class="row">
            <div class="col-8">
                <div class="item-box">
                    <div class="d-flex">
                        <img
                            src="https://fastwork.id/blog/wp-content/uploads/2018/09/desain-undangan-pernikahan-736x540.jpg" />
                        <div class="ms-4 flex-fill">
                            <div class="d-flex justify-content-between">
                                <p class="title">Nama Produk</p>
                                <a class="d-block" style="cursor: pointer">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </div>
                            <p class="qty mb-3">Qty</p>
                            <p class="keterangan mb-0">Keterangan</p>
                        </div>

                    </div>

                </div>

                <div class="item-box">
                    <div class="d-flex">
                        <img
                            src="https://fastwork.id/blog/wp-content/uploads/2018/09/desain-undangan-pernikahan-736x540.jpg" />
                        <div class="ms-4 flex-fill">
                            <div class="d-flex justify-content-between">
                                <p class="title">Nama Produk</p>
                                <a class="d-block" style="cursor: pointer">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </div>
                            <p class="qty mb-3">Qty</p>
                            <p class="keterangan mb-0">Keterangan</p>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-4">
                <div class="item-box">

                    <div class="mb-3">
                        <label for="qty" class="form-label">Kota Pengiriman</label>
                        <select class="form-select me-2" aria-label="Default select example" name="jenisKertas">
                            <option selected>Pilih Kota</option>
                            <option value="1">Solo</option>
                            <option value="2">Sukoharjo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keteranganTambahan" class="form-label">Alamat Detail Pengiriman</label>
                        <textarea class="form-control" id="keteranganTambahan" rows="3"></textarea>
                    </div>

                    <p class="mb-0 mt-5 fw-bold">Biaya</p>
                    <div class="d-flex justify-content-between">
                        <p>Pesanan</p>
                        <h5 class="mb-0">Rp. 1.000.000</h5>

                    </div>

                    <div class="d-flex justify-content-between">
                        <p>Ongkir</p>
                        <h5 class="mb-0">Rp. 12.000</h5>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <p>Total</p>
                        <h4 class="mb-5 fw-bold">Rp. 1.012.000</h4>

                    </div>

                    <div class="ms-auto">
                        <a class="btn bt-primary ms-auto " data-bs-toggle="modal" data-bs-target="#submitpesanan">Submit
                            Pesanan</a>
                    </div>
                </div>

            </div>
        </div>



      
    </section>


@endsection

@section('scriptUser')

    <script>
        $(document).ready(function() {

            $("#keranjang").addClass("active");
        });
    </script>

@endsection
