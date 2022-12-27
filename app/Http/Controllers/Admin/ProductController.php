<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(env('LIMIT'));

        return view("admin.products.index" , compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create" , compact('categories'));

    }


    public function store(Request $request)
    {
        $data = $request->only(['category_id','name' , 'quantity', 'price','specifications' , 'short_description' ,'long_description']);
        if ($request->has('main_image') && $request->file('main_image')){
            $data['main_image'] = 'uploads/'.Storage::disk('public')->putFile('products',$request->file('main_image'));
        }else{
            $data['main_image'] = null;
        }
        foreach ($request->file('images') as $image) {
            if ($image){
                $data['images'][] = 'uploads/'.Storage::disk('public')->putFile('products',$image);
            }
        }
        $blog = Product::create($data);
        return redirect()->route('admin.products.index');
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("admin.products.edit" , compact('categories' , 'product'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->only(['category_id','name' , 'quantity', 'price','specifications' , 'short_description' ,'long_description']);
        if ($request->has('main_image') && $request->file('main_image')){
            $data['main_image'] = 'uploads/'.Storage::disk('public')->putFile('products',$request->file('main_image'));
        }else{
            unset($data['main_image']);
        }
        if ($request->has('images') && count($request->file('images')) > 0){
            foreach ($request->file('images') as $image) {
                if ($image){
                    $data['images'][] = 'uploads/'.Storage::disk('public')->putFile('products',$image);
                }
            }
        }else{
            unset($data['images']);
        }
        $product = $product->update($data);
        return redirect()->route('admin.products.index');
    }


    public function destroy(Product $product)
    {
        $cover = $product->main_image;
        $images = $product->images;
        $product->delete();
        File::delete(public_path($cover));
        foreach ($images as $image){
            File::delete(public_path($image));
        }
        return redirect()->back();
    }
}
