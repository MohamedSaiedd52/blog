@extends('layouts.site')

@section('css')
<style>
    .post-entry-alt {
        width: 100%; /* Ensure consistent width for each post */
    }

    .post-image {
        width: 100%; /* Ensure images fill their container */
        height: auto; /* Maintain aspect ratio */
    }

    .post-entry-alt .excerpt {
        font-size: 16px; /* Ensure consistent font size for descriptions */
        line-height: 1.5; /* Ensure consistent line height for descriptions */
    }

    .posts-entry-title {
        font-size: 24px; /* Ensure consistent font size for titles */
        margin-bottom: 20px; /* Optionally, add margin bottom */
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
                        <h2><a href="{{ route('single_blog', $post->slug) }}">
                            {{ Str::limit($post->title, 50) }} <!-- Adjust the number '50' as needed -->
                        </a></h2>
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
