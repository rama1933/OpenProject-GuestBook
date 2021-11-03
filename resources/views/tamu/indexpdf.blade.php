<!DOCTYPE html>
<html>
<head>
	<title>Laporan Inovasi Daerah</title>
</head>
<style>


    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
    }
    .left {
  width: 10%;
}

.right {
  width: 90%;
}

    /* Clear floats after the columns */
    .row:after {
      content: "";
      clear: both;
    }
    table, th, td {
  border: 1px solid;
  border-collapse: collapse;
}

header { position: fixed; top: -30px; left: 0px; right: 0px;}
    footer { position: fixed; bottom: -10px; left: 0px; right: 0px;}
    </style>
<body>
    <header><hr></header>
    <footer><hr></footer>
        <h3 style="text-align: center;">DATA BUKU TAMU KEJAKSAAN NEGRI HSS</h3>
        <table style="width: 100%">
            <thead>
                <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keperluan</th>
                <th>Nomor Hp</th>
                <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->keperluan }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ date('d-m-Y',strtotime($data->tanggal)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </body>
            </html>
