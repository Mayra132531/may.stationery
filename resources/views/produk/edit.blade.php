@extends('layouts.template')
@section('title')
Produk
@endsection

<!-- ini untuk isi home -->
@section('content')
<div  id="layoutSidenav_content">
    <main>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        <div class="col-xl-8">
                <div class="card">
                <div class="card-body">
                <h4 class="card-title">Edit Produk</h4>

                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                     </ul>
                                                </div>
                                                @endif
                                        <form class="custom-validation" method="POST" action="{{ route('produk.update',[$produk->id]) }}" novalidate="">
                                            @csrf
                                            {{ method_field('PUT') }}

                                                

                                            <div class="mb-3">
                                                <label>Nama Produk</label>
                                                <input type="text" name="nama" class="form-control" required="" value="{{ $produk->nama_produk }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Stok</label>
                                                <input type="text" name="stok" class="form-control" required="" value="{{ $produk->stok }}">
                                            </div>

                                            <div class="mb-3">
                                                <label>Harga</label>
                                                <div>
                                                    <input type="text" name="harga" class="form-control" required="" parsley-type="harga" value="{{ $produk->harga}}">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                       Edit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    </div> <!-- container-fluid -->
    </div> <!-- page-content -->
    </div> <!-- main-content -->
@endsection