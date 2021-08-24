@extends('guru.base')
@section('title')
    Dashboard
@endsection
@section('content')

    <section class="m-2">
        <div class="table-container">

            <div class="row">
                <div class="col-6">
                    <div class="item-box">
                        <div class="d-flex justify-content-between">
                            <h5>Profile</h5>
                            <a class="btn btn-primary btn-sm" id="editData">Edit</a>
                        </div>
                        <form id="form">
                            @csrf
                            <input id="id" name="id" value="{{$data->id}}" hidden>
                            <div class="mb-3">
                                <label for="dNamaProduk" class="form-label">Nama</label>
                                <input type="text" class="form-control" readonly id="nama" name="nama" value="{{$data->nama}}">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Hp</label>
                                <input type="text" class="form-control" readonly id="no_hp" name="no_hp" value="{{$data->no_hp}}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" readonly id="tanggal_lahir" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" readonly id="alamat" name="alamat">{{$data->alamat}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">NIP</label>
                                <input type="text" class="form-control" readonly id="username" name="username" value="{{$data->username}}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" readonly id="password" name="password" value="*****">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" readonly id="password_confirmation" name="password_confirmation" value="*****">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-box">
                        <h5>Image</h5>
                        <form id="formImg" enctype="multipart/form-data" onsubmit="return saveImg()">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <img id="img" src="{{$data->image}}"
                                     class="rounded-circle" style="height: 300px; width: 300px"/>
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control" name="image" id="image" required accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>


@endsection

@section('script')
<script>
    $(document).on('click', '#editData', function () {
        var tipe = $(this).html();
        $('#form input').removeAttr('readonly');
        $('#form textarea').removeAttr('readonly');
        if (tipe === 'Save') {
            saveDataObject('Update profile', $('#form').serialize(), '/guru/profile')
            return false;

        } else {
            $(this).html('Save')
        }

    })

    function saveImg() {
        saveData('Update Image', 'formImg', '/guru/profile/update-image')
        return false;
    }
</script>

@endsection
