<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders  = new Order();
        if ($request->has('q')){
            $q = $request->get('q');
            $orders = $orders->where(function ($qu) use($q){
                $qu->orWhere('email' ,'like' , "%{$q}%")
                ->orWhere('city' ,'like' , "%{$q}%")
                ->orWhere('zip','like' , "%{$q}%")
                ->orWhere('country','like' , "%{$q}%")
                ->orWhere('name','like' , "%{$q}%")
                ->orWhere('address','like' , "%{$q}%")
                ->orWhere('phone','like' , "%{$q}%");
            });

        }
        $orders = $orders->orderBy('id', 'DESC')->paginate(env('LIMIT'));
        return view('admin.orders.index' , compact('orders'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(Order $order)
    {
        return view('admin.orders.show' , compact('order'));
    }


    public function edit(Order $order)
    {

    }


    public function update(Request $request, Order $order)
    {

    }


    public function destroy(Order $order)
    {
        $items = $order->items;
        $items->each->delete();
        $order->delete();
        return redirect()->route('admin.orders.index');
    }
}
