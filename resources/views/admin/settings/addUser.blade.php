@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mr-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.includes.errors')
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <span class="card-title">Add User </span>
                            <a href="{{ route('user.index') }} " class="float-right badge badge-info p-2">Back User
                                Page</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">User Name <sup
                                            class="text-danger"><strong>*</strong></sup></label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="User Name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">User Email <sup class="text-danger">*</sup></label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <sup class="text-danger">*</sup></label>
                                    <input id="password" class="form-control" type="text" name="password"
                                        placeholder="User Password" value="{{ old('password') }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userRole">User Role <sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="userRole" id="userRole">
                                        <option value="admin">Admin</option>
                                        <option value="editor">Editor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">User Description:</label>
                                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary float-right" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection