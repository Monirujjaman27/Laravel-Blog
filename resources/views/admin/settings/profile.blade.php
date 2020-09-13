@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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

                        <div class="row">
                            <div class="col-sm-10">
                                <div class="card-body">
                                    <table id="example1"
                                        class="m-2 table table-sm table-bordered table-striped table-hover">

                                        <tbody>
                                            <tr>
                                                <th class="pl-2">Profile</th>
                                                <td class="">
                                                    <img class="img-fluid" height="200px" width="200px"
                                                        src="{{ asset('/storage/user').'/'.$user->image }}"
                                                        alt="{{ $user->image }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Title</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Slug</th>
                                                <td>{{ $user->slug}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="pl-2">Author</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Description</th>
                                                <td>{{ strip_tags($user->description) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('profile.update') }}" class="badge badge-info float-right p-2">Update Profile</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>


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