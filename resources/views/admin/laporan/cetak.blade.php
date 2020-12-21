<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <table class="table table-bordered">
            <tr>
                <th colspan="3" class="text-center">Data Peminjam</th>
            </tr>
            <tr>
                <th>Nama Peminjam</th>
                <th>:</th>
                <td>{{ $dataPeminjam->anggota->nama }}</td>
            </tr>
            <tr>
                <th>Tanggal Peminjaman</th>
                <th>:</th>
                <td>{{ $dataPeminjam->tgl_pinjam }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengembalian</th>
                <th>:</th>
                <td>{{ $dataPengembalian ? $dataPengembalian->tgl_kembali : '-' }}</td>
            </tr>
            <tr>
                <th>Status Pengembalian</th>
                <th>:</th>
                <td>{{ $dataPengembalian ? $dataPengembalian->status : '-' }}</td>
            </tr>
            <tr>
                <th colspan="3" class="text-center">Data Buku</th>
            </tr>
            <tr>
                <th>ISBN</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->isbn }}</td>
            </tr>
            <tr>
                <th>Judul</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->judul }}</td>
            </tr>
            <tr>
                <th>Pengarang</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->pengarang }}</td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->penerbit }}</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <th>:</th>
                <td>{{ $peminjaman->buku->tahun }}</td>
            </tr>
        </table>
    </body>
</html>