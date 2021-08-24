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
                <a class="btn btn-primary btn-sm" id="addData">Tambah Materi</a>
            </div>

            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Materi</th>
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
                            <a class="btn btn-warning btn-sm" id="editData" data-deskripsi="{{$d->deskripsi}}" data-video="{{$d->url_video}}" data-id="{{$d->id}}" data-nama="{{$d->nama}}">Ubah
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('{{$d->id}}', '{{$d->nama}}') ">hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse

            </table>

        </div>




        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return saveMateri()" id="formTugas" enctype="multipart/form-data">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama materi</label>
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


    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

        })

        $(document).on('click','#addData, #editData', function () {
            $('#tambahData #id').val($(this).data('id'));
            $('#tambahData #nama').val($(this).data('nama'));
            $('#tambahData #deskripsi').val($(this).data('deskripsi'));
            $('#tambahData #url_video').val('').attr('required','');

            if($(this).data('id')){
                $('#tambahData #url_video').removeAttr('required');
                $('#tambahData #showVideo').html('<video height="200px" controls autoplay><source id="gambar" src="http://localhost:8002'+$(this).data('video')+'"></video>')
            }
            $('#tambahData').modal('show');
        });

        function aftersave() {

        }
        $('#tambahData').on('hidden.bs.modal', function () {
            $('#tambahData #showVideo video').remove()
        });
        function saveMateri() {
            saveData('Simpan Tugas','formTugas');
            return false;
        }
        function hapus(id, name) {
            deleteData(name,'/guru/materi/'+id+'/delete');
           return false;
        }
    </script>

@endsection
