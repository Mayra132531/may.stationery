@extends('layouts.template')
@section('title')
Produk
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Tambah Produk</h2>
                                        <form class="custom-validation" action="{{ route('produk.store') }}" method="POST"  novalidate="">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                     </ul>
                                                </div>
                                                @endif
                                            <div class="mb-3">
                                                <label>Nama Produk</label>
                                                <input type="text" class="form-control" required="" placeholder="" name="nama">
                                            </div>

                                            <div class="mb-3">
                                                <label>Stok</label>
                                                <div>
                                                    <input type="text" class="form-control" required="" name="stok" parsley-type="stok" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label>Harga</label>
                                                <div>
                                                    <input type="text" class="form-control" required="" name="harga" parsley-type="harga" placeholder="">
                                                </div>
                                            </div>
                                            

                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
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