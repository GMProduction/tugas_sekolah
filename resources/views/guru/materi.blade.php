@extends('guru.base')

@section('title')
    Data Materi
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
                <h5>Data Materi</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambahdata">Tambah Materi</button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>

                    <th>
                        Nama Materi
                    </th>

                    <th>
                        Tanggal
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
                        Matematika Dasar
                    </td>
                    <td>
                        20-08-2020
                    </td>
                  
                    <td>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahdata">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('id', 'nama') ">hapus</button>
                    </td>
                </tr>

            </table>

        </div>




        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Materi</label>
                                <input type="text" class="form-control" id="nama">
                            </div>

                            <div class="mb-3">
                                    <label for="materi" class="form-label">Materi</label>
                                    <input type="file" class="form-control" id="materi" name="materi" required>
                                    
                                </div>

                            <div class="mb-3">
                                    <label for="deskripsiEvent" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>

                       
                            <div class="mb-4"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
