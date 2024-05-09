<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $category = Category::getCategory();

        return view('layouts.back.posts.index',compact('posts','category'));
    }

    public function create()
    {
        $category = Category::getCategory();
        $tags = Tag::all();
        return view('layouts.back.posts.create',compact('category','tags'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:60|max:255',
            'file' => 'required|image',
            'slug' => 'nullable|string|unique:posts|max:255',
            'description' => 'nullable|max:10000',
            'status' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);
        if ($file = $request->file('file') )
        {
           $filename =  $this->uploadfile($file);  // get
           $gallery =  $this->storeImage($filename);  // post

        }


        $post = new Post();
        $post->title = $request->title;
        $post->gallery_id = $gallery->id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->save(); // Save post before attaching tags

        // Attach tags
        if (!empty($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }


        // Comment out or remove the dd line when done debugging
        // return dd($request->all());
        return redirect()->route('posts.index')->with('success', 'تم انشاء مقالة بنجاح');
    }



    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::all(); // Assuming you want to list all categories for a dropdown
        $tags = Tag::all();

        return view('layouts.back.posts.edit', compact('post', 'category','tags')); // Make sure to use the 'edit' view if you are editing
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);  // Find the existing post

         $request->validate([
            'title' => 'required|string|min:60|max:255',
            'file' => 'nullable|image',
            'slug' => 'nullable|string|unique:posts,slug,' . $id . ',id|max:255',  // Correcting the unique rule
            'description' => 'nullable|max:10000',
            'status' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);


        if ($file = $request->file('file') )
{

        $img = null;
        if($post->gallery)
        {
            $img = $post->gallery->image;
            $pathone = public_path('storage/posts/');

            if (file_exists($pathone . $img) )
        {
            unlink($pathone.$img);

        }



        }

        $filename =  $this->uploadfile($file);  // get


        $post->gallery->update([
            'image' =>  $filename,
        ]);
    }
        // Update the post with validated data
        $post->update([
            'title' => $request->title,
            'slug' =>  $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);



        // Attach tags


        if (!empty($request->tags)) {
            $post->tags()->sync($request->tags); // قم بتحديث العلامات مباشرة دون الحاجة للفحص
        }

        return redirect()->route('posts.index')->with('success', 'تم تحديث المقالة بنجاح');
    }

        public function destroy($id)
        {

        // Retrieve the post by its ID
            $post = Post::findOrFail($id);

        // Detach all associated tags
            $post->tags()->detach();

            $post->comments()->delete();



        // Delete the post
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'تم حذف المقالة بنجاح');

        }


    private function uploadfile($file)
    {
        $filename = rand(100,10000) . time() . $file->getClientOriginalName();


        $file_path = public_path('/storage/posts');


        $file->move($file_path,$filename);

        return $filename;

    }

   private function storeImage($filename)
   {
    $gallery = Gallery::create([
        'image' => $filename,
        'type' => Gallery::POST_IMAGE,
    ]);

    return $gallery;

   }

}
