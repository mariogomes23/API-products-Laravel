<?php

namespace App\Http\Controllers;


use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;

    }

    public function index()
    {
        $orders = $this->order->paginate();

        return OrderResource::collection($orders);
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $orders = $this->findOrFail($id);

        return new OrderResource($orders);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
