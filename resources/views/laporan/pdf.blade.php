
                <table border="2">
                    <thead>
                        <tr>
                            <th>Id Laporan</th>
                            <th>Nama User</th>
                            <th>Id Transaksi</th>
                            <th>Status</th>
                            <th>Tanggal Laporan</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @php $i=1 @endphp
                        @foreach($laporan as $row)
                        <td>{{$row->id_lap}}</td>
                        <td>{{ $row->user->name}}</td>
                        <td>{{ $row->id_transaksi}}</td>
                        <td>{{ $row->transaksi->status}}</td>
                        <td>{{ $row->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
         