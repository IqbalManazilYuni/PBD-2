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
                <<tr>
                    <th scope="col">No</th>
                    <th scope="col">No Faktur</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Alamat Pemesan</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Status</th>
            </tr>
            </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($postdata as $post)
                    <tr>
                        <th scope="col">{{ $no++ }}</th>
                        <td scope="col">{{ $post->NoFaktur }}</td>
                        <td scope="col">{{ $post->namabarang }}</td>
                        <td scope="col">{{ $post->namapemesan }}</td>
                        <td scope="col">{{ $post->namapegawai }}</td>
                        <td scope="col">{{ $post->alamat }}</td>
                        <td scope="col">{{ $post->jumlahbarang }}</td>
                        <td scope="col">{{ $post->status }}</td>
                    </tr>
                @endforeach
        </table>
    </div>

</body>

</html>
