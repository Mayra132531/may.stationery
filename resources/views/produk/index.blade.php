@extends('layouts.template')
@section('title')
Produk
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="main-content">
<div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Produk</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                           
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div>
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('produk.create')}}" role="button"> Create (+)</a>
                        </p>
                        </div>

                        <!-- fungsi cart -->
                        <form method="get" action="{{route('produk.index')}}">
                            <div class="form-group">
                        <table>
                         <td>
                            <div class="col-sm-16">
                                <input type="text" class="form-control" id="keyword" placeholder="cari nama" name="keyword" value="{{Request::get ('keyword')}}">
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-info"><span class="fa fa-search"></span></button>
                            </div>
                        </td>
                        </table>
                        </form>
                        <div class="row"> 
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Tabel</h4>
        
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr style="cursor: pointer;">
                                                        <th>Id</th>
                                                        <th>Nama Produk</th>
                                                        <th>Stok</th>
                                                        <th>Harga</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($produk as $row)
                    <tr>
                        <td>{{ $loop->iteration + ($produk->perpage() *  ($produk->currentPage() -1)) }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->stok }}</td>
                        <td>{{ $row->harga }}</td>
                        
                        <td>
                        <form method="post" action="{{ route('produk.destroy',[$row->id]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->nama}}?')">
                                @csrf
                            {{ method_field('DELETE') }}
                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('produk.edit',[$row->id]) }}" title="Edit">
                             <i class="fas fa-pencil-alt"></i>
                             </a>

                             <button type="submit" href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm edit">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('produk.show',[$row->id]) }}" title="Lihat">
                            <i class="fas fa-eye"></i>
                             </a>
                        </td>
                    </tr>
                </form>

                  @endforeach
                                                </tbody>
                                            </table>
                                            {{ $produk->appends(Request::all())->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
</div>
@endsection