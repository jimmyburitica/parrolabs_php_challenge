<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        $addresses = Address::where('customer_id', $customer->id)->get();
        if ($addresses->count() == 0) {
            return redirect("customers/{$customer->id}/edit")
            ->with(['success' => 'You must add a shipping address.', 'type' => 'error']);
        }
        return view('orders.create', compact('customer', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return redirect('orders')->with(['success' => 'The order was created.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $addresses = Address::where('customer_id', $order->customer_id)->get();
        $details = Detail::where('order_id', $order->id)->get();
        $products = Product::orderBy('description')->get();

        return view('orders.edit', compact('order', 'addresses', 'details', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect('orders')->with(['success' => 'The order was updated.', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Delete Order and Detail
        Detail::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect('orders')->with(['success' => 'The order was deleted.', 'type' => 'success']);
    }
}
