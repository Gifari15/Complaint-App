<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		.max_coloumn{
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
	</style>
	<center>
		<h3 style="margin-top:20px; margin-bottom:20px;">LAPORAN TANGGAPAN</h3>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<!-- <th>ID Petugas</th> -->
				<th>ID Pengaduan</th>
				<th>Tanggal Tanggapan</th>
				<th width="200px">Laporan</th>
				<th>Tanggapan</th>
			</tr>
		</thead>
		<tbody>
        @foreach($tanggapann as $t)
            <tr>
                <!-- <td>{{ $t->id_petugas }}</td> -->
                <td>{{ $t->id_pengaduan }}</td>
                <td>{{ $t->tgl_tanggapan }}</td>
				<td>{{ $t->isi_laporan }}</td>
                <td>{{ $t->tanggapan }}</td>
            </tr>
            <!-- Akhir Modal Edit -->
        @endforeach
		</tbody>
	</table>
 
</body>
</html>