@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                        
                        <!-- /.card-header -->
                        <form action="{{ route('user.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">User Name <sup
                                            class="text-danger"><strong>*</strong></sup></label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="User Name" value="{{  $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">User Email <sup class="text-danger">*</sup></label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                                        value="{{  $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <sup class="text-danger">*</sup></label>
                                    <input id="password" class="form-control" type="text" name="password"
                                        placeholder="User Password">
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile</label>

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <img class="img-fluid ml-md-5" height='50' width="50"
                                                src="{{ asset('/storage/user').'/'.$user->image }}"
                                                alt="{{ $user->image }}">
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
                                    <textarea id="description" name="description">{{  $user->description }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary float-right" value="Update">
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