@extends('layouts.site')
@section('css')

<style>
   .post-image {
    max-width: 100%; /* Ensures the image fills its container */
    height: auto; /* Maintains the aspect ratio */
    max-height: 178px; /* Maximum height for uniformity */
    width: auto; /* Ensures the image doesn't exceed the maximum width */
}


</style>
@endsection
@section('content')
<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">جميع المقالات</h2>
            </div>
        </div>

        <div class="row">
            @if (count($posts) > 0)

            @foreach ($posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="#" class="img-link">
                        <img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="Image" class="img-fluid post-image">
                    </a>
                    <div class="excerpt">
                        <h2><a href="{{ route('single_blog', $post->slug) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <span class="d-inline-block mt-1">By <a href="#"> {{ $post->user->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format("Y-m-d") }}</span>
                        </div>
                        <p style="word-wrap: break-word !important;">{!! substr(strip_tags($post->description), 0, 200) !!}</p>
                        <p><a href="{{ route('single_blog', $post->slug) }}" class="read-more">متابعة القراءة</a></p>
                    </div>
                </div>
            </div>
        @endforeach

        @else
        <td class="col-100">Not Found</td>
        @endif



        </div>
    </div>
</section>


@endsection
