@extends('layouts.template')
@section('title')
Laporan
@endsection

<!-- ini untuk isi home -->
@section('content')
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Laporan</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="2">
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
                        <td>{{$row->id_transaksi}}</td>
                        <td>{{ optional($row->transaksi)->status}}</td>
                        <td>{{ $row->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>