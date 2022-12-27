<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact([
            'categories'
        ]));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $data = $request->only(['name','enable','description']);
        $data['enable'] = $data['enable'] == "1";
        if ($request->has('cover') && $request->cover){
            $data['cover'] = 'uploads/'.Storage::disk('public')->putFile('categories',$request->file('cover'));
        }else{
            $data['cover'] = null;
        }
        if ($request->has('slider_image') && $request->slider_image){
            $data['slider_image'] = 'uploads/'.Storage::disk('public')->putFile('categories',$request->file('slider_image'));
        }else{
            $data['slider_image'] = null;
        }

        try {
            $cat = Category::create($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $html = view('admin.categories.edit' , compact([
            'category'
        ]))->render();
        return response()->json([
            'html' => $html
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->only(['name','enable','description']);
        $data['enable'] = $data['enable'] == "1";
        if ($request->has('cover') && $request->cover){
            $data['cover'] = 'uploads/'.Storage::disk('public')->putFile('categories',$request->file('cover'));
        }
        if ($request->has('slider_image') && $request->slider_image){
            $data['slider_image'] = 'uploads/'.Storage::disk('public')->putFile('categories',$request->file('slider_image'));
        }

        try {
            $cat = $category->update($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }


    public function destroy(Category $category)
    {
        $cover = $category->cover;
        $slider_image = $category->slider_image;
        $category->delete();
        File::delete(public_path($cover));
        File::delete(public_path($slider_image));
        return redirect()->back();
    }
}
