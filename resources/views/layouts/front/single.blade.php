@extends('layouts.site')
@section('content')




<div class="main-wrapper ">



<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="row">

	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
            <img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="" class=" img-fluid rounded" >


			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i> @if($post->tags()->count() > 0)
                        @foreach($post->tags as $tag)
                            <span class="badge bg-danger text-white">{{ $tag->name }}</span>
                        @endforeach
                    @else
                        No tags
                    @endif</span></span>
					<span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>
                        @if ($commentCount > 0)
                        {{ $commentCount }} Comment
                        @else
                        No Comment
                    @endif
                    </span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ $post->created_at->format('Y-m-d') }}</span>
				</div>

				<h2 class="mt-3 mb-4"><a href="">{{$post->title}}</a></h2>



				<p class="lead mb-4 font-weight-normal text-black">
                    {!! $post->description !!}

                </p>


				<div class="tag-option mt-5 clearfix">
                    <ul class="float-left list-inline">
                        <li><span>Tag:</span></li>
                        @if($post->tags()->count() > 0)
                            @foreach($post->tags as $tag)
                                <li class="list-inline-item"><a href="" rel="tag">{{ $tag->name }}</a></li>
                            @endforeach
                        @else
                            <li>No tags</li>
                        @endif
                    </ul>

{{--
				    <ul class="float-right list-inline">
				        <li class="list-inline-item"> Share: </li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
				    </ul> --}}
			    </div>
			</div>
		</div>
	</div>

{{--
     <div class="col-lg-12 mb-5">
        <div class="posts-nav bg-white p-5 d-lg-flex d-md-flex justify-content-between">
            @if ($post)
                <a class="post-prev align-items-center" href="{{ route('single_blog', $post->id) }}">
                    <div class="posts-prev-item mb-4 mb-lg-0">
                        <span class="nav-posts-desc text-color">- Previous Post</span>
                        <h6 class="nav-posts-title mt-1">
                            {{ $post->title }}
                        </h6>
                    </div>
                </a>
            @else
                <div class="posts-prev-item mb-4 mb-lg-0">
                    <span class="nav-posts-desc text-color">- Previous Post</span>
                    <h6 class="nav-posts-title mt-1">No Previous Post</h6>
                </div>
            @endif

            <div class="border"></div>

            @if ($post)
                <a class="posts-next" href="{{ route('single_blog', $post->id) }}">
                    <div class="posts-next-item pt-4 pt-lg-0">
                        <span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Next Post</span>
                        <h6 class="nav-posts-title mt-1">
                            {{ $post->title }}
                        </h6>
                    </div>
                </a>
            @else
                <div class="posts-next-item pt-4 pt-lg-0">
                    <span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Next Post</span>
                    <h6 class="nav-posts-title mt-1">No Next Post</h6>
                </div>
            @endif
        </div>
    </div> --}}
    <div class="col-lg-12 mt-3">
        <div>
            @include('layouts.back.message')

            <form method="POST" action="{{ route('postComment', $post->id) }}">
                @csrf

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"></textarea>
                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="col-lg-12 mb-5">
        <div class="comment-area card border-0 p-5">
            <hr color="red">
            <h4 class="mb-4">
                @if ($commentCount > 0)
                <h4 class="mb-4">{{ $commentCount }} Comment</h4>
            @endif
            </h4>
            @foreach ($comments as $comment)
            <ul class="comment-tree list-unstyled">
                <li class="mb-5">
                    <div class="comment-area-box">
                        <img alt="" src="{{ asset('images/blog/test1.jpg')}}" class="img-fluid float-left mr-3 mt-2">
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <span>United Kingdom</span>
                        <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                            @if(auth()->check() && auth()->user()->id == $comment->user_id)
                                <a href="#comment-form-container-{{$comment->id}}" data-toggle="collapse" class="text-muted mr-3 text-success "><i class="icofont-reply "></i>Reply</a>
                            @endif
                            <span class="date-comm">{{ $comment->created_at->format('g:i A Y-m-d') }}</span>
                        </div>
                        <div class="comment-content mt-3">
                            <p>{{ $comment->comment }}</p>
                        </div>

                        <div class="ml-5">
                            @if($comment->commentReply)
                            @foreach ($comment->commentReply as $reply)
                                <p>{{$reply->comment}}</p>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
            @if(auth()->check() && auth()->user()->id == $comment->user_id)
            <div class="col-md-12">
                <div class="collapse mb-4" id="comment-form-container-{{$comment->id}}">

                    <form method="POST" action="{{ route('ReplyComment', $comment->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="reply">Reply</label>
                            <textarea class="form-control @error('reply') is-invalid @enderror" id="reply" name="comment" rows="3"></textarea>
                            @error('reply')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            @endif
            @endforeach
        </div>
    </div>





</div>











            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap">
	<div class="sidebar-widget search card p-4 mb-3 border-0">
		<input type="text" class="form-control" placeholder="search">
		<a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>


	</div>

	<div class="sidebar-widget card border-0 mb-3">
		<img src="images/blog/blog-author.jpg" alt="" class="img-fluid">
		<div class="card-body p-4 text-center">
			<h5 class="mb-0 mt-4">{{$post->user->name}}</h5>
			<p>{{$post->user->email}} </p>
			<p>

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.

            </p>
{{--
			<ul class="list-inline author-socials">
				<li class="list-inline-item mr-3">
					<a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
				</li>
				<li class="list-inline-item mr-3">
					<a href="#"><i class="fab fa-twitter text-muted"></i></a>
				</li>
				<li class="list-inline-item mr-3">
					<a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
				</li>
				<li class="list-inline-item mr-3">
					<a href="#"><i class="fab fa-pinterest text-muted"></i></a>
				</li>
				<li class="list-inline-item mr-3">
					<a href="#"><i class="fab fa-behance text-muted"></i></a>
				</li>
			</ul> --}}
		</div>
	</div>
    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
        <h5>Latest Posts</h5>

        @foreach($posts as $post)
            <div class="media border-bottom py-3">
                <a href="{{ route('single_blog', $post->slug) }}">	<img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="" class="img-fluid rounded" width="100px" height="80px" >
                <div class="media-body">
                    <h6 class="my-2"><a href="{{ route('single_blog', $post->slug) }}">{{ $post->title }}</a></h6>
                    <span class="text-sm text-muted">{{ $post->created_at->format('d M Y') }}</span>
                </div>
            </div>
        @endforeach
    </div>

	<div class="sidebar-widget bg-white rounded tags p-4 mb-3">
		<h5 class="mb-4">Tags</h5>

        @if($tags->count() > 0)
        @foreach($tags as $tag)
            <li class="list-inline-item"><a href="{{route('single_blog',$post->slug)}}" rel="tag">{{ $tag->name }}</a></li>
        @endforeach
    @else
        <li>No tags</li>
    @endif
	</div>
</div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var replyLink = document.getElementById('reply-link');
        var commentFormContainer = document.getElementById('comment-form-container');

        replyLink.addEventListener('click', function (event) {
            event.preventDefault();
            commentFormContainer.classList.toggle('d-none');
        });
    });
</script>


@endsection
