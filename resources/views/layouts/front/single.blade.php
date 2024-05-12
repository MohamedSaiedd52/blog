@extends('layouts.site')
@section('css')
<style>
    .post-image {
     max-width: 865px; /* Ensures the image fills its container */
     height: auto; /* Maintains the aspect ratio */
     max-height: 403px; /* Maximum height for uniformity */
     width: auto; /* Ensures the image doesn't exceed the maximum width */
 }

.posts-image {
    max-width: 90px !important; /* Ensures the image fills its container */
     height: auto; /* Maintains the aspect ratio */
     max-height: 90px; /* Maximum height for uniformity */
     width: auto; /* Ensures the image doesn't exceed the maximum width */
}
.badges  {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}

.badges-success {
    color: #ffffff;
    background-color: #002e5a;
}
 </style>

@endsection


@section('content')

<section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">














{{-- Start POST  --}}

          <div class="post-content-body">

            <div class="row my-4">
              <div class="col-md-12 mb-4">
                <img  src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="Image placeholder" class="img-fluid rounded  post-image" >
              </div>

            </div>
            <h2><a  href="{{ route('single_blog', $post->slug) }}">{{ $post->title }}</a></h2>

            <p>      {!! $post->description !!}</p>

          </div>
{{-- End POST  --}}











{{-- Start category  --}}

          <div class="pt-5">
            <p>الفئات:


                <a href="#"> {{$post->category->name }}</a>

            </p>
          </div>

{{-- End category  --}}














          <div class="pt-5 comment-wrap">
            @if ($commentCount > 0)

            <h3 class="mb-5 heading">{{ $commentCount }} تعليقات</h3>

            @else
            <h3 class="mb-5 heading">0 تعليقات</h3>

        @endif
        @foreach ($comments as $comment)

        <ul class="comment-list">
            <li class="comment">
                <div class="vcard">
                    <img src="{{asset('images/person_1.jpg')}}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                    <h3>{{ $comment->user->name }}</h3>
                    <div class="meta " style="color: rgb(0, 0, 0) !important;">{{ $comment->created_at->format('g:i A Y-m-d') }}</div>
                    <div >
                        {{ $comment->comment }}
                    </div>

                    <p>
                    @if(auth()->check() && auth()->user()->id == $comment->user_id)

                        <a href="#comment-form-container-{{$comment->id}}" class="reply rounded" data-bs-toggle="collapse" data-target="#comment-form-container-{{$comment->id}}">Reply</a>
                        @endif


                    </p>

                    <div class="ml-5">
                        @if($comment->commentReply)
                        @foreach ($comment->commentReply as $reply)

                            <div class=""  readonly>
                                {{$reply->comment}}
                            </div>
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
                        <label for="reply">اكتب ردك :</label>
                        <textarea class="form-control @error('reply') is-invalid @enderror" id="reply" name="comment" rows="2" style="resize: none;"></textarea>
                        @error('reply')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">ارسل</button>
                </form>
            </div>
        </div>
        @endif

    @endforeach




            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
            @include('layouts.back.message')

              <form action="{{route('postComment',$post->id)}}" method="POST" class="p-5 bg-light">
                @csrf
                <div class="form-group">
                  <label for="message">اكتب تعليقك</label>
                  <textarea name="comment" id="message" cols="20" rows="8" class="form-control" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value=" ارسال" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="sidebar-search-form">
              <input type="text" class="form-control" id="s" placeholder="ابحث عن كلمة هنا.. ">
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
              <img src="{{asset('admin/img/avatar.jpg')}}" alt="Image Placeholder" class="img-fluid mb-3">
              <div class="bio-body">
                <h2> {{$post->user->name}}</h2>
                <p class="mb-4">
                    {{$post->user->email}}
                </p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">  ملفي الشخصي </a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div>


          <div class="sidebar-box">
            <h3 class="heading"> احدث المقالات </h3>
            <div class="post-entry-sidebar">
@foreach($posts as $post)

              <ul>
                <li>
                  <a href="{{ route('single_blog', $post->slug) }}">
                    <div class="text">
                      <h4>{{ $post->title }}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{ $post->created_at->format('d M Y') }} </span>
                      </div>
                    </div>

                    <img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="Image placeholder" class="mr-4  img-fluid posts-image">


                  </a>
                </li>
              </ul>

@endforeach
            </div>
          </div>




          <!-- END sidebar-box -->



          <div class="sidebar-box">
            <h3 class="heading">الفئات</h3>
            <ul class="categories a">
                @foreach ($cats as $cat)
              <li><a href="{{ route('single_blog', $post->slug) }}">{{ $cat->name }} <span>{{ $cat->posts->count() }}</span></a></li>
              @endforeach
            </ul>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">التاجات</h3>
            @if($tags->count() > 0)
                        @foreach($tags as $tag)
              <ul class="tags">
                <li><a href="#"> <span class="badges badges-success" >{{ $tag->name }}</span></a></li>

              </ul>
                        @endforeach
                    @else
                        No tags
                    @endif

          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">  مزيد من المقالات</div>
      </div>
      <div class="row">
        @foreach($posts as $post)


        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="{{ route('single_blog', $post->slug) }}" class="img-link">
              <img src="{{ asset('storage/posts/' . $post->gallery->image) }}" alt="Image" class="img-fluid">
            </a>
            <span class="date">{{ $post->created_at->format('d M Y') }}</span>
            <h2><a  href="{{ route('single_blog', $post->slug) }}">{{ $post->title }}</a></h2>
            <p> {!! substr(strip_tags($post->description), 0, 200) !!}</p>
            <p><a  href="{{ route('single_blog', $post->slug) }}" class="read-more"> متابعة القراءة</a></p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- End posts-entry -->




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
