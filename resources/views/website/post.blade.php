@extends('layouts.website')
@section('content')
@foreach($post as $post)

<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ asset('/storage/post') }}/{{ $post->image }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                src="{{ asset('/storage/user') }}/{{ $post->user->image }}"
                                alt="{{ $post->user->image  }}" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    <h4 class="border-bottom">{{ $post->title }}</h4>
                    <p class="text-justify">{{ ucfirst(strip_tags($post->description)) }}</p>
                </div>


                <div class="pt-5">
                    <p><strong class="font-weight-bold" for="">Categories:</strong> <a
                            href="#">{{ ucfirst($post->category->name) }}</a> |
                        <strong class="font-weight-bold" for=""> Tags:</strong>
                        @foreach($post->tags as $tags)
                        <a class="badge badge-primary" href="{{ route('website.tag', ['slug'=>$tags->slug]) }}">{{ '#'.$tags->name }}</a>,
                        @endforeach

                    </p>
                </div>


                <div class="pt-5">
                    <h3 class="mb-5">6 Comments</h3>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website') }}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website') }}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ asset('website') }}/images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jean Doe</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                            laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                            enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                        </p>
                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard">
                                                <img src="{{ asset('website') }}/images/person_1.jpg"
                                                    alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Jean Doe</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                    quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                    impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply rounded">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard">
                                                        <img src="{{ asset('website') }}/images/person_1.jpg"
                                                            alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Jean Doe</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                            autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                            Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website') }}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <!-- sidebar authore bio area -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="@if( $post->user->image ) {{ asset('/storage/user').'/'.$post->user->image }} @else{{ asset('website/images/user.svg') }} @endif"
                            alt="{{ $post->user->image }}" class="img-fluid mb-5">
                        <div class="bio-body">
                            <h2>{{ $post->user->name }}</h2>
                            <p class="mb-4">{{ ucfirst(strip_tags(Str::limit($post->user->description, 300))) }}</p>
                            <p><a href="" class="btn btn-primary btn-sm rounded px-4 py-2">Read bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($ppost as $post)
                            <li>
                                <a href="{{ route('website.post', ['slug'=>$post->slug]) }}">
                                    <img src="{{ asset('/storage/post') }}/{{ $post->image }}"
                                        alt="{{ asset('/storage/post') }}/{{ $post->image }}" class="mr-4">
                                    <div class="text">
                                        <h4>{{ $post->title }}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach($allcategory as $allcategory)
                        <li><a href="{{ route('website.category', ['slug'=>$allcategory->slug]) }}">{{ $allcategory->name }}
                                <span></span></a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach($alltags as $alltags)
                        <li><a href="{{ route('website.tag', ['slug'=>$alltags->slug]) }}">{{ $alltags->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">

            @foreach($relatedPost as $post)

            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('website.post', ['slug'=>$post->slug]) }}"><img height="370px" width="370px"
                            src="{{ asset('/storage/post').'/'.$post->image }}" alt="{{ $post->image }}"
                            class="rounded">
                    </a>
                    <div class="excerpt">
                        <span
                            class="post-category text-white bg-secondary mb-3">{{ ucfirst($post->category->name) }}</span>

                        <h2><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">{{ $post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <!-- author-figure -->
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if( $post->user->image ) {{ asset('/storage/user').'/'.$post->user->image }} @else{{ asset('website/images/user.svg') }} @endif"
                                    alt="{{ $post->user->image }}" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ ucfirst($post->user->name) }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('F d, Y') }}</span>
                        </div>
                        <p>{{  ucfirst(strip_tags(Str::limit($post->description, 150))) }}</p>
                        <p><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">Read More</a></p>
                    </div>
                </div>
            </div>

            @endforeach



        </div>

    </div>
</div>


@endforeach
@endsection