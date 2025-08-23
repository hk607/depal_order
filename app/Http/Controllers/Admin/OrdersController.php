<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order  = 'active';
        $order_list = Order::get();
        return view('admin.orders.index',compact('order_list','order'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'order_status' => 'nullable|in:pending,processing,shipped,delivered,cancelled',
    ]);

    $order = Order::findOrFail($id);

    // If only status is being updated
    if ($request->has('order_status')) {
        $order->order_status = $request->order_status;
    }

    // If you also allow editing other fields, merge them here
    // $order->fill($request->all());

    $order->save();

    return redirect()->back()->with('success', 'Order updated successfully.');
}

public function show($id)
{
    // Load order with related user + order items + product
    $order = Order::with(['user','items'])->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}


}
