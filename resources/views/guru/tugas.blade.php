@extends('guru.base')

@section('title')
    Data Tugas
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
                <h5>Data Tugas</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Tugas</button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Tugas</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                </thead>
                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{date('d F Y', strtotime($d->created_at))}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" id="detailData" data-id="{{$d->id}}">Detail</a>
                            <a class="btn btn-warning btn-sm" id="editData" data-deskripsi="{{$d->deskripsi}}" data-video="{{$d->url_video}}" data-id="{{$d->id}}" data-nama="{{$d->nama}}">Ubah
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('id', 'nama') ">hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse

            </table>
            <div class="d-flex justify-content-end">
                {{$data->links()}}
            </div>
        </div>

        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Joko</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return saveTugas()" id="formTugas" enctype="multipart/form-data">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Tugas</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="url_video" class="form-label">Video</label>
                                <input type="file" class="form-control" id="url_video" name="url_video" accept="video/*">
                                <div id="showVideo" class="mt-2"></div>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                            </div>
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
                            <div class="col-12">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbDetail"></tbody>

                                </table>
                            </div>
                        </div>

                        <!-- Modal berinilai-->
                        <div class="modal fade" id="berinilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="nama"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formNilai" onsubmit="return saveNilai()">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nilai" class="form-label">Nilai</label>
                                                <input type="number" class="form-control" id="nilai" name="nilai" required>
                                            </div>

                                            <div class="mb-4"></div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
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
        var idNilai, idTugas;
        $(document).ready(function () {

        })

        $(document).on('click', '#addData, #editData', function () {
            $('#tambahData #id').val($(this).data('id'));
            $('#tambahData #nama').val($(this).data('nama'));
            $('#tambahData #deskripsi').val($(this).data('deskripsi'));
            $('#tambahData #url_video').val('').attr('required', '');

            if ($(this).data('id')) {
                $('#tambahData #url_video').removeAttr('required');
                $('#tambahData #showVideo').html('<video height="200px" controls autoplay><source id="gambar" src="http://localhost:8002' + $(this).data('video') + '"></video>')
            }
            $('#tambahData').modal('show');
        });

        $('#tambahData').on('hidden.bs.modal', function () {
            $('#tambahData #showVideo video').remove()
        });

        $(document).on('click', '#detailData', function () {
            idTugas = $(this).data('id');
            detail()
            $('#detail').modal('show');
        })

        function detail() {
            $.get('/guru/tugas/' + idTugas, function (data) {
                var tabel = $('#tbDetail');
                tabel.empty();
                $.each(data, function (key, value) {
                    var nilai = value['nilai'] ?? '';
                    var nama = value['siswa']['nama'] ?? '';
                    tabel.append('<tr>\n' +
                        '        <td>' + parseInt(key + 1) + '</td>\n' +
                        '        <td>' + value['siswa']['username'] + '</td>\n' +
                        '        <td>' + nama + '</td>\n' +
                        '        <td>' + nilai + '</td>\n' +
                        '        <td>\n' +
                        '          <a class="btn btn-success btn-sm" id="showFile" target="_blank" data-url="' + value['url'] + '">Lihat Hasil Tugas</a>\n' +
                        '          <a type="button" class="btn btn-warning btn-sm" id="showNilai" data-nilai="' + nilai + '" data-nama="' + nama + '" data-id="' + value['id'] + '">Beri Nilai</a>\n' +
                        '         </td>\n' +
                        '         </tr>')
                })
            })
        }

        $(document).on('click','#showFile', function () {
            $(this).attr('href', $(this).data('url'))
        })

        $(document).on('click', '#showNilai', function () {

            idNilai = $(this).data('id');
            $('#berinilai #nama').html($(this).data('nama'));
            $('#berinilai #nilai').val($(this).data('nilai'));
            $('#berinilai').modal('show')
        })

        function saveTugas() {
            saveData('Simpan Tugas', 'formTugas');
            return false;
        }

        function aftersaveNilai() {
            $('#berinilai').modal('hide')
            detail()
        }

        function saveNilai() {
            saveData('Update Nilai', 'formNilai', '/guru/tugas/nilai/' + idNilai, aftersaveNilai);
            return false;
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
