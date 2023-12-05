@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Posts</h1>

            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('storage/'. $post->preview_image)}}" alt="blog post">
                            </div>
                            @if($post->categories)
                                <p class="blog-post-category">{{$post->categories->title}}</p>
                            @endif

                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>

                    @endforeach
                </div>
        </div>
        </section>


        <div class="row">
            <div class="container"
            <div class="col-12">
                <h3 class="text-center">Random Posts</h3>
                <div class="col-md-12 ">
                    <section class="text-center">
                        <div class="row text-center ">

                            @foreach($randomPosts as $randomPost)

                                <div class="col-md-3 fetured-post blog-post ">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{asset('storage/'. $randomPost->preview_image)}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{$randomPost->categories->title}}</p>
                                    <a href="#" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$randomPost->title}}</h6>
                                    </a>
                                </div>

                            @endforeach
                        </div>


                    </section>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="container">


                <div class="widget widget-post-list col-10 text-center">
                    <h5 class="widget-title">Popular posts</h5>
                    <ul class="post-list" style="white-space: nowrap;">

                        @foreach($likedPosts as $likedPost)
                            <li class="post col-8">
                                <a href="#!" class="post-permalink media">
                                    <img src="{{asset('storage/'. $likedPost->preview_image)}}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title ">{{ Str::limit($likedPost->content, 100) }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    {{$posts->links()}}
                </div>

            </div>

        </div>



        </div>
        </div>

    </main>
@endsection
