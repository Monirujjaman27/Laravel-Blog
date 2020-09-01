@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post List</li>
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
                            <span>All Post</span>
                            <a class="badge badge-info p-2 float-right" href="{{  route('post.create') }}"> Create new
                                Post</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="">Title</th>
                                        <th width="">Image</th>
                                        <th width="">Description</th>
                                        <th width="">Category</th>
                                        <th width="">Slug</th>
                                        <th width="">Tags</th>
                                        <th width="">Author</th>
                                        <th width="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i= 1 @endphp
                                    @foreach( $allpost as $allpost)
                                    <tr>
                                        <td><input name="id" type="hidden" value="{{ $allpost->id }}"></td>
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($allpost->title) }}</td>
                                        <td>
                                            <img class="img-fluid img-cover" height="40px" width="40px"
                                                src="{{ asset('/storage/post').'/'.$allpost->image }}"
                                                alt="{{ $allpost->image }}">
                                        </td>
                                        <td>{{ $allpost->description }}</td>
                                        <td>{{ ucfirst($allpost->category->name) }} </td>
                                        <td>{{ $allpost->slug }} </td>
                                        <td><span class="badge bg-primary">{{ $allpost->id }}</span></td>
                                        <td><span class="">{{ ucfirst($allpost->user->name) }}</span></td>
                                        <td class="d-flex">
                                            <a class="btn btn-xs btn-info "
                                                href="{{ route('post.edit', [$allpost->id]) }}"><i
                                                    class="fas fa-edit"></i> </a>

                                            <button type="submit" class="btn btn-xs btn-danger delteBtn"><i
                                                    class="fas fa-trash"></i></button>
                                            <!-- <a class="btn btn-xs btn-success" href="{{ route('category.show', [$allpost->id]) }}"><i class="fas fa-eye"></i> </a> -->
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