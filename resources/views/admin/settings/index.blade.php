@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Website Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
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
                <form action="{{ route('settings.update') }}" method="POST" class="d-flex" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-8">
                        @include('admin.includes.errors')
                        <div class="card card-outline card-info">
                            <!-- /.card-header -->

                            <div class="card-body">
                                <!-- site title  -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="site_title">Site Title </label>
                                        <input id="site_title" class="form-control" type="text" name="site_title"
                                            placeholder="Enter site Title" value="{{ $frontendSetting->site_title }}">
                                        <small class="text-secondary">[Ex: example.com.bd ]</small>
                                    </div>
                                </div>
                                <!-- copyright -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="copyright">Copyright Text </label>
                                        <input id="copyright" class="form-control" type="text" name="copyright"
                                            placeholder="Enter Copyright Text"
                                            value="{{ $frontendSetting->copyright }}">
                                        <small class="text-secondary">[Ex: Copyright © 2014-2020 Develope by MD Example.
                                            All rights reserved. ]</small>
                                    </div>
                                </div>
                                <!-- facebook -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="facebook">Facebook URL </label>
                                        <input id="facebook" class="form-control" type="url" name="facebook"
                                            value="{{ $frontendSetting->facebook }}" placeholder="Enter facebook url"
                                            value="">
                                        <small class="text-secondary">[Ex: https://www.facebook.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- Twitter -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="twitter">Twitter URL </label>
                                        <input id="twitter" class="form-control" type="url" name="twitter"
                                            value="{{ $frontendSetting->twitter }}" placeholder="Enter twitter url"
                                            value="">
                                        <small class="text-secondary">[Ex: https://www.twitter.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- instagram -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="instagram">Instagram URL </label>
                                        <input id="instagram" class="form-control" type="url" name="instagram"
                                            value="{{ $frontendSetting->instagram }}" placeholder="Enter Instagram url"
                                            value="">
                                        <small class="text-secondary">[Ex: https://www.instagram.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- gmail -->
                                <div class="form-group d-flex">
                                    <div class="col-md-12">
                                        <label for="gmail">Gmail URL </label>
                                        <input id="gmail" class="form-control" type="email" name="gmail"
                                            value="{{ $frontendSetting->gmail }}" placeholder="Enter Gmail url"
                                            value="">
                                        <small class="text-secondary">[Ex: https://www.gmail.com/example. ]</small>
                                    </div>

                                </div>
                                <!-- about Description -->
                                <div class="form-group">
                                    <label for="description">Footer About Description:</label>
                                    <textarea id="description"
                                        name="site_about">{{ $frontendSetting->site_about }}</textarea>
                                    <button type="submit" id="gmailSave"
                                        class="badge hover badge-info float-right border-info mt-3">
                                        Save Change</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4">

                        <div class="card card-outline card-info">
                            <div class="row">
                                <div class="col-12">
                                    <img class="img-fluid" id="logoimg"
                                        src="{{ asset('/storage/logo/') }}{{'/'.$frontendSetting->logo }}"
                                        alt="{{ $frontendSetting->logo }}">
                                </div>
                            </div>
                            <div class="row mt-5 p-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        id="logoimage">
                                                    <label class="custom-file-label" for="logoimage">Choose logo</label>
                                                    <small class="text-secondary">[Formet JPEG, jpg, png,
                                                        gif]</small>
                                                    <button type="submit" id="gmailSave"
                                                        class="badge hover badge-info float-right border-info mt-3">
                                                        Save Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection