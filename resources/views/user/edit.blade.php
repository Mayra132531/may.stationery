@extends('layouts.template')
@section('title')
User
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
                <h4 class="card-title">Edit User</h4>

                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                     </ul>
                                                </div>
                                                @endif
                                        <form class="custom-validation" method="POST" action="{{ route('user.update',[$user->id]) }}" novalidate="">
                                            @csrf
                                            {{ method_field('PUT') }}

                                                

                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" required="" value="{{ $user->name }}">
                                            </div>

                                            <div class="mb-3">
                                                <label>E-Mail</label>
                                                <div>
                                                    <input type="email" name="email" class="form-control" required="" parsley-type="email" value="{{ $user->email}}">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label>Level</label>
                                                <select name="level" class="form-control">
                                                            <option value="opt1">Select One Value Only</option>
                                                            <option value="admin" @if($user->level == "admin") selected @endif>Admin</option>
                                                            <option value="pelanggan" @if($user->level == "pelanggan") selected @endif>Pelanggan</option>
                                                        </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required="" value="">
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