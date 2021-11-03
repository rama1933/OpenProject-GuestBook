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

                {{--  <button class="btn btn-primary my-3" data-toggle="modal" data-target="#modal-create">Tambah</button>  --}}
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-sm-3 mb-3 ml-2">
                            <label for="">Filter Kecamatan</label>
                            <select name="filter_kecamatan" id="filter_kecamatan" class="form-control select2bs4 filter">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan3 as $kecamatan3)
                                <option value="{{ $kecamatan3->id }}">{{ $kecamatan3->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        {{--  <div class="col-sm-3 mb-3 ml-2">
                            <label for="">Filter Tahapan Inovasi</label>
                            <select name="filter_tahapan" id="filter_tahapan" class="form-control select2bs4 filter">
                                <option value="">Pilih Tahapan</option>
                                <option value="Uji coba">Uji coba</option>
                                <option value="Inisiatif">Inisiatif</option>
                                <option value="Penerapan">Penerapan</option>
                            </select>
                        </div>

                        <div class="col-sm-3 mb-3 ml-2">
                            <label for="">Filter Covid</label>
                            <select name="filter_covid" id="filter_covid" class="form-control select2bs4 filter">
                                <option value="">Pilih</option>
                                <option value="Non Covid-19">Non Covid-19</option>
                                <option value="Covid-19">Covid-19</option>
                            </select>
                        </div>  --}}

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        {{-- @if (auth()->user()->role=='admin')
                                        <a href="{{ route('user_tambah') }}" class="btn btn-primary float-right" > <i class="fa fa-plus">  Tambah Data</i></a>
                                        @endif --}}
                                      <h3 class="card-title">Data User</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @if (session('message'))
                                        <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        {{ session('message') }}
                                        </div>
                                        </div>
                                      @endif
                                      <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th style="text-align: center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $user)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $user->username }}</td>
                                            <td style="text-align: center"> <a href="{{ route('user_edit',$user->id) }}" class="btn btn-sm btn-success edit"> <i class="fa fa-pen"> Ubah Password</i></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                            </div>
                        </div>
                    </div>
                    </div><!-- /.card-body -->




</section>



@endsection
@section('js')


<script>
    const table = $("#table").DataTable({
            "language": {
        "sProcessing":    "Sedang Diproses",
        "sLengthMenu":    "Tampilkan _MENU_ Data",
        "sZeroRecords":   "Data Kosong",
        "sEmptyTable":    "Data Kosong",
        "sInfo":          "Menampilkan dari _START_ sampai _END_ data dari total _TOTAL_ data",
        "sInfoEmpty":     "Menampilkan data dari 0 hingga 0 dari total 0 data",
        "sInfoFiltered":  "(di filter dari _MAX_ data)",
        "sInfoPostFix":   "",
        "sSearch":        "Cari:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Sedang Diproses...",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sLast":    "Terakhir",
            "sNext":    "Lanjut",
            "sPrevious": "Kembali"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
          "responsive": true,
          "autoWidth": false,
          "pageLength":10,
          "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,'semua']],
          "bLengthChange":true,
          "bFilter":true,
          "bInfo":true,
          "processing":true,
            });

            table.on('click','.edit',function (e) {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');

                }

                var data = table.row($tr).data();

                var link = e.relatedTarget(),
                modal    = $(this),
                id = link.data("id");
                console.log(id)


                $('#nik').val(data[2]);
                $('#nama').val(data[3]);
                $('#alamat').val(data[4]);
                $('#keperluan').val(data[5]);
                $('#no_hp').val(data[6]);
                $('input[name=tanggal]').val(data[7]);
                // $('#tanggal').val(data[7]);

             })

    </script>
@endsection


