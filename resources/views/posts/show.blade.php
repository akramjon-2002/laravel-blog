@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$date->format('F')}} {{$date->day}} {{$date->year}} • {{$date->format('h:i')}} •
                {{$post->comments->count()}} comment</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->main_image)}}" alt="featured image" class="img-fluid w-60 h-30">
            </section>
            <section class="post-content">

                <div class="row">

                    <div class="col-lg-9 mx-auto">
                      {{!!$post->content!!}}
                    </div>


                </div>
            </section>





            <div class="col-12 py-5">
                <div class="d-flex justify-content-between">

                    <form  method="post" action="{{route('post.like.store', $post->id)}}">
                        @csrf
                        <button type="submit" class="border-0 tr bg-transparent">
                            @auth()
                                @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class=" nav-icon fa-solid fa-heart"></i>
                                @else
                                    <i class=" nav-icon fa-regular fa-heart"></i>
                                @endif
                            @endauth
                        </button>
                    </form>
                </div>
            </div>








            <div class="row">

                <div class="col-lg-9 mx-auto">

                    <div class="col-12 text-center mb-5">
                        <h4 class="mx-20 my-10">Comments ({{$post->comments->count()}})</h4>
                    </div>
                    <section class="comment-list  mb-6">
                        @foreach($post->comments as $comment)
                            <div class="card-comment mb-4" >
                                <div class="comment-text">
                                    <div>
                                     <span class="username">
                                       {{$comment->user->name}}
                                          <span class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                           </span>
                                    </div>
                                    {{$comment->message}}
                                </div>
                            </div>
                        @endforeach

                    </section>

                  @auth()
                    <section class="comment-section"  class="row gx-60 mb-5">
                        <h2 class="section-title mb-5 text-center "  data-aos="fade-up">Send Comment</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
