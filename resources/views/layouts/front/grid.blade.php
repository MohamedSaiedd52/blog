@extends('layouts.site')
@section('content')
<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our blog</span>
          <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
@foreach ($posts as $post)

	<div class="col-lg-6 col-md-6 mb-5">
		<div class="blog-item">
			<img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="" class="  rounded" width="600px" height="240px" style="max-width:540px !important;max-height:240px !important;">

			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>
                       @if($post->tags()->count() > 0)
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-danger text-white">{{ $tag->name }}</span>
                                @endforeach
                            @else
                                No tags
                            @endif</span>
					<span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5 Comments</span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{ $post->created_at->format('Y-m-d') }}
                    </span>
				</div>

                <h3 class="mt-3 mb-3"><a href="">{{ Str::limit($post->title) }}</a></h3>

				<p class="mb-4">

                    {{ Str::limit(strip_tags($post->description), 100) }}


                </p>

                <a href="{{ route('single_blog', $post->slug) }}" class="btn btn-small btn-main btn-round-full">More</a>

			</div>
		</div>
	</div>
    @endforeach

</div>




<div class="row justify-content-center mt-5">
    <div class="col-lg-6 text-center">
        <nav class="navigation pagination d-inline-block">
            <div class="nav-links">

        {{ $posts->links() }}

            </div>
        </nav>
    </div>
</div>




    </div>
</section>

@endsection
