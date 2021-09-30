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
                <h5>Master Kelas</h5>
                <a type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Data</a>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Action</th>
                </tr>
                </thead>

                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$d->nama}}</td>
                        <td>
                            <a type="button" class="btn btn-primary btn-sm" id="editData" data-id="{{$d->id}}" data-nama="{{$d->nama}}">Edit
                            </a>
                            <a type="button" class="btn btn-danger btn-sm" id="deleteData" data-id="{{$d->id}}">Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data absensi</td>
                    </tr>
                @endforelse

            </table>
        </div>

        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
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
            $('#tambahData #nama').val($(this).data('nama'))
            $('#tambahData').modal('show')
        })

        function save() {
            saveData('Simpan Kelas', 'form');
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
