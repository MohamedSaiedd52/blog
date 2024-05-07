<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();

        return view('layouts.back.tags.index',compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tags = Tag::create([
            'name' => trim($request->name),
        ]);


        return redirect()->route('tags.index')->with('success', 'تم إنشاء النصنيف بنجاح.     ');
    }

  public function update(Request $request,$id)
  {
    $request->validate([
        'name' => 'required',
    ]);

    $tags = Tag::where('id',$id)->update([
        'name' => $request->name,
    ]);
    return redirect()->route('tags.index')->with('success', 'تم التعديل التنصيف بنجاح.     ');


  }

  public function destroy($id)
  {
    $tags = Tag::where('id',$id)->delete();
    return redirect()->route('tags.index')->with('success', 'تم   حذف التصنيف بنجاح.     ');

  }
}
