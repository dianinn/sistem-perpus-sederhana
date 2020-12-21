<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h2>Histori Transaksi</h2>
        <table id="histori" class="table table-stripped pb-3" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataHistori as $histori)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $histori->peminjaman->anggota->nama }}</td>
                        <td>{{ $histori->peminjaman->tgl_pinjam }}</td>
                        <td>{{ $histori->pengembalian ? $histori->pengembalian->tgl_kembali : '-' }}</td>
                        <td>{{ $histori->pengembalian ? $histori->pengembalian->status : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>