@extends('layouts.site')
@section('content')
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<span class="d-block mb-3 text-white text-capitalize">Prepare for new future</span>
					<h1 class="animated fadeInUp mb-5">Our work is <br>presentation of our <br>capabilities.</h1>
					<a href="{{url('/')}}/#" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" >Get started<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro Start -->


<!-- Section Intro END -->
<!-- Section About Start -->

<section class="section about position-relative">
	<div class="bg-about"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6 offset-md-0">
				<div class="about-item ">
					<span class="h6 text-color">What we are</span>
					<h2 class="mt-3 mb-4 position-relative content-title">We are dynamic team of creative people</h2>
					<div class="about-content">
						<h4 class="mb-3 position-relative">We are Perfect Solution</h4>
						<p class="mb-5">We provide consulting services in the area of IFRS and management reporting, helping companies to reach their highest level. We optimize business processes, making them easier.</p>

						<a href="{{url('/')}}/#" class="btn btn-main btn-round-full">Get started</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section About End -->
<!-- section Counter Start -->
<section class="section counter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">1730</span> +</h3>
					<p class="text-muted">Project Done</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">125 </span>M </h3>
					<p class="text-muted">User Worldwide</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">39</span></h3>
					<p class="text-muted">Availble Country</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
					<p class="text-muted">Award Winner </p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section Testimonial End -->
<section class="section latest-blog bg-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Latest News</span>
					<h2 class="mt-3 content-title text-white">Latest articles to enrich knowledge</h2>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">

@foreach ($posts as $post)

			<div class="col-lg-4 col-md-6 mb-5">
				<div class="card bg-transparent border-0">
                    <img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="" class="  rounded" width="350px" height="238px" >

					<div class="card-body mt-2">
						<div class="blog-item-meta">
							<a href="" class="text-white-50">


                            @if($post->tags()->count() > 0)
                            @foreach($post->tags as $tag)
                                <a href="{{route('single_blog',$post->slug)}}" rel="tag" class="text-white-50"><span>{{ $tag->name }}</span></a>
                            @endforeach
                        @else
                        <p>No tags</p>

                        @endif
                            <span class="ml-2 mr-2">/</span></a>
							<a href=""  class="text-white-50">{{$post->category->name}}<span class="ml-2">/</span></a>
							<a href="" class="text-white-50 ml-2"><i class="fa fa-user mr-2"></i>{{$post->user->name}}</a>
						</div>

						<h3 class="mt-3 mb-5 lh-36"><a href="" class="text-white ">{{$post->title}}</a></h3>

						<a href="{{route('single_blog',$post->slug)}}" class="btn btn-small btn-solid-border btn-round-full text-white"> More</a>
					</div>
				</div>
			</div>
            @endforeach


		</div>



	</div>
</section>

@endsection
