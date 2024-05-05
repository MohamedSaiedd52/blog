<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Post = Post::count();
        $Tag = Tag::count();
        $Category = Category::count();
        $User = User::count();


        return view('dashboard',compact('Post','Tag','Category','User'));
    }
}
