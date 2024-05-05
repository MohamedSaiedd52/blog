<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $cats = Category::all();

        return view('layouts.back.categories.index',compact('cats'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cats = Category::create([
            'name' => trim($request->name),
        ]);


        return redirect()->route('categories.index')->with('success', 'تم إنشاء الفئة بنجاح.     ');
    }

  public function update(Request $request,$id)
  {
    $request->validate([
        'name' => 'required',
    ]);

    $cats = Category::where('id',$id)->update([
        'name' => $request->name,
    ]);
    return redirect()->route('categories.index')->with('success', 'تم التعديل الفئة بنجاح.     ');


  }

  public function destroy($id)
  {
    $cats = Category::where('id',$id)->delete();
    return redirect()->route('categories.index')->with('success', 'تم الحذف  الفئة بنجاح.     ');

  }
}
