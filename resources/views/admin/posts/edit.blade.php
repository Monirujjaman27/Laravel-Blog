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
                            
                            <a href="{{ route('post.index') }} " class="badge badge-info p-2">Back Post
                                Page</a>
                            
                            <a href="{{ route('post.create') }} " class="float-right badge badge-info p-2">Create a Post
                                Page</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('post.update', [$post->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                            <!-- Titel input group  -->
                                <div class="form-group">
                                    <label for="postName">Post Name:</label>
                                    <input id="postName" class="form-control" type="text" name="title"
                                        value="{{ $post->title }}">
                                </div>
                                <!-- category input grup  -->
                                <div class="form-group">
                                    <label for="postName">Category:</label>
                                    <select class="form-control" name="category_id" id="category">
                                        @foreach($category as $category)
                                        <option class="form-control" value="{{ $category->id }}"
                                            {{ $post->category->id == $category->id ? 'selected="selected"' : '' }}>
                                            {{ ucfirst($category->name) }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                                <!-- Post Thumbnail -->
                                <div class="form-group">
                                    <label for="image">Thumbnail</label>
                                    <div class="input-group">
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <img class="img-fluid float-right mr-2" height='50' width="50"
                                                src="{{ asset('public/storage/post').'/'.$post->image }}"
                                                alt="{{ $post->image }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Tag input group  -->
                                <div class="form-group ">
                                    <label for="image">Tags:</label>
                                    <div class="d-flex">
                                        @foreach($tags as $tags)
                                        <div class="custom-control custom-checkbox mr-1">
                                            <input name="tags[]" class="custom-control-input" type="checkbox" id="customCheckbox{{ $tags->id }}" value="{{ $tags->id }}"
                                                @foreach($post->tags as $t) 
                                                    @if($tags->id == $t->id) checked @endif                                               
                                                @endforeach
                                                 >
                                            <label for="customCheckbox{{ $tags->id }}" class="custom-control-label">
                                                {{ $tags->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Description input group  -->
                                <div class="form-group">
                                    <label for="description">Post Description:</label>
                                    <textarea name="description" id="description" >{{ $post->description }}</textarea>
                                </div>
                            </div>
                            <!--Submit  -->
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