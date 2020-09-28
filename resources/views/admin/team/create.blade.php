@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Team Member</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><small>Home</small></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><small>Team</small></a></li>
                        <li class="breadcrumb-item active"><small>Add Team Member</small></li>
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
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <!-- link All team memmber page   -->
                                    <a href="{{ route('category.index') }} "
                                        class="float-right badge badge-info p-2">Back Team Page</a>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <input id="name" class="form-control" type="text" name="name"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <input id="email" class="form-control" type="email" name="email"
                                                placeholder="Email">
                                        <small class="text-secondary">[Ex: https://www.gmail.com/example.. ]</small>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <input id="phone" class="form-control" type="phone" name="phone"
                                                placeholder="Phone">
                                                
                                        <small class="text-secondary">[Ex: +880******** ]</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Thumbnail -->
                                <div class="form-group">
                                    <label for="image">Thumbnail</label>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <div class="input-group">
                                                <div class="custom-file">

                                                    <input type="file" class="custom-file-input" name="image"
                                                        id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Post Thumbnail -->
                                 <!-- facebook -->
                                 <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="facebook">Facebook </label>
                                        <input id="facebook" class="form-control" type="url" name="facebook"
                                        value="{{ old('facebook') }}" placeholder="Enter facebook url">
                                        <small class="text-secondary">[Ex: https://www.facebook.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- Twitter -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="twitter">Twitter </label>
                                        <input id="twitter" class="form-control" type="url" name="twitter"
                                        value="{{ old('twitter') }}" placeholder="Enter twitter url">
                                        <small class="text-secondary">[Ex: https://www.twitter.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- instagram -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="instagram">Instagram </label>
                                        <input id="instagram" class="form-control" type="url" name="instagram"
                                        value="{{ old('instagram') }}" placeholder="Enter Instagram url">
                                        <small class="text-secondary">[Ex: https://www.instagram.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- gmail -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="gmail">Gmail </label>
                                        <input id="gmail" class="form-control" type="email" name="gmail"
                                            value="{{ old('gmail') }}" placeholder="Enter Gmail url">
                                        <small class="text-secondary">[Ex: https://www.gmail.com/example. ]</small>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description"></textarea>

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