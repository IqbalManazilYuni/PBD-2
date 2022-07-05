<!DOCTYPE html>
<html>
<title>List Data Pegawai</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h1>Laporan Data Pegawai</h1>

  <table class="w3-table w3-striped">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Id Pegawai</th>
        <th scope="col">Nama Pegawai</th>
        <th scope="col">Pendidikan Pegawai</th>
        <th scope="col">Posisi</th>
        <th scope="col">Keahlian</th>
      </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data as $post)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $post->id}}</td>
            <td>{{ $post->namapegawai}}</td>
            <td>{{ $post->pendidikan}}</td>
            <td>{{ $post->posisi}}</td>
            <td>{{ $post->keahlian}}</td>
        </tr>
        @endforeach
  </table>
</div>

</body>
</html>
