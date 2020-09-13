@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><small>Home</small></a></li>
                        <li class="breadcrumb-item active"><small>Users List</small></li>
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
                    <div class="card">
                        <div class="card-header">
                            <span>All Users</span>
                            <a class="badge badge-info p-2 float-right" href="{{  route('user.create') }}"> Create
                                Users</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="%">No</th>
                                        <th width="">Image</th>
                                        <th width="%">User Name</th>
                                        <th width="">Email</th>
                                        <th width="">Slug</th>
                                        <th width="">Posts</th>
                                        <th width="">Role</th>
                                        <th width="%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i= 1 @endphp
                                    @foreach( $users as $users)
                                    <tr class="dataRow{{ $users->id }}" data-id="{{ $users->id }}">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <input name="classes" type="hidden" value="dataRow">
                                        <td>{{ $i }}</td>
                                        <td data-toggle="tooltip" title="{{ $users->title }}">
                                            <img class="img-fluid img-cover" height="40px" width="40px"
                                                src="{{ asset('/storage/user').'/'.$users->image }}"
                                                alt="{{ $users->image }}">
                                        </td>
                                        <td>{{ ucfirst($users->name) }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->slug }} </td>
                                        <td><span class="badge bg-primary">{{ $users->id }}</span></td>
                                        <td>{{ ucfirst($users->userRole) }}</td>
                                        <td class="d-flex">
                                            <a data-toggle="tooltip" title="Edit Post"
                                                class="btn badge badge-warning btnEdit"
                                                href="{{ route('user.edit', [$users->id]) }}">Edit </a>

                                            <a data-toggle="tooltip" title="View user"
                                                class="ml-1 btn badge badge-info btnEdit"
                                                href="{{ route('user.profile', [$users->id]) }}"><i class="fas fa-eye"></i>
                                            </a>

                                            <button data-toggle="tooltip" title="Click To delete The user" type="submit"
                                                class="btn badge badge-danger delteBtn ml-1">
                                                Delete</button>
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection