@extends('layouts.template')
@section('title')
Order
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Tambah Order</h2>
                                        <form class="custom-validation" action="{{ route('order.store') }}" method="POST"  novalidate="">
                                            @csrf
                                            <div class="form-row">
                            <div class="name">Nama Produk</div>
                            <div class="value">
                                <select name="id" class="form-control">
                                    <option value="">Choose Product</option>
                                    @foreach ($produk as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Qty</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="qty" class="form-control" required="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Harga</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="harga" class="form-control" required="" placeholder="">
                                </div>
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