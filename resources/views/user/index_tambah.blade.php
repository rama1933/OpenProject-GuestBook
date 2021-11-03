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
          {{-- <h1 class="m-0 text-dark">Karyawan {{ $jenis }}</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Data Buku Tamu</a></li> --}}
            {{-- <li class="breadcrumb-item active">Data Buku Tamu</li> --}}
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
                                      <h3 class="card-title">Tambah Data Buku Tamu</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form method="post" id="form-create" action="{{ url('/tamu_store') }}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="nik">NIK<small class="text-danger">*</small></label>
                                                        <input type="text" name="nik" class="form-control" maxlength="16" onkeypress="return hanyaAngka(event)" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="nama">Nama <small class="text-danger">*</small></label>
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div>

                                                        <div class="col-md-12">
                                                            <label for="alamat">Alamat<small class="text-danger">*</small></label>
                                                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required></textarea>
                                                            {{--  <input type="text" name="alamat" class="form-control" required>  --}}
                                                        </div>


                                                        <div class="col-md-12">
                                                            <label for="keperluan">Keperluan <small class="text-danger">*</small></label>
                                                            <input type="text" name="keperluan" class="form-control" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="no_hp">Nomor Hp<small class="text-danger">*</small></label>
                                                            <input type="text" name="no_hp" class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="tanggal">Tanggal<small class="text-danger">*</small></label>
                                                            <input type="date" name="tanggal" class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                                        </div>

                                                    <div class="col-md-6">
                                                            <label for="foto_atlet">Foto</label>
                                                            <input type="file" class="form-control" name="foto" id="imgInp2" required>

                                                                <div class="card mt-2" style="width: 200px;height:200px;">
                                                                    <img src="#" style="height:200px;" id="blah2" alt="">
                                                                  </div>
                                                    </div>

                                            </div>
                                              <br>
                                              <button type="submit" class="btn btn-primary">Simpan</button>

                                        </form>

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


