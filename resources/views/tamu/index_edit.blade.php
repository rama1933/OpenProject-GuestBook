@extends('layout.master')
@section('css')
<style>
.zoom:hover {
    transform: scale(3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="row">

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Edit Data Buku Tamu</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @foreach ($tamu as $tamu)
                                        <form method="post" id="form-edit" action="{{ url('/tamu_update') }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $tamu->id }}">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="nik">NIK<small class="text-danger">*</small></label>
                                                        <input type="text" name="nik" class="form-control" maxlength="16" onkeypress="return hanyaAngka(event)" value="{{ $tamu->nik }}" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="nama">Nama <small class="text-danger">*</small></label>
                                                        <input type="text" name="nama" class="form-control" value="{{ $tamu->nama }}" required>
                                                    </div>

                                                        <div class="col-md-12">
                                                            <label for="alamat">Alamat<small class="text-danger">*</small></label>
                                                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required>{{ $tamu->alamat }}</textarea>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <label for="keperluan">Keperluan <small class="text-danger">*</small></label>
                                                            <input type="text" name="keperluan" class="form-control" value="{{ $tamu->keperluan }}" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="no_hp">Nomor Hp<small class="text-danger">*</small></label>
                                                            <input type="text" name="no_hp" class="form-control" value="{{ $tamu->no_hp }}" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="tanggal">Tanggal<small class="text-danger">*</small></label>
                                                            <input type="date" name="tanggal" class="form-control" value="{{ $tamu->tanggal }}" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                                        </div>

                                                    <div class="col-md-6">
                                                            <label for="foto_atlet">Foto (Kosongkan Jika Tidak Ingin Merubah Foto)</label>
                                                            <input type="file" class="form-control" name="foto" id="imgInp2" value="{{ $tamu->foto }}">
                                                                <div class="card mt-2" style="width: 200px;height:200px;">
                                                                    <img src="#" style="height:200px;" id="blah2" alt="">
                                                                  </div>
                                                    </div>

                                            </div>
                                              <br>
                                              <button type="submit" class="btn btn-primary">Simpan</button>

                                        </form>
                                        @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                            </div>
                        </div>
                    </div>
                    </div><!-- /.card-body -->
            </div>
        </div>
    </div>


</section>



@endsection
@section('js')


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp2").change(function(){
        readURL2(this);
    });


function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
    </script>
@endsection


