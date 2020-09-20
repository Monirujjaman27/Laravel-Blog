@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $postCount }}</h3>

                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $categoryCount}}</h3>

                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-align-left"></i>
                        </div>
                        <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $tagCount }}</h3>

                            <p>Tags</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <a href="{{ route('tag.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $userCount }}</h3>

                            <p>Uses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <span>All Post</span>
                            <a data-toggle="tooltip" title="Go to Post page" class="badge badge-info p-2 float-right"
                                href="{{  route('post.index') }}"> All Post
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="10%">Title</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Tags</th>
                                        <th>Create Date</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i= 1 @endphp
                                    @foreach( $allpost as $allpost)

                                    <tr class="dataRow{{ $allpost->id }}" data-id="{{ $allpost->id }}">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <input name="classes" type="hidden" value="dataRow">
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($allpost->title) }}</td>
                                        <td data-toggle="tooltip" title="{{ $allpost->title }}">
                                            <img class="img-fluid img-cover img-border" height="40px" width="40px"
                                                src="{{ asset('public/storage/post').'/'.$allpost->image }}"
                                                alt="{{ $allpost->image }}">
                                        </td>
                                        <td>{{ ucfirst($allpost->category->name) }} </td>
                                        <td>{{ $allpost->slug }} </td>
                                        <td>
                                            @foreach($allpost->tags as $tags)
                                            <span class="badge bg-primary">{{ $tags->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $allpost->created_at->format('j - m - Y') }}</td>
                                        <td>{{ ucfirst($allpost->user->name) }}</span></td>
                                        <td class="d-flex">
                                            <a data-toggle="tooltip" title="Edit Post"
                                                class="btn badge badge-warning btnEdit"
                                                href="{{ route('post.edit', [$allpost->id]) }}">Edit </a>

                                            <a data-toggle="tooltip" title="View Post"
                                                class="ml-1 btn badge badge-info btnEdit"
                                                href="{{ route('post.show', [$allpost->id]) }}"><i
                                                    class="fas fa-eye"></i> </a>

                                            <button data-toggle="tooltip" title="Click To delete The Post" type="submit"
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection