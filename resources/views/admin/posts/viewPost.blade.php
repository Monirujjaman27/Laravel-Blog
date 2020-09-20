@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-dark">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0">View Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li data-toggle="tooltip" title="Back Dashboard" class="breadcrumb-item"><a
                                href="{{ route('home') }}"><small>Home</small></a></li>
                        <li data-toggle="tooltip" title="Back Post List" class="breadcrumb-item"><a
                                href="{{ route('post.index') }}"><small>All Post List</small></a></li>
                        <li class="breadcrumb-item active"><small>View Post</small></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark ">
                        <div class="card-header border-0">
                            <a data-toggle="tooltip" title="Create a new Post" class="badge badge-info p-2 float-right"
                                href="{{  route('post.create') }}"> Create new
                                Post</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="row bg-dark">
                            <div class="col-sm-10">
                                <div class="card-body bg-dark p-0">
                                    <table id="example1"
                                        class="m-2 table table-sm table-bordered table-striped table-dark table-hover">

                                        <tbody>
                                            <tr>
                                                <th class="pl-2">Thumbnail</th>
                                                <td class="">
                                                    <img class="img-fluid" height="200px" width="200px"
                                                        src="{{ asset('public/storage/post').'/'.$post->image }}"
                                                        alt="{{ $post->image }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Title</th>
                                                <td>{{ $post->title }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Category</th>
                                                <td>{{ $post->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Slug</th>
                                                <td>{{ $post->slug}}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Post date</th>
                                                <td>{{ $post->created_at->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Tags</th>
                                                <td>
                                                    @foreach($post->tags as $tags)
                                                    <span class="badge bg-primary">{{ $tags->name }} </span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Author</th>
                                                <td>{{ $post->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-2">Description</th>
                                                <td>{{ $post->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
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