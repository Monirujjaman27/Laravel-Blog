@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tags List</li>
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
                 <span>All Tags</span> 
                 <a class="badge badge-info p-2 float-right" href="{{  route('tag.create') }}"> Create new Tag</a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="35%">Tag Name</th>
                    <th width="35%">Slug</th>
                    <th width="15%">Posts</th> 
                    <th width="10%">Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                  @php $i= 1 @endphp
                  @foreach( $allTags as  $allTags)
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ ucfirst($allTags->name) }}</td>
                      <td>{{ $allTags->slug }} </td>
                      <td><span class="badge bg-primary">{{ $allTags->id }}</span></td>
                      <td class="d-flex">
                      <a class="btn btn-xs btn-info" href="{{ route('tag.edit', [$allTags->id]) }}"><i class="fas fa-edit"></i> </a>
                      <form class="mx-1" action="{{ route('tag.destroy', [$allTags->id]) }}" method="POST">
                      @method('DELETE')
                        @csrf
                        
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                      <!-- <a class="btn btn-xs btn-success" href="{{ route('category.show', [$allTags->id]) }}"><i class="fas fa-eye"></i> </a> -->
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