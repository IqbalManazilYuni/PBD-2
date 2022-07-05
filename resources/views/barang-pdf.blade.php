<!DOCTYPE html>
<html>
<title>List Data Barang</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h1>Laporan Data Barang</h1>

  <table class="w3-table w3-striped">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Id barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Barang</th>
        <th scope="col">Jumlah Barang</th>
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
            <td>{{ $post->namabarang}}</td>
            <td>{{ $post->hargabarang}}</td>
            <td>{{ $post->jumlahbarang}}</td>
        </tr>
        @endforeach
  </table>
</div>

</body>
</html>
