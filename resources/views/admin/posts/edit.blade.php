@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
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
                            <span class="card-title">Edit Post </span>
                            <a href="{{ route('post.index') }} " class="float-right badge badge-info p-2">Back Post
                                Page</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('post.update', [$post->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postName">Post Name:</label>
                                    <input id="postName" class="form-control" type="text" name="title"
                                        value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="postName">Category:</label>
                                    <select class="form-control" name="category_id" id="category">
                                        @foreach($category as $category)
                                        <option class="form-control" value="{{ $category->id }}" 
                                        {{ $post->category->id == $category->id ? 'selected="selected"' : '' }}
                                        >
                                        {{ ucfirst($category->name) }}
                                        </option>
                                       
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="image">Thumbnail:</label>
                                            <input class="form-control-file" type="file" name="image" id="image">
                                        </div>
                                        <div class="col-sm-6">
                                            <img class="img-fluid float-right mr-2" height='50' width="50"
                                                src="{{ asset('/storage/post').'/'.$post->image }}"
                                                alt="{{ $post->image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="catDescription">Post Description:</label>
                                    <textarea placeholder="Description" height="200px" name="description"
                                        id="summernote" cols="30" rows="10">
                                     {{ $post->description }}
                                    </textarea>
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