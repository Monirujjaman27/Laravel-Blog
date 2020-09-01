@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                            <span class="card-title">Edit Category </span>
                            <a href="{{ route('category.index') }} "class="float-right badge badge-info p-2">Back Category Page</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('category.update', [$category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="catName">Category Name:</label>
                                    <input id="catName" class="form-control" type="text" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="catDescription">Category Description:</label>
                                    <textarea placeholder="Description" height="200px" name="description" id="summernote" cols="30" rows="10">
                                    {{  $category->description }}
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