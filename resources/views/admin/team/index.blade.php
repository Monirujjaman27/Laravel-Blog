@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Team</li>
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
                 <span>All</span> 
                 <a class="badge badge-info p-2 float-right" href="{{  route('category.create') }}"> Create Category</a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="35%">Name</th>
                    <th width="35%">Slug</th>
                    <th width="15%">Posts</th> 
                    <th width="10%">Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                  @php $i= 1 @endphp
                  @foreach( $allCategory as  $allCategory)
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ ucfirst($allCategory->name) }}</td>
                      <td>{{ $allCategory->slug }} </td>
                      <td><span class="badge bg-primary">{{ $allCategory->id }}</span></td>
                      <td class="d-flex">
                      <a class="btn btn-xs btn-info" href="{{ route('category.edit', [$allCategory->id]) }}"><i class="fas fa-edit"></i> </a>
                      <form class="mx-1" action="{{ route('category.destroy', [$allCategory->id]) }}" method="POST">
                      @method('DELETE')
                        @csrf
                        
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                      <!-- <a class="btn btn-xs btn-success" href="{{ route('category.show', [$allCategory->id]) }}"><i class="fas fa-eye"></i> </a> -->
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