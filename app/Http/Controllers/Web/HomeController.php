<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Inbox;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('web.home');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(env('LIMIT'))->withQueryString();
        return view('web.blog' , compact(['blogs']));
    }

    public function faqs()
    {

        return view('web.faqs');
    }

    public function shop(Request $request)
    {
        $cat = $request->get('category') ?? null;
        $products = new Product();
        if ($cat){
            $category = Category::where('slug' , $cat)->first();
            $products = $products->where('category_id' , (int)$category?->id);
        }
        $products = $products->orderBy('id', 'DESC')->paginate(env('LIMIT'))->withQueryString();
        $from = (($products->currentPage()-1) * $products->perPage()) - 1;
        $to = ($products->currentPage() * $products->perPage()) - 1;
        $total = $products->total();
        return view('web.shop' , compact(['products','from','to' , 'total']));
    }

    public function product(Request $request , $slug)
    {

        $product = Product::where('slug',$slug)->first();

        if (!$product){
            return redirect()->route('home');
        }
        $reviews = $product->reviews()->orderBy('id', 'DESC')->paginate(2)->withQueryString();
        return view('web.product' , compact(['product' , 'reviews']));
    }

    public function addtocart(Request $request ,int $id)
    {

        $product = Product::where('id',$id)->first();

        if (!$product){
            return redirect()->route('home');
        }
        $user_id = auth()->user()->id;
        $cart = ShoppingCart::where(['product_id' => $id, 'user_id' =>$user_id])->first();
        if ($cart){
            $cart->quantity += 1;
            $cart->save();
        }else{
            $data = [
                'quantity' => (int)$request->get('quantity') ?? 1,
                'product_id' => $id,
                'user_id' => $user_id
            ];
            ShoppingCart::create($data);
        }

        return redirect()->route('cart');
    }

    public function cart(Request $request)
    {
        $products = auth()->user()->cart;
        return view('web.cart' , compact('products'));
    }

    public function updatecart(Request $request)
    {
        $q = $request->get('quantity');
        $id = $request->get('cart');
        $cart = ShoppingCart::where('id',$id)->first();
        $cart->quantity = $q;
        $cart->save();
        return response()->json(['msg' => 'success'] , 200);
    }

    public function message(Request $request)
    {
        $data = $request->all();
        $cart = Inbox::create($data);
        return redirect()->back();
    }

    public function removecart(Request $request)
    {
        $id = $request->get('cart');
        $cart = ShoppingCart::where('id',$id)->first();
        $cart->delete();
        return response()->json(['msg' => 'success'] , 200);
    }

    public function check(Request $request)
    {
        $products = auth()->user()->cart;
        return view('web.check' , compact('products'));
    }

    public function checkout(Request $request)
    {
        DB::beginTransaction();
        try {
            $user= auth()->user();
            $data = $request->all();
            $data['user_id'] = $user->id;
            $order = Order::create($data);
            $total = 0;
            if ($order){
                $cart = ShoppingCart::where('user_id' , $user->id)->get();
                foreach ($cart as $product){
                    $dataItem = [
                        'quantity' => $product->quantity,
                        'product_name' => $product->product->name,
                        'product_price' => $product->product->price,
                        'discount' => 0,
                        'extra' => 0,
                        'order_id' => $order->id,
                        'product_id' => $product->product_id,
                    ];
                    $item = OrderItem::create($dataItem);
                    if ($item){
                        $total += (($item->product_price * $item->quantity) + $item->extra)	- $item->discount;
                        $product->delete();
                    }
                }
            }
            $order->update(['total' => $total]);
            DB::commit();
            return redirect()->route('cart');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('check');
        }

    }

    public function blogdetails(Request $request , $slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('web.blog-details' , compact('blog'));
    }

}
