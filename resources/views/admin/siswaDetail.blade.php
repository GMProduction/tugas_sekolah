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
                <h5>Data Nilai Siswa {{$nama}}</h5>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Tugas</th>
                    <th>Guru</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
                </thead>

                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{date('d F Y', strtotime($d->tugas->created_at))}}</td>
                        <td>{{$d->tugas->nama}}</td>
                        <td>{{$d->tugas->guru->nama}}</td>
                        <td>{{$d->nilai}}
                        <td>{{$d->keterangan}}
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



    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function () {

        })

    </script>

@endsection
