@extends('layouts.template')
@section('title')
Admin
@endsection

<!-- ini untuk isi home -->
@section('content')
</body>
    <div class="card mb-4">
                        
                            <div class="card-body">
                            <div>
            <a class="btn btn-primary waves-effect waves-light" href="{{ route('user.create')}}" role="button"> Create (+)</a>
            <div class="row">
            <div class="col-12">
                 <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Admin dan Pelanggan</h4>
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr style="cursor: pointer;">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $row)
                                    <tr>

                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->level }}</td>
                                        <td>
                                        <form method="post" action="{{ route('user.destroy',[$row->id]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus, {{$row->name}}?')">
                                            @csrf
                                        {{ method_field('DELETE') }}
                                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('user.edit',[$row->id]) }}" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button type="submit" class="btn btn-outline-secondary btn-sm edit">
                                            <i class="fas fa-trash-alt"></i></button>
                                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('user.show',[$row->id]) }}" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                            {{-- {{ $user->appends(Request::all())->links() }} --}}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
                            </div>
                        </div>

@endsection