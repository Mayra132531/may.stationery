@extends('layouts.template')
@section('title')
Order
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
                <h4 class="card-title">Edit Order</h4>

                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                     </ul>
                                                </div>
                                                @endif
                                        <form class="custom-validation" method="POST" action="{{ route('order.update',[$order->id]) }}" novalidate="">
                                            @csrf
                                            {{ method_field('PUT') }}

                                            <div class="mb-3">
                                                <label>Id Produk</label>
                                                <input type="text" name="id" class="form-control" required="" value="{{ $order->id }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Qty</label>
                                                <input type="text" class="form-control" required=""  name="qty" value="{{ $order->qty }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Harga</label>
                                                <input type="text" class="form-control" required=""  name="harga" value="{{ $order->harga }}">
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