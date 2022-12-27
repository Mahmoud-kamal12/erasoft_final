<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(env('LIMIT'));
        return view('admin.blog.index' , compact('blogs'));
    }


    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['title' , 'description' , 'image' , 'date']);
        if ($request->has('image') && $request->file('image')){
            $data['image'] = 'uploads/'.Storage::disk('public')->putFile('blog',$request->file('image'));
        }else{
            $data['image'] = null;
        }
        $blog = Blog::create($data);
        return redirect()->route('admin.blog.index');
    }

    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        return view('admin.blog.edit' , compact('blog'));
    }


    public function update(Request $request, Blog $blog)
    {
        $data = $request->only(['title' , 'description' , 'image' , 'date']);
        if ($request->has('image') && $request->file('image')){
            $data['image'] = 'uploads/'.Storage::disk('public')->putFile('blog',$request->file('image'));
        }else{
            unset($data['image']);
        }
        $blog = $blog->update($data);
        return redirect()->route('admin.blog.index');
    }


    public function destroy(Blog $blog)
    {
        $cover = $blog->image;
        $blog->delete();
        File::delete(public_path($cover));
        return redirect()->back();
    }
}
