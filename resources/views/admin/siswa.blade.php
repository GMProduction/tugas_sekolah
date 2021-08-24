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
                        data-bs-target="#tambahdata">Tambah Data
                </button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
                </thead>

                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$d->username}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->no_hp}}
                        <td>{{$d->tanggal_lahir}}
                        <td>
                            <a class="btn btn-success btn-sm" id="detailData" data-id="{{$d->id}}">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data siswa</td>
                    </tr>
                @endforelse
            </table>
            <div class="d-flex justify-content-end">
                {{$data->links()}}
            </div>

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
                        <form id="form" onsubmit="return save()">
                            @csrf
                            <div class="mb-3">
                                <label for="nis" class="form-label">Masukan NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis">
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
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Hafalan Surat</th>
                                        <th>Sholat</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbAktivitas">
                                    <tr>
                                        <td class="text-center" colspan="4">Tidak ada data</td>
                                    </tr>
                                    </tbody>

                                </table>

                            </div>
                            <div class="col-4" style="position: relative">
                                <div class="border rounded p-2 text-center" style="position: relative">
                                    <img id="imgProfile" style="width: 50%; position: relative " class="ms-auto"/>

                                    <div class="text-start p-4">
                                        <p class="mb-1 mt-3">Nama : <span id="nama"></span></p>
                                        <p class="mb-1 ">Alamat : <span id="alamat"></span></p>
                                        <p class="mb-1 ">Tanggal Lahir : <span id="tanggal"></span></p>
                                        <p class="mb-1 " >No Hp : <span id="no_hp"></span></p>
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
        $(document).ready(function () {

        })

        function save() {
            saveData('Tambah Data Siswa', 'form')
            return false;
        }

        $(document).on('click', '#detailData', function () {
            var id = $(this).data('id');
            detailSiswa(id);
            $('#detail').modal('show');
        })

        function detailSiswa(id) {
            $.get('/admin/siswa/'+id, function (data) {
                $('#imgProfile').attr('src', data['image'] ?? '{{asset('static-image/noimage.jpg')}}')
                $('#nama').html(data['nama'] ?? '')
                $('#no_hp').html(data['no_hp'] ?? '')
                $('#alamat').html(data['alamat'] ?? '')
                $('#tanggal').html(data['tanggal_lahir'] ? moment(data['tanggal_lahir']).format('DD MMMM YYYY') : '')
                var tabel = $('#tbAktivitas');

                var aktivitas = data['aktivitas'];
                if (aktivitas){
                    tabel.empty();

                    $.each(aktivitas, function (key, value) {
                        var sholat = [];
                        $.each(value['sholat'], function (key, value) {
                            sholat.push(value['nama'])
                            console.log(value);
                        })
                        tabel.append('<tr>' +
                            '<td>'+parseInt(key+1)+'</td>' +
                            '<td>'+moment(value['tanggal']).format('DD MMMM YYYY')+'</td>' +
                            '<td>'+value['surat']+'</td>' +
                            '<td>'+sholat+'</td>' +
                            '</tr>')
                    })
                }

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
