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
                <h5>Data Absensi</h5>
                <a type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Data</a>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                </thead>

                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{date('d F Y', strtotime($d->tanggal))}}</td>
                        <td>
                            <a type="button" class="btn btn-primary btn-sm" id="editData" data-id="{{$d->id}}" data-tanggal="{{$d->tanggal}}">Edit
                            </a>
                            <a type="button" class="btn btn-success btn-sm" id="detailData" data-id="{{$d->id}}">Data Absen
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data absensi</td>
                    </tr>
                @endforelse

            </table>
            <div class="d-flex justify-content-end">
                {{$data->links()}}
            </div>
        </div>

        <!-- Modal Detail-->
        <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbAbsen">
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak ada data</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
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
        $(document).ready(function () {

        })

        $(document).on('click', '#addData, #editData', function () {
            $('#tambahData #id').val($(this).data('id'))
            $('#tambahData #tanggal').val($(this).data('tanggal'))
            $('#tambahData').modal('show')
        })

        function save() {
            saveData('Simpan Absen', 'form');
            return false;
        }

        $(document).on('click', '#detailData', function () {
            var id = $(this).data('id');
            detail(id)
            $('#detail').modal('show');
        })

        function detail(id) {
            $.get('/admin/absensi/' + id, function (data) {
                var tabel = $('#tbAbsen');
                tabel.empty()
                $.each(data, function (key, value) {
                    var nama = value['siswa']['nama'] ?? '';
                    tabel.append('<tr>' +
                        '<td>'+parseInt(key + 1)+'</td>' +
                        '<td>'+value['siswa']['username']+'</td>' +
                        '<td>'+nama+'</td>' +
                        '</tr>')
                })
                console.log(data);
            })
        }

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
