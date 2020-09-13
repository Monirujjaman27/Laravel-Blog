@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Add Tags</li>
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
                            <span class="card-title">Add Tags </span>
                            <a href="{{ route('tag.index') }} "class="float-right badge badge-info p-2">Back Tags Page</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="catName">Tags Name:</label>
                                    <input id="catName" class="form-control" type="text" name="name" placeholder="Tag">
                                </div>
                                <div class="form-group">
                                    <label for="description">Tags Description:</label>
                                    <textarea placeholder="Description" name="description" id="description" cols="30" rows="10">
                                    
                                    </textarea>
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