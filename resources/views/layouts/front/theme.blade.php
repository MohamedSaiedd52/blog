@extends('layouts.site')
@section('content')
<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">جميع المقالات</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($posts as $post)

            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">

                    <a href="#" class="img-link"><img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="{{route('single_blog',$post->slug)}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            {{-- <figure class="author-figure mb-0 me-3 float-start"><img src="{{asset('storage/posts/' ) }}" alt="Image" class="img-fluid"></figure> --}}
                            <span class="d-inline-block mt-1">By <a href="#"> {{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{$post->created_at->format("Y-m-d")}}</span>
                        </div>

                        <p>{{Str::limit($post->description,1000)}}</p>
                        <p><a href="{{route('single_blog',$post->slug)}}" class="read-more"> متابعة القراءة</a></p>
                    </div>


                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


@endsection
