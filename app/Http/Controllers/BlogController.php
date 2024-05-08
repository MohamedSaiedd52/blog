<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=' , true)->paginate(10);
        return view('layouts.front.theme',compact('posts'));
    }


    public function getContent()
    {
         return view('layouts.front.contact');
    }

    public function getService()
    {
         return view('layouts.front.service');
    }


    public function getBlogs()
    {
        $posts = Post::paginate(8);
        return view('layouts.front.grid',compact('posts'));
    }

    public function single_blog($slug)
    {
        $posts = Post::latest()->limit(5)->get();
        $post = Post::where('slug', $slug)->firstOrFail();


        $tags = Tag::all();
        $comments = Comment::where('post_id',$post->id)->get();

        $commentCount = $comments->count();


        return view('layouts.front.single', compact('post','posts','comments','commentCount','tags'));
    }

}

