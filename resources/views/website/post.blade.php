@extends('layouts.website')
@section('content')
@foreach($post as $post)

<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ asset('public/storage/post') }}/{{ $post->image }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                src="{{ asset('public/storage/user') }}/{{ $post->user->image }}"
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
                <div id="disqus_thread"></div>
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
                        <img src="@if( $post->user->image ) {{ asset('public/storage/user').'/'.$post->user->image }} @else{{ asset('website/images/user.svg') }} @endif"
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
                                    <img src="{{ asset('public/storage/post') }}/{{ $post->image }}"
                                        alt="{{ asset('public/storage/post') }}/{{ $post->image }}" class="mr-4">
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
                            src="{{ asset('public/storage/post').'/'.$post->image }}" alt="{{ $post->image }}"
                            class="rounded">
                    </a>
                    <div class="excerpt">
                        <span
                            class="post-category text-white bg-secondary mb-3">{{ ucfirst($post->category->name) }}</span>

                        <h2><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">{{ $post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <!-- author-figure -->
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if( $post->user->image ) {{ asset('public/storage/user').'/'.$post->user->image }} @else{{ asset('website/images/user.svg') }} @endif"
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

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://laravel-blog-ztcatplohp.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

                            

@endforeach
@endsection