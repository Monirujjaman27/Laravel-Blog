@extends('layouts.admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="">Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="{{ route('contacet.index') }}" class="nav-link">
                                    <i class="fas fa-inbox"></i> Inbox
                                    @if($newmesssage)
                                    <span class="badge bg-primary float-right">{{ $newmesssage->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Drafts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-filter"></i> Junk
                                    <span class="badge bg-warning float-right">65</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-trash-alt"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Labels</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle text-danger"></i>
                                    Important
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle text-warning"></i> Promotions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle text-primary"></i>
                                    Social
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Mail</h3>

                        <div class="card-tools">
                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5>{{ $contact->subject }}</h5>
                            <h6>From: {{ $contact->email }}
                                <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span>
                            </h6>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-container="body"
                                    title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body"
                                    title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body"
                                    title="Forward">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm" title="Print">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">

                        <p>{{$contact->message }}</p>
                        <br>
                        <span>Name: {{ucfirst($contact->name) }}</span>
                        <br>
                        <span>Phone No: {{$contact->phone }}</span>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                   
                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                        </div>
                        <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection