@extends('admin.base')

@section('title')
    Data Siswa
@endsection

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            swal("Berhasil!", "Berhasil Menambah data!", "success");
        </script>
    @endif

    <section class="m-2">


        <div class="table-container">


            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Data Siswa</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambahdata">Tambah Data</button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>

                    <th>
                        Nama
                    </th>

                    <th>
                        Alamat
                    </th>

                    <th>
                        No Hp
                    </th>

                    <th>
                        tanggal lahir
                    </th>

                    <th>
                        Action
                    </th>

                </thead>

                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Andi
                    </td>
                    <td>
                        Solo
                    </td>
                    <td>
                        012839218213
                    </td>
                    <td>
                        20-08-2020
                    </td>
                    <td>
                        
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail">Detail</button>
                    </td>
                </tr>

            </table>

        </div>




        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Masukan NIS</label>
                                <input type="text" class="form-control" id="nama">
                            </div>

                            <p class="border rounded p-2" style="font-size: .8rem; color:grey">Password default untuk user baru adalah "tkaisyah"</p>
                            <div class="mb-4"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Detail-->
        <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                        <div class="col-8">

                        <p class="mb-0">Absensi</p>
                        <p style="font-size: 1.2rem; font-weight: bold">100%</p>

                        <p class="mb-0 mt-3">Perkembangan Nilai</p>

                        <br>
                        <br>
                        <br>

                        <p class="mb-0 mt-3">Tabel Sholat</p>

                        <table class="table table-striped table-bordered ">
                            <thead>
                                <th>
                                    #
                                </th>
            
                                <th>
                                    Hafalan Surat
                                </th>
            
                                <th>
                                    Sholat
                                </th>
            
                             
            
                            </thead>
            
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Hafalan
                                </td>
                                <td>
                                    Subuh, Ashar
                                </td>
                              
                               
                            </tr>
            
                        </table>

                        </div>
                        <div class="col-4"  style="position: relative">
                            <div class="border rounded p-2 text-center" style="position: relative">
                                <img style="width: 50%; position: relative " class="ms-auto" src="https://asset.kompas.com/crops/wJGxz7MEgsEbAvgCXaazrg0lknU=/0x0:780x390/750x500/data/photo/2012/10/25/0933523780x390.jpg"/>

                                <div class="text-start p-4"> 
                                    <p class="mb-1 mt-3">Nama : Joko</p>
                                    <p class="mb-1 ">Alamat : Solo</p>
                                    <p class="mb-1 ">Tanggal Lahir : 20-08-2020</p>
                                    <p class="mb-1 ">No Hp : 0918203912</p>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>

                </div>
            </div>
        </div>


    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

        })

        function hapus(id, name) {
            swal({
                    title: "Menghapus data?",
                    text: "Apa kamu yakin, ingin menghapus data ?!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Berhasil Menghapus data!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data belum terhapus");
                    }
                });
        }
    </script>

@endsection
