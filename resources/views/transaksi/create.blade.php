@extends('layouts.template')
@section('title')
Transaksi
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

        <div class="col-xl-8">


                                <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title">Tambah Transaksi</h4>


                                        <form class="custom-validation" method="POST" action="{{ route('transaksi.store') }}" novalidate="">
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

                                            <div class="form-row">
                            <div class="name">Qty</div>
                            <div class="row-12">
                                <select name="id_order" class="form-control">
                                    <option value="">Choose Product</option>
                                    @foreach ($order as $row)
                                    <option value="{{$row->id_order}}">{{$row->qty}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Produk</div>
                            <div class="value">
                                <select name="id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($produk as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Status</div>
                            <div class="value">
                                <select name="status" class="form-control">
                                    <option value="opt1">Select One Value Only</option>
                                    <option value="1">Sudah</option>
                                    <option value="2">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jenis Pembayaran</div>
                            <div class="value">
                                <select name="jenis_pmbyr" class="form-control">
                                    <option value="opt1">Pilih Jenis Pembayaran</option>
                                    <option value="1">Atm</option>
                                    <option value="2">Cod</option>
                                </select>
                            </div>
                        </div>
                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Tambah
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